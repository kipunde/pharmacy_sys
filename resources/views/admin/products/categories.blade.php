@extends('admin.layouts.app')

<x-assets.datatables />

@push('page-header')
<div class="col-sm-7 col-auto">
    <h3 class="page-title">Product Categories</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Product Categories</li>
    </ul>
</div>
<div class="col-sm-5 col">
    <a href="#add_categories" data-toggle="modal" class="btn btn-success float-right mt-2">Add Category</a>
</div>
@endpush

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="category-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>          
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="add_categories" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product Category</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <select name="type" class="form-control" required>
                            <option value="product">Product</option>
                            <option value="service">Service</option>
                            <option value="accommodation">Accommodation</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="edit_category" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('categories.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <select name="type" class="form-control edit_type" required>
                            <option value="product">Product</option>
                            <option value="service">Service</option>
                            <option value="accommodation">Accommodation</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control edit_description" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')
<script>
$(document).ready(function() {
    var table = $('#category-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('categories.index') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'type', name: 'type'},
            {data: 'description', name: 'description'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    // Edit button click
    $('#category-table').on('click', '.editbtn', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var type = $(this).data('type');
        var description = $(this).data('description');

        $('#edit_id').val(id);
        $('.edit_name').val(name);
        $('.edit_type').val(type);
        $('.edit_description').val(description);

        $('#edit_category').modal('show');
    });
});
</script>
@endpush
