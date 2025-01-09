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
                            <h3 class="card-title">Chi tiết doanh nghiệp</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('store.business') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Tên doanh nghiệp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="business_name"
                                                        value="{{ $business->business_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mã doanh nghiệp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="business_id"
                                                        value="{{ $business->business_id }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="description" readonly>{{ $business->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ route('edit.business', $business->id) }}" class="btn btn-primary mr-2">Chỉnh sửa</a>
                                <a href="{{ route('index.business') }}" class="btn btn-secondary">Đóng</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
