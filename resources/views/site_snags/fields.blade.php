<!-- Site Id Field -->
{{-- {!! Form::label('site_id', __('models/siteSnags.fields.site_id').':') !!}
{!! Form::select('site_id', $SitesList, null, ['class' => 'form-control custom-select']) !!} --}}
{{-- @dd($SitesList) --}}
<!-- Snagmangs Field -->
{{-- {!! Form::label('snagmangs', __('models/siteSnags.fields.snagmangs').':') !!}
{!! Form::select('snagmangs', $SnagsList, null, ['class' => 'form-control custom-select']) !!} --}}
@livewire('site-snag')
@push('page_scripts')
{{-- <script src="{{asset('js/searchdrop.js')}}"></script> --}}
    {{-- <script>
    let filtered_site=new SearchDrop('.select-box');
    // let filtered_snag=new SearchDrop('#snag'); --}}
    {{-- </script> --}}
@endpush


