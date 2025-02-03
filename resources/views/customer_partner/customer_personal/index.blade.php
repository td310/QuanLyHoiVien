@extends('customer_partner.index')
@section('customer_partner_content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('create.customer_personal') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between p-4">
                    <form action="{{ route('index.customer_personal') }}" method="GET">
                        <div class="left-section">
                            <label>Trạng thái hoạt động</label>
                            <select name="status" class="form-control" style="width: 200px;" onchange="this.form.submit()">
                                <option value="">Tất cả</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Đang hoạt động
                                </option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Ngừng hoạt
                                    động</option>
                            </select>
                        </div>
                    </form>

                    <div class="card-tools">
                        <form action="{{ route('index.customer_personal') }}" method="GET">
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
                                <th>Ngành</th>
                                <th>Lĩnh vực</th>
                                <th>Tình trạng hoạt động</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $key => $customer)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $customer->id_login }}</td>
                                    <td>{{ $customer->personal_customer_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->major->major_name }}</td>
                                    <td>{{ $customer->field->field_name }}</td>
                                    <td>
                                        @if ($customer->status == 'active')
                                            <span class="badge badge-success">Hoạt động</span>
                                        @else
                                            <span class="badge badge-danger">Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('show.customer_personal', $customer->id) }}"
                                            class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('edit.customer_personal', $customer->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('delete.customer_personal', $customer->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc muốn xóa khách hàng này?')">
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
                                {!! $customers->links('pagination::bootstrap-4') !!}
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
