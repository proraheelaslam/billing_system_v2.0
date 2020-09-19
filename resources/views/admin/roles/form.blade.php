<div class="rows">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                {{ $roletitle }}
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class=" form">
                    {{ $roletitle }}
                    <form class="cmxform form-horizontal " id="commentForm" method="get" action="">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Name', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                {!! Form::text('name', null, ['class' => ' form-control', 'required', 'id' => 'name', 'placeholder' => 'Your Name']) !!}
                                {!! $errors->first('name', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('permission') ? 'has-error' : ''}}">
                            {!! Form::label('permission', 'Permission', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6 radioButtonTopPadding">

                            @foreach ($permissions as $key => $permission)
                                {!! Form::label(lcfirst($permission->name), str_replace('_', ' ', ucwords($permission->name))) !!}
                                {!! Form::checkbox('permission[]', lcfirst($permission->name),in_array($permission->id, @$rolePermissions),['class' => 'md-check', 'id' => $permission->id] ) !!}
                            @endforeach
                            {!! $errors->first('permission', '<p class="errors">:message</p>') !!}
                        
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