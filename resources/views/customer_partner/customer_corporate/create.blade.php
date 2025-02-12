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
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_corporate') }}">Khách hàng doanh
                                    nghiệp</a>
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
                            <form action="{{ route('store.customer_corporate') }}" method="POST">
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
                                                        <label class="col-sm-5 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id="field-select"
                                                                name="feild_id" style="width: 100%;" disabled>
                                                                <option value="">Chọn lĩnh vực</option>
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
                                                            <select class="form-control select2" name="market_id">
                                                                <option value="">Chọn thị trường</option>
                                                                @foreach ($markets as $market)
                                                                    <option value="{{ $market->id }}">
                                                                        {{ $market->market_name }}</option>
                                                                @endforeach
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
                                                            <select class="form-control select2"
                                                                name="target_customer_id">
                                                                <option value="">Chọn mục tiêu khách hàng</option>
                                                                @foreach ($targets as $target)
                                                                    <option value="{{ $target->id }}">
                                                                        {{ $target->target_customer_name }}</option>
                                                                @endforeach
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
                                                                        {{ old('size_company') == '50-100' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="50-100">50-100
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="101-200" name="size_company"
                                                                        value="101-200"
                                                                        {{ old('size_company') == '101-200' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="101-200">101-200
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="201-500" name="size_company"
                                                                        value="201-500"
                                                                        {{ old('size_company') == '201-500' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="201-500">201-500
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="more500" name="size_company" value=">500"
                                                                        {{ old('size_company') == '>500' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="more500">Trên
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
                                                            <select class="form-control select2" name="certificate_id">
                                                                <option value="">Chọn chứng chỉ</option>
                                                                @foreach ($certificates as $certificate)
                                                                    <option value="{{ $certificate->id }}">
                                                                        {{ $certificate->certificate_name }}</option>
                                                                @endforeach
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
                                                    <h3 class="card-title">8. Phụ trách kết nối</h3>
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
                                            <!-- Câu lạc bộ -->
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">9. Câu lạc bộ</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Câu lạc bộ</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" name="club_id">
                                                                <option value="">Chọn câu lạc bộ</option>
                                                                @foreach ($clubs as $club)
                                                                    <option value="{{ $club->id }}">
                                                                        {{ $club->club_name_vn }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-secondary  mr-2" href="{{ route('index.customer_corporate') }}">Đóng</a>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
