<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BETA testing</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body>
    <main class="flex justify-center">
        <div class="flex flex-col max-w-md">
            <h1 class="text-3xl" id="current-date"></h1>
            <h2 class="text-xl">Our anticipated game will be released in</h2>
            <button class="bg-blue-500 rounded-lg p-2 mt-4 justify-center" onclick="window.location.href='{{ route('user-panel') }}'">BETA
                testing</button>
            <div class="mt-4">
                <p class="text-xl">News:</p>
                <!-- Display posts -->
                @foreach ($posts as $post)
                    <div key="{{ $post->id }}" class="border rounded-lg mt-2 p-4 border-black" class="post">
                        <h3 class="text-xl">{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</body>

<script>
    // Function to format the current date
    function formatDate(date) {
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        return date.toLocaleDateString('en-US', options);
    }

    const currentDate = new Date();
    document.getElementById('current-date').innerHTML = `It's ${formatDate(currentDate)}`;

    // Calculate the release date
    const releaseDate = new Date(currentDate.getTime() + 26 * 24 * 60 * 60 * 1000 + 8 * 60 * 60 * 1000 + 4 * 60 * 1000 +
        17 * 1000);

    // Function to update the countdown timer
    function updateCountdown() {
        const now = new Date();
        const timeDifference = releaseDate - now;

        const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        document.querySelector('h2').innerText =
            `Our anticipated game will be released in ${days} days, ${hours} hours, ${minutes} minutes and ${seconds} seconds`;
    }

    // Update the countdown timer every second
    setInterval(updateCountdown, 1000);
    updateCountdown();
</script>

</html>
