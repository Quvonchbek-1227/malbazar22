<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Comments;
use App\Models\Animals;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function getdata(){
        $animals = Animals::get();
        return view('admin.datatable', ['animals' => $animals]);
    }

    public function addanimal(Request $r){
        $this->validate($r,[
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
            'price' => 'required',
            'telephone' => 'required',
            'city' => 'required',
        ]);
     
        $images = $r->file('images');
        $count = 0;
        if($r->file('images')){
            foreach($images as $item){
                if($count < 4){                    
                    $imageName = time().'-'.str_replace(' ', '-', $item->getClientOriginalName());
                    $item->move(public_path().'/uploads/', $imageName);
                    $url = URL::to("/").'/uploads/'.$imageName;
                    $arr[] = $url;
                    $count++;
                }
            }
            $image = implode(",", $arr);
            }
            $user_id = session()->get('user_id');
            $view = '0';
            $top = '0';
            $created = Animals::create([
                'title' => $r['title'],
                'description' => $r['description'],
                'images' => $image,
                'price' => $r['price'],
                'view' => $view,
                'telephone' => $r['telephone'],
                'user_id' => $user_id,
                'category_id' => $r['category'],
                'city_id' => $r['city'],
                'telephone' => $r['telephone'],
                'top' => $top
            ]);
            //1803830259:AAH6v7hZ0XPX1w8Jp05OAW9F3ZQn4SLpt5Q
            if($created){
                $send_id = $created->id;
                $data = DB::table('animals')
                ->select('animals.*' , 'cities.name as city_name', 'categories.name as category_name')
                ->join('cities', 'cities.id', '=', 'animals.city_id')
                ->join('categories', 'categories.id', '=', 'animals.category_id')
                ->where('animals.id', $send_id)
                ->get();
                $city_name = $data[0]->city_name;
                $category_name = $data[0]->category_name;
                $id = $data[0]->id;
                $images = $data[0]->images;
                $send = Http::get("https://malbazar.uz/bots/bot.php?send=true&title=".$r['title']."&price=".$r['price']."&category_name=".$category_name."&city_name=".$city_name."&id=".$id."&images=".$images);
                if($send){
                return redirect('/');
                }
            }
            else{
                return back();
            }
    }
    public function animaldetail($id){
    
        $res = Animals::find($id);
        if(!empty($res)){
        $res = Animals::find($id)->increment('view');
        $cities = DB::table('cities')->get();
        $categories = DB::table('categories')->get();
        $animals = DB::table('animals')
        ->select('animals.*' , 'cities.name', 'cities.id as city_id')
        ->join('cities', 'cities.id', '=', 'animals.city_id')
        ->where('animals.id', $id)
        ->get();
        
        $cat_id = $animals[0]->category_id;
        $animal_id = $animals[0]->id;
        
        $likes = DB::table('animals')->select('animals.*' , 'cities.name', 'cities.id as city_id')
        ->join('cities', 'cities.id', '=', 'animals.city_id')
        ->where('animals.category_id', '=', $cat_id)
        ->Where('animals.id', '!=', $animal_id)
        ->inRandomOrder()->take(8)->get();
        


        $comments = DB::table('comments')
        ->select('*')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->where('animal_id', $id)->get();   
        
        return view('animaldetail', ['animal' => $animals[0], 'comments' => $comments, 'likes' => $likes, 'categories'=>$categories, 'cities'=>$cities]);
        }else{
            $cities = DB::table('cities')->get();
            $categories = DB::table('categories')->get();
            return view('404', [ 'categories'=>$categories, 'cities'=>$cities]);
        }
    }

    public function myads(){
        $tops = DB::table('animals')->where('top', '1')->inRandomOrder()->take(3)->get();
        $user_id = session()->get('user_id');
        $categories = DB::table('categories')->get();
        $animals = DB::table('animals')
        ->select('animals.*' , 'cities.name')
        ->join('cities', 'cities.id', '=', 'animals.city_id')
        ->where('user_id', $user_id)
        ->get();
        return view('myads', ['animals' => $animals, 'tops' => $tops, 'categories'=>$categories]);

    }
    public function deleteads($id){
        $check = DB::table('animals')->where('id', $id)->delete();
        if($check){
            return back();
        }
        else{
            return "sad";
        }
    }
}
