<?php

namespace App\Http\Requests\Admin\Models;

use App\Http\Controllers\Admin\ModelsController;
use Illuminate\Foundation\Http\FormRequest;

class StoreModelRequest extends FormRequest
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
        return [
            'name'=> ['array:ar,en'],
            'name.ar'=>['required','max:32','unique_translation:models'],
            'name.en'=>['required','max:32','unique_translation:models'],
            'status'=> ['required','in:'.implode(',',ModelsController::AVAILABLE_STATUS)],
            'image'=>['required','max:1024','mimes:'.implode(',',ModelsController::AVAILABLE_EXTENSIONS)],
            'width'=>['required_if:resize,exist','nullable','integer','between:50,1080'], //'integer','between:50,1080'
            'height'=>['required_if:resize,exist','nullable','integer','between:50,1080'],
            'year'=>['required','integer','between:1970,2022'],
            'brand_id'=>['required','exists:brands,id']
        ];
    }
}
