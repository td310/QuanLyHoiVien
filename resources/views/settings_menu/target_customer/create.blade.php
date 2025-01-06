@extends('settings_menu.index')
@section('setting_menu_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thêm nhóm khách hàng mục tiêu</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('store.target_customer') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Tên nhóm KHMT</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        class="form-control @error('target_customer_name') is-invalid @enderror"
                                                        name="target_customer_name" value="{{ old('target_customer_name') }}">
                                                    @error('target_customer_name')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mã nhóm KHMT</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        class="form-control @error('target_customer_id') is-invalid @enderror"
                                                        name="target_customer_id" value="{{ old('target_customer_id') }}">
                                                    @error('target_customer_id')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                            @error('description')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                                <a href="{{ route('index.target_customer') }}" class="btn btn-secondary">Đóng</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
