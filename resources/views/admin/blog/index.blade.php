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
                <a href="javascript:">Admin Dashboard</a>
            </li>
        </ul>
    </div>

    <div>
        <div class="note note-info">
            <p> Admin must add or update blog </p>
        </div>

        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Blog</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
                        <button class="btn btn-sm btn-default add-address"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-sm btn-default table-refresh"><i class="fa fa-refresh"></i></button>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="heading">
                            <th>title</th>
                            <th>description</th>
                            <th>Actions</th>


                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
                        url: '/admin/blog'
                    },
                    columnDefs: [{
                        orderable: true
                    }],
                    order: [
                        [0, 'desc']
                    ]
                }
            });

            $datatable.on('click', '.row-actions a[data-action]', function () {
                var $e = $(this);
                var $type = $e.data('action');
                var $modal = $('#basicModal');

                    if ($type === 'edit')
                    axios.get('/admin/blog/edit/'+$e.parents('.row-actions').data('action')).then(function (r) {
                        $modal.find('button[type="submit"] span').html('Update blog post');
                        $modal.find('.modal-title').html(r.headers.title);
                        $modal.find('.modal-body').html(r.data);
                        $modal.modal('show');
                        setTimeout(function () {
                            $($modal.find('.modal-body .form-control').get().reverse()).each(function (i, e) {
                                $(e).focus();
                            });
                        }, 600);
                    });
            });

            $('.add-address').click(function () {
                var $modal = $('#basicModal');
                axios.get('/admin/blog/create').then(function (r) {
                    $modal.find('button[type="submit"] span').html('Add new blog post');
                    $modal.find('.modal-title').html(r.headers.title);
                    $modal.find('.modal-body').html(r.data);
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

                axios.patch('/admin/blog/add', $e.serialize()).then(function (r) {
                    new Noty({
                        type: r.data.type,
                        text: '<div><p class="m-0">' + r.data.message + '</p></div>'
                    }).show();
                    $grid.getDataTable().ajax.reload();
                    $spinner.hide();
                    $('#basicModal').modal('hide');
                });

                return false;
            });

            $('.table-refresh').click(function () {
                $grid.getDataTable().ajax.reload();
            });
        });
    </script>
@endsection
