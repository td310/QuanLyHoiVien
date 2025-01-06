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
                            <h3 class="card-title">Thêm lĩnh vực</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('store.field') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Tên lĩnh vực</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        class="form-control @error('field_name') is-invalid @enderror"
                                                        name="field_name" value="{{ old('field_name') }}">
                                                    @error('field_name')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Mã lĩnh vực</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        class="form-control @error('field_id') is-invalid @enderror"
                                                        name="field_id" value="{{ old('field_id') }}">
                                                    @error('field_id')
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
                                                    @error('description')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Ngành</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" name="major_id"
                                                        style="width: 100%;">
                                                        <option value="">Chọn ngành</option>
                                                        @foreach ($majors as $major)
                                                            <option value="{{ $major->id }}"
                                                                {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                                                {{ $major->major_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                        <div class="col-md-12 field-group" id="group-1">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h5 class="text-center">Nhóm con 1</h5>
                                                <button type="button" class="btn btn-danger btn-sm remove-field">-</button>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-3 col-form-label">Tên nhóm</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="subgroups[0][name]"
                                                            value="{{ old('subgroups.0.name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-3 col-form-label">Mô tả</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="subgroups[0][description]"
                                                            value="{{ old('subgroups.0.description') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <button type="button" class="btn btn-primary btn-sm" id="add_field">
                                        <i class="fas fa-plus"></i> Thêm nhóm con
                                    </button>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                                <a href="" class="btn btn-secondary">Đóng</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let groupCount = document.querySelectorAll('.field-group').length || 0;

            document.getElementById('add_field')?.addEventListener('click', function() {
                const newGroup = `
            <div class="col-md-12 field-group" id="group-${groupCount}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="text-center">Nhóm con ${groupCount + 1}</h5>
                    <button type="button" class="btn btn-danger btn-sm remove-field">-</button>
                </div>
                <div class="form-group">
                    <div class="row align-items-center mb-2">
                        <label class="col-sm-3 col-form-label">Tên nhóm</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="subgroups[${groupCount}][name]">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row align-items-center mb-2">
                        <label class="col-sm-3 col-form-label">Mô tả</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="subgroups[${groupCount}][description]">
                        </div>
                    </div>
                </div>
            </div>
        `;
                document.getElementById('subgroups-container').querySelector('.row').insertAdjacentHTML(
                    'beforeend', newGroup);
                groupCount++;
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-field')) {
                    e.target.closest('.field-group').remove();
                }
            });
        });
    </script>
@endsection
