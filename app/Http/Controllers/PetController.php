<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;
use App\Models\Status;
use App\Models\Species;
use App\Models\Sex;
use App\Models\Prefecture;
use App\Models\Comment;
use App\Http\Requests\PetRequest;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function top()
    {
        return view('pets/top');
    }
    
    public function index(Pet $pet, Status $status, Species $species, Sex $sex, Prefecture $prefecture)
    {
        return view('pets/index')
        ->with('pets', $pet->getPaginateByLimit())
        ->with('statuses', $status->get())
        ->with('species', $species->get())
        ->with('sexes', $sex->get())
        ->with('prefectures', $prefecture->get());
    }
    
    public function show(Pet $pet, Comment $comment)
    {
        return view('pets/show')
        ->with('pet', $pet)
        ->with('comments', $comment->getByPet($pet))
        ;
    }
    
    public function create(Species $species, Sex $sex, Prefecture $prefecture)
    {
        return view('pets/create')
        ->with('species', $species->get())
        ->with('sexes', $sex->get())
        ->with('prefectures', $prefecture->get());
    }
    
    public function store(PetRequest $request, Pet $pet)
    {
        $input = $request->input('pet');    //リクエストパラメータを取得
        $input['user_id'] = Auth::id();    //現在認証しているユーザーのIDをuser_idとして追加
        $pet->fill($input)->save();    //petsテーブルに保存
        return redirect("/pets/$pet->id");
    }
    
    public function edit(Pet $pet, Status $status, Species $species, Sex $sex, Prefecture $prefecture)
    {
        return view('pets/edit')
        ->with('pet', $pet)
        ->with('statuses', $status->get())
        ->with('species', $species->get())
        ->with('sexes', $sex->get())
        ->with('prefectures', $prefecture->get());
    }
    
    public function update(PetRequest $request, Pet $pet)
    {
        $input = $request->input('pet');
        $pet->fill($input)->save();
        return redirect("/pets/$pet->id");
    }
    
    public function delete(Pet $pet)
    {
        $pet->forceDelete();
        return redirect('/pets');
    }
    
    public function search(Request $request, Status $status, Species $species, Sex $sex, Prefecture $prefecture)
    {
        //リクエストパラメータをそれぞれ変数に代入
        $search_status = $request->input('status');
        $search_species = $request->input('species');
        $search_method = $request->input('method');
        $search_breed = mb_convert_kana($request->input('breed'), 's');    //スペースをすべて半角に変換
        $search_sex = $request->input('sex');
        $search_prefecture = $request->input('prefecture');
        $search_sort = $request->input('sort');
        
        //Petテーブルの全レコードを$queryに代入
        $query = Pet::query();
        
        //リクエストパラメータが、対応するカラムと一致しているレコードを１項目ずつ絞り込む
        if (!empty($search_status)) {
            $query->where('status_id', $search_status);
        }
        
        if (!empty($search_species)) {
            $query->where('species_id', $search_species);
        }
        
        if (!empty($search_breed)) {
            
            //文字列を半角スペースで区切り、配列として$keywordsに代入する
            $keywords = preg_split("/[\s,]+/", $search_breed, 0, PREG_SPLIT_NO_EMPTY);
            
            if ($search_method == 'and') {
                
                //すべての検索ワードがbreedと部分一致するレコードを検索
                foreach ($keywords as $keyword){
                    $query->where('breed', 'like', "%$keyword%");
                }
            }else{
                
                //いずれかの検索ワードがbreedと部分一致するレコードを検索
                $query->where(function($query) use($keywords) {
                    foreach ($keywords as $keyword){
                        $query->orwhere('breed', 'like', "%$keyword%");
                    }
                });
            }
        }
        
        if (!empty($search_sex)) {
            $query->where('sex_id', $search_sex);
        }
        
        if (!empty($search_prefecture)) {
            $query->where('prefecture_id', $search_prefecture);
        }
        
        //並べ替えの項目で選択された方法でソートする
        if ($search_sort == 'asc') {
            $query->orderBy('updated_at', 'asc');
        }else{
            $query->orderBy('updated_at', 'desc');
        }
        
        //検索結果をぺジネートし、$resultに代入
        $result = $query->paginate(10);
        
        return view('pets/search')
        ->with('result', $result)
        ->with('statuses', $status->get())
        ->with('species', $species->get())
        ->with('sexes', $sex->get())
        ->with('prefectures', $prefecture->get());
    }
}
