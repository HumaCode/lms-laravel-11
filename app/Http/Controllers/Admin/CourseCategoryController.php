<?php

namespace App\Http\Controllers\Admin;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCategoriStoreRequest;
use App\Http\Requests\Admin\CourseCategoriUpdateRequest;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategory::paginate(10);

        return view('admin.course.course-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.course-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCategoriStoreRequest $request)
    {
        $imagePath = $this->uploadFile($request->file('image'));

        $category = new CourseCategory();
        $category->image                = $imagePath;
        $category->name                 = $request->name;
        $category->icon                 = $request->icon;
        $category->slug                 = Str::slug($request->name);
        $category->show_at_tranding     = $request->show_at_tranding ?? 0;
        $category->status               = $request->status ?? 0;
        $category->save();

        notyf()->success('Created Successfully..');

        return to_route('admin.course-categories.index');
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
    public function edit(CourseCategory $course_category)
    {
        return view('admin.course.course-category.edit', compact('course_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCategoriUpdateRequest $request, CourseCategory $course_category)
    {
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $this->deleteFile($course_category->image);

            $course_category->image                = $imagePath;
        }

        $course_category->name                 = $request->name;
        $course_category->icon                 = $request->icon;
        $course_category->slug                 = Str::slug($request->name);
        $course_category->show_at_tranding     = $request->show_at_tranding ?? 0;
        $course_category->status               = $request->status ?? 0;
        $course_category->save();

        notyf()->success('Updated Successfully..');

        return to_route('admin.course-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category)
    {
        try {
            $this->deleteFile($course_category->image);

            $course_category->delete();

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
}
