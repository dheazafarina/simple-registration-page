<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class MemberController extends Controller
{
  public function create() {
    return view('registration');
  }
  public function store(Request $request) {
    $this->validate($request,[
      'phone' => 'required|numeric',
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required'
    ]);

    return view('proses',['data' => $request]);
  }
}