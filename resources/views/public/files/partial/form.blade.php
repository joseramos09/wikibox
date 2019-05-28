<!-- Formulario de subida de archivos (Nombre,Archivos,Descripción) -->

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control {{ $errors->has('name')?"is-invalid":"" }}" id="name" name="name" placeholder="Introduce el nombre del archivo" value="{{ isset($file)?$file->name:old('name') }}" required>
            @if( $errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="file">Subir archivo</label>
            <input type="file" class="form-control-file mt-1 {{ $errors->has('file')?"is-invalid":"" }}" id="file" name="file">
            @if( $errors->has('file'))
                <div class="invalid-feedback">
                    {{ $errors->first('file') }}
                </div>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control {{ $errors->has('description')?"is-invalid":"" }}" id="description" name="description" rows="10" placeholder="Introduzca una descripción para el archivo que desea subir" required>{{ isset($file)?$file->description:old('description') }}</textarea>
    @if( $errors->has('description'))
        <div class="invalid-feedback">
            {{ $errors->first('description') }}
        </div>
    @endif
</div>