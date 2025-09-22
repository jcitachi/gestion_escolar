<!-- Modal -->
<div class="modal fade" id="ModalUpdate{{ $periodo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-layer-group"></i> Actualizar Periodo</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.periodos.update', $periodo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre del Periodo <b>(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-layer-group"></i></span>
                                    </div>
                                    <input type="text" id="nombre" name="nombre" class="form-control"
                                        value="{{ old('nombre', $periodo->nombre) }}" placeholder="ingresar periodo...." required>
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
                                <a href="{{ route('admin.periodos.index') }}" class="btn btn-default"><i
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
