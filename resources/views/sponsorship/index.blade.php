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
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('create.sponsorship') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('index.sponsorship') }}" method="GET">
                                    <div class="left-section">
                                        <label>Thời gian</label>
                                        <div class="input-group" style="width: 400px;">
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ request()->start_date }}">
                                            <div class="input-group-append input-group-prepend">
                                                <span class="input-group-text">đến</span>
                                            </div>
                                            <input type="date" name="end_date" class="form-control"
                                                value="{{ request()->end_date }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="card-tools">
                                    <form action="{{ route('index.sponsorship') }}" method="GET">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="Tìm kiếm..." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                        @forelse ($sponsorships as $key => $sponsorship)
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
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Không có dữ liệu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        {!! $sponsorships->links('pagination::bootstrap-4') !!}
                                    </ul>
                                </div>
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
