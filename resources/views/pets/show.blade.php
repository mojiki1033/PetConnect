@extends('layouts.app')

@section('content')
<head>
    <title>{{ $pet->title }} - PetConnect</title>
</head>
<body>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">ホーム</a></li>
                <li class="breadcrumb-item"><a href="/pets">ペット一覧</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pet->title }}</li>
            </ol>
        </nav>
        <div class="gy-4 col-lg-9 col-xl-8 col-xxl-7 mx-auto">
            <dl class="row">
                <h2>{{ $pet->title }}</h2>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">募集状況</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->status->name }}</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">投稿者</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->user->name }}</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">ペットの種類</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->species->name }}</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">品種</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->breed }}</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">年齢</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->age }}歳</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">性別</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->sex->name }}</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">都道府県</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->prefecture->name }}</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">受け渡し可能地域</dt>
                <dd class="col-12 col-sm-12 col-md-9">{{ $pet->delivery_area }}</dd>
                <hr>
                <dt class="col-12 col-sm-12 col-md-3">詳細情報</dt>
                <dd class="col-12 col-sm-12 col-md-9">{!! nl2br(e($pet->detail)) !!}</dd>
            </dl>
            
            @if ($pet->status_id != 3)
                @if ($pet->user->id == Auth::id())
                    <div class="d-grid mb-5 col-6 mx-auto">
                        <button type="button" class="btn btn-success" onclick="location.href='/pets/{{ $pet->id }}/edit'">投稿の編集</button>
                    </div>
                @elseif ($pet->status_id == 1)
                    @if (Auth::check())
                        <div class="d-grid mb-5 col-6 mx-auto">
                            <button type="button" class="btn btn-danger">引き取りを申し出る</button>
                        </div>
                    @else
                        <div class="d-grid mb-5 col-8 col-sm-8 col-md-6 mx-auto">
                            <button type="button" class="btn btn-info" onclick="location.href='/login'">引き取りを申し出るにはログインが必要です</button>
                        </div>
                    @endif
                @else
                    <div class="d-grid mb-5 col-6 mx-auto">
                        <button type="button" class="btn btn-danger" disabled>募集一時停止中</button>
                    </div>
                @endif
            @else
                <div class="d-grid mb-5 col-6 mx-auto">
                    <button type="button" class="btn btn-secondary" disabled>マッチング成立済</button>
                </div>
            @endif
            
            <div class="col-12 col-sm-12 col-md-9">
                <h3>コメント</h3>
                <hr>
                @foreach ($comments as $comment)
                    <h5>
                        {{ isset($comment->user_id) ? $comment->user->name : '<span class="text-muted">削除されたユーザー</span>'}}：
                        <small class="h6 text-muted">{{ $comment->created_at }}</small>
                    </h5>
                    <p>{!! nl2br(e($comment->content)) !!}</p>
                    <hr>
                @endforeach
                
                @if ($pet->status_id != 3)
                    @if (Auth::check())
                        <form action="/pets/{{$pet->id}}/comment" method="POST">
                            @csrf
                            <textarea class="form-control" rows="10" name="content">{{ old('content') }}</textarea>
                            <p style="color:red">{{ $errors->first('content') }}</p>
                            <div class="d-grid col-6 mx-auto">
                                <input class="btn btn-primary" type="submit" value="コメントを送信">
                            </div>
                        </form>
                    @else
                        <div class="d-grid mb-5 col-8 mx-auto">
                            <button type="button" class="btn btn-info" onclick="location.href='/login'">コメントをするにはログインが必要です</button>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</body>
@endsection
