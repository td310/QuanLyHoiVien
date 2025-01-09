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
                            <h3 class="card-title">Chi tiết tổ chức</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('store.organization') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Tên tổ chức</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="organization_name"
                                                        value="{{ $organization->organization_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mã tổ chức</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="organization_id"
                                                        value="{{ $organization->organization_id }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="description" readonly>{{ $organization->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ route('edit.organization', $organization->id) }}" class="btn btn-primary mr-2">Chỉnh sửa</a>
                                <a href="{{ route('index.organization') }}" class="btn btn-secondary">Đóng</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
