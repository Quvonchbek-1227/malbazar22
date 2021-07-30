<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Animals;
use App\Models\Comments;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SearchsController extends Controller
{
    public function search(Request $r){
        $this->validate($r,[
            'search' => 'required|min:1'
        ]);
        if($r['search']){
            
            $tops = DB::table('animals')->where('top', '1')->inRandomOrder()->take(3)->get();
            $cities = DB::table('cities')->get();
            $categories = DB::table('categories')->get();
            $query = $r->get('search');

            
            $animals = DB::table('animals')
            ->select('*')
            ->take(5)
            ->join('cities', 'cities.id', '=', 'animals.city_id')
            ->join('categories', 'categories.id', '=', 'animals.category_id')
            ->get();
            
            $cyr = array(
                'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
                'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'ы', 'Ь', 'Э', 'Ю', 'Я' );
            $lat = array(
                'a', 'b', 'v', 'g', 'd', 'e', 'yo', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', '', 'y', '', 'e', 'yu', 'ya',
                'a', 'b', 'v', 'g', 'd', 'e', 'yo', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', '', 'y', '', 'e', 'yu', 'ya');

            $textcyr = str_replace($cyr, $lat, $query);
            $textlat = str_replace($lat, $cyr, $query);
            $data = DB::table('animals')
            ->select('animals.*' , 'cities.name')
            ->join('cities', 'cities.id', '=', 'animals.city_id')
            ->where('title', 'like', '%'.$textlat.'%')
            ->orWhere('title', 'like', '%'.$textcyr.'%')
            ->paginate(8);
            DB::table('serchs')->insert([
                'search' => $query,
                'created_at' => NOW()
            ]);
            return view('searchresult', ['animals' => $animals,'cities'=>$cities, 'categories'=>$categories,'tops' => $tops, 'data' => $data]);
        }
    }

    public function searchads(Request $r){
        $category_id = $r->categories;
        $city_id = $r->cities;
        $tops = DB::table('animals')->where('top', '1')->inRandomOrder()->take(3)->get();
            $category_id = $r->categories;
            $city_id = $r->cities;
            $cities = DB::table('cities')->get();
            $categories = DB::table('categories')->get();
            
            if($city_id == 'all' && $category_id != 'all'){
            $data = DB::table('animals')
            ->select('animals.*' , 'cities.name')
            ->join('cities', 'cities.id', '=', 'animals.city_id')
            ->where(['category_id' => $category_id])
            ->paginate(8);
            }
            elseif($category_id == 'all' && $city_id != 'all'){
                $data = DB::table('animals')
                ->select('animals.*' , 'cities.name')
                ->join('cities', 'cities.id', '=', 'animals.city_id')
                ->where(['city_id' => $city_id])
                ->paginate(8);
            }elseif($category_id == 'all' && $city_id == 'all'){
                $data = DB::table('animals')
                ->select('animals.*' , 'cities.name')
                ->join('cities', 'cities.id', '=', 'animals.city_id')
                ->paginate(8);
            }else{
                $data = DB::table('animals')
                ->select('animals.*' , 'cities.name')
                ->join('cities', 'cities.id', '=', 'animals.city_id')
                ->where(['city_id' => $city_id, 'category_id' => $category_id])
                ->paginate(8);
            }
            return view('searchresult', ['cities'=>$cities,'tops' => $tops,  'categories'=>$categories, 'data' => $data]);
        
           
    }

    
}
