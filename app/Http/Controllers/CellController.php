<?php
use App\Models\Cell;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CellController extends Controller
{
  public function showForm()
  {
      return view('cell.form');
  }
}
