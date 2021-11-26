<?php

namespace App\Http\Requests;

use App\Http\AuthTraits\OwnsRecord;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use OwnsRecord;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {


        if ( ! $this->allowUserUpdate($this->user)){

            return false;

        }

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
            'name' => 'required|string|max:20|unique:users,name,' . $this->user,
            'email' => 'required|email|unique:users,email,'. $this->user,
            'is_subscribed' => 'boolean',
            'is_admin' => 'boolean',
            'status_id' => 'in:7,10',
        ];
    }
}
