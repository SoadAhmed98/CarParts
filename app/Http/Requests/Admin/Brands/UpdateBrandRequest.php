<?php

namespace App\Http\Requests\Admin\Brands;

use App\Http\Controllers\Admin\BrandsController;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->brand->id);  
        // لأن فى ال route parameter أنا مسميه brand مش id وهو بيرجعلى object قباخد منه ال id 
        return [
            // 'name'=> ['required','max:32',"unique:brands,name,{$this->brand->id},id"],
            'name'=> ['array:ar,en'],
            'name.ar'=>['required','max:32',"unique_translation:brands,name,{$this->brand->id},id"],
            'name.en'=>['required','max:32',"unique_translation:brands,name,{$this->brand->id},id"],
            'status'=> ['required','in:'.implode(',',BrandsController::AVAILABLE_STATUS)],
            'width'=>['required_if:resize,exist','nullable','integer','between:50,1080'], //'integer','between:50,1080'
            'height'=>['required_if:resize,exist','nullable','integer','between:50,1080'],
        ];
    }
}
