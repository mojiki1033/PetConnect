@extends('layouts.app')

@section('content')
<head>
    <title>投稿の編集 - PetConnect</title>
</head>
<body>
    <div class="container">
        <button type="button" class="btn btn-outline-secondary" onClick="history.back()">< 戻る</button>
        <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
            <h3 class="text-center mb-5">投稿の編集</h3>
            <form action="/pets/{{ $pet->id }}" method="POST">
                @csrf
                @method('put')
                
                <div class="mb-4">
                    <h5>募集状況</h5>
                    <select　class="form-select" name="pet[status_id]">
                        <option value="{{ $statuses[0]->id }}" {{ $pet->status_id == $statuses[0]->id ? 'selected' : '' }}>{{ $statuses[0]->name }}</option>
                        <option value="{{ $statuses[1]->id }}" {{ $pet->status_id == $statuses[1]->id ? 'selected' : '' }}>{{ $statuses[1]->name }}</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <h5>タイトル（50字以内）</h5>
                    <input type="text" class="form-control" name="pet[title]" value="{{ $pet->title }}"/>
                    <p style="color:red">{{ $errors->first('pet.title') }}</p>
                </div>
                
                <div class="mb-4">
                    <h5>ペットの種類</h5>
                    <select　class="form-select" name="pet[species_id]">
                        @foreach($species as $species)
                            <option value="{{ $species->id }}" {{ $pet->species_id == $species->id ? 'selected' : '' }}>{{ $species->name }}</option>
                        @endforeach
                    </select>
                </div>
                    
                <div class="mb-4">
                    <h5>品種名（50字以内）</h5>
                    <input type="text" class="form-control" name="pet[breed]" value="{{ $pet->breed }}"/>
                    <p style="color:red">{{ $errors->first('pet.breed') }}</p>
                </div>
                    
                <div class="mb-4">
                    <h5>ペットの年齢</h5>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet[age]" placeholder="半角数字のみ（例：8）" value="{{ $pet->age }}"/>
                        <span class="input-group-text">歳</span>
                    </div>
                    <p style="color:red">{{ $errors->first('pet.age') }}</p>
                </div>
                        
                <div class="mb-4">
                    <h5>ペットの性別</h5>
                    <select class="form-select" name="pet[sex_id]">
                        @foreach($sexes as $sex)
                            <option value="{{ $sex->id }}" {{ $pet->sex_id == $sex->id ? 'selected' : '' }}>{{ $sex->name }}</option>
                        @endforeach
                    </select>
                </div>
                        
                <div class="mb-4">
                    <h5>都道府県</h5>
                    <select class="form-select" name="pet[prefecture_id]">
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}" {{ $pet->prefecture_id == $prefecture->id ? 'selected' : '' }}>{{ $prefecture->name }}</option>
                        @endforeach
                    </select>
                </div>
                        
                <div class="mb-4">
                    <h5>受け渡し可能地域（50字以内）</h5>
                    <input type="text" class="form-control" name="pet[delivery_area]" value="{{ $pet->delivery_area }}"/>
                    <p style="color:red">{{ $errors->first('pet.delivery_area') }}</p>
                </div>
                        
                <div class="mb-4">
                    <h5>詳細情報（2000字以内）</h5>
                    <textarea class="form-control" rows="10" name="pet[detail]" placeholder="疾患、アレルギー、避妊・去勢の有無、性格、えさの好みなど">{{ $pet->detail }}</textarea>
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
                
                <div class="d-grid mb-2 col-6 mx-auto">
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