<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Papelería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>📦 Lista de Productos</h2>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">
                    ➕ Nuevo Producto
                </a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Código Barras 🔒</th>
                            <th>Nombre</th>
                            <th>Precio Venta</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                        <tr>
                            <td>{{ $producto->IDPRO }}</td>
                            <td>{{ $producto->CODBARRASPRO }}</td>
                            <td>{{ $producto->NOMBREPRO }}</td>
                            <td>${{ number_format($producto->PRECIOVENTAPRO, 2) }}</td>
                            <td>{{ $producto->STOCKPRO }}</td>
                            <td>
                                @if($producto->ESTADOCATPRO)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('productos.show', $producto->IDPRO) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                                <a href="{{ route('productos.edit', $producto->IDPRO) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('productos.destroy', $producto->IDPRO) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay productos registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>