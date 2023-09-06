<?php

namespace App\Http\Controllers;

use App\Models\Musik;
use Illuminate\Http\Request;

class MusikController extends Controller
{

    public function getMusik(){
        $musik = Musik::all();

        return response()->json([
            'data' => $musik
        ],200);
    }
    public function storeMusik(Request $request){

        $fileMusik = $request->file('file_musik');
        $fileExt = $fileMusik->getClientOriginalExtension();

        $fileName = uniqid() . '.' . $fileExt;

        $pathMusik = $fileMusik->storeAs('public', $fileName);
        // proses upload file musik

        $gambarAlbum = $request->file('gambar_album');
        $gambarExt = $gambarAlbum->getClientOriginalName();
        $gambarName = uniqid() . '.' . $gambarExt;
        $pathGambar = $gambarAlbum->storeAs('public', $gambarName);
        // proses upload album

        $res = Musik::create([
            'nama_musik' => $request->nama_musik,
            'tipe_file' => $request->tipe_file,
            'nama_artis' => $request->nama_artis,
            'file_musik' => $fileName,
            'gambar_album' => $gambarName,
        ]);

        if (!$res) {
        return response()->json([
            'message' => 'Musik tidak berhasil di upload'
        ], 404);
        }

        return response()->json([
            'message' => 'Musik berhasil di upload'
        ]);
    }
    public function deleteMusik($id){
        $fileMusik = Musik::find($id);
        $fileMusik->delete();

        if (!$fileMusik) {
            return response()->json([
            'message' => 'Musik tidak berhasil di hapus'
        ], 404);
        }
        return response()->json([
            'message' => 'Musik berhasil di hapus'
        ], 200);
    }
    public function showMusik($id){
        $musik = Musik::find($id);

        if (!$musik) {
            return response()->json([
                'message' => 'Musik tidak di temukan'
            ], 404);
        }
        return response()->json([
            'data' => $musik
        ], 200);
    }
    public function updateMusik(Request $request, $id){
        $fileMusik = Musik::find($id);
        $fileMusik->update($request->all());

        if (!$fileMusik) {
            return response()->json([
                'message' => 'Musik tidak berhasil di update'
            ], 404);
        }
        return response()->json([
            'message' => 'Musik berhasil di update'
        ], 200);
    }

}