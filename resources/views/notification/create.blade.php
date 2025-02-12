@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Thêm mới thông báo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.notification') }}">Thông báo</a></li>
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
                            <!-- /.card-header -->
                            <form action="{{ route('store.notification') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="active">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-2 col-form-label">Tiêu đề</label>
                                                    <div class="col-sm-10">
                                                        <input type="text"
                                                            class="form-control @error('title') is-invalid @enderror"
                                                            name="title" value="{{ old('title') }}">
                                                    </div>
                                                </div>
                                                @error('title')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-4 col-form-label">Hình thức</label>
                                                            <div class="d-flex col-sm-8">
                                                                <div class="form-check mr-3">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="email" name="method" value="email">
                                                                    <label class="form-check-label"
                                                                        for="email">Email</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="notification" name="method"
                                                                        value="notification">
                                                                    <label class="form-check-label"
                                                                        for="notification">Notification</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-4 col-form-label">Thời gian gửi</label>
                                                            <div class="d-flex col-sm-8">
                                                                <div class="form-check mr-3">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="now" name="date" value="now">
                                                                    <label class="form-check-label">Ngay lập tức</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        id="custom" name="date" value="custom">
                                                                    <label class="form-check-label">Tùy chọn</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="custom-date" class="row align-items-center mb-2"
                                                            style="display: none;">
                                                            <div class="col-sm-7 offset-sm-5">
                                                                <input type="datetime-local" class="form-control"
                                                                    name="date_custom" id="date_custom">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-2 col-form-label">Nội dung</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="content" name="description" class="form-control">{{ old('description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Người nhận</label>
                                            <div class="d-flex align-items-center justify-content-between p-4">
                                                <div class="left-section">
                                                    <label>Loại thành viên</label>
                                                    <select name="" class="form-control" style="width: 200px;"
                                                        onchange="this.form.submit()">
                                                        <option value="">Tất cả</option>
                                                    </select>
                                                </div>
                                                <div class="left-section">
                                                    <label>Lĩnh vực</label>
                                                    <select name="" class="form-control" style="width: 200px;"
                                                        onchange="this.form.submit()">
                                                        <option value="">Tất cả</option>
                                                    </select>
                                                </div>
                                                <div class="left-section">
                                                    <label>Thị trường</label>
                                                    <select name="" class="form-control" style="width: 200px;"
                                                        onchange="this.form.submit()">
                                                        <option value="">Tất cả</option>
                                                    </select>
                                                </div>
                                                <div class="left-section">
                                                    <label>Khách hàng mục tiêu</label>
                                                    <select name="" class="form-control" style="width: 200px;"
                                                        onchange="this.form.submit()">
                                                        <option value="">Tất cả</option>
                                                    </select>
                                                </div>
                                                <div class="left-section">
                                                    <label>Quy mô</label>
                                                    <select name="" class="form-control" style="width: 200px;"
                                                        onchange="this.form.submit()">
                                                        <option value="">Tất cả</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="select-all"></th>
                                                        <th>STT</th>
                                                        <th>Mã khách hàng</th>
                                                        <th>Tên khách hàng</th>
                                                        <th>Email</th>
                                                        <th>Loại thành viên</th>
                                                        <th>Lĩnh vực</th>
                                                        <th>Thị trường</th>
                                                        <th>Khách hàng mục tiêu</th>
                                                        <th>Quy mô</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="customerTable">
                                                    @foreach ($committees as $key => $committee)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="selected[]"
                                                                    value="committee_{{ $committee->id }}"
                                                                    class="row-checkbox">
                                                            </td>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $committee->id_login }}</td>
                                                            <td>{{ $committee->name }}</td>
                                                            <td>{{ $committee->email }}</td>
                                                            <td>Ban chấp hành</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach ($corporates as $corporate)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="selected[]"
                                                                    value="corporate_{{ $corporate->id }}"
                                                                    class="row-checkbox">
                                                            </td>
                                                            <td>{{ $loop->iteration + $committees->count() }}</td>
                                                            <td>{{ $corporate->id_login }}</td>
                                                            <td>{{ $corporate->name }}</td>
                                                            <td>{{ $corporate->email }}</td>
                                                            <td>Khách hàng doanh nghiệp</td>
                                                            <td>{{ optional($corporate->field)->field_name ?? '-' }}</td>
                                                            <td>{{ optional($corporate->market)->market_name ?? '-' }}</td>
                                                            <td>{{ optional($corporate->targetCustomer)->target_customer_name ?? '-' }}
                                                            </td>
                                                            <td>{{ $corporate->size_company ?? '-' }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach ($personals as $personal)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="selected[]"
                                                                    value="personal_{{ $personal->id }}"
                                                                    class="row-checkbox">
                                                            </td>
                                                            <td>{{ $loop->iteration + $committees->count() + $corporates->count() }}
                                                            </td>
                                                            <td>{{ $personal->id_login }}</td>
                                                            <td>{{ $personal->name }}</td>
                                                            <td>{{ $personal->email }}</td>
                                                            <td>Khách hàng cá nhân</td>
                                                            <td>{{ optional($personal->field)->field_name ?? '-' }}</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        </tr>
                                                    @endforeach

                                                    @foreach ($partners as $partner)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="selected[]"
                                                                    value="partner_{{ $partner->id }}"
                                                                    class="row-checkbox">
                                                            </td>
                                                            <td>{{ $loop->iteration + $committees->count() + $corporates->count() + $personals->count() }}
                                                            </td>
                                                            <td>{{ $partner->id_login }}</td>
                                                            <td>{{ $partner->name }}</td>
                                                            <td>-</td>
                                                            <td>Đối tác doanh nghiệp</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tbody id="manualEmailSection" style="display: none;">
                                                    <tr>
                                                        <td><input type="checkbox" name="manual_email_checkbox"
                                                                class="row-checkbox"></td>
                                                        <td colspan="3">Khác</td>
                                                        <td><input type="email" name="manual_email"
                                                                class="form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-primary" id="addEmailBtn">Thêm
                                                email</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-secondary  mr-2" href="{{ route('index.notification') }}">Đóng</a>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            if ($('#custom').is(':checked')) {
                $('#custom-date').show();
            } else {
                $('#custom-date').hide();
            }

            $('input[name="date"]').change(function() {
                if ($(this).val() === 'custom') {
                    $('#custom-date').slideDown();
                } else {
                    $('#custom-date').slideUp();
                }
            });
        });

        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'Nội dung thông báo',
                height: 200,
                tabsize: 2,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });

        $(document).ready(function() {
            $('#select-all').change(function() {
                $('.row-checkbox').prop('checked', this.checked);
            });
        });

        $(document).ready(function() {
            $('#addEmailBtn').click(function() {
                $('#manualEmailSection').toggle();
            });

            $('#select-all').change(function() {
                $('.row-checkbox').prop('checked', this.checked);
            });
        });
    </script>
@endsection
