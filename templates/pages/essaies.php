<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d2ba3c872c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="tailwind.css">
    <link rel="icon" href="path/to/your/favicon.ico" type="image/x-icon">
    <title>GP MONDE</title>
    <style>
        .hide-scrollbar {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <div class="bg-gray-200 w-full h-screen flex gap-4">
        <div class="bg-gray-200 w-full h-screen flex gap-4">
            <div id="sidebar" class="bg-white w-80 h-full flex flex-col items-center gap-4">
                <img id="logo" src="logo_gpMonde.jpeg" alt="logo" class="h-40 w-full mb-2">
                <div id="dashboard-button-container" class="w-4/5 h-10">
                    <button id="dashboard-button"
                        class="w-full h-full border border-solid border-black rounded hover:bg-purple-700">
                        <a href="?page=dashboard"
                            class="hover:text-white flex items-center justify-center w-full h-full text-xl text-purple-700">
                            Dashboard</a>
                    </button>
                </div>
                <div id="cargaisons-button-container" class="w-4/5 h-10">
                    <button id="cargaisons-button"
                        class="w-full h-full border border-solid border-black rounded hover:bg-purple-700">
                        <a href="?page=cargaisons"
                            class="hover:text-white flex items-center justify-center w-full h-full text-xl text-purple-700">
                            Cargaisons</a>
                    </button>
                </div>
                <div id="produits-colis-button-container" class="w-4/5 h-10">
                    <button id="produits-colis-button"
                        class="w-full h-full border border-solid border-black rounded hover:bg-purple-700">
                        <a href="?page=produits"
                            class="hover:text-white flex items-center justify-center w-full h-full text-xl text-purple-700">
                            Produits/colis</a>
                    </button>
                </div>
            </div>
            <div class="flex-1 mr-4 relative overflow-auto hide-scrollbar">
                <header class="w-full h-24 flex justify-between bg-white rounded-b-2xl">
                    <div class="w-1/4 h-full flex items-center">
                        <div class="w-12 h-12 ml-4 rounded-full flex justify-center items-center">
                            <i class="fa fa-bars text-purple-700 font-bold text-4xl" aria-hidden="true"></i>
                        </div>
                        <div class="w-12 h-12 ml-4 bg-gray-200 rounded-full flex justify-center items-center">
                            <i class="fa fa-sun font-bold text-3xl"></i>
                        </div>
                    </div>
                    <div class="w-1/5 h-full flex items-center justify-center">
                        <input type="date"
                            class="w-72 h-3/5 rounded-xl border border-solid border-black bg-purple-600 text-white text-2xl"
                            value="2024-05-18">
                    </div>
                </header>
                <main>
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 'menu';
                    $pagePath = __DIR__ . "/pages/$page.html.php";
                    
                    if (file_exists($pagePath)) {
                        include $pagePath;
                    } else {
                        include '/var/www/html/projet/projetScript/public/page404.html.php';
                    }
                    ?>
                </main>
                <footer class="w-full h-24 bg-white rounded-t-2xl flex justify-center items-center">
                    <h2 class="text-purple-800 text-3xl">®GP MONDE</h2>
                </footer>
            </div>
        </div>
        <script>
            document.getElementById('type-produit').addEventListener('change', function () {
                const toxiciteField = document.getElementById('form-toxicity-container');
                if (this.value === 'chimique') {
                    toxiciteField.style.display = 'block';
                } else {
                    toxiciteField.style.display = 'none';
                }
            });
        </script>
</body>

</html>
