<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate(6);

        return view('admin.pages.plans.index',[
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();
        else
            return view('admin.pages.plans.show', [
                'plan' => $plan,
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
        $plans = $this->repository->search($request->key ?? '', $request->filter);

        return view('admin.pages.plans.index',[
            'plans' => $plans,
            'key' => $request->key,
        ]);
    }

    public function count()
    {
        //$query = DB::select("SELECT COUNT(*) as c FROM plans");
        return 4;
    }
}
