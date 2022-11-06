<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassiveSpareSeeder extends Seeder
{
    public $spares=[
        ['old_bom' =>'PI200001' , 'new_bom' => '88288W UF', 'description' => '2.5 ton compressor bristol (H23A42QABKA)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200002' , 'new_bom' => '88288W PJ', 'description' => 'Aircon Remote Controls (Toshiba)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200003' , 'new_bom' => '88288W UX', 'description' => 'Bi-directional On/Off switch for A/C panel','uom'=>'Pcs' ],
        ['old_bom' =>'PI200004' , 'new_bom' => 'PI200004', 'description' => 'Capacitor 50 MFD - SYSCAP','uom'=>'Pcs' ],
        ['old_bom' =>'PI200005' , 'new_bom' => 'PI200005', 'description' => 'Capacitor 55 MFD - SYSCAP','uom'=>'Pcs' ],
        ['old_bom' =>'PI200006' , 'new_bom' => 'PI200006', 'description' => 'Capacitor 55+5 MFD -SYSCAP','uom'=>'Pcs' ],
        ['old_bom' =>'PI200007' , 'new_bom' => '88288W UW', 'description' => 'Copper coil 1/2" - MAKSAL STANDARD THICKNESS 0.32"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200008' , 'new_bom' => '88288X BK', 'description' => 'Copper coil 1/4" - MAKSAL STANDARD THICKNESS 0.030"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200009' , 'new_bom' => '88288W XD', 'description' => 'Copper coil 3/4" - MAKSAL STANDARD THICKNES 0.81"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200010' , 'new_bom' => '88288W VQ', 'description' => 'Copper coil 3/8" - MAKSAL STANDARD THICKNESS 0.32"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200011' , 'new_bom' => '88288W NU', 'description' => 'Copper coil 5/8" - MAKSAL STANDARD THICKNESS 0.35"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200012' , 'new_bom' => '88288W WJ', 'description' => '2.5 ton rotary compressor -NH52VNHT','uom'=>'Pcs' ],
        ['old_bom' =>'PI200013-001' , 'new_bom' => '88288W RN-01', 'description' => 'Cost for 2 Ton General Split A/C(IDU)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200013-002' , 'new_bom' => '88288W RN-02', 'description' => 'Cost for 2 Ton General Split A/C (ODU)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200014-001' , 'new_bom' => '88288W SN-01', 'description' => 'Cost for 2.5 Ton General Split A/C (IDU)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200014-002' , 'new_bom' => '88288W SN-02', 'description' => 'Cost for 2.5 Ton General Split A/C (ODU)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200015' , 'new_bom' => '88288W NN', 'description' => 'general PCB kit - ASG 30 ABCW','uom'=>'Pcs' ],
        ['old_bom' =>'PI200016' , 'new_bom' => '88288W PQ', 'description' => 'General split A/C Condenser Fan Blade','uom'=>'Pcs' ],
        ['old_bom' =>'PI200017' , 'new_bom' => 'PI200017', 'description' => 'General split A/C Condenser Fan Motor for 2.5Ton.','uom'=>'Pcs' ],
        ['old_bom' =>'PI200018' , 'new_bom' => 'PI200018', 'description' => 'A/C Change over panel suitable for 2.5 Ton.','uom'=>'Pcs' ],
        ['old_bom' =>'PI200019' , 'new_bom' => 'PI200019', 'description' => 'General split A/C Condenser Fan Motor for 2Ton.','uom'=>'Pcs' ],
        ['old_bom' =>'PI200020' , 'new_bom' => '88288W XV', 'description' => 'General split A/C Indoor Blower','uom'=>'Pcs' ],
        ['old_bom' =>'PI200021' , 'new_bom' => 'PI200021', 'description' => 'General split A/C Indoor Fan Motor 2 Ton','uom'=>'Pcs' ],
        ['old_bom' =>'PI200022' , 'new_bom' => '88288W VY', 'description' => 'General split A/C Indoor Fan Motor 2.5 Ton','uom'=>'Pcs' ],
        ['old_bom' =>'PI200023' , 'new_bom' => 'PI200023', 'description' => 'Insulation Sleeve 1/2" - GULF - O FLEX THICKNESS 3/8"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200024' , 'new_bom' => 'PI200024', 'description' => 'Insulation Sleeve 1/4" - GULF-O-FLEX THICKNESS 3/8"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200025' , 'new_bom' => 'PI200025', 'description' => 'Insulation Sleeve 3/4" - GULF - O - FLEX THICKNESS 3/8"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200026' , 'new_bom' => 'PI200026', 'description' => 'Insulation Sleeve 3/8" - GULF - O FLEX THICKNESS 3/8"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200027' , 'new_bom' => 'PI200027', 'description' => 'Insulation Sleeve 5/8" GULF - O FLEX THICKNESS 3/8"','uom'=>'Mtr' ],
        ['old_bom' =>'PI200028' , 'new_bom' => '88288W VM', 'description' => 'magnetic contactor 30A/220V/3P','uom'=>'Pcs' ],
        ['old_bom' =>'PI200029' , 'new_bom' => 'PI200029', 'description' => 'A/C plastic drain pipes','uom'=>'Mtr' ],
        ['old_bom' =>'PI200030' , 'new_bom' => '88288W XA', 'description' => 'magnetic contactor 32A/220V/2P','uom'=>'Pcs' ],
        ['old_bom' =>'PI200031' , 'new_bom' => 'PI200031', 'description' => 'metal duct for A/C pipes','uom'=>'Pcs' ],
        ['old_bom' =>'PI200032' , 'new_bom' => 'PI200032', 'description' => 'Outdoor Relay for General','uom'=>'Pcs' ],
        ['old_bom' =>'PI200033' , 'new_bom' => '88288W WU', 'description' => 'Siemens Logo Timer','uom'=>'Pcs' ],
        ['old_bom' =>'PI200034' , 'new_bom' => '88288W XR', 'description' => 'Telemechanic Logo Timer','uom'=>'Pcs' ],
        ['old_bom' =>'PI200035' , 'new_bom' => 'PI200035', 'description' => 'thermostal honey well','uom'=>'Pcs' ],
        ['old_bom' =>'PI200036' , 'new_bom' => 'PI200036', 'description' => 'toshiba indoor fan motor - ICF -340-30-2','uom'=>'Pcs' ],
        ['old_bom' =>'PI200037' , 'new_bom' => 'PI200037', 'description' => 'Toshiba split A/C Condenser Fan Blade','uom'=>'Pcs' ],
        ['old_bom' =>'PI200038' , 'new_bom' => 'PI200038', 'description' => 'Toshiba split A/C Condenser Fan Motor New','uom'=>'Pcs' ],
        ['old_bom' =>'PI200039' , 'new_bom' => '88288W RB', 'description' => 'A/C Steel Bracket -','uom'=>'Pcs' ],
        ['old_bom' =>'PI200040' , 'new_bom' => 'PI200040', 'description' => 'Toshiba split A/C Indoor Blower','uom'=>'Pcs' ],
        ['old_bom' =>'PI200041' , 'new_bom' => 'PI200041', 'description' => 'AC Filter','uom'=>'Pcs' ],
        ['old_bom' =>'PI200042' , 'new_bom' => '88288W PP', 'description' => 'AC temperature Sensor','uom'=>'Pcs' ],
        ['old_bom' =>'PI200043' , 'new_bom' => '88288W SB', 'description' => 'Aircon Remote Controls (Diakan)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200044' , 'new_bom' => '88288W QQ', 'description' => 'Aircon Remote Controls (General)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200045' , 'new_bom' => 'PI200045', 'description' => 'PCB out Relay ','uom'=>'Pcs' ],
        ['old_bom' =>'PI200046' , 'new_bom' => 'PI200046', 'description' => 'PCB Full Set ','uom'=>'Pcs' ],
        ['old_bom' =>'PI200047' , 'new_bom' => 'PI200047', 'description' => 'Compressor','uom'=>'Pcs' ],
        ['old_bom' =>'PI200048' , 'new_bom' => 'PI200048', 'description' => 'ATS Panel Contactor 100A/4P/3RT1344-1A Siemens.','uom'=>'Pcs' ],
        ['old_bom' =>'PI200049' , 'new_bom' => 'PI200049', 'description' => 'Supply of ATS Panel Cummins 38_ATS panel of Capacity of 63A','uom'=>'Pcs' ],
        ['old_bom' =>'PI200050' , 'new_bom' => 'PI200050', 'description' => 'Supply of ATS Panel_Atlas 20_ATS panel of Capacity of 63A','uom'=>'Pcs' ],
        ['old_bom' =>'PI200051' , 'new_bom' => 'PI200051', 'description' => 'Supply of ATS Panel_SDMO 33_ATS panel of Capacity of 63A','uom'=>'Pcs' ],
        ['old_bom' =>'PI200052' , 'new_bom' => '88288X BE', 'description' => 'Contactor 32A/3P/TM/230V','uom'=>'Pcs' ],
        ['old_bom' =>'PI200053' , 'new_bom' => '88288X AW', 'description' => 'Contactor 32A/4P/TM/230V','uom'=>'Pcs' ],
        ['old_bom' =>'PI200054' , 'new_bom' => 'PI200054', 'description' => 'Contactor 40A/2P/230V FURNAS OR DELTA','uom'=>'Pcs' ],
        ['old_bom' =>'PI200055' , 'new_bom' => 'PI200055', 'description' => 'Contactor 40A/3P/TM/230V','uom'=>'Pcs' ],
        ['old_bom' =>'PI200056' , 'new_bom' => '88288W SJ', 'description' => 'ELCB 100A/3P/Merlin Gerin','uom'=>'Pcs' ],
        ['old_bom' =>'PI200057' , 'new_bom' => 'PI200057', 'description' => 'ELCB 100A/4P/03MA','uom'=>'Pcs' ],
        ['old_bom' =>'PI200058' , 'new_bom' => 'PI200058', 'description' => 'MCCB 100A/4P MERLIN GERIN OR SCHNEIDER','uom'=>'Pcs' ],
        ['old_bom' =>'PI200059' , 'new_bom' => 'PI200059', 'description' => 'MCCB 63A/3P/ Merlin Gerin','uom'=>'Pcs' ],
        ['old_bom' =>'PI200060' , 'new_bom' => 'PI200060', 'description' => 'DC Breaker / 10A / 1P - Schenider / ABB','uom'=>'Pcs' ],
        ['old_bom' =>'PI200061' , 'new_bom' => 'PI200061', 'description' => 'DC Breaker / 16A / 1P - Schenider / ABB','uom'=>'Pcs' ],
        ['old_bom' =>'PI200062' , 'new_bom' => 'PI200062', 'description' => 'DC Breaker / 32A / 1P - Schenider / ABB','uom'=>'Pcs' ],
        ['old_bom' =>'PI200063' , 'new_bom' => 'PI200063', 'description' => 'AC Breaker / 32A / 1P - Schenider / ABB','uom'=>'Pcs' ],
        ['old_bom' =>'PI200064' , 'new_bom' => 'PI200064', 'description' => 'AC Breaker / 16A / 1P - Schenider / ABB','uom'=>'Pcs' ],
        ['old_bom' =>'PI200065' , 'new_bom' => 'PI200065', 'description' => 'AC Power Cable 25mm/4C','uom'=>'Mtr' ],
        ['old_bom' =>'PI200066' , 'new_bom' => 'PI200066', 'description' => 'AC Power Cable 35mm/4C','uom'=>'Mtr' ],
        ['old_bom' =>'PI200067' , 'new_bom' => 'PI200067', 'description' => 'Armoured Cable 35mm/4C','uom'=>'Mtr' ],
        ['old_bom' =>'PI200068' , 'new_bom' => 'PI200068', 'description' => 'CAT6 - LAN Cable for Alarm patching','uom'=>'Mtr' ],
        ['old_bom' =>'PI200069' , 'new_bom' => 'PI200069', 'description' => 'Cost Cable flexible2.5 mm x 3C','uom'=>'Mtr' ],
        ['old_bom' =>'PI200070' , 'new_bom' => '88288W UC', 'description' => 'Cost DC Cable flexible 16 mm (Blue, Black and/or Red)','uom'=>'Mtr' ],
        ['old_bom' =>'PI200071' , 'new_bom' => '88288W QT', 'description' => 'Cost DC Cable flexible 25 mm (Blue, Black and/or Red)','uom'=>'Mtr' ],
        ['old_bom' =>'PI200072' , 'new_bom' => 'PI200072', 'description' => 'Cost DC Cable flexible 6 mm x 2C','uom'=>'Mtr' ],
        ['old_bom' =>'PI200073' , 'new_bom' => 'PI200073', 'description' => 'earth cables, 6mm','uom'=>'Mtr' ],
        ['old_bom' =>'PI200074' , 'new_bom' => 'PI200074', 'description' => 'Cost DC Cable flexible 4 mm x 2C','uom'=>'Mtr' ],
        ['old_bom' =>'PI200075' , 'new_bom' => 'PI200075', 'description' => 'DB / Hinges & locks','uom'=>'Pcs' ],
        ['old_bom' =>'PI200076' , 'new_bom' => '88288W PA', 'description' => 'DB 4 Way Schneider with all accessories.','uom'=>'Pcs' ],
        ['old_bom' =>'PI200077' , 'new_bom' => '88288W XP', 'description' => 'DB 6 Way Schneider with all accessories.','uom'=>'Pcs' ],
        ['old_bom' =>'PI200078' , 'new_bom' => '88288W UJ', 'description' => 'DB 8 Way Schneider with all accessories.','uom'=>'Pcs' ],
        ['old_bom' =>'PI200079' , 'new_bom' => 'PI200079', 'description' => 'Earth Box Door Lock','uom'=>'Pcs' ],
        ['old_bom' =>'PI200080' , 'new_bom' => 'PI200080', 'description' => 'Glands 16 mm²','uom'=>'Pcs' ],
        ['old_bom' =>'PI200081' , 'new_bom' => 'PI200081', 'description' => 'Glands 24 mm²','uom'=>'Pcs' ],
        ['old_bom' =>'PI200082' , 'new_bom' => 'PI200082', 'description' => 'Glands 29 mm²','uom'=>'Pcs' ],
        ['old_bom' =>'PI200083' , 'new_bom' => 'PI200083', 'description' => 'Glands 36 mm²','uom'=>'Pcs' ],
        ['old_bom' =>'PI200084' , 'new_bom' => 'PI200084', 'description' => 'Glands 42 mm²','uom'=>'Pcs' ],
        ['old_bom' =>'PI200085' , 'new_bom' => 'PI200085', 'description' => 'Panel Indication Light (Red, Yellow, Green) with Bulb','uom'=>'Pcs' ],
        ['old_bom' =>'PI200086' , 'new_bom' => '88288W TW', 'description' => 'Cable Joining Kit 25 mmx4C','uom'=>'Pcs' ],
        ['old_bom' =>'PI200087' , 'new_bom' => 'PI200087', 'description' => 'Cable Joining Kit 35 mmx4C','uom'=>'Pcs' ],
        ['old_bom' =>'PI200088' , 'new_bom' => 'PI200088', 'description' => 'Phase sequence relay Broyse Control','uom'=>'Pcs' ],
        ['old_bom' =>'PI200089' , 'new_bom' => 'PI200089', 'description' => 'Phase Sequence Relay Lovato','uom'=>'Pcs' ],
        ['old_bom' =>'PI200090' , 'new_bom' => '88288W QW', 'description' => 'surge arrestor','uom'=>'Pcs' ],
        ['old_bom' =>'PI200091' , 'new_bom' => 'PI200091', 'description' => 'Timer 12 v','uom'=>'Pcs' ],
        ['old_bom' =>'PI200092' , 'new_bom' => 'PI200092', 'description' => 'Timer 220 v','uom'=>'Pcs' ],
        ['old_bom' =>'PI200093' , 'new_bom' => '88288W PX', 'description' => 'Voltage Protection relay Carlo Gavazzi','uom'=>'Pcs' ],
        ['old_bom' =>'PI200094' , 'new_bom' => 'PI200094', 'description' => 'Fire alarm battery 12V/4AH','uom'=>'Pcs' ],
        ['old_bom' =>'PI200095' , 'new_bom' => '88288W QU', 'description' => 'Fire Alarm Bell Zeta UK','uom'=>'Pcs' ],
        ['old_bom' =>'PI200096' , 'new_bom' => 'PI200096', 'description' => 'Fire alarm panel Battery 4.5 AH /12V','uom'=>'Pcs' ],
        ['old_bom' =>'PI200097' , 'new_bom' => '88288W QS', 'description' => 'PCB, Flash Technology, Part Number:F2900211REV','uom'=>'Pcs' ],
        ['old_bom' =>'PI200098' , 'new_bom' => '88288X AX', 'description' => 'Smoke Detector (Ionization) - Zeta UK','uom'=>'Pcs' ],
        ['old_bom' =>'PI200099' , 'new_bom' => 'PI200099', 'description' => 'Cost for New fire alarm panel CP 200 with detector','uom'=>'Pcs' ],
        ['old_bom' =>'PI200100' , 'new_bom' => 'PI200100', 'description' => 'Crone Block','uom'=>'Pcs' ],
        ['old_bom' =>'PI200101' , 'new_bom' => 'PI200101', 'description' => 'Feeder Box','uom'=>'Pcs' ],
        ['old_bom' =>'PI200102' , 'new_bom' => 'PI200102', 'description' => 'Feeder Clamps','uom'=>'Pcs' ],
        ['old_bom' =>'PI200103' , 'new_bom' => 'PI200103', 'description' => 'Filling Foam Spray','uom'=>'Pcs' ],
        ['old_bom' =>'PI200104' , 'new_bom' => 'PI200104', 'description' => 'L-Drop lock','uom'=>'Pcs' ],
        ['old_bom' =>'PI200105' , 'new_bom' => 'PI200105', 'description' => 'main gate Paint (black)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200106' , 'new_bom' => 'PI200106', 'description' => 'main gate Paint (green)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200107' , 'new_bom' => 'PI200107', 'description' => 'metal ladder tray','uom'=>'Pcs' ],
        ['old_bom' =>'PI200108' , 'new_bom' => 'PI200108', 'description' => 'Silicon Tube - Crack Filling','uom'=>'Pcs' ],
        ['old_bom' =>'PI200109' , 'new_bom' => 'PI200109', 'description' => 'Silicon Tube (Transparent)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200110' , 'new_bom' => 'PI200110', 'description' => 'silver spray Paint (Anti-Rust)','uom'=>'Pcs' ],
        ['old_bom' =>'PI200111' , 'new_bom' => '88288W XX', 'description' => 'Shelter Door sensor','uom'=>'Pcs' ],
        ['old_bom' =>'PI200112' , 'new_bom' => '88288W UT', 'description' => 'Main Failure Alarm relay','uom'=>'Pcs' ],
        ['old_bom' =>'PI200113' , 'new_bom' => 'PI200113', 'description' => 'Padlocks','uom'=>'Pcs' ],
        ['old_bom' =>'PI200114' , 'new_bom' => 'PI200114', 'description' => 'Door Locking Latches','uom'=>'Pcs' ],
        ['old_bom' =>'PI200115' , 'new_bom' => '88288W QC', 'description' => 'Aviation DC Light system - full set & Accessories','uom'=>'Pcs' ],
        ['old_bom' =>'PI200116' , 'new_bom' => 'PI200116', 'description' => 'Shelter Emergency Light','uom'=>'Pcs' ],
        ['old_bom' =>'PI200117' , 'new_bom' => 'PI200117', 'description' => 'Supply ofA TS Panel_C A T 135_A TS panelofC apacity of 200A','uom'=>'Pcs' ],
        ['old_bom' =>'PI200118' , 'new_bom' => 'PI200118', 'description' => 'ACDB with accessories','uom'=>'Pcs' ],
        ['old_bom' =>'PI200119' , 'new_bom' => 'OSP', 'description' => 'closure type splitter 2x32 Swiss RAM','uom'=>'Pcs' ],
        ['old_bom' =>'PI200120' , 'new_bom' => 'FM', 'description' => 'AC Aviation lights Complete Set','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200121', 'description' => 'New type of Jumpers (Multiple Types)','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W WY', 'description' => 'general PCB kit - ASG 30 ABCW - 2 TON','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W YW', 'description' => 'General split A/C Indoor Blower - 2 TON','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W VP', 'description' => 'Compressor - Bristol 2 TON','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W TP', 'description' => 'Fire alarm battery YUSHU NP2.3-12 12V/2.3Ah','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W UR', 'description' => 'Fire alarm battery LONG 12V/4AH','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W VV', 'description' => 'Fire alarm panel Battery 4.5 AH /12V - LONG','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W VS', 'description' => 'New fire alarm panel CP 200 with detector - Context Plus','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288X CG', 'description' => 'Fire Extinguisher','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288X CB', 'description' => 'Palm T ree Fronds','uom'=>'Pcs' ],
        ['old_bom' =>'Delta' , 'new_bom' => '88288W VH', 'description' => 'Air Filter F6 530X330X48-DELTA- C7004825','uom'=>'Pcs' ],
        ['old_bom' =>'Delta' , 'new_bom' => '88288W RQ', 'description' => 'Cabinet door handle- DELTA-3470918400','uom'=>'Pcs' ],
        ['old_bom' =>'Delta' , 'new_bom' => '88288W PC', 'description' => 'AC POWER PLUG
        NEEDED - Delta','uom'=>'Pcs' ],
        ['old_bom' =>'Delta' , 'new_bom' => '88288W PR', 'description' => 'Lock Required - Delta','uom'=>'Pcs' ],
        ['old_bom' =>'Delta' , 'new_bom' => '88288W YJ', 'description' => 'smoke sensor - Delta','uom'=>'Pcs' ],
        ['old_bom' =>'Delta' , 'new_bom' => '88288X AD', 'description' => 'Door Alarm Sensor (Intruder Sensor) - Delta','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RH', 'description' => 'ACDelco 12V 100AH (Dry Battery)','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W WF', 'description' => 'ACDelco 12V 70AH (Dry Battery)','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W VC', 'description' => 'Carlo gavazzi - 10A/250VAC - RCP8
        002-DG_Relay','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W QG', 'description' => 'Foxtam - 5A/250VAC
        - FRP-3145-DG_Relay','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RR', 'description' => 'RM1 A4 5 12 V-
        DG_Relay','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X DF', 'description' => 'Schneider-R xm 4ab1jd 12vdc 6a-D G _R elay','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YG', 'description' => 'Tele RM 12vdc 6a- DG_Relay','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BQ', 'description' => '16 Amp/3Position- DG_selector Switch','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RC', 'description' => '12VDC - 5 Pins - 40 A-DG_Self Relay','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BC', 'description' => '12VDC - 5 Pins -60 A- DG_Self Relay','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W PK', 'description' => 'Suitable for 12V Battery-DG_Terminal','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YR', 'description' => 'schneider 120H 4P- DG_Circuit Breaker','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XE', 'description' => 'Schneider - NSX 100F-DG_Megnatic Contractor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W SA', 'description' => 'Helicord SGX 280 - DG_Fan Belt','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W UD', 'description' => 'Fuel Line 5/16 in- DG_Fuel Hose','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W VK', 'description' => 'Lovato 12V/5A- DG_Static Charger','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BP', 'description' => 'DSE 12V/5A-
        DG_Static Charger','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W TK', 'description' => 'SDMO-DG_Self Motor - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W UE', 'description' => 'ASCOT-DG_Self Motor - 40KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W PS', 'description' => 'CAT-DG_Self Motor
        - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X AN', 'description' => 'Cummins - ES43D5- DG_Self Motor - 43KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YE', 'description' => 'Cummins - C33D- DG_Self Motor - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W TB', 'description' => 'CUMMINS Upper water elbow - 43KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XU', 'description' => 'CUMMINS Lower water elbow - 43KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XG', 'description' => 'CAT Upper Water Elbow - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W QL', 'description' => 'CAT Lower Water Elbow - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W WR', 'description' => 'SDMO Upper water Elbow - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W PD', 'description' => 'SDMO Lower water Elbow - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W WB', 'description' => 'CAT-3T5760-
        DG_CAT Batteries','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RS', 'description' => 'DSE 7320-
        DG_Control Unit','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W SS', 'description' => 'Cummins - ES43D5- DG_Lift Pump','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W SP', 'description' => 'GE CL03 4P -
        DG_Megnatic
        Contractor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W VX', 'description' => 'GE CL05 4P -
        DG_Megnatic
        Contractor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X DG', 'description' => 'Lovato 4PBf50.40 120/60-
        LO V 11BF504012060-
        D G M egnatic C ontractor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W QM', 'description' => 'Mec LS 100A/4P- DG_Megnatic Contractor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W QA', 'description' => 'Siemens - 3RT1344- 1A-DG_Megnatic Contractor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W TC', 'description' => 'ASCOT-
        DG_Dynamo -
        40KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YH', 'description' => 'Cummins- DG_Dynamo - 43KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X AF', 'description' => 'CAT-DG_Dynamo - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W PU', 'description' => 'Perkins-DG_Dynamo
        - 30KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BJ', 'description' => 'SDMO-DG_Dynamo
        - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BS', 'description' => 'Surge device- DG_Protection','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RD', 'description' => 'GE B25 EP453-
        DG_Circuit Breaker','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W SM', 'description' => 'Auxilary points- DG_Megnatic Contractor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YM', 'description' => 'Ascot-DG_Oil Sensor
        - 40KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XC', 'description' => 'CAT-DG_Oil Sensor - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W VB', 'description' => 'Cummins-DG_Oil Sensor - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W NX', 'description' => 'SDMO-DG_Oil
        Sensor - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XB', 'description' => 'Perkins-DG_Oil Sensor - 30KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W UM', 'description' => 'fuse 32A 500V~- DG_Protection','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BR', 'description' => 'Emergency Stop with base-DG_Buttons','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W QE', 'description' => 'DC 6mm/1C - DG_Cable','uom'=>'Mtr' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W TN', 'description' => 'ASCOT-DG_Temp.
        Sensor - 40KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W PH', 'description' => 'Cummins-DG_Temp. Sensor - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W WW', 'description' => 'CAT-DG_Temp. Sensor - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W QR', 'description' => 'SDMO-DG_Temp. Sensor - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YF', 'description' => 'MCCB - 100A/3P','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BM', 'description' => 'MCCB - 63A/3P','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W NM', 'description' => 'Cummins fuel Solenoid- DG_Actuator','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W TL', 'description' => 'Schnider - EZC100F - 60A-DG_Circuit Breaker','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W WT', 'description' => 'Olympian- DG_Control Unit','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W NS', 'description' => 'PowerCommand- DG_Control Unit','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RM', 'description' => 'Teleyis-DG_Control Unit - SDMO','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XQ', 'description' => 'SDMO J33 Lift Pump- DG_Lift Pump','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BG', 'description' => 'Perkins 30KVA- DG_Lift Pump','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YC', 'description' => 'Cummins Water Pump-DG_Water Pump - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W UU', 'description' => 'Radiator Cap Cover- DG_Radiator - 43KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W SG', 'description' => 'Radiator Cap Cover- DG_Radiator - 30KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W PM', 'description' => 'Radiator Cap Cover- DG_Radiator - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W QY', 'description' => 'Radiator Cap Cover- DG_Radiator - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YU', 'description' => 'Radiator Mount Kit- DG_Radiator - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RV', 'description' => 'Radiator Mount Kit- DG_Radiator - 33KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YX', 'description' => 'Radiator Mount Kit- DG_Radiator - 43KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W SF', 'description' => 'Governer Control Unit-DG_Governer Control - 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W SQ', 'description' => 'AVR Card-ASCOT- 40 KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RG', 'description' => 'AVR Card-ASCOT- 20 KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W VT', 'description' => 'AVR Card-SDMO-44 KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W UG', 'description' => 'AVR Card-SDMO-33 KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RY', 'description' => 'AVR Card-SDMO-22 KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W WL', 'description' => 'AVR Card-CAT-135 KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X AA', 'description' => 'Magnetic Pickup Sensor-CAT-135 KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W UK', 'description' => 'Battery Cable-36mm
        /Standard pair','uom'=>'Mtr' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W NY', 'description' => 'Ameter -DG_ATS','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W PW', 'description' => 'Ameter selector','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RK', 'description' => 'Voltameter-DG_ATS Selector','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RF', 'description' => 'Voltameter selector- DG_ATS','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W NJ', 'description' => 'HZ Reader-DG_ATS','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XY', 'description' => 'HZ Reader selector- DG_ATS','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RW', 'description' => 'Rosette 2mm','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W YS', 'description' => 'Rosette 25mm','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XN', 'description' => 'Current Transformer 50/5','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W XH', 'description' => 'ATS Rubber sealing','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W UN', 'description' => 'Fuel Tank Valve','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W TY', 'description' => 'ASCOT lift pump','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W VU', 'description' => 'CAT Tempreture Sensor','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X CA', 'description' => 'Supply ofA TS Panel_C A T 135_A TS panelofC apacity of 100A','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X BV', 'description' => 'CAT Fuel Filter Base 135KVA','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288X CU', 'description' => 'H ose Pipe','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => '88288W RT', 'description' => 'ASCOT ATS MAGNITIC CONTACTORs +
        Mechanical Interlock+Auxaliruy','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X CX', 'description' => 'C O W Break airvicum pipe','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X CP', 'description' => 'C A BLE A D JU STER EYE','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288W XW', 'description' => 'Steel Guide Wire- 12mm-Any Available- 12mm','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288W VF', 'description' => 'Break Signal Light for COW','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X AU', 'description' => 'Steel Wire Clamp Joint Lock/Copper 10 mm cable','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288W TX', 'description' => 'Steel Wire Clamp Joint Lock/Copper 12 mm cable','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288W VJ', 'description' => 'COW Motor 1.5 KVA/2 HP','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X CT', 'description' => 'Steelw ire C lam p U Lock 10 m m cable','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X BX', 'description' => 'Steel wire Clamp U Lock 12 mm cable','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X BY', 'description' => 'SteelG uide W ire- 10m m','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X CM', 'description' => 'D -SH A K EL (2T)','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X CN', 'description' => 'D -SH A K EL (3T)','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => '88288X CR', 'description' => 'C O W Tyre Size 825/15','uom'=>'Pcs' ],
        ['old_bom' =>'OSP' , 'new_bom' => '88288X CF', 'description' => 'H andhole N on- Standard,internal dim ensions675 (L)x 675(W )x 950(H )m m w ith BS EN 124 B125
        G R P cover','uom'=>'Pcs' ],
        ['old_bom' =>'OSP' , 'new_bom' => '88288X CQ', 'description' => 'Supply & Instal BS EN 124 B125 G R P
        H and H ole C overw ith dim ensions800(L)x 800(W )m m [apairof B125 C oversfor Standard H and H ole)]','uom'=>'Pcs' ],
        ['old_bom' =>'OSP' , 'new_bom' => '88288X CH', 'description' => 'Supply & Instal BS EN 124 D 40 G R P
        H and H ole C overw ith dim ensions800(L)x 800(W )m m [apairof D 40 C oversfor Standard H and H ole)]','uom'=>'Pcs' ],
        ['old_bom' =>'OSP' , 'new_bom' => '88288X BW', 'description' => 'Handhole 2 cover in situ with internal dimensions 1600(L) x 800(W) x 1280(H)
        mm for straight & branch joints OFC without Cover','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W NW', 'description' => 'earth cables, 50mm','uom'=>'Mtr' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W QH', 'description' => 'earth cables, 35mm','uom'=>'Mtr' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W SE', 'description' => 'earth cables, 16mm','uom'=>'Mtr' ],
        ['old_bom' =>'FM' , 'new_bom' => '88288W TG', 'description' => 'Earth Bar','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200122', 'description' => 'COW Tower Lifting Pully','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200123', 'description' => 'COW Tower Section ','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200124', 'description' => 'Tower Mount Pole for MW Antenna','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200125', 'description' => 'Tower Mount Pole for RF Antenna','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200126', 'description' => 'Remote Control for COW','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200127', 'description' => 'Steel Leg or plate  for COW','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200128', 'description' => 'Roof Steel Sheet for COW Cage','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => 'PI200134', 'description' => 'DG controller DSE 4520','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => 'PI200135', 'description' => 'CAT DC Fuel solenoid','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200129', 'description' => 'Stainless Steel Guide W ire- 8mm','uom'=>'Mtr' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200130', 'description' => 'Steelw ire C lam p U Lock 8 m m cable','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200131', 'description' => 'Mast Locking Clamps','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200132', 'description' => 'COW Gear box','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200133', 'description' => 'Signal Reflector Sticker','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => 'PI200136', 'description' => 'ACDelco 12V 55AH (Dry Battery)','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => 'PI200137', 'description' => 'SDMO-DG_Self Motor - 44KVA','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200138', 'description' => 'Surge arrester/Earth Tower Rod','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200139', 'description' => 'Cable Lugs for earth cables, 50mm','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200140', 'description' => 'Cable Lugs for earth cables, 35mm','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200141', 'description' => 'Cable Lugs for earth cables, 16mm','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200142', 'description' => 'Batteries For IBS Sites 40AH/12V(197x165x170)','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200143', 'description' => 'CP Meter Box Glass','uom'=>'Pcs' ],
        ['old_bom' =>'Smart Locks' , 'new_bom' => 'PI200144', 'description' => 'PL5 (PADLOOK)','uom'=>'Pcs' ],
        ['old_bom' =>'Smart Locks' , 'new_bom' => 'PI200145', 'description' => 'AK 208 (AKEY BLE)','uom'=>'Pcs' ],
        ['old_bom' =>'Smart Locks' , 'new_bom' => 'PI200146', 'description' => 'AK 202 (AKEY KEYPAD)','uom'=>'Pcs' ],
        ['old_bom' =>'Smart Locks' , 'new_bom' => 'PI200147', 'description' => 'AK 301 (AKEY TRANSFER)','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'BTY-6-FMX-190', 'description' => '12 V 190Ah','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'BTY-FTA12-190', 'description' => '12 V 190Ah','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'BTY-FTB12-100', 'description' => '12 V 100Ah','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200148', 'description' => 'COW Tyre Size (215/75R17.5)','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200149', 'description' => 'COW Tyre Size (8.25R16LT) ','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200150', 'description' => 'COW Tyre Size (8.25R15 TR)','uom'=>'Pcs' ],
        ['old_bom' =>' COW' , 'new_bom' => 'PI200151', 'description' => 'COW Tyre Size(7.00R16)','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200152', 'description' => 'COW Tyre Size(7.50R16)','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200153', 'description' => 'COW Tyre Size (215/70R17.5)','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200154', 'description' => 'ODF Adopter LC','uom'=>'Pcs' ],
        ['old_bom' =>'OSP' , 'new_bom' => 'PI200155', 'description' => 'ODF Adopter E2000','uom'=>'Pcs' ],
        ['old_bom' =>'OSP' , 'new_bom' => 'PI200156', 'description' => 'ODF Panel 48 Ports','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200157', 'description' => 'Metallic Chain for gate lock  (50cm metalic)','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => 'PI200158', 'description' => 'Lovato BF60 40 Magnetic Contactor','uom'=>'Pcs' ],
        ['old_bom' =>'FM' , 'new_bom' => 'PI200159', 'description' => 'Site ID Yellow Sticker','uom'=>'Pcs' ],
        ['old_bom' =>'OSP' , 'new_bom' => 'PI200160 ', 'description' => 'Supply of 72F SM Double sheath single armored outdoor cable (Ooredoo spec)','uom'=>'Mtr' ],
        ['old_bom' =>'DG' , 'new_bom' => 'PI200161', 'description' => 'AVR Card-ASCOT- 15 KVA SR7 Mecc Alte ','uom'=>'Pcs' ],
        ['old_bom' =>'DG' , 'new_bom' => 'PI200162', 'description' => 'visible Fuel hoses for external fuel tank fuel level measurment ','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200163', 'description' => 'Feeder Cable Coaxial(7/8 Copper)','uom'=>'Mtr' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200164', 'description' => 'N-Connector for Feeder','uom'=>'Pcs' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200165', 'description' => 'Feeder Cable Coaxial (7/8 Aluminum)','uom'=>'Mtr' ],
        ['old_bom' =>'COW' , 'new_bom' => 'PI200166', 'description' => 'N-Connector for Feeder  (7/8 Aluminum)','uom'=>'Pcs' ]

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (\DB::table('passive_spares')->count() > 0) {
            return;
        }

        \DB::table('passive_spares')->insert($this->spares);
    }
}
