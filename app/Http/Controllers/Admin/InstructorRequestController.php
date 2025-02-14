<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InstructorRequestApprovedMail;
use App\Mail\InstructorRequestRejectedMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InstructorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructorRequest = User::where('approved_status', 'pending')
            ->orWhere('approved_status', 'rejected')->get();

        return view('admin.instructor-request.index', compact('instructorRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $instructor_request): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:approved,rejected,pending']
        ]);

        $instructor_request->approved_status  = $request->status;
        $instructor_request->status == 'approved' ? $instructor_request->role = 'instructor' : '';
        $instructor_request->save();

        self::sendNotification($instructor_request);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public static function sendNotification($instructor_request)
    {
        switch ($instructor_request->approved_status) {
            case 'approved':
                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor_request->email)->queue(new InstructorRequestApprovedMail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestApprovedMail());
                }
                break;
            case 'rejected':
                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor_request->email)->queue(new InstructorRequestRejectedMail());
                } else {
                    Mail::to($instructor_request->email)->send(new InstructorRequestRejectedMail());
                }
            default:
                break;
        }
    }
}
