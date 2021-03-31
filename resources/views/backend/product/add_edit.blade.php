@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Sản phẩm<small> > {{(request()->is('admin-page/product/add'))?'Thêm':'Sửa'}}</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
		<form action="" method="post" enctype="multipart/form-data">
			@csrf
			<!-- danh mục -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Danh mục</b></div>
				<div class="col-sm-9">
				<select name="intCategory_id" class="form-control" required>
					<option disabled value="0">Chọn danh mục</option>
					@foreach($listCategory as $item)
					<option value="{{$item->id}}" {{(isset($product->category)&&$product->category->id==$item->id)?'selected':''}}>{{$item->name}}</option>
					@endforeach
				</select>
				</div>
			</div>
			<!-- tên -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Tên</b></div>
				<div class="col-sm-9">
					<input type="text" name="stringName" value="{{isset($product->name)?$product->name:''}}" placeholder="Nhập tên sản phẩm" class="form-control" required>
				</div>
			</div>
			<!-- thuong hieu -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Thương hiệu</b></div>
				<div class="col-sm-9">
					<input type="text" name="stringBrand" value="{{isset($product->brand)?$product->brand:''}}" placeholder="Nhập tên thương hiệu" class="form-control" required>
				</div>
			</div>
			<!-- xuất xứ -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Xuất xứ</b></div>
				<div class="col-sm-9">
					<input type="text" name="stringOrigin" value="{{isset($product->origin)?$product->origin:''}}" placeholder="Nhập xuất xứ" class="form-control" required>
				</div>
			</div>
			<!-- giá  -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Giá</b></div>
				<div class="col-sm-9">
					<input type="number" name="intPrice" value="{{isset($product->price)?$product->price:0}}" placeholder="Nhập giá" class="form-control" min="0" required step="1000">
				</div>
			</div>
			<!-- giá khuyến mãi -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Giá ưu đãi</b></div>
				<div class="col-sm-9">
					<input type="number" name="intPromotion_price" value="{{isset($product->promotion_price)?$product->promotion_price:0}}" placeholder="Nhập giá khuyến mãi(nếu có)" class="form-control" min="0" required step="1000">
				</div>
			</div>
			@if($errors->has('intPromotion_price'))
				<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('intPromotion_price') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 	</button>
				</div>
			@endif
			<!-- mô tả -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Mô tả</b></div>
				<div class="col-sm-9">
					<textarea name="stringDescription" id="stringDescription" class="form-control">{{isset($product->description)?$product->description:''}}</textarea>
					
				</div>
			</div>
			@if($errors->has('stringDescription'))
				<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringDescription') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 	</button>
				</div>
			@endif
			<!-- trạng thái bán -->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Trạng thái</b></div>
				<div class="col-sm-9">
					<input type="radio" name="intEnabled" value="1" checked>
					<label>Hiện</label><br>
					<input type="radio" name="intEnabled" value="0" {{(isset($product->enabled)&&$product->enabled==0)?'checked':''}}>
					<label>Ẩn</label><br>
				</div>
			</div>
			<!-- số lượng trong kho-->
			<div class="row mb-2">
				<div class="col-sm-3"><b>Số lượng tồn</b></div>
				<div class="col-sm-9">
					<input type="number" name="intQuantity_in_stock" value="{{isset($product->quantity_in_stock)?$product->quantity_in_stock:0}}" placeholder="Nhập số lượng tồn" class="form-control" min="0" required>
				</div>
			</div>
			<!-- các ảnh -->
			<div class="alert-img alert alert-info text-center mt-1">Tải lên tối đa 4 ảnh 
				</div>
			<div class="row mb-2">
				<div class="col-sm-3"><b>Ảnh sản phẩm<b></div>
				<div class="col-sm-9">
					<input class="images" type="file" name="images[]" class="btn btn-success" accept="image/png, image/jpeg" multiple {{(!isset($product->images)) ?'required':'' }}>
				</div>
			</div>
			@if($errors->has('images'))
				<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('images') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 	</button>
				</div>
			@endif
			<div class="row">
				<div class="col-sm-3"></div>
				@for($i=0;$i<=3;$i++)
				<div class="col-sm-2 mr-1">
					<img class="image{{$i}} card card-img-top" style="display: none;width: 150px;height: 150px;object-fit: cover;">
				</div>	
				@endfor
			</div>	
			<div class="row mt-1">
				<div class="col-sm-3"></div>
				<div class="col-sm-9">
					<input type="submit" name="" value="Thực thi" class="btn btn-success">
				</div>
			</div>
		</form>
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	 /*product*/
        $('.images').change(function(){
            if(this.files.length>4){
                $('.alert-img').removeClass('alert-info').addClass('alert-danger');
                $(this).val('');
            }
            for ( var i = 0; i < this.files.length; i++) {
                $('.image'+i).css('display','block');
                $('.image'+i).attr('src',URL.createObjectURL(event.target.files[i]));
            }
            for( var i = 3;i>=this.files.length;i--){
                $('.image'+i).css('display','none');
            }   
        });
        /*textarea product*/
        CKEDITOR.replace("stringDescription");
</script>
@endsection