<div @click="livewire.emit('markNotificationsAsSeen')">
    <x-ark-dropdown wrapper-class="mx-3 sm:relative" dropdown-classes="mt-6 md:mt-8 {{ $dropdownClasses ?? '' }}">
        <x-slot name="button">
            @svg('notification', 'h-6 w-6 transition-default text-theme-secondary-400 hover:text-theme-primary-600')

            @isset($notificationsIndicator)
                {{ $notificationsIndicator }}
            @else
                @livewire('notifications-indicator')
            @endif
        </x-slot>

        {{ $notifications }}
    </x-ark-dropdown>
</div>
