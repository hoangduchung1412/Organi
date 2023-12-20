@extends('layouts.site')
@section('main')
<div class="box-register">
    <div class="container">
        <div class="wrap-register">
            <div class="content-registerPage">
                <h1 class="title-registerPage">Đăng ký</h1>
                <div class="notifi-registerPage">Nếu bạn đã có tài khoản, <span><a href="">đăng nhập tại đây</a></span></div>
                <form method="POST" action="" class="form-registerPage">
                	@csrf
                    <input type="text" class="form-control" name="name" placeholder="Tên *">
                    @error('name') 
			          <small>{{$message}}</small>
			        @enderror
                    <input type="email" class="form-control" value="" name="email" id="customer_email" placeholder="Email *">
                    @error('email') 
			          <small>{{$message}}</small>
			        @enderror
                    <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    @error('password') 
			          <small>{{$message}}</small>
			        @enderror
                    <input type="password" class="form-control" name="confirm_password" placeholder="Xác nhận mật khẩu">
                    @error('confirm_password') 
			          <small>{{$message}}</small>
			        @enderror
                    <button class="btn-register" type="submit">Đăng ký</button>
                </form>
                <div class="social-loginPage">
                    <span>Hoặc đăng nhập bằng</span>
                    <div class="social-login">
                        <div class="social-login--facebook"><a href=""><img src="{{ url('public/site') }}/img/fb-btn.svg"></a></div>
                        <div class="social-login--google"><a href=""><img src="{{ url('public/site') }}/img/gp-btn.svg"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection