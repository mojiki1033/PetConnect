@extends('layouts.app')

@section('content')
<head>
    <title>投稿の編集 - PetConnect</title>
</head>
<body>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">ホーム</a></li>
                <li class="breadcrumb-item"><a href="/pets">ペット一覧</a></li>
                <li class="breadcrumb-item"><a href="/pets/{{ $pet->id }}">{{ $pet->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">投稿の編集</li>
            </ol>
        </nav>
        <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
            <h3 class="text-center mb-5">投稿の編集</h3>
            <p><span style="color: red;">*</span> が付いている欄は必須項目です</p>
            <form action="/pets/{{ $pet->id }}" method="POST">
                @csrf
                @method('put')
                
                <div class="form-group">
                    <label for="status" class="h5">募集状況 <span style="color: red;">*</span></label>
                    <select class="form-select" name="pet[status_id]" id="status">
                        <option value="{{ $statuses[0]->id }}" {{ old('pet.status_id', $pet->status_id) == $statuses[0]->id ? 'selected' : '' }}>{{ $statuses[0]->name }}</option>
                        <option value="{{ $statuses[1]->id }}" {{ old('pet.status_id', $pet->status_id) == $statuses[1]->id ? 'selected' : '' }}>{{ $statuses[1]->name }}</option>
                    </select>
                    <p style="color:red">{{ $errors->first('pet.status_id') }}</p>
                </div>
                
                <div class="form-group">
                    <label for="title" class="h5">タイトル <span style="color: red;">*</span><small>（50字以内）</small></label>
                    <input type="text" class="form-control" name="pet[title]" id="title" value="{{ old('pet.title', $pet->title) }}"/>
                    <p style="color:red">{{ $errors->first('pet.title') }}</p>
                </div>
                
                <div class="form-group">
                    <label for="species" class="h5">ペットの種類 <span style="color: red;">*</span></label>
                    <select class="form-select" name="pet[species_id]" id="species">
                        @foreach ($species as $species)
                            <option value="{{ $species->id }}" {{ old('pet.species_id', $pet->species_id) == $species->id ? 'selected' : '' }}>
                                {{ $species->name }}
                            </option>
                        @endforeach
                    </select>
                    <p style="color:red">{{ $errors->first('pet.species_id') }}</p>
                </div>
                    
                <div class="form-group">
                    <label for="breed" class="h5">品種名 <span style="color: red;">*</span><small>（50字以内）</small></label>
                    <input type="text" class="form-control" name="pet[breed]" id="breed" value="{{ old('pet.breed', $pet->breed) }}"/>
                    <p style="color:red">{{ $errors->first('pet.breed') }}</p>
                </div>
                    
                <div class="form-group">
                    <label for="age" class="h5">ペットの年齢 <span style="color: red;">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet[age]" id="age" placeholder="半角数字のみ（例：8）" value="{{ old('pet.age', $pet->age) }}"/>
                        <span class="input-group-text">歳</span>
                    </div>
                    <p style="color:red">{{ $errors->first('pet.age') }}</p>
                </div>
                        
                <div class="form-group">
                    <label for="sex" class="h5">ペットの性別 <span style="color: red;">*</span></label>
                    <select class="form-select" name="pet[sex_id]" id="sex">
                        @foreach ($sexes as $sex)
                            <option value="{{ $sex->id }}" {{ old('pet.sex_id', $pet->sex_id) == $sex->id ? 'selected' : '' }}>
                                {{ $sex->name }}
                            </option>
                        @endforeach
                    </select>
                    <p style="color:red">{{ $errors->first('pet.sex_id') }}</p>
                </div>
                        
                <div class="form-group">
                    <label for="prefecture" class="h5">都道府県 <span style="color: red;">*</span></label>
                    <select class="form-select" name="pet[prefecture_id]" id="prefecture">
                        @foreach ($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}" {{ old('pet.prefecture_id', $pet->prefecture_id) == $prefecture->id ? 'selected' : '' }}>
                                {{ $prefecture->name }}
                            </option>
                        @endforeach
                    </select>
                    <p style="color:red">{{ $errors->first('pet.prefecture_id') }}</p>
                </div>
                        
                <div class="form-group">
                    <label for="delivery_area" class="h5">受け渡し可能地域 <span style="color: red;">*</span><small>（50字以内）</small></label>
                    <input type="text" class="form-control" name="pet[delivery_area]" id="delivery_area" value="{{ old('pet.delivery_area', $pet->delivery_area) }}"/>
                    <p style="color:red">{{ $errors->first('pet.delivery_area') }}</p>
                </div>
                        
                <div class="form-group">
                    <label for="detail" class="h5">詳細情報<small>（2000字以内）</small></label>
                    <textarea class="form-control" rows="10" name="pet[detail]" id="detail" placeholder="疾患、アレルギー、避妊・去勢の有無、性格、えさの好みなど">{{ old('pet.detail', $pet->detail) }}</textarea>
                    <p style="color:red">{{ $errors->first('pet.detail') }}</p>
                </div>
                
                <div class="d-grid mb-2 col-6 mx-auto">
                    <input class="btn btn-primary " type="submit" value="変更を保存"/>
                </div>
            </form>
            
            <form action="/pets/{{ $pet->id }}" id="form_delete" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <input type="submit" style="display:none">
                
                <div class="d-grid col-6 mx-auto">
                    <button type="button" class="btn btn-danger" onclick="return deletePost(this);">投稿の削除</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('削除すると元に戻せません。\n本当に削除しますか？')) {
                document.getElementById('form_delete').submit();
            }
        }
    </script>
</body>
@endsection
