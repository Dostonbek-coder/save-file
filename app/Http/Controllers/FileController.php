<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function uploadFile(Request $request) 
    { 
        if ($request->hasFile('file')) { // tekshiruv file bormi yoqmi
            // Fayl obyektini olish 
            $file = $request->file('file'); // $request object ichida file metodi bor ichiga inputdagi name ni qabul qiladi 
            // Fayl nomini o'zgartirish xar yuklangan file da unique name bo'lishini taminlaydi 
            $fileName = time() . '.' . $file->getClientOriginalExtension(); 
            // Faylni public diskka yuklash 
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
