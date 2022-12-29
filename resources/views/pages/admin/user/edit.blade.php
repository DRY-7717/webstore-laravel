@extends('template.admin-dashboard')


@section('content')
<!-- Sectoion Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">User</h2>
            <p class="dashboard-subtitle">Edit User</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.user.update', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nama User</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name',$user->name) }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email User</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email',$user->email) }}" />
                                            <small class="text-primary">Kosongkan jika tidak ingin diubah</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password User</label>
                                        <input type="password" name="password" id="password" class="form-control" />
                                        <small class="text-primary">Kosongkan jika tidak ingin diubah</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role">
                                            <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
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