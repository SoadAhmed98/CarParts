<?php

namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Self_;
use App\Http\Requests\Admin\Brands\StoreBrandRequest;
use App\Http\Requests\Admin\Brands\UpdateBrandRequest;

class BrandsController extends Controller 
{
    const AVAILABLE_STATUS =['مفعل'=>1,'غير مفعل'=>0];
    const AVAILABLE_EXTENSIONS = ['png','jpg','jpeg'];
    public function __construct() {
        $this->middleware('permission:Update Brands,admin')->only('edit','update');
        $this->middleware('permission:Store Brands,admin')->only('create','store');
        $this->middleware('permission:Index Brands,admin')->only('index');
        $this->middleware('permission:Destroy Brands,admin')->only('destroy');
    }
    public function index ()
    {
        $brands=Brand::all();
        return view('Admin.Brands.index',compact('brands'));
    }
    public function create ()
    {
       return view('Admin.Brands.create',['statuses'=>Self::AVAILABLE_STATUS]);
    }
    public function store (StoreBrandRequest $request)
    {
        //   dd($request->all());
        //filesystem ->file uploaded you can use it in simple crud
            // $path = $request->file('image')->storeAs('brands', $request->file('image')->hashName());
            // dd(asset(Storage::url($path)));
        // dd('ok');
      $brand= Brand::create($request->validated());
      $brand->addMediaFromRequest('image')->toMediaCollection('brands');
    //    dd($brand->getFirstMediaPath('brands'));
    if($request->has('resize')){
        Image::make($brand->getFirstMediaPath('brands'))->resize($request->width,$request->input('height'))->save($brand->getFirstMediaPath('brands'));
    }
       
       return $this->RedirectAccordingToRequest($request,'success');
    }
    public function edit (Brand $brand)
    {
        return view('Admin.Brands.edit',['brand'=>$brand,'statuses'=>Self::AVAILABLE_STATUS]);
    }
    public function update(UpdateBrandRequest $request,Brand $brand)
    {
        $brand->update($request->validated()); 
       
        if($request->hasFile('image')){
            if(isset($brand->getMedia('brands')[0])){
                $brand->getMedia('brands')[0]->delete(); //remove old image
            }
          
           $brand->addMediaFromRequest('image')->toMediaCollection('brands'); //store new image
          
        }

        if($request->has('resize')){
            $brand=Brand::find($brand->id);
            Image::make($brand->getFirstMediaPath('brands'))->resize($request->width,$request->input('height'))->save($brand->getFirstMediaPath('brands'));
        }
        return redirect()->route('brands.index')->with('success','تمت العملية بنجاح');       

    }
    public function destroy (Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success','تمت العملية بنجاح');
    }
}
