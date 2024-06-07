</main>
</main>
<footer class="footer">
    &copy; 2023 GP MONDE. All rights reserved.
</footer>
</div>
</div>


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // partie produits 
    document.getElementById('type-produit').addEventListener('change', function () {
        const materielField = document.getElementById('materiel');
        if (this.value === 'materielle') {
            materielField.style.display = 'block';
        } else {
            materielField.style.display = 'none';
        }
        const toxiciteField = document.getElementById('form-toxicity-container');
        if (this.value === 'chimique') {
            toxiciteField.style.display = 'block';
        } else {
            toxiciteField.style.display = 'none';
        }
    });

    document.getElementById('sidebarToggle').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        if (sidebar.classList.contains('w-20')) {
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-80');
        } else {
            sidebar.classList.remove('w-80');
            sidebar.classList.add('w-20');
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const openFormButton = document.getElementById('openFormButton');
        const popupForme = document.getElementById('popupForme');
        const overlaye = document.getElementById('overlaye');

        if (openFormButton && popupForme && overlaye) {
            openFormButton.addEventListener('click', function () {
                popupForme.style.display = 'block';
                overlaye.style.display = 'block';
            });
        } else {
            console.error('One or more elements are missing.');
        }
    });


    document.getElementById('closeFormButton').addEventListener('click', function () {
        document.getElementById('popupForme').style.display = 'none';
        document.getElementById('overlaye').style.display = 'none';
    });

    document.getElementById('overlaye').addEventListener('click', function () {
        document.getElementById('popupForme').style.display = 'none';
        document.getElementById('overlaye').style.display = 'none';
    });

    document.getElementById('toggleViewButton').addEventListener('click', function () {
        document.getElementById('cardes-view').classList.toggle('hidden');
        document.getElementById('liste-view').classList.toggle('hidden');
        document.getElementById('toggleViewIcone').classList.toggle('fa-list');
        document.getElementById('toggleViewIcone').classList.toggle('fa-th');
    });

</script>
<script>
    // partie cargaisons
    document.getElementById('toggleViewBtn').addEventListener('click', function () {
        var cardsView = document.getElementById('cargoList');
        var listView = document.getElementById('list-view');
        var icon = document.getElementById('toggleViewIcon');
        if (cardsView.classList.contains('hidden')) {
            cardsView.classList.remove('hidden');
            listView.classList.add('hidden');
            icon.classList.remove('fa-th');
            icon.classList.add('fa-list');
        } else {
            cardsView.classList.add('hidden');
            listView.classList.remove('hidden');
            icon.classList.remove('fa-list');
            icon.classList.add('fa-th');
        }
    });

    document.getElementById('choix').addEventListener('change', function () {
        const materielField = document.getElementById('poidMax');
        if (this.value === 'poids') {
            materielField.style.display = 'block';
        } else {
            materielField.style.display = 'none';
        }
        const toxiciteField = document.getElementById('nombreMax');
        if (this.value === 'nombre') {
            toxiciteField.style.display = 'block';
        } else {
            toxiciteField.style.display = 'none';
        }
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([5, -22.09], 3);
        var departureMarker;
        var arrivalMarker;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.on('click', function (e) {
            if (!departureMarker) {
                departureMarker = L.marker(e.latlng).addTo(map);
                getCountryName(e.latlng.lat, e.latlng.lng, function (countryName) {
                    document.getElementById('countryName').value = countryName;
                });
            } else if (!arrivalMarker) {
                arrivalMarker = L.marker(e.latlng).addTo(map);
                getCountryName(e.latlng.lat, e.latlng.lng, function (countryName) {
                    document.getElementById('arrivalCountry').value = countryName;
                });
                calculateDistance(departureMarker.getLatLng(), arrivalMarker.getLatLng());
                closeMapModal();
            }
        });

        function getCountryName(lat, lng, callback) {
            var url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var countryName = data.address.country || 'Inconnu';
                    callback(countryName);
                })
                .catch(error => {
                    callback('Inconnu');
                });
        }

        function calculateDistance(departureLatLng, arrivalLatLng) {
            var distance = departureLatLng.distanceTo(arrivalLatLng) / 1000;
            document.getElementById('distance').value = distance.toFixed(2) + ' km';
        }

        const departInput = document.getElementById('countryName');
        const arriveeInput = document.getElementById('arrivalCountry');
        const mapModal = document.getElementById('mapModal');

        departInput.addEventListener('click', function (e) {
            e.preventDefault();
            resetMarkers();
            mapModal.style.display = 'flex';
            setTimeout(() => {
                map.invalidateSize();
            }, 200);
        });

        arriveeInput.addEventListener('click', function (e) {
            e.preventDefault();
            resetMarkers();
            mapModal.style.display = 'flex';
            setTimeout(() => {
                map.invalidateSize();
            }, 200);
        });

        function resetMarkers() {
            if (departureMarker) {
                map.removeLayer(departureMarker);
                departureMarker = null;
            }
            if (arrivalMarker) {
                map.removeLayer(arrivalMarker);
                arrivalMarker = null;
            }
        }

        function closeMapModal() {
            mapModal.style.display = 'none';
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var mapAffiche = L.map('mapAffiche').setView([9, -22], 2);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapAffiche);
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const slides = document.querySelectorAll('.carousel-slide');
        let currenSlide = 0;

        if (slides.length > 0) {
            setInterval(() => {
                slides[currenSlide].classList.remove('active');
                slides[currenSlide].classList.add('left');

                currenSlide = (currenSlide + 1) % slides.length;

                slides[currenSlide].classList.remove('inactive', 'scale-left', 'scale-right');
                slides[currenSlide].classList.add('active');

                const previousSlide = (currenSlide === 0) ? slides.length - 1 : currenSlide - 1;
                slides[previousSlide].classList.add('inactive');

                const nextSlide = (currenSlide + 1) % slides.length;
                slides[nextSlide].classList.add('inactive');

                const scaleLeftSlide = (currenSlide === 0) ? slides.length - 1 : currenSlide - 1;
                if (slides[scaleLeftSlide]) {
                    slides[scaleLeftSlide].classList.add('scale-left');
                }

                const scaleRightSlide = (currenSlide + 1) % slides.length;
                slides[scaleRightSlide].classList.add('scale-right');
            }, 3000); // Change slide every 3 seconds
        }
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const slids = document.querySelectorAll('.carousele-slid');
        let currenSlid = 0;

        if (slids.length > 0) {
            setInterval(() => {
                slids[currenSlid].classList.remove('active');
                slids[currenSlid].classList.add('left');

                currenSlid = (currenSlid + 1) % slids.length;

                slids[currenSlid].classList.remove('inactive', 'scale-left', 'scale-right');
                slids[currenSlid].classList.add('active');

                const previousSlid = (currenSlid === 0) ? slids.length - 1 : currenSlid - 1;
                slids[previousSlid].classList.add('inactive');

                const nextSlid = (currenSlid + 1) % slids.length;
                slids[nextSlid].classList.add('inactive');

                const scaleLeftSlid = (currenSlid === 0) ? slids.length - 1 : currenSlid - 1;
                if (slids[scaleLeftSlid]) {
                    slids[scaleLeftSlid].classList.add('scale-left');
                }

                const scaleRightSlid = (currenSlid + 1) % slids.length;
                slids[scaleRightSlid].classList.add('scale-right');
            }, 3000); // Change slide every 3 seconds
        }
    });

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const prevButton = document.querySelector('[aria-label="Précédente"]');
        const nextButton = document.querySelector('[aria-label="Suivante"]');
        const pageInput = document.querySelector('[aria-label="Page actuelle 1"]');

        if (!prevButton || !nextButton || !pageInput) {
            console.error("One or more required elements are missing.");
            return;
        }

        // Initialiser la pagination
        paginate(1);

        // Gestionnaire d'événement pour le bouton précédent
        prevButton.addEventListener('click', function () {
            const currentPage = parseInt(pageInput.value);
            if (currentPage > 1) {
                paginate(currentPage - 1);
            }
        });

        // Gestionnaire d'événement pour le bouton suivant
        nextButton.addEventListener('click', function () {
            const currentPage = parseInt(pageInput.value);
            const totalPages = parseInt(pageInput.getAttribute('max'));
            if (currentPage < totalPages) {
                paginate(currentPage + 1);
            }
        });

        // Fonction de pagination
        function paginate(page) {
            const itemsPerPage = 10;
            const cargaisons = document.querySelectorAll('#cargaisonList tr');

            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            cargaisons.forEach((cargaison, index) => {
                if (index >= startIndex && index < endIndex) {
                    cargaison.style.display = 'table-row';
                } else {
                    cargaison.style.display = 'none';
                }
            });

            pageInput.value = page;

            // Mise à jour des boutons
            updateButtons(page, Math.ceil(cargaisons.length / itemsPerPage));
        }

        function updateButtons(currentPage, totalPages) {
            prevButton.disabled = currentPage <= 1;
            nextButton.disabled = currentPage >= totalPages;
            pageInput.setAttribute('max', totalPages);
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.card');
        let currentPage = 1;
        const itemsPerPage = 8;

        function showPage(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            cards.forEach((card, index) => {
                if (index >= startIndex && index < endIndex) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            currentPage = page;
            updateButtons();
        }

        function updateButtons() {
            document.querySelector('[onclick="prevSlide()"]').disabled = currentPage <= 1;
            document.querySelector('[onclick="nextSlide()"]').disabled = currentPage >= Math.ceil(cards.length / itemsPerPage);
        }

        window.prevSlide = function () {
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        };

        window.nextSlide = function () {
            if (currentPage < Math.ceil(cards.length / itemsPerPage)) {
                showPage(currentPage + 1);
            }
        };

        // Initialiser la première page
        showPage(1);
    });
</script>
</body>

</html>