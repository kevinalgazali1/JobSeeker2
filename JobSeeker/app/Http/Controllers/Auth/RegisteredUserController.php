<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the registration form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:admin,recruter,seeker'], // Validate the role
        ]);

        // Create the user with the selected role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Save the selected role
        ]);

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to the appropriate dashboard based on the role
        if ($user->role == 'admin') {
            return redirect()->route('homeAdmin'); // Redirect to the admin dashboard
        } elseif ($user->role == 'recruter') {
            return redirect()->route('homeRecruter'); // Redirect to the recruiter dashboard
        } elseif ($user->role == 'seeker') {
            return redirect()->route('homeSeeker'); // Redirect to the seeker dashboard
        }

        // Default redirect to the dashboard if no role matches
        return redirect()->route('/');
    }
}
