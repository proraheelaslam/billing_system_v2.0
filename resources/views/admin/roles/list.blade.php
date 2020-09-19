@extends('layouts.adminLayout.admin_design')
@section('content')

<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Users
                @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block ajaxAlert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif
                @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif
            </header>

            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped data-table" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->

<script type="text/javascript">
    $(document).ready(function() {
        let url = '{{ url('admin/roles/get-ajax') }}';
        let columns = [
            {data: 'id', name: 'id', "width": "30%"},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action'}
        ];
        createDatable(url, columns, [0],'roles');
    });
</script>
@endsection