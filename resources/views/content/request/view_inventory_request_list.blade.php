@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/bootstrap3.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
    <style>
        textarea {
            resize: none;
        }
    </style>
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

            $('#list tbody').on( 'click', '#btn_view', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='requestItemList/'+data[1];
            });

            $("#moving").on("click", ".removeRowBtn", function() {
                $(this).closest( 'tr').remove();
                return false;
            });

            $(".add-row").click(function(){

                var markup = ""
                    +"<tr>"

                    +"<td>"
                    +"<div class='form-group'>"
                    +"<select class=\"form-control\" id=\"itemName[]\" name=\"itemName[]\">"
                    +"<option value=''>-- Choose Item --</option>"
                    +"@foreach($item as $pt)"
                    +"<option value={{$pt['product_id']}}>{{$pt['name']}} - ({{$pt['quantity']}})</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</div>"

                    +"</td>"
                    +"<td>"
                    +"<input type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"qty[]\" name=\"qty[]\" required=\"\">"
                    +"<td>"
                    +"<input type='button' class='removeRowBtn' name='removeRowBtn' value='X''>"
                    +"</td>"
                    +"</tr>"
                    +"";
                $("#moving").append(markup);

            });

            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
        });
    </script>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='dashboard'; return false;" type="button" style="width: 150px;"> &lt; Back to Dashboard</button>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Inventory</a></li>
            <li class="active">View Inventory List</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">
            <div class="pull-right" style="margin-right: 15px;">
                <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Request Materials</button>
            </div>
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>

                                <th>List Id</th>
                                <th>prod</th>
                                <th>Tracking</th>
                                <th>Remarks</th>
                                <th>Requested By</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>

                                    <td>   {{$item['list']}}</td>
                                    <td>   {{$item['request_productid']}}</td>
                                    <td>   {{$item['tracking_no']}}</td>
                                    <td>   {{$item['remarks']}}</td>
                                    <td>   {{$item['givenname']}} {{$item['familyname']}}</td>
                                    <td>   {{$item['status']}}</td>
                                    <td>   {{$item['created_at']}}</td>
                                    <td>
                                        <button id="btn_view"><i class="fa fa-book"></i> View</button>

                                    </td>
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
            <form method="post" action="storeRequestList">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modalLabel">Material Request</h4>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Tracking No.</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="tracking_no" name="tracking_no" required="">
                        </div>

                        <div class="form-group">
                            <label>Requested By:</label>
                            <select class="form-control" id="requester" name="requester">
                                <option value=''>-- Choose User --</option>
                                @foreach($employee as $e)
                                    <option value="{{$e['id']}}">{{$e['givenname']}} {{$e['familyname']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Remarks:</label>
                            <textarea type="text" class="form-control" placeholder="Enter ..." id="remarks" name="remarks" required=""></textarea>
                        </div>

                        <div style="float:right;"><button class="add-row btn btn-primary" >Add Item</button></div>
                        <table id="weeklist" class="table table-bordered table-striped dataTable" >
                            <thead>

                            <tr role="row">
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th></th>

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


                                <td>

                                </td>
                                <td>

                                </td>



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