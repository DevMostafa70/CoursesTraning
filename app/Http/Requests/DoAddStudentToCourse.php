<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoAddStudentToCourse extends FormRequest
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

        return [
           'StudentID'=>'required',
           'enrolments_date'=>'required',
        ];
    }

    public function messages()
    {
  return [
           'StudentID.required'=>'حقل الطالب مطلوب',
           'enrolments_date.required'=>'تاريخ التسجيل مطلوب',
        ];

    }
}
