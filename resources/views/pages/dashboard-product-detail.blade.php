@extends('template.dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Shirup Marzan</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>

        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="productname">Product Name</label>
                                            <input type="text" name="productname" id="productname"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" id="price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" id="editor" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5 btn-block">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="/images/imgproduct.png" alt="" class="w-100" />
                                        <a href="" class="delete-gallery">
                                            <img src="/images/close-btn.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="/images/imgproduct2.png" alt="" class="w-100" />
                                        <a href="" class="delete-gallery">
                                            <img src="/images/close-btn.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="/images/imgproduct3.png" alt="" class="w-100" />
                                        <a href="" class="delete-gallery">
                                            <img src="/images/close-btn.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="file" name="" id="file" class="d-none" multiple />
                                    <button class="btn btn-secondary btn-block mt-3" onclick="thisfileupload()">
                                        Add Photo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector("#editor"))
            .then((editor) => {
              console.log(editor);
            })
            .catch((error) => {
              console.error(error);
            });
</script>
<script>
    function thisfileupload() {
            document.getElementById("file").click();
          }
</script>
@endpush