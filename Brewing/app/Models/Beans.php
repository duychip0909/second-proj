<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beans extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bean'
    ];

    public function coffees() {
        return $this->hasMany(Coffee::class, 'bean_id' ,'id');
    }

    public function orders() {
        return $this->hasMany(Orders::class, 'bean_id', 'id');
    }
}
