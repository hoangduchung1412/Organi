@extends('layouts.admin')
@section('title', 'Product List')
@section('main')

<form action="" class="form-inline" role="form">
	<div class="form-group">
		<input type="" name="key" class="form-control" placeholder="Search By Name">
	</div>
	<button type="submit" class="btn btn-primary">
		<i class="fas fa-search"></i>
	</button>
</form>

<a href="{{route('product.create')}}" class="btn btn-success" style="margin: 20px 0;">Thêm sản phẩm</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Category</th>
			<th>Price / Sale(%)</th>
			<th>Status</th>
			<th>Created Date</th>
			<th>Image</th>
			<th class="text-right">Actions</th>
		</tr>
	</thead>
	<tbody>
	@foreach($data as $rows)
		<tr>
			<td>{{ $rows->id }}</td>
			<td>{{ $rows->name }}</td>
			<td>{{ $rows->cat->name}}</td>
			<td>{{ $rows->price }} / <span class="badge badge-success">{{ $rows->sale_price }} %</span></td>
			<td>
				@if($rows->status==0)
					<span class="badge badge-danger">Private</span>
				@else
					<span class="badge badge-success">Publish</span>
				@endif
			</td>
			<td>{{ $rows->created_at->format('m-d-Y') }}</td>
			<td>
				<img src="{{ url('public/upload') }}/{{ $rows->image }}" width="60px">
			</td>
			<td class="text-right">
				<a href="{{route('product.show',$rows->id)}}" class="btn btn-sm btn-primary">
					<i class="fas fa-eye"></i>
				</a>
				<a href="{{route('product.edit',$rows->id)}}" class="btn btn-sm btn-success">
					<i class="fas fa-edit"></i>
				</a>
				<a href="{{route('product.destroy',$rows->id)}}" class="btn btn-sm btn-danger btndelete">
					<i class="fas fa-trash"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<form method="POST" action="" id="form-delete">
	@csrf @method('DELETE')
</form>
<hr>
<div class="">
	{{$data->appends(request()->all())->links()}}
</div>
@endsection

@section('js')
<script type="text/javascript">
	$('.btndelete').click(function(ev){
		ev.preventDefault();
		var _href = $(this).attr('href');
		$('form#form-delete').attr('action', _href);
		if(confirm("Bạn có chắc chắn muốn xoá không?")) {
			$('form#form-delete').submit();	
		}	
	})
</script>
@endsection