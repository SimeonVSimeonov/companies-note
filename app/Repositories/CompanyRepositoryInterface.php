<?php


namespace App\Repositories;


use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;

interface CompanyRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllCompanies();

    /**
     * @param StoreCompanyRequest $request
     * @return mixed
     */
    public function createCompany(StoreCompanyRequest $request);

    /**
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return mixed
     */
    public function updateCompany(UpdateCompanyRequest $request, Company $company);
}
