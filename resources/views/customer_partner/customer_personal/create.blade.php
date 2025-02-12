@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Thêm mới khách hàng cá nhân</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_partner') }}">Khách hàng cá nhân</a>
                            </li>
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
                            <!-- /.card-header -->
                            <form action="{{route('store.customer_personal')}}" method="POST">
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
                                                            class="form-control @error('personal_customer_name') is-invalid @enderror"
                                                            name="personal_customer_name"
                                                            value="{{ old('personal_customer_name') }}">
                                                    </div>
                                                </div>
                                                @error('personal_customer_name')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Chức vụ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('position') is-invalid @enderror"
                                                            name="position"
                                                            value="{{ old('position') }}">
                                                    </div>
                                                </div>
                                                @error('position')
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
                                                    <label class="col-sm-4 col-form-label">Đơn vị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('unit') is-invalid @enderror"
                                                            name="unit" value="{{ old('unit') }}">
                                                    </div>
                                                </div>
                                                @error('unit')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
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
                                                            <select class="form-control" name="major_id"
                                                                id="major-select">
                                                                <option value="">Chọn ngành</option>
                                                                @foreach ($majors as $major)
                                                                    <option value="{{ $major->id }}">
                                                                        {{ $major->major_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control select2" id="field-select"
                                                                name="feild_id" style="width: 100%;" disabled>
                                                                <option value="">Chọn lĩnh vực</option>
                                                            </select>
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
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">4. Thông tin tài khoản</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Tình trạng hoạt động</label>
                                                        <div class="d-flex col-sm-8">
                                                            <div class="form-check">
                                                                <input type="radio" 
                                                                    class="form-check-input @error('status') is-invalid @enderror"
                                                                    id="active" name="status" value="active" checked>
                                                                <label class="form-check-label" for="active">Có</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio"
                                                                    class="form-check-input @error('status') is-invalid @enderror"
                                                                    id="inactive" name="status" value="inactive">
                                                                <label class="form-check-label" for="inactive">Không</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary  mr-2">Thêm</button>
                                    <a class="btn btn-secondary" href="{{route('index.customer_personal')}}">Đóng</a>
                                </div>>
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
            const majorSelect = document.getElementById('major-select');
            const fieldSelect = document.getElementById('field-select');

            majorSelect.addEventListener('change', function() {
                const majorId = this.value;
                if (majorId) {
                    fieldSelect.disabled = false;
                    fetch(`/api/fields-by-major/${majorId}`)
                        .then(response => response.json())
                        .then(data => {
                            fieldSelect.innerHTML = '<option value="">Chọn lĩnh vực</option>';
                            data.forEach(field => {
                                fieldSelect.innerHTML +=
                                    `<option value="${field.id}">${field.field_name}</option>`;
                            });
                        })
                        .catch(error => console.error('Error fetching fields:', error));
                } else {
                    fieldSelect.disabled = true;
                    fieldSelect.innerHTML = '<option value="">Chọn lĩnh vực</option>';
                }
            });
        });
    </script>
@endsection
