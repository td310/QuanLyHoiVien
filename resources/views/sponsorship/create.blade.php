@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Thêm mới tài trợ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.sponsorship') }}">Tài trợ</a></li>
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
                            <form action="{{ route('store.sponsorship') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Loại khách hàng</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="customer_type"
                                                            name="customer_type">
                                                            <option value="">Chọn loại khách hàng</option>
                                                            <option value="committee">Hội viên</option>
                                                            <option value="corporate">Doanh nghiệp</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group committee-select" style="display: none;">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Hội viên</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="committee_id">
                                                            <option value="">Chọn hội viên</option>
                                                            @foreach ($committees as $committee)
                                                                <option value="{{ $committee->id }}"
                                                                    data-card="{{ $committee->id_card }}"
                                                                    data-email="{{ $committee->email }}">
                                                                    {{ $committee->committee_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group corporate-select" style="display: none;">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Doanh nghiệp</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="cuscorporate_id">
                                                            <option value="">Chọn doanh nghiệp</option>
                                                            @foreach ($corporates as $corporate)
                                                                <option value="{{ $corporate->id }}"
                                                                    data-card="{{ $corporate->id_card }}"
                                                                    data-email="{{ $corporate->email }}">
                                                                    {{ $corporate->company_vn }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mã khách hàng</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="id_card" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="email" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Ngày tài trợ</label>
                                                    <div class="col-sm-8">
                                                        <input type="date"
                                                            class="form-control @error('date') is-invalid @enderror"
                                                            name="date" value="{{ old('date') }}">
                                                        @error('date')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Nội dung</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            name="description" value="{{ old('description') }}">
                                                        @error('description')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Sản phẩm đóng góp</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('product') is-invalid @enderror"
                                                            name="product" value="{{ old('product') }}">
                                                        @error('product')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đơn vị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            class="form-control @error('unit') is-invalid @enderror"
                                                            name="unit" value="{{ old('unit') }}">
                                                        @error('unit')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đơn giá</label>
                                                    <div class="col-sm-8">
                                                        <input type="number"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            name="price" id="price" value="{{ old('price') }}">
                                                        @error('price')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Số lượng</label>
                                                    <div class="col-sm-8">
                                                        <input type="number"
                                                            class="form-control @error('quantity') is-invalid @enderror"
                                                            name="quantity" id="quantity"
                                                            value="{{ old('quantity') }}">
                                                        @error('quantity')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Thành tiền</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" name="total" id="total_submit">
                                                        <input type="text" class="form-control" id="total_display"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đính kèm</label>
                                                    <div class="col-sm-8 input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="fileInput" name="attachment"
                                                                onchange="displayFileName(this)">
                                                            <label for="fileInput" id="fileInputLabel"
                                                                class="custom-file-label">Chọn tệp đính kèm</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customer_type').change(function() {
                $('.committee-select, .corporate-select').hide();
                if ($(this).val() === 'committee') {
                    $('.committee-select').show();
                } else if ($(this).val() === 'corporate') {
                    $('.corporate-select').show();
                }
            });

            $('select[name="committee_id"], select[name="cuscorporate_id"]').change(function() {
                var selectedOption = $(this).find('option:selected');
                $('#id_card').val(selectedOption.data('card'));
                $('#email').val(selectedOption.data('email'));
            });
        });

        function displayFileName(input) {
            var fileName = input.files[0].name;

            var label = document.getElementById('fileInputLabel');
            label.textContent = fileName;
        }

        document.addEventListener('DOMContentLoaded', function() {
            function formatMoney(amount) {
                return new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(amount);
            }

            function calculateTotal() {
                const price = parseFloat($('#price').val()) || 0;
                const quantity = parseFloat($('#quantity').val()) || 0;
                const total = price * quantity;

                $('#total_submit').val(total);
                $('#total_display').val(formatMoney(total));
            }

            $('#price, #quantity').on('input', calculateTotal);
        });
    </script>
@endsection
