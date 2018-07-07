@extends('admin.layouts.layout')

@section('title', 'Admin Dashboard | ')

@section('content')
    <h1 class="page-title"> @if($type=='unknown') {{ ucfirst($type) }} Transactions @else Transaction States @endif
        <small>see all transactions of {{ $type }}.</small>
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
                <a href="javascript:">{{ ucfirst($type) }} Transactions</a>
            </li>
        </ul>
    </div>

    <div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Transactions of {{ $type=='known'?'members':ucfirst($type) }}</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
                        <button class="btn btn-sm btn-default table-refresh"><i class="fa fa-refresh"></i></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="heading">
                            @if($type=='known')
                                <th>Date</th>
                                <th>Member Email</th>
                                <th>Member Name</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                <th>Token</th>
                            @else
                                <th>Date</th>
                                <th>From Address</th>
                                <th>To Address</th>
                                <th>Currency</th>
                                <th>Amount</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            App.setAssetsPath('/assets/');

            var $grid = new Datatable();

            var $datatable = $('#datatable_ajax');

            $grid.init({
                src: $datatable,
                onSuccess: function (grid, response) {
                    //
                },
                dataTable: {
                    bStateSave: true,
                    lengthMenu: [
                        [10, 20, 50, 80, 100],
                        [10, 20, 50, 80, 100]
                    ],
                    pageLength: 20,
                    ajax: {
                        url: '/admin/transactions/{{ $type }}'
                    },
                    columnDefs: [{
                        orderable: true
                    }],
                    order: [
                        [0, 'desc']
                    ]
                }
            });

            $('.table-refresh').click(function () {
                $grid.getDataTable().ajax.reload();
            });
        });
    </script>
@endsection
