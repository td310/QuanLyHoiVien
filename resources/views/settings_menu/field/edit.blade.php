@extends('settings_menu.index')
@section('setting_menu_content')
    <!-- Delete Forms - Outside main form -->
    @foreach ($field->subGroups as $subgroup)
        <form id="delete-form-{{ $subgroup->id }}" action="{{ route('delete.subgroup') }}" method="POST" class="d-none">
            @csrf
            <input type="hidden" name="field_id" value="{{ $field->id }}">
            <input type="hidden" name="subgroup_id" value="{{ $subgroup->id }}">
        </form>
    @endforeach

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa nhóm con này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh sửa lĩnh vực</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('update.field', $field->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row align-items-center mb-2">
                                                <label class="col-sm-3 col-form-label">Tên lĩnh vực</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        class="form-control @error('field_name') is-invalid @enderror"
                                                        name="field_name" value="{{ $field->field_name }}">
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
                                                        name="field_id" value="{{ $field->field_id }}">
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
                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $field->description }}</textarea>
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
                                                    <select name="major_id" class="form-control select2">
                                                        <option value="">Chọn ngành</option>
                                                        @foreach ($majors as $major)
                                                            <option value="{{ $major->id }}"
                                                                {{ old('major_id', $field->major_id) == $major->id ? 'selected' : '' }}>
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
                                    <div class="row" id="subgroups-row">
                                        @foreach ($field->subGroups as $key => $subgroup)
                                            <div class="col-md-12 field-group" id="group-{{ $key + 1 }}"
                                                data-subgroup-id="{{ $subgroup->id }}">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h5 class="text-center">Nhóm con {{ $key + 1 }}</h5>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="showDeleteModal('{{ $subgroup->id }}')">-</button>
                                                </div>
                                                <input type="hidden" name="subgroups[{{ $key }}][id]"
                                                    value="{{ $subgroup->id }}">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Tên nhóm</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                name="subgroups[{{ $key }}][name]"
                                                                value="{{ $subgroup->subgroup_name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Mô tả</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"
                                                                name="subgroups[{{ $key }}][description]"
                                                                value="{{ $subgroup->description }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="button" class="btn btn-primary btn-sm" id="add_field">
                                            <i class="fas fa-plus"></i> Thêm nhóm con
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
                                <a href="{{ route('index.field') }}" class="btn btn-secondary">Đóng</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let groupCount = document.querySelectorAll('.field-group').length;
            let selectedSubgroupId = null;

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
                document.getElementById('subgroups-row').insertAdjacentHTML('beforeend', newGroup);
                groupCount++;
                updateGroupNumbers();
            });

            window.showDeleteModal = function(subgroupId) {
                selectedSubgroupId = subgroupId;
                $('#deleteModal').modal('show');
            }

            document.getElementById('confirmDelete').addEventListener('click', function() {
                if (selectedSubgroupId) {
                    document.getElementById('delete-form-' + selectedSubgroupId).submit();
                }
                $('#deleteModal').modal('hide');
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-field') && !e.target.closest('form')) {
                    e.preventDefault();
                    e.target.closest('.field-group').remove();
                    updateGroupNumbers();
                }
            });

            function updateGroupNumbers() {
                const groups = document.querySelectorAll('.field-group');
                groups.forEach((group, index) => {
                    const number = index + 1;
                    group.querySelector('h5').textContent = `Nhóm con ${number}`;

                    const inputs = group.querySelectorAll('input[name^="subgroups["]');
                    inputs.forEach(input => {
                        const fieldType = input.name.includes('[name]') ? 'name' : 'description';
                        input.name = `subgroups[${index}][${fieldType}]`;
                    });
                });
            }
        });
    </script>
@endsection
