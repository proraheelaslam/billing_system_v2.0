@extends('layouts.adminLayout.admin_design')
@section('content')


<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                {{ trans('app.title') }}
                @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
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
            
                
                <div style="display:none;" class="alert alert-success alert-block ajaxAlert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong></strong>
                </div>    
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  id="datatable" class="display table table-bordered table-striped data-table" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __("Name")}}</th>
                                <th>{{ __("Discription")}}</th>
                                <th>{{ __("Actions")}}</th>
                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>{{ __("Name")}}</th>
                                <th>{{ __("Discription")}}</th>
                                <th>{{ __("Actions")}}</th>
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




//Load yajra data into the listing:
 $(document).ready(function() {
     $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/categories/get-ajax') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });

</script>
@endsection