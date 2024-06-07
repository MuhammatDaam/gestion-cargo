<nav class="bg-blue-500 p-4 shadow-md w-full">

</nav>

    <style>
        .hidden {
            display: none;
        }

        .fixed {
            position: fixed;
        }

        .inset-0 {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .bg-gray-600 {
            background-color: #4a5568;
        }

        .bg-opacity-50 {
            opacity: 0.5;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .p-5 {
            padding: 1.25rem;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .w-3/4 {
            width: 75%;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-3xl {
            font-size: 1.875rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .text-red-500 {
            color: #f56565;
        }

        .min-w-full {
            min-width: 100%;
        }

        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .mb-5 {
            margin-bottom: 1.25rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .border-b {
            border-bottom: 1px solid #e2e8f0;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .bg-fun {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        }

        .shadow-fun {
            box-shadow: 0 10px 20px rgba(252, 186, 3, 0.5);
        }

        .btn-close {
            transition: transform 0.3s ease;
        }

        .btn-close:hover {
            transform: rotate(90deg);
        }

        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #cargoModal {
            animation: slide-in 0.5s ease-out;
        }
    </style>

    <div id="cargoModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 items-center justify-center">
        <div class="bg-white p-5 rounded-lg shadow-lg w-3/4 bg-fun shadow-fun">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold">Détails des Cargaisons</h1>
                <button id="closeModal" class="text-red-500 font-bold btn-close">&times;</button>
            </div>

            <table class="min-w-full bg-white shadow-md rounded mb-4">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Code</th>
                        <th class="py-2 px-4 border-b">Lieu de Départ</th>
                        <th class="py-2 px-4 border-b">Lieu d'Arrivée</th>
                        <th class="py-2 px-4 border-b">Date de Départ</th>
                        <th class="py-2 px-4 border-b">Date d'Arrivée</th>
                        <th class="py-2 px-4 border-b">Distance</th>
                        <th class="py-2 px-4 border-b">Type</th>
                        <th class="py-2 px-4 border-b">Statut</th>
                        <th class="py-2 px-4 border-b">État</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodydetailscargo"></tbody>
            </table>

            <h2 class="text-2xl font-bold mb-5">Détails des Produits</h2>

            <table class="min-w-full bg-white shadow-md rounded">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nom du Produit</th>
                        <th class="py-2 px-4 border-b">Type</th>
                        <th class="py-2 px-4 border-b">Poids</th>
                        <th class="py-2 px-4 border-b">Nom du Client</th>
                        <th class="py-2 px-4 border-b">Prénom du Client</th>
                        <th class="py-2 px-4 border-b">Numéro du Client</th>
                        <th class="py-2 px-4 border-b">Adresse du Client</th>
                        <th class="py-2 px-4 border-b">Nom du Destinataire</th>
                        <th class="py-2 px-4 border-b">Prénom du Destinataire</th>
                        <th class="py-2 px-4 border-b">Numéro du Destinataire</th>
                        <th class="py-2 px-4 border-b">Adresse du Destinataire</th>
                    </tr>
                </thead>
                <tbody id="bodydetailsproduits"></tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('cargoModal').classList.add('hidden');
        });
    </script>
</body>
</html>



<!-- <div class="container mx-auto w-full">
    <h1 class="text-3xl font-bold mb-5">Détails des Cargaisons</h1>

    <table class="min-w-full bg-white shadow-md rounded mb-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Code</th>
                <th class="py-2 px-4 border-b">Lieu de Départ</th>
                <th class="py-2 px-4 border-b">Lieu d'Arrivée</th>
                <th class="py-2 px-4 border-b">Date de Départ</th>
                <th class="py-2 px-4 border-b">Date d'Arrivée</th>
                <th class="py-2 px-4 border-b">Distance</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Statut</th>
                <th class="py-2 px-4 border-b">État</th>
                <th class="py-2 px-4 border-b">Poids</th>
                <th class="py-2 px-4 border-b">Prix</th>
            </tr>
        </thead>
        <tbody id="bodydetailscargo">

        </tbody>
    </table>

    <h2 class="text-2xl font-bold mb-5">Détails des Produits</h2>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Code du Produit</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Poids</th>
                <th class="py-2 px-4 border-b">Nom du Client</th>
                <th class="py-2 px-4 border-b">Prénom du Client</th>
                <th class="py-2 px-4 border-b">Numéro du Client</th>
                <th class="py-2 px-4 border-b">Adresse du Client</th>
                <th class="py-2 px-4 border-b">Nom du Destinataire</th>
                <th class="py-2 px-4 border-b">Prénom du Destinataire</th>
                <th class="py-2 px-4 border-b">Numéro du Destinataire</th>
                <th class="py-2 px-4 border-b">Adresse du Destinataire</th>
            </tr>
        </thead>
        <tbody id="bodydetailsproduits"></tbody>
    </table>
</div> -->