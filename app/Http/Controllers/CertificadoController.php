<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificados = Certificado::orderBy('secuencia', 'ASC')->get();
        return view('certificado.index', compact('certificados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificado.create');
    }

    public function models(){
        $das = Das::where('entidad', 47)->where('da', 1)->first();
        $cert = Certificado::orderby('cod', 'DESC')->first();
        $count = $cert->cod;
        return [$das, $count];
    }

    public function findue($ue){
        $das = Das::where('da', 1)->where('ue', $ue)->orderBy('gestion', 'ASC')->first();
        if ($das) {
            $result = $das;
            return $result;
        }
        else{
            return '';
        }
    }

    public function findgast($gast){
        $gast = ClasGast::where('class_gast', $gast)->first();
        if ($gast) {
            $result = $gast->descrip;
            return $result;
        }
        else{
            return '';
        }
    }

    public function findnombre($da, $ue, $prog, $act, $proy){
        $cat = CatProg::where('da', $da)->where('ue', $ue)->where('prog', $prog)->where('act', $act)->where('proy', $proy)->orderBy('gestion', 'DESC')->first();
        if ($cat) {
            $result = $cat->nombre;
            return $result;
        }
        else{
            return '';
        }
    }

    public function getcertifi($year){
        $result = Certificado::where('gest', $year)->orderBy('cod', 'DESC')->get();
        return $result;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificado $certificado)
    {
        //
    }
}
