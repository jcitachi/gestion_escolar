<!-- Modal -->
<div class="modal fade" id="ModalUpdate{{ $grado->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-layer-group"></i> Actualizar Grado</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.grados.update', $grado->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Niveles <b>(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-layer-group"></i></span>
                                    </div>
<<<<<<< HEAD
                                    <select name="nivel_id" id="nivel_id" class="form-control"  required>
                                        <option value="">Seleccione un Nivel</option>
                                        @foreach ($niveles as $nivel)
                                            <option value="{{ $nivel->id }}"{{ old('nivel_id', $grado->nivel_id) == $nivel->id ? 'selected' : '' }}>
=======
                                    <select name="nivel_id" class="form-control" id="nivel_id" required>
                                        <option value="">Seleccione una Gestion</option>
                                        @foreach ($niveles as $nivel)
                                            <option value="{{ $nivel->id }}"{{ old('nivel_id', $nivel->id  == $grado->nivel_id)  ? 'selected' : '' }}>
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
                                                {{ $nivel->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                 @error('nivel_id')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-12">
                            <div class="form-group">
<<<<<<< HEAD
                                <label for="nombre">Nombre del Grado <b>(*)</b></label>
=======
                                <label for="">Nombre del Grado <b>(*)</b></label>
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-list-alt"></i></span>
                                    </div>
                                    <input type="text" id="nombre" name="nombre" class="form-control"
                                        value="{{ old('nombre', $grado->nombre) }}" placeholder="ingresar grado...." required>
                                </div>
                                @error('nombre')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('admin.grados.index') }}" class="btn btn-default"><i
                                        class="fas fa-arrow-left"></i> Cancelar</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                    Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
