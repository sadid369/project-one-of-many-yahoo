<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Customer extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $guarded = [];


    public function order() {
        return $this->hasMany(Order::class);
    }
    public function latestOrder() {
        return $this->hasOne(Order::class)->latestOfMany();
    }
    public function oldestOrder() {
        return $this->hasOne(Order::class)->oldestOfMany();
    }
    public function largestOrder() {
        return $this->hasOne(Order::class)->ofMany(column:'amount',aggregate:'max');
    }
    public function smallestOrder() {
        return $this->hasOne(Order::class)->ofMany(column:'amount',aggregate:'min');
    }
}
