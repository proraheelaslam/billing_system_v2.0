
<div class="row">
    <div class="col-lg-12">
        <section class="panel"></section>
            <header class="panel-heading">
               Add Ads

            </header>
            <div class="panel-body">
                @include('layouts.adminLayout.flash_messages')
                <div class=" form" id="add_ads_form">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}"> 
                            {!! Form::label('name', 'Name', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                            {!! Form::text('name', null, ['class' => ' form-control', 'required', 'id' => 'name', 'placeholder' => 'Name']) !!}
                            {!! $errors->first('name', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Description', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'placeholder'=>'Description', 'rows' => '5', 'id' => 'description']) !!}
                                {!! $errors->first('description', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Duration (days)', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                <select class="form-control" name="duration">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4"> 4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Ads', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                @if(isset($ads))
                                    <img style="width: 20%; height: 20%" src="{{@$ads->fullImage}}"/>
                                    @endif
                                <input type="file" value="{{@$ads->fullImage}}" name="image" class="add_img" >
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                </div>

            </div>
        </section>
    </div>
</div>


@section('scripts')

    <script>
        $(document).ready(function () {
            //add_ads_form

            $('.add_img').fileuploader({
                // Options will go here
                limit: 20,
                maxSize: 50,

                addMore: true,

                theme: 'dropin',
                upload: true,
             
            });
        });
    </script>

@endsection