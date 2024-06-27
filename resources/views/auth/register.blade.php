<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full form-select" onchange="showFields()">
                <option value="admin">Admin</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Additional Fields for Dosen and Mahasiswa -->
        <div class="mt-4" id="additional-fields">
            <!-- Fakultas -->
            <div class="mt-4" id="fakultas-field" style="display: none;">
                <x-input-label for="fakultas" :value="__('Fakultas')" />
                <x-text-input id="fakultas" class="block mt-1 w-full" type="text" name="fakultas" :value="old('fakultas')" />
                <x-input-error :messages="$errors->get('fakultas')" class="mt-2" />
            </div>

            <!-- NIM for Mahasiswa -->
            <div class="mt-4" id="nim-field" style="display: none;">
                <x-input-label for="nim" :value="__('NIM')" />
                <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" />
                <x-input-error :messages="$errors->get('nim')" class="mt-2" />
            </div>

            <!-- Jurusan for Mahasiswa -->
            <div class="mt-4" id="jurusan-field" style="display: none;">
                <x-input-label for="jurusan" :value="__('Jurusan')" />
                <x-text-input id="jurusan" class="block mt-1 w-full" type="text" name="jurusan" :value="old('jurusan')" />
                <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function showFields() {
            var role = document.getElementById('role').value;
            var fakultasField = document.getElementById('fakultas-field');
            var nimField = document.getElementById('nim-field');
            var jurusanField = document.getElementById('jurusan-field');

            fakultasField.style.display = 'none';
            nimField.style.display = 'none';
            jurusanField.style.display = 'none';

            if (role === 'dosen') {
                fakultasField.style.display = 'block';
            } else if (role === 'mahasiswa') {
                fakultasField.style.display = 'block';
                nimField.style.display = 'block';
                jurusanField.style.display = 'block';
            }
        }
    </script>
</x-guest-layout>
