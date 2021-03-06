<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $rules = [ ];
        
        if($this->method() == "POST") {
        $rules['image'] = "required|image" ;    
        }

        foreach (config()->get("app.locales") as $lang => $language) {
            $rules[$lang.".*"] = "required" ;
        }

        return $rules ;
    }

    public function messages()
    {
        $messages = [];

        foreach (config()->get("app.locales") as $lang => $language) {
            $messages[$lang.".*.required"] = trans('setting_'.$lang.'_required');
        }

        return $messages;
    }
}
