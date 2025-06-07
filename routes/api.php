<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\DependenciaExternaController;
use App\Http\Controllers\ActivosInformacionController;
use App\Http\Controllers\ActivoArchivoController;
use App\Http\Controllers\DisponibilidadSlaController;
use App\Http\Controllers\SistemaOperativoController;
use App\Http\Controllers\TecnologiaController;
use App\Http\Controllers\TipoAdquisicionController;
use App\Http\Controllers\TipoAplicativoController;
use App\Http\Controllers\TipoBaseDatosController;
use App\Http\Controllers\TipoConexionController;
use App\Http\Controllers\TipoEntornoController;
use App\Http\Controllers\TipoInterfazController;
use App\Http\Controllers\TipoLicenciaController;
use App\Http\Controllers\TipoServidorWebController;
use App\Http\Controllers\ActivosOportunidadesMejoraController;



Route::get('/', function () {
    # return view('welcome');
    return "ApiInventarioActivosTI";
});


Route::get('/clear_cache', function () {
    Cache::flush(); //LIMPIAR FACHADA CACHE
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});

// /v1/sources
Route::prefix('v1')->group(function () {
    Route::prefix('dependencias')->group(function () {
        Route::get('/', [DependenciaController::class, 'index'])->name('dependencias.index');
        Route::get('/{id}', [DependenciaController::class, 'show'])->name('dependencias.show');
        Route::post('/', [DependenciaController::class, 'store'])->name('dependencias.store');
        Route::put('/{id}', [DependenciaController::class, 'update'])->name('dependencias.update');
        Route::delete('/{id}', [DependenciaController::class, 'destroy'])->name('dependencias.destroy');
    });

    Route::prefix('activos_oportunidades_mejora')->group(function () {
        Route::get('/', [\App\Http\Controllers\ActivosOportunidadesMejoraController::class, 'index'])->name('activos_oportunidades_mejora.index');
        Route::get('/{id}', [\App\Http\Controllers\ActivosOportunidadesMejoraController::class, 'show'])->name('activos_oportunidades_mejora.show');
        Route::post('/', [\App\Http\Controllers\ActivosOportunidadesMejoraController::class, 'store'])->name('activos_oportunidades_mejora.store');
        Route::put('/{id}', [\App\Http\Controllers\ActivosOportunidadesMejoraController::class, 'update'])->name('activos_oportunidades_mejora.update');
        Route::delete('/{id}', [\App\Http\Controllers\ActivosOportunidadesMejoraController::class, 'destroy'])->name('activos_oportunidades_mejora.destroy');
    });

    
    Route::prefix('dependencias_externas')->group(function () {
        Route::get('/', [DependenciaExternaController::class, 'index'])->name('dependencias_externas.index');
        Route::get('/{id}', [DependenciaExternaController::class, 'show'])->name('dependencias_externas.show');
        Route::post('/', [DependenciaExternaController::class, 'store'])->name('dependencias_externas.store');
        Route::put('/{id}', [DependenciaExternaController::class, 'update'])->name('dependencias_externas.update');
        Route::delete('/{id}', [DependenciaExternaController::class, 'destroy'])->name('dependencias_externas.destroy');
    });

   Route::prefix('activos_informacion')->group(function () {
        Route::get('/', [ActivosInformacionController::class, 'index'])->name('activos_informacion.index');
        Route::get('/{id}', [ActivosInformacionController::class, 'show'])->name('activos_informacion.show');
        Route::post('/', [ActivosInformacionController::class, 'store'])->name('activos_informacion.store');
        Route::put('/{id}', [ActivosInformacionController::class, 'update'])->name('activos_informacion.update');
        Route::delete('/{id}', [ActivosInformacionController::class, 'destroy'])->name('activos_informacion.destroy');
    });
   

    Route::prefix('activo_soporte_funcional')->group(function () {
    Route::get('/', [\App\Http\Controllers\ActivoSoporteFuncionalController::class, 'index'])->name('activo_soporte_funcional.index');
    Route::get('/{id}', [\App\Http\Controllers\ActivoSoporteFuncionalController::class, 'show'])->name('activo_soporte_funcional.show');
    Route::post('/', [\App\Http\Controllers\ActivoSoporteFuncionalController::class, 'store'])->name('activo_soporte_funcional.store');
    Route::put('/{id}', [\App\Http\Controllers\ActivoSoporteFuncionalController::class, 'update'])->name('activo_soporte_funcional.update');
    Route::delete('/{id}', [\App\Http\Controllers\ActivoSoporteFuncionalController::class, 'destroy'])->name('activo_soporte_funcional.destroy');
});

Route::prefix('disponibilidades_sla')->group(function () {
        Route::get('/', [\App\Http\Controllers\DisponibilidadSlaController::class, 'index'])->name('disponibilidades_sla.index');
        Route::get('/{id}', [\App\Http\Controllers\DisponibilidadSlaController::class, 'show'])->name('disponibilidades_sla.show');
        Route::post('/', [\App\Http\Controllers\DisponibilidadSlaController::class, 'store'])->name('disponibilidades_sla.store');
        Route::put('/{id}', [\App\Http\Controllers\DisponibilidadSlaController::class, 'update'])->name('disponibilidades_sla.update');
        Route::delete('/{id}', [\App\Http\Controllers\DisponibilidadSlaController::class, 'destroy'])->name('disponibilidades_sla.destroy');
    });

        Route::prefix('sistema_operativos')->group(function () {
        Route::get('/', [\App\Http\Controllers\SistemaOperativoController::class, 'index'])->name('sistema_operativos.index');
        Route::get('/{id}', [\App\Http\Controllers\SistemaOperativoController::class, 'show'])->name('sistema_operativos.show');
        Route::post('/', [\App\Http\Controllers\SistemaOperativoController::class, 'store'])->name('sistema_operativos.store');
        Route::put('/{id}', [\App\Http\Controllers\SistemaOperativoController::class, 'update'])->name('sistema_operativos.update');
        Route::delete('/{id}', [\App\Http\Controllers\SistemaOperativoController::class, 'destroy'])->name('sistema_operativos.destroy');
    });

    Route::prefix('tecnologias')->group(function () {
        Route::get('/', [\App\Http\Controllers\TecnologiaController::class, 'index'])->name('tecnologias.index');
        Route::get('/{id}', [\App\Http\Controllers\TecnologiaController::class, 'show'])->name('tecnologias.show');
        Route::post('/', [\App\Http\Controllers\TecnologiaController::class, 'store'])->name('tecnologias.store');
        Route::put('/{id}', [\App\Http\Controllers\TecnologiaController::class, 'update'])->name('tecnologias.update');
        Route::delete('/{id}', [\App\Http\Controllers\TecnologiaController::class, 'destroy'])->name('tecnologias.destroy');
    });

    Route::prefix('tipo_adquisicion')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoAdquisicionController::class, 'index'])->name('tipo_adquisicion.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoAdquisicionController::class, 'show'])->name('tipo_adquisicion.show');
        Route::post('/', [\App\Http\Controllers\TipoAdquisicionController::class, 'store'])->name('tipo_adquisicion.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoAdquisicionController::class, 'update'])->name('tipo_adquisicion.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoAdquisicionController::class, 'destroy'])->name('tipo_adquisicion.destroy');
    });

    Route::prefix('tipo_aplicativo')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoAplicativoController::class, 'index'])->name('tipo_aplicativo.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoAplicativoController::class, 'show'])->name('tipo_aplicativo.show');
        Route::post('/', [\App\Http\Controllers\TipoAplicativoController::class, 'store'])->name('tipo_aplicativo.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoAplicativoController::class, 'update'])->name('tipo_aplicativo.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoAplicativoController::class, 'destroy'])->name('tipo_aplicativo.destroy');
    });

    Route::prefix('tipo_base_datos')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoBaseDatosController::class, 'index'])->name('tipo_base_datos.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoBaseDatosController::class, 'show'])->name('tipo_base_datos.show');
        Route::post('/', [\App\Http\Controllers\TipoBaseDatosController::class, 'store'])->name('tipo_base_datos.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoBaseDatosController::class, 'update'])->name('tipo_base_datos.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoBaseDatosController::class, 'destroy'])->name('tipo_base_datos.destroy');
    });

    Route::prefix('tipo_conexion')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoConexionController::class, 'index'])->name('tipo_conexion.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoConexionController::class, 'show'])->name('tipo_conexion.show');
        Route::post('/', [\App\Http\Controllers\TipoConexionController::class, 'store'])->name('tipo_conexion.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoConexionController::class, 'update'])->name('tipo_conexion.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoConexionController::class, 'destroy'])->name('tipo_conexion.destroy');
    });

    Route::prefix('tipo_entorno')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoEntornoController::class, 'index'])->name('tipo_entorno.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoEntornoController::class, 'show'])->name('tipo_entorno.show');
        Route::post('/', [\App\Http\Controllers\TipoEntornoController::class, 'store'])->name('tipo_entorno.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoEntornoController::class, 'update'])->name('tipo_entorno.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoEntornoController::class, 'destroy'])->name('tipo_entorno.destroy');
    });

    Route::prefix('tipo_interfaz')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoInterfazController::class, 'index'])->name('tipo_interfaz.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoInterfazController::class, 'show'])->name('tipo_interfaz.show');
        Route::post('/', [\App\Http\Controllers\TipoInterfazController::class, 'store'])->name('tipo_interfaz.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoInterfazController::class, 'update'])->name('tipo_interfaz.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoInterfazController::class, 'destroy'])->name('tipo_interfaz.destroy');
    });

    Route::prefix('tipo_licencia')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoLicenciaController::class, 'index'])->name('tipo_licencia.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoLicenciaController::class, 'show'])->name('tipo_licencia.show');
        Route::post('/', [\App\Http\Controllers\TipoLicenciaController::class, 'store'])->name('tipo_licencia.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoLicenciaController::class, 'update'])->name('tipo_licencia.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoLicenciaController::class, 'destroy'])->name('tipo_licencia.destroy');
    });

    Route::prefix('tipo_servidor_web')->group(function () {
        Route::get('/', [\App\Http\Controllers\TipoServidorWebController::class, 'index'])->name('tipo_servidor_web.index');
        Route::get('/{id}', [\App\Http\Controllers\TipoServidorWebController::class, 'show'])->name('tipo_servidor_web.show');
        Route::post('/', [\App\Http\Controllers\TipoServidorWebController::class, 'store'])->name('tipo_servidor_web.store');
        Route::put('/{id}', [\App\Http\Controllers\TipoServidorWebController::class, 'update'])->name('tipo_servidor_web.update');
        Route::delete('/{id}', [\App\Http\Controllers\TipoServidorWebController::class, 'destroy'])->name('tipo_servidor_web.destroy');
    });

    Route::prefix('activo_archivos')->group(function () {
    Route::get('/', [ActivoArchivoController::class, 'index'])->name('activo_archivos.index');
    Route::get('/{id}', [ActivoArchivoController::class, 'show'])->name('activo_archivos.show');
    Route::post('/', [ActivoArchivoController::class, 'store'])->name('activo_archivos.store');
    Route::put('/{id}', [ActivoArchivoController::class, 'update'])->name('activo_archivos.update');
    Route::delete('/{id}', [ActivoArchivoController::class, 'destroy'])->name('activo_archivos.destroy');
});


});

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});