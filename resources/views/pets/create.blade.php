@extends('layouts.app')

@section('content')
<head>
    <title>ペット投稿 - PetConnect</title>
</head>
<body>
    <h3 class="mb-5"><center>ペットの投稿</center></h3>
    <form action="/pets" method="POST">
        @csrf
        
        <div class="title mb-4 container">
            <h4>タイトル（50字以内）</h4>
            <input type="text" class="form-control" name="pet[title]" value="{{ old('pet.title') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('pet.title') }}</p>
        </div>
        
        <div class="sex mb-4 container">
            <h4>ペットの性別</h4>
            <select class="form-select" name="pet[sex_id]">
                <option selected>性別を選択</option>
                @foreach($sexes as $sex)
                    <option value="{{ $sex->id }}">{{ $sex->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="age mb-4 container">
            <h4>ペットの年齢</h4>
            <div class="input-group">
                <input type="text" class="form-control" name="pet[age]" placeholder="半角数字のみ（例：8）" value="{{ old('pet.age') }}"/>
                <span class="input-group-text">歳</span>
            </div>
            <p class="title__error" style="color:red">{{ $errors->first('pet.age') }}</p>
        </div>
        
        <div class="species mb-4 container">
            <h4>ペットの種類</h4>
            <select　class="form-select" name="pet[species_id]">
                <option selected>種類を選択</option>
                @foreach($species as $species)
                    <option value="{{ $species->id }}">{{ $species->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="breed mb-4 container">
            <h4>品種名（50字以内）</h4>
            <input type="text" class="form-control" name="pet[breed]" value="{{ old('pet.breed') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('pet.breed') }}</p>
        </div>
            
        <div class="prefecture mb-4 container">
            <h4>都道府県</h4>
            <select class="form-select" name="pet[prefecture_id]">
                <option selected>都道府県を選択</option>
                @foreach($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                @endforeach
            </select>
        </div>
            
        <div class="delivery_area mb-4 container">
            <h4>受け渡し可能地域（50字以内）</h4>
            <input type="text" class="form-control" name="pet[delivery_area]" value="{{ old('pet.delivery_area') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('pet.delivery_area') }}</p>
        </div>
            
        <div class="body mb-4 container">
            <h4>詳細情報（2000字以内）</h4>
            <textarea class="form-control" rows="5" name="pet[body]" placeholder="疾患、アレルギー、避妊・去勢の有無、性格、えさの好みなど">{{ old('pet.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('pet.body') }}</p>
        </div>
            
        <div class="mb-2 container">
            <input class="btn btn-primary " type="submit" value="投稿"/>
        </div>
    </form>
    <div class="back container">
        <a href="/pets">
            <button type="button" class="btn btn-secondary">戻る</button>
        </a>
    </div>
</body>
@endsection
