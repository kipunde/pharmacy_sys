@extends('admin.layouts.app')

<x-assets.datatables />

@push('page-css')
    
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Purchase</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Purchase</li>
	</ul>
</div>
<div class="col-sm-5 col" style="margin-top: 10px; text-align: right;">
    <a href="{{ route('purchases.create') }}" class="btn btn-success" style="margin-right: 10px;">Add New Manually</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#import-purchases">Import Data</a>
</div>

@endpush
<!-- Visit codeastro.com for more projects -->
@section('content')
<div class="row">
	<div class="col-md-12">
	
		<!-- Recent Orders -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="purchase-table" class="datatable table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Medicine Name</th>
								<th>Category</th>
								<th>Supplier</th>
								<th>Purchase Cost</th>
								<th>Quantity</th>
								 <th>Total Cost</th>
								<th>Expire Date</th>
								<th>Batch code</th>
								<th class="action-btn">Action</th>
							</tr>
						</thead>
						<tbody>
														
						</tbody>
						<tfoot>
                            <tr>
                            <th colspan="3" class="text-right">Total:</th>
                            <th id="total-price">
                            {{AppSettings::get('app_currency', '$')}} {{$total_all_cost}}</th>
                            <th id="total-quantity">{{$total_quantity}}</th>
                            <th id="total-price">
                            {{AppSettings::get('app_currency', '$')}} {{$total_purchase}}</th>
                            <th></th>
                            </tr>
                            </tfoot>
					</table>
				</div>
			</div>
		</div>
		<!-- /Recent Orders -->
		
	</div>
</div>
@endsection	

@push('page-js')
<script>
    $(document).ready(function() {
        var table = $('#purchase-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('purchases.index')}}",
            columns: [
                {data: 'product', name: 'product'},
                {data: 'category', name: 'category'},
                {data: 'supplier', name: 'supplier'},
                {data: 'cost_price', name: 'cost_price'},
                {data: 'quantity_with_unit', name: 'quantity_with_unit'},
                {data: 'total_amount', name: 'total_amount'},
				{data: 'expiry_date', name: 'expiry_date'},
				{data: 'batch_code', name: 'batch_code'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
</script> 
@endpush