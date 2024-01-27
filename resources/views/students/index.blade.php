@extends('layouts.index' )
@section('content')
    <h2 class="text-center text text-success my-4 text-uppercase text-decoration-underline">Quản lý sinh viên</h2>


    <div class="container">

        <a href="{{route('students.create')}}">
            <button class="btn btn-success mb-3"><i class="fa-regular fa-square-plus"></i> Thêm sinh viên</button>
        </a>
        <div class="row">

            <table class="table table-primary table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Mã Sinh Viên</th>
                    <th scope="col">Tên Sinh Viên</th>
                    <th scope="col">Loại Sinh Viên</th>
                    <th scope="col">Ngày Sinh</th>
                    <th scope="col">Giới Tính</th>

                    <th scope="col" class="text-center" colspan="3">Chỉnh sửa</th>

                </tr>
                </thead>
                <tbody>
                @foreach($students as $item)
                    <tr>
                        <th scope="row">{{ $item->id}}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->getTypeName()}}</td>
                        <td>{{ $item->birthday }}</td>
                        <td>{{ $item->gender }}</td>

                        <td ><a class="btn btn-success" href="{{route('students.show', ['student' => $item->id])}}"><i class="fa-regular fa-eye"></i></a></td>
                        <td ><a class="btn btn-warning" href="{{route('students.edit', ['student' => $item->id, 'pageIndex' => $pageIndex])}}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                        {{--                        <td ><button class="btn btn-warning" data-bs-toggle='modal'   data-bs-target='#A{{$item->id}}'><i class="fa-regular fa-trash-can"></i></button></td>--}}



                        {{--                        <!-- Modal -->--}}
                        {{--                        <div class='modal fade' id='A{{$item->studentID}}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>--}}
                        {{--                            <div class='modal-dialog'>--}}
                        {{--                                <div class='modal-content'>--}}
                        {{--                                    <div class='modal-header'>--}}
                        {{--                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Xác nhận xóa</h1>--}}
                        {{--                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class='modal-body'>--}}
                        {{--                                        Bạn có muốn lượt thuê có id: {{$item->studentID}}--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class='modal-footer'>--}}
                        {{--                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Trở lại</button>--}}
                        {{--                                        <form action="{{route('students.destroy', ['pageIndex' => $pageIndex, 'student' => $item->id])}}" method="POST">--}}
                        {{--                                            @csrf--}}
                        {{--                                            @method('DELETE')--}}
                        {{--                                            <button type="submit"  class='btn btn-primary'>Đồng ý</button>--}}
                        {{--                                        </form>--}}

                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </tr>--}}

                        <td>
                            <form id="formDl" action="{{ route('students.destroy', ['student' =>$item->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="CheckDl()">Xóa</button>
                            </form>
                            <script>
                                function CheckDl(){
                                    if(confirm('Ban co chac muon xoa?')){
                                        document.getElementById('formDl').submit();
                                    }else{
                                        event.preventDefault();
                                    }
                                }
                            </script></td>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- paginating  -->

    <div class="d-flex justify-content-center align-items-center my-2">
        <a class="btn btn-success" href="{{route('students.index', ['pageIndex' => $pageIndex - 1])}}">Trước</a>
        @for($i = 1; $i <= $numberOfPage; $i++)
            @if($pageIndex == $i)
                <a class="btn btn-primary ms-2" href="{{route('students.index', ['pageIndex' => $i])}}">{{$i}}</a>
            @else
                <a class="btn btn-success ms-2" href="{{route('students.index', ['pageIndex' => $i])}}">{{$i}}</a>
            @endif
        @endfor
        <a class="btn btn-success ms-2" href="{{route('students.index', ['pageIndex' => $pageIndex + 1])}}">Sau</a>
    </div>


    <!-- modal inform -->


    <div id="myDialog" style="display: none;" class="px-5 py-3 rounded-3">
        <h4 class="text-primary fw-bold fs-4">Thông báo</h4>
        <p class="text-success">{{ session('mes') }}</p>
        <button id="confirmButton" class="float-end rounded-2">Đồng ý</button>
    </div>
    <style>
        #myDialog {
            position: fixed;
            width: 500px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ffffff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        #confirmButton {
            padding: 10px 20px;
            background: #007bff;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }
    </style>
    @if(session('mes'))
        <script>
            var dialog = document.getElementById("myDialog");
            var confirmButton = document.getElementById("confirmButton");

            dialog.style.display = "block";
            confirmButton.addEventListener("click", function() {
                dialog.style.display = "none";
            });
            // alert("{{ session('Success') }}")
        </script>
    @endif

    <script src="{{asset('icon/css/all.css')}}"></script>
@endsection
