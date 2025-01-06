@extends('customer_partner.index')
@section('customer_partner_content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tạo mới
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Tên đơn vị</th>
                                <th>Chức vụ</th>
                                <th>Tình trạng hoạt động</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection