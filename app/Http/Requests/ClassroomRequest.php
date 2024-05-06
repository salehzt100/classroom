<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ClassroomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        // when use custom validation , can use closer function : function($attribute,$value,$fail)
        return [
            'name'=>['required','string','max:255',function($attribute,$value,$fail){
            if ($value === 'admin'){
                return $fail("This :attribute value is forbidden!");
            }
            }],
            'section'=>'nullable|string|max:255',
            'subject'=>'nullable|string|max:255',
            'room'=>'nullable|string|max:255',
            'cover_image'=>[
                'nullable',
               /* File::image()
                      ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxHeight(1000)->maxHeight(500))
         */   ]
        ];
    }

    public function messages() :array
    {
        return [
            'name.required'=>'this field must hase required value ',
        ];
    }
}
