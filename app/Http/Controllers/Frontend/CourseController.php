<?php

namespace App\Http\Controllers\Frontend;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CourseBasicInfoCreateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CourseController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('frontend.instructor-dashboard.course.index');
    }

    public function create()
    {
        return view('frontend.instructor-dashboard.course.create');
    }

    public function storeBasicInfo(CourseBasicInfoCreateRequest $request)
    {
        $thumbnailPath = $this->uploadFile($request->file('thumbnail'));

        $course = new Course();
        $course->title                = $request->title;
        $course->slug                 = Str::slug($request->title);
        $course->seo_description      = $request->seo_description;
        $course->thumbnail            = $thumbnailPath;
        $course->demo_video_storage   = $request->demo_video_storage;
        $course->demo_video_source    = $request->demo_video_source;
        $course->price                = $request->price;
        $course->discount             = $request->discount;
        $course->description          = $request->description;
        $course->instructor_id        = Auth::guard('web')->user()->id;
        $course->save();

        // save session id
        Session::put('course_created_id', $course->id);

        return response([
            'status'    => 'success',
            'message'   => 'Created successfully',
            'redirect'  => route('instructor.courses.edit', ['id' => $course->id, 'step' => $request->next_step]),
        ]);
    }

    public function edit(Request $request)
    {
        switch ($request->step) {
            case '1':
                # code...
                break;
            case '2':
                    return view('frontend.instructor-dashboard.course.more-info');
                break;

            default:
                # code...
                break;
        }

    }
}
