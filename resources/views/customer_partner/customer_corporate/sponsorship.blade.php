@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lịch sử tài trợ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.customer_corporate') }}">Khách hàng doanh nghiệp</a>
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
                                                <strong>{{ format_money($corporate->total_sponsorship) }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('sponsorships.customer_corporate', $corporate->id) }}" method="GET"
                                    id="dateFilterForm">
                                    <div class="left-section">
                                        <label>Thời gian</label>
                                        <div class="input-group" style="width: 400px;">
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ request()->start_date }}">
                                            <div class="input-group-append input-group-prepend">
                                                <span class="input-group-text">đến</span>
                                            </div>
                                            <input type="date" name="end_date" class="form-control"
                                                value="{{ request()->end_date }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Search Form -->
                                <div class="card-tools">
                                    <form action="{{ route('sponsorships.customer_corporate', $corporate->id) }}"
                                        method="GET" id="searchForm">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="Tìm kiếm..." value="{{ request()->search }}">
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
                                        @forelse($corporate->sponsorships as $key => $sponsorship)
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
                                                <td colspan="7" class="text-center">Không có dữ liệu</td>
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
    <script>
        document.getElementById('dateFilterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const startDate = this.querySelector('[name="start_date"]').value;
            const endDate = this.querySelector('[name="end_date"]').value;
            window.location.href =
                `{{ route('sponsorships.customer_corporate', $corporate->id) }}?start_date=${startDate}&end_date=${endDate}`;
        });

        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const search = this.querySelector('[name="search"]').value;
            window.location.href = `{{ route('sponsorships.customer_corporate', $corporate->id) }}?search=${search}`;
        });
    </script>
@endsection
