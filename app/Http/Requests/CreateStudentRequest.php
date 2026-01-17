<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
        // dd($this->all());
        return [
           'name'=>'required',
           'country_id'=>'required',
           'phone'=>'required',
           'nationalID'=>'required',
           'active'=>'required',
        ];
    }

    public function messages()
    {
  return [
           'name.required'=>'حقل الاسم مطلوب',
           'country_id.required'=>'حقل الدولة مطلوب',
           'nationalID.required'=>'حقل الرقم القومي مطلوب',
           'phone.required'=>'حقل الهاتف مطلوب',
           'active.required'=>'حقل التفعيل مطلوب',
        ];

    }
}
