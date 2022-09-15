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
            <form action="/pets" method="POST">
                @csrf
                <p><span style="color: red;">*</span> が付いている欄は必須項目です</p>
                
                <div class="mb-4">
                    <h5>タイトル <span style="color: red;">*</span><small>（50字以内）</small></h5>
                    <input type="text" class="form-control" name="pet[title]" value="{{ old('pet.title') }}"/>
                    <p style="color:red">{{ $errors->first('pet.title') }}</p>
                </div>
            
                <div class="mb-4">
                    <h5>ペットの種類 <span style="color: red;">*</span></h5>
                    <select　class="form-select" name="pet[species_id]">
                        <option selected>-----</option>
                        @foreach($species as $species)
                            <option value="{{ $species->id }}">{{ $species->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-4">
                    <h5>品種名 <span style="color: red;">*</span><small>（50字以内）</small></h5>
                    <input type="text" class="form-control" name="pet[breed]" value="{{ old('pet.breed') }}"/>
                    <p style="color:red">{{ $errors->first('pet.breed') }}</p>
                </div>
            
                <div class="mb-4">
                    <h5>ペットの年齢 <span style="color: red;">*</span></h5>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet[age]" placeholder="半角数字のみ（例：8）" value="{{ old('pet.age') }}"/>
                        <span class="input-group-text">歳</span>
                    </div>
                    <p style="color:red">{{ $errors->first('pet.age') }}</p>
                </div>
                
                <div class="mb-4">
                    <h5>ペットの性別 <span style="color: red;">*</span></h5>
                    <select class="form-select" name="pet[sex_id]">
                        <option selected>-----</option>
                        @foreach($sexes as $sex)
                            <option value="{{ $sex->id }}">{{ $sex->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <h5>都道府県 <span style="color: red;">*</span></h5>
                    <select class="form-select" name="pet[prefecture_id]">
                        <option selected>-----</option>
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <h5>受け渡し可能地域 <span style="color: red;">*</span><small>（50字以内）</small></h5>
                    <input type="text" class="form-control" name="pet[delivery_area]" value="{{ old('pet.delivery_area') }}"/>
                    <p style="color:red">{{ $errors->first('pet.delivery_area') }}</p>
                </div>
                
                <div class="mb-4">
                    <h5>詳細情報<small>（2000字以内）</small></h5>
                    <textarea class="form-control" rows="10" name="pet[detail]" placeholder="疾患、アレルギー、避妊・去勢の有無、性格、えさの好みなど">{{ old('pet.detail') }}</textarea>
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
