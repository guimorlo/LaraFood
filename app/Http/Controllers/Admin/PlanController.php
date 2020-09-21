<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    private $repository;
    private $detailController;

    public function __construct(Plan $plan, DetailPlanController $detailPlanController)
    {
        $this->repository = $plan;
        $this->detailController = $detailPlanController;
    }

    public function index($message = null)
    {
        $plans = $this->repository->latest()->paginate(6);

        return view('admin.pages.plans.index',[
            'plans' => $plans,
            'messages' => $message,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request){
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        $details = $this->detailController->list($url);

        if (!$plan)
            return redirect()->back();
        else
            return view('admin.pages.plans.show', [
                'plan' => $plan,
                'details' => $details,
            ]);
    }

    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();
        else
            $plan->delete();
            return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        if ($request->filter == 'price')
            $request->key = str_replace(',', '.', $request->key);

        $plans = $this->repository->search($request->key, $request->filter);

        $filters = $request->except('_token');

        return view('admin.pages.plans.index',[
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();
        else
            return view('admin.pages.plans.edit', [
                'plan' => $plan,
            ]);
    }

    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();
        else
            $plan->update($request->all());
            return redirect()->route('plans.index');
    }

    public function count()
    {
        return 4;
    }
}
