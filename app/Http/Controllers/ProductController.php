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

    
    public function store(Request $request)
    {
        
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

        
        if ($request->hasFile('urun_gorseli')) {
            
            $yol = $request->file('urun_gorseli')->store('urun_gorselleri', 'public');

            
            $validatedData['urun_gorseli'] = $yol;
        }

        
        Product::create($validatedData);

        
        return redirect()->back()->with('success', 'Ürün başarıyla veritabanına kaydedildi!');
    }

    
    
    public function edit($id)
    {
        $urun = Product::findOrFail($id);

        return view('admin.edit_product', compact('urun'));
    }

    
    public function update(Request $request, $id)
    {
        $urun = Product::findOrFail($id);

        
        $request->validate([
            'urun_adi' => 'required|max:255',
            'marka' => 'required|max:255',
            'fiyati' => 'required|numeric',
            'urun_grubu' => 'required',
            'urun_gorseli' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        
        if ($request->hasFile('urun_gorseli')) {
            $imageName = time() . '.' . $request->urun_gorseli->extension();
            $request->urun_gorseli->storeAs('public/urunler', $imageName);
            $urun->urun_gorseli = $imageName; 
        }

        
        $urun->urun_adi = $request->urun_adi;
        $urun->marka = $request->marka;
        $urun->fiyati = $request->fiyati;
        $urun->urun_grubu = $request->urun_grubu;
        $urun->cinsiyet = $request->cinsiyet;
        $urun->cerceve_rengi = $request->cerceve_rengi;
        $urun->cam_rengi = $request->cam_rengi;
        $urun->cerceve_sekli = $request->cerceve_sekli;
        $urun->ekartman = $request->ekartman;
        $urun->sap_uzunlugu = $request->sap_uzunlugu;
        $urun->kopru_uzunlugu = $request->kopru_uzunlugu;
        $urun->urun_aciklamasi = $request->urun_aciklamasi;
        
        
        $urun->degrade = $request->has('degrade') ? 1 : 0;

        
        $urun->save();

        return redirect()->route('admin.urun.listesi')->with('success', 'Ürün başarıyla güncellendi!');
    }
}
