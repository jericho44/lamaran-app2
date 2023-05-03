<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *     title="Lamaran App",
 *     version="1.0",
 *     description="Aplikasi Lamaran"
 *   )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
