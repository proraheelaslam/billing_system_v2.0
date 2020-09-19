@extends('layouts.adminLayout.admin_design')
@section('content')

{!! Form::model($user, [
                'method' => 'PUT',
                'url' => ['admin/users',$user->id],
                'class' => 'form-horizontal',
                'files' => true,
                'data-toggle' => 'validator',
                'data-disable' => 'false',
                'id' =>'user_form'
                ]) !!}
                
                @include ('admin.users.form', ['submitButtonText' => 'Edit'])

            {!! Form::close() !!}

@endsection