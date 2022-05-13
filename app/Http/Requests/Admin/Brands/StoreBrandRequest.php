<?php

namespace App\Http\Requests\Admin\Brands;

use App\Http\Controllers\Admin\BrandsController;
use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
        // var_dump($this->width);
        return [
            'name'=> ['array:ar,en'],
            'name.ar'=>['required','max:32','unique_translation:brands'],
            'name.en'=>['required','max:32','unique_translation:brands'],
            'status'=> ['required','in:'.implode(',',BrandsController::AVAILABLE_STATUS)],
            'image'=>['required','max:1024','mimes:'.implode(',',BrandsController::AVAILABLE_EXTENSIONS)],
            'width'=>['required_if:resize,exist','nullable','integer','between:50,1080'], //'integer','between:50,1080'
            'height'=>['required_if:resize,exist','nullable','integer','between:50,1080'],
        ];
    }
}
