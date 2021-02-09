<?php


namespace App\Repositories;


use App\Http\Requests\StoreGroupRequest;

interface GroupRepositoryInterface
{
    /**
     * @param StoreGroupRequest $request
     * @return mixed
     */
    public function createGroup(StoreGroupRequest $request);
}
