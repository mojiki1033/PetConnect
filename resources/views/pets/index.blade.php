@extends('layouts.app')

@section('content')
<head>
    <title>ペット一覧 - PetConnect</title>
</head>
<body>
    <div class="container">
        <a href='/pets/create'>
            <button type="button" class="btn btn-primary">ペット投稿</button>
        </a>
        
        @foreach ($pets as $pet)
            <p>{{ $pet->status->name }}</p>
            <h3>
                <a href="/pets/{{ $pet->id }}">{{ $pet->title }}</a>
            </h3>
            <p>
                {{ $pet->species->name }} / {{ $pet->breed }} / {{ $pet->age }}歳 / {{ $pet->sex->name }}<br>
                都道府県：{{ $pet->prefecture->name }}<br>
                受け渡し可能地域：{{ $pet->delivery_area }}
            </p>
        @endforeach
        
        <div class='paginate'>
            {{ $pets->links() }}
        </div>
    </div>
</body>
@endsection
