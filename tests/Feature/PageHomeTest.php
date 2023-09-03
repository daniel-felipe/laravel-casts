<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('should show courses overview', function () {
    Course::factory()->createMany([
        ['title' => 'Course A', 'description' => 'Description Course A', 'released_at' => now()],
        ['title' => 'Course B', 'description' => 'Description Course B', 'released_at' => now()],
        ['title' => 'Course C', 'description' => 'Description Course C', 'released_at' => now()],
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
    Course::factory()->createMany([
        ['title' => 'Course A', 'released_at' => now()->yesterday()],
        ['title' => 'Course B'],
    ]);

    get(route('home'))
        ->assertSeeText([
            'Course A',
        ])
        ->assertDontSeeText([
            'Course B',
        ]);
});

it('should show courses by release date', function () {
    Course::factory()->createMany([
        ['title' => 'Course A', 'released_at' => now()->yesterday()],
        ['title' => 'Course B', 'released_at' => now()],
    ]);

    get(route('home'))
        ->assertSeeTextInOrder([
            'Course B',
            'Course A',
        ]);
});
