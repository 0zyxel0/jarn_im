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
                            "targets": [0],
                            "visible": false,
                            "searchable": false
                        }

                    ],

            });

            $('#list tbody').on( 'click', '.btn_view', function () {

             alert('asdf');
                //window.location.href='/jarn_em/public/attendance/'+data[0]+'/'+data[1];
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
                <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Add New Supplier</button>
            </div>
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Supplier Name</th>
                                <th>Address</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Modify Date</th>
                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['id']}}</td>
                                    <td>   {{$item['company_name']}}</td>
                                    <td>   {{$item['address']}}</td>
                                    <td>   {{$item['contact_person']}}</td>
                                    <td>   {{$item['contact_number']}}</td>
                                    <td>   {{$item['created_at']}}</td>
                                    <td>
                                        <button id="btn_view"><i class="fa fa-book"></i>View</button>
                                        <button id="btn_edit"><i class="fa fa-book"></i>Edit</button>
                                        <button id="btn_delete"><i class="fa fa-book"></i>Delete</button>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="store">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modalLabel">Add New Supplier</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Supplier Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="name" name="name" required="">
                        </div>

                        <div class="form-group">
                            <label>Contact Person</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="contact_person" name="contact_person" required="">
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="contact_number" name="contact_number" required="">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" class="form-control" placeholder="Enter ..." id="contact_address" name="contact_address" required=""></textarea>
                        </div>



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