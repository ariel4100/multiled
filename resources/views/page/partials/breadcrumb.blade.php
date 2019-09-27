<nav class="d-none d-md-block">
    <ol class="list-unstyled d-flex font-weight-bold">
        {{--<li class="ml-2"><a href=" " style="color: unset;" class="text-decoration-none">Categorías |</a></li>--}}
        <li><i class="fas fa-home pr-1"></i>|</li>
        @if(isset($familia))
            {{--{{ $f->text{'title_es'} }}--}}
                <li class="ml-2"><a href="{{ route('p.iluminacion',$familia->slug) }}" style="color: unset;" class="text-decoration-none">{!! $familia->text['es']['title'] ?? $familia->title !!} |</a></li>
        @endif
        @if(isset($subfamilia))
                <li class="ml-2"><a href="{{ route('subfamilia',$subfamilia->slug) }}" style="color: unset;" class="text-decoration-none">{!! $subfamilia->text['es']['title'] ?? $subfamilia->title  !!} |</a></li>
        @endif
        @if(isset($producto))
            {{--@dd($producto->family)--}}
            <li class="ml-2"><a href="{{ route('p.iluminacion.show',['category' => $producto->family->slug,'slug' => $producto->slug]) }}" style="color: unset;" class="text-decoration-none">{!! $producto->text['es']['title'] ?? $producto->title  !!} </a></li>
        @endif

        {{--<li class="ml-2">{{ isset($general) ? ucwords(strtolower($general->text{'title_'.App::getLocale()})) : null }}</li>--}}
        {{--<li class="ml-2">{{ isset($f) ? '| '.ucwords(strtolower($f->text{'title_'.App::getLocale()})) : null }}</li>--}}
        {{--<li class="ml-2">{{ isset($sf) ? '| '.ucwords(strtolower($sf->text{'title_'.App::getLocale()})) : null }}  {{ isset($producto->subfamily) ? '| '.ucwords(strtolower($producto->subfamily->text{'title_'.App::getLocale()})) : null }}</li>--}}
        {{--<li class="ml-2">{{ isset($producto->text) ? '| '.ucwords(strtolower($producto->text{'title_'.App::getLocale()})) : null }}</li>--}}
        {{--@dd($producto->text{'title_es'})--}}
    </ol>
</nav>