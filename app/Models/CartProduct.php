<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Product;
class CartProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'product_size',
        'product_quantity',
        'product_price'
     
    ];

    // quan hệ
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function getBy($cartId, $productId, $productSize) {
        return CartProduct::whereCartId($cartId)->whereProductId($productId)->whereProductSize($productSize)->first();
    }

    public function getTotalPriceAttribute() {
        return $this->product->sale ? $this->product->sale_price * $this->product_quantity : $this->product->price * $this->product_quantity;
    }
}
