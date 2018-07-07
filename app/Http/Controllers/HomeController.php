<?php

namespace BCES\Http\Controllers;

use BCES\Concerns\ICOBasic;
use BCES\Models\ICO;
use BCES\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ICOBasic;

    /**
     * Load home page with basic data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $settings = \BCES\Models\Setting::all();

        return view('welcome', array_merge($this->getICOData(), compact('settings')));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = ICO::whereIn('type', ['bitcoin', 'ethereum'])->whereActive(1)->get();

        $bitcoin = $tokens->where('type', 'bitcoin')->first();
        $ethereum = $tokens->where('type', 'ethereum')->first();

        return view('home', compact('bitcoin', 'ethereum'));
    }

    public function btc()
    {
        $address = User::find(1)->icos()->whereType('bitcoin')->whereActive(1)->first();
        $btc = file_get_contents('https://blockchain.info/de/q/addressbalance/' . $address->address);
        $btc = $btc / 100000000;
        return $btc;
    }

    public function btc_eth(Request $request)
    {
        $btc = $request->eth;

        $btc_eth = file_get_contents("http://testing12.gear.host/api/converter?from=BTC&to=ETH&amount=$btc");

        $btc_eth = preg_replace('/[^a-zA-Z0-9_.]/', '', $btc_eth);
        return $btc_eth;
    }

    public function ltc()
    {
        $address = User::find(1)->icos()->whereType('litecoin')->whereActive(1)->first();
        $data = file_get_contents('https://api.blockcypher.com/v1/ltc/main/addrs/' . $address->address . '/full?limit=50');
        $encode = json_decode($data);
        $ltc = $encode->balance;
        $ltc = $ltc / 100000000;

        return $ltc;
    }

    public function ltc_eth(Request $request)
    {
        $ltc = $request->eth;
        $ltc_eth = file_get_contents("http://testing12.gear.host/api/converter?from=LTC&to=ETH&amount=$ltc");
        $ltc_eth = preg_replace('/[^a-zA-Z0-9_.]/', '', $ltc_eth);
        return $ltc_eth;
    }

    public function dash()
    {
        $address = User::find(1)->icos()->whereType('dash')->whereActive(1)->first();
        $dash = file_get_contents('https://api.blockcypher.com/v1/dash/main/addrs/' . $address->address . '/balance');
        $encode = json_decode($dash);
        $dash = $encode->balance;
        $dash = $dash / 100000000;
        return $dash;
    }

    public function dash_eth(Request $request)
    {
        $dash = $request->eth;
        $dash_eth = file_get_contents("http://testing12.gear.host/api/converter?from=DASH&to=ETH&amount=$dash");
        $dash_eth = preg_replace('/[^a-zA-Z0-9_.]/', '', $dash_eth);
        return $dash_eth;
    }

    public function eth()
    {
        $address = User::find(1)->icos()->whereType('ethereum')->whereActive(1)->first();
        $result = (file_get_contents('https://api.ethplorer.io/getAddressInfo/' . $address->address . '?apiKey=freekey'));
        $json = (json_decode($result, true));
        $eth = $json['ETH']['balance'];

        return $eth;
    }

    public function eth_eth(Request $request)
    {
        $eth = $request->eth;
        // $eth_eth = file_get_contents("http://testing12.gear.host/api/converter?from=ETH&to=USD&amount=$eth");
        // $eth_eth = preg_replace('/[^a-zA-Z0-9_.]/', '', $eth_eth);

        return $eth;
    }
}
