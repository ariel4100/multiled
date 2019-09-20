@extends('adm.layouts.app')
@section('style')
    <style>
        P{
            margin-bottom:1px;
        }
        table{
            border-bottom: 2px solid #8BBF40 ;
        }
        thead td{
            text-align: center;
        }
        b{
            font-weight: bold;
        }
    </style>
@stop
@section('content')
    <div class="container p-4">
        {{--<a href="{{ route('usuario.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus-circle mx-1"></i>Añadir</a>--}}
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Razón Social</th>
                        <th scope="col">Email</th>
                        {{--<th scope="col">Pago</th>--}}
                        {{--<th scope="col">Envio</th>--}}
                        <th scope="col">Estado</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($transaccion as $key=>$item)
                        {{--{{ dd($item->client) }}--}}
                        <tr>
                            <td>#0{{ $item->id }}</td>
                            <td>{{ $item->client->username ?? ''  }}</td>
                            <td>{{ $item->client->email ?? '' }}</td>
                            {{--<td>{{ $item->payment ?? '' }}</td>--}}
                            {{--<td>{{ $item->shipping ?? '' }}</td>--}}
                            <td>
                                @if($item->status == 'pendiente')
                                    <span class="badge badge-warning">{{ strtoupper($item->status ?? '') }}</span>
                                @else
                                    <span class="badge badge-success">{{ strtoupper($item->status ?? '') }}</span>
                                @endif
                            </td>
                            <td>$ {{ number_format($item->total - ($item->total *$item->bonus/100) - ($item->total *$item->discount/100),2,',','.') }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_order_{{$key}}">
                                    <i class="far fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th>No hay registros</th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                @foreach($transaccion as $key=>$item)
                    {{--{{ dd($item->order) }}--}}
                    <div class="modal fade" id="modal_order_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form action="{{ route('order.store') }}" method="post">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Orden de Compra</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-between">
                                            <div class="col-md-6">
                                                <h5 class="mb-3">DATOS DEL CLIENTE:</h5>
                                                <p><b class="font-weight-bold">RAZÓN SOCIAL: </b> {{ $item->client->name ?? ''.' '.$item->client->surname ?? '' }}</p>
                                                {{--<p><b class="font-weight-bold">CUIT: </b> {{ $item->client->cuit ?? '' }}</p>--}}
                                                <p><b class="font-weight-bold">DOMICILIO: </b> {{ $item->client->address ?? '' }}</p>
                                                <p><b class="font-weight-bold">PROVINCIA: </b> {{ $item->client->province ?? '' }}</p>
                                                <p><b class="font-weight-bold">LOCALIDAD: </b> {{ $item->client->location ?? '' }}</p>
                                                {{--<p><b class="font-weight-bold">TELEFONO: </b> {{ $item->client->phone  ?? ''}}</p>--}}
                                                <p><b class="font-weight-bold">EMAIL: </b> <a href="mailto:{{ $item->client->email ?? '' }}" class=" ">{{ $item->client->email ?? ''}}</a></p>

                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mb-3">ESTADO:</h5>
                                                <input type="text" class="d-none" value="{{ $item->id}}" name="transaction_id">
                                                @csrf
                                                <div class="form-group">
                                                    <select name="status" id="" class="custom-select">
                                                        @foreach($status as $s)
                                                            <option value="{{ $s }}" {{ $item->status == $s ? 'selected' : null }}>{{ $s }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <p><b class="font-weight-bold">PEDIDO: </b> #0{{ $item->id }}</p>
                                                <p><b class="font-weight-bold">FECHA DE COMPRA: </b> {{ $item->created_at}}</p>
                                                {{--<p><b class="font-weight-bold">FORMA DE ENVIO: </b> {{ $item->shipping ?? '' }}</p>--}}
                                                {{--<p><b class="font-weight-bold">FORMA DE PAGO: </b> {{ $item->payment ?? '' }}</p>--}}
                                                <p><b class="font-weight-bold">TOTAL: </b>${{ number_format($item->total,2,',','.') }}</p>
                                            </div>
                                            <div class="col-md-12"  >
                                                <table class="table mt-5 text-center">
                                                    <thead class="bg-dark text-white text-center">
                                                    <tr>
                                                        {{--<th class="align-middle py-1 text-center" style="border-right: 1px solid white; line-height: 1">Codigo</th>--}}
                                                        <th class=" ">PRODUCTO</th>
                                                        <th class=" ">CATEGORÍA</th>
                                                        <th class=" " style="width: 50px">UNIDAD DE VENTA</th>
                                                        <th class=" ">PRECIO UNITARIO</th>
                                                        <th class=" " style="width: 100px">CANTIDAD DE PRODUCTOS</th>
                                                        <th class=" ">SUBTOTAL</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($item->order as $pedido)
                                                        <tr>
                                                            <td>
                                                                {{ $pedido->product ?? '' }}
                                                                {{--<p class="m-0"><b>Precio: </b>${{ number_format($pedido->unit_price,2,',','.') }}</p>--}}
                                                            </td>
                                                            <td  style="width: 170px;">{{ $pedido->subfamily ?? '' }}</td>
                                                            <td  >{{ $pedido->unit_seller ?? '' }}</td>
                                                            <td  style="width: 100px;">${{ $pedido->unit_price ?? '' }}</td>
                                                            <td class="text-center" >
                                                                {{ $pedido->qty }}
                                                            </td>
                                                            <td>${{ number_format(($pedido->qty*$pedido->unit_price),2,',','.') }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4 offset-md-8">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="">Sub Total</h5>
                                                    <h5 class="">$ {{ number_format($item->total,2,',', '.') }}</h5>
                                                </div>
                                                {{--@dd($item)--}}
                                                @if($item->discount)
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="">Descuento ({{$item->discount}}%)</h5>
                                                    <h5>${{ number_format($item->total- ($item->total *$item->discount/100),2,',', '.') }}</h5>
                                                </div>
                                                @endif
                                                @if($item->bonus)
                                                    <div class="d-flex justify-content-between">
                                                        <h5 class="">Bonificación ({{$item->bonus}}%)</h5>
                                                        <h5>${{ number_format($item->total - ($item->total *$item->bonus/100),2,',', '.') }}</h5>
                                                    </div>
                                                @endif
                                                {{--<div class="d-flex justify-content-between">--}}
                                                {{--<h5 class="">Envio</h5>--}}
                                                {{--<h5>$700</h5>--}}
                                                {{--</div>--}}
                                                <div class="d-flex justify-content-between align-item-center mt-3">
                                                    <h5 class="distren-color m-0">Total a pagar</h5>
                                                    <h5 class="m-0 text-dark">${{ number_format($item->total - ($item->total *$item->bonus/100) - ($item->total *$item->discount/100),2,',', '.') }}</h5>
                                                </div>
                                                <hr class="distren-fondo">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
