<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(): View
    {
        $companies = Company::all();
        return view('companies.index', [
            'companies' => $companies,
        ]);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'corporate_name' => 'required',
            'cnpj' => 'required',
        ]);

        Company::create($data);

        return redirect()->route('companies.index');
    }

    public function show(Company $company)
    {
        return $company;
    }

    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company
        ]);
    }

    public function update( Request $request, Company $company): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'corporate_name' => 'required',
            'cnpj' => 'required'
        ]);
         
        $company->fill($data);
        $company->save;

        return redirect()->route('company.index');
    }

    public function destroy( Company $company ): RedirectResponse
    {
        $company->delete();
        
        return redirect()->route('companies.index');
    }
}


