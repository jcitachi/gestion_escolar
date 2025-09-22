<!-- Modal -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-layer-group"></i> Registro de un
                    Nuevo Nivel</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.niveles.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_create">Nombre <b>(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-layer-group"></i></span>
                                    </div>
                                    <input type="text" id="nombre_create" name="nombre_create" class="form-control"
                                        value="{{ old('nombre_create') }}" placeholder="ingresar nivel...." required>
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
                                <a href="{{ route('admin.niveles.index') }}" class="btn btn-default"><i
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
