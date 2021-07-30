<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animals;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Comments;
use App\Models\News;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function admin(){
        if(session()->has('admin_id'))
        {        
            $tables = DB::select('SHOW TABLES');
            return view('admin.admin', ['tables' => $tables]);
        }
        else{
            return redirect('login');
        }
    }
    public function getdata($table_name){
        if(session()->has('admin_id'))
        {        
          $tables = DB::select('SHOW TABLES');
        if($table_name == 'animals'){
        $data = DB::table('animals')
        ->select('animals.*' , 'cities.name as city_id', 'categories.name as category_id')
        ->join('cities', 'cities.id', '=', 'animals.city_id')
        ->join('categories', 'categories.id', '=', 'animals.category_id')
        ->get();
        }else{
        $data = DB::table($table_name)->get();
        }
        $count = DB::table($table_name)->count();
        return view('admin.datatable', ['tables' => $tables, 'table_name' => $table_name, 'data'=> $data, 'count' => $count]);
            
   
        }
        else{
            return redirect('/login');
        }
       
    }
    public function createdata(Request $r){
        if(session()->has('admin_id'))
        {        
         $categories = DB::table('categories')->get();
        $cities = DB::table('cities')->get();
        $tables = DB::select('SHOW TABLES');
        $table_name = $r->table_name;
        return view('admin.createdata', ['cities' => $cities,'categories' => $categories, 'tables' => $tables, 'table_name' => $table_name]);
        }
        else{
            return redirect('login');
        }
        
    }

    public function checkdata(Request $r){
        $table_name = $r->table_name;
        if($table_name == 'cities'){
            $name = $r->name;
            $created = Cities::create([
                'name' => $name
            ]);
            if($created){
                return redirect("datatable/$table_name");
            }
        }
        elseif($table_name == 'categories'){
            $name = $r->name;
            $created = Categories::create([
                'name' => $name
            ]);
            if($created){
                return redirect("datatable/$table_name");
            }
        }
        elseif($table_name == 'categories'){
            $name = $r->name;
            $created = Categories::create([
                'name' => $name
            ]);
            if($created){
                return redirect("datatable/$table_name");
            }
        }     
        elseif($table_name == 'comments'){
            $text = $r->text;
            $user_id = $r->user_id;
            $animal_id = $r->animal_id;
            $created = Comments::create([
                'text' => $text,
                'user_id' => $user_id,
                'animal_id' => $animal_id
            ]);
            if($created){
                return redirect("datatable/$table_name");
            }
        }


        elseif($table_name == 'news'){
            $title = $r->title;
            $full_text = $r->full_text;
            $images = $r->file('images');
            $count = 0;
            $arr = [];
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
           
            }
            $image = implode(",", $arr);
            $created = News::create([
                'title' => $title,
                'full_text' => $full_text,
                'images' => $image
            ]);

            //return dd($r);
            if($created){
             //    return dd($r);
                return redirect("datatable/$table_name");
            }
        }              
        elseif($table_name == 'users'){
            $email = $r->email;
            $password = $r->password;
            $status = $r->status;
            $name = $r->name;
            $telephone = $r->telephone;
            $created = Users::create([
                'email' => $email,
                'password' => $password,
                'status' => $status,
                'name' => $name,
                'telephone' => $telephone
            ]);
            if($created){
                return redirect("datatable/$table_name");
            }
        }
    }

    public function editdata($table_name, $id){
        if(session()->has('admin_id'))
        {        
        $tables = DB::select('SHOW TABLES');
        $categories = DB::table('categories')->get();
        $cities = DB::table('cities')->get();
        if($table_name == 'animals'){
            $data = DB::table('animals')
            ->select('animals.*', 'cities.name as city_name', 'categories.name as category_name')
            ->join('cities', 'cities.id', '=', 'animals.city_id')
            ->join('categories', 'categories.id', '=', 'animals.category_id')
            ->where('animals.id', $id)
            ->get();
            }else{
            $data = DB::table($table_name)->where('id', $id)->get();
            }

        //return dd($data);
        return view('admin.editdata', ['cities' => $cities,'categories' => $categories, 'data' => $data , 'tables' => $tables, 'table_name' => $table_name]);
            }
        else{
            return redirect('/login');
        }
       
    }

    public function checkeditdata(Request $r){
        
        $table_name = $r->table_name;
        if($table_name == 'cities'){
            $id = $r->id;
            $name = $r->name;
            $edited = Cities::where('id', $id)->update([
                'name' => $name
            ]);
            if($edited){
                return redirect("datatable/$table_name");
            }
        }
        elseif($table_name == 'categories'){
            $id = $r->id;
            $name = $r->name;
            $edited = Categories::where('id', $id)->update([
                'name' => $name
            ]);
            if($edited){
                return redirect("datatable/$table_name");
            }
        }
        elseif($table_name == 'categories'){
            $id = $r->id;
            $name = $r->name;
            $edited = Categories::where('id', $id)->update([
                'name' => $name
            ]);
            if($edited){
                return redirect("datatable/$table_name");
            }
        }     
        elseif($table_name == 'comments'){
            $id = $r->id;
            $text = $r->text;
            $user_id = $r->user_id;
            $animal_id = $r->animal_id;
            $edited = Comments::where('id', $id)->update([
                'text' => $text,
                'user_id' => $user_id,
                'animal_id' => $animal_id
            ]);
            if($edited){
                return redirect("datatable/$table_name");
            }
        }

        elseif($table_name == 'news'){
            $id = $r->id;
            $title = $r->title;
            $full_text = $r->full_text;
            $images = $r->file('images');
            $arr = [];
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
            $created = News::create([
                'title' => $title,
                'full_text' => $full_text,
                'images' => $image
            ]);

            return dd($r);
            if($created){
                //return dd($r);
                return redirect("datatable/$table_name");
            }
        }              
        elseif($table_name == 'animals'){
            return dd($r);
            $arr = [];
            $id = $r->id;
            $title = $r->title;
            $full_text = $r->full_text;
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
            $created = News::create([
                'title' => $title,
                'full_text' => $full_text,
                'images' => $image
            ]);

            
            if($created){
                //return dd($r);
                return redirect("datatable/$table_name");
            }
        }              
        elseif($table_name == 'users'){
            $id = $r->id;
            $email = $r->email;
            $password = $r->password;
            $status = $r->status;
            $name = $r->name;
            $telephone = $r->telephone;
            $edited = Users::where('id', $id)->update([
                'email' => $email,
                'password' => $password,
                'status' => $status,
                'name' => $name,
                'telephone' => $telephone
            ]);
            if($edited){
                return redirect("datatable/$table_name");
            }
        }
    }

    public function deletedata($table_name, $id){
        $deleted = DB::table($table_name)->where('id', $id)->delete();
        
        if($deleted){
            return back();
        }
    }

    public function checklogin(){
        return view('admin.login');
    }
    public function test_checklogin(Request $r){
        $login = $r->login;
        $password = $r->password;
       
        $session = DB::table('users')
            ->where('telephone', $login)
            ->where('password', $password)
            ->where('status', '1')
            ->get();
        if(count($session)>0){

            $r->session()->put('admin_id', $session[0]->id);
            return redirect('admin');
        }
        else{
            return redirect('login')->with('msg', 'email or Password does not match');
        }

        }
        public function logout(Request $r){
            $r->session()->forget('admin_id');
            return redirect('login');
        }

}


