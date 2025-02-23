<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    public function createChapterModel()
    {
        return view('frontend.instructor-dashboard.course.partials.course-chapter')->render();
    }
}
