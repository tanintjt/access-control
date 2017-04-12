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
            {!! Form::label('dept_name', 'Department Name:', ['class' => 'control-label']) !!}
            {!! Form::text('dept_name',Input::old('dept_name'),['class' => 'form-control','placeholder'=>'Department Name','required','autofocus', 'title'=>'Enter Department Name']) !!}
        </div>
    </div>
</div>


<div class="" style="margin-left:85%">
    {!! Form::submit('Save', ['id'=>'btn-disabled','class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'']) !!}
    <a href="{{route('department')}}" class=" btn btn-default" data-placement="top" data-content="">Close</a>
</div>


<script>

    //document.onload = function() {
    $(function () {
        $("#department").validate({
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

        $("#department").validate({
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
