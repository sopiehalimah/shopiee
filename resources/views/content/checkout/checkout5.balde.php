@extends('layout.app')

@section('content')


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-12">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                @foreach($cart as $total)
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>{{ "Rp.".number_format($cart[$key]['subtotal'],0,',','.').",-" }} </th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>{{ "Rp.".number_format($total[$key]['ongkir'],0,',','.').",-" }}</th>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <th>{{ "Rp.".number_format($cart[$key]['subtotal'],0,',','.').",-" }}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
@endsection