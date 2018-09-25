<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif; 
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }
 
        #logo{
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
        }
 
        #imagen{
        width: 100px;
        }
 
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
 
        #encabezado{
        text-align: center;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 15px;
        }
 
        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        }
 
        section{
        clear: left;
        }
 
        #cliente{
        text-align: left;
        }
 
        #facliente{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }
 
        #facliente thead{
        padding: 20px;

        background: #616A6B;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facvendedor thead{
        padding: 20px;
        background: #616A6B;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facarticulo{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facarticulo thead{
        padding: 20px;
        background: #616A6B;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #gracias{
        text-align: center; 
        }
        #medio {
        background-color:yellow;
        }
    </style>
    <body>
        @foreach ($venta as $v)
        <header>
            <div id="logo">
                <img src="img/logo.jpg" alt="Hielonegro" id="imagen">
            </div>
            <div id="datos">
                <p id="encabezado">
                    <b>Smart Solutions</b><br>Ernesto Soler <br>Telefono:(+56)931742904 <br>Email:gerencia@smartsolutions.com
                </p>
            </div>
            <div id="fact">
                <p>{{$v->tipo_comprobante}}<br>
                {{$v->serie_comprobante}}-{{$v->num_comprobante}}</p>
            </div>
        </header>
        <br>
        <section>
            <div>
                <table id="facliente">
                    <thead>                        
                        <tr>
                            <th align="center" colspan="2" id="fac">CLIENTE</th>  <th align="center" id="fac">VENDEDOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th align="left">Sr(a). </th> 
                            <th align="left">{{$v->nombre}}</th> <th rowspan="2" align="right">{{$v->usuario}}</th>
                        </tr>
                        <tr>
                            <th align="left"> {{$v->tipo_documento}} : </th>
                            <th  align="left"> {{$v->num_documento}} </th> 
                        </tr>
                        <tr>
                            <th align="left"> Dirección : </th>
                            <th align="left"> {{$v->direccion}} </th>  <th id="fv" align="center" bgcolor="#616A6B">FECHA</th>
                        </tr>
                        <tr>
                            <th align="left"> Teléfono : </th>
                            <th align="left"> {{$v->telefono}} </th> <th rowspan="2" align="right">{{$v->created_at}}</th>
                        </tr>
                        <tr>
                            <th align="left"> Email :  </th>
                            <th align="left"> {{$v->email}} </th> 
                        </tr>
                     
                    </tbody>
                </table>
            </div>
        </section>
        @endforeach
       
        <section>
            <div>
                <table id="facarticulo">
                    <thead>
                        <tr id="fa">
                            <th>CANT</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO UNIT</th>
                            <th>DESC.</th>
                            <th>PRECIO TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <tr>
                            <td>{{$det->cantidad}}</td>
                            <td>{{($det->articulo)}}</td>
                            <td align="right">${{number_format($det->precio)}}</td>
                            <td align="right">${{number_format($det->descuento)}}</td>
                            <td align="right">${{number_format($det->cantidad*$det->precio-$det->descuento)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @foreach ($venta as $v)
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th align="right">SUBTOTAL</th>
                            <td align="right">$ {{number_format(round($v->total-($v->total*$v->impuesto),2))}}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th align="right">Impuesto</th>
                            <td align="right">$ {{number_format(round($v->total*$v->impuesto,2))}}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th align="right">TOTAL</th>
                            <td align="right">$ {{number_format($v->total)}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <div id="gracias">
                <p><b>Gracias por su compra!</b></p>
            </div>
        </footer>
    </body>
</html>