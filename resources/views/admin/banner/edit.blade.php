@extends('layouts.admin')
@section('title', 'Edit Banner')
@section('main')
<h2>Sửa danh mục</h2>
<form action="{{route('banner.update', $banner->id)}}" method="POST" role="form">
	@csrf @method("PUT")
	<div class="form-group">
		<label for="">Tên</label>
		<input type="text" value="{{$banner->name}}" name="name" class="form-control" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Trạng thái</label>
		<div class="radio">
			<label>
				<input type="radio" name="status" value="1" <?php echo $banner->status == 1 ? 'checked' : ""; ?>>
				Publish
			</label>
		</div>
		<div class="radio">
			<label>
				<input type="radio" name="status" value="0" <?php echo $banner->status == 0 ? 'checked' : ""; ?>>
				Private
			</label>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="">Image</label>
			<div class="input-group">
				<input type="text" name="image" id="image" class="form-control" value="{{ $banner->image }}">
				<div class="input-group-append">
					<span class="input-group-text">
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modelId"><i class="fas fa-folder"></i></button>
					</span>
				</div>
			</div>
			<img src="{{url('public/upload')}}/{{ $banner->image }}" id="img_show" style="width: 100%;">
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" style="margin: 20px 0;">Submit</button>
	</div>
</form>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-custom" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container-fluid">
      		<iframe src="{{url('public/file/dialog.php?field_id=image')}}" style="width: 100%; height: 500px; overflow-y: auto; border: none;"></iframe>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

@section('js')
<script>
  $('#modelId').on('hide.bs.modal', event => {
  	var _link = $('input#image').val();
  	var _img = "{{url('public/upload/')}}" + '/' + _link;
  	$('img#img_show').attr('src', _img);
  });
</script>
@endsection
@endsection