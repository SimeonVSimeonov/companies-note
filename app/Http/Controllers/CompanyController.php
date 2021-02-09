<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Repositories\GroupRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class CompanyController extends Controller
{
    /**
     * @var GroupRepository
     */
    private $groupRepository;
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * CompanyController constructor.
     * @param GroupRepository $groupRepository
     * @param CompanyRepository $companyRepository
     */
    public function __construct(GroupRepository $groupRepository, CompanyRepository $companyRepository)
    {
        $this->middleware('auth');
        $this->groupRepository = $groupRepository;
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $groups = $this->groupRepository->getAllGroups();
        return view('company.create', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompanyRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(StoreCompanyRequest $request)
    {
        $this->companyRepository->createCompany($request);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View|Response
     */
    public function edit(Company $company)
    {
        $groups = $this->groupRepository->getAllGroups();
        return view('company.edit', ['company' => $company,'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->companyRepository->updateCompany($request, $company);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('home');
    }
}
