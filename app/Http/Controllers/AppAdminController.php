<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\ModuleAppAdministration;

class AppAdminController extends Controller
{
    /*$moduloAdminApp = new ModuleAppAdministration();
    $trimestres = $moduloAdminApp->listarTrimestres();
    return view('administracionApp', [
        'trimestres' => $trimestres
    ]);*/

    public function activarTrimestre1()
	{
		DB::table('trimesters')->update(['trimestre_1' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre1()
	{
		DB::table('trimesters')->update(['trimestre_1' => 'disabled']);
		return view('administracionApp');
	}

	public function activarTrimestre2()
	{
		DB::table('trimesters')->update(['trimestre_2' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre2()
	{
		DB::table('trimesters')->update(['trimestre_2' => 'disabled']);
		return view('administracionApp');
	}

	public function activarTrimestre3()
	{
		DB::table('trimesters')->update(['trimestre_3' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre3()
	{
		DB::table('trimesters')->update(['trimestre_3' => 'disabled']);
		return view('administracionApp');
	}

	public function activarTrimestre4()
	{
		DB::table('trimesters')->update(['trimestre_4' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre4()
	{
		DB::table('trimesters')->update(['trimestre_4' => 'disabled']);
		return view('administracionApp');
	}

	public function activarConclusiones()
	{
		DB::table('trimesters')->update(['conclusiones' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarConclusiones()
	{
		DB::table('trimesters')->update(['conclusiones' => 'disabled']);
		return view('administracionApp');
	}

	public function registrarError()
	{
		$appmodule = new ModuleAppAdministration();
        $error = $appmodule->listarUsuarios();
	}


	public function listarErrores()
    {
        $errores = Errors::get();
        return $errores;
    }

    public function listarUltimosErrores()
    {
        $errores = Errors::latest()->take(10)->get();
        return $errores;
    }

}
