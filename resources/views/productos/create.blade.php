<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>➕ Crear Nuevo Producto</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">🔒 Código de Barras (se encriptará)</label>
                        <input type="text" name="CODBARRASPRO" class="form-control" maxlength="13" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto</label>
                        <input type="text" name="NOMBREPRO" class="form-control" maxlength="60" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Precio Mínimo</label>
                                <input type="number" name="PRECIOMINPRO" class="form-control" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Precio Máximo</label>
                                <input type="number" name="PRECIOMAXPRO" class="form-control" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Precio de Compra</label>
                                <input type="number" name="PRECIOCOMPRAPRO" class="form-control" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Precio de Venta</label>
                                <input type="number" name="PRECIOVENTAPRO" class="form-control" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Stock Actual</label>
                                <input type="number" name="STOCKPRO" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Stock Mínimo</label>
                                <input type="number" name="STOCKMINPRO" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Categoría (ID)</label>
                        <input type="number" name="IDCAT" class="form-control">
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="ESTADOCATPRO" id="estado" checked>
                        <label class="form-check-label" for="estado">
                            Producto Activo
                        </label>
                    </div>

                    <button type="submit" class="btn btn-success">💾 Guardar Producto</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">❌ Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>