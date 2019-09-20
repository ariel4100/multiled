<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .title {
            white-space: nowrap;
            width: 30px;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
<h3>Pedido desde el sitio web</h3>
<h4>Datos Personales:</h4>
{{--{{ dd($compra) }}--}}
<table>
    <tbody>
    <tr>
        <td class="title">Nombre y Apellido</td>
        <td>{{ $datos['nombre'] ?? ''  }}</td>
    </tr>
    <tr>
        <td class="title">Correo Electronico:</td>
        <td>{{ $datos['email'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="title">Provincia:</td>
        <td>{{ $datos['provincia'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="title">Localidad:</td>
        <td>{{ $datos['localidad'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="title">Domicilio:</td>
        <td>{{ $datos['domicilio'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="title">CUIT:</td>
        <td>{{ $datos['cuit'] ?? '' }}</td>
    </tr>
    <tr>
        <td class="title">Teléfono:</td>
        <td>{{ $datos['telefono'] ?? '' }}</td>
    </tr>


    </tbody>
</table>
<h4>Productos Seleccionados:</h4>
<table>
    <thead>
    <tr>
        <th>PRODUCTO</th>
        <th>CATEGORÍA</th>
        <th>UNIDAD DE VENTA</th>
        <th>PRECIO UNITARIO</th>
        <th>CANTIDAD DE PRODUCTOS</th>
        <th>SUBTOTAL</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($carrito ?? [] as $key => $item)
        <tr>
            <td><strong>{{ $item['producto'] ?? '' }}</strong><br></td>
            <td>{{ $item['subfamilia'] ?? '' }}</td>
            <td>{{ $item['unidad_venta'] ?? '' }}</td>
            <td>$ {{ number_format($item['precio'],2,',','.') ?? '' }}</td>
            <td> {{ $item['cantidad'] ?? '' }}</td>
            <td>$ {{ number_format($item['precio'] * $item['cantidad'],2,',','.') ?? '' }}</td>
        </tr>
    @endforeach
    <tr>
        <th colspan="5" class="text-right">SUBTOTAL</th>
        <td>$ {{ number_format($compra['total'], 2, ',', '.') ?? '' }}</td>
    </tr>
    <tr>
        <th colspan="5" class="text-right">DESCUENTO (%)</th>
        <td>$ {{ number_format($compra['descuento'] ?? 0, 2, ',', '.') ?? '' }}</td>
    </tr>
    <tr style="font-size: 1.2em;">
        <th colspan="5" class="text-right">Total</th>
        <th>$ {{ number_format($compra['total'] + $compra['descuento'], 2, ',', '.') ?? '' }}</th>
    </tr>
    </tbody>
</table>
</body>
</html>