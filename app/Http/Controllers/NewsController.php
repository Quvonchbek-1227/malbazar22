<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Cities;
       
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    public function getNews(Request $r){
        $id = $r->id;
        $categories = Categories::get();
        $cities = Cities::get();
        $news = DB::table('news')->where('id', $id)->get();
        $last_news = DB::table('news')->orderBy('id', 'DESC')->take(4)->get();
        return view('blog', ['news' => $news[0], 'categories'=>$categories, 'cities'=>$cities, 'last_news'=> $last_news]);
    }
}
