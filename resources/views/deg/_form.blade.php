<script src="assets/bitd/js/jquery.min.js"></script>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('deg_name', 'Designation Name:', ['class' => 'control-label']) !!}
            {!! Form::text('deg_name',Input::old('deg_name'),['class' => 'form-control','placeholder'=>'Designation Name','required','autofocus', 'title'=>'Enter Designation Name']) !!}
        </div>
    </div>
</div>


<div class="" style="margin-left:85%">
    {!! Form::submit('Save', ['id'=>'btn-disabled','class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'']) !!}
    <a href="{{route('designation')}}" class=" btn btn-default" data-placement="top" data-content="">Close</a>
</div>


<script>

    //document.onload = function() {
    $(function () {
        $("#designation").validate({
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

        $("#designation").validate({
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
