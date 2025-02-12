@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chi tiết hoạt động</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index.notification') }}">Hoạt động</a></li>
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
                            <!-- /.card-header -->
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Tên hoạt động</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="activity_name"
                                                                value="{{ $activity->activity_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Thời gian bắt đầu</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="date_start"
                                                                value="{{ $activity->date_start }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Thời gian kết thúc</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="date_end"
                                                                value="{{ $activity->date_end }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Địa điểm</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="location"
                                                                value="{{ $activity->location }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Nội dung</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="description"
                                                                value="{{ $activity->description }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">File đính kèm</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                value="{{ $activity->getFirstMedia('activity_file') ? $activity->getFirstMedia('activity_file')->file_name : '' }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Đối tượng</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                value="{{ count($activity->customer_type) === 4
                                                                    ? 'Tất cả đối tượng'
                                                                    : collect($activity->customer_type)->map(function ($type) {
                                                                            return \App\Helpers\CustomerHelper::translateCustomerType($type);
                                                                        })->implode(', ') }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <a href="{{ route('showCustomer.activity', $activity->id) }}"
                                                        class="btn btn-primary">
                                                        Xem danh sách khách hàng
                                                    </a>
                                                </div>

                                            </div>
                                        </div>


                                        <label class="col-sm-2 col-form-label">Người nhận</label>

                                        <div class="table-responsive">
                                            @php
                                                $manualNames = array_filter($activity->manual_name ?? [], function (
                                                    $value,
                                                ) {
                                                    return !is_null($value);
                                                });
                                                $manualEmails = array_filter($activity->manual_email ?? [], function (
                                                    $value,
                                                ) {
                                                    return !is_null($value);
                                                });
                                            @endphp

                                            @if (count($manualNames) > 0 && count($manualEmails) > 0)
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Họ và tên</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($manualNames as $key => $name)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $name }}</td>
                                                                <td>{{ $manualEmails[$key] ?? '' }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Họ và tên</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            @endif
                                        </div>

                                    </div>
                                </div>


                                <div class="card-footer d-flex justify-content-center">
                                    @if ($activity->status === 'inactive')
                                        <a class="btn btn-primary mr-2" href="{{ route('edit.activity', $activity->id) }}">
                                            Chỉnh sửa
                                        </a>
                                    @endif
                                    <a class="btn btn-secondary" href="{{ route('index.activity') }}">Đóng</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
