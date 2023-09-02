<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Course;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('should show courses overview', function () {
    Course::factory()->createMany([
        ['title' => 'Course A', 'description' => 'Description Course A'],
        ['title' => 'Course B', 'description' => 'Description Course B'],
        ['title' => 'Course C', 'description' => 'Description Course C'],
    ]);

    get(route('home'))
        ->assertSeeText([
            'Course A',
            'Description Course A',
            'Course B',
            'Description Course B',
            'Course C',
            'Description Course C',
        ]);
});

it('should show only released courses', function () {
    //
})->todo();

it('should show courses by release date', function () {
    //
})->todo();

