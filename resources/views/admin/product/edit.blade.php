@extends('layouts.admin')
@section('title', 'Edit Product')
@section('main')
<h2>Thêm sản phẩm</h2>
<form action="{{route('product.update', $product->id)}}" method="POST" role="form" enctype="multipart/form-data">
	@csrf @method("PUT")
	<div class="row">
		<div class="col-md-9">
			<div class="form-group">
				<label for="">Tên danh mục</label>
				<input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Input field">
				@error('name')
				<small class="help-block">{{$message}}</small>
				@enderror
			</div>
			<div class="form-group">
				<label for="">Chi tiết sản phẩm</label>
				<textarea name="description" value="{{$product->description}}" id="content" class="form-control" placeholder="Input description">{{$product->description}}</textarea>
				<small class="help-block"></small>
			</div>
			<div class="form-group">
				<?php $images = json_decode($product->image_list); ?>
				<label for="">Image List <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_list"><i class="fas fa-folder"></i></button></label>
				<div class="input-group">
					<input type="hidden" name="image_list" id="image_list">
					<!-- <div class="input-group-append">
						<span class="input-group-text">
							<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_list"><i class="fas fa-folder"></i></button>
						</span>
					</div> -->
				</div>
				<div class="row" id="show_image_list">
					@if(is_array($images))
          <div class="col-12 product-image-thumbs">
          	@foreach($images as $img)
            <div class="product-image-thumb active"><img src="{{url('public/upload')}}/{{ $img }}" alt="Product Image"></div>
            @endforeach
          </div>
          @endif
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" class="form-control">
					<option value="{{$product->category_id}}">SELECT ONE</option>
				@foreach($cat as $rows)
					<option @if(isset($product->category_id) && $product->category_id == $rows->id) selected @endif value="{{$rows->id}}">{{$rows->name}}</option>
				@endforeach
				</select>
			<div class="form-group">
				<label for="">Price</label>
				<input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="Input price">
			</div>
			<div class="form-group">
				<label for="">Sale Price(%)</label>
				<input type="text" name="sale_price" value="{{$product->sale_price}}" class="form-control" placeholder="Input sale price">
			</div>
			<div class="form-group">
				<label for="">Image</label>
				<div class="input-group">
					<input type="text" name="image" id="image" class="form-control" value="{{ $product->image }}">
					<div class="input-group-append">
						<span class="input-group-text">
							<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modelId"><i class="fas fa-folder"></i></button>
						</span>
					</div>
				</div>
				<img src="{{url('public/upload')}}/{{ $product->image }}" id="img_show" style="width: 100%;">
			</div>
			<div class="form-group">
				<label for="">Trạng thái</label>
				<div class="radio">
					<label>
						<input type="radio" name="status" value="1" <?php echo $product->status == 1 ? 'checked' : ""; ?>>
						Publish
					</label>
					<label>
						<input type="radio" name="status" value="0" <?php echo $product->status == 0 ? 'checked' : ""; ?>>
						Private
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="">Prioty</label>
				<input type="number" name="prioty" class="form-control" placeholder="0">
				<button type="submit" class="btn btn-primary" style="margin: 20px 0;">Submit</button>
			</div>
		</div>
	</div>
</form>
@endsection


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

<!-- Modal -->
<div class="modal fade" id="modal_list" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container-fluid">
      		<iframe src="{{url('public/file/dialog.php?field_id=image_list')}}" style="width: 100%; height: 500px; overflow-y: auto; border: none;"></iframe>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
@section('css')
<!-- summernote -->
 <link rel="stylesheet" href="{{url('public/ad123')}}/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('js')
<!-- Summernote -->
<script src="{{url('public/ad123')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#content').summernote({
    	height: 324,
    	placeholder: "Product Description"
    });
  });

  $('#modelId').on('hide.bs.modal', event => {
  	var _link = $('input#image').val();
  	var _img = "{{url('public/upload')}}" + '/' + _link;
  	$('img#img_show').attr('src', _img);
  });

  $('#modal_list').on('hide.bs.modal', event => {
  	var _links = $('input#image_list').val();
  	var _html = '';
  	if(/^[\],:{}\s]*$/.test(_links.replace(/\\["\\\/bfnrtu]/g, '@').
replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
  		var _args = $.parseJSON(_links);
  		for(let i=0; i< _args.length; i++) {
	  		let _url = "{{url('public/upload')}}" + '/' + _args[i];
	  		_html += '<div class="col-md-4">';
				_html += '<img src="'+_url+'" alt="" style="width: 100%; margin: 20px 0; ">';
				_html += '</div>';
	  	}
  	} else {
  		let _url = "{{url('public/upload')}}" + '/' + _links;
	  		_html += '<div class="col-md-4">';
				_html += '<img src="'+_url+'" alt="" style="width: 100%; margin: 20px 0; ">';
				_html += '</div>';
  	}
  	$('#show_image_list').html(_html);
  });
</script>
@endsection