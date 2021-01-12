@props([
    'options',
    'id',
    'title',
    'description' => null,
])

<div
    class="space-y-6"
    x-data="{
        options: {{ json_encode(collect($options)->keyBy('name')) }},
        allSelected: true,
        selectAll: function() {
            let checkAllValue = true;
            if (this.allSelected) {
                checkAllValue = false;
            }

            for (const optionKey in this.options) {
                this.options[optionKey].checked = checkAllValue;
            }
        }
    }"
>
    <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:justify-between md:items-end">
        <div class="flex flex-col">
            <div class="text-lg font-bold">
                {{ $title }}
            </div>

            @if ($description)
                <div>{{ $description }}</div>
            @endif
        </div>

        <label class="tile-selection-select-all">
            <input
                type="checkbox"
                class="form-checkbox tile-selection-select-all-checkbox"
                x-on:click="selectAll"
                x-model="allSelected"
            />

            <div>@lang('ui::general.select-all')</div>
        </label>
    </div>

    <div class="grid grid-cols-2 gap-5 sm:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8">
        @foreach ($options as $option)
            @include('ark::inputs.tile-selection-option', [
                'id' => $id,
                'option' => $option,
            ])
        @endforeach
    </div>
</div>
