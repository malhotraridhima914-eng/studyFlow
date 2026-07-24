<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addSub;
use Illuminate\Support\Facades\auth;

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
            "user_id"=>auth::id(),
        ]);

        return redirect("/");
    }
    public function manage()
    {
        $subjects = addSub::where('user_id',auth::id())->get();
    
        return view('manageSubjects', compact('subjects'));
    }
    public function edit($id)
    {
        $subject = addSub::where('user_id',auth::id())->findOrFail($id);
    
        return view('editSubject', compact('subject'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_name' => 'required'
        ]);
    
        $subject = addSub::where('user_id',auth::id())->findOrFail($id);
    
        $subject->sub_name = $request->sub_name;
    
        $subject->save();
    
        return redirect('/ManageSubjects')
                ->with('success', 'Subject Updated Successfully!');
    }
    public function delete($id){
        $subject=addSub::where('user_id',auth::id())->findOrFail($id);
        $subject->delete();

        return redirect('/ManageSubjects')
        ->with('success','SUbject Deleted Successfully!');

    }
    
}

