<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\DMCA;
use App\Models\Dmcas;
use App\Models\FAQ;
use App\Models\Privacies;
use App\Models\Privacy;
use App\Models\PrivacyPolicy;
use App\Models\Terms_of_services;
use App\Models\TermsOfService;
use App\Models\TermsOfServices;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function faq()
    {
        $faq = FAQ::query()->select('content')->first();

        return view('pages.faq', ['faq' => $faq]);
    }

    public function dmca()
    {
        $dmca = Dmcas::query()->select('content')->first();

        return view('pages.dmca', ['dmca' => $dmca]);
    }

    public function termsOfServices()
    {
        $termsOfServices = TermsOfService::query()->select('content')->first();

        return view('pages.terms-services', ['termsOfServices' => $termsOfServices]);
    }

    public function privacyPolicy()
    {
        $privacyPolicy = Privacy::query()->select('content')->first();

        return view('pages.privacy-policy', ['privacyPolicy' => $privacyPolicy]);
    }
}
