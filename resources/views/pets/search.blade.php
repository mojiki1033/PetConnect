@extends('layouts.app')

@section('content')
<head>
    <title>PetConnect</title>
</head>
<body>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">ホーム</a></li>
                <li class="breadcrumb-item active" aria-current="page">ペット検索</li>
            </ol>
        </nav>
        <div class="col-lg-11 col-xl-11 col-xxl-10 mx-auto">
            <form action="/pets/search" method="GET">
                <dl class="row">
                    <hr>
                    
                    <dt class="col-12 col-sm-12 col-md-2">募集状況</dt>
                    <dd class="col-12 col-sm-12 col-md-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="status" id="status_all" checked value="">
                            <label for="status_all" class="form-check-label">指定なし</label>
                        </div>
                        @foreach ($statuses as $status)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" id="status_{{$status->id}}" value="{{$status->id}}">
                                <label for="status_{{$status->id}}" class="form-check-label">{{$status->name}}</label>
                            </div>
                        @endforeach
                    </dd>
                    
                    <hr>
                    
                    <dt class="col-12 col-sm-12 col-md-2">ペットの種類</dt>
                    <dd class="col-12 col-sm-12 col-md-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="species" id="species_all" checked value="">
                            <label for="species_all" class="form-check-label">指定なし</label>
                        </div>
                        @foreach ($species as $species)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="species" id="species_{{$species->id}}" value="{{$species->id}}">
                                <label for="species_{{$species->id}}" class="form-check-label">{{$species->name}}</label>
                            </div>
                        @endforeach
                    </dd>
                    
                    <hr>
                    
                    <dt class="col-12 col-sm-12 col-md-2">ペットの性別</dt>
                    <dd class="col-12 col-sm-12 col-md-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="sex" id="sex_all" checked value="">
                            <label for="sex_all" class="form-check-label">指定なし</label>
                        </div>
                        @foreach ($sexes as $sex)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="sex" id="sex_{{$sex->id}}" value="{{$sex->id}}">
                                <label for="sex_{{$sex->id}}" class="form-check-label">{{$sex->name}}</label>
                            </div>
                        @endforeach
                    </dd>
                    
                    <hr>
                    
                    <dt class="col-12 col-sm-12 col-md-2">都道府県</dt>
                    <dd class="col-12 col-sm-12 col-md-10">
                        <select class="form-select" name="prefecture">
                            <option value="">指定なし</option>
                            @foreach ($prefectures as $prefecture)
                                <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                            @endforeach
                        </select>
                    </dd>
                    
                    <hr>
                    
                    <dt class="col-12 col-sm-12 col-md-2">並べ替え</dt>
                    <dd class="col-12 col-sm-12 col-md-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="sort" id="ascByCreated_at" checked value="asc">
                            <label for="ascByCreated_at" class="form-check-label">投稿が古い順</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="sort" id="descByCreated_at" value="desc">
                            <label for="descByCreated_at" class="form-check-label">投稿が新しい順</label>
                        </div>
                    </dd>
                    
                    <div class="d-grid col-6 mx-auto">
                        <input class="btn btn-primary " type="submit" value="検索">
                    </div>
                
                </dl>
            </form>
        
        
            <div class="row">
                @if (is_null($result))
                    <h5 class="text-center">お探しのペットは見つかりませんでした。ほかの条件をお試しください。</h5>
                @else
                    @foreach ($result as $pet)
                        <div >
                            @if ($pet->status_id == 1)
                                <span class="badge text-bg-success">{{ $pet->status->name }}</span>
                            @elseif ($pet->status_id == 2)
                                <span class="badge text-bg-danger">{{ $pet->status->name }}</span>
                            @else
                                <span class="badge text-bg-info">{{ $pet->status->name }}</span>
                            @endif
                            <h4>
                                <a href="/pets/{{ $pet->id }}">{{ $pet->title }}</a>
                            </h4>
                            <p>
                                {{ $pet->species->name }} / {{ $pet->breed }} / {{ $pet->age }}歳 / {{ $pet->sex->name }}<br>
                                都道府県：{{ $pet->prefecture->name }}<br>
                                受け渡し可能地域：{{ $pet->delivery_area }}
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>
            
            <div class='paginate'>
            {{ $result->links() }}
            </div>
        </div>
    </div>
</body>
@endsection
