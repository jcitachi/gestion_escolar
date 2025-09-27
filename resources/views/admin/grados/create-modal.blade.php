<!-- Modal -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-layer-group"></i> Registro de un
                    Nuevo Grado</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.grados.store') }}" method="POST">
                    @csrf
                    <!-- gestiones -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="niveles">Niveles <b>(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-layer-group"></i></span>
                                    </div>
                                    <select name="niveles_id_create" id="niveles_id_create" class="form-control" required>
                                        <option value="">Seleccione un Nivel</option>
                                        @foreach ($niveles as $nivel)
                                            <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('niveles_id_create')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                     <!-- Nombre -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre del Grado <b>(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-list-alt"></i></span>
                                    </div>
                                    <input type="text" id="nombre_create" name="nombre_create" class="form-control"
                                        value="{{ old('nombre_create') }}" placeholder="ingresar grado...." required>
                                </div>
                                @error('nombre_create')
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
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                    Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
