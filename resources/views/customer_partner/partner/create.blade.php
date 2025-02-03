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
                            <li class="breadcrumb-item"><a href="{{ route('index.partner') }}">Đối tác doanh
                                    nghiệp</a>
                            </li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if ($errors->any() || session('error'))
            <div class="card-body">
                <div class="alert alert-danger">
                    <p class="font-weight-bold">Errors:</p>
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                    @if (session('error'))
                        <p class="mb-0">{{ session('error') }}</p>
                    @endif
                </div>
            </div>
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thêm mới khách hàng cá nhân</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('store.partner') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="card col-md-6">
                                            <div class="card-header2">
                                                <h3 class="card-title">1. Thông tin cá nhân</h3>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Mã đăng nhập</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="id_login"
                                                            value="{{ old('id_login') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Mã thẻ</label>
                                                    <div class="col-sm-7">
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
                                                    <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                        Việt)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('company_vn') is-invalid @enderror"
                                                            name="company_vn" value="{{ old('company_vn') }}">
                                                    </div>
                                                </div>
                                                @error('company_vn')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                        Anh)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('company_en') is-invalid @enderror"
                                                            name="company_en" value="{{ old('company_en') }}">
                                                    </div>
                                                </div>
                                                @error('company_en')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tên viết
                                                        tắt)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('company_acronym') is-invalid @enderror"
                                                            name="company_acronym" value="{{ old('company_acronym') }}">
                                                    </div>
                                                </div>
                                                @error('company_acronym')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Phân loại</label>
                                                    <div class="d-flex col-sm-8">
                                                        <div class="form-check">
                                                            <input type="radio"
                                                                class="form-check-input @error('nation') is-invalid @enderror"
                                                                id="vietnam" name="nation" value="vietnam" checked>
                                                            <label class="form-check-label" for="vietnam">Việt Nam</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio"
                                                                class="form-check-input @error('nation') is-invalid @enderror"
                                                                id="national" name="nation" value="national">
                                                            <label class="form-check-label" for="national">Quốc tế</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Địa chỉ trụ sở chính</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('main_address') is-invalid @enderror"
                                                            name="main_address" value="{{ old('main_address') }}">
                                                    </div>
                                                </div>
                                                @error('main_address')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Địa chỉ văn phòng giao
                                                        dịch</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('office_address') is-invalid @enderror"
                                                            name="office_address" value="{{ old('office_address') }}">
                                                    </div>
                                                </div>
                                                @error('office_address')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Mã số thuế</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('tax_number') is-invalid @enderror"
                                                            name="tax_number" value="{{ old('tax_number') }}">
                                                    </div>
                                                </div>
                                                @error('tax_number')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                    <div class="col-sm-7">
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
                                                    <label class="col-sm-5 col-form-label">Website</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('website') is-invalid @enderror"
                                                            name="website" value="{{ old('website') }}">
                                                    </div>
                                                </div>
                                                @error('website')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">2. Lãnh đạo đơn vị</h3>
                                                </div>
                                                <input type="hidden" name="leader[is_leader]" value="1">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="leader[connection_manager_name]"
                                                                value="{{ old('leader.connection_manager_name') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="leader[position]"
                                                                value="{{ old('leader.position') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="leader[phone]" value="{{ old('leader.phone') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Giới tính</label>
                                                        <div class="col-sm-7">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check">
                                                                    <input type="radio"
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        id="male" name="leader[gender]"
                                                                        value="male" checked>
                                                                    <label class="form-check-label"
                                                                        for="male">Nam</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio"
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        id="female" name="leader[gender]"
                                                                        value="female">
                                                                    <label class="form-check-label"
                                                                        for="female">Nữ</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="leader[email_connection]"
                                                                value="{{ old('leader.email_connection') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">3. Phụ trách kết nối</h3>
                                                </div>
                                                <div id="managers-container">
                                                    <div class="manager-group" id="manager-0">
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control"
                                                                        name="managers[0][connection_manager_name]"
                                                                        value="{{ old('managers.0.connection_manager_name') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control"
                                                                        name="managers[0][position]"
                                                                        value="{{ old('managers.0.position') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Số điện
                                                                    thoại</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control"
                                                                        name="managers[0][phone]"
                                                                        value="{{ old('managers.0.phone') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Giới tính</label>
                                                                <div class="col-sm-7">
                                                                    <div class="d-flex align-items-center gap-3">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="male-0" name="managers[0][gender]"
                                                                                value="male"
                                                                                {{ old('managers.0.gender') == 'male' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="male-0">Nam</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="female-0" name="managers[0][gender]"
                                                                                value="female"
                                                                                {{ old('managers.0.gender') == 'female' ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="female-0">Nữ</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Email</label>
                                                                <div class="col-sm-7">
                                                                    <input type="email" class="form-control"
                                                                        name="managers[0][email_connection]"
                                                                        value="{{ old('managers.0.email_connection') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mb-3">
                                                    <button type="button" class="btn btn-primary add-manager">
                                                        <i class="fas fa-plus"></i> Thêm người phụ trách
                                                    </button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                                    <a class="btn btn-secondary" href="{{route('index.partner')}}">Đóng</a>
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
            let managerCount = document.querySelectorAll('.manager-group').length || 0;

            document.querySelector('.add-manager')?.addEventListener('click', function() {
                managerCount++;
                const newManager = `
                <div class="manager-group" id="manager-${managerCount}">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5>Người phụ trách ${managerCount}</h5>
                        <button type="button" class="btn btn-danger btn-sm remove-manager">-</button>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Họ và tên</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][connection_manager_name]" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Chức vụ</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][position]" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Số điện thoại</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][phone]" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Giới tính</label>
                            <div class="col-sm-7">
                                <div class="d-flex">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" id="male-${managerCount}" 
                                            name="managers[${managerCount}][gender]" value="male" >
                                        <label class="form-check-label" for="male-${managerCount}">Nam</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="female-${managerCount}" 
                                            name="managers[${managerCount}][gender]" value="female">
                                        <label class="form-check-label" for="female-${managerCount}">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][email_connection]" >
                            </div>
                        </div>
                    </div>
                </div>
            `;
                document.getElementById('managers-container').insertAdjacentHTML('beforeend', newManager);
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-manager')) {
                    e.target.closest('.manager-group').remove();
                }
            });
        });
    </script>
@endsection
