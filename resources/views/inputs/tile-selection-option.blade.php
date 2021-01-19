@props([
    'id',
    'option',
    'compact' => 'false',
])

<label
    class="{{ $compact ? 'tile-selection-compact' : 'tile-selection' }}"
    x-bind:class="{ 'tile-selection--checked': options['{{ $option['name'] }}'].checked }"
>
    <input
        id="{{ $id.'-'.$option['name'] }}"
        name="{{ $option['name'] }}"
        type="checkbox"
        class="{{ $compact ? 'hidden' : 'form-checkbox tile-selection-checkbox' }}"
        x-model="options['{{ $option['name'] }}'].checked"
        wire:model="{{ $wireModel }}"
    />

    <div class="flex flex-col justify-center items-center space-y-2 h-full font-semibold">
        @unless ($compact)
            <x-ark-icon :name="$option['icon']" size="md" />
        @endunless

        <div>{{ $option['title'] }}</div>
    </div>
</label>
