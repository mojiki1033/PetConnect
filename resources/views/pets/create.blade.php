@extends('layouts.app')

@section('content')
<head>
    <title>ペット投稿 - PetConnect</title>
</head>
<body>
    <div class="container">
        <a href="/pets">
            <button type="button" class="btn btn-light" onClick="history.back()">< 戻る</button>
        </a>
        <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
            <h3 class="text-center mb-5">ペットの投稿</h3>
            <form action="/pets" method="POST">
                @csrf
                
                <div class="mb-4">
                    <h5>タイトル（50字以内）</h5>
                    <input type="text" class="form-control" name="pet[title]" value="{{ old('pet.title') }}"/>
                    <p style="color:red">{{ $errors->first('pet.title') }}</p>
                </div>
            
                <div class="mb-4">
                    <h5>ペットの種類</h5>
                    <select　class="form-select" name="pet[species_id]">
                        <option selected>-----</option>
                        @foreach($species as $species)
                            <option value="{{ $species->id }}">{{ $species->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-4">
                    <h5>品種名（50字以内）</h5>
                    <input type="text" class="form-control" name="pet[breed]" value="{{ old('pet.breed') }}"/>
                    <p style="color:red">{{ $errors->first('pet.breed') }}</p>
                </div>
            
                <div class="mb-4">
                    <h5>ペットの年齢</h5>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet[age]" placeholder="半角数字のみ（例：8）" value="{{ old('pet.age') }}"/>
                        <span class="input-group-text">歳</span>
                    </div>
                    <p style="color:red">{{ $errors->first('pet.age') }}</p>
                </div>
                
                <div class="mb-4">
                    <h5>ペットの性別</h5>
                    <select class="form-select" name="pet[sex_id]">
                        <option selected>-----</option>
                        @foreach($sexes as $sex)
                            <option value="{{ $sex->id }}">{{ $sex->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <h5>都道府県</h5>
                    <select class="form-select" name="pet[prefecture_id]">
                        <option selected>-----</option>
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <h5>受け渡し可能地域（50字以内）</h5>
                    <input type="text" class="form-control" name="pet[delivery_area]" value="{{ old('pet.delivery_area') }}"/>
                    <p style="color:red">{{ $errors->first('pet.delivery_area') }}</p>
                </div>
                
                <div class="mb-4">
                    <h5>詳細情報（2000字以内）</h5>
                    <textarea class="form-control" rows="5" name="pet[detail]" placeholder="疾患、アレルギー、避妊・去勢の有無、性格、えさの好みなど">{{ old('pet.detail') }}</textarea>
                    <p style="color:red">{{ $errors->first('pet.detail') }}</p>
                </div>
                
                <div class="d-grid mb-2 col-6 mx-auto">
                    <input class="btn btn-primary " type="submit" value="投稿"/>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
