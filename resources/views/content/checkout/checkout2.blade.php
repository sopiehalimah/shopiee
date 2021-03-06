@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Delivery method</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <div class="box">
                        <form method="post" action="{{url('/checkout/delivery/save')}}">
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
                        <input type="hidden" name="code_shipping" value="{{ $data->code_shipping }}">


                            <h1>Checkout - Delivery method</h1>
                            <ul class="nav nav-pills nav-justified">
                                
                                <li><a href=""><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Standard Delivery</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="Standard Delivery">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>Express Delivery</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="Express Delivery">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i>
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