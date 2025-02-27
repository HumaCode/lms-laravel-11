<?php

namespace App\Http\Controllers\Admin;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CourseBasicInfoCreateRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseChapter;
use App\Models\CourseLanguage;
use App\Models\CourseLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CourseController extends Controller
{
    use FileUpload;

    public function index()
    {
        $courses = Course::with('instructor')->paginate(10);

        return view('admin.course.course-module.index', compact('courses'));
    }

    public function updateApproval(Request $request, Course $courses)
    {
        $courses->is_approved = $request->status;
        $courses->save();

        return response(['status' => 'success', 'message' => 'Update successfully ...']);
    }

    public function create()
    {
        return view('admin.course.course-module.create');
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
                $course = Course::findOrFail($request->id);

                return view('frontend.instructor-dashboard.course.edit', compact('course'));

                break;
            case '2':
                $categories     = CourseCategory::where('status', 1)->get();
                $levels         = CourseLevel::get();
                $languages      = CourseLanguage::get();
                $course         = Course::findOrFail($request->id);

                return view('frontend.instructor-dashboard.course.more-info', compact('categories', 'levels', 'languages', 'course'));
                break;

            case '3':
                $courseId = $request->id;
                $chapters = CourseChapter::where(['course_id' => $courseId, 'instructor_id' => Auth::user()->id])->orderBy('order')->get();

                return view('frontend.instructor-dashboard.course.course-content', compact('courseId', 'chapters'));
                break;

            case '4':
                $courseId = $request->id;
                $course   = Course::findOrFail($courseId);
                $editMode = true;

                return view('frontend.instructor-dashboard.course.finish', compact('course', 'editMode'));
                break;
        }
    }

    public function update(Request $request)
    {
        switch ($request->current_step) {
            case '1':
                $rules = [
                    'title'                 => ['required', 'max:255', 'string'],
                    'seo_description'       => ['nullable', 'max:255', 'string'],
                    'demo_video_storage'    => ['nullable', 'in:youtube,vimeo,external_link,upload', 'string'],
                    'price'                 => ['required', 'numeric'],
                    'discount'              => ['nullable', 'numeric'],
                    'description'           => ['required'],
                    'thumbnail'             => ['nullable', 'image', 'max:3000'],
                    'demo_video_source'     => ['nullable'],
                ];

                $request->validate($rules);

                $course = Course::findOrFail($request->id);

                if ($request->hasFile('thumbnail')) {
                    $thumbnailPath = $this->uploadFile($request->file('thumbnail'));
                    $this->deleteFile($course->thumbnail);
                    $course->thumbnail            = $thumbnailPath;
                }

                $course->title                = $request->title;
                $course->slug                 = Str::slug($request->title);
                $course->seo_description      = $request->seo_description;
                $course->demo_video_storage   = $request->demo_video_storage;
                $course->demo_video_source    = $request->filled('file') ? $request->file : $request->url;
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
                break;
            case '2':
                $request->validate([
                    'capacity'              => ['nullable', 'numeric'],
                    'duration'              => ['required', 'numeric'],
                    'qna'                   => ['nullable', 'boolean'],
                    'certificate'           => ['nullable', 'boolean'],
                    'category'              => ['required', 'integer'],
                    'level'                 => ['required', 'integer'],
                    'language'              => ['required', 'integer'],
                ]);

                $course = Course::findOrFail($request->id);
                $course->capacity               = $request->capacity;
                $course->duration               = $request->duration;
                $course->qna                    = $request->qna ? 1 : 0;
                $course->certificate            = $request->certificate ? 1 : 0;
                $course->category_id            = $request->category;
                $course->course_level_id        = $request->level;
                $course->course_language_id     = $request->language;
                $course->save();

                return response([
                    'status'    => 'success',
                    'message'   => 'Updated successfully',
                    'redirect'  => route('instructor.courses.edit', ['id' => $course->id, 'step' => $request->next_step]),
                ]);
                break;

            case '3':

                return response([
                    'status'    => 'success',
                    'message'   => 'Updated successfully',
                    'redirect'  => route('instructor.courses.edit', ['id' => $request->id, 'step' => $request->next_step]),
                ]);
                break;

            case '4':

                $request->validate([
                    'message'               => ['nullable', 'max:1000', 'string'],
                    'status'                => ['required', 'in:active,inactive,draft'],
                ]);

                $course = Course::findOrFail($request->id);
                $course->message_for_reviewer        = $request->message;
                $course->status                      = $request->status;
                $course->save();

                return response([
                    'status'    => 'success',
                    'message'   => 'Updated successfully',
                    'redirect'  => route('instructor.courses.index'),
                ]);
                break;
        }
    }
}
