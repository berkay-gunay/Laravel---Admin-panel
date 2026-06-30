<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    
    public function create()
    {
        return view('admin.add_product'); 
    }

    public function list_products()
    {
        
        $urunler = Product::orderBy('id', 'desc')->get(); 
        
        
        return view('admin.list_product', compact('urunler'));
    }

    
    public function destroy($id)
    {
        
        $urun = Product::findOrFail($id);
        
        
        $urun->delete();
        
        
        return redirect()->back()->with('success', 'Ürün başarıyla silindi!');
    }

    // Formdan gelen verileri veritabanına kaydeder
    public function store(Request $request)
    {
        // Güvenlik: Validation
        $validatedData = $request->validate([
            'urun_adi' => 'required|string|max:255',
            'marka' => 'required|string|max:255',
            'fiyati' => 'required|numeric',
            'urun_grubu' => 'required|string',
            'cinsiyet' => 'nullable|string',
            'cerceve_rengi' => 'nullable|string',
            'cam_rengi' => 'nullable|string',
            'cerceve_sekli' => 'nullable|string',
            'ekartman' => 'nullable|string',
            'sap_uzunlugu' => 'nullable|string',
            'kopru_uzunlugu' => 'nullable|string',
            'urun_aciklamasi' => 'nullable|string',
            'degrade' => 'boolean',
            'urun_gorseli' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        
        $validatedData['degrade'] = $request->has('degrade') ? true : false;

        // Resim yükleme
        if ($request->hasFile('urun_gorseli')) {
            
            $yol = $request->file('urun_gorseli')->store('urun_gorselleri', 'public');

            
            $validatedData['urun_gorseli'] = $yol;
        }

        // Veritabanına yaz
        Product::create($validatedData);

        // Başarı mesajıyla formu tekrar aç
        return redirect()->back()->with('success', 'Ürün başarıyla veritabanına kaydedildi!');
    }
}
