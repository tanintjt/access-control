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

<div class="modal-header">
    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
    <h4 class="modal-title">Update holiday Information</h4>
</div>
<div class="modal-body">

    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-holidays', $data->id]]) !!}
    @include('holiday._form')
    {!! Form::close() !!}

</div>


