<?php


namespace App\Repositories;


use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{

    /**
     * @return mixed|void
     */
    public function getAllCompanies()
    {
        return Company::with('group')->get();
    }
}
