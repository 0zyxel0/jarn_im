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
                            "targets": [1,0],
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
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Total Price</th>
                                <th>Modified On</th>


                            </tr>

                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>   {{$item['invoice_itemid']}}</td>
                                    <td>   {{$item['invoice_id']}}</td>
                                    <td>   {{$item['itemName']}}</td>
                                    <td>   {{$item['qty']}}</td>
                                    <td>   {{$item['price']}}</td>
                                    <td>   {{$item['category']}}</td>
                                    <td>   {{$item['unit']}}</td>
                                    <td>   {{$item['total_price']}}</td>
                                    <td>   {{$item['created_at']}}</td>

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