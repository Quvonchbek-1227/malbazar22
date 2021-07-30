<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Animals;
use App\Models\Comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class CommentsController extends Controller
{
    
    public function addcomment(Request $r){
        $text = $r->comment;
        $user_id = session()->get('user_id');
        $animal_id = $r->id;
        $comments = Comments::create(
            ['text' => $text,
            'user_id' => $user_id,
            'animal_id' => $animal_id]
        );


        if($comments){
            return back();
        }
    }
}
