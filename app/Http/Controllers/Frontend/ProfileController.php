<?php

namespace App\Http\Controllers\Frontend;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Requests\Frontend\SocialUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('frontend.student-dashboard.profile.index');
    }

    public function indexProfilInstructor()
    {
        return view('frontend.instructor-dashboard.profile.index');
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatarPath     = $this->uploadFile($request->file('avatar'));
            $this->deleteFile($user->image);
            $user->image    = $avatarPath;
        }

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->bio          = $request->bio;
        $user->gender       = $request->gender;
        $user->headline     = $request->headline;
        $user->save();

        return redirect()->back();
    }

    public function profilePassword(PasswordUpdateRequest $request)
    {
        $user = Auth::user();
        $user->password         = bcrypt($request->password);
        $user->save();

        return redirect()->back();
    }

    public function profileSocial(SocialUpdateRequest $request)
    {
        $user = Auth::user();
        $user->facebook         = $request->facebook;
        $user->x                = $request->x;
        $user->linkedin         = $request->linkedin;
        $user->website          = $request->website;
        $user->github           = $request->github;
        $user->save();

        return redirect()->back();
    }
}
