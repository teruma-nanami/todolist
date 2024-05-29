<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\Category;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }
    public function store(TodoRequest $request){
        $todo = $request->only(['category_id', 'content']);
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

    public function search(Request $request){
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }
}
