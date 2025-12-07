<?php
// 5026231010 - Daniel Setiawan Yulius Putra
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function index()
    {
        // Get the currently logged in user automatically
        $user = Auth::user();

        return view('profile', compact('user'));
    }
}