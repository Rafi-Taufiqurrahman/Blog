<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Tags extends Component
{
    public $name, $slug, $tag_id;

    public $search = '';

    public $perPage = 10;

    public $updateMode = false;

    public $orderBy = 'id';

    public $orderAsc = true;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    protected $rules = [
        'name' => 'required|unique:tags'
    ];

    protected $messages = [
        'name.required' => 'Tag :attribute cannot be empty',
        'name.unique' => 'Tag: attribute has been taken'
    ];


    public function render()
    {
        return view('livewire.admin.tags',[
            'tags' => Tag::search($this->search)
                      ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                      ->simplePaginate($this->perPage),
        ]);
    }

    public function updatedName()
    {
        $this->slug = SlugService::createSlug(Tag::class, 'slug', $this->name);
    }

    public function resetForm()
    {
        $this->name = '';

        $this->slug = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Tag::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->resetForm();

        $this->dispatchBrowserEvent('alert',['message' => 'Tag added successfully !']);
    }

    public function cancel()
    {
        $this->resetForm();

        $this->updateMode = false;
    }

    public function edit($id)
    {
        $tag = Tag::findorFail($id);

        $this->tag_id = $id;

        $this->name = $tag->name;

        $this->slug = $tag->slug;

        $this->updateMode = true;
    }

    public function update()
    {
       if($this->tag_id){
        $tag = Tag::find($this->tag_id);
            $tag->update([
                'name' => $this->name,
                'slug' => $this->slug,
            ]);

            $this->updateMode = false;

            $this->resetForm();

            $this->dispatchBrowserEvent('alert',['message' => 'Tag updated successfully !']);
       }
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title' => 'Are you sure ?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        Tag::where('id',$id)->delete();

        $this->dispatchBrowserEvent('alert',['message' => 'Tag deleted successfully !']);
    }
}
