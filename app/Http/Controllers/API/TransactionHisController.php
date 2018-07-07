<?php

namespace BCES\Http\Controllers\API;

use BCES\Models\User;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class TransactionHisController extends Controller
{
    public function btc_transaction()
    {
        $Address = User::find(1)->icos()->whereType('bitcoin')->whereActive(1)->first();
        $InvestorAddress = \Auth::user()->icos()->whereType('bitcoin')->first();
        $id = \Auth::user()->icos()->whereActive(1)->first();

        $data = file_get_contents('https://api.blockcypher.com/v1/btc/main/addrs/' . $Address->address . '/full?limit=50');
        $decode = json_decode($data, true);
print_r($decode);

        $a = 0;
        $associativeArray = array();
        $address = array();
        $balance = array();
        $time = array();

        foreach ($decode['txs'] as $row) {

            $address[$a] = $row['inputs'][0]['addresses'][0];
            $balance[$a] = $row['inputs'][0]['output_value'];
            $time[$a] = $row['inputs'][0]['age'];
            $a++;
        }

        $associativeArray = array('address' => $address, 'balance' => $balance, 'time' => $time);
        $cnt = 0;
        $counter = 0;
        $fdata = array();

        foreach ($associativeArray['address'] as $row) {   //$this->session->userdata('Transactionaddress') ::::::::::::::::::::address of wallet used for transaction

            if ($InvestorAddress->address == $row) {
                //$btc=$btc/100000000;
                $crypto = 'BITCOIN';
                $cnt++;
                $fdata[] = array('address' => $row, 'balance' => $associativeArray['balance'][$counter], 'time' => $associativeArray['time'][$counter], 'crypto' => $crypto);



            }
            $counter++;

        }
        echo 'found ' . $cnt . ' times';

        foreach ($fdata as $row) {


            $address = $row['address'];
            $balance = $row['balance'];
            $cryptoname = $row['crypto'];
            $time = $row['time'];

            \Auth::user()->history()->create([
                'user_id' => $id,
                'address' => $address,
                'currency' => $cryptoname,
                'balance' => $balance,
                'unique_value' => $time
            ]);
        }


    }


    public function ltc_transaction()
    {  $Address = User::find(1)->icos()->whereType('litecoin')->whereActive(1)->first();
        $InvestorAddress = \Auth::user()->icos()->whereType('litecoin')->first();
        $id = \Auth::user()->icos()->whereActive(1)->first();

        $data=file_get_contents('https://api.blockcypher.com/v1/ltc/main/addrs/' . $Address->address . '/full?limit=50');
        $decode=json_decode($data, true);
        print_r($decode);

        $a=0;
        $associativeArray=array();
        $address = array();
        $balance = array();

        $time = array();
        //echo(sizeof($decode));
        foreach($decode['txs'] as $row)
        {

            $address[$a]= $row['inputs'][0]['addresses'][0];
            $balance[$a]= $row['inputs'][0]['output_value'];
            $time[$a]= $row['inputs'][0]['age'];
            $a++;
        }
        $associativeArray = array('address' => $address, 'balance' => $balance, 'time' => $time);

        $cnt=0;
        $counter=0;
        $fdata=array();

        foreach($associativeArray['address'] as $row)
        { //$this->session->userdata('Transactionaddress') ::::::::::::::::::::address of wallet used for transaction
            if($InvestorAddress->address ==$row)
            {

                $crypto='LITECOIN';
                $cnt++;
                $fdata[] = array('address' => $row, 'balance' => $associativeArray['balance'][$counter],'time' => $associativeArray['time'][$counter], 'crypto' => $crypto);

            }
            $counter++;

        }
        echo'found '.$cnt.' times';


        foreach ($fdata as $row) {


            $address = $row['address'];
            $balance = $row['balance'];
            $cryptoname = $row['crypto'];
            $time = $row['time'];

            \Auth::user()->history()->create([
                'user_id' => $id,
                'address' => $address,
                'currency' => $cryptoname,
                'balance' => $balance,
                'unique_value' => $time
            ]);
        }



    }


    public function dash_transaction()
    {  $Address = User::find(1)->icos()->whereType('dash')->whereActive(1)->first();
        $InvestorAddress = \Auth::user()->icos()->whereType('dash')->first();
        $id = \Auth::user()->icos()->whereActive(1)->first();

        $data=file_get_contents('https://api.blockcypher.com/v1/dash/main/addrs/' . $Address->address . '/full?limit=50');
        $decode=json_decode($data, true);

        print_r($decode);
        $a=0;
        $associativeArray=array();
        $address = array();
        $balance = array();

        $time = array();
        //echo(sizeof($decode));
        foreach($decode['txs'] as $row)
        {

            $address[$a]= $row['inputs'][0]['addresses'][0];
            $balance[$a]= $row['inputs'][0]['output_value'];
            $time[$a]= $row['inputs'][0]['age'];
            $a++;
        }
        $associativeArray = array('address' => $address, 'balance' => $balance, 'time' => $time);

        $cnt=0;
        $counter=0;
        $fdata=array();

        foreach($associativeArray['address'] as $row)
        { //$this->session->userdata('Transactionaddress') ::::::::::::::::::::address of wallet used for transaction
            if($InvestorAddress->address ==$row)
            {

                $crypto='DASHCOIN';
                $cnt++;
                $fdata[] = array('address' => $row, 'balance' => $associativeArray['balance'][$counter],'time' => $associativeArray['time'][$counter], 'crypto' => $crypto);

            }
            $counter++;

        }
        echo'found '.$cnt.' times';


        foreach ($fdata as $row) {


            $address = $row['address'];
            $balance = $row['balance'];
            $cryptoname = $row['crypto'];
            $time = $row['time'];

            \Auth::user()->history()->create([
                'user_id' => $id,
                'address' => $address,
                'currency' => $cryptoname,
                'balance' => $balance,
                'unique_value' => $time
            ]);
        }



    }




    public function eth_transaction()
    {
        $Address = User::find(1)->icos()->whereType('ethereum')->whereActive(1)->first();
        $InvestorAddress = \Auth::user()->icos()->whereType('ethereum')->first();
        $id = \Auth::user()->icos()->whereActive(1)->first();

        $data = file_get_contents('https://api.ethplorer.io/getAddressTransactions/'. $Address->address .'?apiKey=freekey');
        $decode = json_decode($data, true);
        echo '<pre>';
        print_r($decode);


        $associativeArray = array();
        $address = array();
        $balance = array();
        $fdata = array();
        $a = 0;

        for ($i = 0; $i < sizeof($decode); $i++) {
            if ($decode[$i]['from'] == $InvestorAddress->address) {

                $crypto = "ETHEREUM";
                $fdata[] = array('address' => $decode[$i]['from'], 'balance' => $decode[$i]['value'], 'time' => $decode[$i]['timestamp'], 'crypto' => $crypto);
                //$this->ion_auth_model->addressbalance_info($fdata, $crypto);

            }


          //  echo json_encode($fdata);




        }
        print_r($fdata);
        foreach ($fdata as $row) {


            $address = $row['address'];
            $balance = $row['balance'];
            $cryptoname = $row['crypto'];
            $time = $row['time'];

            \Auth::user()->history()->create([
                'user_id' => $id,
                'address' => $address,
                'currency' => $cryptoname,
                'balance' => $balance,
                'unique_value' => $time
            ]);
        }

    }


}