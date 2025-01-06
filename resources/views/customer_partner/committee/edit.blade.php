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
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                            <form action="{{ route('update.customer_partner', $committee->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                                            value="{{ $committee->committee_name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Ngày sinh</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" name="date_of_birth"
                                                            value="{{ $committee->date_of_birth }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Giới tính</label>
                                                    <div class="d-flex col-sm-8">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                id="male" name="gender" value="male"
                                                                {{ $committee->gender === 'male' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="male">Nam</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                id="female" name="gender" value="female"
                                                                {{ $committee->gender === 'female' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="female">Nữ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Số điện thoại</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="phone"
                                                            value="{{ $committee->phone }}">
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
                                                        <img class="profile-user-img img-fluid img-circle"
                                                            id="preview-image"
                                                            src="{{ $committee->getFirstMediaUrl('committee_image') }}"
                                                            alt="User profile picture">
                                                        <input type="file" id="image-upload" name="image"
                                                            class="d-none" accept="image/png,image/jpeg,image/jpg">
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
                                                                value="{{ $committee->unit }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Chức vụ</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="position"
                                                                value="{{ $committee->position }}">
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
                                                                value="{{ $committee->title }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Nhiệm kỳ</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="term"
                                                                value="{{ $committee->term }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Quyền điểm danh</label>
                                                        <div class="d-flex col-sm-8">
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input"
                                                                    id="present" name="attendance" value="present"
                                                                    {{ $committee->attendance === 'present' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="present">Có</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input"
                                                                    id="absent" name="attendance" value="absent"
                                                                    {{ $committee->attendance === 'absent' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="absent">Không</label>
                                                            </div>
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
                                                                <input type="text" class="form-control"
                                                                    name="id_login" value="{{ $committee->id_login }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-4 col-form-label">Trạng thái hoạt
                                                                động</label>
                                                            <div class="d-flex col-sm-8">
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="active" name="status" value="active"
                                                                        {{ $committee->status === 'active' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="active">Hoạt
                                                                        động</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="inactive" name="status" value="inactive"
                                                                        {{ $committee->status === 'inactive' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="inactive">Không
                                                                        hoạt
                                                                        động</label>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageUpload = document.getElementById('image-upload');
            const previewImage = document.getElementById('preview-image');

            if (imageUpload && previewImage) {
                previewImage.addEventListener('click', function() {
                    imageUpload.click();
                });
                imageUpload.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endsection
