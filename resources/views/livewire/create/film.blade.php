<?php

use function Livewire\Volt\{state, layout, rules};
use App\Models\Film;

layout('components.layouts.app');

state(['title', 'duration', 'release_date', 'sipnosis', 'director']);

rules([
'title' => 'required|string|max:50',
'duration' => 'required|integer|between:0,300',
'release_date' => 'required|integer|between:1900,2150',
'sipnosis' => 'required|string|max:500',
'director' => 'required|string|max:50']);

$save = function () {
    $this->validate();

    Film::create([
        'title' => $this->title,
        'duration' => $this->duration,
        'release_date' => $this->release_date,
        'sipnosis' => $this->sipnosis,
        'director' => $this->director
    ]);

    $this->redirect('/');

}

?>

<div>
    <h1>New Film</h1>
    <form wire:submit='save'>
        <div class="grid grid-cols-2">

            <div class="space-y-12">
                <div>
                    <x-text-input wire:model='title' placeholder="Title..." />
                    @error('title') <x-error-message>{{ $message }}</x-error-message> @enderror
                </div>

                <div>
                    <x-text-input wire:model='duration' placeholder="Duration..." />
                    @error('duration') <x-error-message>{{ $message }}</x-error-message> @enderror

                </div>

                <div>
                    <x-text-input wire:model='release_date' placeholder="Fecha lanzamiento..." />
                    @error('release_date') <x-error-message>{{ $message }}</x-error-message> @enderror
                </div>
            </div>

            <div class="space-y-12">
                <div>
                    <x-text-input wire:model='sipnosis' placeholder="sipnosis..." />
                    @error('sipnosis') <x-error-message>{{ $message }}</x-error-message> @enderror
                </div>

                <div>
                    <x-text-input wire:model='director' placeholder="director..." />
                    @error('director') <x-error-message>{{ $message }}</x-error-message> @enderror
                </div>
            </div>
        </div>

        <button type="submit">Save</button>

    </form>
</div>