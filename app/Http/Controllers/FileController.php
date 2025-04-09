<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function uploadFile(Request $request) 
    { 
        if ($request->hasFile('file')) { 

            $file = $request->file('file');

            $fileName = time() . '.' . $file->getClientOriginalExtension(); 

            $filePath = $file->storeAs('uploads', $fileName, 'public'); 
            $user = User::create([
                'name'=>'Dostonbek',
                'eamil'=> uniqid() . '$gmail.com',
                'avatar'=> $filePath,
                'password' => 'password'
            ]);

            return response()->json(['filePath' => $filePath]); 
        } 
        return 'Fayl yuklanmadi'; 
    } 
}
