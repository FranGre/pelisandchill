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

        <div class="flex flex-col">
            <input type="file" wire:model='poster' />
            @error('poster')
                <span class="mt-3 text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col">
            <input type="file" wire:model='video' />
            @error('video')
                <span class="mt-3 text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Save</button>

    </form>
</div>
