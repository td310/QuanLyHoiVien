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
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('create.customer_partner') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('index.customer_partner') }}" method="GET">
                                    <div class="left-section">
                                        <label>Trạng thái hoạt động</label>
                                        <select name="status" class="form-control" style="width: 200px;"
                                            onchange="this.form.submit()">
                                            <option value="">Tất cả</option>
                                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                                                Đang hoạt động</option>
                                            <option value="inactive"
                                                {{ request('status') == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động
                                            </option>
                                        </select>
                                    </div>
                                </form>

                                <div class="card-tools">
                                    <form action="{{ route('index.customer_partner') }}" method="GET">
                                        @if (request('status'))
                                            <input type="hidden" name="status" value="{{ request('status') }}">
                                        @endif
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
                                <table class="table table-bordered table-hover">
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
                                                    @if ($committee->status == 'active')
                                                        <span class="badge badge-success">Hoạt động</span>
                                                    @else
                                                        <span class="badge badge-danger">Không hoạt động</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary btn-sm" type="button"
                                                            id="dropdownMenuButton{{ $committee->id }}"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton{{ $committee->id }}">
                                                            <a class="dropdown-item"
                                                                href="{{ route('edit.customer_partner', $committee->id) }}">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('show.customer_partner', $committee->id) }}">
                                                                <i class="fas fa-info-circle"></i> Chi tiết
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('fees.customer_partner', $committee->id) }}">
                                                                <i class="fas fa-history"></i> Lịch sử hội phí
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('sponsorships.customer_partner', $committee->id) }}">
                                                                <i class="fas fa-history"></i> Lịch sử tài trợ
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <form
                                                                action="{{ route('delete.customer_partner', $committee->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger"
                                                                    onclick="return confirm('Bạn có chắc muốn xóa?')">
                                                                    <i class="fas fa-trash"></i> Xóa
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
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
                                        {!! $committees->links('pagination::bootstrap-4') !!}
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
    <script>
        document.querySelector('select[name="status"]').addEventListener('change', function() {
            window.location.href = '{{ route('index.customer_partner') }}?status=' + this.value;
        });
    </script>
@endsection
