@extends('index')
@section('content')
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
                            <li class="breadcrumb-item active">Chi Tiết</li>
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
                                <h3 class="card-title">Chỉnh sửa ban chấp hành</h3>
                            </div>
                            <!-- /.card-header -->
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                                        value="{{ $committee->id_login }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-4 col-form-label">Mã thẻ</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="id_card"
                                                        value="{{ $committee->id_card }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-4 col-form-label">Họ và tên</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="committee_name"
                                                        value="{{ $committee->committee_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-4 col-form-label">Ngày sinh</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="date_of_birth"
                                                        value="{{ $committee->date_of_birth }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-4 col-form-label">Giới tính</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="gender"
                                                        value="{{ $committee->gender }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-4 col-form-label">Số điện thoại</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ $committee->phone }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $committee->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-4 col-form-label" for="image-upload"
                                                    style="cursor: pointer;">Hình ảnh</label>
                                                <div class="col-sm-8">
                                                    <img class="profile-user-img img-fluid img-circle" id="preview-image"
                                                        src="{{ $committee->getFirstMediaUrl('committee_image') }}"
                                                        alt="User profile picture">
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
                                                    <label class="col-sm-4 col-form-label">Tên đơn vị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="unit"
                                                            value="{{ $committee->unit }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Chức vụ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="position"
                                                            value="{{ $committee->position }}" readonly>
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
                                                        <input type="text" class="form-control" name="title"
                                                            value="{{ $committee->title }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Nhiệm kỳ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="term"
                                                            value="{{ $committee->term }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col mt-3">
                                            <div class="card-header2">
                                                <h3 class="card-title">4. Thông tin tài khoản</h3>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Thông tin đăng
                                                        nhập</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="id_login"
                                                            value="{{ $committee->id_login }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Trạng thái hoạt
                                                        động</label>
                                                    <div class="col-sm-8">
                                                        @if($committee->status == 'active')
                                                            <span class="badge badge-success">Hoạt động</span>
                                                        @else
                                                            <span class="badge badge-danger">Không hoạt động</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
