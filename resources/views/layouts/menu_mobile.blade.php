<a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
    <i class="fas fa-tachometer-alt mr-3"></i>
    Dashboard
</a>
<a href="{{ route('site-snags.index') }}"
    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
    <i class="fas fa-sticky-note mr-3"></i>
    Snags
</a>
@can(__('models/site-snags.singular') . '.index')

<a href="{{ route('site-snags.create') }}" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
    <i class="fas fa-table mr-3"></i>
    Add Snag
</a>
@endcan
<a href="{{-- {{ route('user.profile') }} --}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
    <i class="fas fa-user mr-3"></i>
    My Profile
</a>
@can(__('models/batteryAdds.singular') . '.index')
    <a href="{{ route(__('models/batteryAdds.singular') . '.index') }}"
        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-user mr-3"></i>
        Deploy Battery
    </a>
@endcan
@can(__('models/consumableSpares.route') . '.index')

    <a href="{{ route(__('models/consumableSpares.route') . '.index') }}"
        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-user mr-3"></i>
        Consumable spare
    </a>
@endcan
@hasanyrole('supper-admin|OTC')
    <a href="{{ route(__('models/tickets.route') . '.index') }}"
        class="flex items-center uppercase text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-user mr-3"></i>
        {{ __('models/tickets.route') }}
    </a>
@endhasanyrole
<a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt mr-3"></i>
    Sign Out
</a>
