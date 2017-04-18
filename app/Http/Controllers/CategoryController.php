<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show(){
        $data = Category::all();
        return view('admin.categoryList',['categorys'=>$data]);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,
                ['category'=>'required'],
                ['required'=>':attribute为必填项'],
                ['category'=>'标签内容']
            );
            $data = $request->only('category');
            if(Category::create($data)){
                return redirect('categoryList')->with('success','标签添加成功！');
            }else{
                return redirect()->back();
            }
        }
        return view('admin.categoryCreate');
    }

    public function update(Request $request,$id){
        if($request->isMethod('post')){
            if(Category::where('id',$id)->update(['category'=>$request->category])){
                return redirect('categoryList')->with('success','标签修改成功！');
            }else{
                return redirect('categoryList')->with('error','标签修改失败！');
            }
        }
        $data = Category::find($id);
        return view('admin.categoryUpdate',['category'=>$data]);

    }

    public function delete($id){
        $category = Category::find($id);
        if ($category->delete())
        {
            return redirect('categoryList')->with('success','删除id为'. $id.'的标签成功！' );
        }else{
            return redirect('categoryList')->with('error','删除id为'. $id.'的标签失败！' );
        }
    }

    public function category($id){
        $articles = Article::join('articleUpDown', 'article.id', '=', 'articleUpDown.article_id')
            ->where('category_id','=',$id)
            ->select('article.id','title','html_content','published_at','up')
            ->orderBy('published_at','DESC')
            ->paginate(10);
        return view('blog.index',['articles'=>$articles]);
    }
}
