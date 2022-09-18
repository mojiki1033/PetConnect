@extends('layouts.app')

@section('content')
<head>
    <title>ペット検索 - PetConnect</title>
</head>
<body>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">ホーム</a></li>
                <li class="breadcrumb-item active" aria-current="page">ペット検索</li>
            </ol>
        </nav>
        <a href='/pets/create'>
            <button type="button" class="btn btn-primary">ペットの投稿</button>
        </a>
        
        <div class="row">
            @foreach ($pets as $pet)
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
        </div>
        
        <div class='paginate'>
            {{ $pets->links() }}
        </div>
    </div>
</body>
@endsection
