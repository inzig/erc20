<?php

use BCES\Models\User;


/**
 * Dump the passed variables and end the script.
 *
 * @return void
 */
function d()
{
    array_map(function ($x) {
        (new \Illuminate\Support\Debug\Dumper)->dump($x);
    }, func_get_args());
}


function usdRaised()
{
    $icos = User::find(1)->icos;

    $ethereum = $icos->where('type', 'ethereum')->first();
    $bitcoin= $icos->where('type', 'bitcoin')->first();
    $litecoin = $icos->where('type', 'litecoin')->first();
    $dashcoin = $icos->where('type', 'dashcoin')->first();

    $total_usd=$ethereum->usd+$bitcoin->usd+$litecoin->usd+$dashcoin->usd;
    return $total_usd;
}

function bneRaised()
{
    $icos = User::find(1)->icos;

    $ethereum = $icos->where('type', 'ethereum')->first();
    $bitcoin= $icos->where('type', 'bitcoin')->first();
    $litecoin = $icos->where('type', 'litecoin')->first();
    $dashcoin = $icos->where('type', 'dashcoin')->first();

    $total_usd=$ethereum->usd+$bitcoin->usd+$litecoin->usd+$dashcoin->usd;

    $usd_eth=file_get_contents("http://testing12.gear.host/api/converter?from=USD&to=ETH&amount=$total_usd");
    $usd_eth = preg_replace('/[^a-zA-Z0-9_.]/', '', $usd_eth);
    $bne=$usd_eth *3000 ;              //      1 ETH==3000 BNE
    return $bne;
}

