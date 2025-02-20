<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('frontend.instructor-dashboard.course.index');
    }

    public function create()
    {
        return view('frontend.instructor-dashboard.course.create');
    }

    public function storeBasicInfo()
    {
        return view('frontend.instructor-dashboard.course.create');
    }
}
