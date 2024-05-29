<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'content',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id){
        // scopeCategorySearchはEloquentモデルで定義されている
        // メソッド名に「scope」をつけることで、ローカルスコープを定義できる
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
            // 引数で指定した値（$category_id）が空でなかった場合、category_idカラムで検索を行うという処理
        }
    }
    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
            $query->where('content', 'like', '%' . $keyword . '%');
            // 引数で指定した値（$keyword）が空でなかった場合、contentで検索を行うという処理
            // whereメソッド内で、likeを使用することで部分一致の検索を行う
        }
    }
}
