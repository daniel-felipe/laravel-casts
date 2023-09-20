<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageCourseDetailsController extends Controller
{
    public function __invoke(Course $course): View
    {
        if (! $course->released_at) {
            throw new NotFoundHttpException();
        }

        return view('course-details', compact('course'));
    }
}
