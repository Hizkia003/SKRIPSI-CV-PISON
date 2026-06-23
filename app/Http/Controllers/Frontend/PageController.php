<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SupplyMaterial;
use App\Models\JasaKonstruksi;
use App\Models\Project;
use App\Models\Certificate;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->take(6)->get();
        return view('pages.home', compact('projects'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function supplyMaterial()
    {
        $materials = SupplyMaterial::where('is_active', true)->orderBy('order')->get();
        return view('pages.supply-material', compact('materials'));
    }

    public function jasaKonstruksi()
    {
        $jasa = JasaKonstruksi::with('images')->where('is_active', 1)->orderBy('order')->get();
        return view('pages.jasa-konstruksi', compact('jasa'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('pages.projects', compact('projects'));
    }

    public function certificates()
    {
        $certificates = Certificate::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.certificates', compact('certificates'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\Contact::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}