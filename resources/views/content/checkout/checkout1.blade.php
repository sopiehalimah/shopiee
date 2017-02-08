@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Address</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <div class="box">
                        <form method="post" action="{{url('/checkout/address/save')}}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        
                         <input type="hidden" class="form-control" name="id_user" value="{{ Auth::user()->email }}" required>
                          <?php
                                            $a = rand(0,999);
                                            $b = rand(0,9);
                                            if ($a<100) {
                                              $code = "SHP-SH".$b.substr($a,0,5);
                                              $randomkode = "ORD-SH".$b.substr($a,0,5);
                                            }
                                            elseif ($a<100) {
                                              $code = "SHP-SH".$b.$b.substr($a,0,4);
                                              $randomkode = "SHP-SH".$b.$b.substr($a,0,4);
                                            }
                                            elseif ($a<10) {
                                              $code = "SHP-SH".$b.$b.$b.substr($a,0,3);
                                              $randomkode = "SHP-SH".$b.$b.$b.substr($a,0,3);
                                            }
                                            elseif ($a<10) {
                                              $code = "SHP-SH".$b.$b.$b.$b.substr($a,0,2);
                                              $randomkode = "SHP-SH".$b.$b.$b.$b.substr($a,0,2);
                                            }              
                                            else {
                                              $code = "SHP-SH".$a;
                                              $randomkode = "SHP-SH".$a;
                                            }
                                        ?>
                         <input type="hidden" class="form-control" name="code_shipping" value="{{ $randomkode}}" required>


                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Name</label>
                                            <input type="text" name="name" class="form-control" id="firstname" required>
                                        </div>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select class="form-control" name="state" id="state" required>
                                                
                                                <option>Indonesia</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                               
                                <!-- /.row -->

                                <div class="row">

                                   
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" readonly class="form-control" id="email" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select class="form-control" name="country" id="country" required>
                                                <option>DKI Jakarta</option>
                                                <option>Bogor</option>
                                                <option>Depok</option>
                                                <option>Tangerang</option>
                                                <option>Bekasi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input type="text" name="telp" class="form-control" id="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Address</label>
                                            <textarea type="text" name="address" class="form-control" id="street" required></textarea>
                                        </div>
                                    </div>

                                    

                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{url('/cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
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