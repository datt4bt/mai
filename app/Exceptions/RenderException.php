<?php

namespace App\Exceptions;

use Exception;

class RenderException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|void
     */
    public function report()
    {
        return false;
    }
    /**
     * Render the exception into an HTTP response.

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response(abort(404));
    }
}
