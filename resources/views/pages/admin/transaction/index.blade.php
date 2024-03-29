@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard Transaction</h2>
            <p class="dashboard-subtitle">List of Transaction</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                @if (session('message'))
                {!! session('message') !!}
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudtable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Total Harga</th>
                                            <th>Status Transaksi</th>
                                            <th>Tanggal</th>
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
            {data: 'user.name', name: 'user.name'},
            {data: 'total_price', name: 'total_price'},
            {data: 'transaction_status', name: 'transaction_status'},
            {data: 'created_at', name: 'created_at'},
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