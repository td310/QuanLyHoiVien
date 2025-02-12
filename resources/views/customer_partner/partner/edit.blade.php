@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chỉnh sửa đối tác doanh nghiệp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.partner') }}">Đối tác doanh nghiệp</a>
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
                            <!-- /.card-header -->
                            <form action="{{ route('update.partner', $partner->id) }}" method="POST">
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
                                                    <label class="col-sm-5 col-form-label">Mã đăng nhập</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="id_login"
                                                            value="{{ $partner->id_login }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Mã thẻ</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="id_card"
                                                            value="{{ $partner->id_card }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                        Việt)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="company_vn" value="{{ $partner->company_vn }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tiếng
                                                        Anh)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="company_en" value="{{$partner->company_en }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Tên doanh nghiệp (Tên viết
                                                        tắt)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="company_acronym" value="{{ $partner->company_acronym }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Phân loại</label>
                                                    <div class="d-flex col-sm-8">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                id="vietnam" name="nation" value="vietnam"
                                                                {{ old('nation', $partner->nation) == 'vietnam' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="vietnam">Việt Nam</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input"
                                                                id="national" name="nation" value="national"  
                                                                {{ old('nation', $partner->nation) == 'national' ? 'checked' : '' }}>
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
                                                            class="form-control"
                                                            name="main_address" value="{{ $partner->main_address }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Địa chỉ văn phòng giao
                                                        dịch</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="office_address" value="{{ $partner->office_address }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Mã số thuế</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="tax_number" value="{{ $partner->tax_number }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control"
                                                            name="phone" value="{{ $partner->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Website</label>
                                                    <div class="col-sm-7">
                                                        <input type="text"
                                                            class="form-control @error('website') is-invalid @enderror"
                                                            name="website" value="{{ $partner->website }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">2. Lãnh đạo đơn vị</h3>
                                                </div>
                                                <input type="hidden" name="leader[is_leader]" value="1">
                                                @if ($partner->connectionManagers->where('is_leader', true)->first())
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" 
                                                                    name="leader[connection_manager_name]"
                                                                    value="{{ $partner->connectionManagers->where('is_leader', true)->first()->connection_manager_name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" 
                                                                    name="leader[position]" 
                                                                    value="{{ $partner->connectionManagers->where('is_leader', true)->first()->position }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" 
                                                                    name="leader[phone]"
                                                                    value="{{ $partner->connectionManagers->where('is_leader', true)->first()->phone }}">
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
                                                                            {{ $partner->connectionManagers->where('is_leader', true)->first()->gender == 'male' ? 'checked' : '' }}>
                                                                        <label class="form-check-label">Nam</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="leader[gender]" value="female"
                                                                            {{ $partner->connectionManagers->where('is_leader', true)->first()->gender == 'female' ? 'checked' : '' }}>
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
                                                                    value="{{ $partner->connectionManagers->where('is_leader', true)->first()->email_connection }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">3. Phụ trách kết nối</h3>
                                                </div>
                                                <div id="managers-container">
                                                    @foreach ($partner->connectionManagers->where('is_leader', false) as $key => $manager)
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
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
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
@endsection
