
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
  @vite('resources/css/app.css')
</head>
<body>
<form method="POST" action="{{ route('admin.login.submit') }}">
  @csrf

  <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
      <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
      <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

        <div class="max-w-md mx-auto">
          <div>
            <h1 class="text-2xl font-semibold">Login</h1>
          </div>

          @if ($errors->any())
            <div class="mt-4 p-3 rounded bg-red-50 text-red-700 text-sm">
              {{ $errors->first() }}
            </div>
          @endif

          <div class="divide-y divide-gray-200">
            <div class="py-8 text-base leading-6 space-y-6 text-gray-700 sm:text-lg sm:leading-7">
              <div class="relative">
                <input autocomplete="email" id="email" name="email" type="email"
                       value="{{ old('email') }}"
                       class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none"
                       placeholder="Email address" required />
                <label for="email"
                       class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base
                              peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all
                              peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                  Email Address
                </label>
              </div>

              <div class="relative">
                <input autocomplete="current-password" id="password" name="password" type="password"
                       class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none"
                       placeholder="Password" required />
                <label for="password"
                       class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base
                              peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all
                              peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                  Password
                </label>
              </div>

              <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" class="h-4 w-4 border-gray-300 rounded">
                Se souvenir de moi
              </label>

              <div class="relative">
                <button class="bg-cyan-500 hover:bg-cyan-600 text-white rounded-md px-4 py-2 w-full">
                  Se connecter
                </button>
              </div>
            </div>
          </div>
        </div>

        {{-- Optionnel: bouton Google (à brancher plus tard) --}}
        <div class="w-full flex justify-center">
          <button type="button"
                  class="flex items-center bg-white border border-gray-300 rounded-lg shadow-md px-6 py-2 text-sm font-medium text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            {{-- ... ton SVG Google ... --}}
            <span>Continuer avec Google</span>
          </button>
        </div>

      </div>
    </div>
  </div>
</form>
</body>
</html>
