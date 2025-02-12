@extends('index')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Danh sách câu lạc bộ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Câu lạc bộ</a></li>
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
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thêm câu lạc bộ</h3>
                            </div>
                            @if ($errors->any())
                                <div class="card-body">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <!-- /.card-header -->
                            <form action="{{ route('store.club') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                                            <input type="text"
                                                                class="form-control @error('club_code') is-invalid @enderror"
                                                                name="club_code" value="{{ old('club_code') }}">
                                                        </div>
                                                    </div>
                                                    @error('club_code')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên Tiếng Việt</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('club_name_vn') is-invalid @enderror"
                                                                name="club_name_vn" value="{{ old('club_name_vn') }}">
                                                        </div>
                                                    </div>
                                                    @error('club_name_vn')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên Tiếng Anh</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('club_name_en') is-invalid @enderror"
                                                                name="club_name_en" value="{{ old('club_name_en') }}">
                                                        </div>
                                                    </div>
                                                    @error('club_name_en')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Tên viết tắt</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('club_name_acronym') is-invalid @enderror"
                                                                name="club_name_acronym"
                                                                value="{{ old('club_name_acronym') }}">
                                                        </div>
                                                    </div>
                                                    @error('club_name_acronym')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Địa chỉ</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('address') is-invalid @enderror"
                                                                name="address" value="{{ old('address') }}">
                                                        </div>
                                                    </div>
                                                    @error('address')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã số thuế</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('tax_number') is-invalid @enderror"
                                                                name="tax_number" value="{{ old('tax_number') }}">
                                                        </div>
                                                    </div>
                                                    @error('tax_number')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Điện thoại</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                name="phone" value="{{ old('phone') }}">
                                                        </div>
                                                    </div>
                                                    @error('phone')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}">
                                                        </div>
                                                    </div>
                                                    @error('email')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Website</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('website') is-invalid @enderror"
                                                                name="website" value="{{ old('website') }}">
                                                        </div>
                                                    </div>
                                                    @error('website')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Fanpage</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('fanpage') is-invalid @enderror"
                                                                name="fanpage" value="{{ old('fanpage') }}">
                                                        </div>
                                                    </div>
                                                    @error('fanpage')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Ngày thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="date"
                                                                class="form-control @error('date') is-invalid @enderror"
                                                                name="date" value="{{ old('date') }}">
                                                        </div>
                                                    </div>
                                                    @error('date')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Quyết định thành lập</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                class="form-control @error('decision') is-invalid @enderror"
                                                                name="decision" value="{{ old('decision') }}">
                                                        </div>
                                                    </div>
                                                    @error('decision')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
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
                                                                    <option value="{{ $major->id }}">
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
                                                                name="feild_id" required style="width: 100%;" disabled>
                                                                <option value="">Chọn lĩnh vực</option>
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
                                                            <select class="form-control select2" name="market_id"
                                                                required>
                                                                <option value="">Chọn thị trường</option>
                                                                @foreach ($markets as $market)
                                                                    <option value="{{ $market->id }}">
                                                                        {{ $market->market_name }}</option>
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
                                                    <div class="manager-group" id="manager-0">
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Họ và tên</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control"
                                                                        name="managers[0][connection_manager_name]"
                                                                        value="{{ old('managers.0.connection_manager_name') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Chức vụ</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control"
                                                                        name="managers[0][position]"
                                                                        value="{{ old('managers.0.position') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Số điện thoại</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control"
                                                                        name="managers[0][phone]"
                                                                        value="{{ old('managers.0.phone') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Giới tính</label>
                                                                <div class="col-sm-7">
                                                                    <div class="d-flex align-items-center gap-3">
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="male-0" name="managers[0][gender]"
                                                                                value="male" {{ old('managers.0.gender') == 'male' ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="male-0">Nam</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="female-0" name="managers[0][gender]"
                                                                                value="female" {{ old('managers.0.gender') == 'female' ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="female-0">Nữ</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row align-items-center mb-2">
                                                                <label class="col-sm-5 col-form-label">Email</label>
                                                                <div class="col-sm-7">
                                                                    <input type="email" class="form-control"
                                                                        name="managers[0][email_connection]"
                                                                        value="{{ old('managers.0.email_connection') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mb-3">
                                                    <button type="button" class="btn btn-primary add-manager">
                                                        <i class="fas fa-plus"></i> Thêm người phụ trách
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-secondary  mr-2" href="{{ route('index.club') }}">Đóng</a>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
            let managerCount = document.querySelectorAll('.manager-group').length || 0;

            document.querySelector('.add-manager')?.addEventListener('click', function() {
                managerCount++;
                const newManager = `
                <div class="manager-group" id="manager-${managerCount}">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5>Người phụ trách ${managerCount}</h5>
                        <button type="button" class="btn btn-danger btn-sm remove-manager">-</button>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Họ và tên</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][connection_manager_name]" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Chức vụ</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][position]" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Số điện thoại</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][phone]" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Giới tính</label>
                            <div class="col-sm-7">
                                <div class="d-flex">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" id="male-${managerCount}" 
                                            name="managers[${managerCount}][gender]" value="male" required>
                                        <label class="form-check-label" for="male-${managerCount}">Nam</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="female-${managerCount}" 
                                            name="managers[${managerCount}][gender]" value="female">
                                        <label class="form-check-label" for="female-${managerCount}">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center mb-2">
                            <label class="col-sm-5 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="managers[${managerCount}][email_connection]" required>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                document.getElementById('managers-container').insertAdjacentHTML('beforeend', newManager);
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-manager')) {
                    e.target.closest('.manager-group').remove();
                }
            });
        });
    </script>
@endsection
