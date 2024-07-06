<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $studentId = Auth::guard('student')->id();
        $semesterSubjects = Student::with(['subjects' => function($query) {
            $query->wherePivot('status', '2');
        }])->find($studentId);
      
        if (!$semesterSubjects || $semesterSubjects->subjects->isEmpty()) {
            return view('profile', [
                'user' => $request->user(),
                'semesterSubjects' => collect(), // إرجاع مجموعة فارغة
            ]);
        }
    
        return view('profile', [
            'user' => $request->user(),
            'semesterSubjects' => $semesterSubjects->subjects,
        ]);
    }


    public function editProfile(Request $request): View
    {
        $studentId = Auth::guard('student')->id();
        $student = Student::find($studentId);

        return view('profile_edit', [
            'student' => $student,
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        $user = $request->user();

        if ($user->email !== $data['email']) {
            $existingUser = Student::where('email', $data['email'])->first();

            if ($existingUser) {
                return Redirect::route('student.profile.edit')
                ->withErrors(['email' => 'Email has already been taken.'])
                ->with('error', 'Email has already been taken.')
                ->withInput();
            }

            $user->email_verified_at = null;
        }

        $user->fill($data);

        $user->save();

        return Redirect::route('student.profile.edit')
        ->with('status', 'profile-updated')
        ->with('success', 'The profile has been updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
