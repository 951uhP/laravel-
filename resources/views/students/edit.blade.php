@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="row p-3">
            <h4 class="text-uppercase text-decoration-underline text-center fw-bold text-success">Thêm Sinh Viên</h4>
            <form class="bg-info border border-2 border-success rounded-3" method="POST" action="{{route('students.update', $student)}}">
                @csrf
                @method('PUT')
                <div class="mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light">Tên Sinh Viên</span>
                        <input value="{{$student->name}}" name='name' type="text" class="form-control" placeholder="">
                    </div>
                    @error('name')
                    <div class="text-danger fw-bold">{{$message}}</div>
                    @enderror
                </div>
                <div class="input-group mt-2">
                    <span class="input-group-text fw-bold bg-light">Giới Tính</span>

                    <select class="form-select" name='gender'>
                        <option value="{{$student->gender}}">{{$student->gender}}</option>
                        <option value="nu">nu</option>
                        <option value="nam">nam</option>
                    </select>
                </div>

                <div class="mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light">Ngày sinh</span>
                        <input value="{{$student->birthday}}" name ='birthday' type="date" class="form-control" placeholder="">
                    </div>
                    @error('birthday')
                    <div class="text-danger fw-bold">{{$message}}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light">Địa chỉ</span>
                        <input value="{{$student->address}}" name='address' type="text" class="form-control" placeholder="">
                    </div>
                    @error('address')
                    <div class="text-danger fw-bold">{{$message}}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light">Số điện thoại</span>
                        <input value="{{$student->phone_number}}" name='phone_number' type="text" class="form-control" placeholder="">
                    </div>
                    @error('phone_number')
                    <div class="text-danger fw-bold">{{$message}}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold bg-light">Email</span>
                        <input value="{{$student->email}}" name='email' type="text" class="form-control" placeholder="">
                    </div>
                    @error('email')
                    <div class="text-danger fw-bold">{{$message}}</div>
                    @enderror
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-text fw-bold bg-light">Tên Loại Sinh Viên</span>
                    <option value="{{$student->id}}" >{{$student->type_id}}</option>
                    <select class="form-select" name='type_id'>
                        @foreach($types as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="d-flex my-3">
                    <button type="submit" class="btn btn-primary ">Sửa </button>
                    <a href="{{route('students.index')}}" class="btn btn-secondary ms-2">Trở lại</a>
                </div>

            </form>
        </div>
    </div>
@endsection
