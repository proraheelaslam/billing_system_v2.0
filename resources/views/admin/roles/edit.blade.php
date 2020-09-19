@extends('layouts.adminLayout.admin_design')
@section('content')

{!! Form::model($role, [
                'method' => 'PUT',
                'url' => ['admin/roles',$role->id],
                'class' => 'form-horizontal',
                'files' => true,
                'data-toggle' => 'validator',
                'data-disable' => 'false',
                'id' =>'role_form'
                ]) !!}
                
                @include ('admin.roles.form', ['submitButtonText' => 'Edit'])

            {!! Form::close() !!}

@endsection