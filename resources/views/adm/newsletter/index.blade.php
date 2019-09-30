@extends('adm.layouts.app')

@section('content')
    <div class="container p-4">
        {{--<a href="{{ route('productos.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus-circle mx-1"></i>Añadir</a>--}}
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Emails</th>
                        {{--<th scope="col">Rubro</th>--}}

                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($newsletter as $item)
                        {{--@dd($item->brand)--}}
                        <tr>
                            {{--<td><img src="{{  asset($item->file['imagenes'][0]{'image'} ?? 'uploads/no-img.png') }}" style="width: 100px"></td>--}}
                            <td>{{ $item->email ?? '' }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td>No hay registros</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{--{!! $productos->render() !!}--}}
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

        CKEDITOR.replaceClass = 'ckeditor';

        CKEDITOR.config.width = '100%';
    </script>
    <script src="path/to/tinymce-vue.min.js"></script>
@endpush
