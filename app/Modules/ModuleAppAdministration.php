<?php

namespace App\Modules;

use DB;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Errors;
use Illuminate\Support\Str;

class ModuleAppAdministration
{
	public function activarTrimestre1()
	{
		DB::table('app_administration')->update(['trimester_1' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre1()
	{
		DB::table('app_administration')->update(['trimester_1' => 'disabled']);
		return view('administracionApp');
	}

	public function activarTrimestre2()
	{
		DB::table('app_administration')->update(['trimester_2' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre2()
	{
		DB::table('app_administration')->update(['trimester_2' => 'disabled']);
		return view('administracionApp');
	}

	public function activarTrimestre3()
	{
		DB::table('app_administration')->update(['trimester_3' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre3()
	{
		DB::table('app_administration')->update(['trimester_3' => 'disabled']);
		return view('administracionApp');
	}

	public function activarTrimestre4()
	{
		DB::table('app_administration')->update(['trimester_4' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarTrimestre4()
	{
		DB::table('app_administration')->update(['trimester_4' => 'disabled']);
		return view('administracionApp');
	}

	public function activarConclusiones()
	{
		DB::table('app_administration')->update(['conclusions' => 'enabled']);
		return view('administracionApp');
	}

	public function desactivarConclusiones()
	{
		DB::table('app_administration')->update(['conclusions' => 'disabled']);
		return view('administracionApp');
	}

	public function registrarError($error)
	{
		return Errors::create([
			'error' => $error,
			'user_id' => auth()->user()->id,
		]);
	}

	public function listarErrores()
    {
        $errores = Errors::join('users', 'errors.user_id', '=', 'users.id')
        ->select('errors.error', 'errors.created_at', 'users.email')
        ->get();
        return $errores;
    }

	public function listarUltimosErrores()
    {
        $errores = Errors::join('users', 'errors.user_id', '=', 'users.id')
        ->select('errors.error', 'errors.created_at', 'users.email')
        ->latest()->take(10)->get();
        return $errores;
    }




}