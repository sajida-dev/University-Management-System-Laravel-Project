<?php

namespace App\Http\Controllers\Admission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admission\StoreAdmissionAddressRequest;
use App\Http\Requests\Admission\StoreAdmissionDisabilityRequest;
use App\Http\Requests\Admission\StoreAdmissionOtherRequest;
use App\Http\Requests\Admission\StoreAdmissionProfileRequest;
use App\Http\Requests\Admission\UpdateAdmissionAddressRequest;
use App\Http\Requests\Admission\UpdateAdmissionDisabilityRequest;
use App\Http\Requests\Admission\UpdateAdmissionOtherRequest;
use App\Http\Requests\Admission\UpdateAdmissionProfileRequest;
use App\Models\AddressDetail;
use App\Models\BloodGroup;
use App\Models\DisabilityDetail;
use App\Models\Gender;
use App\Models\OtherDetail;
use App\Models\PersonalInfo;
use App\Models\Religion;
use Illuminate\Support\Facades\Auth;

class AdmissionProfileController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function createProfile()
    {
        $genders = Gender::all();
        $bloodGroups = BloodGroup::all();
        $religions = Religion::all();
        return view('pages.admission.personal-info.index', compact('genders', 'bloodGroups', 'religions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProfile(StoreAdmissionProfileRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            //Move Uploaded File
            $extension = $file->getClientOriginalExtension();
            $destinationPath = 'upload';
            $file->move($destinationPath, Auth::id() . '.' . $extension);
            $validated['profile'] = $destinationPath . '/' . Auth::id() . '.' . $extension;
        }
        $validated['user_id'] = Auth::id();
        // Save personal info
        $personalInfo = new PersonalInfo();
        $personalInfo->create($validated);

        return redirect()->route('admission.address-detail.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile(PersonalInfo $personalInfo)
    {
        $personalInfo = $personalInfo->first();
        $genders = Gender::all();
        $bloodGroups = BloodGroup::all();
        $religions = Religion::all();
        return view('pages.admission.personal-info.edit', compact('genders', 'bloodGroups', 'religions', 'personalInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(UpdateAdmissionProfileRequest $request,  $id)
    {
        $validated = $request->validated();
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            //Move Uploaded File
            $extension = $file->getClientOriginalExtension();
            $destinationPath = 'upload';
            $file->move($destinationPath, Auth::id() . '.' . $extension);
            $validated['profile'] = $destinationPath . '/' . Auth::id() . '.' . $extension;
        }
        $validated['user_id'] = Auth::id();
        // Save personal info
        $personalInfo = PersonalInfo::find($id);
        $personalInfo->update($validated);

        return redirect()->route('admission.address-detail.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAddress()
    {
        return view('pages.admission.address-details.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAddress(StoreAdmissionAddressRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $addressDetail = new AddressDetail();
        //dd($validated);
        $addressDetail->create($validated);
        return redirect()->route('admission.disability-detail.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editAddress(AddressDetail $addressDetail)
    {
        $addressDetail = $addressDetail->first();
        return view('pages.admission.address-details.edit', compact('addressDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAddress(UpdateAdmissionAddressRequest $request,  $id)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        //dd($addressDetail);
        $addressDetail = AddressDetail::find($id);
        $addressDetail->update($validated);
        return redirect()->route('admission.disability-detail.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createDisability()
    {
        $disabilityStatus = PersonalInfo::where('user_id', Auth::id())->value('is_disability');
        return view('pages.admission.disability-details.index', compact('disabilityStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDisability(StoreAdmissionDisabilityRequest $request)
    {
        $request->validated();
        $dep = new DisabilityDetail();
        ///dd($validated);
        $dep->create([
            'user_id' => Auth::id(),
            'disability_type' => $request['DisabilityType'],
            'accomodation_for_entrance_exam' => $request['DisabilityAccommodation'],
        ]);
        return redirect()->route('admission.other-detail.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editDisability(DisabilityDetail $disabilityDetail)
    {
        $disabilityDetail = $disabilityDetail->first();
        $disabilityStatus = PersonalInfo::where('user_id', Auth::id())->value('is_disability');
        return view('pages.admission.disability-details.edit', compact('disabilityDetail', 'disabilityStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateDisability(UpdateAdmissionDisabilityRequest $request,  $id)
    {
        $request->validated();
        ///dd($validated);
        $DisabilityDetail = DisabilityDetail::find($id);
        $DisabilityDetail->update([
            'disability_type' => $request['DisabilityType'],
            'accomodation_for_entrance_exam' => $request['DisabilityAccommodation'],
        ]);
        return redirect()->route('admission.other-detail.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createOther()
    {
        return view('pages.admission.other-details.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOther(StoreAdmissionOtherRequest $request)
    {
        $validated = $request->validated();
        $dep = new OtherDetail();
        //dd($validated);
        $dep->create([
            'user_id' => Auth::id(),
            'is_vaccinated' => $validated['Vaccinated'],
            'transport_required' => $validated['Transport'],
            'is_hostel_required' => $validated['Hostel'],
        ]);
        if (explode('.', request()->host())[0] == 'jobs') {
            return redirect()->route('jobs.academic-details.create');
        }
        return redirect()->route('admission.choose-program.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editOther(OtherDetail $otherDetail)
    {
        $otherDetail = $otherDetail->first();
        return view('pages.admission.other-details.edit', compact('otherDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateOther(UpdateAdmissionOtherRequest $request,  $id)
    {
        $validated = $request->validated();
        //dd($validated);
        $OtherDetail = OtherDetail::find($id);
        $OtherDetail->update([
            'is_vaccinated' => $validated['Vaccinated'],
            'transport_required' => $validated['Transport'],
            'is_hostel_required' => $validated['Hostel'],
        ]);
        return redirect()->route('admission.choose-program.create');
    }
}
