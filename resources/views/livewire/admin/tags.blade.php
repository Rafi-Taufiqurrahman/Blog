@section('title', 'Tag')
<div>
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search Tag">
                    </div>
                    <div class="col-lg-2">
                        <select wire:model="orderBy" class="form-control">
                            <option value="id">ID</option>
                            <option value="name">Name</option>
                            <option value="slug">Slug</option>
                            <option value="created_at">Created</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select wire:model="orderAsc" class="form-control">
                            <option value="1">Ascending</option>
                            <option value="0">Descending</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select wire:model="perPage" class="form-control">
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Tag Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td scope="row">
                                        <div class="dropdown">
                                            <i class="fas fa-ellipsis-v" type="button" data-toggle="dropdown"
                                                id="dropdownMenu2" aria-haspopup="true" aria-expanded="false"></i>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <button class="dropdown-item"
                                                    wire:click.prevent="edit({{ $tag->id }})">Edit</button>
                                                <button class="dropdown-item"
                                                    wire:click.prevent="confirmDelete({{ $tag->id }})">Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    {{ $tags->links() }}
                </div>
            </div>
        </div>
        @if ($updateMode)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Tag Name</label>
                                <input wire:model="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input wire:model="slug" type="text"
                                    class="form-control @error('slug') is-invalid @enderror">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button wire:click.prevent="update" class="btn btn-primary mt-2">Update</button>
                            <button wire:click.prevent="cancel" class="btn btn-danger mt-2">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Tag Name</label>
                                <input wire:model="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input wire:model="slug" type="text"
                                    class="form-control @error('slug') is-invalid @enderror">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button wire:click.prevent="store" class="btn btn-success mt-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
