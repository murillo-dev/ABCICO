<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use App\Models\Member;
use App\Models\BoardMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MembersController extends Controller
{
    public function index()
    {
        $founders = Founder::with('user')->get();
        $members = Member::with('user')->where('status', 'active')->get();
        $boardMembers = BoardMember::orderBy('position')->get();
        return view('pages.members.index', compact('founders', 'members', 'boardMembers'));
    }

    public function become()
    {
        return view('pages.members.become');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'membership_type' => 'required|in:regular,honorary,founder',
            'accept_terms' => 'accepted',
        ]);

        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt(Str::random(16)),
        ]);

        Member::create([
            'user_id' => $user->id,
            'membership_type' => $validated['membership_type'],
            'status' => 'pending',
            'joined_at' => now(),
        ]);

        return redirect()->route('members.index')
            ->with('status', '¡Tu solicitud de membresía ha sido enviada exitosamente!');
    }
}
