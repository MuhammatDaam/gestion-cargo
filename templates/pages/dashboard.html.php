<nav class="bg-blue-500 p-4 shadow-md w-full">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex justify-evenly items-center gap-4">
            <h1 class="text-3xl font-semibold">Dashboard</h1>
        </div>
        <div class="flex items-center gap-4">
            <input type="text" placeholder="Search..." class="py-2 px-4 rounded-lg border border-gray-300">
            <img src="https://via.placeholder.com/40" alt="User" class="rounded-full">
        </div>
    </div>
</nav>
<div class="h-full w-full overflow-hidden hide-scrollbar" style="padding: 1%;">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="text-gray-600">Total Transaction</p>
                    <h2 class="text-2xl font-bold">$54,143</h2>
                </div>
                <div class="text-green-500">
                    <i class="fas fa-arrow-up"></i> 47%
                </div>
            </div>
            <p class="text-gray-400 text-sm">Sales earnings this month after expenses & before taxes.</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="text-gray-600">Visitors</p>
                    <h2 class="text-2xl font-bold">214</h2>
                </div>
                <div class="text-green-500">
                    <i class="fas fa-arrow-up"></i> 49%
                </div>
            </div>
            <p class="text-gray-400 text-sm">Page views per session.</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="text-gray-600">Active Users</p>
                    <h2 class="text-2xl font-bold">2,501</h2>
                </div>
                <div class="text-green-500">
                    <i class="fas fa-arrow-up"></i> 52%
                </div>
            </div>
            <p class="text-gray-400 text-sm">Real-time active users.</p>
        </div>
    </div>

    <!-- Map and Best Sellers -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-4">Official Store</h3>
            <div class="w-full h-64">
                <div id="mapAffiche" class="w-full h-full object-cover rounded-lg"></div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-4">Weekly Best Sellers</h3>
            <ul>
                <li class="flex justify-between items-center mb-4">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/40" alt="Product" class="rounded-full mr-4">
                        <div>
                            <p class="font-semibold">Angelina Jolie</p>
                            <p class="text-gray-400 text-sm">25 October 2020</p>
                        </div>
                    </div>
                    <span class="text-green-500 font-semibold">137 Sales</span>
                </li>
                <li class="flex justify-between items-center mb-4">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/40" alt="Product" class="rounded-full mr-4">
                        <div>
                            <p class="font-semibold">John Travolta</p>
                            <p class="text-gray-400 text-sm">12 April 2020</p>
                        </div>
                    </div>
                    <span class="text-green-500 font-semibold">293 Sales</span>
                </li>
            </ul>
            <a href="#" class="text-blue-500">View More</a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-4">Important Notes</h3>
            <div class="p-4 bg-gray-100 rounded-lg">
                <p class="text-gray-600">Lorem Ipsum is simply dummy text.</p>
                <p class="text-gray-400 text-sm mt-2">20 Hours ago</p>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-4">Schedules</h3>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-gray-600">UI/UX Workshop</p>
                    <p class="text-gray-400 text-sm">23th</p>
                </div>
                <div>
                    <button class="text-blue-500">View</button>
                </div>
            </div>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-gray-600">VueJS Frontend Development</p>
                    <p class="text-gray-400 text-sm">10th</p>
                </div>
                <div>
                    <button class="text-blue-500">View</button>
                </div>
            </div>
        </div>
    </div>
</div>