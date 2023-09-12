<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/admin/produk', [
            'title' => 'Admin | Produk',
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/create_product', [
            'title' => 'Tambah Produk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = $image->getClientOriginalName();
            $request->gambar->move(public_path('image-uploads'), $imageName);

            $product->gambar = $imageName;
        } else {
            $product->gambar = '1.jpg';
        }
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;

        $product->save();

        // return ddd($request);
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        return view('admin/edit_product', [
            'title' => 'Edit Produk',
            'product' => $product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = $product::find($id);
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = $image->getClientOriginalName();
            $request->gambar->move(public_path('image-uploads'), $imageName);

            $product->gambar = $imageName;
        } else {
            $product->gambar = $product->gambar;
        }
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;

        $product->update();

        return redirect('/admin-produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        // dd($product);

        return redirect()->back()->with('success', 'data berhasil dihapus!');
    }
}
