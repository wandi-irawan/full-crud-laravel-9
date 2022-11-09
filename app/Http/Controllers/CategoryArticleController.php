<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryArticle;
use App\Http\Requests\CategoryArticleRequest;

class CategoryArticleController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'category_articles' => CategoryArticle::all()
        ]);
    }

    // insert data
    public function store(CategoryArticleRequest $request)
    {
     CategoryArticle::create($request->all());
     return back()->with('success', 'Category Article'.$request->name.' has been created');
    }


    // update
    public function update(CategoryArticleRequest $request)
    {
        // $request->validate();

        CategoryArticle::find($request->id)->update($request->all());
        return back()->with('success', 'Student ' . $request->name . ' has been updated');
    }


     public function delete(Request $request, $id)
    {
        CategoryArticle::find($id)->delete($request->all());
        return back()->with('success', 'CategoryArticle ' . $request->name . ' successfuly Delete');
    }
}
