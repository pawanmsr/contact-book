<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\User;
use App\Contacts;
use Dotenv\Regex\Success;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('adminhome');
    }

    public function users()
    {
        $data = DB::table('users')->paginate(10);
        return view('adminusers', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function contacts()
    {
        $data = DB::table('contacts')->paginate(10);
        return view('admincontacts', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
        // return view('home');
    }

    public function addcontact()
    {
        return view('admincontactsadd');
    }

    public function storecontact(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'pin' => 'required'
        ]);
        $contact = new Contacts([
            'user' => $request->get('user'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'pin' => $request->get('pin'),
        ]);
        $contact->save();
        return redirect()->route('admincontacts')->with('success', 'Record Added.');
    }

    public function editcontact($id)
    {
        $contact = Contacts::find($id);
        return view('admincontactsedit', compact('contact', 'id'));
    }

    public function updatecontact(Request $request, $id)
    {
        $this->validate($request, [
            'user' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'pin' => 'required'
        ]);
        $contact = Contacts::find($id);
        $contact->user = $request->get('user');
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->address = $request->get('address');
        $contact->pin = $request->get('pin');
        $contact->save();
        return redirect()->route('admincontacts')->with('success', 'Record Updated.');
    }

    public function removecontact($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();
        return redirect()->route('admincontacts')->with('success', 'Record Deleted.');
    }

    public function adduser()
    {
        return view('adminusersadd');
    }

    public function storeuser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ]);
        $user->save();
        return redirect()->route('adminusers')->with('success', 'User Added.');
    }

    public function edituser($id)
    {
        $user = User::find($id);
        return view('adminusersedit', compact('user', 'id'));
    }

    public function updateuser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->save();
        return redirect()->route('adminusers')->with('success', 'User Updated.');
    }

    public function removeuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('adminusers')->with('success', 'User Deleted.');
    }
}
