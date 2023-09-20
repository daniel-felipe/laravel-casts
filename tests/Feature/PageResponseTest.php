<?php

use App\Models\Course;
use function Pest\Laravel\get;

it('should return a successful response', function () {
    get(route('home'))
        ->assertOk();
});

it('should give back successful response for course details page', function () {
    $course = Course::factory()->released()->create();

    get(route('course-details', $course))
        ->assertOk();
});

