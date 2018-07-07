@extends('admin.layouts.layout')

@section('title', 'Admin Dashboard | ')

@section('content')
    <h1 class="page-title"> Admin Dashboard
        <small>add or update addresses</small>
    </h1>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{!! route('admin.index') !!}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <i class="fa fa-file"></i>
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </li>
        </ul>
    </div>

    <div class="row">
        @php
            $users = \BCES\Models\User::where('id','!=',1)->count();
        @endphp
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp"><span data-counter="counterup" data-value="{{$users}}">{{$users}}</span></h3>
                        <small>TOTAL MEMBERS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-address-book"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{$usersProgress=($users/($users+1))*100}}%;" class="progress-bar progress-bar-success green-sharp">
                            <span class="sr-only"> progress</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> progress</div>
                        <div class="status-number"> {{number_format($usersProgress,1)*1}}%</div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $usersT = \BCES\Models\User::where('id','!=',1)->has('history')->count();
        @endphp
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 p-l-0">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp"><span data-counter="counterup" data-value="{{$usersT}}">{{$usersT}}</span></h3>
                        <small>TOTAL INVESTORS</small>
                    </div>
                    <div class="icon">
                        <i class="icon-users"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{$investorProgress=($users?$usersT/$users:0)*100}}%;" class="progress-bar progress-bar-primary">
                            <span class="sr-only"> progress</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> progress</div>
                        <div class="status-number"> {{number_format($investorProgress,1)*1}}%</div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $pools = \BCES\Models\AddressPool::all()->count();
        @endphp
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 p-l-0">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="text-danger"><span data-counter="counterup" data-value="{{$pools}}">{{$pools}}</span></h3>
                        <small>POOL ADDRESSES</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bank"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{$poolsProgress=($pools/($pools+4))*100}}%;" class="progress-bar progress-bar-danger">
                            <span class="sr-only"> progress</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> progress</div>
                        <div class="status-number"> {{number_format($poolsProgress,1)*1}}%</div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $btcTotal = \BCES\Models\AddressPool::whereCryptoType('BITCOIN')->count();
            $btcRemain = \BCES\Models\AddressPool::whereCryptoType('BITCOIN')->whereNull('user_id')->count();
        @endphp
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 p-l-0">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="text-warning"><span data-counter="counterup" data-value="{{$btcRemain}}">{{$btcRemain}}</span></h3>
                        <small>REMAIN BTC POOLS</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-btc"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{$btcProgress=($btcTotal?$btcRemain/$btcTotal:0)*100}}%;" class="progress-bar progress-bar-warning">
                            <span class="sr-only"> progress</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> progress</div>
                        <div class="status-number"> {{number_format($btcProgress,1)*1}}%</div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $ltcTotal = \BCES\Models\AddressPool::whereCryptoType('LITECOIN')->count();
            $ltcRemain = \BCES\Models\AddressPool::whereCryptoType('LITECOIN')->whereNull('user_id')->count();
        @endphp
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 p-l-0">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="text-warning"><span data-counter="counterup" data-value="{{$ltcRemain}}">{{$ltcRemain}}</span></h3>
                        <small>REMAIN LTC POOLS</small>
                    </div>
                    <div class="icon">
                        <span class="custom-icon custom-icon-1" style="position: absolute;right: 2.5rem;top: 0.8rem;color: #cbd4e0;font-size: 2rem;"></span>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{$ltcProgress=($ltcTotal?$ltcRemain/$ltcTotal:0)*100}}%;" class="progress-bar progress-bar-warning">
                            <span class="sr-only"> progress</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> progress</div>
                        <div class="status-number"> {{number_format($ltcProgress,1)*1}}%</div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $dshTotal = \BCES\Models\AddressPool::whereCryptoType('DASHCOIN')->count();
            $dshRemain = \BCES\Models\AddressPool::whereCryptoType('DASHCOIN')->whereNull('user_id')->count();
        @endphp
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 p-l-0">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="text-warning"><span data-counter="counterup" data-value="{{$dshRemain}}">{{$dshRemain}}</span></h3>
                        <small>REMAIN DASH POOLS</small>
                    </div>
                    <div class="icon">
                        <span class="custom-icon custom-icon-2" style="color: #cbd4e0;font-size: 2.6rem;position: absolute;right: 2.5rem;top: 0.8rem;"></span>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{$dshProgress=($dshTotal?$dshRemain/$dshTotal:0)*100}}%;" class="progress-bar progress-bar-warning">
                            <span class="sr-only"> progress</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> progress</div>
                        <div class="status-number"> {{number_format($dshProgress,1)*1}}%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="note note-info">
            <p> Admin must add or update his addresses for Initial Coin Offerings. </p>
        </div>

        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-btc font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Bitcoin Pool Address</span>
                    <form><input type="file" class="hidden import-pool-address-input"></form>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
                        <button class="btn green btn-outline btn-sm import-pool-address" type="button" data-loading-text="{{'<i class="fa fa-repeat fa-spin"></i> importing pool addresses'}}"><i class="fa fa-download"></i> import pool addresses from csv</button>
                        <button class="btn btn-sm btn-default table-refresh-manual"><i class="fa fa-refresh"></i></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover pool-address-table" id="datatable_manual">
                        <thead>
                        <tr role="row" class="heading">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Allocated</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="custom-icon custom-icon-1"></span>
                    <span class="caption-subject font-dark bold uppercase">Litecoin Pool Address</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
                        <button class="btn green btn-outline btn-sm import-pool-address" type="button" data-loading-text="{{'<i class="fa fa-repeat fa-spin"></i> importing pool addresses'}}"><i class="fa fa-download"></i> import pool addresses from csv</button>
                        <button class="btn btn-sm btn-default table-refresh-ltc"><i class="fa fa-refresh"></i></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover pool-address-table" id="datatable_ltc">
                        <thead>
                        <tr role="row" class="heading">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Allocated</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="custom-icon custom-icon-2"></span>
                    <span class="caption-subject font-dark bold uppercase">Dashcoin Pool Address</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
                        <button class="btn green btn-outline btn-sm import-pool-address" type="button" data-loading-text="{{'<i class="fa fa-repeat fa-spin"></i> importing pool addresses'}}"><i class="fa fa-download"></i> import pool addresses from csv</button>
                        <button class="btn btn-sm btn-default table-refresh-dash"><i class="fa fa-refresh"></i></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover pool-address-table" id="datatable_dash">
                        <thead>
                        <tr role="row" class="heading">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Allocated</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="portlet light">
            @php
                $ico = auth()->user()->icos()->whereType('ethereum')->first();
            @endphp
            <form action="/admin/user/tokens/{{$ico->id}}" method="post" class="ajax-form-submit">
                {{ csrf_field() }}

                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-star font-dark"></i>
                        <span class="caption-subject font-dark bold uppercase">Initial Coin Offering's Ethereum Address</span>
                    </div>

                    <button type="submit" class="btn btn-xs green pull-right"><i class="fa fa-send"></i> <span>Update Ethereum ICO</span></button>
                    <div class="clearfix"></div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input class="form-control edited" name="address" id="form_control_address" value="{!! $ico->address !!}" type="text">
                                <label for="form_control_address">ICO address</label>
                                <span class="help-block">update initial coin offering address for member's ...</span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input class="form-control edited" name="minimum" id="form_control_minimum" value="{!! $ico->minimum !!}" type="text">
                                <label for="form_control_minimum">ICO minimum transaction</label>
                                <span class="help-block">update initial coin offering minimum btc ...</span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label" style="margin-bottom:1rem">
                                <input type="text" class="form-control" name="hard_cap" id="form_control_hard_cap" value="{!! $ico->hard_cap !!}">
                                <label for="form_control_hard_cap">ICO Hard Cap</label>
                                <span class="help-block">update initial coin offering hard cap ...</span>
                            </div>
                        </div>
                    </div>

                    <div class="spinner-container ajaxFormSpinner">
                        <div class="spinner-frame">
                            <div class="spinner-cover"></div>
                            <div class="spinner-bar"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="portlet light">
            <form action="/admin/earning-increments" method="post" class="ajax-form-submit">
                {{ csrf_field() }}

                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-dark bold uppercase">ICO's Raised Increments</span>
                        <i class="fa fa-plus font-dark"></i>
                        <i class="fa fa-plus font-dark"></i>
                    </div>

                    <button type="submit" class="btn btn-xs green pull-right">
                        <i class="fa fa-send"></i>
                        <span>Update Increments</span>
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="clearfix"></div>
                </div>

                <div class="portlet-body increment-inputs">
                    <div class="row">
                        @php
                            $increments = \BCES\Models\Setting::where('name', 'like', '%increment%')->get();
                        @endphp
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <label for="increment_bitcoin">Ethereum Earning Values</label>
                                <div class="input-group has-success">
                                    <span class="input-group-addon incr-value">{!! number_format(($ethAmt = \BCES\Models\AllTransaction::whereCurrency('ethereum')->sum('amount') + \BCES\Models\TransactionHistory::whereCurrency('ETHEREUM')->sum('balance')),8,'.','')*1 !!}</span>
                                    <input class="form-control incr-update-results" id="increment_bitcoin" name="increment_ethereum" type="number" value="{!! $increments->where('name', 'increment_ethereum')->first()->value !!}">
                                    <span class="input-group-addon incr-result">{!! number_format(($ethAmt+$increments->where('name', 'increment_ethereum')->first()->value),8,'.','')*1 !!}</span>
                                    <div class="form-control-focus"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <label for="increment_bitcoin">Bitcoin Earning Values</label>
                                <div class="input-group has-success">
                                    <span class="input-group-addon incr-value">{!! number_format(($btcAmt = \BCES\Models\AllTransaction::whereCurrency('bitcoin')->sum('amount') + \BCES\Models\TransactionHistory::whereCurrency('BITCOIN')->sum('balance')),8,'.','')*1 !!}</span>
                                    <input class="form-control incr-update-results" id="increment_bitcoin" name="increment_bitcoin" type="number" value="{!! $increments->where('name', 'increment_bitcoin')->first()->value !!}">
                                    <span class="input-group-addon incr-result">{!! number_format(($btcAmt+$increments->where('name', 'increment_bitcoin')->first()->value),8,'.','')*1 !!}</span>
                                    <div class="form-control-focus"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <label for="increment_litecoin">Litecoin Earning Values</label>
                                <div class="input-group has-success">
                                    <span class="input-group-addon incr-value">{!! number_format(($ltcAmt = \BCES\Models\AllTransaction::whereCurrency('litecoin')->sum('amount') + \BCES\Models\TransactionHistory::whereCurrency('LITECOIN')->sum('balance')),8,'.','')*1 !!}</span>
                                    <input class="form-control incr-update-results" id="increment_litecoin" name="increment_litecoin" type="number" value="{!! $increments->where('name', 'increment_litecoin')->first()->value !!}">
                                    <span class="input-group-addon incr-result">{!! number_format(($ltcAmt+$increments->where('name', 'increment_litecoin')->first()->value),8,'.','')*1 !!}</span>
                                    <div class="form-control-focus"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <label for="increment_dashcoin">Dashcoin Earning Values</label>
                                <div class="input-group has-success">
                                    <span class="input-group-addon incr-value">{!! number_format(($dashAmt = \BCES\Models\AllTransaction::whereCurrency('dashcoin')->sum('amount') + \BCES\Models\TransactionHistory::whereCurrency('DASHCOIN')->sum('balance')),8,'.','')*1 !!}</span>
                                    <input class="form-control incr-update-results" id="increment_dashcoin" name="increment_dashcoin" type="number" value="{!! $increments->where('name', 'increment_dashcoin')->first()->value !!}">
                                    <span class="input-group-addon incr-result">{!! number_format(($dashAmt+$increments->where('name', 'increment_dashcoin')->first()->value),8,'.','')*1 !!}</span>
                                    <div class="form-control-focus"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="spinner-container ajaxFormSpinner">
                        <div class="spinner-frame">
                            <div class="spinner-cover"></div>
                            <div class="spinner-bar"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="portlet light">
                    <form action="{{ route('admin.update-timer') }}" method="post" class="ajax-form-submit">
                        {{ csrf_field() }}

                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-clock font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">ICO Timer</span>
                            </div>

                            <button type="submit" class="btn btn-xs green pull-right"><i class="fa fa-send"></i> <span>Update ICO Timer</span></button>
                            <div class="clearfix"></div>
                        </div>

                        <div class="portlet-body">
                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control form_datetime" name="pre_sale_at" id="form_control_pre_sale_at" value="{!! $ico->pre_sale_at->format('j F Y - H:i') !!}">
                                <label for="form_control_pre_sale_at">Pre sale start time</label>
                                <span class="help-block">update pre sale start time ...</span>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control form_datetime" name="pre_sale_end_at" id="form_control_pre_sale_end_at" value="{!! $ico->pre_sale_end_at->format('j F Y - H:i') !!}">
                                <label for="form_control_pre_sale_end_at">Pre sale ends time</label>
                                <span class="help-block">update pre sale ends time ...</span>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control form_datetime" name="pre_ico_at" id="form_control_pre_ico_at" value="{!! $ico->pre_ico_at->format('j F Y - H:i') !!}">
                                <label for="form_control_pre_ico_at">Pre ICO start time</label>
                                <span class="help-block">update pre initial coin offering time ...</span>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control form_datetime" name="pre_ico_end_at" id="form_control_pre_ico_end_at" value="{!! $ico->pre_ico_end_at->format('j F Y - H:i') !!}">
                                <label for="form_control_pre_ico_end_at">Pre ICO End time</label>
                                <span class="help-block">update pre initial coin offering end time ...</span>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label">
                                <input type="text" class="form-control form_datetime" name="main_ico_at" id="form_control_main_ico_at" value="{!! $ico->main_ico_at->format('j F Y - H:i') !!}">
                                <label for="form_control_main_ico_at">Main ICO start time</label>
                                <span class="help-block">update main initial coin offering time ...</span>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label" style="margin-bottom:1rem">
                                <input type="text" class="form-control form_datetime" name="ico_expire_at" id="form_control_ico_expire_at" value="{!! $ico->ico_expire_at->format('j F Y - H:i') !!}">
                                <label for="form_control_ico_expire_at">ICO expiry time</label>
                                <span class="help-block">update initial coin offering expiry time ...</span>
                            </div>

                            <div class="spinner-container ajaxFormSpinner">
                                <div class="spinner-frame">
                                    <div class="spinner-cover"></div>
                                    <div class="spinner-bar"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-present font-dark"></i>
                            <span class="caption-subject font-dark bold uppercase">ICO Bonuses</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li>
                                <button class="btn btn-default add-week"><i class="fa fa-plus"></i></button>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        @php
                            $bonuses = \BCES\Models\ICOBonus::orderBy('week')->get();
                        @endphp
                        <div class="mt-actions">

                            <div class="mt-action bonus-values">
                                <div class="mt-action-body">
                                    <div class="mt-action-row">
                                        <div class="mt-action-datetime text-left">
                                            <b>{{ $bonuses->where('type', 'Pre Sale')->first()->type }}</b>
                                        </div>
                                        <div class="mt-action-datetime">
                                            Discount <b class="discount">{{ $bonuses->where('type', 'Pre Sale')->first()->discount }}</b>%
                                        </div>
                                        <div class="mt-action-buttons text-right">
                                            <div class="btn-group btn-group-circle">
                                                <button type="button" class="btn btn-outline edit-values blue btn-sm">Edit</button>
                                                <button type="button" class="btn btn-outline delete-values red btn-sm" data-route="{{ route('admin.bonus.update', $bonuses->where('type', 'Pre Sale')->first()->id) }}">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-action bonus-inputs">
                                <div class="mt-action-body">
                                    <form action="{{ route('admin.bonus.update', $bonuses->where('type', 'Pre Sale')->first()->id) }}" method="post">
                                        <div class="mt-action-row">
                                            <div class="mt-action-datetime text-left">
                                                <input placeholder="Type of discount" name="type" class="form-control" type="text" value="{{ $bonuses->where('type', 'Pre Sale')->first()->type }}" disabled>
                                            </div>
                                            <div class="mt-action-datetime">
                                                <input placeholder="Discount %" name="discount" class="form-control" type="number" value="{{ $bonuses->where('type', 'Pre Sale')->first()->discount }}">
                                            </div>
                                            <div class="mt-action-buttons text-right">
                                                <div class="btn-group btn-group-circle">
                                                    <button type="submit" class="btn btn-outline blue btn-sm"><i class="fa fa-save"></i> save</button>
                                                    <button type="button" class="btn btn-outline close-inputs red btn-sm"><i class="fa fa-remove"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-action bonus-values">
                                <div class="mt-action-body">
                                    <div class="mt-action-row">
                                        <div class="mt-action-datetime text-left">
                                            <b>{{ $bonuses->where('type', 'Pre ICO')->first()->type }}</b>
                                        </div>
                                        <div class="mt-action-datetime">
                                            Discount <b class="discount">{{ $bonuses->where('type', 'Pre ICO')->first()->discount }}</b>%
                                        </div>
                                        <div class="mt-action-buttons text-right">
                                            <div class="btn-group btn-group-circle">
                                                <button type="button" class="btn btn-outline edit-values blue btn-sm">Edit</button>
                                                <button type="button" class="btn btn-outline delete-values red btn-sm" data-route="{{ route('admin.bonus.update', $bonuses->where('type', 'Pre ICO')->first()->id) }}">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-action bonus-inputs">
                                <div class="mt-action-body">
                                    <form action="{{ route('admin.bonus.update', $bonuses->where('type', 'Pre ICO')->first()->id) }}" method="post">
                                        <div class="mt-action-row">
                                            <div class="mt-action-datetime text-left">
                                                <input placeholder="Type of discount" name="type" class="form-control" type="text" value="{{ $bonuses->where('type', 'Pre ICO')->first()->type }}" disabled>
                                            </div>
                                            <div class="mt-action-datetime">
                                                <input placeholder="Discount %" name="discount" class="form-control" type="number" value="{{ $bonuses->where('type', 'Pre ICO')->first()->discount }}">
                                            </div>
                                            <div class="mt-action-buttons text-right">
                                                <div class="btn-group btn-group-circle">
                                                    <button type="submit" class="btn btn-outline blue btn-sm"><i class="fa fa-save"></i> save</button>
                                                    <button type="button" class="btn btn-outline close-inputs red btn-sm"><i class="fa fa-remove"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @foreach($bonuses->where('week', '!=', 0) as $bonus)
                                <div class="mt-action bonus-values">
                                    <div class="mt-action-body">
                                        <div class="mt-action-row">
                                            <div class="mt-action-datetime text-left">
                                                @if($bonus->type!='week')
                                                    <b>{{ $bonus->type }}</b>
                                                @else
                                                    Week no. <b class="week">{{ $bonus->week }}</b>
                                                @endif
                                            </div>
                                            <div class="mt-action-datetime">
                                                Discount <b class="discount">{{ $bonus->discount }}</b>%
                                            </div>
                                            <div class="mt-action-buttons text-right">
                                                <div class="btn-group btn-group-circle">
                                                    <button type="button" class="btn btn-outline edit-values blue btn-sm">Edit</button>
                                                    <button type="button" class="btn btn-outline delete-values red btn-sm" data-route="{{ route('admin.bonus.update', $bonus->id) }}">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-action bonus-inputs">
                                    <div class="mt-action-body">
                                        <form action="{{ route('admin.bonus.update', $bonus->id) }}" method="post">
                                            <div class="mt-action-row">
                                                <div class="mt-action-datetime text-left">
                                                    @if($bonus->type == 'week')
                                                        <input placeholder="Week no" name="week" class="form-control" type="number" value="{{ $bonus->week }}">
                                                    @else
                                                        <input placeholder="Type of discount" name="type" class="form-control" type="text" value="{{ $bonus->type }}" disabled>
                                                    @endif
                                                </div>
                                                <div class="mt-action-datetime">
                                                    <input placeholder="Discount %" name="discount" class="form-control" type="number" value="{{ $bonus->discount }}">
                                                </div>
                                                <div class="mt-action-buttons text-right">
                                                    <div class="btn-group btn-group-circle">
                                                        <button type="submit" class="btn btn-outline blue btn-sm"><i class="fa fa-save"></i> save</button>
                                                        <button type="button" class="btn btn-outline close-inputs red btn-sm"><i class="fa fa-remove"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            <div class="mt-action bonus-values">
                                <div class="mt-action-body">
                                    <div class="mt-action-row">
                                        <div class="mt-action-datetime text-left">
                                            <b>{{ $bonuses->where('type', 'Remaining days')->first()->type }}</b>
                                        </div>
                                        <div class="mt-action-datetime">
                                            Discount <b class="discount">{{ $bonuses->where('type', 'Remaining days')->first()->discount }}</b>%
                                        </div>
                                        <div class="mt-action-buttons text-right">
                                            <div class="btn-group btn-group-circle">
                                                <button type="button" class="btn btn-outline edit-values blue btn-sm">Edit</button>
                                                <button type="button" class="btn btn-outline delete-values red btn-sm" data-route="{{ route('admin.bonus.update', $bonuses->where('type', 'Remaining days')->first()->id) }}">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-action bonus-inputs">
                                <div class="mt-action-body">
                                    <form action="{{ route('admin.bonus.update', $bonuses->where('type', 'Remaining days')->first()->id) }}" method="post">
                                        <div class="mt-action-row">
                                            <div class="mt-action-datetime text-left">
                                                <input placeholder="Type of discount" name="type" class="form-control" type="text" value="{{ $bonuses->where('type', 'Remaining days')->first()->type }}" disabled>
                                            </div>
                                            <div class="mt-action-datetime">
                                                <input placeholder="Discount %" name="discount" class="form-control" type="number" value="{{ $bonuses->where('type', 'Remaining days')->first()->discount }}">
                                            </div>
                                            <div class="mt-action-buttons text-right">
                                                <div class="btn-group btn-group-circle">
                                                    <button type="submit" class="btn btn-outline blue btn-sm"><i class="fa fa-save"></i> save</button>
                                                    <button type="button" class="btn btn-outline close-inputs red btn-sm"><i class="fa fa-remove"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-action bonus-add">
                                <div class="mt-action-body">
                                    <form action="{{ route('admin.bonus.add') }}" method="post">
                                        <div class="mt-action-row">
                                            <div class="mt-action-datetime text-left">
                                                <input placeholder="Week no" name="week" class="form-control" type="number">
                                                <input name="type" type="hidden" value="week">
                                            </div>
                                            <div class="mt-action-datetime">
                                                <input placeholder="Discount %" name="discount" class="form-control" type="number">
                                            </div>
                                            <div class="mt-action-buttons text-right">
                                                <div class="btn-group btn-group-circle">
                                                    <button type="submit" class="btn btn-outline blue btn-sm"><i class="fa fa-save"></i> save</button>
                                                    <button type="button" class="btn btn-outline red btn-sm close-add"><i class="fa fa-remove"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body form-body"></div>
                        <div class="modal-footer">
                            <button type="submit" class="btn green"><i class="fa fa-send"></i> <span>Update Token Address</span></button>
                        </div>
                    </form>
                    <div class="spinner-container" id="basicModalSpinner">
                        <div class="spinner-frame">
                            <div class="spinner-cover"></div>
                            <div class="spinner-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
@endsection

@section('js')
    <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            App.setAssetsPath('/assets/');

            $(document).on('click', '.import-pool-address', function () {
                console.log(this);
                $('.import-pool-address-input').click();
            }).on('change', '.import-pool-address-input', function () {
                var $e = $(this);

                $('.import-pool-address').button('loading');

                if (this.files.length) {
                    var formData = new FormData();
                    formData.append('avatar', this.files[0]);
                    axios.post('/api/file/upload', formData).then(function (r) {
                        $gridM.getDataTable().ajax.reload();
                        setTimeout(function () {
                            $gridltc.getDataTable().ajax.reload();
                            setTimeout(function () {
                                $griddash.getDataTable().ajax.reload();
                            }, 500);
                        }, 500);
                        $('.import-pool-address').button('reset');
                        $e.parent()[0].reset();
                    });
                }
            });

            var $gridM = new Datatable();
            var $datatableM = $('#datatable_manual');
            $gridM.init({
                src: $datatableM,
                dataTable: {
                    bStateSave: true,
                    lengthMenu: [
                        [10, 20, 50, 80, 100],
                        [10, 20, 50, 80, 100]
                    ],
                    pageLength: 20,
                    ajax: {
                        url: '/admin/pools/bitcoin'
                    },
                    columnDefs: [{
                        orderable: true
                    }],
                    order: [
                        [0, 'desc']
                    ]
                }
            });

            var $datatableltc = $('#datatable_ltc');
            var $gridltc = new Datatable();
            $gridltc.init({
                src: $datatableltc,
                dataTable: {
                    bStateSave: true,
                    lengthMenu: [
                        [10, 20, 50, 80, 100],
                        [10, 20, 50, 80, 100]
                    ],
                    pageLength: 20,
                    ajax: {
                        url: '/admin/pools/litecoin'
                    },
                    columnDefs: [{
                        orderable: true
                    }],
                    order: [
                        [0, 'desc']
                    ]
                }
            });

            var $datatabledash = $('#datatable_dash');
            var $griddash = new Datatable();
            $griddash.init({
                src: $datatabledash,
                dataTable: {
                    bStateSave: true,
                    lengthMenu: [
                        [10, 20, 50, 80, 100],
                        [10, 20, 50, 80, 100]
                    ],
                    pageLength: 20,
                    ajax: {
                        url: '/admin/pools/dashcoin'
                    },
                    columnDefs: [{
                        orderable: true
                    }],
                    order: [
                        [0, 'desc']
                    ]
                }
            });

            $('.pool-address-table').on('click', '.row-actions a[data-action]', function () {
                var $e = $(this);
                var $type = $e.data('action');
                var $modal = $('#basicModal');
                var url = '/admin/user/pools/' + $e.parents('.row-actions').data('action');

                if ($type === 'edit')
                    axios.get(url).then(function (r) {
                        $modal.find('button[type="submit"] span').html('Update Token Address');
                        $modal.find('.modal-title').html(r.headers.title);
                        $modal.find('.modal-body').html(r.data);
                        $modal.find('form').attr('action', url);
                        $modal.find('form').attr('method', 'post');
                        $modal.modal('show');
                        setTimeout(function () {
                            $($modal.find('.modal-body .form-control').get().reverse()).each(function (i, e) {
                                $(e).focus();
                            });
                        }, 600);
                    });
            });

            $('#basicModal').on('submit', 'form', function (e) {
                e.preventDefault();
                var $e = $(this);
                var $spinner = $('#basicModalSpinner').show();

                axios[$e.attr('method')]($e.attr('action'), $e.serialize()).then(function (r) {
                    new Noty({
                        type: r.data.type,
                        text: '<div><p class="m-0">' + r.data.message + '</p></div>'
                    }).show();
                    $spinner.hide();
                    $('#basicModal').modal('hide');
                }).catch(function (r) {
                    $spinner.hide();
                });

                return false;
            });

            $('.table-refresh-manual').click(function () {
                $gridM.getDataTable().ajax.reload();
            });

            $('.table-refresh-ltc').click(function () {
                $gridltc.getDataTable().ajax.reload();
            });

            $('.table-refresh-dash').click(function () {
                $griddash.getDataTable().ajax.reload();
            });

            $('.form_datetime').datetimepicker({
                autoclose: !0,
                isRTL: App.isRTL(),
                format: 'dd MM yyyy - hh:ii',
                fontAwesome: !0,
                pickerPosition: App.isRTL() ? "bottom-right" : "bottom-left"
            });

            $('.incr-update-results').keyup(function () {
                var $e = $(this);
                var timer = 0;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    console.log($e.val());
                    $e.next().html();
                    $e.next().html(Math.round((parseFloat($e.prev().html()) + parseFloat($e.val())) * 100000000) / 100000000);
                }, 300);
            });
        });
    </script>
@endsection
