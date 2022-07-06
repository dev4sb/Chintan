<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Users;

class myCntroller extends Controller
{
    // insert data
    public function myFunction(Request $request){
        $save = new Users;
        if($request->hasFile('profilepic')){
            $file = $request->file("profilepic");
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images', $filename);
            $save->profilePic = $filename;
        }else{
            echo "nofile";
        }
        
        $save->firstName = $request->fname;
        $save->lastName = $request->lname;
        $save->email = $request->email;
        $save->gender = $request->gender;
        $save->course = $request->course;
        $save->description = $request->description;
        $hob = implode(',', $request->hobbies);
        $save->hobbies = $hob;
        $save->password = $request->password;
        $save->save();
        echo json_encode($save);
    }

    // show data
    public function getData(Request $request){
        $data = Users::all();
        return json_encode($data);
    }

    // delete data
    public function delete (Request $request){
        $id =  $request->id;
        $deletedata = Users::find($id);
        $deletedata->delete();
    }

    // edit data
    public function edit(Request $request){
        $id = $request->editi;
        $findata = Users::find($id);
        echo json_encode($findata);
    }

    // update data
    public function update(Request $request){
        $udata = Users::find($request->nid);
        
        if($request->hasFile('profilepic')){
            $file = $request->file("profilepic");
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images', $filename);
            $udata->profilePic = $filename;
        }else{
            $udata->profilePic = $request->oldimgtxt;
        }
        $udata->firstName = $request->fname;
        $udata->lastName = $request->lname;
        $udata->email = $request->email;
        $udata->gender = $request->gender;
        $udata->course = $request->course;
        $udata->description = $request->description;
        $hob = implode(',', $request->hobbies);
        $udata->hobbies = $hob;
        $udata->save();
        echo json_encode($udata);
    }

    // Search data
    public function search(Request $request){
        $sdata =  $request->searchnm;
        $search = User::query()->where('firstName', $sdata)->orWhere('lastName', $sdata)->orWhere('email', $sdata)->orWhere('gender', $sdata)->orWhere('course', $sdata)->get();
        echo json_encode($search);

    }

}
