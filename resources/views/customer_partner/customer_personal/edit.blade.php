@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chỉnh sửa khách hàng cá nhân</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_partner') }}">Khách hàng cá nhân</a>
                            </li>
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
                                <h3 class="card-title">Chỉnh sửa khách hàng cá nhân</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('update.customer_personal', $customer->id) }}" method="POST">
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
                                                            value="{{ $customer->id_login }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mã thẻ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="id_card"
                                                            value="{{ $customer->id_card }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Họ và tên</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="personal_customer_name"
                                                            value="{{ $customer->personal_customer_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Chức vụ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="position"
                                                            value="{{ $customer->position }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Ngày sinh</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" name="date_of_birth"
                                                            value="{{ $customer->date_of_birth }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Giới tính</label>
                                                    <div class="d-flex col-sm-8">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="male"
                                                                name="gender" value="male"
                                                                {{ $customer->gender === 'male' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="male">Nam</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="female"
                                                                name="gender" value="female"
                                                                {{ $customer->gender === 'female' ? 'checked' : '' }}>
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
                                                            value="{{ $customer->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ $customer->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đơn vị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="unit"
                                                            value="{{ $customer->unit }}">
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
                                                        <label class="col-sm-5 col-form-label">Ngành</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control" name="major_id"
                                                                id="major-select">
                                                                <option value="">Chọn ngành</option>
                                                                @foreach ($majors as $major)
                                                                    <option value="{{ $major->id }}"
                                                                        {{ old('major_id', $customer->major_id) == $major->id ? 'selected' : '' }}>
                                                                        {{ $major->major_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id="field-select"
                                                                name="feild_id">
                                                                <option value="">Chọn lĩnh vực</option>
                                                                @if ($customer->field)
                                                                    <option value="{{ $customer->feild_id }}" selected>
                                                                        {{ $customer->field->field_name }}
                                                                    </option>
                                                                @endif
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
                                                            <input type="text" class="form-control" name="title"
                                                                value="{{ $customer->title }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Nhiệm kỳ</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="term"
                                                                value="{{ $customer->term }}">
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
                                                        <div class="d-flex col-sm-8">
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input"
                                                                    id="active" name="status" value="active"
                                                                    {{ $customer->status === 'active' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="active">Hoạt
                                                                    động</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input"
                                                                    id="inactive" name="status" value="inactive"
                                                                    {{ $customer->status === 'inactive' ? 'checked' : '' }}>
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

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary  mr-2">Chỉnh sửa</button>
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
