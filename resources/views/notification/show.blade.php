@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách thông báo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index.notification') }}">Thông báo</a></li>
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
                                <h3 class="card-title">Thêm thông báo mới</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="title"
                                                            value="{{ $notification->title }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-2 col-form-label">Hình thức</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="method"
                                                            value="{{ $notification->method }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-2 col-form-label">Thời gian gửi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="date"
                                                            value="{{ $notification->date }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-2 col-form-label">Mội dung</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="title"
                                                            value="{{ $notification->description }}" readonly>
                                                    </div>
                                                </div>
                                            </div>


                                            <label class="col-sm-2 col-form-label">Người nhận</label>

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
                                                    @foreach ($recipients as $key => $recipient)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'manual')
                                                                    -
                                                                @else
                                                                    @php
                                                                        $customerData = null;
                                                                        switch ($recipient->customer_type) {
                                                                            case 'committee':
                                                                                $customerData = $committees
                                                                                    ->where(
                                                                                        'id',
                                                                                        $recipient->customer_id,
                                                                                    )
                                                                                    ->first();
                                                                                break;
                                                                            case 'corporate':
                                                                                $customerData = $corporates
                                                                                    ->where(
                                                                                        'id',
                                                                                        $recipient->customer_id,
                                                                                    )
                                                                                    ->first();
                                                                                break;
                                                                            case 'personal':
                                                                                $customerData = $personals
                                                                                    ->where(
                                                                                        'id',
                                                                                        $recipient->customer_id,
                                                                                    )
                                                                                    ->first();
                                                                                break;
                                                                            case 'partner':
                                                                                $customerData = $partners
                                                                                    ->where(
                                                                                        'id',
                                                                                        $recipient->customer_id,
                                                                                    )
                                                                                    ->first();
                                                                                break;
                                                                        }
                                                                    @endphp
                                                                    {{ $customerData ? $customerData->id_login : '-' }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'manual')
                                                                    -
                                                                @else
                                                                    {{ $customerData ? $customerData->name : '-' }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'manual')
                                                                    {{ $recipient->manual_email }}
                                                                @else
                                                                    {{ $customerData ? $customerData->email : '-' }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'committee')
                                                                    Ban chấp hành
                                                                @elseif($recipient->customer_type == 'corporate')
                                                                    Khách hàng doanh nghiệp
                                                                @elseif($recipient->customer_type == 'personal')
                                                                    Khách hàng cá nhân
                                                                @elseif($recipient->customer_type == 'partner')
                                                                    Đối tác doanh nghiệp
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'corporate')
                                                                    {{ optional($customerData->field)->field_name ?? '-' }}
                                                                @elseif($recipient->customer_type == 'personal')
                                                                    {{ optional($customerData->field)->field_name ?? '-' }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'corporate')
                                                                    {{ optional($customerData->market)->market_name ?? '-' }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'corporate')
                                                                    {{ optional($customerData->targetCustomer)->target_customer_name ?? '-' }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($recipient->customer_type == 'corporate')
                                                                    {{ $customerData->size_company ?? '-' }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-secondary  mr-2" href="{{ route('index.notification') }}">Đóng</a>
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
