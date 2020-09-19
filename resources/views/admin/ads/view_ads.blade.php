@extends('layouts.adminLayout.admin_design')
@section('content')


<!-- page start-->

<div class="row">
    <div class="col-sm-6">
        <a style="margin-bottom:10px;" href="{{url('admin/ads/create')}}" class="btn btn-primary">Add new</a>
    </div>

</div>
@include('layouts.adminLayout.flash_messages')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">

            <header class="panel-heading">
                 Ads

            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  id="datatable" class="display table table-bordered table-striped data-table" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Ads</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

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
        ajax: "{{ url('admin/ads/get-ajax') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'ads', name: 'ads'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });

</script>
@endsection