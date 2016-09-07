<?php
/**
 * Created by PhpStorm.
 * User: SEYDOU BERTHE
 * Date: 02/08/2016
 * Time: 11:34
 */

namespace App\Http\Controllers;

use App\Http\Controllers\SBAuth\SBAuthController;

use Illuminate\Http\Request;

class InscriptionController extends SBAuthController
{
    public function gestionnaireSoumission(Request $request){
        return parent::register($request, '/users', '');
    }
}