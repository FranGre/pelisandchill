<?php

use function Livewire\Volt\{state, mount};
use App\Models\Film;

state('film');
state('film_id')->url();

mount(function () {
    $this->film = Film::findOrFail($this->film_id);
});

?>

<div>
    <h2 class="text-black">{{ $film->title }}</h2>
    <video controls width="250" src="{{ asset('storage/' . $film->video) }}">
    </video>
</div>
