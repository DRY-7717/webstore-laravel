@extends('template.dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Update Your Current Profile</p>
        </div>

        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('dashboard-account-redirect','dashboard-accountsetting') }}" method="POST"
                        enctype="multipart/form-data" id="locations">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Your Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $user->email }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addres_one">Address 1</label>
                                            <input type="text" class="form-control" id="addres_one" name="addres_one"
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
                                            <select name="province_id" id="province_id" class="form-control"
                                                v-if="provinces" v-model="province_id">
                                                <option v-for="province in provinces" :value="province.id">@{{
                                                    province.name }}</option>
                                            </select>
                                            <select v-else class="form-control"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="regency_id">City</label>
                                            <select name="regency_id" id="regency_id" class="form-control"
                                                v-if="regencies" v-model="regency_id">
                                                <option v-for="regency in regencies" :value="regency.id">@{{
                                                    regency.name }}</option>
                                            </select>
                                            <select v-else class="form-control"></select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zip_code">Postal Code</label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                value="{{ $user->zip_code }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                value="{{ $user->country }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobilephone">Mobile Phone</label>
                                            <input type="text" class="form-control" id="mobilephone" name="phone_number"
                                                value="{{ $user->phone_number }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
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