@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard Product</h2>
            <p class="dashboard-subtitle">List of Product</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                @if (session('message'))
                {!! session('message') !!}
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">+ Create New
                                Product</a>

                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudtable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Pemilik</th>
                                            <th>Kategori</th>
                                            <th>price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





@push('addon-script')
<script>
    let datatable = $('#crudtable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax : {
            url : '{!! url()->current() !!}'
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'user.name', name: 'user.name'},
            {data: 'category.name', name: 'category.name'},
            {data: 'price', name: 'price'},
            {
                data: 'action', 
                name: 'action',
                orderable: false,
                searcable: false,
                width: '15%' 
            }
        ]
    })
</script>
@endpush