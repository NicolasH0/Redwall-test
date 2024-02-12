<style>
    .dataTables_scrollHeadInner {
        padding-left: 0;
    }
    .dataTables_filter input {
        margin-left: 1em;
    }
</style>
<div class="px-4 sm:px-6 lg:px-8">
    <div class="mt-8 flex flex-col">
        <div
            x-data="{ stick: false}"
            @scroll.window="stick = (window.pageYOffset > 31) ? true : false"
            :class="{'overflow-x-auto': stick === false}"
            class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8"
        >
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div
                    class="shadow ring-1 ring-black ring-opacity-5 md:rounded-lg"
                    :class="{'overflow-hidden': stick === false}"
                >
                    <table id="example" class="min-w-full divide-y divide-gray-300">
                        <thead
                            class="bg-indigo-500"
                            :class="{'sticky top-0': stick === true}"
                        >
                        <tr>
                            <th style="cursor:pointer;" scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6" >Logo</th>
                            <th style="cursor:pointer;" scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Name</th>
                            <th style="cursor:pointer;" scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Symbol</th>
                            <th style="cursor:pointer;" scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Price</th>
                            <th style="cursor:pointer;" scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Market cap</th>
                            <th style="cursor:pointer;" scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white"></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-indigo-200 bg-white">
                        @foreach($result as $res)
                        <tr style="cursor: pointer" x-data="{ show: false }">
                            <td class="whitespace-nowrap bg-indigo-100 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <img src="{{$res->image}}" alt="" width="40" height="40">
                            </td>
                            <td class="whitespace-nowrap bg-indigo-100 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$res->name}}</td>
                            <td class="whitespace-nowrap bg-indigo-100 px-3 py-4 text-sm text-gray-500">{{$res->symbol}}</td>
                            <td class="whitespace-nowrap bg-indigo-100 px-3 py-4 text-sm text-gray-500">{{round($res->current_price,2)}} $</td>
                            <td class="whitespace-nowrap bg-indigo-100 px-3 py-4 text-sm text-gray-500">{{$res->market_cap}}</td>
                            <td class="whitespace-nowrap bg-indigo-100 px-3 py-4 text-sm text-gray-500">
                                <div x-data="{ showModal: false }">
                                    <!-- Button to open the modal -->
                                    <button @click="showModal = true" class="w-full px-4 py-2 text-sm text-white font-medium text-white bg-red-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-red-500"> More</button>
                                    <!-- Background overlay -->
                                    <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showModal = false">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                    <!-- Modal -->
                                    <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
                                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                            <!-- Modal panel -->
                                            <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <!-- Modal content -->
                                                    <div class="sm:flex sm:items-start">
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <span class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">More info on {{$res->name}}</span>
                                                            <img src="{{$res->image}}" style="display: initial"  class="ml-4" height="40" width="40" alt="">
                                                            <div class="mt-2">
                                                                <div>
                                                                    <span><b>Name: </b>{{$res->name}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Symbol: </b>{{$res->symbol}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Current price: </b>{{round($res->current_price,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Market cap: </b>{{$res->market_cap}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Market cap rank:</b> {{$res->market_cap_rank}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Fully diluted valuation:</b> {{$res->fully_diluted_valuation}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Total volume: </b>{{$res->total_volume}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Highest value (Last 24H): </b>{{round($res->high_24h,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Lowest value (Last 24H):</b> {{round($res->low_24h,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Price change (Last 24H):</b> {{round($res->price_change_24h,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Price change % (Last 24H):</b> {{round($res->price_change_percentage_24h,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Market cap change (Last 24H):</b> {{round($res->market_cap_change_24h,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Market cap change % (Last 24H):</b> {{round($res->market_cap_change_percentage_24h,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Circulation supply:</b> {{round($res->circulating_supply,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Total supply:</b> {{$res->total_supply}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>Max supply:</b> {{$res->max_supply}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>ATH: </b>{{round($res->ath,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>ATH change %: </b>{{round($res->ath_change_percentage,2)}}</span>
                                                                </div>
                                                                <div>
                                                                    <span><b>ALT: </b>{{round($res->atl,2)}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> Close </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Create search header
    var new_row = $("<tr class='search-header'/>");``

    $('#example thead').prepend(new_row);

    // Init DataTable
    var table = $('#example').DataTable({
        "scrollX": true,
        "searching": true,
        "paging":   false,
        "info":     false
    });

    // Filter event handler
    $( table.table().container() ).on( 'keyup', 'thead input', function () {
        table
            .column( $(this).data('index') )
            .search( this.value )
            .draw();
    });
</script>
