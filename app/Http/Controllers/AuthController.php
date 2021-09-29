<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(string $provider)
    {
        $isValidProvider = $this->validateProvider($provider);
        if ($isValidProvider) {
            return Socialite::driver($provider)->redirect();
        }
        throw new Exception('provider inválido');
    }

    public function handleCallback(string $provider)
    {
        $user = Socialite::driver($provider)->user();
        try {
            $newUser = User::firstOrCreate(
                ['email' => $user->getEmail()],
                [
                    'name' => $user->getName(),
                    'provider_id' => $user->getId(),
                    'provider' => $provider
                ]
            );

            Auth::login($newUser);
            return redirect()->route('admin');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    private function validateProvider(string $provider): bool
    {
        $availableProviders = ['github', 'google'];
        if (in_array($provider, $availableProviders)) {
            return true;
        }
        return false;
    }
}
