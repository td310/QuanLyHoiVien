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
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('create.membership_fee') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('index.membership_fee') }}" method="GET">
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
                                <form action="{{ route('index.membership_fee') }}" method="GET">
                                    <div class="left-section">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control" style="width: 200px;" onchange="this.form.submit()">
                                            <option value="">Tất cả</option>
                                            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                                            <option value="unpaid" {{ request('status') == 'unpaid' ? 'selected' : '' }}>Chưa thanh toán</option>
                                        </select>
                                    </div>
                                </form>

                                <div class="card-tools">
                                    <form action="{{ route('index.membership_fee') }}" method="GET">
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
                                            <th>Năm</th>
                                            <th>Số tiền phải thu</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($memFees as $key => $memFee)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $memFee->committee->committee_name }}</td>
                                                <td>{{ format_year($memFee->date) }}</td>
                                                <td>{{ format_money($memFee->debt) }}</td>
                                                <td>
                                                    @if ($memFee->status == 'paid')
                                                        <span class="badge badge-success">Đã thanh toán</span>
                                                    @else
                                                        <span class="badge badge-danger">Chưa thanh toán</span>
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
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Không có dữ liệu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        {!! $memFees->links('pagination::bootstrap-4') !!}
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
