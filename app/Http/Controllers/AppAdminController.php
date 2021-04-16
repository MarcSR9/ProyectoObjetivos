<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleAppAdministration;
use App\Modules\ModuleGoals;
use App\Modules\ModuleUsers;
use DB;

class AppAdminController extends Controller
{
    public function activarTrimestre1()
	{
		DB::table('app_administration')->update(['trimester_1' => 'enabled']);
		return back();
	}

	public function desactivarTrimestre1()
	{
		DB::table('app_administration')->update(['trimester_1' => 'disabled']);
		return back();
	}

	public function activarTrimestre2()
	{
		DB::table('app_administration')->update(['trimester_2' => 'enabled']);
		return back();
	}

	public function desactivarTrimestre2()
	{
		DB::table('app_administration')->update(['trimester_2' => 'disabled']);
		return back();
	}

	public function activarTrimestre3()
	{
		DB::table('app_administration')->update(['trimester_3' => 'enabled']);
		return back();
	}

	public function desactivarTrimestre3()
	{
		DB::table('app_administration')->update(['trimester_3' => 'disabled']);
		return back();
	}

	public function activarTrimestre4()
	{
		DB::table('app_administration')->update(['trimester_4' => 'enabled']);
		return back();
	}

	public function desactivarTrimestre4()
	{
		DB::table('app_administration')->update(['trimester_4' => 'disabled']);
		return back();
	}

	public function activarConclusiones()
	{
		DB::table('app_administration')->update(['conclusions' => 'enabled']);
		return back();
	}

	public function desactivarConclusiones()
	{
		DB::table('app_administration')->update(['conclusions' => 'disabled']);
		return back();
	}

	public function registrarError()
	{
		$appmodule = new ModuleAppAdministration();
        $error = $appmodule->registrarError();
	}


	public function listarErrores()
    {
        $moduloAdminApp = new ModuleAppAdministration();
	    $errores = $moduloAdminApp->listarErrores();
	    return view('administracionApp.listarErrores', [
	        'errores' => $errores
	    ]);
    }

    public function listarUltimosErrores()
    {
    	$moduloAdminApp = new ModuleAppAdministration();
	    return view('administracionApp.estadoApp', [
	        'errores' => $errores
	    ]);
    }

    public function registrarAccion()
	{
		$appmodule = new ModuleAppAdministration();
        $action = $appmodule->registrarAccion();
	}


	public function listarAcciones()
    {
        $moduloAdminApp = new ModuleAppAdministration();
	    $acciones = $moduloAdminApp->listarAcciones();
	    return view('administracionApp.listarAcciones', [
	        'acciones' => $acciones
	    ]);
    }

    public function listarUltimasAcciones()
    {
    	$moduloAdminApp = new ModuleAppAdministration();
	    return view('administracionApp.estadoApp', [
	        'acciones' => $acciones
	    ]);
    }

    public function estadoApp()
    {
    	$moduloAdminApp = new ModuleAppAdministration();
    	$estados = $moduloAdminApp->estadoApp();

    	$errores = $moduloAdminApp->listarUltimosErrores();

    	$acciones = $moduloAdminApp->listarUltimasAcciones();

    	if (auth()->user()->role == 'Admin') {
    	return view('administracionApp.estadoApp',
    		['estados' => $estados, 'errores' => $errores, 'acciones' => $acciones]);
    	}
        else {
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
    }

    public function vistaDG()
    {
    	$moduloAdminApp = new ModuleAppAdministration();
    	$estados = $moduloAdminApp->estadoApp();

    	$moduloObjetivo = new ModuleGoals();
        $objetivos = $moduloObjetivo->listarObjetivos();

        if (auth()->user()->role == 'Director General') {
        	return view('administracionApp.vistaDG',
    		['estados' => $estados, 'objetivos' => $objetivos]);
        }
        else {
            $moduloAdminApp = new ModuleAppAdministration();
            $action = $moduloAdminApp->registrarAccion('Intento de acceso a recurso no autorizado');
            return back()->with('status-error', 'No tienes acceso a este recurso');
        }
    }

}
