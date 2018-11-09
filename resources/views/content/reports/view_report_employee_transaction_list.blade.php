@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">



    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#startdate").datepicker({ autoclose:true});
            $("#enddate").datepicker({ autoclose:true});



        });



    </script>




    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": [],
                            "visible": false,
                            "searchable": false
                        }

                    ],

            });



        });
    </script>
    <div class="flash-message">

    </div>
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='/jarn_im/public/viewReports'; return false;" type="button" style="width: 150px;"> &lt; Back to Reports</button>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Reports</a></li>
            <li class="active">View Transactions Requests</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">

            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="createTransactionReport" method="post">
                            <div class="box-header">
                                <h3 class="box-title">
                                    Generate Report Transaction of Person
                                </h3>
                            </div>
                            <hr>
                            <div class="box-body">

                                <div class="form-group">
                                    <label>Choose Employee</label>
                                    <select class="form-control" id="partyid" name="partyid">
                                        <option disabled>Employee Names</option>
                                        @foreach($people as $p)
                                            <option value="{{$p['id']}}"> {{$p['givenname']}} {{$p['familyname']}} </option>
                                            @endforeach


                                    </select>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="form-group ">
                                            <label>Start Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="startdate" name="startdate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="form-group ">
                                            <label>End Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="enddate" name="enddate">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-primary btn-large" type="submit"> Generate</button>

                            </div>
                            <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
        <!-- /.row -->

    </section>
@stop