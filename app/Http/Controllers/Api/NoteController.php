<?php

namespace App\Http\Controllers\Api;

use App\Models\Note;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;

class NoteController extends ApiController
{
    public function list()
    {
        $note = request()->user()->notes()->with('comments')->paginate();

        return $note;
    }

    public function inspire()
    {
        $note = request()->user()->notes()->create([
            'body' => Inspiring::quote(),
        ]);

        return $note;
    }

    public function count(Request $request)
    {
        $valids = $request->validate([
            'id' => ['required'],
        ]);

        $note = Note::where([
            'id' => $valids['id'],
        ])->firstOrFail();

        $note->update([
            'count' => $note->count + 1,
        ]);

        return $note;
    }
}
