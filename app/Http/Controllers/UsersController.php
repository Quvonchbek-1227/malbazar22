<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Animals;
use App\Models\Comments;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class UsersController extends Controller

{
    public function index(){
        $categories = Categories::get();
        $cities = Cities::get();
        $news = News::orderBy('id', 'DESC')->take(2)->get();
        
        
        
        $animals = DB::table('animals')
        ->select('animals.*' , 'cities.name')
        ->join('cities', 'cities.id', '=', 'animals.city_id')
        ->orderBy('id', 'DESC')->take(8)
        ->get();

        $tops = DB::table('animals')->where('top', '1')->inRandomOrder()->take(6)->get();
    

        $views = DB::table('animals')->select('animals.*' , 'cities.name')
        ->join('cities', 'cities.id', '=', 'animals.city_id')->orderBy('view', 'DESC')->take(8)->get();

        return view('index', ['news' => $news,'categories'=>$categories, 'cities'=>$cities, 'animals' => $animals, 'tops' => $tops, 'views' => $views]);
    }

    public function ad(){
        if(session()->get('user_id')){
        $categories = Categories::get();
        $cities = Cities::get();
        return view('addanimal', ['categories'=>$categories, 'cities'=>$cities]);
        }else{
        $categories = Categories::get();
        $cities = Cities::get();
        $key = 1;
        return view('signup', ['categories'=>$categories, 'cities'=>$cities, 'key'=>$key]);
        }
    }

    public function signup(){
        $categories = DB::table('categories')->get();
        $cities = DB::table('cities')->get();
        return view('signup', [
           
            'categories'=> $categories,
            'cities'=>$cities
            ]);
    }

    public function signin(){
        $categories = DB::table('categories')->get();
        $cities = DB::table('cities')->get();
        return view('signin', [
            'categories'=> $categories,
            'cities'=>$cities
            ]);
    }

       public function create(Request $r){
        $this->validate($r,[
            'password' => 'required|min:7',
            'name' => 'required',
            'telephone' => 'required',
        ]);
        $checkphone = DB::table('users')->where('telephone', $r['telephone'])->get();
        if(count($checkphone)>0){
            $categories = DB::table('categories')->get();
            $cities = DB::table('cities')->get();
            $errorphone = "<script>alert('Bunday telefon nomer bazada bar')</script>";

            return view('signup', ['errorphone' => $errorphone, 'categories'=> $categories, 'cities'=>$cities]); 
        }else{ 
        $created = Users::create([
            'password' => $r['password'],
            'name' => $r['name'],
            'telephone' => $r['telephone']
        ]);
         $key = $r->key;
        if(!empty($created)){
             $session = DB::table('users')
            ->where('telephone', $r['telephone'])
            ->where('password', $r['password'])
            ->get();
            if(count($session)>0){
                $r->session()->put('user_id', $session[0]->id);
                $r->session()->put('user_name', $session[0]->name);
                if($key == 1){        
                return redirect('addanimal');
                }else{
                    return redirect('/');
                }
        }}
        
    }
    }

    public function checklogin(Request $r){
        $this->validate($r,[
            'telephone' => 'required',
            'password' => 'required|min:6',
        ]);
        $categories = DB::table('categories')->get();
            $cities = DB::table('cities')->get();
        $telephone = $r->telephone;
        $password = $r->password;
        $session = DB::table('users')
            ->where('telephone', $telephone)
            ->where('password', $password)
            ->get();
            if(count($session)>0){
                $r->session()->put('user_id', $session[0]->id);
                $r->session()->put('user_name', $session[0]->name);
                return redirect('/');
            }
            else{
                $error = "";
                return view('signin', ['error' => $error, 'categories'=> $categories, 'cities'=>$cities]); 
            }
    }

    public function logout(Request $r){
        $r->session()->forget('user_id');
        $r->session()->forget('user_name');

        return redirect('/signin');
    }
    
    
    

    
    

    


   
}
