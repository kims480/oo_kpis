<!-- Site Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site_id', __('models/tickets.fields.site_id') . ':') !!}
    {{-- {!! Form::number('site_id', null, ['class' => 'form-control']) !!} --}}

    <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52" name="site_id"
        id="selectSiteId" class="searchSelection">

        @if (isset($ticket))
            @foreach ($SitesList as $id => $site_id)
                <option value="{{ $id }}" {{ $id == $ticket->site_id ? 'selected="selected"' : null }}>
                    {{ $site_id }}
                </option>
            @endforeach
        @else()
            @foreach ($SitesList as $id => $site_id)
                <option value="{{ $id }}">
                    {{ $site_id }}
                </option>
            @endforeach
        @endif
    </select>
    {{-- wire:model="consumable_moveConsumable_spares.{{ $index }}.stock" --}}
</div>

<!-- Categ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Category', __('models/tickets.fields.categ') . ':') !!}
    {{-- {!! Form::text('categ', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select(
        'categ',
        \App\Models\OtcCateg::select('id', 'name')->get()->pluck('name', 'id'),
        null,
        ['class' => 'form-control custom-select'],
    ) !!}

</div>

<!-- Alarm Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Alarm Name', __('models/tickets.fields.alarm_name') . ':') !!}
    {{-- {!! Form::text('alarm_name', null, ['class' => 'form-control']) !!} --}}
    <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52" name="alarm_name"
        id="selectAlarmId" class="searchSelection">
        @if (isset($ticket))
            @foreach ($AlarmsList as $id => $alarm_name)
                <option value="{{ $id }}" {{ $id == $ticket->alarm_name ? 'selected="selected"' : null }}>
                    {{ $alarm_name }}
                </option>
            @endforeach
        @else
            @foreach ($AlarmsList as $id => $alarm_name)
                <option value="{{ $id }}">
                    {{ $alarm_name }}
                </option>
            @endforeach
        @endif
    </select>
</div>

<!-- Categ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/tickets.fields.description') . ':') !!}
    {!! Form::text('description', 'Extra: ', ['class' => 'form-control']) !!}
</div>

<!-- Contractor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contractor', __('models/tickets.fields.contractor') . ':') !!}
    {{-- {!! Form::text('contractor', null, ['class' => 'form-control']) !!} --}}
    <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52" name="contractor"
        id="selectSiteId" class="searchSelection">
        @if (isset($ticket))
        @foreach ($ContractorsList as $id => $name)
            <option value="{{ $id }}" {{ $id == $ticket->contractor ? 'selected="selected"' : null }}>
                {{ $name }}
            </option>
        @endforeach
        @else
        @foreach ($ContractorsList as $id => $name)
        <option value="{{ $id }}" >
            {{ $name }}
        </option>
    @endforeach

        @endif
    </select>
</div>

<!-- Scope Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scope', __('models/tickets.fields.scope') . ':') !!}
    {{-- {!! Form::text('scope', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select(
        'scope',
        \App\Models\OtcScope::select('id', 'name')->get()->pluck('name', 'id'),
        null,
        ['class' => 'form-control custom-select'],
    ) !!}

</div>

<!-- Notes Field -->
<div class="flex flex-col w-full p-2 ">
    {!! Form::label('notes', __('models/tickets.fields.notes') . ':') !!}
    {!! Form::textarea('notes', 'Notes: ', ['class' => 'bg-slate-50 h-16']) !!}
</div>
