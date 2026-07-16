<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addSub;

class AddSubController extends Controller
{
    public function showform()
    {
        return view('Subject');
    }

    public function add(Request $request)
    {
        addSub::create([
            "sub_name" => $request->sub_name,
            "date" => $request->date,
        ]);

        return redirect("/");
    }
    public function manage()
    {
        $subjects = addSub::all();
    
        return view('manageSubjects', compact('subjects'));
    }
    public function edit($id)
    {
        $subject = addSub::findOrFail($id);
    
        return view('editSubject', compact('subject'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_name' => 'required'
        ]);
    
        $subject = addSub::findOrFail($id);
    
        $subject->sub_name = $request->sub_name;
    
        $subject->save();
    
        return redirect('/ManageSubjects')
                ->with('success', 'Subject Updated Successfully!');
    }
    public function delete($id){
        $subject=addSub::findOrFail($id);
        $subject->delete();

        return redirect('/ManageSubjects')
        ->with('success','SUbject Deleted Successfully!');

    }
    
}

