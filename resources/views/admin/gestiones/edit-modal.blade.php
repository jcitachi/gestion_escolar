<!-- Modal -->
<div class="modal fade" id="modalEditar{{ $gestion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h3 class="card-title"><i class="fas fa-edit"></i> LLene los datos del formularío</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.gestiones.update', $gestion->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <!-- Nombre -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Nombre <b>(*)</b></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-university"></i></span>
                                                    </div>
                                                    <input type="number" id="nombre" name="nombre"
                                                        class="form-control"
                                                        value="{{ old('nombre', $gestion->nombre) }}"
                                                        placeholder="Ej:2030" required>
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
                                                <a href="{{ route('admin.gestiones.index') }}"
                                                    class="btn btn-default"><i class="fas fa-arrow-left"></i> Volver</a>
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fas fa-save"></i>
                                                    Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
