@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            <p class="dashboard-subtitle">This is Bougenville Store Administrator</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Customer</div>
                            <div class="dashboard-card-subtitle">{{ $customer }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">Rp.{{ $revenue }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaction</div>
                            <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transactions</h5>
                    <a href="dashboard-transaction-details.html" class="card card-list d-block ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/imgdashboard.png" alt="" />
                                </div>
                                <div class="col-md-4">Syrup Marzan</div>
                                <div class="col-md-3">Bima Arya Wicaksana</div>
                                <div class="col-md-3">12 Januari 2020</div>
                                <div class="col-md-1 d-none d-md-block ">
                                    <img src="/images/dashboard-arrow-right.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="dashboard-transaction-details.html" class="card card-list d-block ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/imgdashboard2.png" alt="" />
                                </div>
                                <div class="col-md-4">Syrup Marzan</div>
                                <div class="col-md-3">Bima Arya Wicaksana</div>
                                <div class="col-md-3">12 Januari 2020</div>
                                <div class="col-md-1 d-none d-md-block ">
                                    <img src="/images/dashboard-arrow-right.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="dashboard-transaction-details.html" class="card card-list d-block ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/imgdashboard3.png" alt="" />
                                </div>
                                <div class="col-md-4">Syrup Marzan</div>
                                <div class="col-md-3">Bima Arya Wicaksana</div>
                                <div class="col-md-3">12 Januari 2020</div>
                                <div class="col-md-1 d-none d-md-block ">
                                    <img src="/images/dashboard-arrow-right.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection