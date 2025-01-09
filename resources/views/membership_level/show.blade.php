@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách hạng thành viên</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Hạng thành viên</a></li>
                            <li class="breadcrumb-item active">Chi tiết</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Chi tiết hạng thành viên</h3>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Tên hạng thành viên</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="membership_level_name"
                                                            value="{{ $membership_level->membership_level_name }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mô tả</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" name="description" readonly>{{$membership_level->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mức phí phải nộp</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="fee"
                                                            value="{{ $membership_level->fee }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đóng góp tối thiểu</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="contribute"
                                                            value="{{ $membership_level->contribute }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <a href="{{ route('edit.membership_level', $membership_level->id) }}" class="btn btn-primary mr-2">Chỉnh sửa</a>
                                    <a href="{{ route('index.membership_level') }}" class="btn btn-secondary">Đóng</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div><!-- /.container-fluid -->
@endsection
