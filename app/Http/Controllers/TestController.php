<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class TestController extends Controller
{
    public function roles()
    {
    	// Role::truncate();
    	$member = new Role();
		$member->name         = 'member';
		$member->display_name = 'User Member'; // optional
		$member->description  = 'User is the member of a given project'; // optional
		$member->save();

		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'User Administrator'; // optional
		$admin->description  = 'User is allowed to manage and edit other users'; // optional
		$admin->save();
    }

    public function attachRole()
    {
    	$admin = Role::find(2);
    	$member = Role::find(1);
    	$user = User::where('email', 'sopiehalimah@gmail.com')->first();
		$user->attachrole($admin);
    	$user2 = User::where('email', 'sh@gmail.com')->first();
		$user2->attachrole($member);
    }
}
