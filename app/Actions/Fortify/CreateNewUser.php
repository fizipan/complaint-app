<?php

namespace App\Actions\Fortify;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'number_id' => ['nullable', 'string', 'min:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'mobile_phone' => [
                'required', 'string', 'max:255',
            ],
            'address' => [
                'required', 'string', 'max:5000',
            ],
            'gender' => [
                'required', 'integer', 'in:1,2',
            ],
            'date_of_birth' => [
                'required', 'date_format:d/m/Y',
            ],
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'user_type_id' => 3,
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // set status
        $status = 1; // active user
        $input['status'] = $status;

        // set mobile phone
        $input['mobile_phone'] = str_replace('+', '', $input['mobile_phone']);
        $input['mobile_phone'] = str_replace(' ', '', $input['mobile_phone']);
        $input['mobile_phone'] = str_replace('_', '', $input['mobile_phone']);

        // date of birth ------------------------------
            $date = $input['date_of_birth'];
            $dj = substr($date, 0, 2);
            $mj = substr($date, 3, 2);
            $yj = substr($date, 6);
            $date = $yj . '-' . $mj . '-' . $dj;
            $input['date_of_birth'] = $date; //change format
        // -----------------------------------------------

        // Detail user
        $user->detail_users()->create([
            'number_id' => $input['number_id'],
            'mobile_phone' => $input['mobile_phone'],
            'address' => $input['address'],
            'gender' => $input['gender'],
            'date_of_birth' => $input['date_of_birth'],
            'status' => $input['status'],
        ]);

        // sync role by users select
        $user->roles()->sync(3);

        return $user;
    }
}
