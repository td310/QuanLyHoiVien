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
                            <li class="breadcrumb-item active">Ban chấp hành</li>
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
                                    <a href="{{ route('create.customer_partner') }}" class="float-right btn btn-success btn-sm">Tạo mới</a>
                                </h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã</th>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Tên đơn vị</th>
                                            <th>Chức vụ</th>
                                            <th>Tình trạng hoạt động</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($committees as $key => $committee)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $committee->id_card }}</td>
                                                <td>{{ $committee->committee_name }}</td>
                                                <td>{{ $committee->email }}</td>
                                                <td>{{ $committee->unit }}</td>
                                                <td>{{ $committee->position }}</td>
                                                <td>
                                                    @if($committee->status == 'active')
                                                        <span class="badge badge-success">Hoạt động</span>
                                                    @else
                                                        <span class="badge badge-danger">Không hoạt động</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit.customer_partner', $committee->id) }}" 
                                                       class="btn btn-primary btn-sm">Sửa</a>
                                                    <a href="{{ route('show.customer_partner', $committee->id) }}" 
                                                       class="btn btn-info btn-sm">Chi tiết</a>
                                                    <form action="{{ route('delete.customer_partner', $committee->id) }}" 
                                                          method="POST" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Bạn có chắc muốn xóa?')">
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
