<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException ;

class BaseRequest extends FormRequest
{
  
    protected function failedValidation(Validator $validator)
    { 

        $errors = $validator->errors()->messages(); 
        $return = []; 
        $n = 0 ; 
        foreach($errors as $key => $value) {
            if(count($errors[$key]) == 1) {
                $return[$key] = $errors[$key][0];
            } else {
                foreach($errors[$key] as $error){
                    $return[$key][$key."".(++$n)] = $errors[$key] ;
                }

                $return[$key] = $errors[$key][0];
            }
        }
        
        throw new HttpResponseException(
            response()->fail( 'يوجد خطأ ما' , $return , 422 )
        ); 
    }

    public function sometimeIfPut($rules)
    {
        if($this->isMethod('put')) {

            return str_replace("size" , "max" , "sometimes|".$rules ) ;
        }
        
        return $rules ;
    }
   
}
