<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 * title="API DE GESTION DES PRODUITS",
 * version="1.0.0",
 * description="Api de gestion des produits"
 * ),
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
