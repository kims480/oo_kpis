@extends('layouts.app')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    Site Access Request
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'sites.store', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-body">
                <div class="container-fluid">
                    <section class="content">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Create Site Access Request</h3>
                            </div>
                            <div class="box-body">

                                <div class="w-full">
                                    <div class="w-full">

                                        <div class="row">
                                            <div class="w-1/2 col-xs-6">
                                                <div class="input form-group has-error has-danger">
                                                    <label for="access_type">Region*</label>
                                                    <select name="region_id" id="region_id" class="form-control"
                                                        required="">
                                                        <option value=""> -- Select Region--</option>
                                                        <option value="1">
                                                            Northern Oman </option>
                                                        <option value="2">
                                                            Southern Oman </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="w-1/2 col-xs-6">
                                                <!-- Site Id Field -->
                                                <div class="form-group col-sm-6">
                                                    {!! Form::label('site_id', __('models/tickets.fields.site_id') . ':') !!}
                                                    {{-- {!! Form::number('site_id', null, ['class' => 'form-control']) !!} --}}

                                                    <select data-te-select-init data-te-select-filter="true"
                                                        data-te-select-option-height="52" name="site_id" id="selectSiteId"
                                                        class="searchSelection">

                                                        @if (isset($ticket))
                                                            @foreach ($SitesList as $id => $site_id)
                                                                <option value="{{ $id }}"
                                                                    {{ $id == $ticket->site_id ? 'selected="selected"' : null }}>
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
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <label for="w-full">Duration*</label>
                                            <div class="flex flex-row gap-3 ">
                                                <div class="w-1/2 input-group col-xs-6">
                                                    <span class="input-group-addon"
                                                        style="border-left:1px solid #ccc;">FROM</span>
                                                    <input name=" w-1/3  duration_start" type="text"
                                                        class="w-1/2 form-control startdate" value="">
                                                </div>
                                                <div class="w-1/2 input-group col-xs-6">

                                                    <span class="input-group-addon">TO</span>
                                                    <input name="duration_end" type="text" class="w-1/2 form-control enddate"
                                                        value="18/Jul/2023 11:07 PM">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="w-1/2  col-xs-6">
                                                <div class="input form-group">
                                                    <label for="work_description">Nature Of Work:*</label>
                                                    <select name="work_type" id="work_type" class="form-control"
                                                        required="">
                                                        <option value="">--Select--</option>
                                                        <option value="CR">CR</option>
                                                        <option value="PM">PM</option>
                                                        <option value="PLM">PLM</option>
                                                        <option value="Project Delivery">Project Delivery</option>
                                                        <option value="Site Survey">Site Survey</option>
                                                        <option value="Site Audit">Site Audit</option>
                                                        <option value="Other">Other</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="w-1/2  col-xs-6">
                                                <div class="input form-group">
                                                    <label for="work_type_source_no">Ticket Source No:</label>
                                                    <input type="text" id="work_type_source_no" class="form-control"
                                                        name="work_type_source_no" value="">

                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="w-1/2">
                                                <div class="input form-group">
                                                    <label for="work_description">Description:*</label>
                                                    <textarea id="description" class="form-control" name="description" style="max-width:100%;" required=""></textarea>

                                                </div>
                                            </div>

                                            <div class="w-1/2  col-xs-12">
                                                <div class="input form-group">
                                                    <label for="work_description">Request Type:*</label>
                                                    <select name="access_type" id="access_type" class="form-control"
                                                        onchange="addOtherUser();" required="">
                                                        <option value="MySelf">My Self</option>
                                                        <option value="Other">Other(Create Request on the behalf of
                                                            below mentioned
                                                            Requester)</option>

                                                    </select>



                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="w-1/2  col-xs-12">
                                                <div class="input form-group">
                                                    <label for="civil_id_photo">Upload Civil ID:*</label>

                                                    <input type="file" id="civil_id_photo" name="civil_id_photo[]"
                                                        class="form-control" required="" multiple="">



                                                </div>
                                            </div>
                                        </div>
                                        <!-- Images View Mode-->
                                        <div class="row">
                                            <div class="w-1/2  col-xs-12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="googlemap" id="siteshowmap"
                                            style="height: 300px; position: relative; overflow: hidden;">
                                            <div
                                                style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                                <div class="gm-style"
                                                    style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                                                    <div><button draggable="false" aria-label="Keyboard shortcuts"
                                                            title="Keyboard shortcuts" type="button"
                                                            style="background: none transparent; display: block; border: none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; z-index: 1000002; outline-offset: 3px; right: 0px; bottom: 0px; transform: translateX(100%);"></button>
                                                    </div>
                                                    <div tabindex="0" aria-label="Map" aria-roledescription="map"
                                                        role="region"
                                                        style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: none;"
                                                        aria-describedby="1CA26CFE-0A87-4F88-BF5A-33B377685BBF">
                                                        <div
                                                            style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);">
                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                                                <div
                                                                    style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                                    <div
                                                                        style="position: absolute; z-index: 988; transform: matrix(1, 0, 0, 1, -89, -213);">
                                                                        <div
                                                                            style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;">
                                                                            <div style="width: 256px; height: 256px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;">
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;">
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                                <div
                                                                    style="position: absolute; z-index: 988; transform: matrix(1, 0, 0, 1, -89, -213);">
                                                                    <div
                                                                        style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img draggable="false" alt=""
                                                                            role="presentation"
                                                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i2717!3i1776!4i256!2m3!1e0!2sm!3i654394689!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2!23i1379903&amp;key=AIzaSyAjshV669rJis6sRJemt-VQoPSo9N4MJx8&amp;token=100508"
                                                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                    </div>
                                                                    <div
                                                                        style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img draggable="false" alt=""
                                                                            role="presentation"
                                                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i2716!3i1776!4i256!2m3!1e0!2sm!3i654394713!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2!23i1379903&amp;key=AIzaSyAjshV669rJis6sRJemt-VQoPSo9N4MJx8&amp;token=33425"
                                                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                    </div>
                                                                    <div
                                                                        style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img draggable="false" alt=""
                                                                            role="presentation"
                                                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i2716!3i1775!4i256!2m3!1e0!2sm!3i654394713!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2!23i1379903&amp;key=AIzaSyAjshV669rJis6sRJemt-VQoPSo9N4MJx8&amp;token=67492"
                                                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                    </div>
                                                                    <div
                                                                        style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img draggable="false" alt=""
                                                                            role="presentation"
                                                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i2718!3i1776!4i256!2m3!1e0!2sm!3i654394689!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2!23i1379903&amp;key=AIzaSyAjshV669rJis6sRJemt-VQoPSo9N4MJx8&amp;token=36861"
                                                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                    </div>
                                                                    <div
                                                                        style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img draggable="false" alt=""
                                                                            role="presentation"
                                                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i2718!3i1775!4i256!2m3!1e0!2sm!3i654394689!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2!23i1379903&amp;key=AIzaSyAjshV669rJis6sRJemt-VQoPSo9N4MJx8&amp;token=70928"
                                                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                    </div>
                                                                    <div
                                                                        style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                                        <img draggable="false" alt=""
                                                                            role="presentation"
                                                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i2717!3i1775!4i256!2m3!1e0!2sm!3i654394689!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2!23i1379903&amp;key=AIzaSyAjshV669rJis6sRJemt-VQoPSo9N4MJx8&amp;token=3504"
                                                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                                                            <div
                                                                style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);">
                                                                <div
                                                                    style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
                                                                </div>
                                                                <div
                                                                    style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;">
                                                                </div>
                                                                <div
                                                                    style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                                                                    <span id="C254FF32-B4DD-4A67-B777-5A424F7742C6"
                                                                        style="display: none;">To navigate, press the
                                                                        arrow
                                                                        keys.</span>
                                                                </div>
                                                                <div
                                                                    style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="gm-style-moc"
                                                            style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
                                                            <p class="gm-style-mot"></p>
                                                        </div>
                                                        <div class="LGLeeN-keyboard-shortcuts-view"
                                                            id="1CA26CFE-0A87-4F88-BF5A-33B377685BBF"
                                                            style="display: none;">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
                                                                                aria-label="Left arrow">←</kbd></td>
                                                                        <td aria-label="Move left.">Move left</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
                                                                                aria-label="Right arrow">→</kbd></td>
                                                                        <td aria-label="Move right.">Move right</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
                                                                                aria-label="Up arrow">↑</kbd></td>
                                                                        <td aria-label="Move up.">Move up</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key"
                                                                                aria-label="Down arrow">↓</kbd></td>
                                                                        <td aria-label="Move down.">Move down</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key">+</kbd>
                                                                        </td>
                                                                        <td aria-label="Zoom in.">Zoom in</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key">-</kbd>
                                                                        </td>
                                                                        <td aria-label="Zoom out.">Zoom out</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key">Home</kbd>
                                                                        </td>
                                                                        <td aria-label="Jump left by 75%.">Jump left by
                                                                            75%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key">End</kbd>
                                                                        </td>
                                                                        <td aria-label="Jump right by 75%.">Jump right
                                                                            by 75%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key">Page
                                                                                Up</kbd></td>
                                                                        <td aria-label="Jump up by 75%.">Jump up by 75%
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;"><kbd
                                                                                class="VdnQmO-keyboard-shortcuts-view--shortcut-key">Page
                                                                                Down</kbd></td>
                                                                        <td aria-label="Jump down by 75%.">Jump down by
                                                                            75%</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><iframe aria-hidden="true" frameborder="0" tabindex="-1"
                                                        style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe>
                                                    <div
                                                        style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);">
                                                    </div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div><button draggable="false" aria-label="Toggle fullscreen view"
                                                            title="Toggle fullscreen view" type="button"
                                                            aria-pressed="false"
                                                            class="gm-control-active gm-fullscreen-control"
                                                            style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img
                                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                                                alt="" style="height: 18px; width: 18px;"><img
                                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                                                alt="" style="height: 18px; width: 18px;"><img
                                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                                                alt=""
                                                                style="height: 18px; width: 18px;"></button></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div>
                                                        <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom"
                                                            draggable="false" data-control-width="40"
                                                            data-control-height="113"
                                                            style="margin: 10px; user-select: none; position: absolute; bottom: 127px; right: 40px;">
                                                            <div class="gmnoprint" data-control-width="40"
                                                                data-control-height="40"
                                                                style="display: none; position: absolute;">
                                                                <div
                                                                    style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;">
                                                                    <button draggable="false"
                                                                        aria-label="Rotate map clockwise"
                                                                        title="Rotate map clockwise" type="button"
                                                                        class="gm-control-active"
                                                                        style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img
                                                                            alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                            style="width: 20px; height: 20px;"><img
                                                                            alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                            style="width: 20px; height: 20px;"><img
                                                                            alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                            style="width: 20px; height: 20px;"></button>
                                                                    <div
                                                                        style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;">
                                                                    </div><button draggable="false"
                                                                        aria-label="Rotate map counterclockwise"
                                                                        title="Rotate map counterclockwise" type="button"
                                                                        class="gm-control-active"
                                                                        style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img
                                                                            alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                            style="width: 20px; height: 20px;"><img
                                                                            alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                            style="width: 20px; height: 20px;"><img
                                                                            alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                                                            style="width: 20px; height: 20px;"></button>
                                                                    <div
                                                                        style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;">
                                                                    </div><button draggable="false" aria-label="Tilt map"
                                                                        title="Tilt map" type="button"
                                                                        class="gm-tilt gm-control-active"
                                                                        style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img
                                                                            alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                                                            style="width: 18px;"><img alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                                                            style="width: 18px;"><img alt=""
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                                                            style="width: 18px;"></button>
                                                                </div>
                                                            </div><button draggable="false"
                                                                aria-label="Drag Pegman onto the map to open Street View"
                                                                title="Drag Pegman onto the map to open Street View"
                                                                type="button"
                                                                style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; left: 20px; top: 0px;"></button>
                                                            <div class="gmnoprint" data-control-width="40"
                                                                data-control-height="81"
                                                                style="position: absolute; left: 0px; top: 32px;">
                                                                <div draggable="false"
                                                                    style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;">
                                                                    <button draggable="false" aria-label="Zoom in"
                                                                        title="Zoom in" type="button"
                                                                        class="gm-control-active"
                                                                        style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"></button>
                                                                    <div
                                                                        style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;">
                                                                    </div><button draggable="false" aria-label="Zoom out"
                                                                        title="Zoom out" type="button"
                                                                        class="gm-control-active"
                                                                        style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"><img
                                                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E"
                                                                            alt=""
                                                                            style="height: 18px; width: 18px;"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div
                                                            style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
                                                            <a target="_blank" rel="noopener"
                                                                title="Open this area in Google Maps (opens a new window)"
                                                                aria-label="Open this area in Google Maps (opens a new window)"
                                                                href="https://maps.google.com/maps?ll=23.254878,58.829224&amp;z=12&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3"
                                                                style="display: inline;">
                                                                <div style="width: 66px; height: 26px;"><img
                                                                        alt="Google"
                                                                        src="https://maps.gstatic.com/mapfiles/transparent.png"
                                                                        draggable="false"
                                                                        style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div
                                                            style="display: inline-flex; position: absolute; right: 0px; bottom: 0px;">
                                                            <div class="gmnoprint" style="z-index: 1000001;">
                                                                <div draggable="false" class="gm-style-cc"
                                                                    style="user-select: none; position: relative; height: 14px; line-height: 14px;">
                                                                    <div
                                                                        style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                        <div style="width: 1px;"></div>
                                                                        <div
                                                                            style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                        <button draggable="false"
                                                                            aria-label="Keyboard shortcuts"
                                                                            title="Keyboard shortcuts" type="button"
                                                                            style="background: none; display: inline-block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Keyboard
                                                                            shortcuts</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="gmnoprint" style="z-index: 1000001;">
                                                                <div draggable="false" class="gm-style-cc"
                                                                    style="user-select: none; position: relative; height: 14px; line-height: 14px;">
                                                                    <div
                                                                        style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                        <div style="width: 1px;"></div>
                                                                        <div
                                                                            style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                        <button draggable="false" aria-label="Map Data"
                                                                            title="Map Data" type="button"
                                                                            style="background: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit; display: none;">Map
                                                                            Data</button><span style="">Map data
                                                                            ©2023</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="gmnoscreen">
                                                                <div
                                                                    style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                                                    Map data ©2023</div>
                                                            </div><button draggable="false"
                                                                aria-label="Map Scale: 2 km per 57 pixels"
                                                                title="Map Scale: 2 km per 57 pixels" type="button"
                                                                class="gm-style-cc"
                                                                aria-describedby="47727469-4ABF-46C7-A0E6-46E37541710A"
                                                                style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; height: 14px; line-height: 14px;">
                                                                <div
                                                                    style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                    <div style="width: 1px;"></div>
                                                                    <div
                                                                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                    <span>2 km&nbsp;</span>
                                                                    <div
                                                                        style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 61px;">
                                                                        <div
                                                                            style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;">
                                                                        </div>
                                                                        <div
                                                                            style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);">
                                                                        </div>
                                                                        <div
                                                                            style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); right: 0px; bottom: 0px;">
                                                                        </div>
                                                                        <div
                                                                            style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;">
                                                                        </div>
                                                                        <div
                                                                            style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);">
                                                                        </div>
                                                                        <div
                                                                            style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;">
                                                                        </div>
                                                                    </div>
                                                                </div><span id="47727469-4ABF-46C7-A0E6-46E37541710A"
                                                                    style="display: none;">Click to toggle between
                                                                    metric and imperial
                                                                    units</span>
                                                            </button>
                                                            <div class="gmnoprint gm-style-cc" draggable="false"
                                                                style="z-index: 1000001; user-select: none; position: relative; height: 14px; line-height: 14px;">
                                                                <div
                                                                    style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                    <div style="width: 1px;"></div>
                                                                    <div
                                                                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                    <a href="https://www.google.com/intl/en-US_US/help/terms_maps.html"
                                                                        target="_blank" rel="noopener"
                                                                        style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms
                                                                        of Use</a>
                                                                </div>
                                                            </div>
                                                            <div draggable="false" class="gm-style-cc"
                                                                style="user-select: none; position: relative; height: 14px; line-height: 14px; display: none;">
                                                                <div
                                                                    style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                                    <div style="width: 1px;"></div>
                                                                    <div
                                                                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                                    <a target="_blank" rel="noopener"
                                                                        title="Report errors in the road map or imagery to Google"
                                                                        dir="ltr"
                                                                        href="https://www.google.com/maps/@23.2548778,58.8292236,12z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3"
                                                                        style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report
                                                                        a map error</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <input type="hidden" name="id" value="0">

                </div>
            </div>

            <div class="card-footer">
                {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
                [*Indicates Required Fields]
                <input id="btnSubmit" type="submit" value="Submit" class="btn btn-primary disabled">
                <input type="hidden" name="btnaction" value="add_records">

                <a href="{{ route('sites.index') }}" class="btn btn-default">
                    @lang('crud.cancel')
                </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    </section>

@endsection
