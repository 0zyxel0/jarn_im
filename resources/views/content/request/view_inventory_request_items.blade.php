@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
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
                "paging":   false,
                "ordering": false,
                "info":     false,
                bFilter: false,


            });

            $('#list tbody').on( 'click', '.btn_view', function () {

             alert('asdf');
                //window.location.href='/jarn_em/public/attendance/'+data[0]+'/'+data[1];
            });

            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
        });
    </script>
    <div class="flash-message">

    </div>
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='/jarn_im/public/invoiceList'; return false;" type="button" style="width: 150px;"> &lt; Back to List</button>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Invoice</a></li>
            <li class="active">View Invoice Items</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="pull-right" style="margin-right: 15px;">
                <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Process Request</button>
            </div>
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-body">
                    <div class="row">
                        <div class="col-xs-2">
                            <label>Tracking Id</label>
                        </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                            @foreach($itemlist as $i)
                                <input type="text" class="form-control" placeholder="Enter ..." id="" name="" value="{{$i['tracking_no']}}" readonly>
                            @endforeach
                                </div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-2">
                            <label>Request By</label>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                @foreach($userlist as $i)
                                    <input type="text" class="form-control" placeholder="Enter ..."  value="{{$i['givenname']}} {{$i['familyname']}}" readonly>
                                @endforeach
                            </div>
                        </div>

                    </div>

                        <div class="row">
                            <div class="col-xs-2">
                                <label>Request Date</label>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">

                                    @foreach($itemlist as $i)
                                        <input type="text" class="form-control" placeholder="Enter ..." id="name" name="name" value="{{$i['created_at']}}" readonly>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-2">
                                <label>Remarks</label>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">

                                    @foreach($itemlist as $i)
                                        <input type="text" class="form-control" placeholder="Enter ..." id="name" name="name" value="{{$i['remarks']}}" readonly>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-2">
                                <label>Status</label>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">

                                    @foreach($itemlist as $i)
                                        <input type="text" class="form-control" placeholder="Enter ..." id="name" name="name" value="{{$i['status']}}" readonly>
                                    @endforeach
                                </div>
                            </div>

                        </div>





                    </div>
                </div>
            </div>


            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Amount Requested</th>
                                <th>Inventory On Hand</th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d['name']}}</td>
                                    <td>{{$d['qty']}}</td>
                                    <td>{{$d['available']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
        <!-- /.row -->

    </section>
    <div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="saveRequestConfirmation">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modalLabel">Material Request</h4>
                    </div>

                    <div class="modal-body">


                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>Tracking Id</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            @foreach($data as $d)
                                            <input type="hidden" class="form-control" placeholder="Enter ..." id="requestid" name="requestid" value="{{$d['rid']}}" readonly>
                                            @endforeach
                                            @foreach($itemlist as $i)
                                                <input type="text" class="form-control" placeholder="Enter ..." id="trackingid" name="trackingid" value="{{$i['tracking_no']}}" readonly>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                                            @foreach($userlist as $i)
                                                <input type="hidden" class="form-control" placeholder="Enter ..." id="requestedBy" name="requestedBy" value="{{$i['partyid']}}" placeholder="{{$i['givenname']}} {{$i['familyname']}}">
                                            @endforeach


                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>Request Date</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">

                                            @foreach($itemlist as $i)
                                                <input type="text" class="form-control" placeholder="Enter ..." id="createdAt" name="createdAt" value="{{$i['created_at']}}" readonly>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>Remarks</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">

                                            @foreach($itemlist as $i)
                                                <input type="text" class="form-control" placeholder="Enter ..." id="remarks" name="remarks" value="{{$i['remarks']}}" readonly>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">

                                            @foreach($itemlist as $i)
                                                <input type="text" class="form-control" placeholder="Enter ..." id="status" name="status" value="{{$i['status']}}" readonly>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>


                        <table id="weeklist" class="table table-bordered table-striped dataTable" >
                            <thead>

                            <tr role="row">
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Available</th>


                            </tr>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>

                                <td></td>
                                <td></td>
                                <td></td>


                            </tr>

                            </tfoot>
                            <tbody id="moving" name="moving">
                            <tr>





                            @foreach($data as $d)
                                <tr>
                                    <td><input type="hidden" name="item[]" id="item[]" class="form-control" value="{{$d['itemid']}}" >{{$d['name']}}</td>
                                    <td><input type="hidden" name="qty[]" id="qty[]" class="form-control" value="{{$d['qty']}}">{{$d['qty']}}</td>
                                    <td>{{$d['available']}}</td>
                                </tr>
                                @endforeach


                            </tr>
                            </tbody>




                        </table>

                        <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@stop