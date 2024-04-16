<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-container min-h-screen flex flex-col">
        <div class="header bg-gray-700 text-white">
            <ul class="flex justify-center items-center gap-10 p-7">
                <li><a href="./" class="hover:text-gray-300">Home</a></li>
                <li><a href="#" class="hover:text-gray-300  underline">Gallery</a></li>
                <li><a href="#" class="hover:text-gray-300">Blog</a></li>
                <li><a href="#" class="hover:text-gray-300">Contact</a></li>
                <li><a href="#" class="hover:text-gray-300">About</a></li>
            </ul>
        </div>
        <div class="body-section flex-grow flex justify-center items-center">
            <div class="flex flex-wrap justify-center">
                <div class="m-4">
                    <img src="{{ asset('images/greentea.jpg') }}" alt="Example Image">
                </div>
                <div class="m-4">
                    <img src="{{ asset('images/greentea.jpg') }}" alt="Example Image">
                </div>
                <div class="m-4">
                    <img src="{{ asset('images/greentea.jpg') }}" alt="Example Image">
                </div>
                <div class="m-4">
                    <img src="{{ asset('images/greentea.jpg') }}" alt="Example Image">
                </div>
                <div class="m-4">
                    <img src="{{ asset('images/greentea.jpg') }}" alt="Example Image">
                </div>
                <div class="m-4">
                    <img src="{{ asset('images/greentea.jpg') }}" alt="Example Image">
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
