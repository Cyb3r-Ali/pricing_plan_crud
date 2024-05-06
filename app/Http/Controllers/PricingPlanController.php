<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $pricingPlans = PricingPlan::all();
        return view('pricing_plans.index', compact('pricingPlans'));
    }

    public function create()
    {
        return view('pricing_plans.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        // Create new pricing plan
        PricingPlan::create($request->all());

        return redirect()->route('pricingPlans.index')->with('success', 'Pricing plan created successfully.');
    }

    public function show($id)
    {
        $pricingPlan = PricingPlan::findOrFail($id);
        return view('pricing_plans.show', compact('pricingPlan'));
    }

    public function edit($id)
    {
        $pricingPlan = PricingPlan::findOrFail($id);
        return view('pricing_plans.edit', compact('pricingPlan'));
    }

    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        // Update pricing plan
        $pricingPlan = PricingPlan::findOrFail($id);
        $pricingPlan->update($request->all());

        return redirect()->route('pricingPlans.index')->with('success', 'Pricing plan updated successfully.');
    }

    public function destroy($id)
    {
        // Delete pricing plan
        $pricingPlan = PricingPlan::findOrFail($id);
        $pricingPlan->delete();

        return redirect()->route('pricingPlans.index')->with('success', 'Pricing plan deleted successfully.');
    }
}
