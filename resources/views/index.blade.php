<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container ">
        <h1>Quản lý học sinh</h1>
        <hr>
        <a href="{{route('create')}}" class="btn btn-primary">Thêm mới</a>
        <div class='d-flex justify-content-between'>
            <div class='d-flex align-items-center'>
                    <p style="margin-right:10px">Hiển thị</p>
                    <select name="" id="" class="form-select" style="display:inline;margin-right:10px">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <p style="display:inline;margin-right:10px">dòng mỗi trang</p>
            </div>
            <div class="text-end">
                <p>Tìm kiếm</p>
                <input type="text" class="form-control">
            </div>
        </div>
        @if(session('msg'))
            <div class="alert alert-success">
                Nhập dữ liệu thành công
            </div>
        @endif
        <div>
            <table class="table table-borderd">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên học sinh</th>
                        <th>Số điện thoại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($students))
                    @foreach($students as $key =>$item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td><a href="{{ route('edit', ['id' => $item->id]) }}" class="btn btn-secondary">Sửa</a></td>
                        <td> <a onclick="return confirm('Bạn có chắc muốn xóa')" href="{{ route('delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Xóa</a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            <p>Hiển thị từ 1 đến 10 trong tổng số 14 dòng</p>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</body>
<script src="{{asset('asserts.bootstrap.min.js')}}"></script>

</html>