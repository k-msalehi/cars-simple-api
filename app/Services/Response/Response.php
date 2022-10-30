<?php
namespace App\Services\Response;

interface Response
{  
      public function __construct();
      public function success($result, $message = 'success');
      public function error($error, $errorMessages = [], $code = 400);
}