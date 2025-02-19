<?php

namespace App\Http\Controllers\Admin;

use App\FileUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCategoriStoreRequest;
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
