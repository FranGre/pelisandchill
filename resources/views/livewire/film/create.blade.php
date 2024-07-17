<?php

use function Livewire\Volt\{usesFileUploads, state, rules, mount};
use App\Models\Film;

usesFileUploads();

state(['user_id', 'title', 'director', 'year', 'summary', 'poster', 'video']);

rules([
    'title' => 'required|string|max:100',
    'director' => 'required|string|max:100',
    'year' => 'required|integer|digits_between:4,4',
    'summary' => 'required|string|max:255',
    'poster' => 'required|image',
    'video' => 'required|mimes:mp4,mov,mkv',
]);

mount(function () {
    $this->user_id = Auth::user()->id;
});

$save = function () {
    $this->validate();
    dd($this->all());
    return;

    $this->poster = $this->poster->store('posters', 'public');
    $this->video = $this->video->store('videos', 'public');

    Film::create($this->all());

    return $this->redirect(route('welcome'), true);
};

?>

<div>
    <h2>New Film</h2>
    <form wire:submit='save' class="flex flex-col space-y-12" enctype="multipart/form-data">

        <div class="flex flex-col">
            <x-input-text wire:model='title' placeholder="Title..." />
            @error('title')
                <span class="mt-3 text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <x-input-text wire:model='director' placeholder="Director..." />
            @error('director')
                <span class="mt-3 text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <x-input-text wire:model='year' placeholder="Year..." />
            @error('year')
                <span class="mt-3 text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <x-textarea cols="30" rows="10" wire:model='summary' placeholder='Summary...'></x-textarea>
            @error('summary')
                <span class="mt-3 text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <x-livewire-filepond wire:model="poster" accept="image/*" labelIdle='Arrastra y suelta tu portada o <span class="filepond--label-action"> Explorar </span>' />
        </div>

        <div>
            <x-livewire-filepond wire:model="video" accept="video/mp4, video/mov, video/mkv" labelIdle='Arrastra y suelta tu película o <span class="filepond--label-action"> Explorar </span>'/>
        </div>

        <button type="submit">Save</button>

    </form>
</div>
