@extends('layouts.index')
@section('content')
    <h2 class="text-center text-uppercase text-decoration-underline text-success">Chi tiết sinh viên</h2>

    <div class="container">
        <div class="row">
            <h3 class="text-center text-success"></h3>
            <table class="table table-dark table-striped align-middle">
                <thead>
                <tr>
                    <th class="col-6" scope="col">Thuộc tính</th>
                    <th class="col-6" scope="col">Giá trị</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Mã Sinh Viên</td>
                    <td>{{$student->id}}</td>
                </tr>
                <tr>
                    <td>Tên Sinh Viên</td>
                    <td>{{$student->name}}</td>
                </tr>
                <tr>
                    <td>Giới Tính</td>
                    <td>{{$student->gender}}</td>
                </tr>
                <tr>
                    <td>Ngày Sinh</td>
                    <td>{{$student->birthday}}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>{{$student->address}}</td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>{{$student->phone_number}}</td>
                </tr>
                <tr>
                    <td>Mã Lớp</td>
                    <td>{{$student->type_id}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$student->email}}</td>
                </tr>


                </tbody>
            </table>
        </div>

        <p class="d-flex justify-content-end"><a href="{{route('students.index')}}" class=""><button class="btn btn-primary fw-bold">Trở lại</button></a></p>
    </div>

@endsection
