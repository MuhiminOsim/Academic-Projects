<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index(){
    	return view('welcome');
    }
    public function table_creation(){
    	return view('table_creation');
    }
    public function insertion(){
    	return view('insertion');
    }
    public function modification(){
    	return view('modification');
    }
    public function update_delete(){
    	return view('update_delete');
    }
    public function query_and_aggregate(){
    	return view('query_and_aggregate');
    }
    public function join(){
    	return view('join');
    }
    public function insert_user(){
        return view('insert_user');
    }
    public function insert_manager(){
        return view('insert_manager');
    }
    public function insert_access(){
        return view('insert_access');
    }
    public function insert_institution_type(){
        return view('insert_institution_type');
    }
    public function insert_department(){
        return view('insert_department');
    }
    public function insert_institution(){
        return view('insert_institution');
    }
    public function query_user(){
        return view('query_user');
    }
    public function query_manager(){
        return view('query_manager');
    }
    public function query_access(){
        return view('query_access');
    }
    public function query_institution(){
        return view('query_institution');
    }
    public function query_institution_user(){
        return view('query_institution_user');
    }
    public function query_count(){
        return view('query_count');
    }
    public function update_delete_user(){
        return view('update_delete_user');
    }
    public function update_delete_manager(){
        return view('update_delete_manager');
    }
    public function update_delete_access(){
        return view('update_delete_access');
    }
    public function update_delete_institution(){
        return view('update_delete_institution');
    }
    public function update_delete_department(){
        return view('update_delete_department');
    }
    public function update_delete_institution_type(){
        return view('update_delete_institution_type');
    }
}
