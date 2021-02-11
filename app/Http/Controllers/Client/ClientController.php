<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentAgency = Auth::user()->id;
        $clients = Client::select("firstName", "lastName", "id", "email", "dateOfBirth", "cin")->where('agencyId', 'LIKE', $currentAgency)->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepOne(Request $request)
    {
        $client = $request->session()->get('client');
        return view('clients.create_step_one');
       // return view('clients.create.step.one', compact('client'));
    }

    /**  
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'string|required|max:255',
            'lastName' => 'string|required|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'nationality' => 'string|required|max:255',
            'tunisianResiding' => 'boolean|nullable',
            'country' => 'string|required|max:255',
            'dateOfBirth' => 'required|date',
            'placeOfBirth' => 'string|required|max:255',
            'levelEducation' => 'string|required',
            'academicCertificate' => 'string|required|max:255',
            'attribute' => 'string|required|max:255',
            'rne' => 'string|required',
            'cin' => 'required|numeric',
            'passeport' => 'required|numeric',
            'dateOfIssue' => 'nullable|date',
            'placeOfIssue' => 'nullable|string',
            'adress' => 'string|required|max:255',
            'city' => 'string|required|max:255',
            'codePostal' => 'required|numeric',
            'phone' => 'required|numeric',
            'fax' => 'nullable|numeric',
        ]);

        if (empty($request->session()->get('client'))) {
            $client = new Client();
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        } else {
            $client = $request->session()->get('client');
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        }
        return redirect()->route('clientsCreateStepTwo');
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $client = $request->session()->get('client');
        return view('clients.create_step_two',compact('client'));
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'string|nullable',
            'agent' => 'string|nullable',
            'socialHeadquarters' => 'string|nullable',
            'commercialRegistrationNo' => 'string|nullable',
            'taxCustomersIdentifier' => 'string|nullable',
            'capital' => 'string|nullable',
            'legalNature' => 'string|nullable',
            'enrollmentNumberNationalSSF' => 'string|nullable',
            'foreignContibution' => 'string|nullable',
            'phoneAgent' => 'nullable|numeric',
            'faxAgent' => 'nullable|numeric',
            'emailAgent' => 'email|max:255|nullable',
        ]);
        $client = $request->session()->get('client');
        $client->fill($validatedData);
        $request->session()->put('client', $client);
  
        return redirect()->route('clientsCreateStepThree');
    }

     /**
     * Show the step One Form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $client = $request->session()->get('client');
        return view('clients.create_step_three',compact('client'));
    }
  
    /**
     * Show the step One Form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'investmentSystem' => 'nullable',
            'projectNature' => 'nullable',
            'sector' => 'nullable',
            'activity' => 'nullable',
            'isEconomicSystem' => 'nullable',
            'systemName' => 'nullable',
            'informationProject' => 'nullable',
            'licenseBrochure1' => 'nullable',
            'licenseBrochure2' => 'nullable',
            'licenseBrochure3' => 'nullable',
            'cityAgent' => 'nullable',
            'accreditationAgent' => 'nullable',
            'deanshipAgent' => 'nullable',
            'deanshipAgentexploitation' => 'nullable',
            'area' => 'nullable',
            'exploited' => 'nullable',
            'covered' => 'nullable',
            'property' => 'nullable',
            'authorization' => 'nullable',
            'authorizationrentPrivateLand' => 'nullable',
            'internationalLandLease' => 'nullable',
            'exploitationPublicProperty' => 'nullable',
            'otherFormulas' => 'nullable',
        ]);
  
        $client = $request->session()->get('client');
        $client->fill($validatedData);
        $request->session()->put('client', $client);
  
        return redirect()->route('clientsCreateStepFour');
    }

     /**
     * Show the step One Form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepFour(Request $request)
    {
        $client = $request->session()->get('client');
        return view('clients.create_step_four',compact('client'));
    }
  
    /**
     * Show the step One Form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepFour(Request $request)
    {
        $client = $request->session()->get('client');
        dump($client);
        die();
        $client->save();
        $request->session()->forget('client');
  
        $user = User::create([
            'name' => $data['name'],
            'userType' => $data['userType'],
            'agencyName' => $data['agencyName'],
            'RNE' => $data['RNE'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'avatar' => $data['avatar'],
        ]);
    
    $role = Role::select('id')->where('name', 'user')->first();
    $user->roles()->attach($role);

        return redirect()->route('clientsindex');
    }
}
