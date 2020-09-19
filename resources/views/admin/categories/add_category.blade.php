@extends('layouts.adminLayout.admin_design')
@section('content')

{!! Form::open(['url' => 'admin/categories', 'data-toggle' => 'validator','data-disable' => 'false', 'class' => 'form-horizontal', 'files' => true]) !!}

@include ('admin.categories.category_form')

{!! Form::close() !!}

@endsection