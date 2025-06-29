<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

/* ========= HOME ================================================ */
Route::get('/home', fn() => view('home'));


/* ========= CLIENTES ============================================ */
// Listado
Route::get('/clientes', function () {
    $clientes = DB::table('clientes')
        ->select(
            'clientes.id_clientes',
            DB::raw("CONCAT(clientes.apellido, ', ', clientes.nombre) as nombre_completo"),
            'clientes.dni',
            'clientes.fechanacimiento',
            'provincias.descripcion as provincia',
            'clientes.cuit',
            'clientes.telefono',
            'condicion.descripcion as condicion_iva'
        )
        ->leftJoin('provincias', 'clientes.rela_provincia', '=', 'provincias.id_provincia')
        ->leftJoin('condicion', 'clientes.rela_condicioniva', '=', 'condicion.id_condicioniva')
        ->orderBy('clientes.apellido')
        ->get();
    return view('clientes.index', compact('clientes'));
});

// Form alta
Route::get('/cliente/create', function () {
    $provincias = DB::table('provincias')
        ->orderBy('descripcion')->get();
    $condiciones = DB::table('condicion')
        ->orderBy('descripcion')->get();
    return view(
        'clientes.create',
        compact('provincias', 'condiciones')
    );
});

// Insertar
Route::post('/cliente/store', function () {
    $request = request()->validate([
        'nombre'  => ['required', 'string', 'max:250', 'regex:/^[\pL\s\-]+$/u'],
        'apellido' => ['required', 'string', 'max:250', 'regex:/^[\pL\s\-]+$/u'],
        'dni'     => ['required', 'digits:8', 'numeric', 'unique:clientes,dni'],
        'fechanacimiento' => ['nullable', 'date'],
        'rela_provincia'  => ['nullable', 'integer', 'exists:provincias,id_provincia'],
        'localidad'       => ['nullable', 'string', 'max:250', 'regex:/^[\pL\s\-]+$/u'],
        'direccion'       => ['nullable', 'string', 'max:250'],
        'cuit'            => ['nullable', 'string', 'max:20', 'regex:/^[0-9\-]+$/', 'unique:clientes,cuit'],
        'email'           => ['nullable', 'email', 'max:250', 'unique:clientes,email'],
        'telefono'        => ['nullable', 'string', 'max:30', 'regex:/^[0-9\-\s\(\)]+$/'],
        'rela_condicioniva' => ['nullable', 'integer', 'exists:condicion,id_condicioniva'],
    ]);
    try {
        DB::table('clientes')->insert($request);
        return redirect('/clientes')
            ->with(['mensaje' => 'Cliente agregado correctamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return redirect('/clientes')
            ->with(['mensaje' => 'Error al agregar el cliente', 'css' => 'danger']);
    }
});

// Form edición
Route::get('/cliente/edit/{id}', function ($id) {
    $cliente     = DB::table('clientes')->where('id_clientes', $id)->first();
    $provincias  = DB::table('provincias')->orderBy('descripcion')->get();
    $condiciones = DB::table('condicion')->orderBy('descripcion')->get();

    return view(
        'clientes.edit',
        compact('cliente', 'provincias', 'condiciones')
    );
});

// Actualizar
Route::patch('/cliente/update', function () {
    $id   = request()->id_clientes;
    $request = request()->validate([
        'nombre'  => ['required', 'string', 'max:250', 'regex:/^[\pL\s\-]+$/u'],
        'apellido' => ['required', 'string', 'max:250', 'regex:/^[\pL\s\-]+$/u'],
        'dni'     => ['required', 'digits:8', 'numeric', 'unique:clientes,dni,' . $id . ',id_clientes'],
        'fechanacimiento' => ['nullable', 'date'],
        'rela_provincia'  => ['nullable', 'integer', 'exists:provincias,id_provincia'],
        'localidad'       => ['nullable', 'string', 'max:250', 'regex:/^[\pL\s\-]+$/u'],
        'direccion'       => ['nullable', 'string', 'max:250'],
        'cuit'            => ['nullable', 'string', 'max:20', 'regex:/^[0-9\-]+$/', 'unique:clientes,cuit,' . $id . ',id_clientes'],
        'email'           => ['nullable', 'email', 'max:250', 'unique:clientes,email,' . $id . ',id_clientes'],
        'telefono'        => ['nullable', 'string', 'max:30', 'regex:/^[0-9\-\s\(\)]+$/'],
        'rela_condicioniva' => ['nullable', 'integer', 'exists:condicion,id_condicioniva'],
    ]);
    try {
        DB::table('clientes')->where('id_clientes', $id)->update($request);
        return redirect('/clientes')->with(['mensaje' => 'Modificado', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo modificar', 'css' => 'danger']);
    }
});

// Confirmar baja
Route::get('/cliente/delete/{id}', function ($id) {
    $cliente = DB::table('clientes')->where('id_clientes', $id)->first();
    return view('clientes.delete', compact('cliente'));
});

// Eliminar
Route::delete('/cliente/destroy', function () {
    $id = request()->id_clientes;
    try {
        DB::table('clientes')->where('id_clientes', $id)->delete();
        return redirect('/clientes')->with(['mensaje' => 'Eliminado', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo eliminar', 'css' => 'danger']);
    }
});

/* ========= CONDICIÓN IVA ======================================= */
// Listado
Route::get('/condiciones', function () {
    $condiciones = DB::table('condicion')
        ->select('id_condicioniva', 'descripcion')
        ->orderBy('descripcion')
        ->get();
    return view('condicion.index', compact('condiciones'));
});

// Formulario alta
Route::get('/condicion/create', function () {
    return view('condicion.create');
});

// Insertar
Route::post('/condicion/store', function () {
    $request = request()->validate([
        'descripcion' => ['required', 'string', 'max:250', 'unique:condicion,descripcion', 'regex:/^[\pL\s\-]+$/u'],
    ]);
    try {
        DB::table('condicion')->insert($request);
        return redirect('/condiciones')
            ->with(['mensaje' => 'Condición agregada correctamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return redirect('/condiciones')
            ->with(['mensaje' => 'Error al agregar la condición', 'css' => 'danger']);
    }
});

// Formulario edición
Route::get('/condicion/edit/{id}', function ($id) {
    $condicion = DB::table('condicion')
        ->where('id_condicioniva', $id)
        ->first();
    return view('condicion.edit', compact('condicion'));
});

// Actualizar
Route::patch('/condicion/update', function () {
    $id = request()->id_condicioniva;
    $request = request()->validate([
        'descripcion' => ['required', 'string', 'max:250', 'unique:condicion,descripcion,' . $id . ',id_condicioniva', 'regex:/^[\pL\s\-]+$/u'],
    ]);
    try {
        DB::table('condicion')
            ->where('id_condicioniva', $id)
            ->update($request);
        return redirect('/condiciones')
            ->with(['mensaje' => 'Condición modificada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()
            ->with(['mensaje' => 'No se pudo modificar la condición', 'css' => 'danger']);
    }
});

// Confirmar baja
Route::get('/condicion/delete/{id}', function ($id) {
    $condicion = DB::table('condicion')
        ->where('id_condicioniva', $id)
        ->first();
    return view('condicion.delete', compact('condicion'));
});

// Eliminar
Route::delete('/condicion/destroy', function () {
    $id = request()->id_condicioniva;
    try {
        DB::table('condicion')
            ->where('id_condicioniva', $id)
            ->delete();
        return redirect('/condiciones')
            ->with(['mensaje' => 'Condición eliminada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()
            ->with(['mensaje' => 'No se pudo eliminar la condición', 'css' => 'danger']);
    }
});

/* ========= PROVINCIAS ========================================== */
// Listado
Route::get('/provincias', function () {
    $provincias = DB::table('provincias')
        ->select('id_provincia', 'descripcion')
        ->orderBy('descripcion')
        ->get();
    return view('provincias.index', compact('provincias'));
});

// Formulario alta
Route::get('/provincias/create', function () {
    return view('provincias.create');
});

// Insertar
Route::post('/provincias/store', function () {
    $request = request()->validate([
        'descripcion' => ['required', 'string', 'max:250', 'unique:provincias,descripcion', 'regex:/^[\pL\s\-]+$/u'],
    ]);
    try {
        DB::table('provincias')->insert($request);
        return redirect('/provincias')
            ->with(['mensaje' => 'Provincia agregada correctamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return redirect('/provincias')
            ->with(['mensaje' => 'Error al agregar la provincia', 'css' => 'danger']);
    }
});

// Formulario edición
Route::get('/provincias/edit/{id}', function ($id) {
    $provincia = DB::table('provincias')
        ->where('id_provincia', $id)
        ->first();
    return view('provincias.edit', compact('provincia'));
});

// Actualizar
Route::patch('/provincias/update', function () {
    $id = request()->id_provincia;
    $request = request()->validate([
        'descripcion' => ['required', 'string', 'max:250', 'unique:provincias,descripcion,' . $id . ',id_provincia', 'regex:/^[\pL\s\-]+$/u'],
    ]);
    try {
        DB::table('provincias')
            ->where('id_provincia', $id)
            ->update($request);
        return redirect('/provincias')
            ->with(['mensaje' => 'Provincia modificada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()
            ->with(['mensaje' => 'No se pudo modificar la provincia', 'css' => 'danger']);
    }
});

// Confirmar baja
Route::get('/provincias/delete/{id}', function ($id) {
    $provincia = DB::table('provincias')
        ->where('id_provincia', $id)
        ->first();
    return view('provincias.delete', compact('provincia'));
});

// Eliminar
Route::delete('/provincias/destroy', function () {
    $id = request()->id_provincia;
    try {
        DB::table('provincias')
            ->where('id_provincia', $id)
            ->delete();
        return redirect('/provincias')
            ->with(['mensaje' => 'Provincia eliminada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()
            ->with(['mensaje' => 'No se pudo eliminar la provincia', 'css' => 'danger']);
    }
});

/* ========= PROVEEDORES ========================================= */
// Listado
Route::get('/proveedores', function () {
    $proveedores = DB::table('proveedores')
        ->select(
            'id_proveedores',
            'razon_social',
            'telefono_contacto',
            'persona_contacto',
            'cuit'
        )
        ->orderBy('razon_social')
        ->get();
    return view('proveedores.index', compact('proveedores'));
});

// Formulario alta
Route::get('/proveedores/create', function () {
    $condiciones = DB::table('condicion')
        ->orderBy('descripcion')
        ->get();
    return view('proveedores.create', compact('condiciones'));
});

// Insertar
Route::post('/proveedores/store', function () {
    $request = request()->validate([
        'razon_social'      => [
            'required',
            'string',
            'max:250',
            'unique:proveedores,razon_social'
        ],
        'telefono_contacto' => ['required', 'string', 'max:250', 'unique:proveedores,telefono_contacto'],
        'persona_contacto'  => ['required', 'string', 'max:250'],
        'cuit'              => [
            'required',
            'digits:11',
            'unique:proveedores,cuit'
        ],
        'rela_condicioniva' => [
            'required',
            'integer',
            'exists:condicion,id_condicioniva'
        ],
    ]);

    try {
        DB::table('proveedores')->insert($request);
        return redirect('/proveedores')
            ->with([
                'mensaje' => 'Proveedor agregado correctamente',
                'css' => 'success'
            ]);
    } catch (\Throwable $e) {
        return redirect('/proveedores')
            ->with([
                'mensaje' => 'Error al agregar el proveedor',
                'css' => 'danger'
            ]);
    }
});

// Formulario edición
Route::get('/proveedores/edit/{id}', function ($id) {
    $proveedor   = DB::table('proveedores')
        ->where('id_proveedores', $id)
        ->first();
    $condiciones = DB::table('condicion')
        ->orderBy('descripcion')
        ->get();
    return view(
        'proveedores.edit',
        compact('proveedor', 'condiciones')
    );
});

// Actualizar
Route::patch('/proveedores/update', function () {
    $id = request()->id_proveedores;

    $request = request()->validate([
        'razon_social'      => [
            'required',
            'string',
            'max:250',
            'unique:proveedores,razon_social,' .
                $id . ',id_proveedores'
        ],
        'telefono_contacto' => ['required', 'string', 'max:250', 'unique:proveedores,telefono_contacto,' . $id . ',id_proveedores'],
        'persona_contacto'  => ['required', 'string', 'max:250'],
        'cuit'              => [
            'required',
            'digits:11',
            'unique:proveedores,cuit,' .
                $id . ',id_proveedores'
        ],
        'rela_condicioniva' => [
            'required',
            'integer',
            'exists:condicion,id_condicioniva'
        ],
    ]);

    try {
        DB::table('proveedores')
            ->where('id_proveedores', $id)
            ->update($request);
        return redirect('/proveedores')
            ->with(['mensaje' => 'Proveedor modificado', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with([
            'mensaje' => 'No se pudo modificar el proveedor',
            'css' => 'danger'
        ]);
    }
});

// Confirmar baja
Route::get('/proveedores/delete/{id}', function ($id) {
    $proveedor = DB::table('proveedores')
        ->where('id_proveedores', $id)
        ->first();
    return view('proveedores.delete', compact('proveedor'));
});

// Eliminar
Route::delete('/proveedores/destroy', function () {
    $id = request()->id_proveedores;
    try {
        DB::table('proveedores')
            ->where('id_proveedores', $id)
            ->delete();
        return redirect('/proveedores')
            ->with(['mensaje' => 'Proveedor eliminado', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with([
            'mensaje' => 'No se pudo eliminar el proveedor',
            'css' => 'danger'
        ]);
    }
});


/* ========= MARCAS ============================================== */
// Listado
Route::get('/marcas', function () {
    $marcas = DB::table('marcas')
        ->select('id_marcas', 'marcas_descripcion')
        ->orderBy('marcas_descripcion')
        ->get();
    return view('marcas.index', compact('marcas'));
});

// Formulario alta
Route::get('/marcas/create', function () {
    return view('marcas.create');
});

// Insertar
Route::post('/marcas/store', function () {
    $request = request()->validate([
        'marcas_descripcion' => ['required', 'string', 'max:250', 'unique:marcas,marcas_descripcion', 'regex:/^[\pL\s\-]+$/u'],
    ]);
    try {
        DB::table('marcas')->insert($request);
        return redirect('/marcas')
            ->with(['mensaje' => 'Marca agregada correctamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return redirect('/marcas')
            ->with(['mensaje' => 'Error al agregar la marca', 'css' => 'danger']);
    }
});

// Formulario edición
Route::get('/marcas/edit/{id}', function ($id) {
    $marca = DB::table('marcas')
        ->where('id_marcas', $id)
        ->first();
    return view('marcas.edit', compact('marca'));
});

// Actualizar
Route::patch('/marcas/update', function () {
    $id = request()->id_marcas;
    $request = request()->validate([
        'marcas_descripcion' => ['required', 'string', 'max:250', 'unique:marcas,marcas_descripcion,' . $id . ',id_marcas', 'regex:/^[\pL\s\-]+$/u'],
    ]);
    try {
        DB::table('marcas')->where('id_marcas', $id)->update($request);
        return redirect('/marcas')
            ->with(['mensaje' => 'Marca modificada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo modificar la marca', 'css' => 'danger']);
    }
});

// Confirmar baja
Route::get('/marcas/delete/{id}', function ($id) {
    $marca = DB::table('marcas')
        ->where('id_marcas', $id)
        ->first();
    return view('marcas.delete', compact('marca'));
});

// Eliminar
Route::delete('/marcas/destroy', function () {
    $id = request()->id_marcas;
    try {
        DB::table('marcas')->where('id_marcas', $id)->delete();
        return redirect('/marcas')
            ->with(['mensaje' => 'Marca eliminada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo eliminar la marca', 'css' => 'danger']);
    }
});

/* ========= MEDIDAS ============================================ */
// Listado
Route::get('/medidas', function () {
    $medidas = DB::table('medidas')
        ->select('id_medida', 'abreviatura', 'descripcion', 'activo')
        ->where('activo', 1)
        ->orderBy('descripcion')
        ->get();
    return view('medidas.index', compact('medidas'));
});

// Formulario alta
Route::get('/medidas/create', fn() => view('medidas.create'));

// Insertar
Route::post('/medidas/store', function () {
    $request = request()->validate([
        'abreviatura' => [
            'required',
            'string',
            'max:10',
            'regex:/^[A-Z0-9]{1,10}$/',
            'unique:medidas,abreviatura',
        ],
        'descripcion' => [
            'required',
            'string',
            'max:250',
            'unique:medidas,descripcion',
        ],
        'activo' => ['nullable', 'boolean'],
    ]);

    // si no viene el checkbox “activo”, lo damos de alta como 0
    $request['activo'] = $request['activo'] ?? 0;

    try {
        DB::table('medidas')->insert($request);
        return redirect('/medidas')
            ->with(['mensaje' => 'Medida agregada correctamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return redirect('/medidas')
            ->with(['mensaje' => 'Error al agregar la medida', 'css' => 'danger']);
    }
});

// Formulario edición
Route::get('/medidas/edit/{id}', function ($id) {
    $medida = DB::table('medidas')
        ->where('id_medida', $id)
        ->first();
    return view('medidas.edit', compact('medida'));
});

// Actualizar
Route::patch('/medidas/update', function () {
    $id = request()->id_medida;

    $request = request()->validate([
        'abreviatura' => [
            'required',
            'string',
            'max:10',
            'regex:/^[A-Z0-9]{1,10}$/',
            'unique:medidas,abreviatura,' . $id . ',id_medida',
        ],
        'descripcion' => [
            'required',
            'string',
            'max:250',
            'unique:medidas,descripcion,' . $id . ',id_medida',
        ],
        'activo' => ['nullable', 'boolean'],
    ]);

    $request['activo'] = $request['activo'] ?? 0;

    try {
        DB::table('medidas')
            ->where('id_medida', $id)
            ->update($request);
        return redirect('/medidas')
            ->with(['mensaje' => 'Medida modificada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo modificar la medida', 'css' => 'danger']);
    }
});

// Confirmar baja
Route::get('/medidas/delete/{id}', function ($id) {
    $medida = DB::table('medidas')
        ->where('id_medida', $id)
        ->first();
    return view('medidas.delete', compact('medida'));
});

// Eliminar (baja lógica)
Route::delete('/medidas/destroy', function () {
    $id = request()->id_medida;
    try {
        DB::table('medidas')
            ->where('id_medida', $id)
            ->update(['activo' => 0]);
        return redirect('/medidas')
            ->with(['mensaje' => 'Medida eliminada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo eliminar la medida', 'css' => 'danger']);
    }
});

/* ========= MEDIDAS INACTIVAS =================================== */
// Listar inactivas
Route::get('/medidas/inactivas', function () {
    $medidas = DB::table('medidas')
        ->select('id_medida', 'abreviatura', 'descripcion')
        ->where('activo', 0)
        ->orderBy('descripcion')
        ->get();
    return view('medidas.inactive', compact('medidas'));
});

// Confirmar reactivación
Route::get('/medidas/reactivar/{id}', function ($id) {
    $medida = DB::table('medidas')
        ->where('id_medida', $id)
        ->first();
    return view('medidas.reactivate', compact('medida'));
});

// Reactivar
Route::patch('/medidas/reactivar', function () {
    $id = request()->id_medida;
    try {
        DB::table('medidas')
            ->where('id_medida', $id)
            ->update(['activo' => 1]);
        return redirect('/medidas/inactivas')
            ->with(['mensaje' => 'Medida reactivada', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo reactivar', 'css' => 'danger']);
    }
});

// Confirmar eliminación definitiva
Route::get('/medidas/purge/{id}', function ($id) {
    $medida = DB::table('medidas')
        ->where('id_medida', $id)
        ->first();
    return view('medidas.purge', compact('medida'));
});

// Eliminar físicamente
Route::delete('/medidas/purge', function () {
    $id = request()->id_medida;
    try {
        DB::table('medidas')
            ->where('id_medida', $id)
            ->delete();
        return redirect('/medidas/inactivas')
            ->with(['mensaje' => 'Medida eliminada definitivamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo eliminar', 'css' => 'danger']);
    }
});

/* ========= PRODUCTOS ========================================== */
// Listado (solo activos)
Route::get('/productos', function () {
    $productos = DB::table('productos')
        ->select(
            'productos.id_productos',
            'productos.descripcion',
            'productos.precio_venta',
            'productos.precio_compra',
            'productos.cantidad_actual',
            'productos.porcentaje_utilidad',
            'productos.cantidad_minima',
            'marcas.marcas_descripcion as marca',
            'medidas.abreviatura as medida',
            'proveedores.razon_social as proveedor'
        )
        ->leftJoin('marcas', 'productos.rela_marcas', '=', 'marcas.id_marcas')
        ->leftJoin('medidas', 'productos.rela_medidas', '=', 'medidas.id_medida')
        ->leftJoin('proveedores', 'productos.rela_proveedor', '=', 'proveedores.id_proveedores')
        ->where('productos.activo', 1)
        ->orderBy('productos.descripcion')
        ->get();
    return view('productos.index', compact('productos'));
});

// Formulario alta
Route::get('/productos/create', function () {
    $marcas      = DB::table('marcas')->orderBy('marcas_descripcion')->get();
    $medidas     = DB::table('medidas')->where('activo', 1)->orderBy('descripcion')->get();
    $proveedores = DB::table('proveedores')->orderBy('razon_social')->get();
    return view('productos.create', compact('marcas', 'medidas', 'proveedores'));
});

// Insertar
Route::post('/productos/store', function () {
    $request = request()->validate([
        'descripcion'         => ['required', 'string', 'max:250', 'unique:productos,descripcion'],
        'rela_marcas'         => ['required', 'integer', 'exists:marcas,id_marcas'],
        'rela_medidas'        => ['required', 'integer', 'exists:medidas,id_medida'],
        'rela_rubro'          => ['nullable', 'integer'],
        'cantidad_actual'     => ['required', 'integer', 'min:0'],
        'precio_compra'       => ['required', 'numeric', 'min:0'],
        'porcentaje_utilidad' => ['required', 'numeric', 'min:0', 'max:100'],
        'rela_proveedor'      => ['required', 'integer', 'exists:proveedores,id_proveedores'],
        'cantidad_minima'     => ['required', 'integer', 'min:0'],
        'activo'              => ['nullable', 'boolean'],
    ]);
    // Forzar a 0 o 1 para campo bit
    $request['activo'] = (isset($request['activo']) && $request['activo']) ? 1 : 0;
    $request['precio_venta'] = $request['precio_compra'] * (1 + $request['porcentaje_utilidad'] / 100);
    try {
        DB::table('productos')->insert($request);
        return redirect('/productos')
            ->with(['mensaje' => 'Producto agregado correctamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return redirect('/productos')
            ->with(['mensaje' => strval($e), 'css' => 'danger']);
    }
});

// Formulario edición
Route::get('/productos/edit/{id}', function ($id) {
    $producto = DB::table('productos')
        ->select(
            'productos.*',
            'marcas.marcas_descripcion as marca',
            'medidas.abreviatura as medida',
            'proveedores.razon_social as proveedor'
        )
        ->leftJoin('marcas', 'productos.rela_marcas', '=', 'marcas.id_marcas')
        ->leftJoin('medidas', 'productos.rela_medidas', '=', 'medidas.id_medida')
        ->leftJoin('proveedores', 'productos.rela_proveedor', '=', 'proveedores.id_proveedores')
        ->where('productos.id_productos', $id)
        ->first();
    $marcas      = DB::table('marcas')->orderBy('marcas_descripcion')->get();
    $medidas     = DB::table('medidas')->where('activo', 1)->orderBy('descripcion')->get();
    $proveedores = DB::table('proveedores')->orderBy('razon_social')->get();
    return view('productos.edit', compact('producto', 'marcas', 'medidas', 'proveedores'));
});

// Actualizar
Route::patch('/productos/update', function () {
    $id = request()->id_productos;
    $request = request()->validate([
        'descripcion'         => ['required', 'string', 'max:250', 'unique:productos,descripcion,' . $id . ',id_productos'],
        'rela_marcas'         => ['required', 'integer', 'exists:marcas,id_marcas'],
        'rela_medidas'        => ['required', 'integer', 'exists:medidas,id_medida'],
        'rela_rubro'          => ['nullable', 'integer'],
        'cantidad_actual'     => ['required', 'integer', 'min:0'],
        'precio_compra'       => ['required', 'numeric', 'min:0'],
        'porcentaje_utilidad' => ['required', 'numeric', 'min:0', 'max:100'],
        'rela_proveedor'      => ['required', 'integer', 'exists:proveedores,id_proveedores'],
        'cantidad_minima'     => ['required', 'integer', 'min:0'],
        'activo'              => ['nullable', 'boolean'],
    ]);
    $request['activo'] = (isset($request['activo']) && $request['activo']) ? 1 : 0;
    $request['precio_venta'] = $request['precio_compra'] * (1 + $request['porcentaje_utilidad'] / 100);
    try {
        DB::table('productos')->where('id_productos', $id)->update($request);
        return redirect('/productos')
            ->with(['mensaje' => 'Producto modificado', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo modificar el producto', 'css' => 'danger']);
    }
});

// Confirmar baja
Route::get('/productos/delete/{id}', function ($id) {
    $producto = DB::table('productos')
        ->select(
            'productos.*',
            'marcas.marcas_descripcion as marca',
            'medidas.abreviatura as medida',
            'proveedores.razon_social as proveedor'
        )
        ->leftJoin('marcas', 'productos.rela_marcas', '=', 'marcas.id_marcas')
        ->leftJoin('medidas', 'productos.rela_medidas', '=', 'medidas.id_medida')
        ->leftJoin('proveedores', 'productos.rela_proveedor', '=', 'proveedores.id_proveedores')
        ->where('productos.id_productos', $id)
        ->first();
    return view('productos.delete', compact('producto'));
});

// Eliminar (baja lógica)
Route::delete('/productos/destroy', function () {
    $id = request()->id_productos;
    try {
        DB::table('productos')->where('id_productos', $id)->update(['activo' => 0]);
        return redirect('/productos')
            ->with(['mensaje' => 'Producto eliminado', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo eliminar el producto', 'css' => 'danger']);
    }
});

/* ========= PRODUCTOS INACTIVOS =============================== */
// Listar inactivos
Route::get('/productos/inactivos', function () {
    $productos = DB::table('productos')
        ->select(
            'productos.id_productos',
            'productos.descripcion',
            'productos.precio_venta',
            'productos.cantidad_actual',
            'productos.cantidad_minima',
            'marcas.marcas_descripcion as marca',
            'medidas.abreviatura as medida',
            'proveedores.razon_social as proveedor'
        )
        ->leftJoin('marcas', 'productos.rela_marcas', '=', 'marcas.id_marcas')
        ->leftJoin('medidas', 'productos.rela_medidas', '=', 'medidas.id_medida')
        ->leftJoin('proveedores', 'productos.rela_proveedor', '=', 'proveedores.id_proveedores')
        ->where('productos.activo', 0)
        ->orderBy('productos.descripcion')
        ->get();
    return view('productos.inactive', compact('productos'));
});

// Confirmar reactivación
Route::get('/productos/reactivar/{id}', function ($id) {
    $producto = DB::table('productos')
        ->select(
            'productos.*',
            'marcas.marcas_descripcion as marca',
            'medidas.abreviatura as medida',
            'proveedores.razon_social as proveedor'
        )
        ->leftJoin('marcas', 'productos.rela_marcas', '=', 'marcas.id_marcas')
        ->leftJoin('medidas', 'productos.rela_medidas', '=', 'medidas.id_medida')
        ->leftJoin('proveedores', 'productos.rela_proveedor', '=', 'proveedores.id_proveedores')
        ->where('productos.id_productos', $id)
        ->first();
    return view('productos.reactivate', compact('producto'));
});

// Reactivar
Route::patch('/productos/reactivar', function () {
    $id = request()->id_productos;
    try {
        DB::table('productos')->where('id_productos', $id)->update(['activo' => 1]);
        return redirect('/productos/inactivos')
            ->with(['mensaje' => 'Producto reactivado', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo reactivar', 'css' => 'danger']);
    }
});

// Confirmar eliminación definitiva
Route::get('/productos/purge/{id}', function ($id) {
    $producto = DB::table('productos')
        ->select(
            'productos.*',
            'marcas.marcas_descripcion as marca',
            'medidas.abreviatura as medida',
            'proveedores.razon_social as proveedor'
        )
        ->leftJoin('marcas', 'productos.rela_marcas', '=', 'marcas.id_marcas')
        ->leftJoin('medidas', 'productos.rela_medidas', '=', 'medidas.id_medida')
        ->leftJoin('proveedores', 'productos.rela_proveedor', '=', 'proveedores.id_proveedores')
        ->where('productos.id_productos', $id)
        ->first();
    return view('productos.purge', compact('producto'));
});

// Eliminar físicamente
Route::delete('/productos/purge', function () {
    $id = request()->id_productos;
    try {
        DB::table('productos')->where('id_productos', $id)->delete();
        return redirect('/productos/inactivos')
            ->with(['mensaje' => 'Producto eliminado definitivamente', 'css' => 'success']);
    } catch (\Throwable $e) {
        return back()->with(['mensaje' => 'No se pudo eliminar', 'css' => 'danger']);
    }
});
