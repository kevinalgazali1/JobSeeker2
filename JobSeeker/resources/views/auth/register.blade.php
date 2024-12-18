<x-guest-layout>

    <style>
        body {
            background: linear-gradient(125deg, #007BFF 0%, #00fff7 100%);
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Animasi background bergerak */
        @keyframes gradientAnimation {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }

        body {
            background-size: 200% 200%;
            animation: gradientAnimation 6s ease infinite;
        }

        /* Form Box */
        .register-box {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .register-box h2 {
            text-align: center;
            color: #007BFF;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            font-size: 1rem;
            color: #007BFF;
            margin-bottom: 5px;
        }

        .input-field {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        .input-field:focus {
            border-color: #007BFF;
            outline: none;
        }

        .register-button {
            width: 100%;
            padding: 14px;
            background-color: #007BFF;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #0056b3;
        }

        /* Animasi partikel bergerak */
        .particle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            animation: floatParticles 10s ease-in-out infinite;
        }

        /* Gerakan partikel */
        @keyframes floatParticles {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            50% {
                opacity: 1;
                transform: translateY(-50vh) rotate(360deg);
            }
            100% {
                transform: translateY(-100vh) rotate(720deg);
                opacity: 0;
            }
        }

        /* Partikel dengan ukuran dan posisi yang berbeda */
        .particle:nth-child(1) {
            width: 40px;
            height: 40px;
            left: 10%;
            animation-duration: 8s;
            animation-delay: 2s;
        }

        .particle:nth-child(2) {
            width: 50px;
            height: 50px;
            left: 40%;
            animation-duration: 12s;
            animation-delay: 4s;
        }

        .particle:nth-child(3) {
            width: 60px;
            height: 60px;
            left: 70%;
            animation-duration: 10s;
            animation-delay: 3s;
        }

        .particle:nth-child(4) {
            width: 30px;
            height: 30px;
            left: 30%;
            animation-duration: 15s;
            animation-delay: 1s;
        }

        .particle:nth-child(5) {
            width: 70px;
            height: 70px;
            left: 60%;
            animation-duration: 14s;
            animation-delay: 5s;
        }

    </style>

    <div class="container">
        <!-- Partikel -->
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>

        <div class="register-box">
            <h2>Register</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="input-group">
                    <x-input-label for="name" :value="__('Name')" class="input-label" />
                    <x-text-input id="name" class="input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Email')" class="input-label" />
                    <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="input-group">
                    <x-input-label for="password" :value="__('Password')" class="input-label" />
                    <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="input-group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="input-label" />
                    <x-text-input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Role Dropdown -->
                <div class="input-group">
                    <x-input-label for="role" :value="__('Role')" class="input-label" />
                    <select id="role" name="role" class="input-field">
                        <option value="" disabled selected>Role</option>
                        <option value="recruter" {{ old('role') == 'penyedia_lamaran' ? 'selected' : '' }}>
                            Penyedia Lamaran
                        </option>
                        <option value="seeker" {{ old('role') == 'pelamar' ? 'selected' : '' }}>
                            Pelamar
                        </option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="register-button">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
