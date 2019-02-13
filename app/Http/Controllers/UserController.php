<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Datbase\Seeder;
use App\User;
use App\Role;
use Auth;
use Session;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(9);
        return view('manage.users.index')->withUsers($users);
    }

    public function create()
    {
        $roles = Role::all();
        return view('manage.users.create')->withRoles($roles);
    }

    /*
    *  Method to store new user data
    */
    public function store(Request $request)
    {
        $roles = Role::all();
        $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required',
          'password' => 'required',
          'role' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user->attachRole($request->role)) {
            return redirect()->route('users.index', $user->id)->with('messageLabel', 'New user added successfully!');
        } else {
            Session::flash('messageLabel', 'Sorry a problem occurred while creating this user.');
            return redirect()->route('users.create')->with('messageLabel', 'Error occurred while adding user (are you shure that information was presented correctly?)');
        }
    }


    public function show($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        return view("manage.users.show")->withUser($user);
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->with('roles')->first();
        return view("manage.users.edit")->withUser($user)->withRoles($roles);
    }

    /*
    *  Method for user data edit
    */
    public function update(Request $request, $id)
    {
        $roles = Role::all();

        $this->validate($request, [
              'name' => 'required|max:255',
              'email' => 'required'
            ]);


        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password_options == 'auto') {
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
        } elseif ($request->password_options == 'manual') {
            $user->password = Hash::make($request->password);
        }

        $user->save();


        foreach ($roles as $role) {
            if ($user->hasRole($role->name)) {
                $user->detachRole($role->name);
                break;
            }
        }

        if ($user->attachRole($request->role)) {
            return redirect()->route('users.index', $user->id)->with('messageLabel', 'User updated successfully!');
        } else {
            Session::flash('danger', 'Sorry a problem occurred while creating this user.');
            return redirect()->route('users.edit')->with('messageLabel', 'Error occurred while adding user (are you shure that information was presented correctly?)');
        }
    }

    /*
    *  Method for user delete from datbase
    */
    public function destroy($id)
    {
        if (Auth::user()->hasRole("superadministrator")) {
            $user = User::find($id);
            $user->delete();

            return redirect()->route('users.index')->with('messageLabel', 'Data Deleted');
        } else {
            return redirect()->route('users.index')->with('errorLabel', 'You do not have a permission to delete user.');
        }
    }
}
