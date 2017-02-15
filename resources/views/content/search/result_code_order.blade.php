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
                        @foreach($hasil as $order)
                        <center><h3><a href="{{url('/orders/detail/confirm/'.$order->code_shipping)}}">{{$order->code_shipping}}
                        </a></h3><center>
                        @endforeach
                        
                         @else
                        <div class="box">
                            <h3>Result for code" {{$query}} "</h3>
                            <center><h3>Not Found</h3></center>
                        </div>
                    </div>


                    
              
            @endif

                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection