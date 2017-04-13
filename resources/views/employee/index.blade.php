@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')

    <!-- page start-->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><strong>{{ $pageTitle }}</strong></span>&nbsp;&nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>we can show all user in this page<br> and add new user, update, delete from this page</em>"></span>
                    <a class="btn btn-primary btn-xs pull-right pop" data-toggle="modal" href="#addData" data-placement="left" data-content="">
                        <strong>Add New</strong>
                    </a>
                </div>

                <div class="panel-body">
                    <?php
                    $counter = 0;
                    ?>
                    {{------------- Filter :Ends -------------------------------------------}}
                    <div class="table-primary">

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
                            <thead>
                            <tr>
                                <th> SL </th>
                                <th> Employee Name </th>
                                <th> Employee ID </th>
                                <th> Join Date </th>
                                <th> Company </th>
                                <th> department </th>
                                <th> Line Manager </th>
                                <th> duty Station </th>
                                <th> Status </th>
                                <th> Action &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-placement="top" data-content="view : click for details informations<br>update : click for update informations<br>delete : click for delete informations"></span></th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($model))
                                @foreach($model as $values)
                                    <tr class="gradeX">
                                        <td><?php echo ++$counter; ?></td>
                                        <td>{{ucfirst($values->employee_name)}}</td>
                                        <td>{{ucfirst($values->card_number)}}</td>
                                        <td>{{ucfirst($values->join_date)}}</td>
                                        <td>
                                            {{ucfirst($values->com_name)}}
                                        </td>
                                        <td>
                                            {{ucfirst($values->dept_name)}}
                                        </td>
                                        <td>{{ucfirst($values->line_manager)}}</td>
                                        <td>
                                            @if($values->duty_station=='0')
                                                {{'Mohakhali'}}
                                            @else
                                                {{'Dhanmondi'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($values->status=='0')
                                            {{'Probation'}}
                                            @elseif($values->status=='1')
                                            {{'Permanent'}}
                                            @elseif($values->status=='2')
                                            {{'Termination'}}
                                            @elseif($values->status=='3')
                                            {{'Resignation'}}
                                            @endif
                                        </td>
                                        <td>
                                            {{--<a href="{{ route('edit-holidays', $values->default_id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" data-placement="top" data-content="update"><i class="fa fa-edit"></i></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{--<span class="pull-right">{!! str_replace('/?', '?',  $model->appends(Input::except('page'))->render() ) !!} </span>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- page end-->

    <div id="addData" class="modal fade" tabindex="" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" style="z-index:1050">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                    <h4 class="modal-title" id="myModalLabel"><strong style='margin-left:33%'>Add New Employee Information</strong><span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2"></font> </span></h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'add-employee','id' => 'employee']) !!}
                    @include('employee._form')
                    {!! Form::close() !!}
                </div> <!-- / .modal-body -->
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!-- modal -->


    <!-- Modal  -->

    <div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="z-index:1050">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <!-- modal -->


    <!--script for this page only-->
    @if($errors->any())
        <script type="text/javascript">
            $(function(){
                $("#addData").modal('show');
            });

        </script>
    @endif

@stop