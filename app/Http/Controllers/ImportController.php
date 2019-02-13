<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ImportJson;

class ImportController extends Controller
{

    public function index()
    {
        return self::storeJson();
    }

    public function storeJson()
    {

        $json = file_get_contents("https://jsonplaceholder.typicode.com/users");
        $data = json_decode($json);
        foreach ($data as $obj)
        {

            $user = new User(array(
                'name' => $obj->name,
                'email' => $obj->email,
                'password' => $obj->name
            ));

            //$user->timestamps;
            try
            {
                $user->save();
                break;
            }
            catch(\Exception $e)
            {

            };
        }

        if ($user->attachRole('user'))
        {
            return redirect()
                ->route('users.index', $user->id)
                ->with('messageLabel', 'New user added successfully!');
        }
        else
        {
            Session::flash('messageLabel', 'Sorry a problem occurred while creating this user.');
            return redirect()
                ->route('users.create')
                ->with('messageLabel', 'Error occurred while adding user (are you shure that information was presented correctly?)');
        }
    }
}
