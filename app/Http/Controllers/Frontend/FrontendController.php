<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class FrontendController extends Controller
{
    /**
     * Retrieves the view for the index page of the frontend.
     *
     * @return View
     */
    public function index(): View
    {
        return view('frontend.index');
    }

    /**
     * Privacy Policy Page.
     *
     * @return View
     */
    public function privacy(): View
    {
        return view('frontend.privacy');
    }

    /**
     * Terms & Conditions Page.
     *
     * @return View
     */
    public function terms(): View
    {
        return view('frontend.terms');
    }

    /**
     * Tutorial Page.
     *
     * @return View
     */
    public function tutorial(): View
    {
        return view('frontend.tutorial');
    }

    /**
     * Reports Page.
     *
     * @return View
     */
    public function reports(): View
    {
        return view('frontend.reports');
    }

    /**
     * Rules Page.
     *
     * @return View
     */
    public function rules(): View
    {
        return view('frontend.rules');
    }

    /**
     * Static Page.
     *
     * @return View
     */
    public function static(): View
    {
        return view('frontend.static');
    }

    /**
     * SMTP Page.
     *
     * @return View
     */
    public function smtp(): View
    {
        return view('frontend.smtp');
    }

    /**
     * cPanel Page.
     *
     * @return View
     */
    public function cPanel(): View
    {
        return view('frontend.cPanel');
    }

    /**
     * Shell Page.
     *
     * @return View
     */
    public function shell(): View
    {
        return view('frontend.shell');
    }

    /**
     * Leads Page.
     *
     * @return View
     */
    public function leads(): View
    {
        return view('frontend.leads');
    }

    /**
     * Premium Page.
     *
     * @return View
     */
    public function premium(): View
    {
        return view('frontend.premium');
    }

    /**
     * Active Page.
     *
     * @return View
     */
    public function active(): View
    {
        return view('frontend.active');
    }
}