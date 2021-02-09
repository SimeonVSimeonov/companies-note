<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * Create a new controller instance.
     *
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->middleware('auth');
        $this->companyRepository = $companyRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $companies = $this->companyRepository->getAllCompanies();
        return view('home', ['companies' => $companies]);
    }
}
