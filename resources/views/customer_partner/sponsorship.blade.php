@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lí hội phí</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_partner') }}">Ban chấp hành</a>
                            </li>
                            <li class="breadcrumb-item active">Lịch sử tài trợ</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline col-md-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row mb-2 d-flex justify-content-between">
                                            <div class="col-md-6">
                                                <strong>Tổng đóng góp</strong>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>{{ format_money($committee->total_sponsorship) }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ngày đóng góp</th>
                                            <th>Nội dung</th>
                                            <th>Sản phẩm đóng góp</th>
                                            <th>Đơn vị</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền(VNĐ)</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($committee->sponsorships as $key => $sponsorship)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $sponsorship->date }}</td>
                                                <td>{{ $sponsorship->description }}</td>
                                                <td>{{ $sponsorship->product }}</td>
                                                <td>{{ $sponsorship->unit }}</td>
                                                <td>{{ $sponsorship->quantity }}</td>
                                                <td>{{ format_money($sponsorship->total) }}</td>
                                                <td>
                                                    @if ($sponsorship->getFirstMedia('sponsorship_attachments'))
                                                        <a href="{{ $sponsorship->getFirstMedia('sponsorship_attachments')->getUrl() }}"
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
