@extends('admin.layouts.app')

<x-assets.datatables />

@push('page-css')
    
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Sales</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Sales</li>
	</ul>
</div>
@can('create-sale')
<div class="col-sm-5 col">
	<a href="{{route('sales.create')}}" class="btn btn-success float-right mt-2">Add Sale</a>
</div>
@endcan
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
	
		<!--  Sales -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="sales-table" class="datatable table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Medicine Name..</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>Customer</th>
								<th>Date</th>
								<th class="action-btn">Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						 <tfoot>
        <tr>
        <th>Total</th>
        <th id="total-quantity">{{$total_quantity}}</th>
        <th id="total-price">
        {{AppSettings::get('app_currency', '$')}} {{$total_sales}}</th>
        <th></th>
        </tr>
        </tfoot>
					</table>
				</div>
			</div>
		</div>
		<!-- / sales -->
		
	</div>
</div>


@endsection

@push('page-js')
<script>
    $(document).ready(function() {
        var currency = "{{ AppSettings::get('app_currency', '$') }}";

        var table = $('#sales-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('sales.index') }}",
                dataSrc: function(json) {
                    // Set totals in the footer
                    $('#footer-total-price').html(currency + ' ' + parseFloat(json.total_price).toFixed(2));
                    $('#footer-total-quantity').html(json.total_quantity);
                    return json.data;
                }
            },
            columns: [
                {data: 'product', name: 'product'},
                {data: 'quantity', name: 'quantity'},
                {data: 'total_price', name: 'total_price'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'date', name: 'date'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush
