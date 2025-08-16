<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Capture Media - Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('IMG_0016.JPG') }}">
  @vite('resources/css/app.css')
</head>
<body>
<form method="POST" action="{{ route('admin.login.submit') }}">
  @csrf

  <div class="min-h-screen bg-gradient-to-br from-yellow-100 to-yellow-200 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
      <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-amber-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
      <div class="relative px-4 py-10 bg-white shadow-xl sm:rounded-3xl sm:p-20">

        <div class="max-w-md mx-auto">
          <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Connexion Admin</h1>
            <p class="text-gray-600">Accédez à l'espace d'administration</p>
          </div>

          @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                {{ $errors->first() }}
              </div>
            </div>
          @endif

          <div class="space-y-6">
            <!-- Email Field -->
            <div class="relative">
              <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Adresse Email
              </label>
              <input
                autocomplete="email"
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                class="w-full px-4 py-3 rounded-xl border border-gray-200 shadow-md bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300 hover:shadow-lg"
                placeholder="votre@email.com"
                required
              />
            </div>

            <!-- Password Field -->
            <div class="relative">
              <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                Mot de passe
              </label>
              <div class="relative">
                <input
                  autocomplete="current-password"
                  id="password"
                  name="password"
                  type="password"
                  class="w-full px-4 py-3 pr-12 rounded-xl border border-gray-200 shadow-md bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all duration-300 hover:shadow-lg"
                  placeholder="••••••••"
                  required
                />
                <button
                  type="button"
                  class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-500 transition-colors duration-200"
                  onclick="togglePassword()"
                  id="toggleBtn"
                >
                  <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                  <svg id="eyeOffIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                  </svg>
                </button>
              </div>
            </div>

            <!-- Remember Me -->
            <label class="flex items-center gap-3 text-sm cursor-pointer">
              <input
                type="checkbox"
                name="remember"
                class="h-4 w-4 text-yellow-400 border-gray-300 rounded focus:ring-yellow-400 focus:ring-2"
              >
              <span class="text-gray-700 select-none">Se souvenir de moi</span>
            </label>

            <!-- Login Button -->
            <div class="relative">
              <button class="w-full bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-yellow-500 hover:to-amber-600 text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                <span class="flex items-center justify-center">
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                  </svg>
                  Se connecter
                </span>
              </button>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      const eyeOffIcon = document.getElementById('eyeOffIcon');

      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.add('hidden');
        eyeOffIcon.classList.remove('hidden');
      } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('hidden');
        eyeOffIcon.classList.add('hidden');
      }
    }
  </script>
</form>
</body>
</html>
