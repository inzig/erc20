@extends('admin.layouts.layout')

@section('title', 'Settings of application | ')

@section('content')
    <h1 class="page-title"> Settings Page
        <small> for application</small>
    </h1>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{!! route('admin.index') !!}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <i class="fa fa-cog"></i>
                <a href="{{ route('admin.setting') }}" >Settings</a>
            </li>
        </ul>
    </div>

    <div>
        <div class="note note-info">
            <p> All settings for application. You can edit any setting. </p>
        </div>

        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>
                    All settings
                </div>
                <div class="tools">
                    <a href="javascript:" class="collapse"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped settings-list m-0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $setting)
                        <tr>
                            <td>{{ ucfirst(str_replace('_', ' ', $setting->name)) }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>
                                <button data-action="{{$setting->id}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> edit</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="spinner-container" id="spinner">
                <div class="spinner-frame">
                    <div class="spinner-cover"></div>
                    <div class="spinner-bar"></div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><span></span>'s Value</h4>
                        </div>
                        <div class="modal-body form-body"></div>
                        <div class="modal-footer">
                            <button type="submit" class="btn green"><i class="fa fa-send"></i> Update Setting</button>
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
    <script>
        jQuery(document).ready(function ($) {
            $('#basicModal').on('submit', 'form', function (e) {
                e.preventDefault();

                $('#basicModalSpinner').show();

                var $e = $(this);
                var formData = $e.serializeArray()[0];

                axios.post('/admin/settings/' + formData.name, {data: formData.value}).then(function (r) {
                    window.location.reload();
                });

                return false;
            });

            $('.settings-list button[data-action]').click(function () {
                var $e = $(this);
                var $modal = $('#basicModal');
                axios.get('/admin/setting/' + $e.data('action')).then(function (r) {
                    $modal.find('.modal-title span').html($e.parent().prev().prev().html().replace(/_/g, ' ').toAllCapitalizeCase());
                    $modal.find('.modal-body').html(r.data);
                    $modal.modal('show');
                    setTimeout(function () {
                        $($modal.find('.modal-body .form-control').get().reverse()).each(function (i, e) {
                            $(e).focus();
                        });
                    }, 200);
                });
            });
        });
    </script>
@endsection
