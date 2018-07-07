@extends('admin.layouts.layout')

@section('title', 'Admin Dashboard | ')

@section('content')
    <h1 class="page-title"> Manual Transactions
        <small>see all manual transactions, approve and send.</small>
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
                <a href="javascript:">Manual Transactions</a>
            </li>
        </ul>
    </div>

    <div>
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">All pending transactions</span>
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
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>ETH Address</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Token</th>
                            <th>Action</th>
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
                        url: '/admin/manual/transactions'
                    },
                    columnDefs: [{
                        orderable: true
                    }],
                    order: [
                        [0, 'desc']
                    ]
                }
            });

            $datatable.on('click', '.btn-approve', function () {
                var $e = $(this);

                var n = new Noty({
                    text: 'Are you sure to approve transfer ?',
                    buttons: [
                        Noty.button('YES ', 'btn btn-success', function () {
                            n.close();
                            $e.button('loading');
                            axios.post($e.data('url')).then(function (r) {
                                $e.button('reset');
                                $grid.getDataTable().ajax.reload();
                                new Noty({
                                    type: 'success',
                                    text: '<div><p class="m-0">Transfer has been approved.</p></div>'
                                }).show();
                            });
                        }, {id: 'button1', 'data-status': 'ok'}),

                        Noty.button('NO', 'btn btn-error', function () {
                            n.close();
                        })
                    ]
                }).show();
            });

            $('.table-refresh').click(function () {
                $grid.getDataTable().ajax.reload();
            });
        });
    </script>
@endsection
