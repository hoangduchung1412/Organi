<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'account';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
    ];
    // them localScope
    public function scopeSearch($query) {
        if($key = request()->key) {
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'account_id');
    }
}
