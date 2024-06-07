<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d2ba3c872c.js" crossorigin="anonymous"></script>
    <script type="module" src="../../dist/index.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="tailwind.css">
    <title>TAWFEEX-GP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            height: 100vh;
        }

        .navbar {
            background-color: #2563eb;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #bfdbfe;
        }

        .main-content {
            padding: 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
        }

        .card {
            
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            width: 100%;
            max-width: 300px;
            transition: transform 0.3s;
        }

        .footer {
            background-color: #2563eb;
            color: white;
            padding: 1rem;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0%;
            width: 100%;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .modal {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            animation-name: animatetop;
            animation-duration: 0.4s;
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        .close,
        .btn-primary {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus,
        .btn-primary:hover,
        .btn-primary:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .popup-form input,
        .popup-form select,
        .popup-forme input,
        .popup-forme select {
            background-color: white;
            color: gray;
        }

        .hide-scrollbar {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .popup-form .col-span-2 {
            grid-column: span 2;
        }

        .card:hover {
            transform: translateY(-5px) scale(1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .popup-form button:hover {
            background-color: #0056b3;
        }

        .carousel-slide {
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
            position: absolute;
            width: 40%;
            height: 90%;
        }

        .carousel-slide.inactive {
            transform: translateX(100%) scale(0.8);
            opacity: 0.5;
            z-index: 1;
        }

        .carousel-slide.left {
            transform: translateX(-100%) scale(0.8);
            opacity: 0.5;
            z-index: 1;
        }

        .carousel-slide.active {
            transform: translateX(0) scale(1);
            opacity: 1;
            z-index: 2;
        }

        .carousel-slide.scale-left {
            transform: translateX(-50%) scale(0.8);
            opacity: 0.5;
            z-index: 1;
        }

        .carousel-slide.scale-right {
            transform: translateX(50%) scale(0.8);
            opacity: 0.8;
            z-index: 1;
        }

        .carousele-slid {
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
            position: absolute;
            width: 40%;
            height: 90%;
        }

        .carousele-slid.inactive {
            transform: translateX(100%) scale(0.8);
            opacity: 0.5;
            z-index: 1;
        }

        .carousele-slid.left {
            transform: translateX(-100%) scale(0.8);
            opacity: 0.5;
            z-index: 1;
        }

        .carousele-slid.active {
            transform: translateX(0) scale(1);
            opacity: 1;
            z-index: 2;
        }

        .carousele-slid.scale-left {
            transform: translateX(-50%) scale(0.8);
            opacity: 0.5;
            z-index: 1;
        }

        .carousele-slid.scale-right {
            transform: translateX(50%) scale(0.8);
            opacity: 0.8;
            z-index: 1;
        }

        .card-container {
            max-height: 600px;
            /* Ajustez la hauteur maximale pour le conteneur des cartes */
            overflow-y: auto;
        }
    </style>
</head>


<body class="bg-gray-100">
    <!-- affichage du map -->
    <div id="mapModal" class="fixed bg-gray-600 bg-opacity-5 flex justify-center items-center w-full h-full p-40"
        style="display: none; z-index:9999;">
        <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 h-3/4">
            <h2 class="text-2xl font-bold mb-4">Sélectionner sur la carte</h2>
            <div id="map" class="w-full h-64"></div>
            <div class="flex justify-end space-x-4 mt-4">
                <button type="button" onclick="closeMapModal()"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Fermer</button>
            </div>
        </div>
    </div>
    <div class="navbar">
        <div class="logo">
            <img src="GP_MONDE.webp" alt="logo" class="h-20">
        </div>
        <nav class="flex-1 flex justify-center">
            <a href="?page=accueil"><i class="fa-solid fa-house mr-2"></i>Accueil</a>
            <a href="?page=dashboard"><i class="fa-solid fa-tachometer-alt mr-2"></i>Dashboard</a>
            <a href="?page=cargaisons"><i class="fa-solid fa-ship mr-2"></i>Cargaisons</a>
            <a href="?page=produits"><i class="fa-solid fa-boxes mr-2"></i>Produits</a>
            <a href="?page=clientel"><i class="fa-solid fa-users mr-2"></i>Clientel</a>
            <a href="?page=contact"><i class="fa-solid fa-envelope mr-2"></i>Contact</a>
        </nav>
        <div class="user-info flex items-center">
            <div class="date text-white mr-4">
                <i class="fa-solid fa-calendar-days mr-2"></i>
                <?php echo date('d F Y'); ?>
            </div>
            <img src="#" alt="user-image" class="h-10 w-10 rounded-full object-cover mr-4">
            <div class="text-white">
                <div class="font-semibold">DAME</div>
                <div class="font-semibold">WADE</div>
            </div>
            <form method="post" action="auth.php" class="ml-4">
                <button type="submit" name="deconnexion" class="text-red-600 hover:text-red-400 transition">
                    <i class="fa fa-power-off"></i>
                </button>
            </form>
        </div>
    </div>
    <main class="w-full h-full flex flex-col justify-start items-center gap-4">