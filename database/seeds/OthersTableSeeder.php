<?php

use Illuminate\Database\Seeder;

class OthersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\Other::create([
            'title_en' => 'How can I Participate in the ICO?',
            'description_en' => 'You will need to create an account on Blockchain Art Toujours Platform (BART Platform). You will be able to buy Tokens in the Member Dashboard using multiple payment methods: BTC, ETH, LTC, and DASH.
',
        ]);

        \BCES\Models\Other::create([
            'title_en' => 'Can I send ETH from my Exchange Wallet?',
            'description_en' => '  No! Please DO NOT send Ether from any exchange wallet (such as Coinbase) as you may not be able to receive your tokens. You will lose your tokens forever if you send Ether from an Exchange. The ARISTON tokens are ERC20 compatible tokens thus you shall first ensure that you own an ERC20 compatible Wallet for ARISTON tokens or else you might lose the access to the ARISTON tokens. Both MetaMask and MyEtherWallet are ERC20 compatible as are many others.',
        ]);

        \BCES\Models\Other::create([
            'title_en' => ' Which wallet should I use to store Ariston Tokens?',
            'description_en' => ' Ariston is an ERC20 standard token, so it can be stored in many different Ethereum based wallets. We recommend using MetaMask, MyEtherWallet or Mist. Mist Wallet requires that you run a local node of the Ethereum Blockchain. If you are not technically trained and are not familiar with running an Ethereum Node, it is suggested that you use MetaMask or MyEtherWallet. If you need assistance in creating any of these Wallets, you can visit the following links:
For Metamask: https://metamask.io/ 
For MyEtherWallet: https://www.myetherwallet.com/

There are also many videos on Youtube that can help you understand the Wallet creation process. We do not endorse any specific Video but we have found a variety of them very helpful.

',
        ]);



        \BCES\Models\Other::create([
            'title_en' => 'What if minimum goal is not met?',
            'description_en' => ' If the minimum goal is not met, refunds will be issued via the smart-contract.',
        ]);

        \BCES\Models\Other::create([
            'title_en' => 'Do you have a bounty campaign?',
            'description_en' => 'Yes, 5% of the Ariston Tokens (2.5 Million Ariston) have been allocated to our bounty campaign.',
        ]);



        \BCES\Models\Other::create([
            'title_en' => ' Can USA citizen/resident participate in the Ariston token sale?',
            'description_en' => 'No. USA citizens and residents CAN NOT participate in Ariston token sale. The only exception is accredited investors who participate in the Private Sale. This is due to excessive regulatory risks from SEC (US Security and Exchange Commission). BART ICO team and advisory may receive ARISTON.Tokens as compensation for their work and contribution but cannot participate in Token Sales if they are US Citizens or residents',

        ]);
        \BCES\Models\Other::create([
            'title_en' => 'Which other Countries are restricted?',
            'description_en' => ' People from the following countries CAN NOT participate in the public token sale: United States of America (except for accredited investors participating in Private Sale), People’s Republic of China (except for Hong Kong, Macau and Taiwan), South Korea, North Korea and Japan.',
        ]);

        \BCES\Models\Other::create([
            'title_en' => 'Is ARISTON a Utility Token or Security Token?',
            'description_en' => 'Ariston is the Utility Token based on Ethereum blockchain. It is NOT a Security Token. Token holder will not receive any profit sharing, dividends or equity in the company.
',
        ]);

        \BCES\Models\Other::create([
            'title_en' => 'What is ‘Public Address’ and ‘Private Key?',
            'description_en' => ' Public addresses - such as the “Current Address” displayed on wallet screen in text form (and in most wallets also in both QR and text) - can only be used to receive funds. Public address is what you share with the other party in a transaction. If someone knows the Public Address of your main wallet, they would not be able to remove any funds associated with that address. To remove funds from a wallet, they need the ‘Private Key’ associated with that address. Private keys “sign” the transaction; without that digital signature, the sender can’t “prove” they control the address associated with those funds, and no transaction will take place. 

Unlike public addresses, ‘Private keys’ should NOT be shared with third parties unless you want to grant them access to remove funds (e.g. a family member or trusted friend).If you lose your Private Key and/or Password you will no longer be able to access your wallet and ARISTON tokens and thus you will lose all you tokens permanently.',
        ]);

        \BCES\Models\Other::create([
            'title_en' => 'How can I protect myself from Hackers, Phishers, Spyware and Thieves?',
            'description_en' => ' Our first job is to protect ARISTON Token buyers from scammers. Here are a few tips for our Token Buyers:
Set a ‘bookmark’ to our site. Please TYPE the URL in full and then create the ‘bookmark’. Don’t click on links as the link could be a fake site.',]);


    }
}
