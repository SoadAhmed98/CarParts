<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  public  function RedirectAccordingToRequest($request,$responseStatus)
{
    if($responseStatus == 'success'){
        $value="تمت العملية بنجاح";
    }else{
        $value="فشلت العملية";
    }
    if($request->has('create')){
        // dd(self::class,static::class)
        return redirect()->action([static::class,'index'])->with($responseStatus,$value);       
     }else{
      return redirect()->back()->with($responseStatus,$value);  
     }

    }
}
