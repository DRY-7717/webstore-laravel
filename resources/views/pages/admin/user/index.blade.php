@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard User</h2>
            <p class="dashboard-subtitle">List of User</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                @if (session('message'))
                {!! session('message') !!}
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">+ Create New
                                User</a>

                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudtable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
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
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
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