@extends('settings_menu.index')
@section('setting_menu_content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('create.field') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between p-4">
                    <form action="{{ route('index.field') }}" method="GET">
                        <div class="d-flex">
                            <div class="left-section mr-3">
                                <label>Ngành</label>
                                <select name="major_id" class="form-control" style="width: 200px;"
                                    onchange="this.form.submit()">
                                    <option value="">Tất cả</option>
                                    @foreach ($majors as $major)
                                        <option value="{{ $major->id }}"
                                            {{ request('major_id') == $major->id ? 'selected' : '' }}>
                                            {{ $major->major_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="card-tools">
                        <form action="{{ route('index.field') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="search" class="form-control float-right"
                                    placeholder="Tìm kiếm theo mã/tên lĩnh vực" value="{{ request('search') }}">
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
                                <th>Mã lĩnh vực</th>
                                <th>Tên lĩnh vực</th>
                                <th>Mô tả</th>
                                <th>Ngành</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fields as $key => $field)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $field->field_id }}</td>
                                    <td>{{ $field->field_name }}</td>
                                    <td>{{ $field->description }}</td>
                                    <td>{{ $field->major->major_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.field', $field->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('show.field', $field->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('destroy.field', $field->id) }}" method="POST"
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
                            {!! $fields->links('pagination::bootstrap-4') !!}
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
