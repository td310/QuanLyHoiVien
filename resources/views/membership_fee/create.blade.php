@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách khách hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Ban chấp hành</a></li>
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
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thêm hội phí</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('membership_fee.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Tên khách hàng</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control select2" id="committee_select" name="committee_id" required style="width: 100%;">
                                                            <option value="">Chọn khách hàng</option>
                                                            @foreach ($committees as $committee)
                                                                <option value="{{ $committee->id }}"
                                                                        data-id-card="{{ $committee->id_card }}"
                                                                        data-email="{{ $committee->email }}">
                                                                    {{ $committee->committee_name }}
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
                                                    <label class="col-sm-4 col-form-label">Số tiền phải thu</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="debt"
                                                            value="{{ old('debt') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Ngày đóng *</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" name="date"
                                                            value="{{ old('date') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Nội dung</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="description"
                                                            value="{{ old('description') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đính kèm</label>
                                                    <div class="col-sm-8 input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="fileInput"
                                                                name="attachment" onchange="displayFileName(this)">
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
    </div><!-- /.container-fluid -->
    </section>
    </div>
    <script>
        document.getElementById('committee_select').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            document.getElementById('id_card').value = selectedOption.dataset.idCard;
            document.getElementById('email').value = selectedOption.dataset.email;
        });
    </script>
    <script>
        function displayFileName(input) {
            var fileName = input.files[0].name;

            var label = document.getElementById('fileInputLabel');
            label.textContent = fileName;
        }
    </script>
@endsection
