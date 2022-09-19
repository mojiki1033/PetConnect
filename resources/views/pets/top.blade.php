@extends('layouts.app')

@section('content')
<head>
    <title>PetConnect</title>
</head>
<body>
    <div class="container">
        <div class="gy-4 col-lg-9 col-xl-8 col-xxl-7 mx-auto">
            <h4>PetConnectは、手放すことになったペットの引き取り主を募集するマッチングサイトです。</h4>
            
            <div class="d-flex justify-content-center">
                <div class="mx-1">
                    <button type="button" class="btn btn-primary" onclick="location.href='/pets/create'">ペットを投稿する</button>
                </div>
                <div class="mx-1">
                    <button type="button" class="btn btn-success" onclick="location.href='/pets'">ペットを探す</button>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
