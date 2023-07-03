<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function food()
    {
        return $this->belongsToMany(Food::class)->withPivot('quantity');
    }

    protected $fillable = [
        'customer_name',
        'customer_phone_number',
        'customer_address',
        'customer_email',
        'status',
        'order_date',
        'total_price'
    ];
}
