<?php

namespace App\Http\Controllers;

use App\Models\Investigation;
use App\Models\UserInvestigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Usertestscontroller extends Controller
{
  public function addMytest($id)
  {
      $userId = Auth::id();
  
      // Check if the investigation already exists for the user
      $exists = UserInvestigation::where('investigation_id', $id)
          ->where('user_id', $userId)
          ->exists();
  
      if ($exists) {
          // Redirect back with an error message if it already exists
          return redirect()->back()->with('error', 'This investigation is already added to your list.');
      }
  
      // If it doesn't exist, create a new record
      UserInvestigation::create([
          'investigation_id' => $id,
          'user_id' => $userId,
      ]);
  
      return redirect()->back()->with('success', 'Investigation added successfully!');
  }
  
public function show()
{
  
  $userId = Auth::id();
         
  $tests = UserInvestigation::where('user_id', $userId)->with('investigation')->get();

return view('my tests',['tests' => $tests]);
$totalPrice = collect($test)->sum('price'); // Sum up all prices

    return view('my tests', compact('test', 'totalPrice'));
}

public function destroy($id)
    {
        // Find the item by ID and delete it
$tests = UserInvestigation::find($id);

if ($tests) {
    $tests->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Item removed successfully!');
}
    }
}
