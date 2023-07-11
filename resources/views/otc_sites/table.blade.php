<div class="table-responsive">
    <table class="table" id="otcSites-table">
        <thead>
        <tr>
            
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($otcSites as $otcSites)
            <tr>
                
                <td width="120">
                    {!! Form::open(['route' => ['otcSites.destroy', $otcSites->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('otcSites.show', [$otcSites->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('otcSites.edit', [$otcSites->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>
