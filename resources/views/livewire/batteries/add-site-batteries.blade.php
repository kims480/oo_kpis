<div class=" p-2 rounded-sm border bg-white">
    <div>
        <div class="battery_deploy">
            <x-multi-select label="Site ID" itemId="site" :optionSelectedId="$selectedSite_id" optionValue="selectedSite_id"
                optionName="site_name" :optionSelectedName="$site_name" :optionList="$SitesList" itemSearch="siteSearch" />
        </div>
        {{--
             public $rectifierNum;
    public $BankNum;
    public $BatteryBankNum;
    public $BatterySN;
    public $batteryInstallationDate;
    public $numOfRectifiers;
    public $airconditioningStatus;
    public $rectifierChargingStatus;
    public $agingOfOldBatteries;
            Rectifier Number	Bank#	Battery#	B SN	B Installation Date	#Rectifiers	Airconditioning status	Rectifier charging status
 --}}
        <div class="bb-bank flex justify-between items-end">
            <div class="battery_deploy ">
                <label for="rectifier_num_1">Battery#1 SN:</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="text" id="batterySN1" wire:model="BatterySN">
            </div>
            <div class="battery_deploy">
                <label for="rectifier_num_2">Battery#2 SN:</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="text" id="batterySN2" wire:model="BatterySN">
            </div>
            <div class="battery_deploy">
                <label for="rectifier_num_3">Battery#3 SN:</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="text" id="batterySN3" wire:model="BatterySN">
            </div>
            <div class="battery_deploy">
                <label for="rectifier_num_4">Battery#4 SN:</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="text" id="batterySN4" wire:model="BatterySN">
            </div>
        </div>
        <div class="rectifier flex justify-between items-end">
            <div class="battery_deploy">
                <label for="numberOfRectifiers">Number of Rectifiers:</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10">
            </div>
            <div class="battery_deploy">
                <label for="rectifier_num">Rectifier Number:</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10">
            </div>
            <div class="battery_deploy">
                <label for="rectifier_num">Bank Number:</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10">
            </div>
            <div class="battery_deploy">
                <label for="modules">#Rect Modules</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="number" name="modules" id="modules" min="1" max="10">
            </div>

        </div>
        <div class="battery_deploy">
            <label for="rectifier_num">Battery Installation Date:</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="date" name="rectifier_num" id="rectifier_num">
        </div>
        <div class="battery_deploy">
            <label for="aircon_status">Airconditioning status:</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <select name="aircon_status" id="">
                <option value="1">Good</option>
                <option value="0">Bad</option>
            </select>
            {{-- <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10"> --}}
        </div>
        <div class="battery_deploy">
            <label for="charge_status">Rectifier charging status:</label>
            <select name="charge_status" id="">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            {{-- <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10"> --}}
        </div>
        <div class="battery_deploy">
            <label for="rectifier_num">Aging of old batteries <small>(Years)</small> :</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="15">
        </div>

        <div class="lvd flex items-end">

            <div class="battery_deploy">
                <label for="llvd">LLVD Value</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="text" name="llvd" id="llvd" >
            </div>
            <div class="battery_deploy">
                <label for="blvd">BLVD Value</label>
                {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
                <input type="text" name="blvd" id="blvd">
            </div>
        </div>
        <div class="battery_deploy w-full pt-2 mt-3 border-t-2 flex justify-end items-end ">
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <button class="p-2 rounded-md bg-green-800 text-gray-100 font-bold" wire:click="storeSiteSnag"> Save
            </button>
        </div>

    </div>

</div>
