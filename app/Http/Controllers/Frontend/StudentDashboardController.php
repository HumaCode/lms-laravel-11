<?php

namespace App\Http\Controllers\Frontend;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    use FileUpload;

    public function index(): View
    {
        return view('frontend.student-dashboard.index');
    }

    public function becomeInstructor()
    {
        if (auth()->user()->role === 'instructor') abort(403);

        return view('frontend.student-dashboard.become-instructor.index');
    }


    public function becomeInstructorUpdate(Request $request, User $user)
    {
        $request->validate(['document' => ['required', 'mimes:pdf,doc,docx,jpg,png,jpeg', 'max:12000']]);
        $filepath = $this->uploadFile($request->file('document'));

        $user->update([
            'approved_status'   => 'pending',
            'document'          => $filepath,
        ]);

        return redirect()->route('student.dashboard');
    }
}
