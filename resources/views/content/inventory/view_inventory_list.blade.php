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
                            "targets": [0],
                            "visible": false,
                            "searchable": false
                        }

                    ],



                "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    if (  parseInt(aData[4]) >= parseInt(aData[2]) )
                    {

                        $('td', nRow).css('background-color', 'Red');
                    }
                    else if ( parseInt(aData[2]) == parseInt(aData[4]) )
                    {
                        $('td', nRow).css('background-color', 'Orange');
                    }
                }



            });

            $('#list tbody').on( 'click', '.btn_view', function () {

                var data = table.row( $(this).parents('tr') ).data();

               window.location.href='inventoryList/editProduct/'+data[0];


            });

            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
        });
    </script>

    <style>
        .red {
            background-color: #e47365 !important;
        }
    </style>
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
                <a type="button" class="btn btn-primary btn-large" href="addNewProduct">Add Product</a>
            </div>
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>InventoryId</th>
                                <th>Name</th>
                                <th>On Stock</th>
                                <th>Metric</th>
                                <th>Alert Level</th>
                                <th>Remarks</th>
                                <th>Modify Date</th>
                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['product_id']}}</td>
                                    <td>   {{$item['name']}}</td>
                                    <td>   {{$item['quantity']}}</td>
                                    <td>  {{$item['unit']}} </td>
                                    <td>  {{$item['alert_value']}} </td>
                                    <td>   {{$item['description']}}</td>
                                    <td>   {{$item['updated_at']}}</td>
                                    <td> <button class="btn_view"><i class="fa fa-book"></i>View</button></td>

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