<x-app-layout>
  <div class="flex justify-center items-center bg-gray-100">
      <div class="max-w-lg w-full bg-white rounded-lg shadow-lg text-center p-8">
          <h1 class="text-6xl font-bold text-red-600 mb-4">403</h1>
          <p class="text-xl text-gray-700 mb-6">Forbidden</p>
          <p class="text-gray-500 mb-8">You do not have permission to access this page.</p>

          <div class="mt-4">
              <a href="{{ route('note.index') }}" class="inline-block px-6 py-3 bg-blue-500  font-semibold rounded-lg shadow-md hover:bg-blue-600">
                  Go to Homepage
              </a>
          </div>
      </div>
  </div>
</x-app-layout>
