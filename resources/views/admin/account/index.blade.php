@extends('layouts.admin')
@section('title', 'Account List')
@section('main')

<form action="" class="form-inline" role="form">
	<div class="form-group">
		<input type="" name="key" class="form-control" placeholder="Search By Name">
	</div>
	<button type="submit" class="btn btn-primary">
		<i class="fas fa-search"></i>
	</button>
</form>

<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Created Date</th>
		</tr>
	</thead>
	<tbody>
	@foreach($data as $rows)
		<tr>
			<td>{{ $rows->id }}</td>
			<td>{{ $rows->name }}</td>
			<td>{{ $rows->email }}</td>
			<td>{{ $rows->phone }}</td>
			<td>{{ $rows->address }}</td>
			<td>{{ $rows->created_at }}</td>
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