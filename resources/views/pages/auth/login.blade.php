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
                {!! $this->getLoginQr() !!}
            @else
                @if($this->getBrowserAgent()->isAndroidOS())
                    <x-filament::button icon="heroicon-m-shield-check" class="w-full" tag="a" href="{{ $this->getAndroidLoginUrl() }}">Sign in</x-filament::button>
                @else
                    <x-filament::button icon="heroicon-m-shield-check" class="w-full" tag="a" href="{{ $this->getIosLoginUrl() }}">Sign in</x-filament::button>
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
        const subChannel = 'signRequest_{{ $this->getChannelCode() }}';
        const authEndpoint = '{{ route('miqey.auth.sms') }}';

        // todo: move this to the js files
        var pusher = new Pusher(pusherKey, {
            cluster: 'eu'
        });

        Pusher.logToConsole = true;

        var channel = pusher.subscribe(subChannel);
        channel.bind('sign-request-received', function (data) {
            window.location.href = authEndpoint + '?token=' + data.token
        });

    </script>

</x-filament-panels::page.simple>
