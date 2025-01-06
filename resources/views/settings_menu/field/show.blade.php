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
                            <h3 class="card-title">Chi tiết lĩnh vực</h3>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Tên lĩnh vực</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="major_name"
                                                        value="{{ $field->field_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mã lĩnh vực</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="major_id"
                                                        value="{{ $field->field_id }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="description" readonly>{{ $field->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Ngành</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        value="{{ $field->major->major_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card m-3">
                                <div class="card-header">
                                    <h5 class="card-title">Nhóm con</h5>
                                </div>
                                <div class="card-body" id="subgroups-container">
                                    <div class="row">
                                        @foreach ($field->subGroups as $key => $subgroup)
                                            <div class="col-md-12 field-group" id="group-{{ $key + 1 }}">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h5 class="text-center">Nhóm con {{ $key + 1 }}</h5>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Tên nhóm</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                name="subgroups[{{ $key }}][name]"
                                                                value="{{ $subgroup->subgroup_name }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Mô tả</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                name="subgroups[{{ $key }}][description]"
                                                                value="{{ $subgroup->description }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ route('edit.field', $field->id) }}" class="btn btn-primary mr-2">Chỉnh sửa</a>
                                <a href="{{ route('index.field') }}" class="btn btn-secondary">Đóng</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
