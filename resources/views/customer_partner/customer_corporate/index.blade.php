@extends('customer_partner.index')
@section('customer_partner_content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('create.customer_corporate') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between p-4">
                    <form method="GET" action="{{ route('index.customer_corporate') }}">
                        <div class="left-section">
                            <label>Lĩnh vực</label>
                            <select name="field_id" class="form-control" style="width: 200px;"
                                onchange="this.form.submit()">
                                <option value="">Tất cả</option>
                                @foreach ($fields as $field)
                                    <option value="{{ $field->id }}"
                                        {{ request('field_id') == $field->id ? 'selected' : '' }}>
                                        {{ $field->field_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <form method="GET" action="{{ route('index.customer_corporate') }}">
                        <div class="left-section">
                            <label>Thị trường</label>
                            <select name="market_id" class="form-control" style="width: 200px;"
                                onchange="this.form.submit()">
                                <option value="">Tất cả</option>
                                @foreach ($markets as $market)
                                    <option value="{{ $market->id }}"
                                        {{ request('market_id') == $market->id ? 'selected' : '' }}>
                                        {{ $market->market_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <form method="GET" action="{{ route('index.customer_corporate') }}">
                        <div class="left-section">
                            <label>Khách hàng mục tiêu</label>
                            <select name="target_customer_id" class="form-control" style="width: 200px;"
                                onchange="this.form.submit()">
                                <option value="">Tất cả</option>
                                @foreach ($targetCustomers as $target)
                                    <option value="{{ $target->id }}"
                                        {{ request('target_customer_id') == $target->id ? 'selected' : '' }}>
                                        {{ $target->target_customer_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <form method="GET" action="{{ route('index.customer_corporate') }}">
                        <div class="left-section">
                            <label>Địa chỉ</label>
                            <select name="main_address" class="form-control" style="width: 200px;"
                                onchange="this.form.submit()">
                                <option value="">Tất cả</option>
                                @foreach ($addresses as $address)
                                    <option value="{{ $address->main_address }}"
                                        {{ request('main_address') == $address->main_address ? 'selected' : '' }}>
                                        {{ $address->main_address }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="card-tools">
                        <form action="{{ route('index.customer_corporate') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="search" class="form-control float-right"
                                    placeholder="Tìm kiếm..." value="{{ $search }}">
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
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Lĩnh vực</th>
                                <th>Thị trường</th>
                                <th>Khách hàng mục tiêu</th>
                                <th>Tình trạng hoạt động</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($corporates as $key => $corporate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $corporate->id_login }}</td>
                                    <td>{{ $corporate->company_vn }}</td>
                                    <td>{{ $corporate->field->field_name }}</td>
                                    <td>{{ $corporate->market->market_name }}</td>
                                    <td>{{ $corporate->targetCustomer->target_customer_name }}</td>
                                    <td>
                                        @if ($corporate->status == 'active')
                                            <span class="badge badge-success">Hoạt động</span>
                                        @else
                                            <span class="badge badge-danger">Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm" type="button"
                                                id="dropdownMenuButton{{ $corporate->id }}" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton{{ $corporate->id }}">
                                                <a class="dropdown-item"
                                                    href="{{ route('edit.customer_corporate', $corporate->id) }}">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('show.customer_corporate', $corporate->id) }}">
                                                    <i class="fas fa-info-circle"></i> Chi tiết
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('fees.customer_corporate', $corporate->id) }}">
                                                    <i class="fas fa-history"></i> Lịch sử hội phí
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('sponsorships.customer_corporate', $corporate->id) }}">
                                                    <i class="fas fa-history"></i> Lịch sử tài trợ
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('destroy.customer_corporate', $corporate->id) }}"
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
                                    <td colspan="7" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $corporates->links('pagination::bootstrap-4') !!}
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
