@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách tài trợ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Tài trợ</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <a href="{{ route('create.sponsorship') }}"
                                        class="float-right btn btn-success btn-sm">Tạo mới</a>
                                </h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Sản phẩm tài trợ</th>
                                            <th>Đơn vị</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Ngày tài trợ</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sponsorships as $key => $sponsorship)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $sponsorship->committee->committee_name }}</td>
                                                <td>{{ $sponsorship->product }}</td>
                                                <td>{{ $sponsorship->unit }}</td>
                                                <td>{{ $sponsorship->quantity }}</td>
                                                <td>{{ format_money($sponsorship->total) }}</td>
                                                <td>{{ $sponsorship->date }}</td>
                                                <td>
                                                    <a href="{{ route('show.sponsorship', $sponsorship->id) }}"
                                                        class="btn btn-info btn-sm">Chi tiết</a>
                                                    <form action="{{ route('delete.sponsorship', $sponsorship->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @if (count($sponsorships) == 0)
                                                <tr>
                                                    <td colspan="8" class="text-center">Không có dữ liệu</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
