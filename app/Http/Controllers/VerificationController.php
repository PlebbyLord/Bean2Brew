<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verify;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VerificationController extends Controller
{
    /**
     * Show verification popup
     */
    public function showVerificationPopup(): View
    {
        return view('verification.popup');
    }

    public function sendVerificationRequest(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'mobile_number' => 'required',
            'image1' => 'required|image',
            'image2' => 'required|image',
            'image3' => 'required|image',
            'image4' => 'required|image',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Ensure the user is an instance of the User model
        if ($user instanceof \App\Models\User) {
            // Save verification details to the database
            $verification = Verify::create([
                'user_id' => $user->id,
                'company_name' => $request->input('company_name'),
                'address' => $request->input('address'),
                'mobile_number' => $request->input('mobile_number'),
                // ... other fields as needed
            ]);

            // Save images to storage or cloud and associate with the verification record
            foreach (['image1', 'image2', 'image3', 'image4'] as $key) {
                $path = $request->file($key)->store('verification_images', 'public');
                $verification->images()->create(['path' => $path]);
            }

            // Check if the user is verified
            if ($user->verification_status) {
                // Redirect to the home page for verified users
                return redirect('/home')->with('verification_message', 'Verification request sent. Waiting for admin approval.');
            } else {
                // Redirect to the verification success page for unverified users
                return redirect()->route('verification-request-success')->with('verification_message', 'Verification request sent. Waiting for admin approval.');
            }
        } else {
            // Handle the case where auth()->user() doesn't return a User model
            return redirect('/home')->with('error', 'Unable to process verification request.');
        }
    }

    public function verificationRequestSuccess(): View
{
    return view('verification.success');
}
}
