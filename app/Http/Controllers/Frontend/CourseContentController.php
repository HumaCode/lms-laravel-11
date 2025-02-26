<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use App\Models\CourseChapterLession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

        notyf()->success('Create chapter successfully ...');

        return redirect()->back();
    }

    public function editChapterModel($id)
    {
        $editMode   = true;
        $chapter    = CourseChapter::where(['id' => $id, 'instructor_id' => Auth::user()->id])->firstOrFail();

        return view('frontend.instructor-dashboard.course.partials.course-chapter', compact('chapter', 'editMode'))->render();
    }

    public function updateChapterModel(Request $request, $id)
    {
        $request->validate([
            'title'         => ['required', 'max:255'],
        ]);

        $chapter = CourseChapter::findOrFail($id);
        $chapter->title             = $request->title;
        $chapter->save();

        notyf()->success('Edit chapter successfully ...');

        return redirect()->back();
    }

    public function destroyChapterModel($id)
    {
        try {
            // delete relation
            $chapter = CourseChapter::findOrFail($id);
            $chapter->delete();

            notyf()->success('Deleted Successfully ...');
            return response([
                'message' => 'Deleted Successfully ...',
            ], 200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Something went wrong! ...',
            ], 500);
        }
    }

    public function createLesson(Request $request)
    {
        $courseId   = $request->course_id;
        $chapterId  = $request->chapter_id;

        return view('frontend.instructor-dashboard.course.partials.chapter-lesson-modal', compact('courseId', 'chapterId'))->render();
    }

    public function storeLesson(Request $request)
    {
        $rules = [
            'title'             => ['required', 'string', 'max:255'],
            'storage'           => ['required', 'string'],
            'file_type'         => ['required', 'in:video,audio,file,pdf,doc'],
            'duration'          => ['required'],
            'is_preview'        => ['nullable', 'boolean'],
            'downloadable'      => ['nullable', 'boolean'],
            'description'       => ['required'],
        ];

        if ($request->filled('file')) {
            $rules['file'] = ['required'];
        } else {
            $rules['url'] = ['required'];
        }

        $request->validate($rules);

        $lesson = new CourseChapterLession();
        $lesson->title          = $request->title;
        $lesson->slug           = Str::slug($request->title);
        $lesson->storage        = $request->storage;
        $lesson->file_path      = $request->filled('file') ? $request->file : $request->url;
        $lesson->file_type      = $request->file_type;
        $lesson->duration       = $request->duration;
        $lesson->is_preview     = $request->filled('is_preview') ? 1 : 0;
        $lesson->downloadable   = $request->filled('downloadable') ? 1 : 0;
        $lesson->description    = $request->description;
        $lesson->instructor_id  = Auth::user()->id;
        $lesson->course_id      = $request->course_id;
        $lesson->chapter_id     = $request->chapter_id;
        $lesson->order          = CourseChapterLession::where('chapter_id', $request->chapter_id)->count() + 1;
        $lesson->save();

        notyf()->success('Add lesson successfully ...');

        return redirect()->back();
    }

    public function editLesson(Request $request)
    {
        $editMode   = true;
        $courseId   = $request->course_id;
        $chapterId  = $request->chapter_id;
        $lessonId   = $request->lesson_id;
        $lesson     = CourseChapterLession::where(['id' => $lessonId, 'chapter_id' => $chapterId, 'course_id' => $courseId, 'instructor_id' => Auth::user()->id])->first();

        return view('frontend.instructor-dashboard.course.partials.chapter-lesson-modal', compact('courseId', 'chapterId', 'lessonId', 'lesson', 'editMode'))->render();
    }

    public function updateLesson(Request $request, $id)
    {
        $rules = [
            'title'             => ['required', 'string', 'max:255'],
            'storage'           => ['required', 'string'],
            'file_type'         => ['required', 'in:video,audio,file,pdf,doc'],
            'duration'          => ['required'],
            'is_preview'        => ['nullable', 'boolean'],
            'downloadable'      => ['nullable', 'boolean'],
            'description'       => ['required'],
        ];

        if ($request->filled('file')) {
            $rules['file'] = ['required'];
        } else {
            $rules['url'] = ['required'];
        }

        $request->validate($rules);

        $lesson                 = CourseChapterLession::findOrFail($id);
        $lesson->title          = $request->title;
        $lesson->slug           = Str::slug($request->title);
        $lesson->storage        = $request->storage;
        $lesson->file_path      = $request->filled('file') ? $request->file : $request->url;
        $lesson->file_type      = $request->file_type;
        $lesson->duration       = $request->duration;
        $lesson->is_preview     = $request->filled('is_preview') ? 1 : 0;
        $lesson->downloadable   = $request->filled('downloadable') ? 1 : 0;
        $lesson->description    = $request->description;
        $lesson->instructor_id  = Auth::user()->id;
        $lesson->course_id      = $request->course_id;
        $lesson->chapter_id     = $request->chapter_id;
        $lesson->save();

        notyf()->success('Update lesson successfully ...');

        return redirect()->back();
    }

    public function destroyLesson($id)
    {
        try {
            $lesson = CourseChapterLession::findOrFail($id);
            $lesson->delete();

            notyf()->success('Deleted Successfully ...');
            return response([
                'message' => 'Deleted Successfully ...',
            ], 200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Something went wrong! ...',
            ], 500);
        }
    }

    // sort lesson
    public function sortLesson(Request $request, $id)
    {
        // dd($request->all());
        $newOrders = $request->order_ids;
        foreach ($newOrders as $key => $itemId) {
            $lesson = CourseChapterLession::where(['chapter_id' => $id, 'id' => $itemId])->first();
            $lesson->order = $key + 1;
            $lesson->save();
        }

        return response(['status' => 'success', 'message' => 'Updated successfully ...']);
    }

    public function sortChapter($id)
    {
        $chapters  = CourseChapter::where('course_id', $id)->orderBy('order')->get();

        return view('frontend.instructor-dashboard.course.partials.course-chapter-sort-modal', compact('chapters'))->render();
    }

    public function updateSortChapter(Request $request, $id)
    {
        $newOrders = $request->order_ids;
        foreach ($newOrders as $key => $itemId) {
            $chapter = CourseChapter::where(['course_id' => $id, 'id' => $itemId])->first();
            $chapter->order = $key + 1;
            $chapter->save();
        }

        return response(['status' => 'success', 'message' => 'Updated successfully ...']);
    }
}
