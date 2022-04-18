<div class="card card-sm shadow-sm bg-white mt-5 p-2">

    <form wire:submit.prevent="storeCompany" class="mb-3">
        <div class="form-group row">
            <label for="snag_name" class="col-md-4 col-form-label text-md-right">Snag Description <span style="color:red;">*</span></label>

            <div class="col-md-6">
                <input wire:model="snag_name" type="text" class="form-control" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label text-md-right">Main Categ <span style="color:red;">*</span></label>
            <div class="col-md-6">
                <select wire:model="selectedMaincateg" name="maincateg" class="form-control control-sm" required>
                    <option value="">-- choose Main Categ --</option>
                    @foreach ($maincategs as $maincateg)
                        <option value="{{ $maincateg->id }}">{{ $maincateg->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">Sub Categ <span style="color:red;">*</span></label>
            <div class="col-md-6">
                <select wire:model="selectedSubcateg" name="subcateg" class="form-control" required>
                    @if ($subcategs->count() == 0)
                        <option value="">-- choose Main categ first --</option>
                    @endif
                    <option value="">-- choose Sub Categ --</option>
                    @foreach ($subcategs as $subcateg)
                        <option value="{{ $subcateg->id }}">{{ $subcateg->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">Snag <span style="color:red;">*</span></label>

            <div class="col-md-6">
                <select wire:model="selectedSnag" name="snag" class="form-control" required>
                    @if ($snags->count() == 0)
                        <option value="">-- choose Sub categ first --</option>
                    @endif
                    <option value="">-- choose Snag --</option>
                    @foreach ($snags as $snag)
                        <option value="{{ $snag->id }}">{{ $snag->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Add Snag
                </button>
            </div>
        </div>
    </form>

    <hr />

    <h3>Latest Snags</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Sang</th>
                <th>Subcateg</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($snags))


                @foreach ($snags as $snag)
                    <tr>
                        <td>{{ $snag->description }}</td>
                        <td>{{ $snag->sub_categ->main_categ->name }} → {{ $snag->sub_categ->name }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
