<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
