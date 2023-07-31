<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HandleImageTrait;

    protected $fillable = [
        'name',
        'description',
        'sale',
        'price'
    ];

    public function productDetails() {
        return $this->hasMany(ProductDetails::class, 'product_id');
    }


    public function images() {
        return $this->morphOne(Images::class, 'imageable')->latestOfMany();
    }


    // quan hệ
    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function assignCategory($categoryIds) {
        return $this->categories()->sync($categoryIds);
    }


    public function getBy($dataSearch, $categoryId) {
        return $this->whereHas('categories', fn($q) => $q->where('category_id', $categoryId))->paginate(12);
    }

    public function getImagePathAttribute() {
        return asset($this->images->count() > 0 ? 'upload/' .$this->images->url : 'upload/default.jpg');
    }

    public function getSalePriceAttribute() {
        return $this->attributes['sale'] ? $this->attributes['price'] - ($this->attributes['sale'] * 0.01 * $this->attributes['price']) : 0;
    }
}
