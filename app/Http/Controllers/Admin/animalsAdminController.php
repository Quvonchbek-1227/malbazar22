<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animals;

class animalsAdminController extends Controller
{
    public function getdata(){
        $tables = DB::select('SHOW TABLES');
        $animals = Animals::get();

        //return view('admin.datatable', ['tables' => $tables, 'animals' => $animals]);
    }
}

