<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->count) {
            $note = Note::where([
                'id' => $request->count,
            ])->first();

            optional($note)->update([
                'count' => $note->count + 1,
            ]);
        }

        return Inertia::render('Note/Index', [
            'user' => request()->user(),
            'notes' => request()->user()->notes()->paginate(),
        ]);
    }
}
