@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chi tiết thông báo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.calendar') }}">Lịch họp</a></li>
                            <li class="breadcrumb-item active">Chi tiết</li>
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
                                <h3 class="card-title">Chi tiết thông báo</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Người chủ trì</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="host"
                                                                    value="{{ $calendar->host }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Tiêu đề</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="title"
                                                                    value="{{ $calendar->title }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Nội dung</label>
                                                            <div class="col-sm-9">
                                                                <textarea id="description" name="description" class="form-control" rows="4" readonly>{{ $calendar->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Địa điểm</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="location"
                                                                    value="{{ $calendar->location }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Thời gian</label>
                                                            <div class="col-sm-9">
                                                                <input id="datetime-input" type="text" name="date"
                                                                    class="form-control" value="{{ $calendar->date }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Trạng thái</label>
                                                            <div class="col-sm-9">
                                                                @if ($calendar->status == 'active')
                                                                    <span class="badge badge-success">Đang diễn ra</span>
                                                                @else
                                                                    <span class="badge badge-warning">Chưa diễn ra</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Người tham dự</label>
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Mã khách hàng</th>
                                                        <th>Tên khách hàng</th>
                                                        <th>Email</th>
                                                        <th>Loại thành viên</th>
                                                        <th>Lĩnh vực</th>
                                                        <th>Thị trường</th>
                                                        <th>Khách hàng mục tiêu</th>
                                                        <th>Quy mô</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($customers))
                                                        @foreach ($customers as $customer)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $customer['id_login'] }}</td>
                                                                <td>{{ $customer['name'] }}</td>
                                                                <td>{{ $customer['email'] }}</td>
                                                                <td>{{ $customer['type'] }}</td>
                                                                <td>{{ $customer['field_name'] }}</td>
                                                                <td>{{ $customer['market_name'] }}</td>
                                                                <td>{{ $customer['target_customer_name'] }}</td>
                                                                <td>{{ $customer['size_company'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="9">Không có dữ liệu khách hàng</td>
                                                        </tr>
                                                    @endif
                                                </tbody>


                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    @if ($calendar->status === 'inactive')
                                        <a class="btn btn-primary mr-2" href="{{ route('edit.calendar', $calendar->id) }}">
                                            Chỉnh sửa
                                        </a>
                                    @endif
                                    <a class="btn btn-secondary" href="{{ route('index.calendar') }}">Đóng</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        flatpickr("#datetime-input", {
            enableTime: true,
            dateFormat: "Y-m-d h:i K",
            time_24hr: false,
            minDate: new Date(),
            allowInput: true
        });
    </script>
@endsection
