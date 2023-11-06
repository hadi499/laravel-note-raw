<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Image;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return view('index', [
            'notes' => Note::all()
        ]);
    }
    public function show(Note $note)
    {
        return view('show', [
            'note' => $note
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);


        Note::create($validatedData);

        return redirect('/')->with('success', 'New post added!');
    }

    public function edit(Note $note)
    {
        return view('edit', [
            'note' => $note
        ]);
    }

    public function update(Request $request, Note $note)
    {
        $rules = [
            'title' => 'required|max:255',
            'body' => 'required'
        ];


        $validatedData = $request->validate($rules);
        Note::where('id', $note->id)
            ->update($validatedData);

        return redirect('/')->with('success', 'Updated is success!');
    }

    public function destroy(Note $note)
    {
        Note::destroy($note->id);
        return redirect('/')->with('success', 'post has been deleted!');
    }


    public function upload(Request $request)
    {
        // Validasi file
        $request->validate([
            'upload' => 'required|file|mimes:jpeg,png,gif|max:1024', // Sesuaikan aturan validasi sesuai kebutuhan Anda
        ]);

        if ($request->file('upload')->isValid()) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        } else {
            return response()->json(['error' => 'File tidak valid.']);
        }
    }
    public function uploadImage(Request $request)
    {
        // Validasi file
        $request->validate([
            'upload' => 'required|file|mimes:jpeg,png,gif|max:1024', // Sesuaikan aturan validasi sesuai kebutuhan Anda
        ]);

        if ($request->file('upload')->isValid()) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $file = new Image();
            $file->upload = $fileName;
            $file->save();

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        } else {
            return response()->json(['error' => 'File tidak valid.']);
        }
    }

    public function media()
    {
        $images = Image::all();
        return view('media', [
            'images' => $images
        ]);
    }
    public function deleteFile($fileId)
    {
        $file = Image::find($fileId);
        if ($file) {
            if (file_exists(public_path('media/' . $file->upload))) {
                unlink(public_path('media/' . $file->upload));
            }
            $file->delete();
            return redirect('/myimage')->with('success', 'post has been deleted!');
        } else {
            return 'File tidak ditemukan';
        }
    }
}
