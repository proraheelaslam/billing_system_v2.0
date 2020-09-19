@extends('layouts.adminLayout.admin_design')
@section('content')
{!! Form::open(['url' => 'admin/roles', 'data-toggle' => 'validator','data-disable' => 'false', 'class' => 'form-horizontal', 'files' => true]) !!}

@include ('admin.roles.form')

{!! Form::close() !!}

@endsection