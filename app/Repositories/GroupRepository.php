<?php


namespace App\Repositories;


use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;

class GroupRepository implements GroupRepositoryInterface
{

    /**
     * @param StoreGroupRequest $request
     * @return mixed|void
     */
    public function createGroup(StoreGroupRequest $request)
    {
        return Group::create($request->validated());
    }

    /**
     * @return mixed|void
     */
    public function getAllGroups()
    {
        return Group::all();
    }
}
