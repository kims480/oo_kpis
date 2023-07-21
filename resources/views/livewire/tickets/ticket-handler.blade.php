<div class=" flex flex-col w-full py-4 px-4">

    <div class=" flex  flex-wrap flex-row  items-stretch content-between gap-4 pb-6">
        <div class=" flex flex-nowrap ">
            <div>
                <p class="py-1 rounded-l-lg w-32  bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.tt_number') }}</p>
            </div>
            <div>
                <p class="py-1 rounded-r-lg min-w-[11.5rem] bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->tt_number }}</p>
            </div>
        </div>
        <div class=" flex flex-nowrap ">

            <div>
                <p class="rounded-l-lg py-1 w-32 bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.site_id') }}</p>
            </div>
            <div>
                <p class="rounded-r-lg min-w-[11.5rem] py-1   bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->site->site_id }}</p>
            </div>
        </div>
        <div class=" flex flex-nowrap ">
            <div>
                <p class="rounded-l-lg py-1 w-32  bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.alarm_name') }}</p>
            </div>
            <div>
                <p class="rounded-r-lg min-w-[11.5rem] py-1  bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->alarm->name }}</p>
            </div>
        </div>
        <div class=" flex flex-nowrap ">
            <div>
                <p class="rounded-l-lg py-1 w-32  bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.description') }}</p>
            </div>
            <div>
                <p class="rounded-r-lg min-w-[11.5rem] py-1  bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->description }}</p>
            </div>
        </div>
        <div class=" flex flex-nowrap ">
            <div>
                <p class="rounded-l-lg py-1 w-32  bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.categ') }}</p>
            </div>
            <div>
                <p class="rounded-r-lg min-w-[11.5rem] py-1  bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->tt_categ->name }}</p>
            </div>
        </div>
        <div class=" flex flex-nowrap ">
            <div>
                <p class="rounded-l-lg py-1 w-32  bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.contractor') }}</p>
            </div>
            <div>
                <p class="rounded-r-lg min-w-[11.5rem] py-1   bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->tt_contractor->name }}</p>
            </div>
        </div>
        <div class=" flex flex-nowrap ">
            <div>
                <p class="rounded-l-lg py-1 w-32 bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.scope') }}</p>
            </div>
            <div>
                <p class="rounded-r-lg min-w-[11.5rem] py-1  bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->tt_scope->name }}</p>
            </div>
        </div>
        <div class=" flex flex-nowrap ">
            <div>
                <p class="rounded-l-lg py-1 w-32 bg-slate-500 text-white text-right px-2">
                    {{ __('models/tickets.fields.created_at') }}</p>
            </div>
            <div>
                <p class="rounded-r-lg min-w-[11.5rem] py-1  bg-slate-200 text-slate-900 text-left  px-2">
                    {{ $ticket->created_at }}</p>
            </div>
        </div>
    </div>

    <div class="w-full self-center bg-white py-1 "></div>

    <!-- TT Update -->
    <div class="flex flex-col w-full  pt-4">
        <div class="flex flex-col">
            <label for="tt_update" class="font-bold">Update TT : </label>
            <textarea name="tt_update" class="bg-slate-50 border-green-900 text-sky-900 focus:text-sky-800" cols="30" rows="3"></textarea>
        </div>
        <div class="flex mt-4 content-end justify-end">
            <button class="p-2 transition bg-green-300 text-green-900 hover:font-bold hover:bg-green-700 hover:text-white"> Update
            </button>
        </div>
    </div>


</div>
