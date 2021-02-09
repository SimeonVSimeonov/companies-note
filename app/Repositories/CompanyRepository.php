<?php


namespace App\Repositories;


use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyRepository implements CompanyRepositoryInterface
{

    /**
     * @return mixed|void
     */
    public function getAllCompanies()
    {
        return Company::with('group')->get();
    }

    /**
     * @param StoreCompanyRequest $request
     * @return mixed|void
     */
    public function createCompany(StoreCompanyRequest $request)
    {
        return Company::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'group_id' => $request->group_id
        ]);
    }


    /**
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return mixed|void
     */
    public function updateCompany(UpdateCompanyRequest $request, Company $company)
    {
        $request->validated();
        return $company->update([
            'name' => $request->name,
            'group_id' => $request->group_id
        ]);
    }
}
