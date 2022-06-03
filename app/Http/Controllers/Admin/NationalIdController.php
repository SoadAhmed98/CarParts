<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NationalIdRequest;
use App\Models\City;
use Illuminate\Http\Request;

class NationalIdController extends Controller
{   public $NationalIdData=[];
    public function index()
    {
        return view('Admin.national_id');
    }
    public function check(NationalIdRequest $request)
    {
       $this->NationalIdData['National_id']=$request->N_id; 
       $this->BirthYear($request);
       $this->ProvinceCode($request);
       return view('Admin.national_id_data',['NationalId'=>$this->NationalIdData]);
    }
    public function BirthYear(NationalIdRequest $request)
    {
        $this->NationalIdData['BirthMillennium']=substr($request->N_id,0,1);
       if($this->NationalIdData['BirthMillennium']=="2"){
        $this->NationalIdData['BirthYear']="19".substr($request->N_id,1,2);
       }
       if($this->NationalIdData['BirthMillennium']=="3"){
        $this->NationalIdData['BirthYear']="20".substr($request->N_id,1,2);
       }
       
    }
    public function ProvinceCode(NationalIdRequest $request)
    {
        $citycode=$this->NationalIdData['ProvinceCode']=substr($request->N_id,7,2);
        $city=City::where('code',$citycode)->first();
        $this->NationalIdData['City']="[".$city->getTranslation('name','ar')." , ".$city->getTranslation('name','en')."]";
    }
}
