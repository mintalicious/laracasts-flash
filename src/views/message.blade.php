<style type="text/css">
    .alert {
        margin-top: 0;
    }
    .overlay-alert {
        display: none;
        /* font-size: small; */
        font-size: 16px;
        /* position: absolute;
        top: 0;
        left: 0; */
        width: 100%;
        border: 2px solid lightgray;
        border-width: 0 0 1px 4px;
        margin: 0;
        /* margin-bottom: -4em; */
        padding: .25em;
        z-index: 1050;
    }
    
    .alert-critical {
        background-color: pink;
        color: rgb(73, 20, 73);
        border-color: rgb(73, 20, 73);
    }
    
    .overlay-alert.alert-dismissible .btn-close {
        padding: .75rem 1rem;
        font-size: small;
    }
</style>

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
