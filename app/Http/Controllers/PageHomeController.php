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
            ->whereNotNull('released_at')
            ->orderBy('released_at', 'desc')
            ->get();

        return view('home', compact('courses'));
    }
}
