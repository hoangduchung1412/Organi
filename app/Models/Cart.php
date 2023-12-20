<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Cart 
{
    use HasFactory;
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public function __construct() {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->getTotalPrice();
        $this->totalQuantity = $this->getTotalQuantity();
    }
    public function add($product, $quantity = 1) {
        if(isset($this->items[$product->id])) {
            $this->items[$product->id]->quantity += $quantity;
        } else {
        $cart_item = (object)[
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1
        ];
        $this->items[$product->id] = $cart_item;
        }
        session(['cart'=> $this->items]);
    }
    public function update($id, $qtt) {
        if(isset($this->items[$id])) {
            $this->items[$id]->quantity = $qtt;
        }
    }
    public function delete($id) {
        if(isset($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart'=> $this->items]);
        }
    }
    public function clear() {
        session(['cart'=> null]);
    }
    private function getTotalPrice() {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item->quantity * $item->price;
        }
        return $total;
    }
    private function getTotalQuantity() {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item->quantity;
        }
        return $total;
    }
}
