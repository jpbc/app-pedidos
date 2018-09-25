<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de artículos</title>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.7rem;
            font-weight: normal;
            line-height: 1.5;
            color: #151b1e;           
        }
        .table {
            display: table;
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }
        .table-bordered {
            border: 1px solid #c2cfd6;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border: 0;
           
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #c2cfd6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #c2cfd6;
        }
        .table-bordered thead th, .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .table-bordered th, .table-bordered td {
            border: 0px solid #c2cfd6;
        }
        th, td {
            display: table-cell;
            vertical-align: inherit;
        }
        th {
            color: #FFFFFF;
            background: #616A6B; 
            font-weight: bold;
            text-align: -internal-center;
            text-align: center;
        }
        tbody {
            border: 0px solid #c2cfd6;
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .izquierda{
            float:left;
            text-align: cente;
        }
        .derecha{
            float:right;
        }
        

        #imagen{
        width: 40px;
        }
        #ancho{
            min-width :100%;
        }
    </style>
</head>
<body>

    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>
                        
                            <img src="img/logo.jpg" alt="Hielonegro" id="imagen">
                       
                    </th>
                    <th colspan="6" align="center" >
                        
                            
                            Inventario de Articulos Smart Solutions SpA <span class="derecha">{{now()}}</span>
                    </th>
                </tr>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio Venta $</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $a)
                <tr>
                    <td>{{$a->codigo}}</td>
                    <td>{{$a->nombre}}</td>
                    <td>{{$a->categoria}}</td>
                    <td align="right">{{number_format($a->precio_venta)}}</td>
                    <td align="right">{{number_format($a->stock)}}</td>
                    <td>{{$a->descripcion}}</td>
                    <td>{{$a->condicion?'Activo':'Desactivado'}}</td>
                </tr>
                @endforeach                               
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="izquierda">
        <p><strong>Total de Articulos : </strong>{{number_format($cont)}}</p>
        </div>
    </div>
    <div class="row">
        <div class="medio"> </div>  

    </div>
     
     
</body>
</html>