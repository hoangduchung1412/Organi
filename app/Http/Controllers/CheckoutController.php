<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
class CheckoutController extends Controller
{
    //
    public function __construct() {
       $this->middleware('cus'); 
    }
    public function form_checkout() {
        return view('checkout');
    }
    public function success() {
        return view('checkout_success');
    }
    public function submit_form(Cart $cart) {
        $id = Auth::guard('cus')->user()->id;
        $c_email = Auth::guard('cus')->user()->email;
        $c_name = Auth::guard('cus')->user()->name;

        if($order = Order::create([
            'account_id' => $id,
            'note' => request()->order_note
        ])) {
            $order_id = $order->id;
            foreach($cart->items as $product_id => $item) {
                $quantity = $item->quantity;
                $price = $item->price;
                OrderDetail::create([
                    'order_id'=>$order_id,
                    'product_id'=>$product_id,
                    'price'=>$price * $quantity,
                    'quantity'=>$quantity,
                ]);
            }
            Mail::send('email.order',[
                'c_name' => $c_name,
                'order' => $order,
                'items' => $cart->items,
            ], function($mail) use($c_email, $c_name) {
                $mail->to($c_email, $c_name);
                $mail->from('hoangduchung1412@gmail.com');
                $mail->subject('Email ordered');
            });
            session(['cart'=>'']);
            return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công');
        } else {
            return redirect()->back()->with('error', 'Đặt hàng không thành công');
        }
    }
}
