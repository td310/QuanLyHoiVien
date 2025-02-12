@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chỉnh sửa lịch họp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.calendar') }}">Lịch họp</a></li>
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
                            <!-- /.card-header -->
                            <form action="{{ route('update.calendar', $calendar->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Người chủ trì</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="host"
                                                                    value="{{ $calendar->host }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Tiêu đề</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="title"
                                                                    value="{{ $calendar->title }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Nội dung</label>
                                                            <div class="col-sm-9">
                                                                <textarea id="description" name="description" class="form-control" rows="4">{{ $calendar->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Địa điểm</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" name="location"
                                                                    value="{{ $calendar->location }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row align-items-center mb-2">
                                                            <label class="col-sm-3 col-form-label">Thời gian</label>
                                                            <div class="col-sm-9">
                                                                <input id="datetime-input" type="text" name="date"
                                                                    class="form-control" value="{{ $calendar->date }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Người nhận</label>

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
                                                                    class="row-checkbox"
                                                                    {{ $recipients->where('customer_type', 'committee')->where('customer_id', $committee->id)->count() > 0
                                                                        ? 'checked'
                                                                        : '' }}>
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
                                                                    class="row-checkbox"
                                                                    {{ $recipients->where('customer_type', 'corporate')->where('customer_id', $corporate->id)->count() > 0
                                                                        ? 'checked'
                                                                        : '' }}>
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
                                                                    class="row-checkbox"
                                                                    {{ $recipients->where('customer_type', 'personal')->where('customer_id', $personal->id)->count() > 0
                                                                        ? 'checked'
                                                                        : '' }}>
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
                                                                    class="row-checkbox"
                                                                    {{ $recipients->where('customer_type', 'partner')->where('customer_id', $partner->id)->count() > 0
                                                                        ? 'checked'
                                                                        : '' }}>
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
                                                <tbody id="manualEmailSection"
                                                    style="display: {{ $calendar->manual_email ? 'table-row-group' : 'none' }}">
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="manual_email_checkbox"
                                                                class="row-checkbox"
                                                                {{ $calendar->manual_email ? 'checked' : '' }}>
                                                        </td>
                                                        <td colspan="3">Khác</td>
                                                        <td>
                                                            <input type="email" name="manual_email" class="form-control"
                                                                value="{{ $calendar->manual_email }}">
                                                        </td>
                                                        <td colspan="5">-</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-primary mb-3" id="addEmailBtn">
                                                {{ $calendar->manual_email ? 'Sửa email' : 'Thêm email' }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary  mr-2">Chỉnh sửa</button>
                                    <a class="btn btn-secondary" href="{{ route('index.calendar') }}">Đóng</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addEmailBtn').click(function() {
                $('#manualEmailSection').toggle();
            });

            $('input[name="manual_email_checkbox"]').change(function() {
                if (!this.checked) {
                    $('input[name="manual_email"]').val('');
                }
            });
        });
        $(document).ready(function() {
            $('#select-all').change(function() {
                $('.row-checkbox').prop('checked', this.checked);
            });
        });
    </script>
    <script>
        flatpickr("#datetime-input", {
            enableTime: true,
            dateFormat: "Y-m-d h:i K",
            time_24hr: false,
            minDate: new Date(),
            allowInput: true
        });
    </script>
@endsection
