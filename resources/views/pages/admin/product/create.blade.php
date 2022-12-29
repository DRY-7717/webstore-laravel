@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">Create Product</p>
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
                            <form action="{{ route('admin.product.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Product</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ old('name') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" id="price" class="form-control"
                                                value="{{ old('price') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="category_id">Kategori</label>
                                            <select class="form-control" name="category_id">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                @if (old('category_id') == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="user_id">Pemilik</label>
                                            <select class="form-control" name="user_id">
                                                <option selected disabled>Select User</option>
                                                @foreach ($users as $user)
                                                @if (old('user_id') == $user->id)
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                @else
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" id="editor" cols="30" rows="10">
                                            {{ old('description') }}
                                        </textarea>

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