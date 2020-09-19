@extends('layouts.adminLayout.admin_design')
@section('content')

{!! Form::model($categoryDetails, [
                'method' => 'PUT',
                'url' => ['admin/categories', $categoryDetails->id],
                'class' => 'form-horizontal',
                'files' => true,
                'data-toggle' => 'validator',
                'data-disable' => 'false',
                'id' =>'category_form'
                ]) !!}
                
                @include ('admin.categories.category_form', ['submitButtonText' => 'Edit'])

            {!! Form::close() !!}

@endsection