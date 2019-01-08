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

            $(".box-body input,textarea,select").prop("disabled", true);
            $('.box-body #edit').click(function(e) {
                e.preventDefault();
                $('.box-body').find(':input').prop('disabled', false);
                $('.box-body #edit').unbind("click");
            });
                //window.location.href='/jarn_em/public/attendance/'+data[0]+'/'+data[1];


            $('.flash-message').fadeIn('fast').delay(1000).fadeOut('fast');
        });
    </script>
    <div class="flash-message">

    </div>
    <section class="content-header">
        <button class="btn btn-block btn-default" onclick="location.href='/jarn_im/public/inventoryList'; return false;" type="button" style="width: 150px;"> &lt; Back to Dashboard</button>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Inventory</a></li>
            <li class="active">Add Inventory Product</li>
        </ol>

    </section>
    <section class="content">
        <div class="row">

            <div class="col-xs-12">                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3> New Product                        </h3>
                    </div>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="updateItem" method="post">
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <div class="form-group ">
                                    @foreach($item as $i)
                                        <input type="hidden" class="form-control" placeholder="Enter ..." id="product_id" name="product_id" value="{{$i['product_id']}}" required="">
                                    @endforeach
                                    <label>Product Name</label>
                                    @foreach($item as $i)
                                        <input type="text" class="form-control" placeholder="Enter ..." id="product_name" name="product_name" value="{{$i['name']}}" required="">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-xs-12">
                                <div class="form-group ">
                                    <label>Supplier</label>
                                    <select class="form-control" id="supplier_name" name="supplier_name">
                                        @foreach($saved_sup as $save)
                                            <option value="{{$save['id']}}">Current : {{$save['company_name']}}</option>
                                        @endforeach
                                        @foreach($sup as $s)
                                            <option value="{{$s['id']}}">{{$s['company_name']}}</option>
                                        @endforeach



                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <div class="form-group ">
                                    <label>Category</label>
                                    <select class="form-control" id="category_name" name="category_name">

                                        @foreach($saved_cat as $cs)
                                            <option value="{{$cs['category_id']}}">Current : {{$cs['name']}}</option>
                                        @endforeach
                                        @foreach($cat as $s)
                                            <option value="{{$s['category_id']}}">{{$s['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                    <div class="form-group ">
                                        <label>Unit</label>
                                        @foreach($item as $i)
                                            <input type="text" class="form-control" placeholder="Enter ..." id="unit" value="{{$i['unit']}}" name="unit" required="">
                                        @endforeach

                                    </div>
                                </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 col-xs-12">
                                <div class="form-group ">
                                    <label>Price <span class="required">*</span></label>
                                    @foreach($item as $i)
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Product Price" value="{{$i['price']}}">
                                    @endforeach
                                        <span class="text-danger">  </span>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <div class="form-group ">
                                    <label>Product QTY <span class="required">*</span></label>
                                    @foreach($item as $i)
                                    <input type="text" class="form-control" placeholder="Enter ..." id="quantity" name="quantity" value="{{$i['quantity']}}" required="">
                                        @endforeach
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <div class="form-group ">
                                    <label>Alert Quantity</label>
                                    @foreach($item as $i)
                                    <input type="text" class="form-control" placeholder="Enter ..." id="alerts" name="alerts" value="{{$i['alert_value']}}" required="">
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="form-group ">
                                    <label>Product Description</label>
                                    @foreach($item as $i)
                                    <textarea type="text" class="form-control" placeholder="Enter ..." id="description" name="description" required="" onresize="false">{{$i['description']}}</textarea>
                                    @endforeach
                                        <span class="text-danger">  </span>
                                </div>
                            </div>
                        </div>

                            <button id="edit" class="btn btn-pinterest">Edit</button>
                            <button type="submit" class="btn btn-primary">Save</button>


                        <hr>

                        <input type="hidden" name="username" id="username" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>
                    </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>




        </div>
        <!-- /.row -->

    </section>


@stop