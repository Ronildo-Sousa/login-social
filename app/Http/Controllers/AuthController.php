<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Auth as ServicesAuth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    private $authService;

    public function __construct(ServicesAuth $authService)
    {
        $this->authService = $authService;
    }

    public function welcome()
    {
        if (Auth::user()) {
            return redirect()->route('admin');
        }
        return view('welcome', ['user' => Auth::user()]);
    }

    public function login(string $provider)
    {
        $isValidProvider = $this->authService->validateProvider($provider);
        if ($isValidProvider) {
            return Socialite::driver($provider)->redirect();
        }
        throw new Exception('provider inválido');
    }

    public function handleCallback(string $provider)
    {
        $user = Socialite::driver($provider)->user();

        $newUser = $this->authService->handleUser($user, $provider);

        Auth::login($newUser);
        return redirect()->route('admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
