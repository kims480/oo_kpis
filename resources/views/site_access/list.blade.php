<section class="content">
    <div class="w-full ">



        <div id="tablelist_filter" class="w-1/4 dataTables_filter pb-3"><label>Search:<input type="search"
                    class="form-control input-sm" placeholder="" aria-controls="tablelist"></label>
        </div>
        <div id="tablelist_processing" class="dataTables_processing" style="display: none;">Processing...</div>

        <table class=" w-full table-auto mb-2">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <td class="" rowspan="1" colspan="1"></td>
                    <td class="status tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter" id="col1_filter" name="column_filter[]" value=""
                            style="width:98%;">
                    </td>
                    <td class="dca_id tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter" id="col2_filter" name="column_filter[]" value=""
                            style="width:98%;">
                    </td>
                    <td class="dca_id tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter" id="col3_filter" name="column_filter[]" value=""
                            style="width:98%;">
                    </td>
                    <td class="created_by tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter" id="col4_filter" name="column_filter[]" value=""
                            style="width:98%;">
                    </td>
                    <td class="sponser_id tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter" id="col5_filter" name="column_filter[]" value=""
                            style="width:98%;">
                    </td>
                    <td class="work_location_id tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter" id="col6_filter" name="column_filter[]" value=""
                            style="width:98%;">
                    </td>
                    <td class="work_location_rack tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter" id="col7_filter" name="column_filter[]" value=""
                            style="width:98%;">
                    </td>
                    <td class="work_location_rack tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter   datepicker_norestriction" id="col8_filter" name="column_filter[]"
                            value="" style="width:98%;">
                    </td>
                    <td class="work_location_rack" rowspan="1" colspan="1">
                        <input class="column_filter  datepicker_norestriction" id="col9_filter" name="column_filter[]"
                            value="" style="width:98%;">
                    </td>
                    <td class="work_location_rack tooltipstered" rowspan="1" colspan="1">
                        <input class="column_filter  datepicker_norestriction" id="col10_filter" name="column_filter[]"
                            value="" style="width:98%;">
                    </td>
                </tr>
                <tr class="bg-gray-700 text-slate-50 uppercase text-sm leading-normal">
                    <th width="1%" class="no-sort sorting_asc" data-column-index="0" rowspan="1" colspan="1"
                        style="width: 12.2px; cursor: pointer;"
                        aria-label="

                                                                    ">
                        <input class="simple" type="checkbox" id="chkboxselectall"><label
                            for="chkboxselectall"><span></span></label>
                    </th>
                    <th width="5%" class="status sorting" data-column-index="1" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1"
                        style="width: 41.2px; cursor: pointer;"
                        aria-label="Status: activate to sort column ascending">Status</th>
                    <th width="11%" class="sar_id sorting" data-column-index="2" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1"
                        style="width: 129.2px; cursor: pointer;" aria-label="ID: activate to sort column ascending">ID
                    </th>
                    <th width="10%" class="created_by sorting" data-column-index="3" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1"
                        style="width: 114.2px; cursor: pointer;"
                        aria-label="Requester: activate to sort column ascending">Requester</th>
                    <th width="4%" class="sponser_id sorting" data-column-index="4" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1" style="width: 26.2px;"
                        aria-label="Region: activate to sort column ascending">Region</th>
                    <th width="6%" class="work_location_id sorting" data-column-index="5" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1" style="width: 55.2px;"
                        aria-label="Site: activate to sort column ascending">Site
                    </th>
                    <th width="7%" class="work_location_room sorting" data-column-index="6" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1" style="width: 70.2px;"
                        aria-label="Work: activate to sort column ascending">Work
                    </th>
                    <th width="15%" class="work_location_room sorting" data-column-index="7" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1"
                        style="width: 187.2px; cursor: pointer;"
                        aria-label="Description: activate to sort column ascending">Description</th>
                    <th width="22%" class="work_location_rack sorting" data-column-index="8" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1"
                        style="width: 290.2px; cursor: pointer;"
                        aria-label="Duration: activate to sort column ascending">Duration</th>
                    <th width="10%" class="sar_id sorting" data-column-index="9" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1" style="width: 114.2px;"
                        aria-label="CheckIn: activate to sort column ascending">CheckIn</th>
                    <th width="10%" class="sar_id sorting" data-column-index="10" tabindex="0"
                        aria-controls="tablelist" rowspan="1" colspan="1" style="width: 100px;"
                        aria-label="CheckOut: activate to sort column ascending">CheckOut</th>
                </tr>
            </thead>

            <tbody>
                <tr role="row" class="odd">
                    <td class="sorting_1"><input name="ids[]" value="104029" class="simple" type="checkbox"
                            id="104029"><label for="104029"><span></span></label>
                    </td>
                    <td>
                        <div class="status"><a class="badge bg-orange" title="Pending">P</a>
                            <b>ending</b>
                        </div>
                    </td>
                    <td><a href="siteaccessmanage.php?id=104029" title="SAR-20230718-104029">SAR-20230718-104029</a>
                    </td>
                    <td><span title="Jahangir Khan ">
                            Jahangir Khan </span></td>
                    <td>Northern Oman</td>
                    <td>BA1287</td>
                    <td>CR</td>
                    <td>New ATN installation </td>
                    <td>19/Jul/2023 08:00 AM To 19/Jul/2023 08:00 PM</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr role="row" class="even">
                    <td class="sorting_1"><input name="ids[]" value="104028" class="simple" type="checkbox"
                            id="104028"><label for="104028"><span></span></label>
                    </td>
                    <td>
                        <div class="status"><a class="badge bg-orange" title="Pending">P</a>
                            <b>ending</b>
                        </div>
                    </td>
                    <td><a href="siteaccessmanage.php?id=104028" title="SAR-20230718-104028">SAR-20230718-104028</a>
                    </td>
                    <td><span title="Arbab Uddin ">
                            Arbab Uddin </span></td>
                    <td>Northern Oman</td>
                    <td>MU0393</td>
                    <td>Site Survey</td>
                    <td>Site relocation survey</td>
                    <td>19/Jul/2023 08:30 AM To 19/Jul/2023 05:30 PM</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>
                <tr role="row" class="odd">
                    <td class="sorting_1"><input name="ids[]" value="104027" class="simple" type="checkbox"
                            id="104027"><label for="104027"><span></span></label>
                    </td>
                    <td>
                        <div class="status"><a class="badge bg-orange" title="Pending">P</a>
                            <b>ending</b>
                        </div>
                    </td>
                    <td><a href="siteaccessmanage.php?id=104027" title="SAR-20230718-104027">SAR-20230718-104027</a>
                    </td>
                    <td><span title="Rameshwar D Rajpoot">
                            Rameshwar D Rajpoot</span></td>
                    <td>Southern Oman</td>
                    <td>SH0084</td>
                    <td>CR</td>
                    <td>New installation and alignment between SH0084-WU0802 NTK Site</td>
                    <td>19/Jul/2023 07:00 AM To 20/Jul/2023 06:00 PM</td>
                    <td>N/A</td>
                    <td>N/A</td>
                </tr>


                <input type="hidden" id="hdnBtnAction" name="btnaction" value="">
            </tbody>
        </table>


    </div>

</section>
