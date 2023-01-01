@extends('layout.main')

@section('content')
<div class="page-content page-home">
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Categories</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementcategory = 0;
                @endphp
                @foreach ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up"
                    data-aos-delay="{{ $incrementcategory += 100 }}">
                    <a href="{{ route('category.show', $category->slug) }}" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('storage/' . $category->logo) }}" class="w-100" alt="" />
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
                    <h5>All Products</h5>
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
                        <div class="products-price">Rp.{{ $product->price }}</div>
                    </a>
                </div>
                @endforeach
                @else
                <h3 class="col-12 text-center text-secondary">
                    Data Not Found!
                </h3>
                @endif

            </div>




            <div class="row mt-3">
                <div class="col-12">
                    {{ $products->links() }}
                </div>
            </div>


        </div>
    </section>
</div>
@endsection