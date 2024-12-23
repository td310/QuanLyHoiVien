@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lí hội phí</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hội Phí</li>
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
                                    <a href="{{ route('create.membership_fee') }}"
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
                                            <th>Năm</th>
                                            <th>Số tiền phải thu</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($memFees as $key => $memFee)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $memFee->committee->committee_name }}</td>
                                                <td>{{ format_year($memFee->date) }}</td>
                                                <td>{{ format_money($memFee->debt) }}</td>
                                                <td>
                                                    @if ($memFee->status == 'paid')
                                                        <span class="badge badge-success">Đã hoàn thành</span>
                                                    @else
                                                        <span class="badge badge-danger">Không hoàn thành</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($memFee->status == 'unpaid')
                                                        <form action="{{ route('pay.membership_fee', $memFee->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm">Trả
                                                                Phí</button>
                                                        </form>
                                                    @endif
                                                    <a href="{{ route('show.membership_fee', $memFee->id) }}"
                                                        class="btn btn-info btn-sm">Chi tiết</a>
                                                    <form action="{{ route('delete.membership_fee', $memFee->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @if (count($memFees) == 0)
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
