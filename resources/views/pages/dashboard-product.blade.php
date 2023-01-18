@extends('template.dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Product</h2>
            <p class="dashboard-subtitle">Manage it well and get money</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('product.create') }}" class="btn btn-success">Add New Product</a>
                </div>
            </div>
            <div class="row mt-4">
                @if ($products->count())
                @foreach ($products as $product)
                <div class="col-md-4 col-12 col-sm-6 col-lg-3">
                    <a href="{{ route('product.show', $product->id) }}" class="card card-dashboard-product d-block">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $product->galleryproduct->first()->photo) }}" class="w-100 mb-2" alt="">
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="product-category">{{ $product->category->name }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
                @else
                    <div class="row w-100">
                        <div class="col-12">
                            <h4 class="text-center">Data not Found</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection