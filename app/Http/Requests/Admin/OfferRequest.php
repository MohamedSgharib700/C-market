<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        $rules = [


                   'discount' => 'required|numeric',

                 ];

        foreach (config()->get("app.locales") as $lang => $language) {
            $rules[$lang.".*"] = "required" ;
        }
        if ($this->isMethod('post')) {
            $rules["image"] = "required";
            $rules["category_id"] = "required";
            $rules["brand_id"] = "required";
        }

        return $rules ;
    }

    public function messages()
    {
        $messages = [];

        $messages["image.required"] = trans('image_required');

        foreach (config()->get("app.locales") as $lang => $language) {
            $messages[$lang.".*.required"] = trans('name_'.$lang.'_required');
        }

        return $messages;
    }
}
