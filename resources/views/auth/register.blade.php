<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                <h3>SR <span>PS</span></h3>

            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" style="color: blue" />

                <x-input  class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>
            <div class="mt-4">
                <x-label for="address" value="{{ __('Address:') }}" />
                <x-input type="text" class="block mt-1 w-full" id="add" name="add" placeholder="Enter Your Address"
                    required="" maxlength="40" />
            </div>
            <x-label for="phone" value="{{ __('Contact:') }}" />
            <x-input type="text" max="10" class="blocl mt-1 w-full" id="phone" name="phone" required=""
                placeholder="10 digit Contact Number" maxlength="10" pattern="[0-9]+" />

            <div class="mt-4">
                <x-label for="gender" value="{{ __('Gender:') }}" />
                <select name="gender" id="gender"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option selected="" value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Other</option>
                </select>
            </div>
            <div class="mt-4">
                <x-label for="photo" value="{{ __('Image:') }}" />
                <x-input type="file" class="block mt-1 w-full" id="photo" name="photo" accept=".png , .jpeg , .jpg"
                    required="" />
            </div>
            <!-- Select dropdown option for Role-->
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="parents">Parents</option>
                    <option value="students">Students</option>
                        <option value="teachers">Teachers</option>
                           <option value="admin">Admin</option>

                </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
