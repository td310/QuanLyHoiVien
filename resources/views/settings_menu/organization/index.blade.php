@extends('settings_menu.index')
@section('setting_menu_content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('create.organization') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between p-4">
                    <div class="card-tools">
                        <form action="{{ route('index.organization') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="search" class="form-control float-right"
                                    placeholder="Tìm kiếm bằng mã/tên tổ chức" value="{{$search}}">
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
                                <th>Mã tổ chức</th>
                                <th>Tên tổ chức</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($organizations as $key => $organization)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $organization->organization_id }}</td>
                                    <td>{{ $organization->organization_name }}</td>
                                    <td>{{ $organization->description }}</td>
                                    <td>
                                        <a href="{{ route('edit.organization', $organization->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('show.organization', $organization->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('destroy.organization', $organization->id) }}" method="POST"
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
                    <ul class="pagination pagination-sm m-0 float-right">
                        {!! $organizations->links('pagination::bootstrap-4') !!}
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
