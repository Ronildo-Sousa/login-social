<?php

namespace App\Services;

use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class Auth
{
    public function validateProvider(string $provider): bool
    {
        $availableProviders = ['github', 'google', 'gitlab'];
        if (in_array($provider, $availableProviders)) {
            return true;
        }
        return false;
    }

    public function handleUser(SocialiteUser $user, string $provider): User
    {
        $newUser = User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'name' => $user->getName(),
                'avatar' => $user->getAvatar(),
                'provider_id' => $user->getId(),
                'provider' => $provider
            ]
        );
        return $newUser;
    }
}
