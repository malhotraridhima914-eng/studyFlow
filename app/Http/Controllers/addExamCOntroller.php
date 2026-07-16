<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addExam;
use App\Models\addSub;

class addExamCOntroller extends Controller
{
    public function showform()
    {
        
        $subjects = addSub::all();
        return view('exam', compact('subjects'));
    }

    public function add(Request $request)
    {
        addExam::create([
            "exam_name" => $request->exam_name,
            "subject"=>$request->subject,
            "date" => $request->date,
            "time"=>$request->time,
            "type"=>$request->type,
        ]);

        return redirect("/");
    }
    public function manage()
    {
        $exam = addExam::all();
    
        return view('manageExam', compact('exam'));
    }
    public function edit($id)
    {
        $exam = addExam::findOrFail($id);
    
        return view('editExam', compact('exam'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'exam_name' => 'required',
            'date'=>'required'
        ]);
    
        $exam = addExam::findOrFail($id);
    
        $exam->exam_name = $request->exam_name;
        $exam->date=$request->date;
    
        $exam->save();
    
        return redirect('/ManageExams')
                ->with('success', 'Subject Updated Successfully!');
    }
    public function delete($id){
        $exam=addExam::findOrFail($id);
        $exam->delete();

        return redirect('/ManageExams')
        ->with('success','Exam deleted Successfully!');
    }
}
