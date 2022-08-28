<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [''];
    protected $appends = ['thumbnail_path'];

    // Relation
    public function Images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Appends
    public function getThumbnailPathAttribute()
    {
        return asset('storage/' . $this->Images[0]->image);
    }
}
