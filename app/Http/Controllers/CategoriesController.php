<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Animals;
use App\Models\Comments;
use App\Models\News;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function category($id){
    $news = News::orderBy('id', 'DESC')->take(2)->get();
    $categories = DB::table('categories')->get();
    $cities = DB::table('cities')->get();
    $tops = DB::table('animals')->where('top', '1')->inRandomOrder()->take(6)->get();
 
    $animals = DB::table('animals')
    ->select('animals.*' , 'cities.name')
    ->join('cities', 'cities.id', '=', 'animals.city_id')->where('category_id', $id)->paginate(8);
    return view('categoryanimals', [
        'animals' => $animals,
        'categories'=> $categories,
        'cities'=>$cities,
        'tops' => $tops
        ]);
    
    }
 

}
