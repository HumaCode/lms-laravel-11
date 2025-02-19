<?php

namespace App\Http\Controllers\Admin;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseSubCategoriStoreRequest;
use App\Http\Requests\Admin\CourseSubCategoriUpdateRequest;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CourseSubCategoryController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index(CourseCategory $course_category)
    {
        $subCategories = CourseCategory::where('parent_id', $course_category->id)->get();

        return view('admin.course.course-sub-category.index', compact('course_category', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CourseCategory $course_category)
    {
        return view('admin.course.course-sub-category.create', compact('course_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseSubCategoriStoreRequest $request, CourseCategory $course_category)
    {

        $category = new CourseCategory();

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $category->image                = $imagePath;
        }

        $category->name                 = $request->name;
        $category->icon                 = $request->icon;
        $category->slug                 = Str::slug($request->name);
        $category->parent_id            = $course_category->id;
        $category->show_at_tranding     = $request->show_at_tranding ?? 0;
        $category->status               = $request->status ?? 0;
        $category->save();

        notyf()->success('Created Successfully..');

        return to_route('admin.course-sub-categories.index', $course_category->id);
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
    public function edit(CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        return view('admin.course.course-sub-category.edit', compact('course_category', 'course_sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseSubCategoriUpdateRequest $request, CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $this->deleteFile($course_sub_category->image);
            $course_sub_category->image                = $imagePath;
        }

        $course_sub_category->name                 = $request->name;
        $course_sub_category->icon                 = $request->icon;
        $course_sub_category->slug                 = Str::slug($request->name);
        $course_sub_category->parent_id            = $course_category->id;
        $course_sub_category->show_at_tranding     = $request->show_at_tranding ?? 0;
        $course_sub_category->status               = $request->status ?? 0;
        $course_sub_category->save();

        notyf()->success('Updated Successfully..');

        return to_route('admin.course-sub-categories.index', $course_category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        try {
            $this->deleteFile($course_sub_category->image);
            $course_sub_category->delete();

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
