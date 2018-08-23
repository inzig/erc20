﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Furtcoin</title>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KTCNVWB');
    </script>
    <!-- End Google Tag Manager -->
    <meta name="description" content="Furtcoin is an Innovative Loream Platform based on the Ethereum Blockchain. Backed by Swiss ICO, it uses Artificial Intelligence (AI) technology for booking and tracking ships in real time and managing cargo.ICO starting soon." />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Raleway:400,700" rel="stylesheet">
    <meta name="google-site-verification" content="UZwpHU1mn3oXU5THPrX7DKJX2bXJg0UMv1kmy4K3OGU" />
    <meta name="msvalidate.01" content="B3BA9FD34ED27CA84A4E63A99763A80E" />
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet" />
    <link href="bootstrap/css/flag-icon.min.css" rel="stylesheet" />
    <script src="bootstrap/js/fontawesome_all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"></script>

    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,800i" rel="stylesheet">
    <style>
    body{
        margin-top: -2%;
    }
    .h-100 {
        height: auto !important;
        /* width: auto !important; */
    }
    .point-img{
        height: 200px !important;
        width: 200px !important;
    }
    .twiter-image{
        width: 100%;
        height: 300px;
    }

    @media only screen and (max-width: 900px) {
        .img-mockup{
            height: 20%;
        }
    }
    
    </style>
</head>
<body>
    <nav  class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#homeSection">
        <img id="navbarLogo" class="bitnautic-logo" src="bootstrap/img/logo.png" alt="Furtcoin logo">
        </a>
        <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-1"><a class="nav-link" href="#aboutSection">About</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="#solutionsSection">Solutions</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="#featuresSection">Platform</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="#tokenSection">Token Sale</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="#roadmap-section">Roadmap</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="#teamSection">Team</a></li>
                <li class="nav-item mx-1"><a class="nav-link" href="" target="_blank" rel="noreferrer"><i class="fab fa-medium"></i> Blog</a></li>
                
                <li class="nav-item mx-2"><a href="{{ url('/') }}/assets/white-paper.pdf" target="_blank" class="btn btn-outline-primary"><i class="fa fa-file-alt mr-2"></i>WHITE PAPER</a></li>
                <li id="loginNavButton" class="nav-item mx-2"><a href="{{ url('login') }}" class="btn btn-primary"><i class="fa fa-user mr-2"></i>Login</a></li>
                <li id="dashboardNavButton" class="nav-item mx-2 d-none"><a href="" class="btn btn-primary"><i class="fa fa-tachometer-alt mr-2"></i>Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-gb mr-1"></span></a>
                    <div class="dropdown-menu dropdown-menu-right"
                         aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/fr/"><span class="flag-icon flag-icon-fr mr-1"></span>Français</a><a class="dropdown-item" href="/de/"><span class="flag-icon flag-icon-de mr-1"></span>Deutsch</a><a class="dropdown-item" href="/it/"><span class="flag-icon flag-icon-it mr-1"></span>Italiano</a>
                        <a class="dropdown-item" href="/es/"><span class="flag-icon flag-icon-es mr-1"></span>Español</a><a class="dropdown-item" href="/pt/"><span class="flag-icon flag-icon-pt mr-1"></span>Português</a><a class="dropdown-item" href="/ru/"><span class="flag-icon flag-icon-ru mr-1"></span>Pусский</a>
                        <a class="dropdown-item" href="/kr/"><span class="flag-icon flag-icon-kr mr-1"></span>한국어</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div id="particlesDiv"></div>
    <div class="container-fluid raleway-font-regular">
        <div id="homeSection" class="row align-items-center justify-content-center position-relative">
            <!--<div class="background-video-container d-flex justify-content-center"><video class="background-video" autoplay muted loop playsinline><source src="https://bitnauticcdn-bb3d.kxcdn.com/public/videos/background.mp4" type="video/mp4"></video></div>-->
            <div class="dark-overlay"></div>
            <div class="col-10 d-flex flex-column fill-vh text-light">
                <div class="row navbar-placeholder"></div>
                <div class="row justify-content-center text-center mt-auto">
                    <h1 class="logotext lato-font-bold dark-text-shadow">FURTCOIN</h1>
                </div>
                <div class="row justify-content-center text-center">
                    <h2 class="dark-text-shadow">AN EVOLURIO ARILY SUPERIOR</h2>
                </div>
                <div class="row justify-content-center text-center mb-3">
                    <h1 class="dark-text-shadow baner-text">WHO OWNS FOOTBALL</h1>
                </div>
                <div class="row justify-content-center text-center mt-auto">
                    <h3 id="countdownsLabel" class="dark-text-shadow">Time to start Pre ICO sale</h3>
                </div>
                <div class="d-flex justify-content-center dark-text-shadow">
                    <div class="d-flex flex-column align-items-center">
                        <div class="countdown-circle d-flex align-items-center justify-content-center mx-2">
                            <h2 id="dayLabel" class="lato-font-regular dark-text-shadow p-0 m-0">00</h2>
                        </div>
                        <p class="dark-text-shadow m-0 mb-auto">DAYS</p>
                    </div>
                    <span class="dotico">
                        <i class="fa fa-circle"></i> 
                    </span>
                    <div class="d-flex flex-column align-items-center">
                        <div class="countdown-circle d-flex align-items-center justify-content-center mx-2">
                            <h2 id="hourLabel" class="lato-font-regular dark-text-shadow p-0 m-0">00</h2>
                        </div>
                        <p class="dark-text-shadow m-0 mb-auto">HOURS</p>
                    </div>
                    <span class="dotico">
                        <i class="fa fa-circle"></i>
                    </span>
                    <div class="d-flex flex-column align-items-center">
                        <div class="countdown-circle d-flex align-items-center justify-content-center mx-2">
                            <h2 id="minuteLabel" class="lato-font-regular dark-text-shadow p-0 m-0">00</h2>
                        </div>
                        <p class="dark-text-shadow m-0 mb-auto">MINUTES</p>
                    </div>
                    <span class="dotico">
                        <i class="fa fa-circle"></i>
                    </span>
                    <div class="d-flex flex-column align-items-center">
                        <div class="countdown-circle d-flex align-items-center justify-content-center mx-2">
                            <h2 id="secondLabel" class="lato-font-regular dark-text-shadow p-0 m-0">00</h2>
                        </div>
                        <p class="dark-text-shadow m-0 mb-auto">SECONDS</p>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <h6 class="dark-text-shadow">Crowdsale progress</h6>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2">
                        <div class="row justify-content-center position-relative mb-4">
                            <div class="progress w-100 ico-progress-bar box-white-highlight">
                                <div class="progress-bar bitnautic-light-blue-gradient box-white-highlight" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%"></div>
                            </div>
                            <p id="icoProgressHardCapLabel" class="dark-text-shadow m-0">Soft Cap</p>
                        </div>
                        <div id="etherRaisedContainer" class="row justify-content-center d-none">
                            <h1 class="large-rounded-corners bitnautic-light-blue-gradient text-white text-white-highlight box-white-highlight py-3 px-sm-5 text-center">Raised: $<span id="crowdsaleRaisedLabel" class="lato-font-bold">0</span></h1>
                        </div>
                        <div class="row justify-content-center d-none">
                            <h6 class="dark-text-shadow">Crowdsale + Private Sale Agreements</h6>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center"><a href="" class="rounded-button rounded-button-lg active raleway-font-bold d-flex align-items-center text-center mb-1"><i class="fab fa-ethereum mr-2"></i>BUY TOKENS</a></div>
                
            </div>            
        </div>
        <div id="aboutSection" class="row align-items-center justify-content-center">
            <div class="col">
                <div class="row navbar-placeholder"></div>
                <div class="row justify-content-center mb-3 mt-5">
                    <h1 class="lato-font-regular">What is <strong class="lato-font-bold bitnautic-blue-text">Furtcoin</strong>?</h1>
                </div>
                <div class="row justify-content-center position-relative">
                    <div class="light-overlay"></div>
                    <div class="col-10 col-lg-4 d-flex flex-column">                       
                        <div class="row mb-auto">
                        Furt Coin is the currency adopted on the Furt platform. 
                        Furt Coin platform is one created by fans, run by fans.
                        We know that you are tired of how clubs are run like business ventures,
                        only out to exploit you and make more money at your expense when you have tirelessly supported them,
                        at every step of the way. With this coin, you can benefit from our incredible features and key into the benefits of our platform.
                        The outstanding factor about Furt Coin is that you can trade or exchange it in a crypto-exchange. 
                        While adopting the use of blockchain technology for our Furt Coin to ensure total safety and accurate records on the platform, 
                        we are certain that as time goes on, the price of the coin will increase because a lot of humans love football and will key into the advantages that we offer.
                        You can be rest assured that the higher the demand for Furt Coin, 
                        the higher the worth of the coin as we operate under the Economic Law of Demand and Supply. 
                        </div>
                    </div>

                    <div class="col-10 col-lg-4 offset-lg-1 d-flex flex-column">
                        <div class="row align-items-center justify-content-center my-auto">
                        <!-- <video class="small-rounded-corners w-100" autoplay muted loop playsinline> -->
                            <!-- <source src="https://bitnauticcdn-bb3d.kxcdn.com/public/videos/port_motion.mp4" type="video/mp4"> -->
                            <img class="small-rounded-corners w-100" src="bootstrap/img/stadium.jpg" alt="">
                        <!-- </video> -->
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <style>
                        .embed-container {
                            position: relative;
                            padding-bottom: 56.25%;
                            height: 0;
                            overflow: hidden;
                            max-width: 100%;
                        }

                            .embed-container iframe, .embed-container object, .embed-container embed {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                            }
                    </style>
                    
                    <div class='embed-container w-75'>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/KXxW4yyrBRs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    
                </div>
            </div>
        </div>
        <div id="solutionsSection" class="row justify-content-center">
            <div class="col-12 col-sm-10">
                <div class="row navbar-placeholder"></div>
                <div class="row justify-content-center mb-3 mt-5">
                    <h1 class="lato-font-regular text-center">Challenges and <strong class="lato-font-bold bitnautic-blue-text">Solutions</strong></h1>
                </div>
                <!-- <div class="row justify-content-center">
                    <div id="shippersChallengesButton" class="rounded-button active mx-3">For Shippers</div>
                    <div id="carriersChallengesButton" class="rounded-button mx-3">For Carriers</div>
                </div> -->
            </div>
        </div>
        <div class="row justify-content-center mt-5 d-none d-sm-flex">
            <div class="col-10 position-relative">
                <div class="light-overlay"></div>
                <div class="row">
                    <div class="col">
                        <div class="row justify-content-center">
                            <h3 class="lato-font-regular">Your <strong class="lato-font-bold bitnautic-blue-text">Challenges</strong></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row justify-content-center">
                            <h3 class="lato-font-regular">Our <strong class="lato-font-bold bitnautic-blue-text">Solutions</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="shippersChallenges" class="row justify-content-center mt-3">
            <div class="col-10 position-relative">
                <div class="light-overlay"></div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>
                            “We as fans have lack the respect and right treatment they deserve from the clubs they owe their loyalty to due to the greedy people in control of affairs”
                            </em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>
                            Our platform, Furt platform was created out of the desire and passion to liberate you as a 
                            football fan from the disrespect and ill treatment meted by unscrupulous club leaders and 
                            governing bodies. With our platform, Furt Platform, we will continue to try our best to 
                            sanitize the mess that unscrupulous club owners, 
                            members of governing bodies have created because of their greed for money.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>
                            “Yearly, billions of dollars is generated as revenue in the football industry; 
                            yet, the money is shared by only a few. 
                            We as fans end up giving, while the few at the top feed on the spoils.”
                            </em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                        <p>
                            With our Furt Platform, we will allow you as a member to benefit from the huge profits made from the football industry. 
                            With the adoption of the blockchain industry, records can never be tampered and utmost transparency shared of 
                            how profits are shared is guaranteed. We, as the proletariat, fighting against the bourgeois in the 
                            form of the club owners and the members of the governing body, 
                            will bring about the redistribution of the funds back to you. You as a fan have to earn too.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>“
                            The current form of football and its management is fraught with a lot of issues like corruption, 
                            exploitation of fans, 
                            the death in the fun aspect of the game and the predominance of gambling in the game
                            ”</em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>
                            Corruption and other kinds of frauds will be clamped down with the introduction of Furt. 
                            We will buy back clubs from business oligarchs, 
                            expensive hedge funds that have resulted into exploiting fans and killing the fun in football. 
                            We intend to let these oligarchs know that we are sanitizing the system. 
                            We know that a drop of water, 
                            working with other drops of water, make up the ocean.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>“
                            Trading and purchasing of clubs merchandise like jerseys and stadium tickets are sold at high cost. 
                            Even with the huge funds generated yearly by clubs, 
                            there still exist insecurity in most stadia.
                            ”</em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>
                            Our currency, Furt Coin has been built and conditioned in such a way that allows 
                            users to freely trade, buy clubs merchandise and tickets at 
                            affordable rates and have access to and enjoy the benefits of the platform. 
                            With our coin, Furt Coin's usage of blockchain technology means that stadium security will be guaranteed. 
                            As Furt continues to buy clubs after the other, 
                            there will be a need for stadium security.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>“
                            Gambling has many advantages but the unscrupulous nature of some gambling pundits is negatively affecting the world of football. 
                            Some go as far as trying to bribe officials to win.
                            ”</em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>
                            With the introduction of blockchain technology, 
                            you as a fan can be sure that no unscrupulous gambling pundit is somewhere trying to falsify or commit fraud. 
                            In the aspect of security, 
                            blockchain technology can and will be used in ticketing and gambling.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="carriersChallenges" class="row justify-content-center mt-3 d-none">
            <div class="col-10 position-relative">
                <div class="light-overlay"></div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>“My ship is having too many <strong class="lato-font-bold bitnautic-blue-text">unproductive days</strong>, off hire.”</em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>List your ship and update its location. Furtcoin will find the <strong class="lato-font-bold bitnautic-blue-text">optimal cargo</strong> for you.</p>
                        </div>
                    </div>
                </div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>“My vessels utilization is <strong class="lato-font-bold bitnautic-blue-text">low</strong>, I have to improve it.”</em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>Add your free space and our system will find the cargo for the <strong class="lato-font-bold bitnautic-blue-text">consolidation</strong> you need.</p>
                        </div>
                    </div>
                </div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>“My profit trend is negative, I do business through Brokers, and they are taking <strong class="lato-font-bold bitnautic-blue-text">all my margin</strong> (>10%).”</em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>Furtcoin will ask you a small subscription and a fixed and low commission. No markup. <strong class="lato-font-bold bitnautic-blue-text">No middleman</strong>.</p>
                        </div>
                    </div>
                </div>
                <div class="row my-3 challenges-row">
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <h5><em>“I struggle to find new customers.”</em></h5>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="row mx-3">
                            <p>You will be able to search through all the freight quotation requests from shippers. You will have <strong class="lato-font-bold bitnautic-blue-text">direct contact</strong> to negotiate your terms.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="featuresSection" class="row align-items-center justify-content-center mt-5">
            <div class="col-10">
                <div class="row navbar-placeholder"></div>
                <div class="row justify-content-center mb-3">
                    <h1 class="lato-font-regular text-center">Furtcoin <strong class="lato-font-bold bitnautic-blue-text">Platform</strong></h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6">
                        <div class="row justify-content-center mt-3">
                        <img src="bootstrap/img/mockup.png" class="img-mockup"/>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center position-relative">
                    <div class="light-overlay"></div>
                    <div class="col-12 col-md-6 d-flex flex-column my-4">
                        <div class="row px-3">
                            <h5 class="lato-font-bold bitnautic-blue-text">Decentralization</h5>
                        </div>
                        <div class="row px-3">
                        <p class="text-justify">
                        Furt is decentralized, meaning that transaction is peer-to-peer. There is no 
                        central body that determines how things are done. This reduces any form of 
                        corruption because there is no centralized body that will collude the system. 
                        Major decisions are made via votes. 
                        Payment is done from user to user. Exchanges are done from user to user.
                        T
                        There is no centralized body that can gather data and resell it to third             
                        parties.
                        Fans are the owners and users of Furt
                        </p>
                           </div>
                        <div class="row justify-content-center mt-auto">
                        <img class="h-100 w-50 point-img" src="bootstrap/img/Decentralization.png" /></div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column my-4">
                        <div class="row px-3">
                            <h5 class="lato-font-bold bitnautic-blue-text">Immutable</h5>
                        </div>
                        <div class="row px-3">
                            <p class="text-justify">
                            Immutability means 'cannot be changed'.
                            The immutability of our blockchain means records cannot be changed. Your 
                            personal data cannot be hacked into, stolen or changed.
                            T
                            Transactions done on the blockchain cannot be tampered.
                            This means that no one can try to cover up any fraudulent occurrence or try 
                            to cheat the system. Not even the system's administration can do that.
                            </p>
                         </div>
                        <div class="row justify-content-center mt-auto">
                        <img class="h-100 w-50 point-img" src="bootstrap/img/Immutable.png" /></div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column my-4">
                        <div class="row px-3">
                            <h5 class="lato-font-bold bitnautic-blue-text">Data Redundancy</h5>
                        </div>
                        <div class="row px-3">
                            <p class="text-justify">
                            Here, the same data are stored on all the nodes. This means that the infor-
                            mation or data cannot be destroyed or tampered with. It can be accessed 
                            from anywhere in the world, as far as the user is on the platform.
                            Even when the system is hacked, information cannot be changed with this 
                            feature.
                            </p>
                         </div>
                        <div class="row justify-content-center mt-auto">
                        <img class="h-100 w-50 point-img" src="bootstrap/img/Data-Redundancy.png" /></div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column my-4">
                        <div class="row px-3">
                            <h5 class="lato-font-bold bitnautic-blue-text">Low Transaction Cost</h5>
                        </div>
                        <div class="row px-3">
                            <p class="text-justify">
                            Here, the cost of a transaction is low. With the usage of smart contracts and 
                            our payment options, users can use the Furt Coin to access the platform, pay 
                            for items and even exchange or trade it
                            The costs that usually occur from having middlemen is cut off.
                            Using
                            Using Furt as a payment option reduces the cost of transaction to the barest 
                            minimum.
                            </p>
                        
                        </div>
                        <div class="row justify-content-center mt-auto">
                        <img class="h-100 w-50 point-img" src="bootstrap/img/Low-Transaction-Cost.png" /></div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column my-4">
                        <div class="row px-3">
                            <h5 class="lato-font-bold bitnautic-blue-text">Privacy</h5>
                        </div>
                        <div class="row px-3">
                            <p class="text-justify">
                            With Furt, users and fans have control over their data, meaning that no one 
                            can have access to your data except you give the person permission.
                            Our
                            Our usage of the blockchain technology is in line with the EU's GDPR, Gen-
                            eral Data Protection Regulation. The GDPR is trying to ensure that every or-
                            ganization with users' data should be able to keep them safe and provide 
                            that they got the user's permission before the data was shared. It should also 
                            show where the data went to, and what it was used for.
                            Furt believes that reselling of users' data is wrong.
                            Furt is built on such premise.
                            </p>
                        </div>
                        <div class="row justify-content-center mt-auto">
                        <img class="h-100 w-50 point-img" src="bootstrap/img/Privacy.png" /></div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column my-4">
                        <div class="row px-3">
                            <h5 class="lato-font-bold bitnautic-blue-text">Borderless</h5>
                        </div>
                        <div class="row px-3">                            
                            <p class="text-justify">
                            Furt Coin can be bought anywhere in the world, especially in countries that 
                            did not ban cryptocurrencies. Transactions can be done using the coin from 
                            anywhere in the world to anywhere in the world. The coin can be used to pay 
                            for products, services or traded. That means a user in Germany can trade 
                            with another user in the US without bothering about geographical barriers.
                            A
                            A user in Italy can join other fans to buy his or her loyal club in another            
                            country. A user in South Africa, in collaboration with other fans, can                   
                            purchase a club in England. It is borderless.
                            </p>
                        </div>
                        <div class="row justify-content-center mt-auto">
                        <img class="h-100 w-50 point-img" src="bootstrap/img/borderless.png" /></div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3 mb-auto">
                <a href="{{ url('/') }}/assets/white-paper.pdf" target="_blank" class="rounded-button active raleway-font-bold d-flex align-items-center mx-3 mb-1">
                    <i class="fa fa-file-alt mr-2"></i>WHITE PAPER</a>
                </div>
            </div>
        </div>
        <div id="tokenSection" class="row align-items-center justify-content-center mt-5">
            <div class="col">
                <div class="row navbar-placeholder"></div>
                <div class="row justify-content-center mt-3">
                    <h1 class="lato-font-regular">Token <strong class="lato-font-bold bitnautic-blue-text">Sale</strong></h1>
                </div>
                <div class="row position-relative justify-content-center">
                    <div class="light-overlay"></div>
                    <div class="col-12 col-lg-6 d-flex flex-column mt-5">
                        <div class="row justify-content-center">
                            <h5 class="lato-font-bold bitnautic-blue-text">DETAILS</h5>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Token Symbol:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">
                                <span>FURT</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Token Type:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">ERC20</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Total Token Supply:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end text-right">14,360,000,000 FURT</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Initial Distribution:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end text-right">5,000,000,000 FURT</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 offset-2">
                                <div class="row">Accepted Currency:</div>
                            </div>
                            <div class="col-2">
                                <div class="row justify-content-end">ETH</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 offset-2">
                                <div class="row">Exchange Rate:</div>
                            </div>
                            <div class="col-5">
                                <div class="row justify-content-end">0.007 ETH = 1 FURT</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 offset-2">
                                <div class="row">Soft Cap:</div>
                            </div>
                            <div class="col-3">
                                <div class="row justify-content-end">17,000 ETH</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Hard Cap:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">60,000 ETH</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Pre-ICO Starts:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">Aug 24, 2018</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Pre-ICO Ends:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">Sep 27, 2018</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Main ICO Starts:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">Sep 28, 2018</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-2">
                                <div class="row">Main ICO Ends:</div>
                            </div>
                            <div class="col-4">
                                <div class="row justify-content-end">Nov 18, 2018</div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3"><strong class="bitnautic-blue-text">No new tokens will ever be created</strong></div>
                        <div class="row justify-content-center mt-5"><a href="/" class="rounded-button rounded-button-lg active raleway-font-bold d-flex align-items-center mb-1"><i class="fab fa-ethereum mr-2"></i>BUY TOKENS</a></div>
                    </div>
                    <div class="col-12 col-lg-6 mt-5">
                        <div class="row justify-content-center">
                            <h5 class="lato-font-bold bitnautic-blue-text">BONUS PROGRAM</h5>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-10">
                                <div class="row">
                                <img class="h-100 w-100" src="bootstrap/img/ico_bonus.png" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-5">
                        <div class="row justify-content-center">
                            <h5 class="lato-font-bold bitnautic-blue-text">TOKEN ALLOCATION</h5>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-10">
                                <div class="row">
                                <img class="h-100 w-100 point-img" src="bootstrap/img/token_allocation.svg" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-5">
                        <div class="row justify-content-center">
                            <h5 class="lato-font-bold bitnautic-blue-text">FUNDS ALLOCATION</h5>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-10">
                                <div class="row"><img class="h-100 w-100 point-img" src="bootstrap/img/funds_allocation.svg" /></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <a href="" class="rounded-button active raleway-font-bold d-flex align-items-center mb-1"><i class="fab fa-ethereum mr-2"></i>CONTRIBUTE</a>
                    <!-- <a href="" class="rounded-button active raleway-font-bold d-flex align-items-center mx-3 mb-1"
                    target="_blank" rel="noreferrer"><i class="fa fa-file-alt mr-2"></i>TERMS &amp; CONDITIONS</a> -->
                    <a href="{{ url('/') }}/assets/white-paper.pdf" target="_blank"  class="rounded-button active raleway-font-bold d-flex align-items-center mx-3 mb-1"><i class="fa fa-file-alt mr-2"></i>WHITE PAPER</a>
                </div>
            </div>
        </div>
        <div id="roadmap-section" class="row justify-content-center align-items-center mt-5">
                <div class="container">
                    <div class="tittle_section center">
                        <h2 class="sub-title  aos-init aos-animate" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000"><span class="yellow-thm">Project</span><strong> Roadmap</strong></h2>
                        <!-- <p class="sub-content">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, and going discovered the undoubtable source.
                        </p> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="timiline-wrapper" class="timiline-wrapper text-center ps ps--active-x">
                                <ul class="nav nav-tabs roadmap-tabs">
                                    <li class="active"><a data-toggle="tab" href="#timeline-steps1">2018</a></li>
                                    <li><a data-toggle="tab" href="#timeline-steps2">2019</a></li>
                                    <li><a data-toggle="tab" href="#timeline-steps3">2021</a></li>
                                    <li><a data-toggle="tab" href="#timeline-steps4">2022</a></li>
                                    <li><a data-toggle="tab" href="#timeline-steps5">2023</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="timeline-steps1" class="timeline-steps tab-pane fade in  active show">
                                        <div class="timeline-step" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner selected-rm-pointer">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>June 2018</h6>
                                                <p>
                                                    White paper and concept created by founder.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-step" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner selected-rm-pointer">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>July 2018</h6>
                                                <p>
                                                    Website launch.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- <div class="timeline-step" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>Nov 2018</h6>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.
                                                </p>
                                            </div>
                                        </div> -->
                                        <div class="timeline-step" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>Aug 2018</h6>
                                                <p>
                                                    Pre ICO started.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-step" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>November 2018</h6>
                                                <p>
                                                    ICO ends.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-step" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>Dec 2018</h6>
                                                <p>
                                                    Furtcoin in major exchanges.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="timeline-steps2" class="timeline-steps tab-pane fade">
                                        <!-- <div class="timeline-step" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner selected-rm-pointer">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>Dec 2018</h6>
                                                <p>
                                                    Furtcoin in major exchanges.
                                                </p>
                                            </div>
                                        </div> -->
                                        <div class="timeline-step" data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner selected-rm-pointer">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>March 2019</h6>
                                                <p>
                                                    Relaunch of website with fan page and development of fan community.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="timeline-step" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                            <div class="timeline-step-inner">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <h6>June 2019</h6>
                                                <p>
                                                    Additional development and planning continue and merging with football related companies.
                                                </p>
                                            </div>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
           
        </div>
       
            
        @include('subpages.team')


        {{-- @include('subpages.partners') --}}
        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-12">
                <!-- <div class="row justify-content-center">
                    <h1 class="lato-font-regular">Our <strong class="lato-font-bold bitnautic-blue-text">Partners</strong></h1>
                </div> -->
                <div class="row justify-content-center position-relative">
                    <div class="light-overlay"></div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/ibm.svg" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/startups_ch.png" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/smartico.png" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/cryptopolis.png" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/citowise.png" alt="partnerlogo" /></a></div>
                    </div>
                </div>
                <div class="row justify-content-center position-relative">
                    <div class="light-overlay"></div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/cryptovalley.png" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/thecryptonomist.png" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/identitymind.png" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/glimpex.png" alt="partnerlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/berith.png" alt="partnerlogo" /></a></div>
                    </div>
                    <!--<div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">-->
                    <!--<div class="row">-->
                    <!--<a href="hm/" target="_blank" rel="noreferrer">-->
                    <!--<img class="w-100 h-100" src="/public/images/partners/hiinteriors.png" alt="partnerlogo"/>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-12">
                <div class="row justify-content-center">
                    <h1 class="lato-font-bold bitnautic-blue-text">Exchanges</h1>
                </div>
                <div class="row justify-content-center position-relative">
                    <div class="light-overlay"></div>
                    <!-- <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/bancor.jpeg" alt="eventlogo" /></a></div>
                    </div> -->
                </div>
                <div class="row justify-content-center">
                    <h6 class="text-center">FURT Tokens will be listed after the end of the ICO</h6>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-12">
                <div class="row justify-content-center">
                    <h1 class="lato-font-regular">Public <strong class="lato-font-bold bitnautic-blue-text">Events</strong></h1>
                </div>
                <div class="row justify-content-center position-relative">
                    <div class="light-overlay"></div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/futurama.png" alt="eventlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/blockshow.png" alt="eventlogo" /></a></div>
                    </div>
                    <div class="col-6 col-sm-4 offset-sm-1 col-lg-2 offset-lg-0 m-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a href="" target="_blank" rel="noreferrer"><img class="w-100 h-100" src="bootstrap/img/glimpex.png" alt="eventlogo" /></a></div>
                    </div>
                </div>
            </div>
        </div>
<div class="row align-items-center justify-content-center mt-5">
   <div class="col-12">
      <div class="row justify-content-center">
         <h1 class="lato-font-regular"><i class="fab fa-instagram"></i> Latest <strong class="lato-font-bold bitnautic-blue-text">Instagrams</strong></h1>
      </div>
      <div  class="row justify-content-center">
         <div class="col-12 col-sm-6 col-md-4 col-xl-3 my-3">
            <div class="row px-3">
               <div class="col-12 small-rounded-corners bg-white-shadow scale-on-hover pointer-cursor" 
                  onclick="targetBlankOpen('https://twitter.com/furtcoin/status/1027736751568240640')">
                  <div class="row">
                     <img src="https://pbs.twimg.com/media/DkNBH9IWwAUC76q.jpg" class="twiter-image">
                  </div>
                  <div class="row mx-2 mt-2">
                     <h5>
                        <svg class="svg-inline--fa fa-heart fa-w-16 fa-fw" aria-hidden="true" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"></path>
                        </svg>
                        <!-- <i class="far fa-heart fa-fw"></i> -->192 
                        <svg class="svg-inline--fa fa-comment fa-w-16 fa-fw ml-1" aria-hidden="true" data-prefix="far" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"></path>
                        </svg>
                        <!-- <i class="far fa-comment fa-fw ml-1"></i> -->3
                     </h5>
                  </div>
                  <div class="row mx-2 my-auto">
                     <p>Some friends from InsCoin came to our office this morning... Stay Tuned for more!</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-4 col-xl-3 my-3">
            <div class="row px-3">
               <div class="col-12 small-rounded-corners bg-white-shadow scale-on-hover pointer-cursor" 
                  onclick="targetBlankOpen('https://twitter.com/furtcoin/status/1027736696169947136')">
                  <div class="row">
                     <img src="https://pbs.twimg.com/media/DkNBESFX4AA66if.jpg" class="twiter-image">
                  </div>
                  <div class="row mx-2 mt-2">
                     <h5>
                        <svg class="svg-inline--fa fa-heart fa-w-16 fa-fw" aria-hidden="true" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"></path>
                        </svg>
                        <!-- <i class="far fa-heart fa-fw"></i> -->192 
                        <svg class="svg-inline--fa fa-comment fa-w-16 fa-fw ml-1" aria-hidden="true" data-prefix="far" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"></path>
                        </svg>
                        <!-- <i class="far fa-comment fa-fw ml-1"></i> -->3
                     </h5>
                  </div>
                  <div class="row mx-2 my-auto">
                     <p>Some friends from InsCoin came to our office this morning... Stay Tuned for more!</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-4 col-xl-3 my-3">
            <div class="row px-3">
               <div class="col-12 small-rounded-corners bg-white-shadow scale-on-hover pointer-cursor" 
                  onclick="targetBlankOpen('https://twitter.com/furtcoin/status/1027736724489883648')">
                  <div class="row">
                     <img src="https://pbs.twimg.com/media/DkNBGTXXsAAHmEE.jpg" class="twiter-image">
                  </div>
                  <div class="row mx-2 mt-2">
                     <h5>
                        <svg class="svg-inline--fa fa-heart fa-w-16 fa-fw" aria-hidden="true" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"></path>
                        </svg>
                        192 
                        <svg class="svg-inline--fa fa-comment fa-w-16 fa-fw ml-1" aria-hidden="true" data-prefix="far" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                           <path fill="currentColor" d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"></path>
                        </svg>
                        <i class="far fa-comment fa-fw ml-1"></i>3
                     </h5>
                  </div>
                  <div class="row mx-2 my-auto">
                     <p>Some friends from InsCoin came to our office this morning... Stay Tuned for more!</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-10">
                <div class="row justify-content-center">
                    <h3 class="lato-font-bold">AS SEEN ON</h3>
                </div>
                <div class="row partner-logos-container position-relative">
                    <div class="light-overlay"></div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="https://foundico.com/upload/medialibrary/4f9/4f93ebe9b7a12f4f704a404d4186bbbe.png" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="https://s3.royaltyexchange.com/1.png" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="https://cryptoslate.com/wp-content/themes/cryptoslate-2017/images/cryptoslate-light-logo-758x160.png" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="https://i.pinimg.com/originals/61/2d/1e/612d1ec831bbf7a0f0dc4e096a3ae202.jpg" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="https://icobench.com/rated/bitnautic?shape=horizontal&size=m" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="bootstrap/img/fcd1c7e55b848bbbb8d00528d51000eb.svg" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="bootstrap/img/coindelite.png" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="bootstrap/img/logo.svg" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="bootstrap/img/icorating.jpeg" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="bootstrap/img/crunchbase.png" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="bootstrap/img/coindelite.png" alt="media partner logo" /></a></div>
                    </div>
                    <div class="col-6 col-md-3 my-3 d-flex align-items-center justify-content-center">
                        <div class="row"><a class="p-3" href="" target="_blank" rel="noreferrer"><img class="w-100 h-100 " src="bootstrap/img/500.png" alt="media partner logo" /></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-10">
                <div class="row justify-content-center my-5 position-relative">
                    <div class="light-overlay"></div>
                    <div class="col-10 col-lg-5 mt-5">
                        <div class="row justify-content-center">
                            <h2 class="lato-font-regular text-center">Contact <strong class="lato-font-bold bitnautic-blue-text">Us</strong></h2>
                        </div>
                        <form id="contactForm" class="w-100 mt-2">
                            <div class="form-group"><input class="form-control form-control-shadow" type="text" id="contactFullName" name="fullName" placeholder="Your Name *" /></div>
                            <div class="form-group"><input class="form-control form-control-shadow" type="text" id="contactEmail" name="email" placeholder="E-mail *" /></div>
                            <div class="form-group"><textarea class="form-control form-control-shadow" id="contactMessage" name="message" placeholder="Your Message *"></textarea></div>
                            <div class="form-row justify-content-center">
                                <p>or write us an email at <a href="" class="bitnautic-blue-text"><span class="__cf_email__" data-cfemail="6b181e1b1b04191f2b09021f050a1e1f0208450204">[email&#160;protected]</span></a></p>
                            </div>
                            <div class="form-row justify-content-center"><button id="contactSendButton" class="rounded-button active mt-3 px-5" type="button"><i class="fa fa-envelope mr-2"></i><span>SEND</span></button></div>
                        </form>
                    </div>
                    <div class="col-10 col-lg-5 offset-lg-1 mt-5">
                        <div class="row justify-content-center">
                            <h2 class="lato-font-regular text-center">Join our <strong class="lato-font-bold bitnautic-blue-text">Mailing List</strong></h2>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <h6 class="text-center">Subscribe to stay up to date on company news and product updates</h6>
                        </div>
                        <form action="" method="post" class="mt-3" novalidate>
                            <div class="form-group"><input class="form-control text-center form-control-shadow" type="email" name="w-field-field-24574-125094-701203-email" placeholder="Enter your e-mail address" /></div>
                            <div class="form-row justify-content-center"><button class="rounded-button active d-flex align-items-center my-3 py-0" type="submit" name="subscribe">SUBSCRIBE NOW</button></div>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center mt-5"><a href="" class="rounded-button active raleway-font-bold d-flex align-items-center mx-3 mb-1 pl-2 pr-3" target="_blank" rel="noreferrer"><i class="fab fa-telegram fa-2x mr-2"></i>Join us on Telegram</a></div>
                <div class="row justify-content-center my-3">
                    <a href="" target="_blank" rel="noreferrer"><i class="fab fa-telegram fa-2x mx-3 bitnautic-blue-text"></i></a><a href="" target="_blank" rel="noreferrer"><i class="fab fa-facebook fa-2x mx-3 bitnautic-blue-text"></i></a>
                    <a href="" target="_blank" rel="noreferrer"><i class="fab fa-instagram fa-2x mx-3 bitnautic-blue-text"></i></a><a href="" target="_blank" rel="noreferrer"><i class="fab fa-linkedin fa-2x mx-3 bitnautic-blue-text"></i></a><a href=""
                                                                                                                                                                                                                                                    target="_blank" rel="noreferrer"><i class="fab fa-twitter fa-2x mx-3 bitnautic-blue-text"></i></a><a href="" target="_blank" rel="noreferrer"><i class="fab fa-btc fa-2x mx-3 bitnautic-blue-text"></i></a>
                    <a href="" target="_blank" rel="noreferrer"><i class="fab fa-medium fa-2x mx-3 bitnautic-blue-text"></i></a><a href="" target="_blank" rel="noreferrer"><i class="fab fa-reddit fa-2x mx-3 bitnautic-blue-text"></i></a><a href=""
                                                                                                                                                                                                                                               target="_blank" rel="noreferrer"><i class="fab fa-github fa-2x mx-3 bitnautic-blue-text"></i></a><a href="" target="_blank" rel="noreferrer"><i class="fab fa-slack fa-2x mx-3 bitnautic-blue-text"></i></a>
                    <a href="" target="_blank" rel="noreferrer"><i class="fa fa-envelope fa-2x mx-3 bitnautic-blue-text"></i></a>
                </div>
            </div>
        </div>
        <div class="row align-items-end mt-3 mb-1 position-relative">
            <div class="light-overlay"></div>
            <div class="col-12 col-lg-4">
                <!-- <div class="row px-5 justify-content-center justify-content-lg-start">
                    <p>Your Location<br>Type your Address Here<br>101, street H NO </p>
                </div> -->
            </div>
            <div class="col-12 col-lg-4">
                <!--<div class="row justify-content-center">-->
                <!--<a href="/terms-and-conditions.html">Terms &amp; Conditions</a><span class="mx-3">|</span><a href="/privacy-policy.html">Privacy Policy</a>-->
                <!--</div>-->
                <div class="row justify-content-center"><a href="" target="_blank" rel="noreferrer">Privacy Policy</a></div>
                <div class="row justify-content-center">
                    <p>© 2018 Furtcoin - All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script data-cfasync="false" src="https://cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bundle.min.js"></script>
    <script src="bootstrap/js/Chart.PieceLabel.min.js"></script>
    <script src="bootstrap/js/particles.min.js"></script>
    <script src="bootstrap/js/instafeed.min.js"></script>
    <script src="bootstrap/js/en.js"></script>
    <script src="bootstrap/js/index.js"></script>
    <script>
        (function(){
            var countDownDate = new Date("Aug 25, 2018 00:00:00").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                $("#dayLabel").html(days);
                $("#hourLabel").html(hours);
                $("#minuteLabel").html(minutes);
                $("#secondLabel").html(seconds);
                
                if (distance < 0) {
                    clearInterval(x);
                    // document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        })();        
    </script>

</body>
</html>