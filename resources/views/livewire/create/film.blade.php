<?php

use function Livewire\Volt\{state, layout};

layout('components.layouts.app');

state(['title', 'duration', 'release_data', 'sipnosis', 'director']);

$save = function () {
    dd($this->all());
}

?>

<div>
    <h1>New Film</h1>
    <form wire:submit='save'>
        <div class="grid grid-cols-2">

            <div class="space-y-12">
                <div>
                    <x-text-input wire:model='title' placeholder="Title..." />
                </div>

                <div>
                    <x-text-input wire:model='duration' placeholder="Duration..." />
                </div>

                <div>
                    <x-text-input wire:model='release_data' placeholder="Fecha lanzamiento..." />
                </div>
            </div>

            <div class="space-y-12">
                <div>
                    <x-text-input wire:model='sipnosis' placeholder="sipnosis..." />
                </div>

                <div>
                    <x-text-input wire:model='director' placeholder="director..." />
                </div>

                <div>
                    <x-text-input type="file" placeholder="dover..." />
                </div>

                <div>
                    <x-text-input type="file" placeholder="texto..." />
                </div>
            </div>
        </div>

        <button type="submit">Save</button>

    </form>
</div>