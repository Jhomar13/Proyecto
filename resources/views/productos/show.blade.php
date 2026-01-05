<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>👁️ Detalles del Producto</h2>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->NOMBREPRO }}</h5>
                        
                        <p><strong>ID:</strong> {{ $producto->IDPRO }}</p>
                        <p><strong>🔒 Código de Barras (Desencriptado):</strong> {{ $producto->CODBARRASPRO }}</p>
                        <p><strong>Precio Mínimo:</strong> ${{ number_format($producto->PRECIOMINPRO, 2) }}</p>
                        <p><strong>Precio Máximo:</strong> ${{ number_format($producto->PRECIOMAXPRO, 2) }}</p>
                        <p><strong>Precio de Compra:</strong> ${{ number_format($producto->PRECIOCOMPRAPRO, 2) }}</p>
                        <p><strong>Precio de Venta:</strong> ${{ number_format($producto->PRECIOVENTAPRO, 2) }}</p>
                        <p><strong>Stock:</strong> {{ $producto->STOCKPRO }}</p>
                        <p><strong>Stock Mínimo:</strong> {{ $producto->STOCKMINPRO }}</p>
                        <p><strong>Categoría:</strong> {{ $producto->IDCAT ?? 'Sin categoría' }}</p>
                        <p><strong>Estado:</strong> 
                            @if($producto->ESTADOCATPRO)
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Inactivo</span>
                            @endif
                        </p>
                        <p><strong>Creado:</strong> {{ $producto->created_at }}</p>
                        <p><strong>Actualizado:</strong> {{ $producto->updated_at }}</p>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('productos.edit', $producto->IDPRO) }}" class="btn btn-warning">✏️ Editar</a>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>