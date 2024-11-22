<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User pannel</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body>
    <main>
        You are logged in as {{ auth()->user()->username }}, Phase: {{ auth()->user()->phase ?? 'None' }}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 rounded-lg p-2 mt-4">Log Out</button>
        </form>
        @if (auth()->user()->username == 'admin')
            <a href="{{ route('create-post') }}" class="bg-green-500 rounded-lg p-2 mt-4">Create post</a>

        @endif
        <br>
        <form action="{{ route('update-phase') }}" method="POST">
            @csrf
            <label for="phase">Select Phase:</label>
            <select name="phase" id="phase">
                <option value="gold" {{ auth()->user()->phase == 'gold' ? 'selected' : '' }}>Gold</option>
                <option value="silver" {{ auth()->user()->phase == 'silver' ? 'selected' : '' }}>Silver</option>
                <option value="bronze" {{ auth()->user()->phase == 'bronze' ? 'selected' : '' }}>Bronze</option>
            </select>
            <button type="submit" class="bg-blue-500 rounded-lg p-2 mt-4">Update Phase</button>
        </form>
    </main>
</body>
