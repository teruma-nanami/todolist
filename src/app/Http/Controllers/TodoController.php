<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('index', compact('todos'));
    }
    public function store(TodoRequest $request){
        $todo = $request->only(['content']);
        Todo::create($todo);
        return redirect('/')->with('message', 'Todoを作成しました');
    }

    public function update(TodoRequest $request){
        // $id = $request->only(['id']);
        $content = $request->only(['content']);
        Todo::find($request->id)->update($content); // databaseを検索する場合はプロパティアクセスのみ
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request){ // deleteするときはバリデーションを実装すると削除できないので注意
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }
}
