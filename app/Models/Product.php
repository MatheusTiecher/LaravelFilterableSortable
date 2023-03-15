<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\FilterableSortable;

class Product extends Model
{
    use HasFactory, FilterableSortable;

    protected $table = 'products';

    protected $fillable = [
        'description',
        'price',
        'slug',
    ];

    protected $filterable = [
        'description',
        'slug',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug($value, '-');
    }

    public function getSlugAttribute($value)
    {
        return \Str::slug($value, '-');
    }
}
