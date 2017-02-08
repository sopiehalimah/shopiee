@extends('layout.apps')

@section('content')
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>Shopiee</h1>

                            
                                <div class="form-group form-float">

                                    <div class="form-line">

                                        <label>To</label>
                                        
                                        <input type="text" class="form-control" name="id_user" value="{ !! $id_user !! }" required>
                                       
                                    </div>
                                </div>

                                <br>
                                <h1>#{!! $code_order !!}</h1>
                                <br>
                                <br>
                             
                                
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>

                                        <th>Picture</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="{ !! url('pict_product1/'.$pict_product1) !!}" alt="" style="max-width:100%;height: 100px;"></td>
                                        <td>{!! $name !!}</td>
                                        <td>{!! "Rp.".number_format($price,0,',','.').",-" !!}</td>
                                    </tr>
                                
                                </tbody>
                                <tfoot>
                                        <tr>
                                            <th colspan="2">Shipping Cost</th>
                                            <th>{!! "Rp.".number_format($ongkir,0,',','.').",-" !!}</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <th>{!! "Rp.".number_format($total,0,',','.').",-" !!}</th>
                                        </tr>
                                </tfoot>
                            </table>
                            <br>

</body>
</html>