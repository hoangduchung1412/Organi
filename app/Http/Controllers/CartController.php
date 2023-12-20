<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class CartController extends Controller
{
    public function __construct() {
        
    }
    public function addToCart(Product $product, Cart $cart) {
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $cart->add($product);
        return redirect()->route('cart.view')->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
    public function view(Cart $cart) {
        return view('cart-view');
    }
    public function deleteCart($id, Cart $cart) {
        $cart->delete($id);
        return redirect()->route('cart.view')->with('warning', 'Xoá sản phẩm khỏi giỏ hàng thành công');
    }
    public function updateCart($id, Cart $cart) {
        $quantity = request('quantity', 1);
        $quantity = $quantity > 0 ? floor($quantity) : 1;
        $cart->update($id, $quantity);
        return redirect()->route('cart.view')->with('ok', 'Cập nhật số lượng sản phẩm vào giỏ hàng thành công');
    }
    public function clearCart(Cart $cart) {
        $cart->clear();
        return redirect()->route('cart.view')->with('warning', 'Xoá sản phẩm khỏi giỏ hàng thành công');
    }
}
