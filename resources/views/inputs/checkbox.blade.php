<div class="{{ $class ?? 'mt-4' }}">
    <div class="flex relative items-start">
        <div class="flex absolute items-center h-5">
            <input
                id="{{ $id ?? $name }}"
                name="{{ $name }}"
                type="checkbox"
                class="form-checkbox input-checkbox"
                wire:model="{{ $model ?? $name }}"
                @if($value ?? '') value="{{ $value }}" @endif
                @if($checked ?? '') checked @endif
                @if($disabled ?? '') disabled @endif
            />
        </div>
        <div class="pl-7 text-sm leading-5">
            <label for="{{ $id ?? $name }}" class="text-theme-secondary-700 {{ $labelClasses ?? '' }}">
                {{ ($label ?? '') ? $label : trans('forms.' . $name) }}
            </label>
        </div>
    </div>
</div>
