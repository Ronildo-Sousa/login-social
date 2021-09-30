<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Social</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-300">
    <main class="h-screen flex flex-col items-center justify-center">
        <h1 class="text-3xl">Login Social com Laravel Socialite</h1>
        <h2 class="text-lg mb-10">Escolha uma plataforma para continuar</h2>
        <section class="flex">
            <div class="p-2 mr-4 transition duration-500 ease-in-out border-b-2 border-transparent hover:border-gray-500  transform hover:-translate-y-1 hover:scale-110" style="width: 60px">
                <a href="{{ route('auth.login',['provider' => 'github']) }}">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" />
                </a>
            </div>
            <div class="p-2 mr-4 transition duration-500 ease-in-out border-b-2 border-transparent hover:border-gray-500  transform hover:-translate-y-1 hover:scale-110" style="width: 60px">
                <a href="{{ route('auth.login',['provider' => 'google']) }}">
                    <img  src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" />
                </a>
            </div>
            <div class="p-2 mr-4 transition duration-500 ease-in-out border-b-2 border-transparent hover:border-gray-500  transform hover:-translate-y-1 hover:scale-110" style="width: 60px">
                <a href="{{ route('auth.login',['provider' => 'gitlab']) }}">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/gitlab/gitlab-original.svg" />
                </a>
            </div>
        </section>
    </main>
</body>

</html>
