<?php

namespace App\Http\Requests\TwoFactor;

use App\Models\User;
use App\TwoFactor\TwoFactor;
use App\Rules\ValidTwoFactorToken;
use Illuminate\Foundation\Http\FormRequest;

class TwoFactorVerifyRequest extends FormRequest
{
    protected $twoFactor;

    /**
     * Create a new request instance.
     *
     * @return void
     */
    public function __construct(TwoFactor $twoFactor)
    {
        $this->twoFactor = $twoFactor;
    }

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
        if (session()->has('twofactor')) {
            $this->setUserResolver($this->userResolver());
        }

        return [
            'token' => [
                'required',
                new ValidTwoFactorToken($this->user(), $this->twoFactor)
            ],
        ];
    }

    /**
     * Get the user from the session.
     *
     * @return array
     */
    protected function userResolver()
    {
        return function () {
            return User::find(session('twofactor')->user_id);
        };
    }
}
