<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js" ></script>

<div class="row">
    <div class="col-lg-12">
        <section class="panel"></section>
            <header class="panel-heading">
            {{ $categoriestitle }}
            
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class=" form">
                {{ $categoriestitle }}
                    <form class="cmxform form-horizontal " id="commentForm" method="get" action="">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}"> 
                            {!! Form::label('name', 'Name (required)', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                            {!! Form::text('name', null, ['class' => ' form-control', 'required', 'id' => 'name', 'placeholder' => 'Your Name']) !!}
                            {!! $errors->first('name', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('radiobutton') ? 'has-error' : ''}} "> 
                        {!! Form::label('radiobutton', 'Feature Category', ['class' => 'control-label col-lg-3']) !!}
                        <div class="col-lg-6 radioButtonTopPadding">
                        @foreach ($checkboxOptions as $key => $checkboxOption)
                            {!! Form::label(lcfirst($checkboxOption), $checkboxOption) !!}
                            {!! Form::radio('radio', $key, null, ['id' => 'radio-'.$key, 'name' => 'radio', 'class' => 'radio tune-in']) !!}
                        @endforeach
                        {!! $errors->first('radio', '<p class="errors">:message</p>') !!}
                        </div>
                        </div>

                        <div class="form-group {{ $errors->has('workday') ? 'has-error' : ''}} "> 
                        {!! Form::label('days', 'Days', ['class' => 'control-label col-lg-3']) !!}
                        <div class="col-lg-6 radioButtonTopPadding">
                        @foreach ($workingDays as $key => $workingDay)
                            {!! Form::label(lcfirst($workingDay), $workingDay) !!}
                            {!! Form::checkbox('workday[]', lcfirst($workingDay),in_array($workingDay, explode(',', @$saveworkingDays)),['class' => 'md-check', 'id' => $workingDay] ) !!}
                        @endforeach
                        {!! $errors->first('workday', '<p class="errors">:message</p>') !!}
                        </div>
                        </div>

                        <div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Countries', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                            {!! Form::select('country_id', getCountry(), isset($categoryDetails)?$categoryDetails->country_id:null, ['class' => 'form-control','id' => 'singleSelected','required' => 'required']) !!}
                            {!! $errors->first('country_id', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('multiselectcountries') ? 'has-error' : ''}}">
                            {!! Form::label('multiselectcountries', 'MultiPle Selected Countries', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                            {{Form::select('multiselectcountries',getCountry(),explode(',', @$savemulticontriesids),array('multiple'=>'multiple','name'=>'multiselectcountries[]', 'class' => 'form-control', 'id' => 'multipleSelected'))}}
                            {!! $errors->first('multiselectcountries', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>

                        
                        <div class="form-group {{ $errors->has('searchableMultiSelectedCountries') ? 'has-error' : ''}}">
                            {!! Form::label('searchableMultiSelectedCountries', 'Searchable', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                            {{Form::select('searchableMultiSelectedCountries',getCountry(),explode(',', @$searchableMultiSelectedCountries),array('multiple'=>'multiple','name'=>'searchableMultiSelectedCountries[]', 'class' => 'form-control multi-select', 'id' => 'my_multi_select3'))}}
                            {!! $errors->first('searchableMultiSelectedCountries', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('datepicker') ? 'has-error' : ''}}">
                            {!! Form::label('datepicker', 'Date Picker', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-md-6 col-xs-11">
                            {!! Form::text('datepicker', isset($categoryDetails)?$categoryDetails->date:null, ['class' => 'form-control form-control-inline input-medium default-date-picker', 'required', 'id' => 'name', 'placeholder' => 'Date Picker']) !!}
                            {!! $errors->first('datepicker', '<p class="errors">:message</p>') !!}
                            </div>
                        </div> 

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Descriotion (required)', ['class' => 'control-label col-lg-3']) !!}
                            <div class="col-lg-6">
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'placeholder'=>'Description', 'rows' => '5', 'id' => 'description']) !!}
                                {!! $errors->first('description', '<p class="errors">:message</p>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>