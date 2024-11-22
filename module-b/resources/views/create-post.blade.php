<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body class="flex justify-center">
    <main class="flex justify-center">
        <div class="flex flex-col max-w-md">
            <h1 class="text-3xl">Create Post</h1>
            <!-- Post creation form -->
            <form class="flex flex-col" action="{{ route('store-post') }}" method="POST">
                @csrf
                <label for="title">Title:</label>
                <input class="border border-black rounded-md" type="text" name="title" id="title" required>
                <label for="content">Content:</label>
                <textarea class="border border-black rounded-md" name="content" id="content" required></textarea>
                <button type="submit" class="bg-blue-500 rounded-lg p-2 mt-4">Create Post</button>
            </form>
        </div>
    </main>
</body>

</html>
