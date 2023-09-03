<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;

class PageHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $courses = Course::query()
            ->released()
            ->orderByDesc('released_at')
            ->get();

        return view('home', compact('courses'));
    }
}
