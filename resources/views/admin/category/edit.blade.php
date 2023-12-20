@extends('layouts.admin')
@section('title', 'Edit Category')
@section('main')
<h2>Sửa danh mục</h2>
<form action="{{route('category.update', $category->id)}}" method="POST" role="form">
	@csrf @method("PUT")
	<div class="form-group">
		<label for="">Tên danh mục</label>
		<input type="text" value="{{$category->name}}" name="name" class="form-control" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Trạng thái</label>
		<div class="radio">
			<label>
				<input type="radio" name="status" value="1" checked>
				Publish
			</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="status" value="0">
				Private
			</label>
		</div>
	</div>

	<div class="form-group">
		<label for="">Prioty</label>
		<input type="number" value="{{$category->prioty}}" name="prioty" class="form-control" placeholder="0">
		<button type="submit" class="btn btn-primary" style="margin: 20px 0;">Submit</button>
	</div>
</form>
@endsection