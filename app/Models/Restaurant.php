<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public static function generateSlug(string $title) {
        return Str::slug($title, '-');
    }
    protected $fillable =[
        'name',
        'address',
        'p_iva',
        'image',
        'description',
        'user_id',
        'slug'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
