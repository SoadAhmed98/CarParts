<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NationalIdRequest extends FormRequest
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
            "N_id"=>["regex:/(?<BirthMillennium>[23])\x20?(?:(?<BirthYear>[0-9]{2})\x20?(?:(?:(?<BirthMonth>0[13578]|1[02])\x20?(?<BirthDay>0[1-9]|[12][0-9]|3[01]))\x20?|(?:(?<BirthMonth>0[469]|11)\x20?(?<BirthDay>0[1-9]|[12][0-9]|30))\x20?|(?:(?<BirthMonth>02)\x20?(?<BirthDay>0[1-9]|1[0-9]|2[0-8]))\x20?)|(?:(?<BirthYear>04|08|[2468][048]|[13579][26]|(?<=3)00)\x20?(?<BirthMonth>02)\x20?(?<BirthDay>29)\x20?))(?<ProvinceCode>0[1-34]|[12][1-9]|3[1-5]|88)\x20?(?<RegistryDigit>[0-9]{3}(?<GenderDigit>[0-9]))\x20?(?<CheckDigit>[0-9])/"],
            // "N_id" => ["regex:/^([2][0-9][1-9]|[3][0-1][1-9]|[3][2][0-2])([0][1-9]|[1][0-2])([0-2][1-9]|[3][0-1])(01|02|03|04|11|12|13|14|15|16|17|18|19|21|22|23|24|25|26|27|28|29|31|32|33|34|35|88)[0-9]{5}$/"]
        ];
        
    }
    // public function messages()
    // {
    //     return [
    //         'N_id.regex' => 'يجب أن يكون الرقم القومى مكون من 14 رقم ولا يحتوى على مسافات ',
    //     ];
    // }
}
