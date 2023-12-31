@props([
    'desktopClass'  => 'px-8 max-w-7xl hidden lg:flex',
    'mobileClass'   => 'px-8 pb-8 lg:hidden',
    'copyClass'     => '',
    'copyText'      => null,
    'isArkProduct'  => true,
    'socials'       => null,
    'copyrightSlot' => null,
])

<div {{ $attributes->merge(['class' => 'border-t bg-theme-secondary-900 border-theme-secondary-800']) }}>
    <div class="{{ $desktopClass }} flex-col mx-auto">
        <x-ark-footer-bar-desktop
            :is-ark-product="$isArkProduct"
            :copy-class="$copyClass"
            :copy-text="$copyText"
            :socials="$socials"
            :copyright-slot="$copyrightSlot"
            no-border
        />
    </div>

    <x-ark-footer-bar-mobile
        :class="$mobileClass"
        :is-ark-product="$isArkProduct"
        :copy-class="$copyClass"
        :copy-text="$copyText"
        :socials="$socials"
        :copyright-slot="$copyrightSlot"
    />
</div>
