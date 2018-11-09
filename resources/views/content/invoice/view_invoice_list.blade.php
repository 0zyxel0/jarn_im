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

            });

            $('#list tbody').on( 'click', '#btn_view', function () {

                var data = table.row( $(this).parents('tr') ).data();
                window.location.href='invoiceItems/'+data[0];
            });

            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
        });
    </script>
    <div class="flash-message">

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
                <a href="/jarn_im/public//createInvoice" type="button" class="btn btn-primary btn-large" data-target="#myModal">Add New Item</a>
            </div>
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th>Invoice Id</th>
                                <th>OR</th>
                                <th>Invoice Date</th>
                                <th>Supplier</th>
                                <th>Total Amount</th>
                                <th>Modified Date</th>
                                <th>Option</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['invoice_id']}}</td>
                                    <td>   {{$item['or_number']}}</td>
                                    <td>   {{$item['invoice_date']}}</td>
                                    <td>   {{$item['supplier_id']}}</td>
                                    <td>   {{$item['invoice_total']}}</td>
                                    <td>   {{$item['created_at']}}</td>
                                    <td>
                                        <button id="btn_view"><i class="fa fa-book"></i> View</button>
                                        <button id=""><i class="fa fa-edit"></i> Add</button>
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


@stop