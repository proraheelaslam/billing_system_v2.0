@extends('layouts.adminLayout.admin_design')
@section('content')

{!! Form::model($ads, [
                'method' => 'PUT',
                'url' => ['admin/ads', $ads->id],
                'class' => 'form-horizontal',
                'files' => true,
                'data-toggle' => 'validator',
                'data-disable' => 'false',
                'id' =>'category_form'
                ]) !!}
                
                @include ('admin.ads.ads_form', ['submitButtonText' => 'Edit'])

            {!! Form::close() !!}

@endsection