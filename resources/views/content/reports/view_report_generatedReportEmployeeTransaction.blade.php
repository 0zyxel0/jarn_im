@extends('layouts.reports')
@section('content')
    <script src="{{asset('js/datatables.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.jqueryui.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.jqueryui.css" />

    <!--Required for Datatables to function-->
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.css')}}"/>
    <script src="{{asset('js/DataTables/datatables.js')}}"></script>



    <script>
        $(document).ready(function(){
            var table =  $('#list').DataTable({
                "dom": 'lBfrtiBp',
                'buttons': ['copy', 'excel', 'csv', 'pdf', 'print' ],
            });

        });
    </script>

    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='/jarn_im/public/viewReports/transactionsOfEmployeeArea'; return false;" type="button" style="width: 150px;"> &lt; Back to Report</button>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Inventory</a></li>
            <li class="active">View Inventory List</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">

            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <th>Tracking No.</th>
                            <th>Name</th>
                            <th>Remarks</th>
                            <th>Item Name</th>
                            <th>Qty Requested</th>
                            <th>Status</th>
                            <th>Processed Date</th>
                            </thead>
                            <tbody>
@foreach($data as $a)
    <tr>
    <td>{{$a['tracking_no']}}</td>
    <td>{{$a['givenname']}}</td>
    <td>{{$a['remarks']}}</td>
    <td>{{$a['name']}}</td>
    <td>{{$a['qty']}}</td>
    <td>{{$a['status']}}</td>
    <td>{{$a['updated_at']}}</td>
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
@stop