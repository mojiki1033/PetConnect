@extends('layouts.app')

@section('content')
<head>
    <title>ペット一覧 - PetConnect</title>
</head>
<body>
    <div class="container">
        <div class='create'>
            [<a href='/pets/create'>ペット投稿</a>]
        </div>
        <div class='pets'>
            @foreach ($pets as $pet)
                <div class='pet'>
                    <div class='status'>
                        <p>{{ $pet->status->name }}</p>
                    </div>
                    <h3 class='title'>
                        <a href="/pets/{{ $pet->id }}">{{ $pet->title }}</a>
                    </h3>
                    <p class='profile'>
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
