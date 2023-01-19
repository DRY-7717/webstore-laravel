@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">Edit Product</p>
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
                            <form action="{{ route('admin.transaction.update', $transaction->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="user_id">Status</label>
                                            <select class="form-control" name="transaction_status">
                                                <option value="{{ $transaction->transaction_status }}" selected>{{ $transaction->transaction_status }}</option>
                                                <option value="PENDING">PENDING</option>
                                                <option value="SHIPPING">SHIPPING</option>
                                                <option value="SUCCESS">SUCCESS</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="total_price">Total Harga</label>
                                            <input type="text" name="total_price" id="total_price" class="form-control"
                                                value="{{ old('total_price', $transaction->total_price) }}" />
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