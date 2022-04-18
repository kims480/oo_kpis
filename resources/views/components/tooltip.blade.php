<div class='tooltips z-20 absolute w-full shadow -top-full text-slate-800 '  x-show="isOpen">
    <div class="relative bg-gray-200 rounded px-1 inline-block min-w-max" style="">
        <i class=" h-2 w-2 bg-gray-200  absolute -z-10 left-2 -rotate-45 -bottom-2 transform origin-top-left"></i>
        {{ $message }}

        {{$slot}}
    </div>


</div>
