<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    //
    public function index()
    {

        $data = DB::table('contacts')->paginate(10);
        return view('moderatorhome', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
        // return view('moderatorhome');
    }
}
