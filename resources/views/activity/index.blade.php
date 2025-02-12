@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Danh sách hoạt động</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hoạt động</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('create.activity') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('index.activity') }}" method="GET">
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
                            
                                <div class="card-tools">
                                    <form action="{{ route('index.activity') }}" method="GET">
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
                                            <th>Tên hoạt động</th>
                                            <th>Nội dung hoạt động</th>
                                            <th>Thời gian bắt đầu</th>
                                            <th>Thời gian kết thúc</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($activities as $key => $activity)
                                        <tr>
                                            <td>{{ $activities->firstItem() + $key }}</td>
                                            <td>{{ $activity->activity_name }}</td>
                                            <td>{{ Str::limit($activity->description, 100) }}</td>
                                            <td>{{ format_notification_date($activity->date_start) }}</td>
                                            <td>{{ format_notification_date($activity->date_end) }}</td>
                                            <td>
                                                <span class="badge badge-{{ $activity->status === 'active' ? 'success' : 'warning' }}">
                                                    {{ $activity->status === 'active' ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('show.activity', $activity->id) }}" 
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if($activity->status === 'inactive')
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                                        data-id="{{ $activity->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        {!! $activities->links('pagination::bootstrap-4') !!}
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
