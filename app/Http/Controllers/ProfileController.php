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

        $student= Student::with(['subjects' => function($query) {
            $query->wherePivot('status', '1');
        }])->find($studentId);

        $hours = $student->subjects->sum('hours');

        $student->passed_credits = $hours;
        $student->save();

        $student = Student::with(['subjects' => function($query) {
            $query->wherePivotIn('status', ['1', '0']); 
        }])->find($studentId);
        
        $totalHours = $student->subjects->sum('hours');

        $totalPoints = $student->subjects->sum(function($subject) {
            return $subject->hours * $this->getPoints($subject->pivot->mark);
        });

        if ($totalHours > 0) {
            $gpa = $totalPoints / $totalHours;
        } else {
            $gpa = 0;
        }

        $student->agpa = $gpa; 
        $student->save();

        if (!$semesterSubjects || $semesterSubjects->subjects->isEmpty()) {
            return view('profile', [
                'user' => $request->user(),
                'semesterSubjects' => collect(),
            ]);
        }
    
        return view('profile', [
            'user' => $request->user(),
            'semesterSubjects' => $semesterSubjects->subjects,
        ]);
    }

    private function getPoints($grade)
    {
        if ($grade >= 98) {
            return 4.0;
        } elseif ($grade >= 95) {
            return 3.75;
        } elseif ($grade >= 90) {
            return 3.5;
        } elseif ($grade >= 85) {
            return 3.25;
        } elseif ($grade >= 80) {
            return 3.0;
        } elseif ($grade >= 75) {
            return 2.75;
        } elseif ($grade >= 70) {
            return 2.5;
        } elseif ($grade >= 65) {
            return 2.25;
        } elseif ($grade >= 60) {
            return 2.0;
        } elseif ($grade >= 55) {
            return 1.75;
        } elseif ($grade >= 50) {
            return 1.5;
        } else {
            return 0.0;
        }
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
