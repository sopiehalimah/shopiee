@extends('layout.app')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My orders</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="{{url('/orders/history')}}"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="{{url('/user/account/'.Auth::User()->id)}}"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="{{url('/logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                     {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My orders</h1>

                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="{{url('/contact')}}">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $orders)
                                    <tr>
                                        <th>{{$orders->code_order}}</th>
                                        <td>{{ date_format(date_create($orders->created_at),"D, h M Y") }}</td>
                                        <td>{{ "Rp.".number_format($orders->total,0,',','.').",-"}}</td>
                                        <td>
                                            @if($orders->status == 'pending')
                                            <span class="label label-warning">{{$orders->status}}</span>
                                            @elseif($orders->status == 'accepted')
                                            <span class="label label-info">{{$orders->status}}</span>
                                            @elseif($orders->status == 'sent')
                                            <span class="label label-warning">{{$orders->status}}</span>
                                            @else
                                            <span class="label label-success">{{$orders->status}}</span>
                                            @endif

                                        </td>
                                        <td><a href="{{url('/orders/history/'.$orders->code_shipping)}}" class="btn btn-primary btn-sm">View</a>
                                        </td>
                                        <td>
                                        @if($orders->payment == "Cash On Delivery")
                                            <span class="label label-info">Cash On Delivery</span>

                                        @else


                                            @if($orders->evidence == 'not yet')
                                            
                                            <form action="{{url('/payment/evidence/'.$orders->code_order)}}" method="post" enctype="multipart/form-data">
                                                {!! csrf_field() !!}

                                            <input type="file" name="evidence" required>
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-sm" >Upload Payment Evidence</button>
                                            <br><br>
                                            <a href="#" data-toggle="modal" data-target="#info-modal" class="btn btn-primary btn-sm">Info Transfering</a>
                                            <input type="hidden" name="id" value="{{ $orders->id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id_user" value="{{$orders->id_user}}">
                                            <input type="hidden" name="code_order" value="{{$orders->code_order}}">
                                            <input type="hidden" name="code" value="{{$orders->code}}">
                                            <input type="hidden" name="code_parent" value="{{$orders->code_parent}}">
                                            <input type="hidden" name="code_kind" value="{{$orders->code_kind}}">
                                            <input type="hidden" name="code_type" value="{{$orders->code_type}}">
                                            <input type="hidden" name="code_merk" value="{{$orders->code_merk}}">
                                            <input type="hidden" name="pict_product1" value="{{$orders->pict_product1}}">
                                            <input type="hidden" name="pict_product2" value="{{$orders->pict_product2}}">
                                            <input type="hidden" name="name" value="{{$orders->name}}">
                                            <input type="hidden" name="desc" value="{{$orders->desc}}">
                                            <input type="hidden" name="price" value="{{$orders->price}}">
                                            <input type="hidden" name="slug" value="{{$orders->slug}}">
                                            <input type="hidden" name="status" value="{{$orders->status}}">
                                            <input type="hidden" name="kuantitas" value="{{$orders->kuantitas}}">

                                            <input type="hidden" name="subtotal" value="{{$orders->subtotal}}">
                                            <input type="hidden" name="total" value="{{$orders->total}}">
                                            <input type="hidden" name="status" value="{{$orders->status}}">
                                             <input type="hidden" name="evidence" value="{{$orders->evidence}}">

                                            </form>
                                            @else
                                            <span class="label label-success">Payment Done</span>
                                            @endif

                                        @endif
                                        
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
                <div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="Logout" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Logout"><img src="{{url('img/sh8.png')}}" alt="Obaju logo" class="hidden-xs" style="width: 120px;"></h4>
                    </div>
                    <div class="modal-body">
                        <center>
                        <img src="{{url('img/bca.png')}}" alt="Obaju logo" class="hidden-xs" style="width: 120px;">
                        <p>
                        <br>No. Rekening    : 0892-199-012
                        <br>Cabang          : KCU Wisma Asia
                        <br>Nama Rekening   : PT. Shopiee Indonesia
                        </p>
                        <br>
                        <img src="{{url('img/bni.png')}}" alt="Obaju logo" class="hidden-xs" style="width: 120px;">
                        <p>
                        <br>No. Rekening    : 0892-199-012
                        <br>Cabang          : KCU Wisma Asia
                        <br>Nama Rekening   : PT. Shopiee Indonesia
                        </p>
                        <br>
                        <img src="{{url('img/mandiri.png')}}" alt="Obaju logo" class="hidden-xs" style="width: 120px;">
                        <p>
                        <br>No. Rekening    : 0892-199-012
                        <br>Cabang          : KCU Wisma Asia
                        <br>Nama Rekening   : PT. Shopiee Indonesia
                        </p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
@endsection
