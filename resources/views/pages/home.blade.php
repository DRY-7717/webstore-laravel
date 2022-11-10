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
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <a href="" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="images/gadget.svg" class="w-100" alt="" />
                            </div>
                            <p class="categories-text">Gadget</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                        <a href="" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="images/furniture.svg" class="w-100" alt="" />
                            </div>
                            <p class="categories-text">furniture</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                        <a href="" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="images/makeup.svg" class="w-100" alt="" />
                            </div>
                            <p class="categories-text">Make up</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                        <a href="" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="images/sneakers.svg" class="w-100" alt="" />
                            </div>
                            <p class="categories-text">Sneakers</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                        <a href="" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="images/tools.svg" class="w-100" alt="" />
                            </div>
                            <p class="categories-text">Tools</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                        <a href="" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="images/baby.svg" class="w-100" alt="" />
                            </div>
                            <p class="categories-text">Baby</p>
                        </a>
                    </div>
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
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/1.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/2.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/3.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/4.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/5.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/6.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="700">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/7.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                        <a href="detail.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                          background: url('/images/8.jpg');
                          background-size: cover;
                          background-position: center;
                          background-repeat: no-repeat;
                        "></div>
                            </div>
                            <div class="products-text">Orange Bogotta</div>
                            <div class="products-price">$94,509</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection