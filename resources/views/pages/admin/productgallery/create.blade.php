@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product Gallery</h2>
            <p class="dashboard-subtitle">Create Product Gallery</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert-danger">
                        <ol>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                    @endif
                    <div class="card mb-5">
                        <div class="card-body">
                            <form action="{{ route('admin.galleryproduct.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="product_id">Product</label>
                                            <select class="form-control" name="product_id">
                                                <option selected disabled>Select Produk</option>
                                                @foreach ($products as $product)
                                                @if (old('product_id') == $product->id)
                                                <option value="{{ $product->id }}" selected>{{ $product->name }}
                                                </option>
                                                @else
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="photo">Foto</label>
                                            <input type="file" name="photo" id="photo" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5 ">
                                            Save Now
                                        </button>
                                    </div>
                                </div>
                            </form>
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
@endpush