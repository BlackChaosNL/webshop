<?php
/**
 * Created by PhpStorm.
 * User: jjvij
 * Date: 21-3-2016
 * Time: 21:13
 */

namespace app\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function run(){
        $users = DB::table('users')->paginate(15);
        return view('pages.adm.users', ['users' => $users]);
    }

    public function alterUser($id = null){
        $user = App\User::where('id', $id)->firstOrFail();
        return view('pages.adm.alteruser', ['user' => $user]);
    }

    public function saveUser(Request $r, $id = null){
        $user = App\User::where('id', $id)->firstOrFail();
        $user->name = $r->name;
        $user->surname = $r->surname;
        $user->password = bcrypt($r->password);
        $user->address = $r->address;
        $user->housenr = $r->housenr;
        $user->place = $r->place;
        $user->country = $r->country;
        $user->save();
        return back();
    }

    public function removeUser($id = null){
        $user = App\User::where('id', $id)->firstOrFail();
        $user->remove();
        return back();
    }

}