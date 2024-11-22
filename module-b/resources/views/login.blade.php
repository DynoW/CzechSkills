<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body class="flex justify-center">
    <!-- Login form -->
    <form action="/login" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input class="border border-black rounded-md" type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input class="border border-black rounded-md" type="password" id="password" name="password" required>
        <br>
        <button class="p-2 bg-slate-500 rounded-xl" type="submit">Login</button>
    </form>
</body>

</html>
