@extends('customer_partner.index')
@section('customer_partner_content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{route('create.customer_corporate')}}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
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
                                        <a href="{{ route('show.customer_corporate', $corporate->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('edit.customer_corporate', $corporate->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('destroy.customer_corporate', $corporate->id) }}" method="POST" class="d-inline">
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
                    {{-- <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $clubs->links('pagination::bootstrap-4') !!}
                        </ul>
                    </div> --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection