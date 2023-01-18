@extends('template.dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $product->name }}</h2>
            <p class="dashboard-subtitle">Product Details</p>
        </div>

        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                    <div class="alert-danger">
                        <ol>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                    @endif
                    <form action="{{ route('product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="productname">Product Name</label>
                                            <input type="text" name="name" id="productname" class="form-control"
                                                value="{{ $product->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" id="price" class="form-control"
                                                value="{{ $product->price }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" name="category_id">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                @if ($product->category_id == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                </option>
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="description" id="editor" cols="30" rows="10">
                                                {{ $product->description }}
                                            </textarea>
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
                                @foreach ($product->galleryproduct as $gallery)
                                <div class="col-md-4 mb-3">
                                    <div class="gallery-container">
                                        <img src="{{ asset('storage/' .  $gallery->photo) }}" alt="" class="w-100" />
                                        <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}"
                                            class="delete-gallery">
                                            <img src="/images/close-btn.svg" alt="" />
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-12">
                                    <form action="{{ route('dashboard-product-gallery-upload') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="file" name="photo" id="file" class="d-none" onchange="form.submit()" />
                                        <button type="button" class="btn btn-secondary btn-block mt-3"
                                            onclick="thisfileupload()">
                                            Add Photo
                                        </button>
                                    </form>
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