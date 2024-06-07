<nav class="bg-blue-500 p-4 shadow-md w-full">
    <div class="container mx-auto flex justify-between items-center">
        <div id="filters" class="flex space-x-2">
            <input type="text" id="numeroFilter" placeholder="Filtrer par numéro" class="p-2 rounded border border-gray-300">
            <select id="typeFilter" class="p-2 rounded border border-gray-300">
                <option value="">Types</option>
                <option value="aérienne">Aérien</option>
                <option value="routière">Routier</option>
                <option value="maritime">Maritime</option>
            </select>
            <select id="etatFilter" class="p-2 rounded border border-gray-300">
                <option value="">Etats</option>
                <option value="ouvert">Ouvert</option>
                <option value="fermé">Fermé</option>
            </select>
            <input type="text" id="destinationFilter" placeholder="Filtrer par destination" class="p-2 rounded border border-gray-300">
            <input type="text" id="departFilter" placeholder="Filtrer par lieu de départ" class="p-2 rounded border border-gray-300">
            <input type="date" id="dateDepartFilter" class="p-2 rounded border border-gray-300">
            <input type="date" id="dateArriveeFilter" class="p-2 rounded border border-gray-300">
        </div>

        <div class="flex items-center gap-4">
            <button id="search-button" class="h-6 cursor-pointer hover:scale-125 transition-transform duration-200 ease-out">
                <i class="fa-regular fa-square-plus fa-lg"></i>
            </button>
            <button class="h-6 cursor-pointer hover:scale-125 transition-transform duration-200 ease-out">
                <i class="fa-solid fa-gear fa-lg" style="color: #ff0000;"></i>
            </button>
            <button id="toggleViewBtn" class="h-6 cursor-pointer hover:scale-125 transition-transform duration-200 ease-out">
                <i id="toggleViewIcon" class="fa-solid fa-list fa-lg"></i>
            </button>
        </div>
    </div>
</nav>
<?php
$json_data = file_get_contents('../public/cargaisons.json');

$data = json_decode($json_data, true);
$idcargo = isset($_GET['idcargo']) ? $_GET['idcargo'] : '';
?>
<div style="width: 95%; height: 100% mt-5">
    <div class="bg-blue-300 rounded-t-2xl p-4">
        <h2 class="text-2xl font-bold text-blue-700">NOUVELLES CARGAISONS</h2>
    </div>
    <div class="bg-white shadow-md rounded-b-xl p-4">
        <div class="flex flex-col gap-4">
            <div id="cargoList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="absolute top-32 -translate-y-5 hover:translate-y-0 transition-transform duration-200 ease-out cursor-pointer" style="left:50%; z-index:10;">
                    <button onclick="prevSlide()" class="swiper-button-up bg-white text-black hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white p-2 rounded-full">
                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2l-6 6h4v6h4v-6h4l-6-6z" fill="#3C3C3C"></path>
                        </svg>
                    </button>
                </div>

                <?php if ($data && isset($data['cargaisons']) && !empty($data['cargaisons'])) : ?>
                    <?php foreach ($data['cargaisons'] as $index => $cargaison) : ?>
                        <!-- Affichage de la cargaison -->
                        <div style="width:100%; height:100%" class="card bg-blue-200 hover:text-blue-500 p-4 rounded-xl shadow-xl cursor-pointer hover:scale-105 transition-transform duration-200 ease-out <?= $index >= 10 ? 'hidden' : '' ?>">
                            <div class="mb-4 flex justify-between">
                                <span class="openFormButton inline-block bg-blue-500 text-white px-3 py-1 rounded-full" data-idcargo="<?= htmlspecialchars($cargaison['idcargo']) ?>"><?= $cargaison['type'] ?></span>
                                <span class="px-3 py-1 inline-block rounded-full bg-red-100 text-red-800"><?= $cargaison['etat_avancement'] ?></span>
                            </div>
                            <div class="w-full h-44 mb-2 border border-solid border-gray-200 rounded-2xl overflow-hidden">
                                <img src="ram.jpeg" class="rounded-2xl w-full h-full object-cover" alt="avion">
                            </div>
                            <div class="flex justify-between items-center w-full h-10 flex-wrap">
                                <span class="inline-block text-blue-600 px-2 py-1 rounded-full"><?= $cargaison['lieu_depart'] ?></span>
                                <span class="inline-block px-2 py-1 rounded-full ml-1">
                                    <?php if (isset($cargaison['date_depart'])) {
                                        echo $cargaison['date_depart'];
                                    } ?>
                                </span>
                            </div>
                            <div class="flex justify-between items-center w-full h-10 flex-wrap">
                                <p class="text-blue-600 font-bold text-sm ml-2"><?= $cargaison['lieu_arrivee'] ?></p>
                                <p class="inline-block px-2 py-1 rounded-full ml-1">
                                    <?php if (isset($cargaison['date_arrivee'])) {
                                        echo $cargaison['date_arrivee'];
                                    } ?>
                                </p>
                            </div>
                            <div class="flex h-10 w-full items-center justify-between">
                                <p class="text-blue-600 font-bold text-sm p-2">Prix total:</p>
                                <div class="bg-blue-600 h-10 rounded-full flex justify-center items-center" style="width: 20%">
                                    <?= $cargaison['prix_total'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="absolute bottom-0 -translate-y-5 hover:translate-y-0 transition-transform duration-200 ease-out cursor-pointer" style="left:50%; z-index:10;">
                    <!-- Button pointing down -->
                    <button onclick="nextSlide()" class="swiper-button-up bg-white text-black hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white p-2 rounded-full">
                        <svg width="15" height="15" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 14l6-6h-4V2H6v6H2l6 6z" fill="#3C3C3C"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="list-view" class="hidden">

                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-white hover:bg-gray-100 transition duration-300 ease-in-out">
                            <th class="border px-4 py-2 text-blue-600 font-bold">N°</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Type</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Lieu de départ</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Lieu d'arrivée</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Date de départ</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Date d'arrivée</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">État</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Étapes</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Progression</th>
                            <th class="border px-4 py-2 text-blue-600 font-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="cargaisonList">
                        <?php if ($data && isset($data['cargaisons']) && !empty($data['cargaisons'])) : ?>
                            <?php foreach ($data['cargaisons'] as $cargaison) : ?>
                                <tr class="bg-white hover:bg-gray-100 transition duration-300 ease-in-out">
                                    <td class="border px-4 py-2 text-black font-bold"> <?= ($cargaison['numero']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold"> <?= ($cargaison['type']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold"> <?= ($cargaison['lieu_depart']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold"> <?= ($cargaison['lieu_arrivee']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold"> <?= ($cargaison['date_depart']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold"> <?= ($cargaison['date_arrivee']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold" data-action="etat_globale"> <?= ($cargaison['etat_globale']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold"> <select name="" id="">
                                            <option value="en attente">En attente</option>
                                            <option value="en cours">En cours</option>
                                            <option value="Terminée">Terminée</option>
                                            <option value="Perdue">Perdue</option>
                                            <?= ($cargaison['etat_avancement']) ?>
                                        </select></td>
                                    <td class="border px-4 py-2 text-black font-bold"> <?= ($cargaison['prix_total']) ?></td>
                                    <td class="border px-4 py-2 text-black font-bold">
                                        <button data-idcargo="<?= htmlspecialchars($cargaison['idcargo']) ?>" class=" openFormButton bg-green-500 text-white px-2 mr-2 py-1 rounded-full"><i class="fa-solid fa-cart-plus"></i></button>
                                        <button id="detail" data-idcargo="<?= htmlspecialchars($cargaison['idcargo']) ?>" class="bg-blue-500 text-white px-2 py-1 rounded-full"><i class="fa-solid fa-circle-info"></i>nfo</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <!--  <div id="pagination" class="pagination-controls"></div> -->
                </table>
                


                <div class="w-full p-3 mt-2 bg-blue-400 rounded-b-lg shadow-md">
                    <div class="flex items-center justify-between text-gray-700">
                        <div data-qa="PagerInfo" class="text-sm bg-black text-white pl-4">1-60 de 133 208</div>
                        <div data-qa="Pager" class="flex items-center space-x-2">
                            <!-- Previous Button -->
                            <button class="p-2 rounded-full bg-white text-black hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" aria-label="Précédente">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.707a1 1 0 00-1.414-1.414l1.414 1.414zM4 8l-.707-.707a1 1 0 000 1.414L4 8zm5.293 6.707a1 1 0 001.414-1.414l-1.414 1.414zm0-13.414l-6 6 1.414 1.414 6-6-1.414-1.414zm-6 7.414l6 6 1.414-1.414-6-6-1.414 1.414z" fill="#3C3C3C">
                                    </path>
                                </svg>
                            </button>
                            <!-- Page Input -->
                            <input class="pageInput w-12 p-2 border border-blue-300 rounded text-center focus:outline-none focus:ring-2 focus:ring-blue-800" aria-label="Page actuelle 1" type="number" min="1" value="1">
                            <!-- Next Button -->
                            <button class="p-2 rounded-full bg-white text-black hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" aria-label="Suivante">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.293 13.293a1 1 0 101.414 1.414l-1.414-1.414zM12 8l.707.707a1 1 0 000-1.414L12 8zM6.707 1.293a1 1 0 00-1.414 1.414l1.414-1.414zm0 13.414l6-6-1.414-1.414-6 6 1.414 1.414zm6-7.414l-6-6-1.414 1.414 6 6 1.414-1.414z" fill="#3C3C3C"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="container mx-auto mt-6">
    <!-- Modal Ajout Cargaison -->
    <div class="modal" id="myModal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class="font-bold text-lg">Nouvelle Cargaison</h3>
            <form id="cargoForm" action="" method="post">
                <div class="mb-2">
                    <label class="block text-black mb-2">Type de transport</label>
                    <select id="transportType" class="w-full p-2 border rounded-md">
                        <option value="Maritime">Maritime</option>
                        <option value="Aérienne">Aérienne</option>
                        <option value="Routière">Routière</option>
                    </select>
                </div>
                <div class="mb-2" style="position:relative;">
                    <label for="countryName" class="block text-black mb-2">Pays de Départ:</label>
                    <input type="text" id="countryName" class="w-full p-2 border rounded-md" readonly>
                </div>
                <div class="mb-2" style="position:relative;">
                    <label for="arrivalCountry" class="block text-black mb-2">Pays d'Arrivée:</label>
                    <input type="text" id="arrivalCountry" class="w-full p-2 border rounded-md" readonly>
                </div>
                <div class="mb-2">
                    <label for="distance" class="block text-black mb-2">Distance:</label>
                    <input type="text" id="distance" class="w-full p-2 border rounded-md" readonly>
                </div>
                <div class="mb-2">
                    <label class="block text-black mb-2">Date de Départ</label>
                    <input type="date" id="departureDate" class="w-full p-2 border rounded-md" />
                </div>
                <div class="mb-2">
                    <label class="block text-black mb-2">Date d'Arrivée</label>
                    <input type="date" id="arrivalDate" class="w-full p-2 border rounded-md" />
                </div>
                <div class="mb-2">
                    <label class="block text-black mb-2">Choisir produits à prendre</label>
                    <select id="choix" class="w-full p-2 border rounded-md">
                        <option value="#">Choisir</option>
                        <option value="poids">POIDS</option>
                        <option value="nombre">NOMBRE</option>
                    </select>
                </div>
                <div class="mb-2 hidden" id="poidMax">
                    <label class="block text-black mb-2">Poids Maximum du cargaison (en Kg)</label>
                    <input type="number" id="maxWeight" class="w-full p-2 border rounded-md" value="100" min="100" max="10000" />
                </div>
                <div class="mb-2 hidden" id="nombreMax">
                    <label class="block text-black mb-2">Nombre Maximum de produits du cargaison</label>
                    <input type="number" id="maxProducts" class="w-full p-2 border rounded-md" value="1" min="1" max="100" />
                </div>
                <div class="col-span-2">
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Ajout Produit -->
    <div class="overlaye fixed inset-0 bg-black bg-opacity-50 z-50 hidden" id="overlaye"></div>
    <div id="modalprdt" class="modal1 hidden fixed shadow-lg rounded-lg z-50" style="width: 50%;top:10%;left:15%;">
        <div class="bg-white p-6 rounded-lg shadow-lg border relative" style="width:90rem">

            <button id="closeButton" class="btn btn-sm btn-circle btn-ghost absolute w-4 h-4 right-2 top-2">✕</button>

            <h2 class="text-lg font-semibold text-blue-500 mb-4 text-center">Ajouter Produit</h2>
            <form data-idcargo="<?= htmlspecialchars($cargaison['idcargo']) ?>" id="addProductForm" method="post" class="" style="width:100%">
                <div class="flex space-y-10 gap-3">
                    <!-- Produit Section -->
                    <div style="width:33%;">
                        <h3 class="text-md font-semibold text-gray-800 mb-2">Produit</h3>
                        <div class="mb-4">
                            <label for="nomProduit" class="block text-gray-700">Nom du produit</label>
                            <input type="text" id="nomProduit" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="type-produit" class="block text-gray-700">Type de produit</label>
                            <select id="type-produit" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Sélectionner</option>
                                <option value="alimentaire">Alimentaire</option>
                                <option value="chimique">chimique</option>
                                <option value="incassable">incassable</option>
                                <option value="fragile">fragile</option>
                            </select>
                        </div>
                        <div class="mb-4 hidden" id="toxicity">
                            <label for="form-toxicity-input" class="block text-gray-700">Toxicité</label>
                            <input type="number" min="1" max="10" value="1" id="form-toxicity-input" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="poids" class="block text-gray-700">Poids</label>
                            <input type="number" min="1" id="poids" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="form-discount-input" class="block text-gray-700">Prix</label>
                            <input type="number" min="1" id="form-discount-input" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <!-- Client Section -->
                    <div style="width:33%;">
                        <h3 class="text-md font-semibold text-gray-800 mb-2">Informations du client</h3>
                        <div class="mb-4">
                            <label for="client-nom" class="block text-gray-700">Nom du client</label>
                            <input type="text" id="client-nom" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="client-prenom" class="block text-gray-700">Prénom du client</label>
                            <input type="text" id="client-prenom" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="client-telephone" class="block text-gray-700">Téléphone client</label>
                            <input type="text" id="client-telephone" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="client-email" class="block text-gray-700">Email client</label>
                            <input type="email" id="client-email" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="client-adresse" class="block text-gray-700">Adresse client</label>
                            <input type="text" id="client-adresse" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <!-- Destinataire Section -->
                    <div style="width:33%;">
                        <h3 class="text-md font-semibold text-gray-800 mb-2">Informations du destinataire</h3>
                        <div class="mb-4">
                            <label for="destinataire-nom" class="block text-gray-700">Nom du destinataire</label>
                            <input type="text" id="destinataire-nom" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="destinataire-prenom" class="block text-gray-700">Prénom du destinataire</label>
                            <input type="text" id="destinataire-prenom" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="destinataire-telephone" class="block text-gray-700">Telephone du destinataire</label>
                            <input type="text" id="destinataire-telephone" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="destinataire-email" class="block text-gray-700">Email du destinataire</label>
                            <input type="email" id="destinataire-email" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="destinataire-adresse" class="block text-gray-700">Adresse du destinataire</label>
                            <input type="text" id="destinataire-adresse" class="w-full px-4 py-2 border rounded-lg border-sky-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
                <button type="submit" id="addProduct" class="w-full text-blue-600 py-2 rounded-lg mt-6">Ajouter</button>
            </form>
        </div>
    </div>

    <!-- Détails cargaison -->
    <div id="cargoModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-5 rounded-lg shadow-lg w-3/4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold">Détails des Cargaisons</h1>
                <button id="closeModal" class="text-red-500 font-bold">&times;</button>
            </div>

            <table class="min-w-full bg-white shadow-md rounded mb-4">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Numéro</th>
                        <th class="py-2 px-4 border-b">Lieu de Départ</th>
                        <th class="py-2 px-4 border-b">Lieu d'Arrivée</th>
                        <th class="py-2 px-4 border-b">Date de Départ</th>
                        <th class="py-2 px-4 border-b">Date d'Arrivée</th>
                        <th class="py-2 px-4 border-b">Distance</th>
                        <th class="py-2 px-4 border-b">Type</th>
                        <th class="py-2 px-4 border-b">Statut</th>
                        <th class="py-2 px-4 border-b">État</th>
                        <th class="py-2 px-4 border-b">Prix total</th>
                        <th class="py-2 px-4 border-b">Poids max</th>
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
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody id="bodydetailsproduits"></tbody>
            </table>
        </div>
    </div>

</div>

<script>
   /*  document.addEventListener('DOMContentLoaded', () => { */
    document.querySelectorAll('button[data-action="etat_globale"]').forEach(btn => {
    btn.addEventListener("click", (event) => {  
      const btn= event.target ;
      console.log(btn);
      if (btn.textContent==="ouvert"){
        btn.textContent="Fermée";
      }else if (btn.textContent==="Fermée"){
        btn.textContent="ouvert";
        console.log(btn.textContent);
      }
    });
    });
        /* }); */
    // Récupérer l'élément modal
    var modal = document.getElementById("myModal");

    // Récupérer le bouton qui ouvre le modal
    var btn = document.getElementById("search-button");

    // Récupérer l'élément <span> qui ferme le modal
    var span = document.getElementsByClassName("close")[0];

    // Quand l'utilisateur clique sur le
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Quand l'utilisateur clique sur <span> (x), ferme le modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Quand l'utilisateur clique en dehors du modal, ce dernier ne se ferme pas
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "block";
        }
    }

    document.getElementById('closeButton').addEventListener('click', function() {
        document.getElementById('modalprdt').style.display = "none";
        document.getElementById('overlaye').style.display = "none";
    });



</script>