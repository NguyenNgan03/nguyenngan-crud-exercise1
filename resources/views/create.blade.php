<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1>{{$title}}</h1>
        <div class='row'>
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{route('store')}}" method="post">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')  
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                    <div class="p-2"></div>
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phoneNumber">
                    @error('phoneNumber')  
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                    @csrf
                    <hr>
                    <button type="submit" class='btn btn-primary'>Thêm</button>
                    <a href="{{route('index')}}" class='btn btn-danger'>Quay lại</a>
                </form>
            </div>
            <div class="col-3"></div>
        </div>

    </div>
</body>