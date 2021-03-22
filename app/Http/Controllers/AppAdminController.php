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
		DB::table('trimesters')->update(['trimestre_1' => 'activado']);
		return view('administracionApp');
	}

	public function desactivarTrimestre1()
	{
		DB::table('trimesters')->update(['trimestre_1' => 'desactivado']);
		return view('administracionApp');
	}

	public function activarTrimestre2()
	{
		DB::table('trimesters')->update(['trimestre_2' => 'activado']);
		return view('administracionApp');
	}

	public function desactivarTrimestre2()
	{
		DB::table('trimesters')->update(['trimestre_2' => 'desactivado']);
		return view('administracionApp');
	}

	public function activarTrimestre3()
	{
		DB::table('trimesters')->update(['trimestre_3' => 'activado']);
		return view('administracionApp');
	}

	public function desactivarTrimestre3()
	{
		DB::table('trimesters')->update(['trimestre_3' => 'desactivado']);
		return view('administracionApp');
	}

	public function activarTrimestre4()
	{
		DB::table('trimesters')->update(['trimestre_4' => 'activado']);
		return view('administracionApp');
	}

	public function desactivarTrimestre4()
	{
		DB::table('trimesters')->update(['trimestre_4' => 'desactivado']);
		return view('administracionApp');
	}

	public function activarConclusiones()
	{
		DB::table('trimesters')->update(['conclusiones' => 'activado']);
		return view('administracionApp');
	}

	public function desactivarConclusiones()
	{
		DB::table('trimesters')->update(['conclusiones' => 'desactivado']);
		return view('administracionApp');
	}


}
