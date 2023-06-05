<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        '/store_data_kuat_arus',
        '/store_data_tegangan',
        '/store_data_kecepatan_motor',
        '/store_data_viskositas',
    ];
}
