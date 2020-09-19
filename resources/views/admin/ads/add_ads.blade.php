@extends('layouts.adminLayout.admin_design')
@section('content')

{!! Form::open(['url' => 'admin/ads', 'data-toggle' => 'validator','data-disable' => 'false', 'class' => 'form-horizontal', 'files' => true]) !!}

@include ('admin.ads.ads_form')

{!! Form::close() !!}

@endsection