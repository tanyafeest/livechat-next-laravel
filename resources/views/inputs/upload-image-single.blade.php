@props([
    'id',
    'image'              => null,
    'dimensions'         => 'w-48 h-48',
    'uploadText'         => trans('ui::forms.upload-image.upload_image'),
    'deleteTooltip'      => trans('ui::forms.upload-image.delete_image'),
    'minWidth'           => 148,
    'minHeight'          => 148,
    'maxFilesize'        => '2MB',
    'readonly'           => false,
    'uploadErrorMessage' => null,
])

<div
    x-data="{ isUploading: false, select() { document.getElementById('image-single-upload-{{ $id }}').click(); } }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false; livewire.emit('uploadError', '{{ $uploadErrorMessage }}');"
    class="relative {{ $dimensions }}"
>
    <div class="rounded-xl w-full h-full @unless ($image) p-2 border-2 border-dashed border-theme-primary-100 @endif">
        <div
            @if ($image)
                style="background-image: url('{{ $image }}')"
            @endif
            class="inline-block w-full h-full bg-center bg-no-repeat bg-cover rounded-xl bg-theme-primary-50 @unless($readonly) cursor-pointer hover:bg-theme-primary-100 transition-default @endunless"
            @unless($readonly)
                @click="select()"
                role="button"
            @endunless
        >
            @unless($readonly)
                <input
                    id="image-single-upload-{{ $id }}"
                    type="file"
                    class="block hidden absolute top-0 opacity-0 cursor-pointer"
                    wire:model="imageSingle"
                    accept="image/jpg,image/jpeg,image/bmp,image/png"
                />
            @endunless
        </div>

        @if (!$image && !$readonly)
            <div
                wire:key="upload-button"
                class="flex absolute top-2 right-2 bottom-2 left-2 flex-col justify-center items-center space-y-2 rounded-xl cursor-pointer pointer-events-none"
                role="button"
            >
                <div class="text-theme-primary-500">
                    <x-ark-icon name="upload-cloud" size="lg" />
                </div>

                <div class="font-semibold text-theme-secondary-900">{{ $uploadText }}</div>

                <div class="text-xs font-semibold text-theme-secondary-500">
                    @lang('ui::forms.upload-image.min_size', [$minWidth, $minHeight])
                </div>
                <div class="text-xs font-semibold text-theme-secondary-500">
                    @lang('ui::forms.upload-image.max_filesize', [$maxFilesize])
                </div>
            </div>
        @endif


        @unless($readonly)
            <div
                wire:key="delete-button-{{ $id }}"
                class="rounded-xl absolute top-0 opacity-0 hover:opacity-100 transition-default w-full h-full
                    @unless ($image) hidden @endunless"

            >
                <div class="absolute top-0 w-full h-full rounded-xl opacity-70 pointer-events-none border-6 border-theme-secondary-900 transition-default"></div>

                <div
                    class="absolute top-0 right-0 p-1 -mt-2 -mr-2 rounded cursor-pointer bg-theme-danger-100 text-theme-danger-500"
                    wire:click="deleteImageSingle"
                    data-tippy-hover="{{ $deleteTooltip }}"
                >
                    <x-ark-icon name="close" size="sm" />
                </div>
            </div>

            <div x-show="isUploading" x-cloak>
                <x-ark-loading-spinner class="right-0 bottom-0 left-0 rounded-xl" :dimensions="$dimensions" />
            </div>
        @endunless
    </div>
</div>
