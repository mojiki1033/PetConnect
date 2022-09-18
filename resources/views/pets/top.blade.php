@extends('layouts.app')

@section('content')
<head>
    <title>PetConnect</title>
</head>
<body>
    <div class="container">
        <div class="gy-4 col-lg-9 col-xl-8 col-xxl-7 mx-auto">
            <h4>PetConnectは、やむを得ず手放さざるを得なくなったペットの引き取り主を募集するマッチングサイトです。</h4>
            
            <div class="d-flex justify-content-center gx-3">
                <a href='/pets/create' class="mx-1">
                    <button type="button" class="btn btn-primary">ペットを投稿する</button>
                </a>
                <a href='/pets' class="mx-1">
                    <button type="button" class="btn btn-success">ペットの検索</button>
                </a>
            </div>
        </div>
    </div>
</body>
@endsection
