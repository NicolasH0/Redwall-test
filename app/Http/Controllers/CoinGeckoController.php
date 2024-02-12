<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoinGeckoController extends Controller
{
    /**
     * @return mixed
     */
    public function getCoingeckoData()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=eur&order=market_cap_desc&per_page=100&page=1&sparkline=false&locale=en&x_cg_demo_api_key='. env('COINGECKO_API_KEY'));

        return json_decode($response->body());;
    }
}
