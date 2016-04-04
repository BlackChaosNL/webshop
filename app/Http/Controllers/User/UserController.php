<?php
/**
 * Created by PhpStorm.
 * User: jjvij
 * Date: 31-3-2016
 * Time: 21:09
 */

namespace app\Http\Controllers\User;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App;

class UserController extends Controller
{
    public function run(){
        return view('pages.user.dashboard');
    }

    public function showProfile(){
        return view('pages.user.profile');
    }

    public function alterProfile(){
        $user = App\User::where('id', Input::get('id'))->firstOrFail();
        $user->name = Input::get('name');
        $user->surname = Input::get('surname');
        $user->address = Input::get('address');
        $user->housenr = Input::get('housenr');
        $user->place = Input::get('place');
        $user->country = Input::get('country');
        $user->save();
        return back();
    }
}