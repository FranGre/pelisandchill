<?php

use function Livewire\Volt\{state, mount};
use App\Models\Film;

state('film');
state('film_id')->url();

mount(function () {
    $this->film = Film::findOrFail($this->film_id);
});

?>

<div class="text-center">
    <x-h2 class="mb-12">{{ $film->title }}</x-h2>
    <div class="mb-6">
        <p >{{ $film->summary }}</p>
        <div class="mt-6 flex justify-around">
            <p>Director - <strong>{{ $film->director }}</strong></p>
            <p>Year - <strong>{{ $film->year }}</strong></p>
        </div>
    </div>
    <video controls class="max-w-full rounded" src="{{ asset('storage/' . $film->video) }}">
    </video>
</div>
