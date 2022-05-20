<?php

namespace App\Http\Controllers;


use App\Models\Professors;
use Illuminate\Http\Request;

class ProfessorsController extends Controller
{
    public static function get(){
        return view("professor.get", ["data"=>Professors::all()]);
    }
    function put_view($id){
        $p = ProfessorsController::getById($id);
        return view("professor.put", ["data"=>$p]);
    }
    function put(Request $req){
        $data = ProfessorsController::getById($req->id);
        $data->firstName = $req->firstName; 
        $data->lastName = $req->lastName;
        $data->city = $req->city; 
        $data->salary = $req->salary; 
        $data->birthDate = $req->birthDate; 
        $data->update();
        return ProfessorsController::get();
    }
    function delete(Request $req){
        $data = ProfessorsController::getById($req->id);
        $data->delete();
        return ProfessorsController::get();
    }
    function post_view(){
        return view("professor.new");
    }
    function post(Request $req){
        Professors::create([
            "firstName"=>$req->firstName,
            "lastName"=>$req->lastName,
            "city"=>$req->city,
            "salary"=>$req->salary,
            "birthDate"=>$req->birthDate
        ]);
        return ProfessorsController::get();
    }
    static function getById($id){
        return Professors::where(["id"=>$id])->first();
    }
}
