<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class MemberController extends Controller
{
  public function create() {
    return view('registration');
  }
  public function formSubmit(Request $request)
  {
    return response()->json([$request->all()]);
  }
}