@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Payment method</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <div class="box">
                        <form method="post" action="{{('/checkout/payment/save')}}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id_user" value="{{ $data->id_user }}">
                            <input type="hidden" name="name" value="{{ $data->name }}">
                            <input type="hidden" name="telp" value="{{ $data->telp }}">
                            <input type="hidden" name="address" value="{{ $data->address }}">
                            <input type="hidden" name="state" value="{{ $data->state }}">
                            <input type="hidden" name="country" value="{{ $data->country }}">
                            <input type="hidden" name="email" value="{{ $data->email }}">
                            <input type="hidden" name="delivery" value="{{ $data->delivery }}">
                            <input type="hidden" name="code_shipping" value="{{ $data->code_shipping }}">



                            <h1>Checkout - Payment method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.html"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="checkout2.html"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="checkout4.html"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Payment gateway</h4>

                                            <p>Bank Transfer</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="payment" value="Transfer">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Cash on delivery</h4>

                                            <p>You pay when you get it.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="payment" value="Cash On Delivery">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection
