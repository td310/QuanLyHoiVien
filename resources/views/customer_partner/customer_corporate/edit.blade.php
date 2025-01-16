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
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_corporate') }}">Khách hàng doanh
                                    nghiệp</a></li>
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
                                <h3 class="card-title">Tạo mới khách hàng doanh nghiệp</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('update.customer_corporate', $corporate->id) }}" method="POST">
                                @csrf
                                @method('PUT')
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
                                                                value="{{ $corporate->id_login }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã thẻ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="id_card"
                                                                value="{{ $corporate->id_card }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                            Việt)</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="company_vn"
                                                                value="{{ $corporate->company_vn }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                            Anh)</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="company_en"
                                                                value="{{ $corporate->company_en }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tên viết
                                                            tắt)</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="company_acronym"
                                                                value="{{ $corporate->company_acronym }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Địa chỉ trụ sở chính</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="main_address"
                                                                value="{{ $corporate->main_address }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Địa chỉ văn phòng giao
                                                            dịch</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="office_address"
                                                                value="{{ $corporate->office_address }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã số thuế</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="tax_number"
                                                                value="{{ $corporate->tax_number }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="phone"
                                                                value="{{ $corporate->phone }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Website</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="website"
                                                                value="{{ $corporate->website }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Fanpage</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="fanpage"
                                                                value="{{ $corporate->fanpage }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Ngày thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control"
                                                                name="date_of_establishment"
                                                                value="{{ $corporate->date_of_establishment }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Vốn điều lệ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="charter_capital"
                                                                value="{{ $corporate->charter_capital }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Doanh thu trước gia
                                                            nhập</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="revenue"
                                                                value="{{ $corporate->revenue }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="email"
                                                                value="{{ $corporate->email }}">
                                                        </div>
                                                    </div>
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
                                                                    <option value="{{ $major->id }}"
                                                                        {{ old('major_id', $corporate->major_id) == $major->id ? 'selected' : '' }}>
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
                                                                @if ($corporate->field)
                                                                    <option value="{{ $corporate->feild_id }}" selected>
                                                                        {{ $corporate->field->field_name }}
                                                                    </option>
                                                                @endif
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
                                                                    <option value="{{ $market->id }}"
                                                                        {{ old('market_id', $corporate->market_id) == $market->id ? 'selected' : '' }}>
                                                                        {{ $market->market_name }}
                                                                    </option>
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
                                                            <select class="form-control select2" name="target_customer_id"
                                                                required>
                                                                <option value="">Chọn mục tiêu khách hàng</option>
                                                                @foreach ($targets as $target)
                                                                    <option value="{{ $target->id }}"
                                                                        {{ old('target_customer_id', $corporate->target_customer_id) == $target->id ? 'selected' : '' }}>
                                                                        {{ $target->target_customer_name }}
                                                                    </option>
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
                                                                        {{ $corporate->size_company == '50-100' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="50-100">50-100
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="101-200" name="size_company"
                                                                        value="101-200"
                                                                        {{ $corporate->size_company == '101-200' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="101-200">101-200
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="201-500" name="size_company"
                                                                        value="201-500"
                                                                        {{ $corporate->size_company == '201-500' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="201-500">201-500
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="more500" name="size_company" value=">500"
                                                                        {{ $corporate->size_company == '>500' ? 'checked' : '' }}>
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
                                                                <option value="">Chọn thị trường</option>
                                                                @foreach ($certificates as $certificate)
                                                                    <option value="{{ $certificate->id }}"
                                                                        {{ old('certificate_id', $corporate->certificate_id) == $certificate->id ? 'selected' : '' }}>
                                                                        {{ $certificate->certificate_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Giải thưởng</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control " name="prize"
                                                                value="{{ $corporate->prize }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Bằng khen, giấy khen</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control "
                                                                name="award_certificate"
                                                                value="{{ $corporate->award_certificate }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Lãnh đạo đơn vị -->
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">7. Lãnh đạo đơn vị</h3>
                                                </div>
                                                <input type="hidden" name="leader[is_leader]" value="1">
                                                @if ($corporate->connectionManagers->where('is_leader', true)->first())
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" 
                                                                    name="leader[connection_manager_name]"
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->connection_manager_name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" 
                                                                    name="leader[position]" 
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->position }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" 
                                                                    name="leader[phone]"
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->phone }}">
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
                                                                            name="leader[gender]" value="male"
                                                                            {{ $corporate->connectionManagers->where('is_leader', true)->first()->gender == 'male' ? 'checked' : '' }}>
                                                                        <label class="form-check-label">Nam</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="leader[gender]" value="female"
                                                                            {{ $corporate->connectionManagers->where('is_leader', true)->first()->gender == 'female' ? 'checked' : '' }}>
                                                                        <label class="form-check-label">Nữ</label>
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
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->email_connection }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">8. Phụ trách kết nối</h3>
                                                </div>
                                                <div id="managers-container">
                                                    @foreach ($corporate->connectionManagers->where('is_leader', false) as $key => $manager)
                                                        <div class="manager-group" id="manager-{{ $key + 1 }}">
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Họ và
                                                                        tên</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text"
                                                                            name="managers[{{ $key }}][connection_manager_name]"
                                                                            class="form-control"
                                                                            value="{{ $manager->connection_manager_name }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Chức
                                                                        vụ</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text"
                                                                            name="managers[{{ $key }}][position]"
                                                                            class="form-control"
                                                                            value="{{ $manager->position }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Số điện
                                                                        thoại</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text"
                                                                            name="managers[{{ $key }}][phone]"
                                                                            class="form-control"
                                                                            value="{{ $manager->phone }}">
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
                                                                                    id="male-{{ $key }}"
                                                                                    name="managers[{{ $key }}][gender]"
                                                                                    value="male"
                                                                                    {{ $manager->gender == 'male' ? 'checked' : '' }}
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="male-{{ $key }}">Nam</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio"
                                                                                    class="form-check-input"
                                                                                    id="female-{{ $key }}"
                                                                                    name="managers[{{ $key }}][gender]"
                                                                                    value="female"
                                                                                    {{ $manager->gender == 'female' ? 'checked' : '' }}
                                                                                    required>
                                                                                <label class="form-check-label"
                                                                                    for="female-{{ $key }}">Nữ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Email</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="email"
                                                                            name="managers[{{ $key }}][email_connection]"
                                                                            class="form-control"
                                                                            value="{{ $manager->email_connection }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if (!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
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
                                                                <option value="">Chọn thị trường</option>
                                                                @foreach ($clubs as $club)
                                                                    <option value="{{ $club->id }}"
                                                                        {{ old('club_id', $corporate->club_id) == $club->id ? 'selected' : '' }}>
                                                                        {{ $club->club_name_vn }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary  mr-2">Chỉnh sửa</button>
                                    <a class="btn btn-secondary" href="">Đóng</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
