@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chỉnh sửa câu lạc bộ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Câu lạc bộ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Chỉnh sửa lạc bộ</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('update.club', $club->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="active">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">1. Thông tin cơ bản</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã câu lạc bộ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="club_code"
                                                                value="{{ $club->club_code }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên Tiếng Việt</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="club_name_vn" class="form-control"
                                                                value="{{ $club->club_name_vn }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên Tiếng Anh</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="club_name_en" class="form-control"
                                                                value="{{ $club->club_name_en }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên viết tắt</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="club_name_acronym" class="form-control"
                                                                value="{{ $club->club_name_acronym }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Địa chỉ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{ $club->address }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã số thuế</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="tax_number"
                                                                value="{{ $club->tax_number }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="phone" class="form-control " name="phone"
                                                                value="{{ $club->phone }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="email"
                                                                value="{{ $club->email }}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Website</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="website" class="form-control"
                                                                value="{{ $club->website }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Fanpage</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="fanpage"
                                                                class="form-control"value="{{ $club->fanpage }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5  col-form-label">Ngày thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" name="date" class="form-control"
                                                                value="{{ $club->date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Quyết định thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="decision" class="form-control"
                                                                value="{{ $club->decision }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">2. Ngành - Lĩnh vực</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Ngành</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control" name="major_id"
                                                                id="major-select">
                                                                <option value="">Chọn ngành</option>
                                                                @foreach ($majors as $major)
                                                                    <option value="{{ $major->id }}"
                                                                        {{ old('major_id', $club->major_id) == $major->id ? 'selected' : '' }}>
                                                                        {{ $major->major_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Lĩnh vực</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" id="field-select"
                                                                name="feild_id">
                                                                <option value="">Chọn lĩnh vực</option>
                                                                @if ($club->field)
                                                                    <option value="{{ $club->feild_id }}" selected>
                                                                        {{ $club->field->field_name }}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card col mb-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">3. Thị trường</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Thị trường</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2" name="market_id">
                                                                <option value="">Chọn thị trường</option>
                                                                @foreach ($markets as $market)
                                                                    <option value="{{ $market->id }}"
                                                                        {{ old('market_id', $club->market_id) == $market->id ? 'selected' : '' }}>
                                                                        {{ $market->market_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Lãnh đạo đơn vị -->
                                            <div class="card col mt-3">
                                                <div class="card-header2">
                                                    <h3 class="card-title">4. Phụ trách kết nối</h3>
                                                </div>
                                                <div id="managers-container">
                                                    @foreach ($club->connectionManagers as $key => $manager)
                                                        <div class="manager-group" id="manager-{{ $key + 1 }}">
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Họ và
                                                                        tên</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" name="managers[{{$key}}][connection_manager_name]" class="form-control"
                                                                            value="{{ $manager->connection_manager_name }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" name="managers[{{$key}}][position]" class="form-control"
                                                                            value="{{ $manager->position }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Số điện
                                                                        thoại</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" name="managers[{{$key}}][phone]" class="form-control"
                                                                            value="{{ $manager->phone }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Giới tính</label>
                                                                    <div class="col-sm-7">
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <div class="form-check">
                                                                                <input type="radio" 
                                                                                    class="form-check-input" 
                                                                                    id="male-{{$key}}"
                                                                                    name="managers[{{$key}}][gender]" 
                                                                                    value="male"
                                                                                    {{ $manager->gender == 'male' ? 'checked' : '' }}
                                                                                    required>
                                                                                <label class="form-check-label" for="male-{{$key}}">Nam</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="radio" 
                                                                                    class="form-check-input" 
                                                                                    id="female-{{$key}}"
                                                                                    name="managers[{{$key}}][gender]" 
                                                                                    value="female"
                                                                                    {{ $manager->gender == 'female' ? 'checked' : '' }}
                                                                                    required>
                                                                                <label class="form-check-label" for="female-{{$key}}">Nữ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row align-items-center mb-2">
                                                                    <label class="col-sm-5 col-form-label">Email</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="email" name="managers[{{$key}}][email_connection]" class="form-control"
                                                                            value="{{ $manager->email_connection }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if (!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
                                    <a class="btn btn-secondary" href="{{ route('index.club') }}">Đóng</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const majorSelect = document.getElementById('major-select');
            const fieldSelect = document.getElementById('field-select');

            majorSelect.addEventListener('change', function() {
                const majorId = this.value;
                if (majorId) {
                    fieldSelect.disabled = false;
                    fetch(`/api/fields-by-major/${majorId}`)
                        .then(response => response.json())
                        .then(data => {
                            fieldSelect.innerHTML = '<option value="">Chọn lĩnh vực</option>';
                            data.forEach(field => {
                                fieldSelect.innerHTML +=
                                    `<option value="${field.id}">${field.field_name}</option>`;
                            });
                        })
                        .catch(error => console.error('Error fetching fields:', error));
                } else {
                    fieldSelect.disabled = true;
                    fieldSelect.innerHTML = '<option value="">Chọn lĩnh vực</option>';
                }
            });
        });
    </script>
@endsection
