<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        .transition-all {
            transition: all 0.2s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
        
        /* Minimal icon style */
        .icon-minimal {
            stroke-width: 1.5;
            stroke: currentColor;
            fill: none;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-2">
                <svg class="w-8 h-8" viewBox="0 0 24 24" class="icon-minimal">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                    <path d="M8 7h6"></path>
                    <path d="M8 11h8"></path>
                    <path d="M8 15h5"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-medium">Welcome back</h1>
            <p class="text-gray-500 text-sm mt-1">Sign in to your account</p>
        </div>
        
        <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100">
            <form>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200" placeholder="you@example.com" required>
                </div>
                
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="#" class="text-xs text-gray-600 hover:text-black">Forgot password?</a>
                    </div>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 text-sm border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-200" placeholder="••••••••" required>
                </div>
                
                <div class="mb-6 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-black focus:ring-0 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>
                
                <button type="submit" class="w-full px-4 py-2 bg-black text-white text-sm rounded-md hover:bg-gray-800 transition-all">
                    Sign In
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Don't have an account? <a href="register.html" class="text-black hover:underline">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>