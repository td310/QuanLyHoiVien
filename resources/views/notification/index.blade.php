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
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thông báo</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('create.notification') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('index.notification') }}" method="GET">
                                    <div class="left-section">
                                        <label>Thời gian</label>
                                        <div class="input-group" style="width: 400px;">
                                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                            <div class="input-group-append input-group-prepend">
                                                <span class="input-group-text">đến</span>
                                            </div>
                                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            
                                <form action="{{ route('index.notification') }}" method="GET">
                                    <div class="left-section">
                                        <label>Hình thức</label>
                                        <select name="method" class="form-control" style="width: 200px;" onchange="this.form.submit()">
                                            <option value="">Tất cả</option>
                                            <option value="email" {{ request('method') == 'email' ? 'selected' : '' }}>Email</option>
                                            <option value="notification" {{ request('method') == 'notification' ? 'selected' : '' }}>Notification</option>
                                        </select>
                                    </div>
                                </form>
                            
                                <div class="card-tools">
                                    <form action="{{ route('index.notification') }}" method="GET">
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
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Hình thức</th>
                                            <th>Thời gian gửi</th>
                                            <th>Số người nhận</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notifications as $key => $notification)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $notification->title }}</td>
                                                <td>{{ $notification->method == 'email' ? 'Email' : 'Notification' }}</td>
                                                <td>{{ format_notification_date($notification->date) }}</td>
                                                <td>{{ $notification->recipient_count }}</td>
                                                <td>
                                                    @if ($notification->status == 'active')
                                                        <span class="badge badge-success">Đã gửi</span>
                                                    @else
                                                        <span class="badge badge-warning">Chưa gửi</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($notification->status == 'active')
                                                        <a href="{{ route('show.notification', $notification->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('edit.notification', $notification->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif

                                                    <form action="{{ route('delete.notification', $notification->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Bạn có chắc muốn xóa thông báo này?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        {!! $notifications->links('pagination::bootstrap-4') !!}
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
