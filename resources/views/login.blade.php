@extends('layouts.site')
@section('main')
<div class="box-login">
    <div class="container">
        <div class="wrap-login">
            <div class="content-loginPage">
                <h1 class="title-loginPage">Đăng nhập</h1>
                <div class="notifi-loginPage">Nếu bạn chưa có tài khoản, <span><a href="">đăng ký tại đây</a></span></div>
                <form method="POST" action="" class="form-loginPage">
                    @csrf
                    <input type="email" class="form-control" value="" name="email" id="customer_email" placeholder="Email">
                    @error('email') 
                      <small>{{$message}}</small>
                    @enderror
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    @error('password') 
                      <small>{{$message}}</small>
                    @enderror
                    <button class="btn-login" type="submit">Đăng nhập</button>
                    <span class="forget-password"><a href="">Quên mật khẩu</a></span>
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