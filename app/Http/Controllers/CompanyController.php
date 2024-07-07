<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NewCompanyNotification;
use Illuminate\Support\Facades\Notification;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10); // 10 entries per page
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'nullable|email',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'website' => 'nullable|url'
    ]);

    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('public/logos');
        $validatedData['logo'] = str_replace('public/', '', $path);
    }

    // Create a new company record
    $company = Company::create($validatedData);

    if ($company) {
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to create company.');
    }
}



    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function showAnotherWay($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', ['company' => $company]);
    }
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($company->logo);
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }


    public function destroy(Company $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);
        }
    
        // Delete the company record
        $company->delete();
    
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
