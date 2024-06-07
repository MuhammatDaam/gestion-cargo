<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="page404.css">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: 'Arvo', serif;
        }

        .four_zero_four_bg {
            background-image: url('https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif');
            background-size: cover;
            background-position: center;
            height: 70vh;
        }
    </style>
</head>
<body class="bg-gray-100  flex items-center justify-center h-screen">
    <section class="page_404 w-full h-full mx-auto p-3 bg-white rounded-lg shadow-lg text-center">
        <h1 class="text-8xl font-bold text-purple-800">404</h1>
        <div class="four_zero_four_bg flex items-center justify-center">
        </div>  
        <div class="contant_box_404 mt-4">
            <h3 class="text-2xl font-semibold text-gray-800">On dirait que tu es perdu</h3>
            <p class="text-gray-600 font-bold">La page recherchée n'existe pas, veillez cliquez sur le button d'en bas pour retourner a la page d'acceuil</p>
            <a href="?page=accueil"
                class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white text-lg font-medium rounded-full hover:bg-blue-700 transition">Go to Home</a>
        </div>
    </section>
</body>

</html>
