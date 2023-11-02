<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\product;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function tambah()
    {
        return view('admin.crud.addData',
        [
            'products'=> product::all()
        ]);
    }
    public function push(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:20',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string|max:120',
            'product_id' => 'required'
        ]);

        // Setelah validasi berhasil, data akan disimpan ke database
        barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'product_id' => $request->product_id,
        ]);
        return redirect()->route('admin.barang')->with('success', 'Data
            Barang Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        return view('admin.crud.editData', [
            'barangs' => barang::all()->where('id', $id)->first(),
            'products' => product::all(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:20',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'required|string|max:120',
            'product_id' => 'required'
        ]);
        $barang = barang::findOrFail($id);
        $barang->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'product_id' => $request->product_id,
        ]);
        return redirect()->route('admin.barang')->with('success', 'Data Barang
            Berhasil Diubah');
    }
    public function delete($id){
        $barangs = barang::findOrFail($id);
        $barangs->delete();
        return redirect()->route('admin.barang')->with('success','Data Barang
        Berhasil Dihapus');
        }
}
