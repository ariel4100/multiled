<div id="carouselExampleCaptions_{{ $id ?? 1 }}" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @if($gallery)
{{--            @dd($gallery)--}}
            @foreach($gallery ?? [] as $k=>$item)
                <li data-target="#carouselExampleCaptions_{{ $id ?? 1 }}" style="background-color: darkgray;" data-slide-to="{{ $k }}" class="{{ $k == 0 ? 'active' : '' }}" ></li>
            @endforeach
        @endif
    </ol>
    <div class="carousel-inner " >
        @if($gallery)

            @foreach($gallery ?? [] as $k=>$item)
                {{--@dd($item)--}}
                <div class="carousel-item border d-flex justify-content-center align-items-center {{ $k == 0 ? 'active' : '' }}" style="height: 300px;">
                    <img class="img-fluid" style=" height: 300px;" onError="this.src='{{ asset('uploads/no-img.png')}}'"
                         onclick="zoom(this)" src="{{ asset($item{'image'}) }}"
                         data-toggle="modal" data-target="#modalImagen"
                         alt="First slide">
{{--                    @if(isset($item{'title'}))--}}
{{--                    <div class="carousel-caption d-none d-md-block">--}}
{{--                        <span class="bg-dark text-white px-3 py-1">{!! $item{'title'} !!}</span>--}}
{{--                    </div>--}}
{{--                    @endif--}}
                </div>
            @endforeach
        @endif
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions_{{ $id ?? 1 }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions_{{ $id ?? 1 }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<!-- Button trigger modal -->
{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--Launch demo modal--}}
{{--</button>--}}

<!-- Modal -->
<div class="modal fade" id="modalImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            <div class="d-flex justify-content-center align-items-center" style="height: 400px">
                <img id="img_zoom" alt="" class="img-fluid" style="height: 400px">
            </div>

        </div>
    </div>
</div>
@push('script')
    <script>
        function zoom(img){
            let img_g = img.src;

            $('#img_zoom').attr('src', img_g)
        }

    </script>
@endpush
