@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{--set some message after action--}}
@if (Session::has('message'))
    <div class="alert alert-success">{{Session::get("message")}}</div>

@elseif(Session::has('error'))
    <div class="alert alert-warning">{{Session::get("error")}}</div>

@elseif(Session::has('info'))
    <div class="alert alert-info">{{Session::get("info")}}</div>

@elseif(Session::has('danger'))
    <div class="alert alert-danger">{{Session::get("danger")}}</div>
@endif


<script src="assets/bitd/js/jquery.min.js"></script>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('id_card', 'ID:', ['class' => 'control-label']) !!}
            {!! Form::text('id_card',Input::old('id_card'),['class' => 'form-control','placeholder'=>'ID Number','required','autofocus', 'title'=>'Enter Id Number']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('card_number', 'Card Number:', ['class' => 'control-label']) !!}
            {!! Form::text('card_number',Input::old('card_number'),['class' => 'form-control','placeholder'=>'Card Number','required','autofocus', 'title'=>'Enter Card Number']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
            {!! Form::select('type', array(''=>'Select One','1'=>'No Repeat','0'=>'Repeat'),Input::old('type'),['class' => 'form-control','required','title'=>'select type']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('start_date', 'Start Date:', ['class' => 'control-label']) !!}
            {!! Form::text('start_date',@Input::get('start_date')? Input::get('start_date') : null,['id'=>"date", 'name'=>"start_date",'class'=>'form-control','placeholder'=>'start date', 'title'=>'pick a date ','required'=> 'required']) !!}
        </div>

        <div class="col-sm-6">
            {!! Form::label('end_date', 'End Date:', ['class' => 'control-label']) !!}
            {!! Form::text('end_date',@Input::get('end_date')? Input::get('end_date') : null,['id'=>"date", 'name'=>"end_date",'class'=>'form-control','placeholder'=>'end date', 'title'=>'pick a date ','required'=> 'required']) !!}
        </div>

    </div>
</div>


<div class="" style="margin-left:85%">
    {!! Form::submit('Save', ['id'=>'btn-disabled','class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'']) !!}
    <a href="{{route('employee')}}" class=" btn btn-default" data-placement="top" data-content="">Close</a>
</div>


<script>

    //document.onload = function() {
    $(function () {
        $("#employee").validate({
            rules: {
                name: {
                    required: true,
                },
                password: {
                    required: true,
                },
                url: {
                    required: true,
                    url: true
                },
                number: {
                    required: true,
                    number: true
                },
                max: {
                    required: true,
                    maxlength: 4
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $("#employee").validate({
            rules: {
                name: {
                    required: true,
                },
                username: {
                    required: true,
                },
                url: {
                    required: true,
                    url: true
                },
                number: {
                    required: true,
                    number: true
                },
                last_name: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                number: {
                    required: "(Please enter your phone number)",
                    number: "(Please enter valid phone number)"
                },
                last_name: {
                    required: "This is custom message for required",
                    minlength: "This is custom message for min length"
                }
            },
            submitHandler: function (form) {
                form.submit();
            },
            errorPlacement: function (error, element) {
                $(element)
                    .closest("form")
                    .find("label[for='" + element.attr("id") + "']")
                    .append(error);
            },
            errorElement: "span",
        });
    });
    //}
</script>

<script>
    $(document).ready(function(){
        var date_input=$('input[id="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>
