<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserDataController extends Controller
{
    public function createAccount(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cnic' => 'required|string|unique:users_data,cnic|max:15',  // Change to 'users_data'
            'phoneNumber' => 'required|string|max:15',
            'password' => 'required|string|min:8|',  // Password confirmation should be sent as 'password_confirmation'
            'city' => 'required|string|max:255',
            'cultivated_area' => 'required|numeric|min:0',
            'grows' => 'required|array',  // Expecting an array for 'grows'
            'grows.*' => 'string|max:255',  // Each crop name should be a string
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Create a new user account in the users_data table
        $user = UserData::create([
            'name' => $request->name,
            'cnic' => $request->cnic,
            'phone_number' => $request->phoneNumber,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'cultivated_area' => $request->cultivated_area,
            'grows' => $request->grows,  // Save 'grows' as a JSON field
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User account created successfully!',
        ], 201);
    }
    public function getUserDetails($cnic)
    {
        // Find the user by CNIC
        $user = UserData::where('cnic', $cnic)->first();

        // Check if user exists
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        // Return user details
        return response()->json([
            'success' => true,
            'user' => $user,
        ], 200);
    }
    public function editProfile(Request $request, $cnic)
    {
        $user = UserData::where('cnic', $cnic)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        // Directly update fields if they are present in the request
        if ($request->has('name')) $user->name = $request->name;
        if ($request->has('phoneNumber')) $user->phone_number = $request->phoneNumber;
        if ($request->has('password')) $user->password = Hash::make($request->password);
        if ($request->has('city')) $user->city = $request->city;
        if ($request->has('cultivated_area')) $user->cultivated_area = $request->cultivated_area;
        if ($request->has('grows')) {
            // Decode if grows is JSON-encoded
            $grows = is_string($request->grows) ? json_decode($request->grows, true) : $request->grows;
            $user->grows = $grows;
        }

        // Handle profile photo upload if present
        if ($request->hasFile('profile_photo_path')) {
            if ($request->file('profile_photo_path')->isValid()) {
                if ($user->profile_photo_path) {
                    // Delete the old file from storage
                    Storage::delete($user->profile_photo_path);
                }

                // Store the new photo in 'profile_photos' directory
                $path = $request->file('profile_photo_path')->store('profile_photos');

                // Update the user with the new photo path
                $user->profile_photo_path = 'storage/'.$path;
            }
        }

        // Save the updated user data
        $user->save();

        // Return the updated user profile
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => $user,
        ], 200);
    }
    public function deleteAccount(Request $request, $cnic)
    {
        // Find the user by CNIC
        $user = UserData::where('cnic', $cnic)->first();

        // Check if user exists
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        // Optionally, delete the profile photo from storage if it exists
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }

        // Delete the user from the database
        $user->delete();

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Account deleted successfully',
        ], 200);
    }
}
