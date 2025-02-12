@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hội Phí</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.sponsorship') }}">Tài trợ</a></li>
                            <li class="breadcrumb-item active">Chi tiết tài trợ</li>
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
                                <h3 class="card-title">Chi tiết tài trợ</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('store.sponsorship') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Người tài trợ</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            value="{{ $sponsorships->committee ? $sponsorships->committee->committee_name : ($sponsorships->cuscorporate ? $sponsorships->cuscorporate->company_vn : '') }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Mã khách hàng</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            value="{{ $sponsorships->committee ? $sponsorships->committee->id_card : ($sponsorships->cuscorporate ? $sponsorships->cuscorporate->id_card : '')}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            value="{{ $sponsorships->committee ? $sponsorships->committee->email : ($sponsorships->cuscorporate ? $sponsorships->cuscorporate->email : '')}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Ngày tài trợ</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" name="date"
                                                            value="{{ $sponsorships->date }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Nội dung</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="description"
                                                            value="{{ $sponsorships->description }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Sản phẩm đóng góp</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="product"
                                                            value="{{ $sponsorships->product }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đơn vị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="unit"
                                                            value="{{ $sponsorships->unit }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đơn giá</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control" name="price"
                                                            id="price" value="{{ $sponsorships->price }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Số lượng</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control" name="quantity"
                                                            value="{{ $sponsorships->quantity }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Thành tiền</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            value="{{ format_money($sponsorships->total) }}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-4 col-form-label">Đính kèm</label>
                                                    <div class="col-sm-8">
                                                        @if ($sponsorships->getFirstMedia('sponsorship_attachments'))
                                                            <a href="{{ $sponsorships->getFirstMedia('sponsorship_attachments')->getUrl() }}"
                                                                class="btn btn-outline-primary" target="_blank">
                                                                <i class="fas fa-download"></i>
                                                                {{ $sponsorships->getFirstMedia('sponsorship_attachments')->file_name }}
                                                            </a>
                                                        @else
                                                            <p class="text-muted mb-0">Không có tệp đính kèm</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
@endsection
