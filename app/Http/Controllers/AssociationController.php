<?php

namespace App\Http\Controllers;

use App\Models\SectionContent;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function overview()
    {
        $sections = SectionContent::all();
        return view('pages.association', compact('sections'));
    }

    public function history()
    {
        $section = SectionContent::where('type', 'history')->firstOrFail();
        $boardMembers = BoardMember::orderBy('position')->get();
        return view('pages.association-show', compact('section', 'boardMembers'));
    }

    public function whoWeAre()
    {
        $section = SectionContent::where('type', 'who_we_are')->firstOrFail();
        $boardMembers = BoardMember::orderBy('position')->get();
        return view('pages.association-show', compact('section', 'boardMembers'));
    }

    public function mission()
    {
        $section = SectionContent::where('type', 'mission')->firstOrFail();
        $boardMembers = BoardMember::orderBy('position')->get();
        return view('pages.association-show', compact('section', 'boardMembers'));
    }

    public function vision()
    {
        $section = SectionContent::where('type', 'vision')->firstOrFail();
        $boardMembers = BoardMember::orderBy('position')->get();
        return view('pages.association-show', compact('section', 'boardMembers'));
    }

    public function objectives()
    {
        $section = SectionContent::where('type', 'objectives')->firstOrFail();
        $boardMembers = BoardMember::orderBy('position')->get();
        return view('pages.association-show', compact('section', 'boardMembers'));
    }

    public function board()
    {
        $section = SectionContent::where('type', 'board')->firstOrFail();
        $boardMembers = BoardMember::orderBy('position')->get();
        return view('pages.association-show', compact('section', 'boardMembers'));
    }
}
