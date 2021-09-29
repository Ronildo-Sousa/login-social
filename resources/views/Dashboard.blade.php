<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-gray-300">
    <main class="flex flex-col items-center mt-16">
        <div class="border-4 border-gray-400 rounded-full" style="width: 260px">
            <img class="w-full rounded-full"  src="{{$user->avatar }}" alt="avatar">
        </div>
        <div class="p-2 flex flex-col items-center">
            <h1 class="text-3xl font-medium mb-3">Olá, {{ $user->name }}</h1>
            <p class="text-lg mb-4">Esta é a dashboard da sua conta, por enquanto a única funcionalidade é sair dela! 😁</p>
            <a href="{{ route('auth.logout') }}" class="p-2 bg-purple-600 hover:bg-purple-700 text-white rounded">Sair agora</a>
        </div>
    </main>
</body>
</html>
