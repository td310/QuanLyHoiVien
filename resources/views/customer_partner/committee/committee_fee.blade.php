@extends('customer_partner.index')
@section('customer_partner_content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lịch sử hội phí</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_partner') }}">Ban chấp hành</a>
                            </li>
                            <li class="breadcrumb-item active">Hội Phí</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline col-md-6">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <strong>Tên thành viên</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $committee->committee_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <strong>Email</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $committee->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <strong>Tình trạng hoạt động</strong>
                                            </div>
                                            <div class="col-md-8">
                                                @if ($committee->status == 'active')
                                                    <p class="badge badge-success">Hoạt động</p>
                                                @else
                                                    <p class="badge badge-danger">Không hoạt động</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <strong>Tổng hội phí</strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ format_money($committee->total_debt) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('fees.customer_partner', $committee->id) }}" method="GET">
                                    <div class="left-section">
                                        <label>Năm</label>
                                        <select name="year" class="form-control" style="width: 200px;" onchange="this.form.submit()">
                                            <option value="">Tất cả</option>
                                            @foreach($years as $yr)
                                                <option value="{{ $yr }}" {{ request('year') == $yr ? 'selected' : '' }}>
                                                    {{ $yr }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            
                                <div class="card-tools">
                                    <form action="{{ route('fees.customer_partner', $committee->id) }}" method="GET">
                                        @if(request('year'))
                                            <input type="hidden" name="year" value="{{ request('year') }}">
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Năm</th>
                                            <th>Ngày đóng hội phí</th>
                                            <th>Số tiền phải đóng</th>
                                            <th>Nội dung</th>
                                            <th>Tình trạng</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($committee->memFees as $memFee)
                                            <tr>
                                                <td>{{ format_year($memFee->date) }}</td>
                                                <td>{{ format_day_month($memFee->date) }}</td>
                                                <td>{{ format_money($memFee->debt) }}</td>
                                                <td>{{ $memFee->description }}</td>
                                                <td>
                                                    @if ($memFee->status == 'paid')
                                                        <span class="badge badge-success">Đã hoàn thành</span>
                                                    @else
                                                        <span class="badge badge-danger">Không hoàn thành</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($memFee->getFirstMedia('memfee_attachments'))
                                                        <a href="{{ $memFee->getFirstMedia('memfee_attachments')->getUrl() }}"
                                                            target="_blank"
                                                            style="font-style: italic; text-decoration: underline;">
                                                            Xem file đính kèm
                                                        </a>
                                                    @else
                                                        Không có tệp đính kèm
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Không có dữ liệu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
