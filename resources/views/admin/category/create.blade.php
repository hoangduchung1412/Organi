@extends('layouts.admin')
@section('title', 'Add Category')
@section('main')
<h2>Thêm danh mục</h2>
<form action="{{route('category.store')}}" method="POST" role="form">
	@csrf @method("POST")
	<div class="form-group">
		<label for="">Tên danh mục</label>
		<input type="text" name="name" class="form-control" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Trạng thái</label>
		<div class="radio">
			<label>
				<input type="radio" name="status" value="1" checked>
				Publish
			</label>
			<label>
				<input type="radio" name="status" value="0">
				Private
			</label>
		</div>
	</div>

	<div class="form-group">
		<label for="">Prioty</label>
		<input type="number" name="prioty" class="form-control" placeholder="0">
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection