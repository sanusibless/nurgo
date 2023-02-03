<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();
        if($method == "PUT") {
          return  [
            'firstname' =>  'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => ['required'],
            'photo' => 'required'
        ];
        } else {
            return [
            'firstname' =>  [ 'sometimes','required' ],
            'lastname' =>  [ 'sometimes','required' ],
            'email' =>  [ 'sometimes','required' ],
            'password' =>  [ 'sometimes','required' ],
            'photo' =>  [ 'sometimes','required' ],
        ];
        }
    }
}
