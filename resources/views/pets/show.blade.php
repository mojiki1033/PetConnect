@extends('layouts.app')

@section('content')
<head>
    <title>{{ $pet->title }} - PetConnect</title>
</head>
<body>
    <div class="container">
        <button type="button" class="btn btn-outline-secondary" onClick="history.back()">< 戻る</button>
        <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
            <dl class="row">
                <h2>{{ $pet->title }}</h2>
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
                    {!! nl2br(e($pet->detail)) !!}
                </dd>
            </dl>
            
            @if ($pet->status_id == 3)
                <div class="d-grid mb-2 col-6 mx-auto">
                    <button type="button" class="btn btn-secondary" disabled>マッチング成立済</button>
                </div>
                @elseif ($pet->user->id == Auth::id())
                    <a href="/pets/{{ $pet->id }}/edit" class="d-grid mb-2 col-6 mx-auto">
                        <button type="button" class="btn btn-success">投稿の編集</button>
                    </a>
                @endif
        </div>
    </div>
</body>
@endsection
