<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Food extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public static function generateSlug(string $title, int $restaurantId)
    {
        $newSlug = Str::slug($title, '-');
        return $restaurantId . '-' . $newSlug;
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'visibility',
        'slug',
        'restaurant_id'
    ];
}
