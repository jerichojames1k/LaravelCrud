<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Information;
use DB;
class crudController extends Controller
{  
    private $variable;
    public function __construct(){
        $this->variable;
    }
    //This will redirect to the crudtable.blade.php
    public function tableshow(){
        $studentList=Information::all();
        return view('crudtable',['students'=>$studentList]);  
    }
  
   //GETTING DATA BY ID IN THE TABLE
    public function GetById($id) {
       // $users = DB::select('select * from crudtable where id = ?',[$id]);
       //return view('ViewById',['user'=>$users]);
       // $this->table($variable);
       $users = DB::select('select * from crudtable where id = ?',[$id]);
       //$studentList=Information::all();
       return view('crudtable',['students'=>$users]);

        }

 public function third($id){
            //$calculation = 1 + 1;
            $this->variable =$id;
     }

    //Updating Data ById in a table
    public function updated(Request $request,$id){
        try{
            $user =Information::find($id);
            $user->update([
                'fname' => $request['fname'],
                'lname' =>$request['lname'],
                'age'=>intval($request['age']),
                'address'=> $request['address']
             ]);        
            $user->save();         
            //return redirect('retrieveData')->with('message','Subscription Successfully Deleted');
            return redirect('dashboard')->with('message','Subscription Successfully Deleted');          
        }
        catch (Throwable $e) {
            report($e);
            return false;
        }

    }

    //Retrieving of all the data
    public function retrieved(){
        try{           
            $studentList=Information::all();
            return view('RetriveData',['students'=>$studentList]); 
        }
        catch (Throwable $e) {
            report($e);
            return false;
        }
      
    }

    //Deleting data
    public function deleted($id)
    {
        try{
            $subscribe =Information::find($id);
            if ($subscribe != null) 
            {
            $subscribe->delete();
            //return redirect('retrieveData')->with('message','Subscription Successfully Deleted');
            return redirect('dashboard')->with('message','Subscription Successfully Deleted');
            }
          else
            {   
             //return redirect()->route('retrieve')for routing purposes;
              return redirect('retrieveData')->with('message','Unable to Delete');
             }
        }

        catch (Throwable $e) {
            report($e);
            return false;
        }
 
    }


    //Inserting data
    public function inserted(Request $request){ 
        $valid = Validator::make($request->all(),[
            'fname' =>'required|string|max:255',
            'lname' =>'required|string|max:255',
            'age' => 'required|integer|max:255',
            'address' =>'required|string|max:255',
        ]);

        if ($valid->fails())   {
            return redirect()->back()->withErrors($valid->errors());
        }
        else{  

     try{                 
        $user =Information::create([
            'fname' => $request['fname'],
            'lname' =>$request['lname'],
            'age'=>intval($request['age']),
            'address'=> $request['address']
         ]);
        $user->save(); 
        return redirect()->route('table');
       // return redirect('retrieveData')->with('message','Successfully Save!');
        }
     catch (Throwable $e) {
            report($e);
            return false;
            //return redirect('dashboard')->with('message','Unable to Delete');
        }

      }
      
    }


}
