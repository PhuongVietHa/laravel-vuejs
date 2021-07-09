<?php

namespace App\Helper;

use Throwable;
use Illuminate\Support\Facades\Log;

class HelperFunction
{
    public static function logInfo($msg, $line, $func, $file)
    {
        Log::info($msg, ["Line: ".$line, "Function: ".$func, "File: ".$file]);
    }

    public static function logError($msg, $line, $func, $file)
    {
        Log::error($msg, ["Line: ".$line, "Function: ".$func, "File: ".$file]);
    }

    public static function logException(Throwable $th)
    {
        Log::error($th->getMessage(), ["Line: ".$th->getLine(), "Previous: ".$th->getPrevious()]);
    }
}
