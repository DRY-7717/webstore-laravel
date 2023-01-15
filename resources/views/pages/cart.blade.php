@extends('layout.main')

@section('content')

<div class="page-content page-cart">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Cart
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-12 table-responsive">
                    <table class="table table-borderless table-cart">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name & Seller</td>
                                <td>Price</td>
                                <td>Menu</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalprice = 0;
                            @endphp
                            @foreach ($carts as $cart)
                            <tr>
                                <td style="width: 17%">
                                    <img src="{{ asset('storage/'. $cart->product->galleryproduct->first()->photo) }}"
                                        alt="" class="cart-image" />
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">{{ $cart->product->name }}</div>
                                    <div class="product-subtitle">by {{ $cart->product->store_name }}</div>
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">Rp.{{ number_format($cart->product->price,0,".",".") }}
                                    </div>
                                    <div class="product-subtitle">Rupiah</div>
                                </td>
                                <td style="width: 20%">
                                    <form action="{{ route('delete-cart', $cart->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-remove-cart"> Remove </button>
                                    </form>
                                </td>
                            </tr>
                            @php
                            $totalprice += $cart->product->price;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Shipping Details</h2>
                </div>
            </div>
            <form action="{{ route('checkout') }}" method="post" id="locations" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="total_price" value="{{ $totalprice }}">
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_one">Address 1</label>
                            <input type="text" class="form-control" id="address_one" name="address_one"
                                value="Setra Duta Cemara" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_two">Address 2</label>
                            <input type="text" class="form-control" id="address_two" name="address_two"
                                value="Blok B2 NO. 34" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="province_id">Province</label>
                            <select name="province_id" id="province_id" class="form-control" v-if="provinces"
                                v-model="province_id">
                                <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regency_id">City</label>
                            <select name="regency_id" id="regency_id" class="form-control" v-if="regencies"
                                v-model="regency_id">
                                <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="16515" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="Indonesia" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Mobile Phone</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="089638307725" />
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-1">Payment Information</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                        <div class="product-title">$0</div>
                        <div class="product-subtitle">Country Tax</div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="product-title">$0</div>
                        <div class="product-subtitle">Product Insurance</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title">$0</div>
                        <div class="product-subtitle">Ship to Jakarta</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title text-success">Rp.{{ number_format($totalprice,0,".",".") }}</div>
                        <div class="product-subtitle">Total</div>
                    </div>
                    <div class="col-8 col-md-3">
                        <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Check Out Now</button>
                    </div>
                </div>
            </form>


        </div>
    </section>
</div>
@endsection
@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let locations = new Vue({
            el: "#locations",
            mounted() {
              AOS.init();
              this.getProvincesData()
            },
            data: {
                provinces : null,
                regencies : null,
                province_id : null,
                regency_id : null,
            },
    
            methods: {
              getProvincesData(){
                let self = this
                axios.get('{{ route('api-provinces') }}')
                .then(function (response) { 
                    self.provinces = response.data
                 })
              },
              getRegenciesData(){
                let self = this
                axios.get('{{ url('api/regencies') }}/' + self.province_id)
                .then(function (response) {
                self.regencies = response.data
                })
              },
            },
            watch:{
                province_id : function (val, oldval) { 
                    this.regency_id = null
                    this.getRegenciesData();
                 }
            }
          });
</script>
@endpush