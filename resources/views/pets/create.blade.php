@extends('layouts.app')

@section('content')
<head>
    <title>ペット投稿 - PetConnect</title>
</head>
<body>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">ホーム</a></li>
                <li class="breadcrumb-item active" aria-current="page">ペットの投稿</li>
            </ol>
        </nav>
        <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
            <h3 class="text-center mb-5">ペットの投稿</h3>
            <p><span style="color: red;">*</span> が付いている欄は必須項目です</p>
            <form action="/pets" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="title" class="h5">タイトル <span style="color: red;">*</span><small>（50字以内）</small></label>
                    <input type="text" class="form-control" name="pet[title]" id="title" value="{{ old('pet.title') }}"/>
                    <p style="color:red">{{ $errors->first('pet.title') }}</p>
                </div>
            
                <div class="form-group">
                    <label for="species" class="h5">ペットの種類 <span style="color: red;">*</span></label>
                    <select class="form-select" name="pet[species_id]" id="species">
                        <option value="">-----</option>
                        @foreach ($species as $species)
                            <option value="{{ $species->id }}" {{ old('pet.species_id') == $species->id ? 'selected' : ''}}>
                                {{ $species->name }}
                            </option>
                        @endforeach
                    </select>
                    <p style="color:red">{{ $errors->first('pet.species_id') }}</p>
                </div>
            
                <div class="form-group">
                    <label for="breed" class="h5">品種名 <span style="color: red;">*</span><small>（50字以内）</small></label>
                    <input type="text" class="form-control" name="pet[breed]" id="breed" value="{{ old('pet.breed') }}"/>
                    <p style="color:red">{{ $errors->first('pet.breed') }}</p>
                </div>
            
                <div class="form-group">
                    <label for="age" class="h5">ペットの年齢 <span style="color: red;">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet[age]" id="age" placeholder="半角数字のみ（例：8）" value="{{ old('pet.age') }}"/>
                        <span class="input-group-text">歳</span>
                    </div>
                    <p style="color:red">{{ $errors->first('pet.age') }}</p>
                </div>
                
                <div class="form-group">
                    <label for="sex" class="h5">ペットの性別 <span style="color: red;">*</span></label>
                    <select class="form-select" name="pet[sex_id]" id="sex">
                        <option value="">-----</option>
                        @foreach ($sexes as $sex)
                            <option value="{{ $sex->id }}" {{ old('pet.sex_id') == $sex->id ? 'selected' : ''}}>
                                {{ $sex->name }}
                            </option>
                        @endforeach
                    </select>
                    <p style="color:red">{{ $errors->first('pet.sex_id') }}</p>
                </div>
                
                <div class="form-group">
                    <label for="prefecture" class="h5">都道府県 <span style="color: red;">*</span></label>
                    <select class="form-select" name="pet[prefecture_id]" id="prefecture">
                        <option value="">-----</option>
                        @foreach ($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}" {{ old('pet.prefecture_id') == $prefecture->id ? 'selected' : ''}}>
                                {{ $prefecture->name }}
                            </option>
                        @endforeach
                    </select>
                    <p style="color:red">{{ $errors->first('pet.prefecture_id') }}</p>
                </div>
                
                <div class="form-group">
                    <label for="delivery_area" class="h5">受け渡し可能地域 <span style="color: red;">*</span><small>（50字以内）</small></label>
                    <input type="text" class="form-control" name="pet[delivery_area]" id="delivery_area" value="{{ old('pet.delivery_area') }}"/>
                    <p style="color:red">{{ $errors->first('pet.delivery_area') }}</p>
                </div>
                
                <div class="form-group">
                    <label for="detail" class="h5">詳細情報<small>（2000字以内）</small></label>
                    <textarea class="form-control" rows="10" name="pet[detail]" id="detail" placeholder="疾患、アレルギー、避妊・去勢の有無、性格、えさの好みなど">{{ old('pet.detail') }}</textarea>
                    <p style="color:red">{{ $errors->first('pet.detail') }}</p>
                </div>
                
                <div class="d-grid col-6 mx-auto">
                    <input class="btn btn-primary " type="submit" value="投稿"/>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
