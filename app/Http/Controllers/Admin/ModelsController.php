<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Models;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Models\StoreModelRequest;
use App\Http\Requests\Admin\Models\UpdateModelRequest;

class ModelsController extends Controller
{
    const AVAILABLE_STATUS =['مفعل'=>1,'غير مفعل'=>0];
    const AVAILABLE_EXTENSIONS = ['png','jpg','jpeg'];
    public function __construct() {
        $this->middleware('permission:Update Models,admin')->only('edit','update');
        $this->middleware('permission:Store Models,admin')->only('create','store');
        $this->middleware('permission:Index Models,admin')->only('index');
        $this->middleware('permission:Destroy Models,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $models=Models::all();
       return view('Admin.models.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        return view('Admin.models.create',['statuses'=>Self::AVAILABLE_STATUS,'brands'=>$brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelRequest $request)
    {
        // dd($request->all());
        $model= Models::create($request->validated());
        $model->addMediaFromRequest('image')->toMediaCollection('models');
    
        if($request->has('resize')){
            Image::make($model->getFirstMediaPath('models'))->resize($request->width,$request->input('height'))->save($model->getFirstMediaPath('models'));
        }
            
            return $this->RedirectAccordingToRequest($request,'success');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Models $model)
    {
        $brands=Brand::all();
        return view('Admin.Models.edit',['model'=>$model,'brands'=>$brands,'statuses'=>Self::AVAILABLE_STATUS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModelRequest $request, Models $model)
    {
        $model->update($request->validated()); 
       
        if($request->hasFile('image')){
            if(isset($model->getMedia('model')[0])){
                $model->getMedia('model')[0]->delete(); //remove old image
            }
           $model->addMediaFromRequest('image')->toMediaCollection('models'); //store new image
          
        }

        if($request->has('resize')){
            $model=Models::find($model->id);
            Image::make($model->getFirstMediaPath('models'))->resize($request->width,$request->input('height'))->save($model->getFirstMediaPath('models'));
        }
        return redirect()->route('models.index')->with('success','تمت العملية بنجاح');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Models $model)
    {
        $model->delete();;
        return redirect()->route('models.index')->with('success','تمت العملية بنجاح');
    }
}
