<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourites;
use App\Models\Categories;
use App\Models\Cities;
use Illuminate\Support\Facades\DB;

class FavouritesController extends Controller
{
    public function addfavourite(Request $r){
        $animal_id = $r->animal_id;
        $user_id = session()->get('user_id');
        
        $check = DB::table('favourites')->where(['animal_id' => $animal_id, 'user_id' => $user_id])->get();
        if(count($check)>0){
            $error = "siz bul maldi saylangalnlar ga aldin qostiniz";
            return view(['error' => $error]);
        }else{
        $created = DB::table('favourites')->insert([
            'user_id' => $user_id,
            'animal_id' => $animal_id,
        ]);
        return back();    
    }

        
    }

    public function myfavourites(){
        $categories = Categories::get();
        $cities = Cities::get();
        $tops = DB::table('animals')->where('top', '1')->inRandomOrder()->take(3)->get();
       
        // $data = DB::table('animals')
        //     ->select('animals.*' , 'cities.name')
        //     ->join('cities', 'cities.id', '=', 'animals.city_id')
        //     ->where(['category_id' => $category_id])
        //     ->get();
        $user_id = session()->get('user_id');
        $animals = DB::table('favourites')
        ->join('animals', 'animals.id', '=', 'favourites.animal_id')
        ->where(['favourites.user_id' => $user_id])->get(
            ['animals.id as animal_id',
            'animals.*',
            'favourites.id as fav_id',
            'favourites.animal_id as animalid']
        );
        return view('myfavourites', ['animals' => $animals, 'categories'=>$categories, 'cities'=>$cities,  'tops' => $tops]);
        
    }
    public function deletefavourite($fav_id){
        $check = DB::table('favourites')->where('id', '=', $fav_id)->delete();
        if($check){
            return back();
        }
    }

}
