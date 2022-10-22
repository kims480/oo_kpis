<div class=" p-2 rounded-sm border bg-white">
    <div >
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
        <div class="battery_deploy">
            <label for="rectifier_num">Battery SN:</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="text" id="batterySN" wire:model="BatterySN">
        </div>
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
            <label for="BatteryBankNum">Battery sequence:</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="number" id="BatteryBankNum" wire:model="BatteryBankNum">
        </div>
        <div class="battery_deploy">
            <label for="rectifier_num">Battery Installation Date:</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10">
        </div>
        <div class="battery_deploy">
            <label for="rectifier_num">Airconditioning status:</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10">
        </div>
        <div class="battery_deploy">
            <label for="rectifier_num">Rectifier charging status:</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="10">
        </div>
        <div class="battery_deploy">
            <label for="rectifier_num">Aging of old batteries <small>(Years)</small> :</label>
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <input type="number" name="rectifier_num" id="rectifier_num" min="1" max="15">
        </div>
        <div class="battery_deploy w-full pt-2 mt-3 border-t-2 flex justify-end items-end ">
            {{-- <x-forms-input type="number" label="Rectifier Number" id="Rectifier_Number"  wireModel="" /> --}}
            <button class="p-2 rounded-md bg-green-800 text-gray-100 font-bold" wire:click="storeSiteSnag"> Save </button>
        </div>

    </div>

</div>
