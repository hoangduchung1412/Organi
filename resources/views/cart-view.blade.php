@extends('layouts.site')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ url('public/site') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('home.index') }}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($cart->items as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{url('public/upload')}}/{{$item->image}}" alt="">
                                    <h5>{{$item->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$item->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <form action="{{route('cart.update', $item->id)}}" method="get">
                                    	<div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" name="quantity" value="{{$item->quantity}}">
                                        </div>
                                        <button style="outline: none; border: none;">Cập nhật</button>
                                    </div>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    {{$item->quantity * $item->price}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a onclick="return confirm('Bạn có chắc xoá?')" href="{{route('cart.delete', $item->id)}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('shop.index')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    @if($cart->totalQuantity > 0)
                    <a href="#" class="primary-btn"><span class="icon_loading"></span>
                        Update Cart</a>
                    <a onclick="return confirm('Bạn có chắc xoá?')" href="{{route('cart.clear')}}" class="primary-btn cart-btn cart-btn-right">Xoá hết</a>
                    @else
                    <div class="alert alert-success" role="alert">
                    	<h4 class="alert-heading">Giỏ hàng rỗng</h4>
                    	<p>Vui lòng tiếp tục mua hàng</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Quantity <span>{{$cart->totalQuantity}} (sản phẩm)</span></li>
                        <li>Total <span>{{number_format($cart->totalPrice)}} vnđ</span></li>
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection	