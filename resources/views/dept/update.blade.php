
<div class="modal-header">
    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
    <h4 class="modal-title">Update Department Information</h4>
</div>
<div class="modal-body">

    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-department', $data->dept_id]]) !!}
    @include('dept._form')
    {!! Form::close() !!}

</div>
