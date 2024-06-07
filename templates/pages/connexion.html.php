<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">



        <form method="post" action="auth.php" class="space-y-6">
            <?php if (!empty($error_message)): ?>
                <div class="text-red-500 mb-4"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="text" id="email" name="email"
                    value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES) ?>" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                <?php if (!empty($error_email)): ?>
                    <div class="text-red-500 mb-4"><?php echo $error_email; ?></div>
                <?php endif; ?>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe:</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                <?php if (!empty($error_password)): ?>
                    <div class="text-red-500 mb-4"><?php echo $error_password; ?></div>
                <?php endif; ?>
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Connexion</button>
            </div>
        </form>

    </div>
</body>

</html>