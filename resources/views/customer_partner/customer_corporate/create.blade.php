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
                            <li class="breadcrumb-item"><a href="">Khách hàng doanh nghiệp</a></li>
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
                                <h3 class="card-title">Tạo mới khách hàng doanh nghiệp</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Thông tin doanh nghiệp -->
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">1. Thông tin doanh nghiệp</h3>
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
                                                        <label class="col-sm-5 col-form-label">Điện thoại</label>
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
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Fanpage</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('fanpage') is-invalid @enderror"
                                                                name="fanpage" value="{{ old('fanpage') }}">
                                                        </div>
                                                    </div>
                                                    @error('fanpage')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Ngày thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="date"
                                                                class="form-control @error('date_of_establishment') is-invalid @enderror"
                                                                name="date_of_establishment"
                                                                value="{{ old('date_of_establishment') }}">
                                                        </div>
                                                    </div>
                                                    @error('date_of_establishment')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Vốn điều lệ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('charter_capital') is-invalid @enderror"
                                                                name="charter_capital"
                                                                value="{{ old('charter_capital') }}">
                                                        </div>
                                                    </div>
                                                    @error('charter_capital')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Doanh thu trước gia
                                                            nhập</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('revenue') is-invalid @enderror"
                                                                name="revenue" value="{{ old('revenue') }}">
                                                        </div>
                                                    </div>
                                                    @error('revenue')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}">
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Ngành - Lĩnh vực -->
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">2. Ngành - Lĩnh vực</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Ngành</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id=""
                                                                name="major_id" required style="width: 100%;">
                                                                <option value="">Chọn ngành</option>
                                                                <option>

                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id=""
                                                                name="feild_id" required style="width: 100%;">
                                                                <option value="">Chọn lĩnh vực</option>
                                                                <option>

                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Thị trường -->
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">3. Thị trường</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Thị trường</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id=""
                                                                name="market_id" required style="width: 100%;">
                                                                <option value="">Chọn thị trường</option>
                                                                <option>

                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Khách hàng mục tiêu -->
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">4. Khách hàng mục tiêu</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Khách hàng mục tiêu</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id=""
                                                                name="target_customer_id" required style="width: 100%;">
                                                                <option value="">Chọn khách hàng mục tiêu</option>
                                                                <option>

                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Quy mô doanh nghiệp -->
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">5. Quy mô doanh nghiệp</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-12">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="50-100" name="size_company" value="50-100"
                                                                        checked>
                                                                    <label class="form-check-label" for="50-100">50-100
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="100-200" name="size_company"
                                                                        value="100-200">
                                                                    <label class="form-check-label" for="100-200">100-200
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="200-500" name="size_company"
                                                                        value="200-500">
                                                                    <label class="form-check-label" for="200-500">200-500
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="500" name="size_company"
                                                                        value="500">
                                                                    <label class="form-check-label" for="500">Trên
                                                                        500 người</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">6. Chứng chỉ và giải thưởng</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Chứng chỉ</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id=""
                                                                name="market_id" required style="width: 100%;">
                                                                <option value="">Chọn thị trường</option>
                                                                <option>

                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Giải thưởng</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('prize') is-invalid @enderror"
                                                                name="prize" value="{{ old('prize') }}">
                                                        </div>
                                                    </div>
                                                    @error('prize')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Bằng khen, giấy khen</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('award_certificate') is-invalid @enderror"
                                                                name="award_certificate"
                                                                value="{{ old('award_certificate') }}">
                                                        </div>
                                                    </div>
                                                    @error('award_certificate')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Lãnh đạo đơn vị -->
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">7. Lãnh đạo đơn vị</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="connection_manager_name"
                                                                value="{{ old('connection_manager_name') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="position"
                                                                value="{{ old('position') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="phone"
                                                                value="{{ old('phone') }}">
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
                                                                        id="male" name="gender" value="male"
                                                                        checked>
                                                                    <label class="form-check-label"
                                                                        for="male">Nam</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio"
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        id="female" name="gender" value="female">
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
                                                                name="email_connection"
                                                                value="{{ old('email_connection') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">8. Phụ trách kết nối</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="connection_manager_name"
                                                                value="{{ old('connection_manager_name') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="position"
                                                                value="{{ old('position') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="phone"
                                                                value="{{ old('phone') }}">
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
                                                                        id="male" name="gender" value="male"
                                                                        checked>
                                                                    <label class="form-check-label"
                                                                        for="male">Nam</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio"
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        id="female" name="gender" value="female">
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
                                                                name="email_connection"
                                                                value="{{ old('email_connection') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mb-3">
                                                    <button type="button" class="btn btn-primary">
                                                        Thêm mới
                                                    </button>
                                                </div>
                                            </div>
                                            {{-- <!-- Câu lạc bộ -->
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">9. Câu lạc bộ/h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Câu lạc bộ</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id=""
                                                                name="club_id" required style="width: 100%;">
                                                                <option value="">Chọn câu lạc bộ</option>
                                                                <option>

                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
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
