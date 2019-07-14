<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Imports\ImportCsv;
use Maatwebsite\Excel\Facades\Excel;

use App\User;
use App\Contacts;
use Dotenv\Regex\Success;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('contacts')->where('user', '=', Auth::user()->email)->paginate(10);
        return view('home', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
        // return view('home');
    }

    public function import()
    {
        Excel::import(new ImportCsv, request()->file('file'));
        return back();
    }

    public function add()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'pin' => 'required',
            'address' => 'required',
            'pin' => 'required'
        ]);
        $contact = new Contacts([
            'user' => Auth::user()->email,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'pin' => $request->get('pin'),
        ]);
        $contact->save();
        return redirect()->route('home')->with('success', 'Record Added.');
    }

    public function edit($id)
    {
        $contact = Contacts::find($id);
        return view('edit', compact('contact', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'pin' => 'required'
        ]);
        $contact = Contacts::find($id);
        $contact->user = Auth::user()->email;
        $contact->name = $request->get('name');
        $contact->phone = $request->get('phone');
        $contact->address = $request->get('address');
        $contact->pin = $request->get('pin');
        $contact->save();
        return redirect()->route('home')->with('success', 'Record Updated.');
    }

    public function remove($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();
        return redirect()->route('home')->with('success', 'Record Deleted.');
    }
}
