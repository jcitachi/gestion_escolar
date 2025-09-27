<!-- Modal -->
<div class="modal fade" id="ModalUpdate{{ $paralelo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-layer-group"></i> Actualizar Paralelo</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.paralelos.update', $paralelo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Grados <b>(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-list-alt"></i></span>
                                    </div>
                                    <select name="grado_id" class="form-control" id="grado_id" required>
                                        <option value="">Seleccione un Grado</option>
                                        @foreach ($grados as $grado)
                                            <option value="{{ $grado->id }}"{{ old('grado_id', $grado->id  == $paralelo->grado_id)  ? 'selected' : '' }}>
                                                {{ $grado->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                 @error('grado_id')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombre del Paralelo <b>(*)</b></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fw fa-clone"></i></span>
                                    </div>
                                    <input type="text" id="nombre" name="nombre" class="form-control"
                                        value="{{ old('nombre', $paralelo->nombre) }}" placeholder="ingresar un paralelo...." required>
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
                                <a href="{{ route('admin.paralelos.index') }}" class="btn btn-default"><i
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
