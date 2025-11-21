@php
$typeBtn = match($btn ?? 'primary') {
    'primary' => 'primary',
    'danger' => 'danger',
    'success' => 'success'
};
@endphp

@isset($href)
<a
    {{ $attributes->class([
        'btn',
        'btn-'.$typeBtn,
        'btn-sm' => $small ?? false,
        'mb-1',
        'me-1'
    ])
    ->except(['btn']) }}
>{{ $slot }}</a>
@else
<button
    {{ $attributes->class([
        'btn',
        'btn-'.$typeBtn,
        'btn-sm' => $small ?? false,
        'mb-1',
        'me-1'
    ])->merge(['type' => 'button']) }}
    >{{ $slot }}</button>
@endisset