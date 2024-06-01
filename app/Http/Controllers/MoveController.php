<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PHPUnit\Framework\Constraint\IsEmpty;

class MoveController extends Controller
{
    public function home(){
        return view("index");
    }

    public function edu(){

        if(Auth::guard('student')->check()){
            $student = Auth::guard('student')->user();
            $studentId = auth('student')->id();

            $student = Student::find($studentId);
            $studentSubjects = $student->subjects()->wherePivot('status', '2')->get();
            $allReferences = Subject::with('references')->get();

            if($studentSubjects->isNotEmpty()) {
                $studentSubjects = $student->subjects()->wherePivot('status', '2')->get();

                $studentReferences = collect();
                foreach ($studentSubjects as $subject) {
                    $studentReferences = $studentReferences->merge($subject->references);
                }
    
                return view('edu', [
                    'studentReferences' => $studentReferences,
                    'allReferences' => $allReferences,
                    'studentSubjects' => $studentSubjects,
                ]);
            }
            else {
                return view('edu', [
                    'allReferences' => $allReferences,
                    'studentSubjects' => $studentSubjects,
                ]);
            }
        }
        else {
            
            $allReferences = Subject::with('references')->get();

            return view('edu', [
                'allReferences' => $allReferences,
            ]);
        }

    }

    public function about(){
        return view("about");
    }

    public function team(){
        return view("team");
    }

    public function testimonial(){
        return view("testimonial");
    }

    public function contact(){
        return view("contact");
    }

    public function e404(){
        return view("404");
    }

    public function courses(){
        return view("courses");
    }

    public function plan(){

        if(Auth::guard('student')->check()){

            $studentId = auth('student')->id();
            $subjects = Subject::with('prerequisites')
            ->orderBy('term', 'asc')
            ->get();

            $firstTermSubjects = Subject::with('prerequisites')
            ->where('term', 'CH-I')->get();

            $secondTermSubjects = Subject::with('prerequisites')
            ->where('term', 'CH-II')->get();

            // foreach($subjects as $subject){
            //     foreach($subject->prerequisites as $prerequisites) {
            //         echo $prerequisites->pivot->subject_id;
            //     }
            // }

            $student = Student::with(['subjects', 'subjects.prerequisites'])->find($studentId);
            // $numberOfSubject=($subjects->count())+1;
            //$allSubjectStatus = array_fill(0,$numberOfSubject,3); 
            $studentSubjectStatus = array(); 
            $completedSubjects = array();
            $totalHours=0;

            if ($student && $student->subjects) {

                foreach ($student->subjects as $subject) {
                    
                    $subjectStatus=$subject->pivot->status;
                    $subject_id=$subject->pivot->subject_id;

                    if(!isset($studentSubjectStatus[$subject_id]) || $studentSubjectStatus[$subject_id] == '1') {
                        $completedSubjects [$subject_id] ='1';
                    }

                    if(!isset($studentSubjectStatus[$subject_id]) || $studentSubjectStatus[$subject_id] != '1') {
                        $studentSubjectStatus[$subject->pivot->subject_id]=$subjectStatus;
                        //echo $subject->pivot->subject_id ." ".$subjectStatus;
                    }
                }
            }

            if(in_array('2',$studentSubjectStatus)) {
                $student = Student::find($studentId);

                $studentSubjects = $student->subjects()->wherePivot('status', '2')->get();

                foreach($studentSubjects as $subject) {
                    $totalHours+=$subject->hours;
                }

                return view('plan' , [
                    'subjects' => $subjects,
                    'studentSubjectStatus' => $studentSubjectStatus,
                    'studentSubjects' => $studentSubjects,
                    'totalHours' => $totalHours,
                ]);

            }
            else {
                // foreach ($subjects as $subject) {
                //     echo $allSubjectStatus[$subject->id];
                // }
                //return $studentSubject;
                return view('plan' , [
                    'subjects' => $subjects,
                    'studentSubjectStatus' => $studentSubjectStatus,
                    'completedSubjects' => $completedSubjects,
                    'firstTermSubjects' => $firstTermSubjects,
                    'secondTermSubjects' => $secondTermSubjects,

                ]);
            }
        }
        else {
            return redirect('login');
        }
    }

    public function saveSubjects(Request $request){

        $selectedSubjects = $request->input('subjects', []);
        $studentId = auth('student')->id();

        if (empty($selectedSubjects)) {
            return redirect()->back()->with('error', 'No subjects selected.');
        }

        // الحصول على الطالب
        $student = Student::find($studentId);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        // حفظ المواد في جدول البيفوت
        $student->subjects()->sync($selectedSubjects);

        //return redirect()->route('success.page')->with('success', 'Subjects saved successfully.');
    }

    public function studentinformation(){
        return view("s");
    }

    public function quiz(){

        if(Auth::guard('student')->check()){

            $studentId = Auth::guard('student')->id();        
            
            // Get the student with subjects and quizzes where pivot status is 2
            $student = Student::with(['subjects' => function($query) {
                $query->wherePivot('status', '2');
            }, 'subjects.quizzes'])->find($studentId);

            $subjects = $student->subjects;

            return view('quiz', compact('subjects'));
        }
        else {
            return redirect('login');
        }
    }

    public function homework()
    {
        return view('homework');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return("ali");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
