<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.student-dashboard.profile.index');
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->bio          = $request->bio;
        $user->gender       = $request->gender;
        $user->headline     = $request->headline;
        $user->save();

        return redirect()->back();
    }
}
