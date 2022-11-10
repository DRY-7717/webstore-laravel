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
                    <form action="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="Bima Arya Wicaksana" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Your Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="wicaksanabimaarya@gmail.com" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressOne">Address 1</label>
                                            <input type="text" class="form-control" id="addressOne" name="addressOne"
                                                value="Setra Duta Cemara" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="addressTwo">Address 2</label>
                                            <input type="text" class="form-control" id="addressTwo" name="addressTwo"
                                                value="Blok B2 NO. 34" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="province">Province</label>
                                            <select name="province" id="province" class="form-control">
                                                <option value="west java">West Java</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="Bandung">Bandung</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="postalcode">Postal Code</label>
                                            <input type="text" class="form-control" id="postalcode" name="postalcode"
                                                value="16515" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                value="Indonesia" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobilephone">Mobile Phone</label>
                                            <input type="text" class="form-control" id="mobilephone" name="mobilephone"
                                                value="089638307725" />
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
