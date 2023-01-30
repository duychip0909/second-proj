<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected  $fillable = [
        'order_name',
        'order_phone',
        'order_email',
        'order_email',
        'order_address',
        'order_notes',
        'processed',
        'order_total'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function coffees() {
        return $this->belongsToMany(Coffee::class, 'coffee_id', 'id')->withPivot('quantity');
    }

}
