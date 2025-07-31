@extends('admin.layouts.app')

@push('page-css')
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Add Purchase</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Add Purchase</li>|
	</ul>
</div>
<div class="col-sm-12 text-right">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import-purchases">
        Import Data
    </a>
</div>


@endpush


@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
				
				<!-- Add Medicine -->
				<form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('purchases.store')}}">
					@csrf
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Medicine Name<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="product" >
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Category <span class="text-danger">*</span></label>
									<select class="select2 form-select form-control" name="category"> 
										@foreach ($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Supplier <span class="text-danger">*</span></label>
									<select class="select2 form-select form-control" name="supplier"> 
										@foreach ($suppliers as $supplier)
											<option value="{{$supplier->id}}">{{$supplier->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Cost Price<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="cost_price">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label>Quantity<span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="quantity">
								</div>
							</div>

							<div class="col-lg-4">
						<div class="form-group">
							<label>Product Unit<span class="text-danger">*</span></label>
							<select class="select2 form-select form-control" name="product_unit" id="unit-select" required>
							<option value="">Select Unit</option>
							<option value="mg">Milligram (mg)</option>
							<option value="g">Gram (g)</option>
							<option value="mcg">Microgram (mcg)</option>
							<option value="mL">Milliliter (mL)</option>
							<option value="L">Liter (L)</option>
							<option value="tab">Tablet (tab)</option>
							<option value="cap">Capsule (cap)</option>
							<option value="gtt">Drop (gtt)</option>
							<option value="puff">Puff</option>
							<option value="IU">International Unit (IU)</option>
							<option value="vial">Vial</option>
							<option value="amp">Ampoule</option>
							<option value="patch">Patch</option>
							<option value="supp">Suppository (supp)</option>
							<option value="bottle">Bottle</option>
							<option value="sachet">Sachet</option>
							<option value="strip">Strip</option>
							<option value="box">Box</option>
							<option value="tube">Tube</option>
							<option value="jar">Jar</option>
							<option value="spray">Spray</option>
							<option value="container">Container</option>
							<option value="pack">Pack</option>
							</select>
						</div>
							</div>
						</div>
					</div>

					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<label>Expire Date<span class="text-danger">*</span></label>
									<input class="form-control" type="date" name="expiry_date">
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group">
									<label>Batch Code</label>
									<input class="form-control" type="text" name="batch_code">
								</div>
							</div>

							<div class="col-lg-4">
								<div class="form-group">
									<label>Medicine Image</label>
									<input type="file" name="image" class="form-control">
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="submit-section">
						<button class="btn btn-success submit-btn" type="submit" >Save</button>
					</div>
				</form>
				<!-- /Add Medicine -->
			<!-- Visit codeastro.com for more projects -->
			</div>
		</div>
	</div>			
</div>
@endsection

@push('page-js')
	<!-- Datetimepicker JS -->
	<script src="{{asset('assets/js/moment.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>	
@endpush

