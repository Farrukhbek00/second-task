<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function usersByCountry(UserRequest $request) {
        $users = User::with('companies')
            ->select('users.*')
            ->join('user_company', 'users.id', 'user_company.user_id')
            ->join('companies', 'user_company.company_id', 'companies.id')
            ->where('companies.country_id', $request->country_id)->get();

        return UserResource::collection($users);
    }
}
