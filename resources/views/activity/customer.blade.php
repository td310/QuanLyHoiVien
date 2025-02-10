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
                            <li class="breadcrumb-item"><a href="{{ route('show.activity', $activity->id) }}">Chi tiết hoạt
                                    động</a></li>
                            <li class="breadcrumb-item active">Danh sách đội viên</li>
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
                            {{-- <div class="d-flex align-items-center justify-content-between p-4">
                                <form action="{{ route('index.activity') }}" method="GET">
                                    <div class="left-section">
                                        <label>Thời gian</label>
                                        <div class="input-group" style="width: 400px;">
                                            <input type="date" name="start_date" class="form-control"
                                                value="{{ request('start_date') }}">
                                            <div class="input-group-append input-group-prepend">
                                                <span class="input-group-text">đến</span>
                                            </div>
                                            <input type="date" name="end_date" class="form-control"
                                                value="{{ request('end_date') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="card-tools">
                                    <form action="{{ route('index.activity') }}" method="GET">
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
                            </div> --}}
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã khách hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Trạng thái tham gia</th>
                                            <th>Thời gian thàm gia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @isset($committees)
                                            @foreach ($committees as $committee)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $committee->id_login }}</td>
                                                    <td>{{ $committee->name }}</td>
                                                    <td>{{ $committee->email }}</td>
                                                    <td><span class="badge badge-warning">Chưa tham gia</span></td>
                                                    <td>-</td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                        @isset($corporates)
                                            @foreach ($corporates as $corporate)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $corporate->id_login }}</td>
                                                    <td>{{ $corporate->name }}</td>
                                                    <td>{{ $corporate->email }}</td>
                                                    <td><span class="badge badge-warning">Chưa tham gia</span></td>
                                                    <td>-</td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                        @isset($personals)
                                            @foreach ($personals as $personal)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $personal->id_login }}</td>
                                                    <td>{{ $personal->name }}</td>
                                                    <td>{{ $personal->email }}</td>
                                                    <td><span class="badge badge-warning">Chưa tham gia</span></td>
                                                    <td>-</td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                        @isset($partners)
                                            @foreach ($partners as $partner)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $partner->id_login }}</td>
                                                    <td>{{ $partner->name }}</td>
                                                    <td>-</td>
                                                    <td><span class="badge badge-warning">Chưa tham gia</span></td>
                                                    <td>-</td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                        @isset($manual_recipients)
                                            @foreach ($manual_recipients as $recipient)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>-</td>
                                                    <td>{{ $recipient['name'] }}</td>
                                                    <td>{{ $recipient['email'] }}</td>
                                                    <td><span class="badge badge-warning">Chưa tham gia</span></td>
                                                    <td>-</td>
                                                </tr>
                                            @endforeach
                                        @endisset
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
