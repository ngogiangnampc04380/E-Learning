<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $login_rules = [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ];
        switch ($this->path()) {
            case 'login':
                return $login_rules;
            default:
                return array_merge($login_rules, [
                    'name' => ['required', 'min:3', 'max:40', 'regex:/[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/'],
                    'phone' => ['required', 'string', 'alpha_dash:ascii', Rule::unique('users'), 'regex:/^0\d{9}$/'],
                    
                    'email' => [
                        'email',
                        'required',
                        'string',
                        'max:40',
                        Rule::unique('users'),
                    ],
                    'password' => [
                        'regex:/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/\|]/',
                        'required',
                        'string',
                        'min:6',
                    ],
                    'price_sale'=>[
                        'required',
                    ]
                   
                ]);
        }

    }
    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ!',
            'email.unique' => 'Địa chỉ email đã tồn tại!',      
            'email.max' => 'Địa chỉ email không được vượt quá :max ký tự!',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải chứa ít nhất :min ký tự!',
            'password.regex' => 'Mật khẩu phải chứa 1 ký tự đặc biệt!',
            'name.required' => 'Vui lòng nhập tên.',
            'name.regex'=>'Tên không chứa ký tự đặc biệt',
            'name.min' => 'Tên ít nhất phải :min ký tự!',
            'name.max' => 'Tên không được vượt quá :max ký tự!',          
            'phone.unique' => 'Số điện thoại đã tồn tại !',
            'phone.regex' => 'Số điện thoại không đúng định dạng "012****"!',
            // ----------------
            'price_sale.required'=>'không được để trống',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',

        ];
    }
}
