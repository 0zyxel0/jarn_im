@extends('layouts.master')
@section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">

    <script>
        $(document).ready(function () {
            $("#invoice_date").datepicker({ autoclose:true});
            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
            var table =  $('#list_dots').DataTable({
                "columnDefs":
                    [
                        {
                            "targets": [ 1 ],
                            "render": function(data){
                                if(data == 1){
                                    return  "<div class='circle_green'> </div>";
                                }
                                else{ return  "<div class='circle_red'> </div>"}
                            },
                            "data": 1,
                            "defaultContent": "Click to edit"
                        }

                    ],
                "bFilter":false,
                "paging":   false,
                "info":     false
            });


            $("#moving").on("click", ".removeRowBtn", function() {
                $(this).closest( 'tr').remove();
                return false;
            });




            var getItemName = $('#itemName').val();


            $(".add-row").click(function(){

                var markup = ""
                    +"<tr>"

                    +"<td>"
                    +"<div class='form-group'>"
                    +"<input type='text' class='form-control' placeholder='Enter...' id='itemName' name='itemName[]' value='' required=''>"
                    +"</div>"
                    +"</td>"
                    +"<td>"
                    +"<input type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"qty[]\" name=\"qty[]\" required=\"\">"
                    +"</td>"
                    +"<td>"
                    +"<input type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"price[]\" name=\"price[]\" required=\"\">"

                    +"</td>"

                    +"<td>"
                    +"<select class=\"form-control\" id=\"category[]\" name=\"category[]\">"
                    +"<option>Category</option>"
                    +"@foreach($cat as $c)"
                    +"<option value={{$c['category_id']}}>{{$c['name']}}</option>"
                    +"@endforeach"
                    +"</select>"
                    +"</td>"
                    +"<td>"
                    +"<select class=\"form-control\" id=\"unit[]\" name=\"unit[]\">"
                    +"<option>Unit</option>"
                    +"<option>Female</option>"
                    +"</select>"
                    +"</td>"
                    +"<td>"
                    +"<input type=\"text\" class=\"form-control\" placeholder=\"Enter ...\" id=\"total_price[]\" name=\"total_price[]\" required=\"\">"
                    +"</td>"
                    +"<td>"
                    +"<input type='button' class='removeRowBtn' name='removeRowBtn' value='X''>"
                    +"</td>"
                    +"</tr>"
                    +"";
                $("#moving").append(markup);

            });




        });
    </script>
    <style>
        .circle_green
        {
            border: 2px solid #a1a1a1;
            padding: 10px 11px;
            background: green;
            width: 2px;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            width: 1%;
        }
        .circle_red
        {
            border: 2px solid #a1a1a1;
            padding: 10px 11px;
            background: orangered;
            width: 2px;
            border-radius: 100%;
            margin-left: auto;
            margin-right: auto;
            width: 1%;
        }
    </style>


    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="window.history.go(-1); return false;" type="button" style="width: 150px;"> < Back to Week List</button>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Schedule</a></li>
            <li class="active">Update Attendance</li>
        </ol>
    </section>

    <section class="content">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @if($errors->any())

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach

            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif
        </div> <!-- end .flash-message -->
        <div class="row">
            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <!-- /.box-header -->
    <form action="storeInvoice" method="post">
                    <div class="box-header">
                        <h3 class="box-title">
                           Product Invoice
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Reciept Number</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="or_number" name="or_number" required="">
                        </div>
                        <div class="form-group">
                            <label>Purchase Date</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="invoice_date" name="invoice_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <select class="form-control" id="supplier_name" name="supplier_name" required>
                                <option selected="true" disabled="disabled">Supplier Name</option>
                                @foreach($suppliers as $s)
                                <option value="{{$s['id']}}">{{$s['company_name']}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <label>Receipt Category</label>
                            <select class="form-control" id="invoice_typeid" name="invoice_typeid" required>
                                <option selected="true" disabled="disabled">Receipt Type</option>
                                @foreach($invType as $s)
                                    <option value="{{$s['id']}}">{{$s['invoice_type']}}</option>
                                @endforeach
                            </select>

                        </div>
                        <hr>

                        <div style="float:right; margin-bottom: 10px;" >

                        <button class="add-row btn btn-primary" >Add Item</button>
                        </div>
                        <table id="weeklist" class="table table-bordered table-striped dataTable" >
                            <thead>

                            <tr role="row">

                                <th>Item Name</th>

                                <th>Qty</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Total</th>
                                <th>Option</th>


                            </tr>

                            </thead>

                            <tfoot>
                            <tr>

                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>
                                <td>
                                    Total Amount

                                </td>
                                <td><input type="text" class="form-control pull-right" id="invoice_total" name="invoice_total" required></td>
                                <td><button type="submit" class="pull-right btn btn-primary">Save</button></td>

                            </tr>

                            </tfoot>
                            <tbody id="moving" name="moving">
                            <tr>


                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>

                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>

                            </tr>
                            </tbody>


                        </table>
                    </div>
        <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->

            </div>
        </div>

        <!-- /.row -->


    </section>

@stop