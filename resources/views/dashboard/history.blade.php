@extends('dashboard.layouts.layout')

@section('title', 'Transaction History')

@section('content')
    <div class="panel panel-primary margin-top-50 margin-bottom-70 sm-top-30-p">
        <div class="panel-heading">Transaction History</div>
        <div class="panel-body padding-80">
            @php
                $history = \Auth::user()->history;
            @endphp

            <div class="table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Token Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($history as $item)
                        <tr>
                            <td>{!! $item->created_at !!}</td>
                            <td>{!! $item->address  !!}</td>
                            <td>{!! $item->currency !!}</td>
                            <td>{!! number_format($item->balance,8)*1 !!}</td>
                            <td>{!! number_format($item->bnes,8)*1 !!}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <h2 style="color: #fff">You have no transactions yet. Would you like to invest?</h2>
                                <p><a class="btn btn-default btn-lg invest-btn buy-token" href="{{ route('dashboard.purchased') }}">Invest</a>
                                </p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
