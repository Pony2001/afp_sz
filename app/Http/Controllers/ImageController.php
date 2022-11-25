<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
        public function index()
        {
                return view('image-form');
        }

        // Store Image
        public function storeImage(Request $request)
        {
                $request->validate([
                        'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                        'image2' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                        'image3' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                        'image4' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                        'image5' => 'required|image|mimes:png,jpg,jpeg|max:2048'
                ]);

                //dd($request);
                $imageName = time() . '.' . $request->image->extension();
                $imageName2 = time() . '.' . $request->image2->extension();
                $imageName3 = time() . '.' . $request->image3->extension();
                $imageName4 = time() . '.' . $request->image4->extension();
                $imageName5 = time() . '.' . $request->image5->extension();

                // $_SESSION['img1'] = $imageName;
                // $_SESSION['img2'] = $imageName2;
                // $_SESSION['img3'] = $imageName3;
                // $_SESSION['img4'] = $imageName4;
                // $_SESSION['img5'] = $imageName5;
                // Public Folder
                $request->image->move(public_path('profil_img'), $imageName);
                $request->image2->move(public_path('ref_img'), $imageName2);
                $request->image3->move(public_path('ref_img2'), $imageName3);
                $request->image4->move(public_path('ref_img3'), $imageName4);
                $request->image5->move(public_path('ref_img4'), $imageName5);

                // //Store in Storage Folder
                //   $request->image->storeAs('images/', $imageName);

                // // Store in S3
                // $request->image->storeAs('images', $imageName, 's3');

                //Store IMage in DB 

                return back()
                        ->with([
                                'image' => $imageName,
                                'image2' => $imageName2,
                                'image3' =>  $imageName3,
                                'image4' =>  $imageName4,
                                'image5' =>  $imageName5,
                                // $_SESSION
                        ]);
        }
}
