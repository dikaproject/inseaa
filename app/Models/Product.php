<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'details_product',
        'category_id',
        'pdf',
        'alt_text',
        'slug',
        'seller_id',
        'status',
    ];


    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    // Relasi dengan order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi dengan product_images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
}
