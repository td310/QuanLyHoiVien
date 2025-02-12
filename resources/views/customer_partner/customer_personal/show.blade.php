@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chi tiết khách hàng cá nhân</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_personal') }}">Khách hàng cá nhân</a></li>
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
                                <h3 class="card-title">Chi tiết khách hàng cá nhân</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="" method="POST">
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
                                                            value="{{ $customer->id_login }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mã thẻ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="id_card"
                                                            value="{{ $customer->id_card }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Họ và tên</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="personal_customer_name"
                                                            value="{{ $customer->personal_customer_name }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Ngày sinh</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" name="date_of_birth"
                                                            value="{{ $customer->date_of_birth }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Giới
                                                        tính</label>
                                                    <div class="col-sm-7">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input"
                                                                    {{ $customer->gender == 'male' ? 'checked' : '' }}
                                                                    disabled>
                                                                <label class="form-check-label">Nam</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input"
                                                                    {{ $customer->gender == 'female' ? 'checked' : '' }}
                                                                    disabled>
                                                                <label class="form-check-label">Nữ</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Số điện thoại</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="phone"
                                                            value="{{ $customer->phone }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ $customer->email }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đơn vị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="unit"
                                                            value="{{ $customer->unit }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">2. Ngành - Lĩnh vực</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Ngành</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                value="{{ $customer->major->major_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                value="{{ $customer->field->field_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">3. Ban chấp hành</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Chức danh</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="title"
                                                                value="{{ $customer->title }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Nhiệm kỳ</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="term"
                                                                value="{{ $customer->term }}" readonly>
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
                                                        <label class="col-sm-4 col-form-label">Trạng thái hoạt
                                                            động</label>
                                                        <div class="col-sm-8">
                                                            @if($customer->status == 'active')
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
