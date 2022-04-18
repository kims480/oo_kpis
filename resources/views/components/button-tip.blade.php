<button  @click="open=true" class="btn btn-{{$type}} relative has-tooltips text-sm"
     @mouseover="isOpen=true" @mouseover.away="isOpen=false">
   <x-tooltip message="{{ $tooltip }}"/>
    @if ($icon)
    <i class="far fa-{{ $icon }} "></i>
    @endif
    {{$slot}} {{ $text }}
</button>
{{-- {{ $attributes->wire('model') }} --}}
