@extends('settings_menu.index')
@section('setting_menu_content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('create.market') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between p-4">
                    <div class="card-tools">
                        <form action="{{ route('index.market') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="search" class="form-control float-right"
                                    placeholder="Tìm kiếm bằng mã/tên thị trường" value="{{ $search }}">
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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã thị trường</th>
                                <th>Tên thị trường</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($markets as $key => $market)
                                <tr>
                                    <td>{{ $markets->firstItem() + $key }}</td>
                                    <td>{{ $market->market_id }}</td>
                                    <td>{{ $market->market_name }}</td>
                                    <td>{{ $market->description }}</td>
                                    <td>
                                        <a href="{{ route('edit.market', $market->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('show.market', $market->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('destroy.market', $market->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc muốn xóa?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $markets->links('pagination::bootstrap-4') !!}
                        </ul>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
