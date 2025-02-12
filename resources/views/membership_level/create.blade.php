@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Thêm mới hạng thành viên</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('index.membership_level')}}">Hạng thành viên</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
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
                            <form action="{{ route('store.membership_level') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Tên hạng thành viên</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('membership_level_name') is-invalid @enderror"
                                                            name="membership_level_name" value="{{ old('membership_level_name') }}">
                                                        @error('membership_level_name')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mô tả</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                                    </div>
                                                </div>
                                                @error('description')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mức phí phải nộp</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('fee') is-invalid @enderror"
                                                            name="fee" value="{{ old('fee') }}">
                                                        @error('fee')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đóng góp tối thiểu</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('contribute') is-invalid @enderror"
                                                            name="contribute" value="{{ old('contribute') }}">
                                                        @error('contribute')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
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
