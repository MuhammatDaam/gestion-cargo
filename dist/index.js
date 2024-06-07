"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("cargoForm");
    form.addEventListener("submit", (event) => {
        event.preventDefault();
        let isValid = true;
        const transportType = document.getElementById('transportType');
        const numero = "CGS" + Math.floor(Math.random() * 1000);
        const poids_max = parseFloat(document.getElementById('maxWeight').value) || 0;
        const nombre_max = parseFloat(document.getElementById('maxProducts').value) || 0;
        const prix_total = poids_max > 0 ? poids_max * 100 : nombre_max * 100;
        const lieu_depart = document.getElementById('countryName').value;
        const date_depart = document.getElementById('departureDate').value;
        const lieu_arrivee = document.getElementById('arrivalCountry').value;
        const date_arrivee = document.getElementById('arrivalDate').value;
        const distance_km = document.getElementById('distance').value;
        const etat_avancement = "en Attente";
        const etat_globale = "ouvert";
        const formData = new FormData();
        formData.append('action', 'addCargaison');
        formData.append('numero', numero);
        formData.append('poids_max', poids_max.toString());
        formData.append('nombre_max', nombre_max.toString());
        formData.append('prix_total', prix_total.toString());
        formData.append('lieu_depart', lieu_depart);
        formData.append('date_depart', date_depart);
        formData.append('date_arrivee', date_arrivee);
        formData.append('lieu_arrivee', lieu_arrivee);
        formData.append('distance_km', distance_km.toString());
        formData.append('type', transportType.value);
        formData.append('etat_avancement', etat_avancement);
        formData.append('etat_globale', etat_globale);
        document.querySelectorAll(".error-message").forEach((el) => el.remove());
        if (transportType.value === "choix" || transportType.value === "") {
            isValid = false;
            showError(transportType, "Veuillez sélectionner un type de transport.");
        }
        if (lieu_depart.trim() === "") {
            isValid = false;
            showError(document.getElementById('countryName'), "Veuillez saisir le pays de départ.");
        }
        if (lieu_arrivee.trim() === "") {
            isValid = false;
            showError(document.getElementById('arrivalCountry'), "Veuillez saisir le pays d'arrivée.");
        }
        if (distance_km.trim() === "") {
            isValid = false;
            showError(document.getElementById('distance'), "Veuillez saisir la distance.");
        }
        if (date_depart === "") {
            isValid = false;
            showError(document.getElementById('departureDate'), "Veuillez sélectionner une date de départ.");
        }
        if (date_arrivee === "") {
            isValid = false;
            showError(document.getElementById('arrivalDate'), "Veuillez sélectionner une date d'arrivée.");
        }
        else {
            if (date_depart >= date_arrivee) {
                isValid = false;
                showError(document.getElementById('arrivalDate'), "La date d'arrivée doit être supérieure à la date de départ.");
            }
        }
        const choix = document.getElementById('choix');
        if (choix.value === "") {
            isValid = false;
            showError(choix, "Veuillez choisir une option.");
        }
        else if (choix.value === "poids" && poids_max <= 0) {
            isValid = false;
            showError(document.getElementById('maxWeight'), "Veuillez saisir un poids maximum valide.");
        }
        else if (choix.value === "nombre" && nombre_max <= 0) {
            isValid = false;
            showError(document.getElementById('maxProducts'), "Veuillez saisir un nombre maximum de produits valide.");
        }
        if (isValid) {
            fetch('../public/donnees.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(text => {
                try {
                    const data = JSON.parse(text);
                    if (data.status === "success") {
                        console.log(data.message);
                        const modal = document.getElementById('modal');
                        if (modal)
                            modal.classList.add('hidden');
                        addCargaisonToTout(numero, transportType.value, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_globale, etat_avancement, prix_total);
                        window.addEventListener('load', function () {
                            fetchCargaisons();
                            addCargaisonToTout(numero, transportType.value, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_globale, etat_avancement, prix_total);
                        });
                    }
                    else {
                        console.log('Erreur lors de l\'ajout de la cargaison');
                    }
                }
                catch (e) {
                    console.error('Erreur de parsing JSON:', e, text);
                }
            })
                .catch(error => console.error('Erreur:', error));
        }
    });
    const choix = document.getElementById("choix");
    choix.addEventListener("change", () => {
        const poidMax = document.getElementById("poids");
        const nombreMax = document.getElementById("nombre");
        if (choix.value === "poids") {
            poidMax.classList.remove("hidden");
            nombreMax.classList.add("hidden");
        }
        else if (choix.value === "nombre") {
            poidMax.classList.add("hidden");
            nombreMax.classList.remove("hidden");
        }
        else {
            poidMax.classList.add("hidden");
            nombreMax.classList.add("hidden");
        }
    });
    fetchCargaisons();
});
function showError(input, message) {
    var _a;
    const errorElement = document.createElement("div");
    errorElement.classList.add("error-message");
    errorElement.textContent = message;
    (_a = input.parentElement) === null || _a === void 0 ? void 0 : _a.appendChild(errorElement);
}
function generateUniqueId() {
    return 'id-' + Math.random().toString(36).substr(2, 9);
}
var code;
function addCargaisonToTout(numero, type, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_globale, etat_avancement, prix_total) {
    const id = generateUniqueId();
    addCargaisonToCard(prix_total, numero, type, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_avancement, etat_globale);
    addCargaisonToTable(prix_total, numero, type, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_globale, etat_avancement);
    addCargaisonToList(id, numero, type, lieu_depart, date_depart, lieu_arrivee, date_arrivee, prix_total);
}
function addCargaisonToTable(prix_total, numero, type, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_globale, etat_avancement) {
    const tableBody = document.getElementById('cargaisonList');
    const row = document.createElement('tr');
    row.classList.add('bg-white', 'hover:bg-gray-100', 'transition', 'duration-300', 'ease-in-out');
    row.innerHTML = `
    <td class="border px-4 py-2 text-blue-600 font-bold">${numero}</td>
    <td class="border px-4 py-2 text-blue-600 font-bold">${type}</td>
    <td class="border px-4 py-2 text-blue-600 font-bold">${lieu_depart}</td>
    <td class="border px-4 py-2 text-blue-600 font-bold">${lieu_arrivee}</td>
    <td class="border px-4 py-2 text-blue-600 font-bold">${date_depart}</td>
    <td class="border px-4 py-2 text-blue-600 font-bold">${date_arrivee}</td>
    <td class="border px-4 py-2 text-blue-600 font-bold">
    <button data-idcargo="${'idcargo'}"data-action="etat_globale" class="bg-blue-500 text-white px-2 py-1 rounded-full">${etat_globale}</button>
    </td>
    <td class="border px-4 py-2 text-blue-600 font-bold">${etat_avancement}</td>
    <td class="border px-4 py-2 text-blue-600 font-bold">${prix_total}</td>
    <td class="border px-4 py-2 text-black font-bold">
        <button id="ajoutprdt" data-idcargo="${'idcargo'}" class=" openFormButton bg-green-500 text-white px-2 mr-2 py-1 rounded-full"><i class="fa-solid fa-cart-plus"></i></button>
        <button id="detail" data-idcargo="${'idcargo'}" class="bg-blue-500 text-white px-2 py-1 rounded-full"><i class="fa-solid fa-circle-info"></i>nfo</button>
    </td>
  `;
    tableBody.appendChild(row);
    document.querySelectorAll("detail").forEach(btn => {
        btn.addEventListener("click", () => {
            code = btn.getAttribute("data-code");
            console.log(code);
        });
    });
    document.querySelectorAll('button[data-action="etat_globale"]').forEach(btn => {
        btn.addEventListener("click", (event) => {
            const btn = event.target;
            if (btn.textContent === "ouvert") {
                btn.textContent = "Fermée";
            }
            else if (btn.textContent === "Fermée") {
                btn.textContent = "ouvert";
                console.log(btn.textContent);
            }
        });
    });
}
function addCargaisonToCard(prix_total, numero, type, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_avancement, etat_globale) {
    const cargoList = document.getElementById('cargoList');
    const cargoItem = document.createElement('div');
    cargoItem.classList.add('card', 'bg-blue-100', 'hover:text-blue-500', 'p-4', 'rounded-xl', 'shadow-xl', 'cursor-pointer', 'hover:scale-105', 'transition-transform', 'duration-200', 'ease-out');
    cargoItem.innerHTML = `
    <div class="mb-4 flex justify-between">
      <span class="openFormButton inline-block bg-blue-500 text-white px-3 py-1 rounded-full">${type}</span>
      <span class="px-3 py-1 inline-block rounded-full bg-red-100 text-red-800">${etat_avancement}</span>
    </div>
    <div class="w-full h-44 mb-2 border border-solid border-gray-200 rounded-2xl overflow-hidden">
      <img src="ram.jpeg" class="rounded-2xl w-full h-full object-cover" alt="avion">
    </div>
    <div class="flex justify-between items-center w-full h-10 flex-wrap">
      <span class="inline-block text-blue-600 px-2 py-1 rounded-full">${lieu_depart}</span>
      <span class="inline-block px-2 py-1 rounded-full ml-1">${date_depart}</span>
    </div>
    <div class="flex justify-between items-center w-full h-10 flex-wrap">
      <p class="text-blue-600 font-bold text-sm ml-2">${lieu_arrivee}</p>
      <p class="inline-block px-2 py-1 rounded-full ml-1">${date_arrivee}</p>
    </div>
    <div class="flex h-10 w-full items-center justify-between">
      <p class="text-blue-600 font-bold text-sm p-2">Prix total:</p>
      
        <div class="bg-blue-600 h-10 rounded-full flex justify-center items-center" style="width: 20%">
          ${prix_total}
        </div>
    </div>
  `;
    cargoList.appendChild(cargoItem);
}
function addCargaisonToList(id, numero, type, lieu_depart, date_depart, lieu_arrivee, date_arrivee, prix_total) {
    const cardList = document.getElementById('cardList');
    const cardItem = document.createElement('div');
    cardItem.classList.add('bg-blue-100', 'hover:text-blue-500', 'p-4', 'rounded-xl', 'shadow-xl', 'cursor-pointer', 'hover:scale-105', 'transition-transform', 'duration-200', 'ease-out');
    cardItem.innerHTML = `
    <div class="mb-2">
      <p class="text-gray-700"><strong>Numéro:</strong> ${numero}</p>
      <p class="text-gray-700"><strong>Type:</strong> ${type}</p>
      <p class="text-gray-700"><strong>Lieu de départ:</strong> ${lieu_depart}</p>
      <p class="text-gray-700"><strong>Lieu d'arrivée:</strong> ${lieu_arrivee}</p>
      <p class="text-gray-700"><strong>Date de départ:</strong> ${date_depart}</p>
      <p class="text-gray-700"><strong>Date d'arrivée:</strong> ${date_arrivee}</p>
      <p class="text-gray-700"><strong>Prix total:</strong> ${prix_total} €</p>
    </div>
  `;
    cardList.appendChild(cardItem);
}
function deleteCargaison(id) {
    const row = document.getElementById(id);
    if (row)
        row.remove();
    console.log('Cargaison deleted with ID:', id);
}
function fetchCargaisons() {
    fetch('../public/donnees.php?action=getAllCargaisons')
        .then(response => response.json())
        .then(data => {
        data.forEach((cargaison) => {
            const { numero, type, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_avancement, etat_globale, prix_total } = cargaison;
            addCargaisonToTout(numero, type, lieu_depart, lieu_arrivee, date_depart, date_arrivee, etat_globale, etat_avancement, prix_total);
        });
    })
        .catch(error => console.error('Erreur:', error));
}
document.addEventListener('DOMContentLoaded', () => {
    const produitsForm = document.getElementById('addProductForm');
    produitsForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const idcargo = produitsForm.dataset.idcargo || '';
        console.log('ID de cargaison:', idcargo);
        if (idcargo) {
            const nomProduit = document.getElementById('nomProduit').value;
            const numero = "PRD" + Math.floor(Math.random() * 1000);
            const poids = parseFloat(document.getElementById('poids').value) || 0;
            const typeProduit = document.getElementById('type-produit').value;
            const formToxicityInput = document.getElementById('form-toxicity-input').value;
            const formDiscountInput = document.getElementById('form-discount-input').value;
            const clientNom = document.getElementById('client-nom').value;
            const clientPrenom = document.getElementById('client-prenom').value;
            const clientTelephone = document.getElementById('client-telephone').value;
            const clientAdresse = document.getElementById('client-adresse').value;
            const clientEmail = document.getElementById('client-email').value;
            const destinataireNom = document.getElementById('destinataire-nom').value;
            const destinatairePrenom = document.getElementById('destinataire-prenom').value;
            const destinataireTelephone = document.getElementById('destinataire-telephone').value;
            const destinataireAdresse = document.getElementById('destinataire-adresse').value;
            const destinataireEmail = document.getElementById('destinataire-email').value;
            const formData = new FormData();
            formData.append('action', 'addProduct');
            formData.append('idcargo', idcargo);
            formData.append('numero', numero);
            formData.append('poids', poids.toString());
            formData.append('typeProduit', typeProduit);
            formData.append('formToxicityInput', formToxicityInput);
            formData.append('nomProduit', nomProduit);
            formData.append('formDiscountInput', formDiscountInput);
            formData.append('clientNom', clientNom);
            formData.append('clientAdresse', clientAdresse);
            formData.append('clientPrenom', clientPrenom);
            formData.append('clientTelephone', clientTelephone);
            formData.append('clientEmail', clientEmail);
            formData.append('destinataireNom', destinataireNom);
            formData.append('destinatairePrenom', destinatairePrenom);
            formData.append('destinataireTelephone', destinataireTelephone);
            formData.append('destinataireAdresse', destinataireAdresse);
            formData.append('destinataireEmail', destinataireEmail);
            formData.forEach((value, key) => {
                console.log(key, value);
            });
            fetch('../public/donnees.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(text => {
                console.log('Raw response:', text);
                try {
                    const data = JSON.parse(text);
                    if (data.status === 'success') {
                        console.log('Produit ajouté avec succès');
                    }
                    else {
                        console.log('Erreur:', data.message);
                    }
                }
                catch (e) {
                    console.error('Erreur de parsing JSON:', e, 'Texte:', text);
                    alert('Erreur lors de l\'ajout du produit : réponse du serveur invalide.');
                }
            })
                .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de l\'ajout du produit');
            });
        }
        else {
            console.error('ID de cargaison manquant.');
            alert('Erreur : ID de cargaison manquant.');
        }
    });
});
var idCargo;
document.addEventListener("DOMContentLoaded", function () {
    const openFormButtons = document.querySelectorAll('.openFormButton');
    const popupForm = document.getElementById('modalprdt');
    const overlay = document.getElementById('overlaye');
    const produitsForm = document.getElementById('addProductForm');
    openFormButtons.forEach(button => {
        button.addEventListener('click', function () {
            const idcargo = button.getAttribute('data-idcargo') || '';
            console.log('ID de cargaison:', idcargo);
            produitsForm.dataset.idcargo = idcargo;
            popupForm.style.display = 'block';
            overlay.style.display = 'block';
        });
    });
    produitsForm.addEventListener('submit', function (event) {
        return __awaiter(this, void 0, void 0, function* () {
            event.preventDefault();
            idCargo = produitsForm.dataset.idcargo;
            console.log('ID de cargaison:', idCargo);
            if (idCargo) {
                const nombreColisInput = document.getElementById('nombre-colis');
                if (nombreColisInput) {
                    const nombreColis = nombreColisInput.value;
                }
            }
            else {
                console.error('ID de cargaison manquant.');
                alert('Erreur : ID de cargaison manquant.');
            }
        });
    });
});
const chimique = document.getElementById("type-produit");
chimique.addEventListener("change", () => {
    const toxicity = document.getElementById("toxicity");
    if (chimique.value === "chimique") {
        toxicity.classList.remove("hidden");
    }
    else {
        toxicity.classList.add("hidden");
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const detailsButtons = document.querySelectorAll("#detail");
    const modal = document.getElementById("cargoModal");
    const closeModal = document.getElementById("closeModal");
    const bodyDetailsCargo = document.getElementById("bodydetailscargo");
    const bodyDetailsProduits = document.getElementById("bodydetailsproduits");
    detailsButtons.forEach(button => {
        button.addEventListener("click", (event) => __awaiter(void 0, void 0, void 0, function* () {
            const buttonElement = event.target;
            const cargoCode = buttonElement.getAttribute("data-idcargo");
            if (!cargoCode) {
                console.error("cargoCode is undefined or null");
                return;
            }
            try {
                const cargoDetails = yield fetchCargoDetails(cargoCode);
                const productDetails = yield fetchProductDetails(cargoCode);
                console.log(productDetails);
                if (!cargoDetails || !productDetails) {
                    console.error("Failed to fetch cargo or product details");
                    return;
                }
                if (bodyDetailsCargo) {
                    bodyDetailsCargo.innerHTML = `
                      <tr>
                          <td class="py-2 px-4 border-b">${cargoDetails.numero}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.lieu_depart}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.lieu_arrivee}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.date_depart}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.date_arrivee}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.distance_km}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.type}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.etat_avancement}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.etat_globale}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.prix_total}</td>
                          <td class="py-2 px-4 border-b">${cargoDetails.poids_max}</td>
                      </tr>
                  `;
                }
                if (bodyDetailsProduits) {
                    bodyDetailsProduits.innerHTML = productDetails.map((product) => `
                      <tr>
                          <td class="py-2 px-4 border-b">${product.idproduit}</td>
                          <td class="py-2 px-4 border-b">${product.type_produit}</td>
                          <td class="py-2 px-4 border-b">${product.poids}</td>
                          <td class="py-2 px-4 border-b">${product.client.nom}</td>
                          <td class="py-2 px-4 border-b">${product.client.prenom}</td>
                          <td class="py-2 px-4 border-b">${product.client.telephone}</td>
                          <td class="py-2 px-4 border-b">${product.client.adresse}</td>
                          <td class="py-2 px-4 border-b">${product.destinataire.nom}</td>
                          <td class="py-2 px-4 border-b">${product.destinataire.prenom}</td>
                          <td class="py-2 px-4 border-b">${product.destinataire.telephnoe}</td>
                          <td class="py-2 px-4 border-b">${product.destinataire.adresse}</td>
                      </tr>
                  `).join('');
                }
                if (modal) {
                    modal.classList.remove("hidden");
                }
            }
            catch (error) {
                console.error("Error fetching cargo or product details:", error);
            }
        }));
    });
    if (closeModal && modal) {
        closeModal.addEventListener("click", () => {
            modal.classList.add("hidden");
        });
    }
});
function fetchCargoDetails(cargoCode) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const response = yield fetch('../public/cargaisons.json');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = yield response.json();
            const cargo = data.cargaisons.find((c) => c.idcargo.trim() === cargoCode.trim());
            if (!cargo) {
                throw new Error('Cargo not found');
            }
            return cargo;
        }
        catch (error) {
            console.error("Error fetching cargo details:", error);
            return null;
        }
    });
}
function fetchProductDetails(cargoCode) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const response = yield fetch('../public/cargaisons.json');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const data = yield response.json();
            const cargo = data.cargaisons.find((c) => c.idcargo.trim() === cargoCode.trim());
            if (!cargo) {
                throw new Error('Cargo not found');
            }
            return cargo.produits;
        }
        catch (error) {
            console.error("Error fetching product details:", error);
            return null;
        }
    });
}
document.addEventListener("DOMContentLoaded", () => {
    const rowsPerPage = 10;
    let currentPage = 1;
    const filters = {
        numero: document.getElementById('numeroFilter'),
        type: document.getElementById('typeFilter'),
        etat: document.getElementById('etatFilter'),
        destination: document.getElementById('destinationFilter'),
        depart: document.getElementById('departFilter'),
        dateDepart: document.getElementById('dateDepartFilter'),
        dateArrivee: document.getElementById('dateArriveeFilter')
    };
    const cargaisonList = document.getElementById('bodydetailsproduits');
    const cargoList = document.getElementById('cargoList');
    function applyFilters() {
        const rows = Array.from(cargaisonList.querySelectorAll('tr'));
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const numero = cells[0].textContent || '';
            const type = cells[1].textContent || '';
            const lieuDepart = cells[2].textContent || '';
            const lieuArrivee = cells[3].textContent || '';
            const dateDepart = cells[2].textContent || '';
            const dateArrivee = cells[3].textContent || '';
            const etat = cells[4].textContent || '';
            const numeroMatch = numero.includes(filters.numero.value);
            const typeMatch = filters.type.value === '' || type === filters.type.value;
            const etatMatch = filters.etat.value === '' || etat === filters.etat.value;
            const destinationMatch = lieuArrivee.includes(filters.destination.value);
            const departMatch = lieuDepart.includes(filters.depart.value);
            const dateDepartMatch = !filters.dateDepart.value || new Date(dateDepart) >= new Date(filters.dateDepart.value);
            const dateArriveeMatch = !filters.dateArrivee.value || new Date(dateArrivee) <= new Date(filters.dateArrivee.value);
            if (numeroMatch && typeMatch && etatMatch && destinationMatch && departMatch && dateDepartMatch && dateArriveeMatch) {
                row.classList.remove('hidden');
            }
            else {
                row.classList.add('hidden');
            }
        });
    }
    function applyFiltersCard() {
        const cards = Array.from(cargoList.querySelectorAll('.card'));
        cards.forEach(card => {
            var _a, _b, _c, _d, _e, _f;
            const type = ((_a = card.querySelector('.div1')) === null || _a === void 0 ? void 0 : _a.textContent) || '';
            const etat = ((_b = card.querySelector('.div2')) === null || _b === void 0 ? void 0 : _b.textContent) || '';
            const lieuDepart = ((_c = card.querySelector('.div3')) === null || _c === void 0 ? void 0 : _c.textContent) || '';
            const lieuArrivee = ((_d = card.querySelector('.div4')) === null || _d === void 0 ? void 0 : _d.textContent) || '';
            const dateDepart = ((_e = card.querySelectorAll('.div5')[1]) === null || _e === void 0 ? void 0 : _e.textContent) || '';
            const dateArrivee = ((_f = card.querySelector('.div6')) === null || _f === void 0 ? void 0 : _f.textContent) || '';
            const typeMatch = filters.type.value === '' || type === filters.type.value;
            const etatMatch = filters.etat.value === '' || etat === filters.etat.value;
            const destinationMatch = lieuArrivee.includes(filters.destination.value);
            const departMatch = lieuDepart.includes(filters.depart.value);
            const dateDepartMatch = !filters.dateDepart.value || new Date(dateDepart) >= new Date(filters.dateDepart.value);
            const dateArriveeMatch = !filters.dateArrivee.value || new Date(dateArrivee) <= new Date(filters.dateArrivee.value);
            if (typeMatch && etatMatch && destinationMatch && departMatch && dateDepartMatch && dateArriveeMatch) {
                card.classList.remove('hidden');
            }
            else {
                card.classList.add('hidden');
            }
        });
    }
    function paginate(elements, page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        elements.forEach((element, index) => {
            if (index >= start && index < end) {
                element.classList.remove('hidden');
            }
            else {
                element.classList.add('hidden');
            }
        });
    }
    function updatePaginationControls(totalElements, elementType) {
        const totalPages = Math.ceil(totalElements / rowsPerPage);
        const paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i.toString();
            button.classList.add('pagination-button');
            button.addEventListener('click', () => {
                currentPage = i;
                const filteredElements = Array.from(document.querySelectorAll(`#${elementType} .card:not(.hidden), #${elementType} tr:not(.hidden)`));
                paginate(filteredElements, currentPage);
            });
            paginationContainer.appendChild(button);
        }
    }
    function applyFiltersAndPaginate() {
        applyFilters();
        applyFiltersCard();
        const filteredRows = Array.from(cargaisonList.querySelectorAll('tr:not(.hidden)'));
        const filteredCards = Array.from(cargoList.querySelectorAll('.card:not(.hidden)'));
        if (filteredRows.length > 0) {
            updatePaginationControls(filteredRows.length, 'cargaisonList');
            paginate(filteredRows, currentPage);
        }
        else if (filteredCards.length > 0) {
            updatePaginationControls(filteredCards.length, 'cargoList');
            paginate(filteredCards, currentPage);
        }
    }
    applyFiltersAndPaginate();
    Object.values(filters).forEach(filter => filter.addEventListener('input', applyFiltersAndPaginate));
});
function not(hidden) {
    throw new Error("Function not implemented.");
}
