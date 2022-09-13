@extends('layouts.app')

@section('content')
<head>
    <title>{{ $pet->title }} - PetConnect</title>
</head>
<body>
    <div class="container">
        <a href="/pets">
            <button type="button" class="btn btn-light" onClick="history.back()">< 戻る</button>
        </a>
        <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
            <dl class="row">
                <h2>
                    {{ $pet->title }}
                </h2>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    募集状況
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->status->name }}
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    投稿者
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->user->name }}
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    ペットの種類
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->species->name }}
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    品種
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->breed }}
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    年齢
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->age }}歳
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    性別
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->sex->name }}
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    都道府県
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->prefecture->name }}
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    受け渡し可能地域
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {{ $pet->delivery_area }}
                </dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">
                    詳細情報
                </dt>
                <dd class="col-12 col-sm-12 col-md-9">
                    {!! nl2br(e($pet->body)) !!}
                </dd>
            </dl>
        </div>
    </div>
</body>
@endsection
