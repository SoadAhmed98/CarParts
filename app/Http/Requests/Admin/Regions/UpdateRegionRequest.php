<?php

namespace App\Http\Requests\Admin\Regions;

use App\Http\Controllers\Admin\RegionsController;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRegionRequest extends FormRequest
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
            'name.ar'=>['required','max:32',"unique_translation:regions,name,{$this->region->id},id"],
            'name.en'=>['required','max:32',"unique_translation:regions,name,{$this->region->id},id"],
            'status'=> ['required','in:'.implode(',',RegionsController::AVAILABLE_STATUS)],
            'latitude'=>['required'],
            'longitude'=>['required'],
            'radius'=>['required'],
            'city_id'=>['required','integer','exists:cities,id'],
        ];
    }
}
