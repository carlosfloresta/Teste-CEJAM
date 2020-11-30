<div class="form-group">

    <label for="">publicar esta noticia?</label>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="publicado" value="sim" type="radio"
            id="{{ isset($noticia->titulo_noticia) ? $noticia->titulo_noticia : 'adiciona' }}" required
            class="custom-control-input">
        <label class="custom-control-label"
            for="{{ isset($noticia->titulo_noticia) ? $noticia->titulo_noticia : 'adiciona' }}">SIM</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="publicado" value="nao" type="radio"
            id="{{ isset($noticia->titulo_noticia) ? $noticia->id : 'adiciona2' }}" required
            class="custom-control-input">
        <label class="custom-control-label"
            for="{{ isset($noticia->titulo_noticia) ? $noticia->id : 'adiciona2' }}">NÃO</label>
    </div>

    <br>
    <label for="exampleFormControlInput1">Titulo da Noticia</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="titulo_noticia"
        value="{{ isset($noticia->titulo_noticia) ? $noticia->titulo_noticia : '' }}" required>
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Selecione o Autor</label>
    <select class="form-control" id="exampleFormControlSelect1" name="id_autor">
        @foreach ($autores as $autor)

            <option value="{{ $autor->id }}">{{ $autor->nome }}</option>

        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlSelect2">Selecione as categorias</label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="categoria_noticia[]" multiple="multiple"
        required>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach

    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Descrição da Noticia</label>
    <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3"
        name="descricao_noticia">{{ isset($noticia->descricao_noticia) ? $noticia->descricao_noticia : '' }}</textarea>
</div>
