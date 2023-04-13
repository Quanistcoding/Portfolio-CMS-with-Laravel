<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class UserProfileController extends Controller
{
    public function edit(){

        $profile = Profile::find(1);

        return view('admin.profile.edit',compact('profile'));
    }
}
