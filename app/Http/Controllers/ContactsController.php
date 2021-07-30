<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Comments;
use App\Models\Animals;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function getdata(){
        $cities = DB::table('cities')->get();
        $categories = DB::table('categories')->get();
        
        return view('contact', ['cities' => $cities, 'categories' => $categories]);
    }
    public function createcomment(Request $r){
        $email = $r->email;
        $name = $r->name;
        $comment = $r->comment;

        $created = Contacts::create([
            'email' => $email,
            'name' => $name,
            'comment' => $comment
        ]);
        if($created){
            return redirect('/');
        }
        else{
            return back();
        }

    }
}
