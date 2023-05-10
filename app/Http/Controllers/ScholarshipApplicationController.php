<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScholarshipApplication;
use App\Http\Requests\ScholarshipApplicationRequest;
use App\Mail\ScholarshipApplicationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class ScholarshipApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		$applications = ScholarshipApplication::all();
		return view('scholarship_applications.index', compact('applications'));
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
        $districts = DB::table('district')->get();
        $sscDegrees = DB::table('job_edu_degree')->where('DEGREETYPE', 'SSC')->get();
        $hscDegrees = DB::table('job_edu_degree')->where('DEGREETYPE', 'HSC')->get();
        $honorsDegrees = DB::table('job_edu_degree')->where('DEGREETYPE', 'Honors/Graduate')->get();
        $sscGroups = DB::table('job_edu_group')->get();
        $sscBoards = DB::table('t_educationboard')->get();
        $universities = DB::table('edu_university')->get();
        $majors = DB::table('t_majorsubject')->get();
		return view('scholarship_applications.create', compact('districts', 'sscDegrees', 'sscGroups', 'sscBoards', 'hscDegrees', 'honorsDegrees', 'universities', 'majors'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScholarshipApplicationRequest $request)
	{
		$validatedData = $request->validated();

        // Handle the same_as_present_address checkbox
        $validatedData['same_as_present_address'] = $request->input('same_as_present_address', false) ? 1 : 0;
		// Handle file upload if necessary
        if ($request->hasFile('photo_path')) {
            $photo = $request->file('photo_path');
            $photo_name = time() . '_' . $photo->getClientOriginalName();
            $photo_path = $photo->storeAs('personal_photos', $photo_name, 'public');
    
            // Update the validated data with the stored photo path
            $validatedData['photo_path'] = 'storage/personal_photos/' . $photo_name;
        }
	     // Create a new ScholarshipApplication instance
    $scholarshipApplication = new ScholarshipApplication;

    // Fill the scholarship application instance with the validated data
    $scholarshipApplication->fill($validatedData);

    // Save the scholarship application instance
    $scholarshipApplication->save();
	session()->flash('application_id', $scholarshipApplication->id);
		//$scholarshipApplication = ScholarshipApplication::create($validatedData);
		Mail::to($scholarshipApplication->email)->send(new ScholarshipApplicationMail($scholarshipApplication));
        // Send an SMS
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://172.17.16.13:8080/sms/send', [
            'query' => [
                'no' => $validatedData['phone_number'],
                'msg' => 'Your Scholarship application has been received. Your application ID is: ' . $scholarshipApplication->id
            ]
        ]);
		return redirect()->route('scholarship_applications.thankyou');
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function thankyou()
	{
		return view('scholarship_applications.thankyou');
	}

    public function getThanasByDistrict($districtId)
    {
        $thanas = DB::table('thana')->where('DISTRICTID', $districtId)->get();
        return response()->json($thanas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
}
