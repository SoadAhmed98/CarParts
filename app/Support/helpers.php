<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

 function RedirectAccordingToRequest($request,$responseStatus)
   {
    if($responseStatus == 'success'){
        $value="تمت العملية بنجاح";
    }else{
        $value="فشلت العملية";
    }
    if($request->has('create')){

        $routeName = Str::replace('store','index',$request->route()->getName());
        // dd($request->route()->getName())
        return redirect()->route($routeName)->with($responseStatus,$value);       
     }else{
      return redirect()->back()->with($responseStatus,$value);  
     }
     }
     function can(string $permissions , ?string $guard=Null) :bool
     {
        return Auth()->guard($guard)->user()->can($permissions);
     }
