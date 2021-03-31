<?php
$rangePrice = request()->get('rangePrice');
$sort = request()->get('sort');
?>

<form action="" method="GET">
	@if($id!=null)
	<input type="hidden" name="category" value="{{request()->get('category')}}">
	@endif
	@if($key!=null)
	<input type="hidden" name="key" value="{{request()->get('key')}}">
	@endif
	<div class="row border rounded bg-white card-body advandce_options">
		<div class="col-10">
			<div class="row range-price">
				<div class="col-md-1">
				<b>Giá:</b>
				</div>
				<div class="col-md-11">
					<label class="border rounded">	
						<input type="radio" name="rangePrice" value="0" id="tatca" checked>
						<span>Tất cả</span>
					</label>
					<label class="border rounded">	
						<input type="radio" name="rangePrice" value="1" id="duoi5tr" {{($rangePrice==1)?'checked':""}}>
						<span>Dưới 5 triệu</span>
					</label>
					<label class="border rounded">	
						<input type="radio" name="rangePrice" value="2" id="5den10tr" {{($rangePrice==2)?'checked':""}}>
						<span>5 - 10 triệu</span>
					</label>
					<label class="border rounded">	
						<input type="radio" name="rangePrice" value="3" id="10den15tr" {{($rangePrice==3)?'checked':""}}>
						<span for="10den15tr">10 - 15 triệu</span>
					</label>
					<label class="border rounded">	
						<input type="radio" name="rangePrice" value="4" id="15den20tr" {{($rangePrice==4)?'checked':""}}>
						<span for="15den20tr">15 - 20 triệu</span>
					</label>
					<label class="border rounded">	
						<input type="radio" name="rangePrice" value="5" id="tu20tr" {{($rangePrice==5)?'checked':""}}>
						<span for="tu20tr">20 triệu trở lên</span>
					</label>
				</div>
			</div>
			<div class="row sort">
				<div class="col">
				<b>Sắp xếp:</b>
				<select id="sort" name="sort">
					<option value="0" selected disabled>---Chọn sắp xếp---</option>
					<option value="1" {{($sort==1)?'selected':""}}>Theo tên từ A - Z</option>
					<option value="2" {{($sort==2)?'selected':""}}>Theo tên từ Z - A</option>
					<option value="3" {{($sort==3)?'selected':""}}>Giá từ thấp đến cao</option>
					<option value="4" {{($sort==4)?'selected':""}}>Giá từ cao đến thấp</option>
				</select>
				</div>
			</div>
		</div>
		<div class="col-2">
			<input type="submit" name="" value="Lọc" style="height: 100%;" class="btn btn-secondary">
		</div>
	</div>
</form>