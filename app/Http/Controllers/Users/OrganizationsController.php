<?php

namespace App\Http\Controllers\Users;

use App\Http\Resources\Users\OrganizationDetailResource;
use App\Http\Resources\Users\OrganizationResource;
use App\Models\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrganizationsController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return OrganizationResource::collection(Organization::paginate());
    }

    /**
     * @param Organization $organization
     * @return OrganizationDetailResource
     */
    public function show(Organization $organization): OrganizationDetailResource
    {
        return new OrganizationDetailResource($organization);
    }
}
