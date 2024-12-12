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
                <x-filament::button icon="heroicon-m-shield-check" class="w-full" tag="a" href="{{ $this->getMobileLoginUrl() }}">Sign in</x-filament::button>
            @endif
        </div>

        <span class="flex justify-center">
            <small>Powered by <a href="https://miqey.com" target="_blank">miQey</a></small>
        </span>

    @endif

    {{-- todo: maybe find a better way to handle this. --}}
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
    <script>
        const pusherKey = '{{ config('broadcasting.connections.pusher.key') }}';
        const subChannel = 'signRequest_{{ $this->getChannelCode() }}';
        const authEndpoint = '{{ route('miqey.auth.sms') }}';

        let pusher = new Pusher(pusherKey, {
            cluster: 'eu'
        });

        let channel = pusher.subscribe(subChannel);
        channel.bind('sign-request-received', function (data) {
            window.location.href = authEndpoint + '?token=' + data.token
        });

    </script>

</x-filament-panels::page.simple>
