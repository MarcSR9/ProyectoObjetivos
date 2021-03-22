<?php

namespace App\Modules;

use DB;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Goal;
use Illuminate\Support\Str;

class ModuleAppAdministration
{
	public function activarTrimestre1()
	{
		DB::table('trimesters')->update(['trimestre_1' => 'activado']);
	}

	public function desactivarTrimestre1()
	{
		DB::table('trimesters')->update(['trimestre_1' => 'desactivado']);
	}

	public function activarTrimestre2()
	{
		DB::table('trimesters')->update(['trimestre_2' => 'activado']);
	}

	public function desactivarTrimestre2()
	{
		DB::table('trimesters')->update(['trimestre_2' => 'desactivado']);
	}

	public function activarTrimestre3()
	{
		DB::table('trimesters')->update(['trimestre_3' => 'activado']);
	}

	public function desactivarTrimestre3()
	{
		DB::table('trimesters')->update(['trimestre_3' => 'desactivado']);
	}

	public function activarTrimestre4()
	{
		DB::table('trimesters')->update(['trimestre_4' => 'activado']);
	}

	public function desactivarTrimestre4()
	{
		DB::table('trimesters')->update(['trimestre_4' => 'desactivado']);
	}

	public function activarConclusiones()
	{
		DB::table('trimesters')->update(['conclusiones' => 'activado']);
	}

	public function desactivarConclusiones()
	{
		DB::table('trimesters')->update(['conclusiones' => 'desactivado']);
	}

	/*public function listarTrimestres()
    {
        $trimestres = DB::table('trimesters')->get();
        return $trimestres;
    }*/



}