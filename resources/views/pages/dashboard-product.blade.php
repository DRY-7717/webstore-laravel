@extends('template.dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Product</h2>
            <p class="dashboard-subtitle">Manage it well and get money</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <a href="dashboard-product-create.html" class="btn btn-success">Add New Product</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 col-12 col-sm-6 col-lg-3">
                    <a href="dashboard-product-detail.html" class="card card-dashboard-product d-block">
                        <div class="card-body">
                            <img src="/images/imgproduct2.png" class="w-100 mb-2" alt="">
                            <div class="product-title">Shirup Marzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-12 col-sm-6 col-lg-3">
                    <a href="dashboard-product-detail.html" class="card card-dashboard-product d-block">
                        <div class="card-body">
                            <img src="/images/imgproduct.png" class="w-100 mb-2" alt="">
                            <div class="product-title">Shirup Marzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-12 col-sm-6 col-lg-3">
                    <a href="dashboard-product-detail.html" class="card card-dashboard-product d-block">
                        <div class="card-body">
                            <img src="/images/imgproduct.png" class="w-100 mb-2" alt="">
                            <div class="product-title">Shirup Marzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-12 col-sm-6 col-lg-3">
                    <a href="dashboard-product-detail.html" class="card card-dashboard-product d-block">
                        <div class="card-body">
                            <img src="/images/imgproduct3.png" class="w-100 mb-2" alt="">
                            <div class="product-title">Shirup Marzan</div>
                            <div class="product-category">Foods</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection