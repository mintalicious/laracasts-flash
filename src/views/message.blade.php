@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::overlay', ['message' => $message])
    @else
        <div class="alert alert-{{ $message['level'] }} {{ $message['important'] ? 'alert-dismissible' : '' }}" role="alert">
            @switch($message['level'])
                @case('info')
                    <i class="bi bi-info-square"></i>
                    @break
                @case('success')
                    <i class="bi bi-check-circle"></i>
                    @break
                @case('warning')
                    <i class="bi bi-exclamation-circle"></i>
                    @break
                @case('danger')
                    <i class="bi bi-x-circle"></i>
                    @break
                @case('critical')
                    <i class="bi bi-exclamation-triangle"></i>
                    @break
                @default

            @endswitch
            @if ($message['important'])
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
