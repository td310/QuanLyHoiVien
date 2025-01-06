@extends('customer_partner.index')
@section('customer_partner_content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách khách hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_partner') }}">Ban chấp hành</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Chi tiết ban chấp hành</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('store.customer_partner') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="card col-md-6">
                                            <div class="card-header2">
                                                <h3 class="card-title">1. Thông tin cá nhân</h3>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mã đăng nhập</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="id_login"
                                                            value="{{ old('id_login') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mã thẻ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('id_card') is-invalid @enderror"
                                                            name="id_card" value="{{ old('id_card') }}">
                                                    </div>
                                                </div>
                                                @error('id_card')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Họ và tên</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('committee_name') is-invalid @enderror"
                                                            name="committee_name" value="{{ old('committee_name') }}">
                                                    </div>
                                                </div>
                                                @error('committee_name')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Ngày sinh</label>
                                                    <div class="col-sm-8">
                                                        <input type="date"
                                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                                            name="date_of_birth" value="{{ old('date_of_birth') }}">
                                                    </div>
                                                </div>
                                                @error('date_of_birth')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Giới tính</label>
                                                    <div class="col-sm-8">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input @error('gender') is-invalid @enderror"
                                                                    id="male" name="gender" value="male" checked>
                                                                <label class="form-check-label" for="male">Nam</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input @error('gender') is-invalid @enderror"
                                                                    id="female" name="gender" value="female">
                                                                <label class="form-check-label" for="female">Nữ</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Số điện thoại</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                name="phone" value="{{ old('phone') }}">
                                                        </div>
                                                    </div>
                                                    @error('phone')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Email</label>
                                                        <div class="col-sm-8">
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}">
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Ảnh đại diện</label>
                                                        <div class="col-sm-8">
                                                            <label for="image-upload" style="cursor: pointer;">
                                                                <img class="profile-user-img img-fluid img-circle"
                                                                    id="preview-image"
                                                                    src="{{ asset('images/profile/user.png') }}"
                                                                    alt="User profile picture">
                                                            </label>
                                                            <input type="file" id="image-upload" name="image"
                                                                class="d-none @error('image') is-invalid @enderror"
                                                                accept="image/png,image/jpeg,image/jpg">
                                                            @error('image')
                                                                <span
                                                                    class="error invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">2. Thông tin đơn vị</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Thông tin đơn vị</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                class="form-control @error('unit') is-invalid @enderror"
                                                                name="unit" value="{{ old('unit') }}">
                                                            @error('unit')
                                                                <span
                                                                    class="error invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Chức vụ</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                class="form-control @error('position') is-invalid @enderror"
                                                                name="position" value="{{ old('position') }}">
                                                            @error('position')
                                                                <span
                                                                    class="error invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">3. Chức vụ hội</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Chức danh</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                class="form-control @error('title') is-invalid @enderror"
                                                                name="title" value="{{ old('title') }}">
                                                            @error('title')
                                                                <span
                                                                    class="error invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Nhiệm kỳ</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                class="form-control @error('term') is-invalid @enderror"
                                                                name="term" value="{{ old('term') }}">
                                                            @error('term')
                                                                <span
                                                                    class="error invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Quyền điểm danh</label>
                                                        <div class="d-flex col-sm-8">
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input @error('attendance') is-invalid @enderror"
                                                                    id="present" name="attendance" value="present"
                                                                    checked>
                                                                <label class="form-check-label" for="present">Có</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input @error('attendance') is-invalid @enderror"
                                                                    id="absent" name="attendance" value="absent">
                                                                <label class="form-check-label"
                                                                    for="absent">Không</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
