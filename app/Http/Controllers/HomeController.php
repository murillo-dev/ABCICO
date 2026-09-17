<?php

namespace App\Http\Controllers;

use App\Models\SectionContent;
use App\Models\BoardMember;
use App\Models\StatuteItem;
use App\Models\Founder;
use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $statutes = StatuteItem::orderBy('title')->limit(4)->get();
        $founders = Founder::with('user')->get();
        $boardMembers = BoardMember::where(function($q) {
                $q->whereNull('end_date')
                  ->orWhere('end_date', '>=', now());
            })->orderBy('position')->get();

        return view('pages.home', compact('statutes', 'founders', 'boardMembers'));
    }
}
