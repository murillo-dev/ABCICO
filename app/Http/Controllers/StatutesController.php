<?php

namespace App\Http\Controllers;

use App\Models\StatuteItem;
use Illuminate\Http\Request;

class StatutesController extends Controller
{
    public function index()
    {
        $statutes = StatuteItem::orderBy('title')->get();
        return view('pages.statutes.index', compact('statutes'));
    }

    public function denomination()
    {
        $statute = StatuteItem::where('slug', 'denominacion')->firstOrFail();
        return view('pages.statutes.show', compact('statute'));
    }

    public function object()
    {
        $statute = StatuteItem::where('slug', 'objeto')->firstOrFail();
        return view('pages.statutes.show', compact('statute'));
    }

    public function categories()
    {
        $statute = StatuteItem::where('slug', 'member_categories')->firstOrFail();
        return view('pages.statutes.show', compact('statute'));
    }

    public function directiva()
    {
        $statute = StatuteItem::where('slug', 'directiva')->firstOrFail();
        return view('pages.statutes.show', compact('statute'));
    }

    public function show(StatuteItem $statute)
    {
        return view('pages.statutes.show', compact('statute'));
    }
}
