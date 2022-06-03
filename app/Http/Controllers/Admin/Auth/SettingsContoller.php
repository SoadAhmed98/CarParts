<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsContoller extends Controller
{
    const TIME = 31536000;
  public function theme(Request $request,$mode)
  {
    // dd($mode);
     return redirect()->back()->withCookie(cookie(Auth::guard('admin')->id(),$mode,time()+ Self::TIME,'/'));
  }

}
