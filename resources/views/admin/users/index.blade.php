@extends('admin.layouts.layout')

@section('title', 'Users and Profiles | ')

@section('content')
    <h1 class="page-title"> Members profile
        <small>all user's list and profile</small>
    </h1>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{!! route('admin.index') !!}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <i class="fa fa-user"></i>
                <a href="javascript:">Members and profile</a>
            </li>
        </ul>
    </div>

    <div>
        <!-- BEGIN RESPONSIVE TABLE PORTLET-->
        <div class="portlet light p-r">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>
                    All members list and profile
                </div>
                <div class="tools">
                    <a href="javascript:" class="collapse"> </a>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Active</th>
                            <th>Login Confirm</th>
                            <th>Registered</th>
                            <th>Action</th>
                        </tr>
                        <tr role="row" class="filter">
                            <td><input type="text" placeholder="Search by ID number" class="form-control form-filter input-sm" name="user_id"></td>
                            <td><input type="text" placeholder="Search by Name" class="form-control form-filter input-sm" name="name"></td>
                            <td><input type="text" placeholder="Search by Email" class="form-control form-filter input-sm" name="email"></td>
                            <td><input type="text" placeholder="Search by Address" class="form-control form-filter input-sm" name="address"></td>
                            <td><input type="text" placeholder="Search by Active" class="form-control form-filter input-sm" name="activated"></td>
                            <td><input type="text" placeholder="Search by Login Confirm" class="form-control form-filter input-sm" name="oauth"></td>
                            <td><input type="text" placeholder="Search by m/d/Y H:i" class="form-control form-filter input-sm" name="created_at"></td>
                            <td>
                                <button class="btn btn-sm green btn-outline filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                            </td>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <!-- END RESPONSIVE TABLE PORTLET-->

            <div class="spinner-container" id="spinner">
                <div class="spinner-frame">
                    <div class="spinner-cover"></div>
                    <div class="spinner-bar"></div>
                </div>
            </div>
        </div>

        <div id="testView"></div>

        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 0.5rem !important;margin-left:1rem"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">
                                <span></span>'s information
                                <button type="button" class="btn btn-sm red remove-user pull-right"><i class="fa fa-remove"></i> Delete User</button>
                            </h3>
                        </div>
                        <div class="modal-body form-body"></div>
                        <div class="modal-footer">
                            <button type="submit" class="btn green"><i class="fa fa-send"></i> Update User</button>
                            <div class="clearfix"></div>
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
    <style type="text/css">
        #datatable_ajax_wrapper .table-responsive {
            overflow: inherit !important;
        }

        #basicModal .modal-body {
            color: #330f55;
        }
    </style>
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
                        url: '{{route('admin.users.get')}}'
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

            $datatable.on('click', '.row-actions a[data-action]', function () {
                var $e = $(this);
                var $type = $e.data('action');
                var $modal = $('#basicModal');

                if ($type === 'show' || $type === 'edit')
                    $.get('/admin/users/' + $type + '/' + $e.parents('.row-actions').data('action')).then(function (r, s, req) {
                        $modal.find('.modal-body').html(r);

                        if ($type === 'edit') {
                            $modal.find('.modal-dialog').removeClass('modal-lg');
                            $modal.find('.modal-footer [type="submit"]').show();
                            $modal.find('.modal-footer').show();
                            $modal.find('form').attr('action', '{{route('admin.users.update', '__ID__')}}'.replace('__ID__', $e.parents('.row-actions').data('action')));
                        } else {
                            $modal.find('.modal-dialog').addClass('modal-lg');
                            $modal.find('.modal-footer [type="submit"]').hide();
                            $modal.find('.modal-footer').hide();
                        }

                        $modal.find('.remove-user').data('url', '{{route('admin.users.destroy', '__ID__')}}'.replace('__ID__', $e.parents('.row-actions').data('action')));

                        $modal.find('.modal-title span').html(req.getResponseHeader('name'));

                        $modal.modal('show');

                        setTimeout(function () {
                            $($modal.find('.modal-body .form-control').get().reverse()).each(function (i, e) {
                                $(e).focus();
                            });
                        }, 600);
                    });
            });

            $('.table-refresh').click(function () {
                $grid.getDataTable().ajax.reload();
            });

            $('#datatable_ajax_tools > li > a.tool-action').on('click', function() {
                $grid.getDataTable().button($(this).attr('data-action')).trigger();
            });

            $('#basicModal').on('submit', 'form', function (e) {
                e.preventDefault();
                var $form = $(this);

                axios.patch($form.attr('action'), $form.serialize()).then(function (r) {
                    new Noty({
                        type: 'success',
                        text: '<div><p class="m-0">' + r.data.name + '\'s information has been updated.</p></div>'
                    }).show();
                    $('#basicModal').modal('hide');
                    $grid.getDataTable().ajax.reload();
                });

                return false;
            }).on('click', 'button.remove-user', function () {
                var $e = $(this);
                var n = new Noty({
                    text: 'Are you sure to delete member ?',
                    buttons: [
                        Noty.button('YES ', 'btn btn-success', function () {
                            axios.delete($e.data('url')).then(function (r) {
                                n.close();
                                new Noty({
                                    type: 'error',
                                    text: '<div><p class="m-0">' + r.data.name + '\'s information has been deleted.</p></div>'
                                }).show();
                                $grid.getDataTable().ajax.reload();
                                $('#basicModal').modal('hide');
                            });
                        }, {id: 'button1', 'data-status': 'ok'}),

                        Noty.button('NO', 'btn btn-error', function () {
                            n.close();
                        })
                    ]
                }).show();
            });
        });
    </script>
@endsection
