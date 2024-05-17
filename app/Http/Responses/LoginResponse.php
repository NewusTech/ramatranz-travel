<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract

{

    /**

     * @param  $request

     * @return mixed

     */

    public function toResponse($request)

    {

        // dd(auth()->user());
        $home = in_array('Cashier',auth()->user()->roles->pluck('name')->toArray()) ? 'pos' : 'dashboard';
        // $home = auth()->user()->is_admin ? '/admin' : '/dashboard';

        return redirect()->intended($home);

    }

}
