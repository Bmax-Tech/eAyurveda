<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ExceptionController extends Controller
{
    /*
     * this function will Log Error into a log file
     */
    public function LogError($page_note,$exception){
        /* Error Log File Path */
        $path = base_path().'/storage/logs/project_log.log';

        /* Create Logger */
        $view_log = new Logger('View Logs');
        $view_log->pushHandler(new StreamHandler($path,Logger::INFO));
        $view_log->addInfo($page_note." -> ".$exception);

        /* Move User to Safe Page */
        abort(503);
    }
}
