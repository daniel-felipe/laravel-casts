<?php

use function Pest\Laravel\get;

it('should return a successful response', function () {
    get(route('home'))
        ->assertOk();
});
