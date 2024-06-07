<div
    class="flex justify-between items-center w-full bg-blue-300 h-14 pl-5 pr-5 pb-2 -translate-y-12 rounded-b-xl hover:translate-y-0 transition-transform duration-200 ease-out cursor-pointer">
    <div class="flex items-center justify-between w-full">
        <div class="flex gap-4">
            <select name="type" id="type" class="bg-green-500 text-white rounded-md px-4 py-2 font-bold text-xl">
                <option value="vip">VIP</option>
                <option value="pro">PRO</option>
                <option value="simple">SIMPLE</option>
            </select>
            <button class="px-4 py-2 bg-green-500 text-white rounded-md font-bold text-xl">raflaichir</button>
        </div>
    </div>
    <div class="relative">
        <input type="text" placeholder="Trouver un clientelle"
            class="pl-10 pr-4 py-2 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500">
        <i
            class="fa-solid fa-magnifying-glass absolute top-1/2 transform -translate-y-1/2 left-3 text-gray-500 hidden lg:block"></i>
    </div>
</div>
<div id="produits-title-container" class="flex items-center w-full pl-4">
    <span id="produits-title" class="text-3xl font-bold text-blue-700">cients</span>
</div>
<div id="list-client" class="m-10 overflow-hidden hide-scrollbar">
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-white hover:bg-gray-100 transition duration-300 ease-in-out">
                <th class="border px-4 py-2 text-blue-600 font-bold">Titre</th>
                <th class="border px-4 py-2 text-blue-600 font-bold">Catégorie</th>
                <th class="border px-4 py-2 text-blue-600 font-bold">Validité</th>
                <th class="border px-4 py-2 text-blue-600 font-bold">Prix Original</th>
                <th class="border px-4 py-2 text-blue-600 font-bold">Prix Total</th>
                <th class="border px-4 py-2 text-blue-600 font-bold">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white hover:bg-gray-100 transition duration-300 ease-in-out">
                <td class="border px-4 py-2 text-blue-600 font-bold">Produits Aérienne</td>
                <td class="border px-4 py-2 text-blue-600 font-bold">Aérien</td>
                <td class="border px-4 py-2 text-blue-600 font-bold">30 jours</td>
                <td class="border px-4 py-2 text-blue-600 font-bold">50.000 F CFA</td>
                <td class="border px-4 py-2 text-blue-600 font-bold">40.000 F CFA</td>
                <td class="border px-4 py-2 text-blue-600 font-bold">
                    <button class="px-6 py-2 bg-blue-500 text-white rounded-md">Appliquer</button>
                </td>
            </tr>
            <!-- Ajoutez plus de lignes pour d'autres produits si nécessaire -->
        </tbody>
    </table>
    <div class="w-full p-3 mt-2 bg-blue-400 rounded-b-lg shadow-md">
        <div class="flex items-center justify-between text-gray-700">
            <div data-qa="PagerInfo" class="text-sm bg-black text-white pl-4">1-60 de 133 208</div>
            <div data-qa="Pager" class="flex items-center space-x-2">
                <!-- Previous Button -->
                <button
                    class="p-2 rounded-full bg-white text-black hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                    aria-disabled="true" aria-label="Précédente" role="link" data-qa="VButton">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.707a1 1 0 00-1.414-1.414l1.414 1.414zM4 8l-.707-.707a1 1 0 000 1.414L4 8zm5.293 6.707a1 1 0 001.414-1.414l-1.414 1.414zm0-13.414l-6 6 1.414 1.414 6-6-1.414-1.414zm-6 7.414l6 6 1.414-1.414-6-6-1.414 1.414z"
                            fill="#3C3C3C"></path>
                    </svg>
                </button>
                <!-- Page Input -->
                <input
                    class="w-12 p-2 border border-blue-300 rounded text-center focus:outline-none focus:ring-2 focus:ring-blue-800"
                    aria-label="Page actuelle 1" type="number" min="1" value="1">
                <!-- Next Button -->
                <a class="p-2 rounded-full bg-white text-black hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                    aria-label="Suivante" aria-disabled="false"
                    href="/fr/videos/%D0%BA%D0%BE%D0%BD%D1%82%D0%B5%D0%B9%D0%BD%D0%B5%D1%80.html?offset=60"
                    data-qa="VLink">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.293 13.293a1 1 0 101.414 1.414l-1.414-1.414zM12 8l.707.707a1 1 0 000-1.414L12 8zM6.707 1.293a1 1 0 00-1.414 1.414l1.414-1.414zm0 13.414l6-6-1.414-1.414-6 6 1.414 1.414zm6-7.414l-6-6-1.414 1.414 6 6 1.414-1.414z"
                            fill="#3C3C3C"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>