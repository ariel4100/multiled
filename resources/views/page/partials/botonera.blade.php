@push('style')
    <style>
        .list-unstyled span{
            font-size: 1.2em;
            font-weight: 700;
            color: unset;
        }
        .list-unstyled a{
            color: #535353 ;

        }
        .list-unstyled a:hover{
            color: #173E8D   !important;

        }
        /*li a{*/
            /*color: unset;*/
        /*}*/
        .list-group-item{
            background-color: #fff;
        }
    </style>
@endpush
<div class="col-md-3" id="sidebar">
    <ul class="list-unstyled ">

        @forelse($familias as $key=>$item)
            {{--@dd($item)--}}
            <li class="list-group-item border-0 px-0 pb-1">
                <a href="{{ route('p.iluminacion',$item->slug) }}" data-target="#familia_{{$key}}" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center px-2 py-1 border-bottom {{ isset($familia) && $familia->id == $item->id ? 'multiled-color' : ''}}  ">
                    <span onclick="location.href='{{ route('p.iluminacion',$item->slug) }}'">{!! $item->text['es']['title'] ?? $item->title !!}</span><i class="fas fa-chevron-right ml-auto"></i>
                </a>
                <ul class="list-unstyled collapse {{ isset($familia) && $familia->id == $item->id ? 'show' : ''}}  " id="familia_{{$key}}">
                    @forelse($item->product   as $key1=>$data)
                        {{--@dd($data->product)--}}
                        <li class="list-group-item border-0 px-3 py-1">
                            <a href="{{ route('p.iluminacion.show',['category' => $item->slug,'slug' => $data->slug]) }}" data-target="#categoria_{{$key1}}" data-toggle="collapse" aria-expanded="false" class="d-flex align-items-center p-0 py-1  border-bottom  {{ isset($producto) && $producto->id == $data->id ? 'multiled-color' : ''}}">
                                <span onclick="location.href='{{ route('p.iluminacion.show',['category' => $item->slug,'slug' => $data->slug]) }}'" style="font-size: 14px">{!! $data->text['es']['title'] ?? $data->title  !!}</span>
                            </a>
                            {{--<ul class="list-unstyled collapse {{ isset($subfamilia) && $subfamilia->id == $data->id ? 'show' : ''}}"  id="categoria_{{$key1}}">--}}
                                {{--@forelse($data->product  as $pro )--}}
                                    {{--@dd($data->product)--}}
                                    {{--<li><a href="" class="px-3 py-2  @if(isset($producto)) {{$data->id == $producto->id ? 'ter-color': null }}@endif">{{ $data->text[App::getLocale()]['title']  }}</a></li>--}}
                                    {{--<li class="  border-0 px-3 py-1">--}}
                                        {{--<a href="{{ route('productos',$pro->slug) }}"  class="d-flex align-items-center py-1 border-bottom  {{ isset($producto) && $producto->id == $pro->id ? 'jolden-color2' : ''}}">--}}
                                            {{--<span onclick="location.href='{{ route('productos',$pro->slug) }}'" style="font-size: 14px">{!! $pro->text['es']['title'] ?? $pro->title !!}</span>--}}
                                        {{--</a>--}}
                                        {{--<ul class="list-unstyled collapse  " id="serie_{{$key1}}">--}}
                                            {{--@forelse($data->product as $data)--}}
                                                {{--<li><a href="{{ route('producto',$data->id) }}" class="px-3 py-2  @if(isset($producto)) {{$data->id == $producto->id ? 'ter-color': null }}@endif">{{ $data->text[App::getLocale()]['title']  }}</a></li>--}}
                                            {{--@empty--}}
                                                {{--<li><a href="" class="p-2">No hay registros</a></li>--}}
                                            {{--@endforelse--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--@empty--}}
                                    {{--<li><a href="" class="p-2">No hay registros</a></li>--}}
                                {{--@endforelse--}}
                            {{--</ul>--}}
                        </li>
                        {{--<li><a href="" class="px-3 py-2  @if(isset($producto)) {{$data->id == $producto->id ? 'ter-color': null }}@endif">{{ $data->text['es']['title']  }}</a></li>--}}
                    @empty
                        <li><a href="" class="p-2">No hay registros</a></li>
                    @endforelse
                </ul>
            </li>
        @empty
            <li><a href="" class="p-2">No hay registros</a></li>
        @endforelse
    </ul>
</div>