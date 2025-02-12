@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Danh sách câu lạc bộ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Câu lạc bộ</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('create.club') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('index.club') }}" method="GET">
                                    <div class="d-flex">
                                        <div class="left-section mr-3">
                                            <label>Lĩnh vực</label>
                                            <select name="field_id" class="form-control" style="width: 200px;" onchange="this.form.submit()">
                                                <option value="">Chọn lĩnh vực</option>
                                                @foreach($fields as $field)
                                                    <option value="{{ $field->id }}" 
                                                        {{ request('field_id') == $field->id ? 'selected' : '' }} >
                                                        {{ $field->field_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="left-section">
                                            <label>Thị trường</label>
                                            <select name="market_id" class="form-control"  style="width: 200px;" onchange="this.form.submit()">
                                                <option value="">Chọn thị trường</option>
                                                @foreach($markets as $market)
                                                    <option value="{{ $market->id }}"
                                                        {{ request('market_id') == $market->id ? 'selected' : '' }}>
                                                        {{ $market->market_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <div class="card-tools">
                                    <form action="{{ route('index.club') }}" method="GET">
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
                                            <th>Tên câu lạc bộ</th>
                                            <th>Lĩnh vực</th>
                                            <th>Thị trường</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($clubs as $key => $club)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $club->club_name_vn }}</td>
                                                <td>{{ optional($club->field)->field_name }}</td>
                                                <td>{{ $club->market->market_name }}</td>
                                                <td>
                                                    @if ($club->status == 'active')
                                                        <span class="badge badge-success">Hoạt động</span>
                                                    @else
                                                        <span class="badge badge-danger">Không hoạt động</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('show.club', $club->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('edit.club', $club->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('destroy.club', $club->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Bạn có chắc muốn xóa câu lạc bộ này?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
                                        {!! $clubs->links('pagination::bootstrap-4') !!}
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
