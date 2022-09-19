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
        ->with(['pets'=> $pet->getPaginateByLimit()])
        ->with(['statuses' => $status->get()])
        ->with(['species' => $species->get()])
        ->with(['sexes' => $sex->get()])
        ->with(['prefectures' => $prefecture->get()]);
    }
    
    public function show(Pet $pet, Comment $comment)
    {
        return view('pets/show')
        ->with(['pet' => $pet])
        ->with(['comments' => $comment->getByPet($pet)])
        ;
    }
    
    public function create(Species $species, Sex $sex, Prefecture $prefecture)
    {
        return view('pets/create')
        ->with(['species' => $species->get()])
        ->with(['sexes' => $sex->get()])
        ->with(['prefectures' => $prefecture->get()]);
    }
    
    public function store(PetRequest $request, Pet $pet)
    {
        $input = $request['pet'];    //リクエストパラメータを取得
        $input['user_id'] = Auth::id();    //現在認証しているユーザーのIDをuser_idとして追加
        $pet->fill($input)->save();    //petsテーブルに保存
        return redirect('/pets/' . $pet->id);
    }
    
    public function edit(Pet $pet, Status $status, Species $species, Sex $sex, Prefecture $prefecture)
    {
        return view('pets/edit')
        ->with(['pet' => $pet])
        ->with(['statuses' => $status->get()])
        ->with(['species' => $species->get()])
        ->with(['sexes' => $sex->get()])
        ->with(['prefectures' => $prefecture->get()]);
    }
    
    public function update(PetRequest $request, Pet $pet)
    {
        $input = $request['pet'];
        $pet->fill($input)->save();
        return redirect('/pets/' . $pet->id);
    }
    
    public function delete(Pet $pet)
    {
        $pet->forceDelete();
        return redirect('/pets');
    }
    
    public function search(Request $request, Pet $pet)
    {
        $result = Pet::get();
        
        if ($request['status'] != 0) {
            $result = $result->where('status_id', $request['status'])->get();
        }
        
        if ($request['species'] != 0) {
            $result = $result->where('species_id', $request['species'])->get();
        }
        
        if ($request['sex'] != 0) {
            $result = $result->where('sex_id', $request['sex'])->get();
        }
        
        if ($request['prefecture'] != 0) {
            $result = $result->where('prefecture_id', $request['prefecture'])->get();
        }
        
        if ($request['sort'] == 'asc') {
            $result = $result->sortBy('updated_at');
        }else{
            $result = $result->sortByDesc('updated_at');
        }
        
        return view('pets/search')->with(['result' => $result]);
    }
}
