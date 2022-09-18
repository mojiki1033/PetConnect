<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
    public function index(Pet $pet)
    {
        return view('pets/index')->with(['pets'=> $pet->getPaginateByLimit()]);
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
    
    public function search()
    {
        
    }
}
