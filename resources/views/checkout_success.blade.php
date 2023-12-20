@extends('layouts.site')
@section('main')
<div class="jumbotron">
	<div class="container">
		<h3>Đặt hàng thành công!</h3>
		<p>Vui lòng kiểm tra email <b>{{auth()->guard('cus')->user()->email}}</b></p>
		<p>
			<a href="{{route('home.index')}}" class="btn btn-primary btn-lg">Home</a>
		</p>
	</div>
</div>
@endsection