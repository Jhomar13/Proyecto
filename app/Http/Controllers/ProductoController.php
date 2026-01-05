<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all();
        
        // Desencriptar los códigos de barras al mostrar
        foreach ($productos as $producto) {
            try {
                $producto->CODBARRASPRO = Crypt::decryptString($producto->CODBARRASPRO);
            } catch (\Exception $e) {
                // Si falla la desencriptación, mantener el valor original
            }
        }
        
        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('productos.create');
    }

    // Guardar producto
    public function store(Request $request)
    {
        $request->validate([
            'CODBARRASPRO' => 'required|string|max:13',
            'NOMBREPRO' => 'required|string|max:60',
            'PRECIOMINPRO' => 'required|numeric|min:0',
            'PRECIOMAXPRO' => 'required|numeric|min:0',
            'STOCKPRO' => 'required|integer|min:0',
            'PRECIOCOMPRAPRO' => 'required|numeric|min:0',
            'PRECIOVENTAPRO' => 'required|numeric|min:0',
            'STOCKMINPRO' => 'required|integer|min:0',
        ]);

        // Encriptar el código de barras (dato sensible)
        $producto = new Producto();
        $producto->IDCAT = $request->IDCAT;
        $producto->CODBARRASPRO = Crypt::encryptString($request->CODBARRASPRO);
        $producto->NOMBREPRO = $request->NOMBREPRO;
        $producto->PRECIOMINPRO = $request->PRECIOMINPRO;
        $producto->PRECIOMAXPRO = $request->PRECIOMAXPRO;
        $producto->STOCKPRO = $request->STOCKPRO;
        $producto->ESTADOCATPRO = $request->has('ESTADOCATPRO');
        $producto->PRECIOCOMPRAPRO = $request->PRECIOCOMPRAPRO;
        $producto->PRECIOVENTAPRO = $request->PRECIOVENTAPRO;
        $producto->STOCKMINPRO = $request->STOCKMINPRO;
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    // Mostrar un producto específico
    public function show(Producto $producto)
    {
        // Desencriptar código de barras
        try {
            $producto->CODBARRASPRO = Crypt::decryptString($producto->CODBARRASPRO);
        } catch (\Exception $e) {
            // Manejar error
        }
        
        return view('productos.show', compact('producto'));
    }

    // Mostrar formulario de edición
    public function edit(Producto $producto)
    {
        // Desencriptar código de barras para edición
        try {
            $producto->CODBARRASPRO = Crypt::decryptString($producto->CODBARRASPRO);
        } catch (\Exception $e) {
            // Manejar error
        }
        
        return view('productos.edit', compact('producto'));
    }

    // Actualizar producto
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'CODBARRASPRO' => 'required|string|max:13',
            'NOMBREPRO' => 'required|string|max:60',
            'PRECIOMINPRO' => 'required|numeric|min:0',
            'PRECIOMAXPRO' => 'required|numeric|min:0',
            'STOCKPRO' => 'required|integer|min:0',
            'PRECIOCOMPRAPRO' => 'required|numeric|min:0',
            'PRECIOVENTAPRO' => 'required|numeric|min:0',
            'STOCKMINPRO' => 'required|integer|min:0',
        ]);

        // Encriptar el código de barras actualizado
        $producto->IDCAT = $request->IDCAT;
        $producto->CODBARRASPRO = Crypt::encryptString($request->CODBARRASPRO);
        $producto->NOMBREPRO = $request->NOMBREPRO;
        $producto->PRECIOMINPRO = $request->PRECIOMINPRO;
        $producto->PRECIOMAXPRO = $request->PRECIOMAXPRO;
        $producto->STOCKPRO = $request->STOCKPRO;
        $producto->ESTADOCATPRO = $request->has('ESTADOCATPRO');
        $producto->PRECIOCOMPRAPRO = $request->PRECIOCOMPRAPRO;
        $producto->PRECIOVENTAPRO = $request->PRECIOVENTAPRO;
        $producto->STOCKMINPRO = $request->STOCKMINPRO;
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    // Eliminar producto
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}