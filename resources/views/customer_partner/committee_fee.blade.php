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
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_partner') }}">Ban chấp hành</a></li>
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
                        <div class="card">
                            <!-- /.card-header -->
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
                                                    @if($memFee->getFirstMedia('memfee_attachments'))
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
