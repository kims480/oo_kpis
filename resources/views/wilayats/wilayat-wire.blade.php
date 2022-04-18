<div>
    <div class="card-body" x-data={filtersOn:false}>
        <div class="options flex justify-end">
            <div class="flex justify-center">
                <div class="form-check form-switch">
                    <input
                        class="form-check-input appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-white bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm"
                        type="checkbox" role="switch" id="flexSwitchCheckChecked" @click="filtersOn=!filtersOn">
                    <label class="form-check-label inline-block text-gray-800"
                        for="flexSwitchCheckChecked">Filter</label>
                </div>
            </div>

            {{-- <button class="btn-danger btn btn-text" --}}
                                {{-- wire:click.prevent="toast('Welcome')" data-mdb-ripple="true"  onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"> --}}
                                {{-- <i class="far fa-trash-alt"></i> --}}

                            {{-- </button> --}}
            <button wire:click.prevent="create" x-data={isOpen:false}
                class="transition ease-in-out btn btn-primary relative has-tooltips text-sm" @mouseover="isOpen=true"
                @mouseover.away="isOpen=false">
                <svg class="fill-gray-100 h-4 w-4" viewBox="0 0 300.003 300.003">
                    <g>
                        <path d="M150,0C67.159,0,0.001,67.159,0.001,150c0,82.838,67.157,150.003,149.997,150.003S300.002,232.838,300.002,150
                    C300.002,67.159,232.839,0,150,0z M213.281,166.501h-48.27v50.469c-0.003,8.463-6.863,15.323-15.328,15.323
                    c-8.468,0-15.328-6.86-15.328-15.328v-50.464H87.37c-8.466-0.003-15.323-6.863-15.328-15.328c0-8.463,6.863-15.326,15.328-15.328
                    l46.984,0.003V91.057c0-8.466,6.863-15.328,15.326-15.328c8.468,0,15.331,6.863,15.328,15.328l0.003,44.787l48.265,0.005
                    c8.466-0.005,15.331,6.86,15.328,15.328C228.607,159.643,221.742,166.501,213.281,166.501z" />
                    </g>
                </svg>
                <x-tooltip>Add wilayat</x-tooltip>
            </button>

            <button wire:click.prevent="export" x-data={isOpen:false}
                class="transition ease-in-out btn btn-default relative has-tooltips text-sm "data-mdb-ripple="true" @mouseover="isOpen=true"
                @mouseover.away="isOpen=false">
                <x-tooltip message='Export excel' />
                <i class="far fa-file-excel "></i> Export
            </button>
        </div>

        <table class="table">
            <thead class="bg-gray-800 text-white ">

                <tr>
                    <th class="">@lang('models/wilayats.fields.name')</th>
                    <th class="">@lang('models/wilayats.fields.region_id')
                    </th>
                    <th class="actions-header">@lang('crud.action')</th>
                </tr>
            </thead>
            <tbody class="">
                <tr x-show="filtersOn">
                    <td class="">
                        {!! Form::text('name', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => 'Whilayat name', 'wire:model.debounce' => 'searchWilayat']) !!}
                        {{-- <input class="text-sm" placeholder="Whilayat name" wire:model="search" name="name" type="text"> --}}

                    </td>
                    <td class="">{!! Form::text('gorvern_id', null, ['class' => 'text-sm border-0 rounded-none border-b-2 p-1 ', 'placeholder' => 'Gorern Name', 'wire:model.debounce' => 'searchGovern']) !!}
                    </td>
                    <td class=" bg-transparent">

                    </td>
                </tr>
                {{-- @foreach ($governats as $governat) --}}
                {{-- {{$wilayat}} --}}
                @foreach ($wilayatsList as $wilayat)
                    <tr class="">
                        <td class="align-middle text-center">{{ $wilayat->wilayat_name }}</td>
                        <td class="align-middle text-center">{{ $wilayat->govern_name ?? '-' }}</td>
                        <td class="actions ">

                            <a href="{{ route('wilayats.show', [$wilayat->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                                {{-- <x-tooltip message="View"></x-tooltip> --}}
                            </a>
                            {{-- <a href="{{ route('wilayats.edit', [$wilayat->id]) }}" class='btn btn-success btn-xs'>
                                <i class="far fa-edit"></i>
                            </a> --}}
                            {{-- <x-button-tip wire:click.prevent="edit({{$wilayat->id}})"  type="success btn-xs" icon='edit' tooltip='Edit'></x-button-tip> --}}
                            <button class="btn btn-success btn-xs" wire:click.prevent="edit({{ $wilayat->id }})">
                                <i class="far fa-edit"></i>
                            </button>
                            <button class="btn-danger btn btn-text"
                                wire:click.prevent="deleteConfirm({{ $wilayat->id }})" {{-- onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" --}}>
                                <i class="far fa-trash-alt"></i>

                            </button>

                            {{-- {!! Form::open(['route' => ['wilayats.destroy', $wilayat->id], 'method' => 'delete']) !!} --}}
                            {{-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn-danger btn btn-text', 'wire:click.prevent'=>"deleteConfirm({{ $wilayat->id }})",
                                'onclick'=>"confirm('Are you sure?') || event.stopImmediatePropagation()"]) !!} --}}

                            {{-- {!! Form::close() !!} --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $wilayatsList->links() }}
    </div>
    <div
        class="@if (!$showModal) hidden @endif flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
        <div class="bg-white rounded-lg w-1/2">
            <form wire:submit.prevent="save">
                <div class="card">
                    <div class="content-header">
                        <div class="text-gray-50 font-medium text-lg">
                            {{ $wilayatId ? 'Edit Product' : 'Add New Product' }}</div>
                        <svg wire:click="close"
                            class="ml-auto fill-current text-orange-100 hover:text-white w-6 h-6 cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
                    <div class="card-body">


                        <div class="form-group sm:w-full md:w-1/2 px-2 ">
                            {!! Form::label('name', __('Wilalyat Name') . ':') !!}
                            {!! Form::text('', $wilayah->name ?? null, ['wire:model' => 'name', 'class' => 'shadow appearance-none border rounded text-sm w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'placeholder' => 'Wilayat Name']) !!}
                            @error('name')
                                <x-alert.alert-danger> <span class="text-xs italic">{{ $message }}</span>
                                </x-alert.alert-danger>
                            @enderror

                        </div>
                        <div class="form-group sm:w-full md:w-1/2 px-2 ">
                            {!! Form::label('govern', __('Governate') . ':') !!}
                            {{-- @if (!is_null($wilayah)) --}}
                            {!! Form::select('', $governs ?? null, $wilayah ?? ($govern_id = 3), ['wire:model' => 'govern_id', 'class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' /* , 'placeholder' => 'Govern Name' */]) !!}
                            {{-- @else --}}
                            {{-- {!! $governs ? Form::select('', $governs??null, '3', ['wire:model'=>'govern_id','class' => 'shadow  border text-sm rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'placeholder' => 'Govern Name']) : null !!} --}}
                            {{-- @endif --}}
                            @error('govern_id')
                                <x-alert type="error">{{ $message }}</x-alert>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                            class=" transition ease-in-out  {{ $wilayatId? 'bg-emerald-600 hover:bg-emerald-50 hover:text-emerald-700 border-emerald-400': 'bg-blue-500 hover:bg-gray-50 hover:text-blue-700 hover:border-blue-400' }}  text-white  shadow shadow-blue-500/50    text-sm mr-2 font-bold py-2 px-4 rounded border  duration-150"
                            type="submit">{{ $wilayatId ? 'Save Changes' : 'Save' }}
                        </button>
                        <button class="bg-gray-500 hover:bg-black text-white font-bold py-2 px-4 text-sm rounded"
                            wire:click="close" type="button" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="shadow-lg rounded-lg overflow-hidden">
        <div class="py-3 px-5 bg-gray-50">Line chart</div>
        <canvas class="p-10" id="chartLine"></canvas>
    </div>
    <div class="shadow-lg w-3/5 h-4/6 rounded-lg overflow-hidden">
        <div class="py-3 px-5 bg-gray-50">Line chart</div>
        <canvas class="p-10" id="chartLine2"></canvas>
    </div>
    @push('page_scripts')
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
<script>
    const labels = ["January", "February", "March", "April", "May", "June"];
    const data = {
        labels: labels,
        datasets: [{
            label: "My First dataset",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: [0, 10, 5, 2, 20, 30, 45],
        }, ],
    };

    const configLineChart = {
        type: "line",
        data,
        options: {},
    };
    // window.Chart=Chart;
    var chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
    );
    const data2 = {
        labels: [
            'Red',
            'Blue',
            'Yellow'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };
    const plugin = {
        id: 'custom_canvas_background_color',
        beforeDraw: (chart) => {
            const ctx = chart.canvas.getContext('2d');
            ctx.save();
            ctx.globalCompositeOperation = 'destination-over';
            ctx.fillStyle = 'lightGreen';
            ctx.fillRect(0, 0, chart.width, chart.height);
            ctx.restore();
        }
    };
    const configDoughnut = {
        type: 'doughnut',
        data: data2,
        plugins: [plugin],
    };


    var chartLine2 = new Chart(
        document.getElementById("chartLine2"),
        configDoughnut
    );
</script>

    @endpush
    {{-- <x-alert.alert-info>Alert</x-alert.alert-info> --}}
</div>
