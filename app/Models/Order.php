<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['note', 'account_id', 'order_date', 'status'];
    public function details() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'id');
    }
}
