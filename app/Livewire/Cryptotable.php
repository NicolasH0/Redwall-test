<?php

namespace App\Livewire;

use App\Http\Controllers\CoinGeckoController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Cryptotable extends Component
{
    public $result = [];

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        $coinGeckoController = new CoinGeckoController();
        $this->result = $coinGeckoController->getCoingeckoData();

        return view('livewire.cryptotable', ['$result' => $this->result]);
    }
}
