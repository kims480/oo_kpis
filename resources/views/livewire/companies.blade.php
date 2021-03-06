<div>

    <form wire:submit.prevent="storeCompany" class="mb-5">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Snag Description*</label>

            <div class="col-md-6">
                <input wire:model="name" type="text" class="form-control" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label text-md-right">Main Categ*</label>

            <div class="col-md-6">
                <select wire:model="selectedCountry" name="country" class="form-control" required>
                    <option value="">-- choose Main Categ --</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">Sub Categ*</label>

            <div class="col-md-6">
                <select wire:model="selectedState" name="state" class="form-control" required>
                    @if ($states->count() == 0)
                        <option value="">-- choose Main categ first --</option>
                    @endif
                    <option value="">-- choose state --</option>
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">City*</label>

            <div class="col-md-6">
                <select wire:model="selectedCity" name="city" class="form-control" required>
                    @if ($cities->count() == 0)
                        <option value="">-- choose state first --</option>
                    @endif
                    <option value="">-- choose city --</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Add Company
                </button>
            </div>
        </div>
    </form>

    <hr />

    <h3>Latest Companies</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($companies))


                @foreach ($companies as $company)
                    {{-- <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->city->description }}, {{ $company->city->state->name }},
                            {{ $company->city->state->country->name }}</td>
                    </tr> --}}
                @endforeach
            @endif
        </tbody>
    </table>
</div>
