<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use App\Models\About;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\Advantage;
use App\Models\SupplyMaterial;
use App\Models\JasaKonstruksi;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Tiktok;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $about = About::firstOrCreate(
            [],
            [
                'company_name' => 'CV. Pison Teknik Indonesia',
                'description' => 'Deskripsi perusahaan belum ditambahkan.',
            ]
        );
        $siteContent = SiteContent::firstOrCreate([]);
        $projects = Project::latest()->take(6)->get();

        return view('pages.home', compact('about', 'siteContent', 'projects'));
    }

    public function about()
    {
        $about = About::first();
        $visions = Vision::where('is_active', true)->orderBy('order')->get();
        $missions = Mission::where('is_active', true)->orderBy('order')->get();
        $advantages = Advantage::where('is_active', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        return view('pages.about', compact('about', 'visions', 'missions', 'advantages'));
    }

    public function supplyMaterial()
    {
        $materials = SupplyMaterial::where('is_active', true)->orderBy('order')->get();
        return view('pages.supply-material', compact('materials'));
    }

    public function jasaKonstruksi()
    {
        $jasas = JasaKonstruksi::with('images')->where('is_active', true)->orderBy('order')->get();
        return view('pages.jasa-konstruksi', compact('jasas'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('pages.projects', compact('projects'));
    }

    public function tiktok()
    {
        $tiktoks = Tiktok::where('is_active', true)->orderBy('order')->latest()->get();
        $about = About::first();
        return view('pages.tiktok', compact('tiktoks', 'about'));
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