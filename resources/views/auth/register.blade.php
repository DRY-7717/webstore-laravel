@extends('layout.auth')


@section('title')
Webstore Laravel | Register
@endsection
@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
                <div class="col-lg-5">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>
                    <form action="{{ route('register') }}" class="mt-3" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                v-model="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input  id="email" type="email" class="form-control 
                            @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                                autocomplete="email" :class="{'is-invalid' : this.email_unavailable}" v-model="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input @keyup.tab="checkEmail" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Password Confrimation</label>
                            <input  id="cpassword" type="password"
                                class="form-control @error('cpassword') is-invalid @enderror" name="cpassword" required
                                autocomplete="new-password">

                            @error('cpassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Store</label>
                            <p class="text-muted">Apakah anda ingin membuka toko?</p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue"
                                    v-model="is_store_open" :value="true" />
                                <label for="openStoreTrue" class="custom-control-label">Iya, Boleh</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="is_store_open"
                                    id="openStoreFalse" v-model="is_store_open" :value="false" />
                                <label for="openStoreFalse" class="custom-control-label">Engga, Terima Kasih</label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="store_name">Nama Toko</label>
                            <input id="store_name" type="text"
                                class="form-control @error('store_name') is-invalid @enderror" name="store_name"
                                required autocomplete>

                            @error('store_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success btn-block mt-4"
                            :disabled="this.email_unavailable">Sign up Now</button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                            Back to Signin
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    Vue.use(Toasted);
    
    let register = new Vue({
        el: "#register",
        mounted() {
            AOS.init();
        },
        methods: {

            checkEmail : function () { 
                var self = this;
                axios.get('{{ route('api-register-check') }}',{
                    params : {
                        email : self.email
                    }
                }).then(function (response) {
                    if (response.data == 'available') {
                        self.$toasted.success("Email kamu belum terdaftar silahka lanjutkan langkah selanjutnya!", {
                            position: "top-center",
                            className: "rounded",
                            duration: 1000,
                        });
                        self.email_unavailable = false
                    }else{
                        self.$toasted.error("Maaf, Email sudah terdaftar disistem kami!", {
                            position: "top-center",
                            className: "rounded",
                            duration: 1000,
                        });
                        self.email_unavailable = true
                    }
                    
                    console.log(response);
                });
            }
        },
        data() {
            return {
                name: "Bima Arya Wicaksana",
                email: "wicaksanabimaarya@gmail.com",
                is_store_open: true,
                store_name: "",
                email_unavailable: false,
                }
            },
          });
</script>
@endpush