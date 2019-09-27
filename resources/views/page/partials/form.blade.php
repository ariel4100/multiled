<h4>SOLICITAR INFORMACIÓN</h4>
<p>DÉJENOS SU CONSULTA</p>
<form action="{{ route('ficha.mail') }}" method="post" class="row">
    @csrf
    <div class="md-form col-md-6">
        <input type="text" class="form-control" required name="nombre" placeholder="Nombre">
    </div>
    <div class="md-form col-md-6">
        <input type="text" class="form-control" required name="telefono" placeholder="Teléfono">
    </div>
    <div class="md-form col-md-6">
        <input type="email" class="form-control" required name="email" placeholder="Correo electrónico">
    </div>
    <div class="md-form col-md-6">
        <input type="text" class="form-control" required name="asunto" placeholder="Asunto">
    </div>
    <div class="md-form col-md-12">
        <textarea id="form7" class="md-textarea form-control" name="mensaje" placeholder="Mensaje..." rows="3"></textarea>
        {{--<label for="form7">Material textarea</label>--}}
    </div>

    <div class="md-form col-md-12">
        <button type="submit" class="btn rounded-pill text-white p-2 px-5 multiled-fondo">ENVIAR</button>
    </div>
</form>