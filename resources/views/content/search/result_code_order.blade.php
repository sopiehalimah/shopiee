@extends('layout.app')

@section('content')

   <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li>Search Code Order</li>
                    </ul>

                </div>
                <div class="col-md-12">

                    
                    @if(count($hasil))
                    <div class="box">
                        <h3>Result for code " {{$query}} "</h3>
                        
                    </div>

                    @foreach($hasil as $order)
                    <a href="{{url('/orders/detail/confirm/'.$order->code_shipping)}}" >
                    <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Code Order</h3>
                        </div>

                         <div class="panel-body">
                         {{$order->code_shipping}}
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                    </div>
                    </a>
                    @endforeach

                     @else
                    <div class="box">
                        <h3>Result for code" {{$query}} "</h3>
                        <center><h4>Not Found</h4></center>
                    </div>
              
            @endif

                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection