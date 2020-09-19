<div class="rows">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                {{ $usertitle }}
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class=" form">
                    {{ $usertitle }}
                    <form class="cmxform form-horizontal " id="commentForm" method="get" action="">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Name', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('name', null, ['class' => ' form-control', 'required', 'id' => 'name', 'placeholder' => 'Your Name']) !!}
                                {!! $errors->first('name', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            {!! Form::label('email', 'Email', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                            {!! Form::text('email', null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Email']) !!}
                            {!! $errors->first('email', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            {!! Form::label('password', 'Password', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                {!! Form::password('password', ['class' => 'form-control', 'required', 'id' => 'password',
                                'placeholder' => 'Password']) !!}
                                {!! $errors->first('password', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('confirm-password') ? 'has-error' : ''}}">
                            {!! Form::label('confirm-password', 'Confirm Password', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                {!! Form::password('confirm-password', ['class' => ' form-control', 'required', 'id' => 'confirmpassword', 'placeholder' => 'Confirm Password']) !!}
                                {!! $errors->first('confirm-password', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
                            {!! Form::label('roles', 'Roles', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                            {{Form::select('roles',$roles,isset($roles)?@$userRole:null,array('multiple'=>'multiple','name'=>'roles[]', 'class' => 'form-control', 'id' => 'multipleSelected'))}}
                            {!! $errors->first('roles', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>


                        </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' =>
                                'btn btn-primary']) !!}
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>