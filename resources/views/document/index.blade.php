@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Tài liệu lưu trữ</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-end">
                        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                            @csrf
                            <button type="button" class="btn btn-success btn-sm" id="uploadBtn">
                                <i class="fas fa-plus"></i> Thêm tài liệu lưu trữ
                            </button>
                            <input type="file" name="document" id="uploadFile" style="display: none">
                        </form>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex align-items-center justify-content-between p-4">
                                <div class="d-flex">
                                    <div class="left-section mr-3">
                                        <label>Định dạng</label>
                                        <select name="field_id" class="form-control" style="width: 200px;"
                                            onchange="this.form.submit()">
                                            <option value="">Tất cả</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên fike</th>
                                            <th>Định dạng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $key => $document)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $document->name }}</td>
                                                <td>{{ \App\Helpers\FileHelper::getMimeTypeExtension($document->getFirstMedia('documents')->mime_type ?? 'Không xác định') }}</td>
                                                </td>
                                                <td>
                                                    @if ($document->getFirstMedia('documents'))
                                                        <a href="{{ route('documents.download', $document->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fas fa-download"></i> Tải xuống
                                                        </a>
                                                    @endif

                                                    <form action="{{ route('documents.destroy', $document->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Bạn có chắc muốn xoá?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Xóa
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadBtn = document.querySelector('#uploadBtn');
            const uploadFile = document.querySelector('#uploadFile');
            const uploadForm = document.querySelector('#uploadForm');
        
            if (uploadBtn && uploadFile && uploadForm) {
                uploadBtn.addEventListener('click', function() {
                    uploadFile.click();
                });
        
                uploadFile.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        uploadForm.submit();
                    }
                });
            }
        });
        </script>
@endsection
