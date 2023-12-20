@extends('layouts.admin')
@section('title', 'Banner List')
@section('main')

<form action="" class="form-inline" role="form">
	<div class="form-group">
		<input type="" name="key" class="form-control" placeholder="Search By Name">
	</div>
	<button type="submit" class="btn btn-primary">
		<i class="fas fa-search"></i>
	</button>
</form>

<a href="{{route('banner.create')}}" class="btn btn-success" style="margin: 20px 0;">Thêm banner</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Status</th>
			<th>Image</th>
			<th>Created Date</th>
			<th class="text-right">Actions</th>
		</tr>
	</thead>
	<tbody>
	@foreach($data as $rows)
		<tr>
			<td>{{ $rows->id }}</td>
			<td>{{ $rows->name }}</td>
			<td>
				@if($rows->status==0)
					<span class="badge badge-danger">Private</span>
				@else
					<span class="badge badge-success">Publish</span>
				@endif
			</td>
			<td><img src="{{url('public/upload')}}/{{$rows->image}}" style="width: 100px;"></td>
			<td>{{ $rows->created_at->format('m-d-Y') }}</td>
			<td class="text-right">
			
				<a href="{{route('banner.edit',$rows->id)}}" class="btn btn-sm btn-success">
					<i class="fas fa-edit"></i>
				</a>
				<a href="{{route('banner.destroy',$rows->id)}}" class="btn btn-sm btn-danger btndelete">
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