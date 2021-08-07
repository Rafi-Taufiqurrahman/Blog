<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['slug','name'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
        : static::query()->where('id', 'like', '%'.$search.'%')
            ->orWhere('name', 'like','%'.$search.'%')
            ->orWhere('slug', 'like','%'.$search.'%');
    }
}
