<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class ApiController extends Controller {

    public function __construct() 
    {
        //
    }

    /**
     * @return Liste de 5 mots contenant le charactère envoyé en parametre
     */
    public function findWord(Request $request) {

        $validator = Validator::make($request->all(), [
            'mot' => 'required'
        ]);

        if($validator->fails()){
            return redirect(route('index'))->withErrors($validator->errors());
        }

        $mot = $request->input('mot');

        $words = DB::table('words')->select('libelle')
            ->where('libelle', 'like', '%'.$mot.'%')
            ->limit(5)
            ->get();

        return response($words, 200)
            ->header('Content-Type', 'application/json');
    }


}