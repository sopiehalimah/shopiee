@extends('layout.app')

@section('content')

   <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My order</li>
                    </ul>

                </div>


                <div class="col-md-12">
                    <div class="box">
                        <h3>Code Order</h3>
                        <form action="{{url('/orders/history/confirm/')}}" method="get">
                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="search_code_order" class="form-control" placeholder="Code Order" required>
                                            <br>
                                             <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-refresh"></i>Search</button>
                                        </div>
                                        
                                    </div>

                                   
                                </div>
                               
                                <!-- /.row -->
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@endsection
