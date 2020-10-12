<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Note/IndexVuetify', [
            'user' => request()->user(),
            'notes' => request()->user()->notes()->with('comments')->paginate(),
        ]);
    }

    public function inspire(Request $request)
    {
        $note = request()->user()->notes()->create([
            'body' => Inspiring::quote(),
        ]);

        return Redirect::route('notes', [
            'page' => $request->page,
        ]);
    }

    public function count(Request $request)
    {
        $note = Note::where([
            'id' => $request->id,
        ])->firstOrFail();

        $note->update([
            'count' => $note->count + 1,
        ]);

        return Redirect::route('notes', [
            'page' => $request->page,
        ]);
    }

    public function comment(Request $request)
    {
        $note = Note::where([
            'id' => $request->id,
        ])->firstOrFail();

        $note->comments()->create([
            'body' => $request->comment ?: Inspiring::quote(),
        ]);

        return Redirect::route('notes', [
            'page' => $request->page,
        ]);
    }
}
