@extends('layout.main')

@section('content')
<div class="page-content page-home">
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-interval="1500">
                                <img src="images/banner.jpg" class="d-block w-100" alt="..." />
                            </div>
                            <div class="carousel-item" data-interval="1500">
                                <img src="images/banner.jpg" class="d-block w-100" alt="..." />
                            </div>
                            <div class="carousel-item" data-interval="1500">
                                <img src="images/banner.jpg" class="d-block w-100" alt="..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>Trend Categories</h5>
                </div>
            </div>
            <div class="row">
                @php
                $increementcategory = 0;
                @endphp
                @foreach ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up"
                    data-aos-delay="{{ $increementcategory += 100 }}">
                    <a href="{{ route('category.show', $category->slug) }}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('storage/'. $category->logo) }}" class="w-100" alt="" />
                        </div>
                        <p class="categories-text">{{ $category->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>New Product</h5>
                </div>
            </div>
            <div class="row">
                @php
                $increementproduct = 0;
                @endphp
                @if ($products->count())
                @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $increementproduct += 100}}">
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="@if ($product->galleryproduct->count())
                                background: url('{{ asset('storage/' . $product->galleryproduct->first()->photo) }}');
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                            @else
                                background-color : #eeeeee;
                            @endif">

                            </div>
                        </div>
                        <div class="products-text">{{ $product->name }}</div>
                        <div class="products-price">Rp.{{ number_format($product->price) }}</div>
                    </a>
                </div>
                @endforeach
                @else
                <h3 class="col-12 text-center text-secondary">
                    Data Not Found!
                </h3>
                @endif

            </div>
        </div>
    </section>
</div>
@endsection