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

    // Other methods...

    /**
     * Accounts Page.
     *
     * @return View
     */
    public function accounts(): View
    {
        return view('frontend.accounts');
    }

    /**
     * Banks Page.
     *
     * @return View
     */
    public function banks(): View
    {
        return view('frontend.banks');
    }

    /**
     * cPanels Page.
     *
     * @return View
     */
    public function cpanels(): View
    {
        return view('frontend.cpanels');
    }

    /**
     * Images Page.
     *
     * @return View
     */
    public function images(): View
    {
        return view('frontend.images');
    }

    /**
     * Mailers Page.
     *
     * @return View
     */
    public function mailers(): View
    {
        return view('frontend.mailers');
    }

    /**
     * Manager Page.
     *
     * @return View
     */
    public function manager(): View
    {
        return view('frontend.manager');
    }

    /**
     * News Page.
     *
     * @return View
     */
    public function news(): View
    {
        return view('frontend.news');
    }

    /**
     * New Seller Page.
     *
     * @return View
     */
    public function newseller(): View
    {
        return view('frontend.newseller');
    }

    /**
     * Purchases Page.
     *
     * @return View
     */
    public function purchases(): View
    {
        return view('frontend.purchases');
    }

    /**
     * Reseller Page.
     *
     * @return View
     */
    public function resseller(): View
    {
        return view('frontend.resseller');
    }

    /**
     * Scam Pages.
     *
     * @return View
     */
    public function scampages(): View
    {
        return view('frontend.scampages');
    }

    /**
     * SMTP Pages.
     *
     * @return View
     */
    public function smtps(): View
    {
        return view('frontend.smtps');
    }

    /**
     * Stuff Page.
     *
     * @return View
     */
    public function stufs(): View
    {
        return view('frontend.stufs');
    }

    /**
     * Ticket Page.
     *
     * @return View
     */
    public function ticket(): View
    {
        return view('frontend.ticket');
    }

    /**
     * Tutorials Page.
     *
     * @return View
     */
    public function tutorials(): View
    {
        return view('frontend.tutorials');
    }

    /**
     * Users Page.
     *
     * @return View
     */
    public function users(): View
    {
        return view('frontend.users');
    }
}