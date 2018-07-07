<?php

use Illuminate\Database\Seeder;

class RoadmapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\Roadmap::create([
            'year' => 'Q1 2018',
            'title' => 'Heading 1',
            'description_en' => 'Launching the token pre-sale.<br/>Launch of token crowdsale (ICO) and listing on a top exchange.',
        ]);


        \BCES\Models\Roadmap::create([
            'year' => 'Q2 2018',
            'title' => 'Heading 1',
            'description_en' => 'Release of BARTVault features to enable art owners to register and upload art.',
        ]);


        \BCES\Models\Roadmap::create([
            'year' => 'Q3 2018',
            'title' => 'Heading 1',
            'description_en' => 'Release of Beta BART/APIs for partner services network- Print, Photo labs, Framing, Storage services. Implementing the mechanisms of arbitration.',
        ]);


        \BCES\Models\Roadmap::create([
            'year' => 'Q4 2018',
            'title' => 'Heading 1',
            'description_en' => 'Implementation of additional smart contract features of (a) leasing art for a specific period of time (b) purchasing artwork on an \'installment plan\'. Implementation of community governance mechanisms.',
        ]);


        \BCES\Models\Roadmap::create([
            'year' => 'Q1 2019',
            'title' => 'Heading 1',
            'description_en' => 'Implementation of additional smart contract features: (a) enabling a group of people to own shares in art on a ‘timeshare’ basis (b) implement Shares in Art (SIA) features to Provenir Tokens.',
        ]);

        \BCES\Models\Roadmap::create([
            'year' => 'Q2 2019',
            'title' => 'Heading 1',
            'description_en' => 'Release of Beta of ‘Enhancements Framework’ to our Technology Platform to test transition of appropriate fully decentralized services managed and operated by the BARTVault user community.  ',
        ]);


        \BCES\Models\Roadmap::create([
            'year' => 'Q3 2019',
            'title' => 'Heading 1',
            'description_en' => 'Release of Reputation portability to allow experts / appraisers and other participants to certify their BARTVault reputation to other services using Blockchain technology',
        ]);


        \BCES\Models\Roadmap::create([
            'year' => 'Q4 2019',
            'title' => 'Heading 1',
            'description_en' => 'Mobile Blockchain applications with Decentralized exchanges (subject to successful launch of projects such as EtherDelta, EthFinex, Lykke, OmiseGo, KyberNetwork, VariabL etc.)',
        ]);

    }
}
