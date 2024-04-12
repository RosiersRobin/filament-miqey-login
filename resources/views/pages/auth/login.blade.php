<x-filament-panels::page.simple>

    @if($this->shouldUseDefaultLogin())
        <x-filament-panels::form wire:submit="authenticate">
            {{ $this->form }}

            <x-filament-panels::form.actions
                :actions="$this->getCachedFormActions()"
                :full-width="$this->hasFullWidthFormActions()"
            />
        </x-filament-panels::form>
    @else

        <div class="flex justify-center">
            @if ($this->getBrowserAgent()->isDesktop())
                {!! $this->getSecureIdLoginMethod()['qr'] !!}
            @else
                @if($this->getBrowserAgent()->isAndroidOS())
                    <x-filament::button icon="heroicon-m-shield-check" class="w-full" tag="a" href="{{ $this->getSecureIdLoginMethod()['android'] }}">Sign in</x-filament::button>
                @else
                    <x-filament::button icon="heroicon-m-shield-check" class="w-full" tag="a" href="{{ $this->getSecureIdLoginMethod()['ios'] }}">Sign in</x-filament::button>
                @endif
            @endif
        </div>

        <span class="flex justify-center">
            <small>powered by <a href="https://miqey.com" target="_blank">MiQey</a></small>
        </span>

    @endif

    {{-- todo: maybe find a better way to handle this. --}}
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
    <script>
        const pusherKey = '{{ config('broadcasting.connections.pusher.key') }}';
        const subChannel = 'signRequest_{{ $this->getSecureIdLoginMethod()['code'] }}';
        const authEndpoint = '{{-- route('auth.sms') --}}'; // todo
    </script>

</x-filament-panels::page.simple>
