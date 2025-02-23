<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseContentController extends Controller
{
    public function createChapterModel($id)
    {
        return view('frontend.instructor-dashboard.course.partials.course-chapter', compact('id'))->render();
    }

    public function storeChapterModel(Request $request, $courseId)
    {
        $request->validate([
            'title'         => ['required', 'max:255'],
        ]);

        $chapter = new CourseChapter();
        $chapter->title             = $request->title;
        $chapter->course_id         = $courseId;
        $chapter->instructor_id     = Auth::user()->id;
        $chapter->order             = CourseChapter::where('course_id', $courseId)->count() + 1;
        $chapter->save();

        return redirect()->back();
    }
}
