<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function index()
    {
        return Makul::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:Makuls',
            'sks' => 'required',
        ]);

        $makul = Makul::create($request->all());
        return response()->json($makul, 201);
    }

    public function update(Request $request, $id)
    {
        $makul = Makul::findOrFail($id);
        $makul->update($request->all());
        return response()->json($makul, 200);
    }

    public function destroy($id)
    {
        $makul = Makul::findOrFail($id);
        $makul->delete();
        return response()->json(['message' => 'Makul deleted'], 200);
    }
}