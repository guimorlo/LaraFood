<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function list($planUrl)
    {
        if (!$plan = $this->plan->where('url', $planUrl)->first()){
            return redirect()->back();
        }

        return $plan->details()->get();
    }

    public function create($url)
    {
        if (!$plan = $this->plan->where('url', $url)->first()){
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan,
        ]);
    }

    public function store($url, StoreUpdateDetailPlan $request)
    {
        if (!$plan = $this->plan->where('url', $url)->first()){
            return redirect()->back();
        }

        dd(
        $plan->details()->create($request->all()));
    }
}
