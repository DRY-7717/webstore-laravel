@extends('layout.main')

@section('content')

<div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Product Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-gallery" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-9" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activephoto].url" :key="photos[activephoto].id" alt="" class="w-100 h-100" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeactive(index)">
                                <img :src="photo.url" alt="" class="w-100 thumbnail-image"
                                    :class="{ active: index == activephoto }" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h1>{{ $product->name }}</h1>
                        <div class="owner">By {{ $product->user->store_name }}</div>
                        <div class="price">Rp.{{ number_format($product->price) }}</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        @auth
                        <form action="{{ route('detail-add',$product->id) }}" class="d-inline" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">
                                Add to Cart</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
                            Sign in to Add</a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </section>
        <section class="store-review">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 mt-3 mb-3">
                        <h5>Customer Review (3)</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-9 mt-3 mb-3">
                        <div class="media">
                            <img src="/images/profile.png" class="mr-3" alt="..." />
                            <div class="media-body">
                                <h5 class="mt-0">Jembut Macan</h5>
                                <p>
                                    Will you do the same for me? It's time to face the music
                                    I'm no longer your muse. Heard it's beautiful, be the
                                    judge and my girls gonna take a vote.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 mt-3 mb-3">
                        <div class="media">
                            <img src="/images/profile.png" class="mr-3 w-full" alt="..." />
                            <div class="media-body">
                                <h5 class="mt-0">Jembut Macan</h5>
                                <p>
                                    Will you do the same for me? It's time to face the music
                                    I'm no longer your muse. Heard it's beautiful, be the
                                    judge and my girls gonna take a vote.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 mt-3 mb-3">
                        <div class="media">
                            <img src="/images/profile.png" class="mr-3" alt="..." />
                            <div class="media-body">
                                <h5 class="mt-0">Jembut Macan</h5>
                                <p>
                                    Will you do the same for me? It's time to face the music
                                    I'm no longer your muse. Heard it's beautiful, be the
                                    judge and my girls gonna take a vote.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    let gallery = new Vue({
            el: "#gallery",
            mounted() {
              AOS.init();
            },
            data: {
              activephoto: 0,
              photos: [
                @foreach ($product->galleryproduct as $gallery)
                {
                    id: {{ $gallery->id }},
                    url: "{{ asset('storage/'. $gallery->photo) }}",
                },
                @endforeach
              ],
            },
    
            methods: {
              changeactive(id) {
                this.activephoto = id;
              },
            },
          });
</script>
@endpush