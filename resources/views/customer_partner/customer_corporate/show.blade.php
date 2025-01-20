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
                            <form action="" method="POST">
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
                                                                value="{{ $corporate->id_login }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã thẻ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="id_card"
                                                                value="{{ $corporate->id_card }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                            Việt)</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="company_vn"
                                                                value="{{ $corporate->company_vn }}" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                            Anh)</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="company_en"
                                                                value="{{ $corporate->company_en }}" readonly>
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
                                                                value="{{ $corporate->company_acronym }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Địa chỉ trụ sở chính</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="main_address"
                                                                value="{{ $corporate->main_address }}" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Địa chỉ văn phòng giao
                                                            dịch</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="office_address"
                                                                value="{{ $corporate->office_address }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã số thuế</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="tax_number"
                                                                value="{{ $corporate->tax_number }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="phone"
                                                                value="{{ $corporate->phone }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Website</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="website"
                                                                value="{{ $corporate->website }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Fanpage</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="fanpage"
                                                                value="{{ $corporate->fanpage }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Ngày thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control"
                                                                name="date_of_establishment"
                                                                value="{{ $corporate->date_of_establishment }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Vốn điều lệ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                name="charter_capital"
                                                                value="{{ $corporate->charter_capital }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Doanh thu trước gia
                                                            nhập</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="revenue"
                                                                value="{{ $corporate->revenue }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="email"
                                                                value="{{ $corporate->email }}" readonly>
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
                                                            <input type="text" class="form-control"
                                                                value="{{ $corporate->major->major_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                value="{{ $corporate->field->field_name }}" readonly>
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
                                                            <input type="text" class="form-control"
                                                                value="{{ $corporate->market->market_name }}" readonly>
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
                                                            <input type="text" class="form-control"
                                                                value="{{ $corporate->targetCustomer->target_customer_name }}"
                                                                readonly>
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
                                                                        {{ $corporate->size_company == '50-100' ? 'checked' : '' }}
                                                                        disabled>
                                                                    <label class="form-check-label" for="50-100">50-100
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="101-200" name="size_company"
                                                                        value="101-200"
                                                                        {{ $corporate->size_company == '101-200' ? 'checked' : '' }}
                                                                        disabled>
                                                                    <label class="form-check-label" for="101-200">101-200
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="201-500" name="size_company"
                                                                        value="201-500"
                                                                        {{ $corporate->size_company == '201-500' ? 'checked' : '' }}
                                                                        disabled>
                                                                    <label class="form-check-label" for="201-500">201-500
                                                                        người</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="more500" name="size_company" value=">500"
                                                                        {{ $corporate->size_company == '>500' ? 'checked' : '' }}
                                                                        disabled>
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
                                                            <input type="text" class="form-control"
                                                                value="{{ $corporate->certificate->certificate_name }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Giải thưởng</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control " name="prize"
                                                                value="{{ $corporate->prize }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Bằng khen, giấy khen</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control "
                                                                name="award_certificate"
                                                                value="{{ $corporate->award_certificate }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Lãnh đạo đơn vị -->
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">7. Lãnh đạo đơn vị</h3>
                                                </div>
                                                @if ($corporate->connectionManagers->where('is_leader', true)->first())
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->connection_manager_name }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->position }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->phone }}"
                                                                    readonly>
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
                                                                            {{ $corporate->connectionManagers->where('is_leader', true)->first()->gender == 'male' ? 'checked' : '' }}
                                                                            disabled>
                                                                        <label class="form-check-label">Nam</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            {{ $corporate->connectionManagers->where('is_leader', true)->first()->gender == 'female' ? 'checked' : '' }}
                                                                            disabled>
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
                                                                    value="{{ $corporate->connectionManagers->where('is_leader', true)->first()->email_connection }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="text-center p-3">Không có thông tin lãnh đạo</div>
                                                @endif
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">8. Phụ trách kết nối</h3>
                                                </div>
                                                <div id="managers-container">
                                                    @foreach ($corporate->connectionManagers->where('is_leader', false) as $key => $manager)
                                                        <div class="manager-group" id="manager-{{ $key }}">
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Họ và
                                                                        tên</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $manager->connection_manager_name }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Chức
                                                                        vụ</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $manager->position }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Số điện
                                                                        thoại</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $manager->phone }}" readonly>
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
                                                                                    {{ $manager->gender == 'male' ? 'checked' : '' }}
                                                                                    disabled>
                                                                                <label class="form-check-label">Nam</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio"
                                                                                    class="form-check-input"
                                                                                    {{ $manager->gender == 'female' ? 'checked' : '' }}
                                                                                    disabled>
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
                                                                        <input type="email" class="form-control"
                                                                            value="{{ $manager->email_connection }}"
                                                                            readonly>
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
                                                            <input type="text" class="form-control"
                                                                value="{{ $corporate->club->club_name_vn }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
