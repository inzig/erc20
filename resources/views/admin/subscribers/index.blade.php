@extends('admin.layouts.layout')

@section('title', 'Admin Dashboard | ')

@section('content')
    <h1 class="page-title"> Admin Dashboard
        <small>delete subscribers</small>
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
                <a href="{{ route('admin.subscribe') }}">Subscribers</a>
            </li>
        </ul>
    </div>

    <div>
        <div class="note note-info">
            <p> Admin can delete subscribers </p>
        </div>

        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Subscribers</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
                        <div class="btn-group">
                            <a class="btn green btn-outline btn-sm" href="javascript:" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                                <span class="hidden-xs"> Export </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" id="datatable_ajax_tools">
                                <li><a href="javascript:" data-action="0" class="tool-action"><i class="fa fa-file-excel-o"></i> Excel</a></li>
                                <li><a href="javascript:" data-action="1" class="tool-action"><i class="icon-cloud-upload"></i> CSV</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-sm btn-default table-refresh"><i class="fa fa-refresh"></i></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="heading">
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Date</th>
                            <th>Actions</th>
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
                dataTable: {
                    bStateSave: true,
                    lengthMenu: [
                        [10, 20, 50, 80, 100],
                        [10, 20, 50, 80, 100]
                    ],
                    pageLength: 20,
                    ajax: {
                        url: '/admin/subscribe'
                    },
                    columnDefs: [{
                        orderable: true
                    }],
                    order: [
                        [0, 'desc']
                    ],
                    buttons: [
                        {extend: 'excel', className: 'btn yellow btn-outline '},
                        {extend: 'csv', className: 'btn purple btn-outline '}
                    ]
                }
            });

            $('#datatable_ajax_tools > li > a.tool-action').on('click', function () {
                $grid.getDataTable().button($(this).attr('data-action')).trigger();
            });

            $datatable.on('click', '.row-actions a[data-action]', function () {
                var $e = $(this);

                if ($e.data('action') === 'delete')
                    var n = new Noty({
                        text: 'Are you sure to delete platform',
                        buttons: [
                            Noty.button('YES ', 'btn btn-success', function () {
                                axios.delete('/admin/subscribe/' + $e.parents('.row-actions').data('action')).then(function (r) {
                                    n.close();
                                    new Noty({
                                        type: r.data.type,
                                        text: '<div><p class="m-0">' + r.data.message + '</p></div>'
                                    }).show();
                                    $grid.getDataTable().ajax.reload();
                                });
                            }, {id: 'button1', 'data-status': 'ok'}),

                            Noty.button('NO', 'btn btn-error', function () {
                                console.log('button 2 clicked');
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
