@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách câu lạc bộ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Câu lạc bộ</a></li>
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
                                <h3 class="card-title">Thêm câu lạc bộ</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('store.club') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" value="active">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">1. Thông tin cơ bản</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã câu lạc bộ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="club_code"
                                                                value="{{ $club->club_code }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên Tiếng Việt</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                value="{{ $club->club_name_vn }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên Tiếng Anh</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                value="{{ $club->club_name_en }}" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên viết tắt</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                value="{{ $club->club_name_acronym }}" readonly> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Địa chỉ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                value="{{ $club->address }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã số thuế</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="tax_number"
                                                                value="{{ $club->tax_number }}" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control " name="phone"
                                                                value="{{ $club->phone }}" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="email"
                                                                value="{{ $club->email }}" readonly>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Website</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                value="{{ $club->website }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Fanpage</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control"value="{{ $club->fanpage }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Ngày thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control"
                                                                value="{{ $club->date }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Quyết định thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                value="{{ $club->decision }}" readonly>
                                                        </div>
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
                                                            <input type="text" class="form-control" value="{{ $club->major->major_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" value="{{ $club->field->field_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">3. Thị trường</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Thị trường</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" value="{{ $club->market->market_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Lãnh đạo đơn vị -->
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">4. Phụ trách kết nối</h3>
                                                </div>
                                                <div id="managers-container">
                                                    @foreach($club->connectionManagers as $key => $manager)
                                                        <div class="manager-group" id="manager-{{$key}}">
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" 
                                                                            value="{{ $manager->connection_manager_name }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" 
                                                                            value="{{ $manager->position }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" class="form-control" 
                                                                            value="{{ $manager->phone }}" readonly>
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
                                                                                    {{ $manager->gender == 'male' ? 'checked' : '' }} disabled>
                                                                                <label class="form-check-label">Nam</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" class="form-check-input"
                                                                                    {{ $manager->gender == 'female' ? 'checked' : '' }} disabled>
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
                                                                            value="{{ $manager->email_connection }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if(!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <a href="{{ route('edit.club', $club->id) }}" class="btn btn-primary mr-2">Chỉnh sửa</a>
                                    <a class="btn btn-secondary  mr-2" href="{{ route('index.club') }}">Đóng</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
