
<div class="modal-header">
    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
    <h4 class="modal-title">Update Designation Information</h4>
</div>
<div class="modal-body">

    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-designation', $data->deg_id]]) !!}
    @include('deg._form')
    {!! Form::close() !!}

</div>
