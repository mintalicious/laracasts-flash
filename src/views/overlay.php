<div class="alert overlay-alert alert-{{ $message['level'] }} alert-dismissible text-center" role="alert">
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

    @if (!$message['important'])
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif


    {!! $message['message'] !!}
</div>
