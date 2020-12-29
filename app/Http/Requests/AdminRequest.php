<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'required', 'min:3'
            ],
            'last_name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new Admin)->getTable())->ignore($this->route()->admin->id ?? null)
            ],
            'password' => [
                $this->route()->admin ? 'nullable' : 'required', 'confirmed', 'min:8'
            ],
            'roles' => [
                'required'
            ]
        ];
    }
}
