@extends('layouts.adminLayout.admin_design')
@section('content')
{!! Form::open(['url' => 'admin/users', 'data-toggle' => 'validator','data-disable' => 'false', 'class' => 'form-horizontal', 'files' => true]) !!}

@include ('admin.users.form')

{!! Form::close() !!}

@endsection