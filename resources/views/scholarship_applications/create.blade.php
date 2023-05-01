@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Scholarship Application</h1>
	@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	
    <form action="{{ route('scholarship_applications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Personal Information -->
        <h3>Personal Information</h3>
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" value="{{ old('full_name') }}" name="full_name" required>
		
        </div>
			@if ($errors->has('full_name'))
				<span class="text-danger">{{ $errors->first('full_name') }}</span>
			@endif
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
            <option value="">Select gender</option>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" value="{{ old('date_of_birth') }}" name="date_of_birth" required>
			@if ($errors->has('date_of_birth'))
				<span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label for="father_name">Father's Name</label>
            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
        </div>
        <div class="form-group">
            <label for="fathers_status">Father's Status</label>
            <select class="form-control" id="fathers_status" name="fathers_status" required onchange="showFathersOccupationStatus()">
                <option value="">Select Status</option>
                <option value="Late" {{ old('fathers_status') == 'Late' ? 'selected' : '' }}>Late</option>
                <option value="Alive" {{ old('fathers_status') == 'Alive' ? 'selected' : '' }}>Alive</option>
            </select>
        </div>
        <div class="form-group" id="fathers_occupation_status_container" style="display:none;">
            <label for="fathers_occupation_status">Father's Occupation Status</label>
            <select class="form-control" id="fathers_occupation_status" name="fathers_occupation_status" onchange="showOccupationFields()">
                <option value="">Select Occupation Status</option>
                <option value="workable">Workable</option>
                <option value="not_workable">Not Workable</option>
            </select>
        </div>
        <div class="form-group" id="fathers_occupation_name_container" style="display:none;">
            <label for="fathers_occupation_name">Father's Occupation Name</label>
            <input type="text" class="form-control" id="fathers_occupation_name" name="fathers_occupation_name">
        </div>

        <div class="form-group" id="fathers_not_workable_reason_container" style="display:none;">
            <label for="fathers_not_workable_reason">Father's Not Workable Reason</label>
            <input type="text" class="form-control" id="fathers_not_workable_reason" name="fathers_not_workable_reason">
        </div>
        <div class="form-group">
            <label for="mother_name">Mother's Name</label>
            <input type="text" class="form-control" id="mother_name" name="mother_name" required>
        </div>
        <div class="form-group">
            <label for="mothers_status">Mother's Status</label>
            <select class="form-control" id="mothers_status" name="mothers_status" required onchange="showMothersOccupationStatus()">
                <option value="">Select Status</option>
                <option value="Late">Late</option>
                <option value="Alive">Alive</option>
            </select>
        </div>
        <div class="form-group" id="mothers_occupation_status_container" style="display:none;">
            <label for="mothers_occupation_status">Mother's Occupation Status</label>
            <select class="form-control" id="mothers_occupation_status" name="mothers_occupation_status" onchange="showOccupationFields1()">
                <option value="">Select Occupation Status</option>
                <option value="workable">Workable</option>
                <option value="not_workable">Not Workable</option>
            </select>
        </div>
        <div class="form-group" id="mothers_occupation_name_container" style="display:none;">
            <label for="mothers_occupation_name">Mother's Occupation Name</label>
            <input type="text" class="form-control" id="mothers_occupation_name" name="mothers_occupation_name">
        </div>

        <div class="form-group" id="mothers_not_workable_reason_container" style="display:none;">
            <label for="mothers_not_workable_reason">Mother's Not Workable Reason</label>
            <input type="text" class="form-control" id="mothers_not_workable_reason" name="mothers_not_workable_reason">
        </div>
        <div class="form-group">
            <label for="monthly_income">Parent's Monthly Income</label>
            <input type="number" class="form-control" id="monthly_income" name="monthly_income" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
			@if ($errors->has('email'))
				<span class="text-danger">{{ $errors->first('email') }}</span>
			@endif
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
			@if ($errors->has('phone_number'))
				<span class="text-danger">{{ $errors->first('phone_number') }}</span>
			@endif
        </div>
        
        
        <div class="form-group">
            <label for="are_physically_disable">Are you Physically Disable?</label>
            <select class="form-control" id="are_physically_disable" name="are_physically_disable" required>
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div id="disability_type_container" class="form-group" style="display: none;">
            <label for="disability_type">Type of Disability</label>
            <input type="text" class="form-control" id="disability_type" name="disability_type" required>
        </div>
        <!-- Add other input fields here -->

        <!-- Present Address -->
        <h3>Present Address</h3>
        <div class="form-group">
            <label for="present_care_of">Care Of</label>
            <input type="text" class="form-control" id="present_care_of" name="present_care_of" required>
        </div>
        <div class="form-group">
            <label for="present_address_line_2">Village/Town/Road/House/Flat</label>
            <input type="text" class="form-control" id="present_address_line_2" name="present_address_line_2">
        </div>
        <div class="form-group">
            <label for="present_city">District</label>
            <select class="form-control" name="present_city" id="present_city" aria-label="Present Address District" required>
                                <option value="">Select A District</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->DistrictID }}">{{$district->DistrictName}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group">
            <label for="present_thana">Thana</label>
            
            <select class="form-control" id="present_thana" name="present_thana" required>
                <option value="">Select Thana</option>
            </select>
        </div>
        <div class="form-group">
            <label for="present_post_office">Post Office</label>
            <input type="text" class="form-control" id="present_post_office" name="present_post_office" required>
        </div>
        <div class="form-group">
            <label for="present_postal_code">Postal Code</label>
            <input type="text" class="form-control" id="present_postal_code" name="present_postal_code" required>
        </div>

        <!-- Permanent Address -->
        <h3>Permanent Address</h3>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="same_as_present_address" name="same_as_present_address">
            <label class="form-check-label" for="same_as_present_address">
                Same as Present Address
            </label>
        </div>
        <div class="permanent-address-fields">
        <div class="form-group">
            <label for="permanent_care_of">Care of</label>
            <input type="text" class="form-control" id="permanent_care_of" name="permanent_care_of">
        </div>
        <div class="form-group">
            <label for="permanent_address_line_2">Village/Town/Road/House/Flat</label>
            <input type="text" class="form-control" id="permanent_address_line_2" name="permanent_address_line_2">
        </div>
        <div class="form-group">
            <label for="permanent_city">District</label>
            <select class="form-control" name="permanent_city" id="permanent_city" aria-label="Permanent Address District">
                                <option value="">Select A District</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->DistrictID }}">{{$district->DistrictName}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group">
            <label for="permanent_thana">Thana</label>
            
            <select class="form-control" id="permanent_thana" name="permanent_thana">
                <option value="">Select Thana</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="permanent_post_office">Post Office</label>
            <input type="text" class="form-control" id="permanent_post_office" name="permanent_post_office" required>
        </div>
        <div class="form-group">
            <label for="permanent_postal_code">Postal Code</label>
            <input type="text" class="form-control" id="permanent_postal_code" name="permanent_postal_code" required>
        </div>
        </div>

        <!-- Education Information -->
        <h3>Education Information</h3>
        <h4>SSC Education</h4>
        
        <div class="form-group">
            <label for="o_level_degree">Degree Name</label>
            <select class="form-control" name="o_level_degree" id="o_level_degree" required>
                                <option value="">Select Degree</option>
                                @foreach($sscDegrees as $sscDegree)
                                <option value="{{ $sscDegree->DEGREENAME }}">{{$sscDegree->DEGREENAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group">
            <label for="o_level_group">SSC Group</label>
            <select class="form-control" name="o_level_group" id="o_level_group" required>
                                <option value="">Select Group</option>
                                @foreach($sscGroups as $sscGroup)
                                <option value="{{ $sscGroup->EDUGROUPNAME }}">{{$sscGroup->EDUGROUPNAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group">
            <label for="o_level_board_name">SSC Board Name</label>
            <select class="form-control" name="o_level_board_name" id="o_level_board_name" required>
                                <option value="">Select Board</option>
                                @foreach($sscBoards as $sscBoard)
                                <option value="{{ $sscBoard->BOARDNAME }}">{{$sscBoard->BOARDNAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        
        
        <div class="form-group">
            <label for="o_gpa_with_4th">GPA With 4th subject</label>
            <input type="text" class="form-control" id="o_gpa_with_4th" name="o_gpa_with_4th" required>
        </div>
        <div class="form-group">
            <label for="o_gpa_without_4th">GPA Without 4th subject</label>
            <input type="text" class="form-control" id="o_gpa_without_4th" name="o_gpa_without_4th" required>
        </div>
        <div class="form-group">
            <label for="o_total_marks">Total Marks</label>
            <input type="text" class="form-control" id="o_total_marks" name="o_total_marks" required>
        </div>
        <div class="form-group">
            <label for="o_roll">Roll</label>
            <input type="text" class="form-control" id="o_roll" name="o_roll" required>
        </div>
        <div class="form-group">
            <label for="o_registration_no">Registration No</label>
            <input type="text" class="form-control" id="o_registration_no" name="o_registration_no" required>
        </div>
        
        <div class="form-group">
            <label for="o_level_passing_year">Passing Year</label>
            <input type="number" class="form-control" id="o_level_passing_year" name="o_level_passing_year" required>
        </div>

        <h4>HSC Education</h4>
        
        <div class="form-group">
            <label for="a_level_degree">Degree Name</label>
            <select class="form-control" name="a_level_degree" id="a_level_degree" required>
                                <option value="">Select Degree</option>
                                @foreach($hscDegrees as $hscDegree)
                                <option value="{{ $hscDegree->DEGREENAME }}">{{$hscDegree->DEGREENAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group">
            <label for="a_level_group">HSC Group</label>
            <select class="form-control" name="a_level_group" id="a_level_group" required>
                                <option value="">Select Group</option>
                                @foreach($sscGroups as $sscGroup)
                                <option value="{{ $sscGroup->EDUGROUPNAME }}">{{$sscGroup->EDUGROUPNAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group">
            <label for="a_level_board_name">HSC Board Name</label>
            <select class="form-control" name="a_level_board_name" id="a_level_board_name" required>
                                <option value="">Select Board</option>
                                @foreach($sscBoards as $sscBoard)
                                <option value="{{ $sscBoard->BOARDNAME }}">{{$sscBoard->BOARDNAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group">
            <label for="a_gpa_with_4th">GPA With 4th subject</label>
            <input type="text" class="form-control" id="a_gpa_with_4th" name="a_gpa_with_4th" required>
        </div>
        <div class="form-group">
            <label for="a_gpa_without_4th">GPA Without 4th subject</label>
            <input type="text" class="form-control" id="a_gpa_without_4th" name="a_gpa_without_4th" required>
        </div>
        <div class="form-group">
            <label for="a_total_marks">Total Marks</label>
            <input type="text" class="form-control" id="a_total_marks" name="a_total_marks" required>
        </div>
        <div class="form-group">
            <label for="a_roll">Roll</label>
            <input type="text" class="form-control" id="a_roll" name="a_roll" required>
        </div>
        <div class="form-group">
            <label for="a_registration_no">Registration No</label>
            <input type="text" class="form-control" id="a_registration_no" name="a_registration_no" required>
        </div>
       
        <div class="form-group">
            <label for="a_level_passing_year">Passing Year</label>
            <input type="number" class="form-control" id="a_level_passing_year" name="a_level_passing_year" required>
        </div>

        <div class="form-group">
            <label for="location_of_college">Location of College/Madrasah/Vocational(HSC Equivalent Level)</label>
            <select class="form-control" id="location_of_college" name="location_of_college" required>
                <option value="">Select</option>
                <option value="Inside City Corporation">Inside City Corporation</option>
                <option value="Outside City Corporation">Outside City Corporation</option>
            </select>
        </div>

        <!-- Present Learning Institute Information -->
        <h3>Present Learning Institute Information</h3>
        <div class="form-group">
            <label for="degree_name">Degree Name</label>
            <select class="form-control" name="degree_name" id="degree_name" required>
                                <option value="">Select Degree</option>
                                @foreach($honorsDegrees as $honorsDegree)
                                <option value="{{ $honorsDegree->DEGREENAME }}">{{$honorsDegree->DEGREENAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        
        <div class="form-group">
            <label for="major">Major / Subject</label>
            <select class="form-control" name="major" id="major" required>
                                <option value="">Select Subject</option>
                                @foreach($majors as $major)
                                <option value="{{ $major->SUBJECTNAME }}">{{$major->SUBJECTNAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group" id="other_subject_container" style="display:none;">
            <label for="other_subject">Other Subject Name</label>
            <input type="text" class="form-control" id="other_subject" name="other_subject">
        </div>
        <div class="form-group">
            <label for="institute_name">Institute Name</label>
            <select class="form-control" name="institute_name" id="institute_name" required>
                                <option value="">Select Institute</option>
                                @foreach($universities as $university)
                                <option value="{{ $university->UNIVERSITYNAME }}">{{$university->UNIVERSITYNAME}}</option>
                                @endforeach
                               
            </select>
        </div>
        <div class="form-group" id="other_institute_container" style="display:none;">
            <label for="other_institute">Other Institute Name</label>
            <input type="text" class="form-control" id="other_institute" name="other_institute">
        </div>

        

        <!-- Family Information -->
        <h3>Guardian / Legal Guardian Information</h3>
        
        <div class="form-group">
            <label for="guardian_name">Name</label>
            <input type="text" class="form-control" id="guardian_name" name="guardian_name" required>
        </div>
        <div class="form-group">
            <label for="relation_with_applicant">Relation With Applicant</label>
            <input type="text" class="form-control" id="relation_with_applicant" name="relation_with_applicant" required>
        </div>
        <div class="form-group">
            <label for="guardian_profession">Profession</label>
            <input type="text" class="form-control" id="guardian_profession" name="guardian_profession" required>
        </div>
        <div class="form-group">
            <label for="guardian_mobile">Mobile</label>
            <input type="number" class="form-control" id="guardian_mobile" name="guardian_mobile" required>
        </div>
        <div class="form-group">
            <label for="guardian_email">Email</label>
            <input type="email" class="form-control" id="guardian_email" name="guardian_email" required>
        </div>

        <!-- Brother's / Sister Information -->
        <h3>Brother's / Sister's Information</h3>
        <div class="form-group">
            <label for="number_of_siblings">Number of Siblings</label>
            <input type="text" class="form-control" id="number_of_siblings" name="number_of_siblings" required>
        </div>

        <!-- Brother's / Sister Information -->
        <h3>Scholarship Information</h3>
        <div class="form-group">
            <label for="other_scholarship">Did you avail any Other Scholarship(Except Govt. Scholarship)</label>
            <select class="form-control" id="other_scholarship" name="other_scholarship" required>
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        

        <!-- Upload Personal Photo -->
        <div class="form-group">
            <label for="photo_path">Upload Personal Photo</label>
            <input type="file" class="form-control-file" id="photo_path" name="photo_path" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- Add this before the closing </body> tag -->
<script>
document.getElementById('present_city').addEventListener('change', function() {
    const districtId = this.value;

    // Clear the thana dropdown
    const thanaDropdown = document.getElementById('present_thana');
    thanaDropdown.innerHTML = '<option value="">Select Thana</option>';

    if (!districtId) return;

    // Fetch related thanas for the selected district
    // Replace '/thanas/' with the appropriate route in your application
    fetch('/thanas/' + districtId)
        .then(response => response.json())
        .then(thanas => {
            thanas.forEach(thana => {
                const option = document.createElement('option');
                option.value = thana.THANAID;
                option.text = thana.THANANAME;
                thanaDropdown.add(option);
            });
        });
});
</script>
<script>
document.getElementById('permanent_city').addEventListener('change', function() {
    const districtId1 = this.value;

    // Clear the thana dropdown
    const thanaDropdown = document.getElementById('permanent_thana');
    thanaDropdown.innerHTML = '<option value="">Select Thana</option>';

    if (!districtId1) return;

    // Fetch related thanas for the selected district
    // Replace '/thanas/' with the appropriate route in your application
    fetch('/thanas/' + districtId1)
        .then(response => response.json())
        .then(thanas => {
            thanas.forEach(thana => {
                const option = document.createElement('option');
                option.value = thana.THANAID;
                option.text = thana.THANANAME;
                thanaDropdown.add(option);
            });
        });
});
</script>
<script>
  document.getElementById('are_physically_disable').addEventListener('change', function() {
    const disabilityTypeContainer = document.getElementById('disability_type_container');
    if (this.value === 'yes') {
      // Show the 'type of disability' input field
      disabilityTypeContainer.style.display = 'block';
      document.getElementById('disability_type').required = true;
    } else {
      // Hide the 'type of disability' input field
      disabilityTypeContainer.style.display = 'none';
      document.getElementById('disability_type').required = false;
    }
  });
</script>
<script>
  function showFathersOccupationStatus() {
    // Get the selected value of the "Father's Status" dropdown.
    const fathersStatus = document.getElementById('fathers_status').value;

    // Get the container element for the "Father's Occupation Status" dropdown.
    const fathersOccupationStatusContainer = document.getElementById('fathers_occupation_status_container');

    // If the selected value is "Alive", show the "Father's Occupation Status" dropdown, otherwise hide it.
    if (fathersStatus === 'Alive') {
      fathersOccupationStatusContainer.style.display = 'block';
      document.getElementById('fathers_occupation_status').required = true;
    } else {
      fathersOccupationStatusContainer.style.display = 'none';
      document.getElementById('fathers_occupation_status').required = false;
    }
  }
  function showOccupationFields() {
    // Get the selected value of the "Father's Occupation Status" dropdown.
    const fathersOccupationStatus = document.getElementById('fathers_occupation_status').value;

    // Get the container elements for the occupation name and not workable reason input fields.
    const fathersOccupationNameContainer = document.getElementById('fathers_occupation_name_container');
    const fathersNotWorkableReasonContainer = document.getElementById('fathers_not_workable_reason_container');

    // Show or hide the input fields based on the selected value.
    if (fathersOccupationStatus === 'workable') {
      fathersOccupationNameContainer.style.display = 'block';
      fathersNotWorkableReasonContainer.style.display = 'none';
      // Set the 'required' attribute on the visible input field, and remove it from the hidden field.
      document.getElementById('fathers_occupation_name').required = true;
      document.getElementById('fathers_not_workable_reason').required = false;
    } else if (fathersOccupationStatus === 'not_workable') {
      fathersOccupationNameContainer.style.display = 'none';
      fathersNotWorkableReasonContainer.style.display = 'block';
      // Set the 'required' attribute on the visible input field, and remove it from the hidden field.
      document.getElementById('fathers_occupation_name').required = false;
      document.getElementById('fathers_not_workable_reason').required = true;
    } else {
      fathersOccupationNameContainer.style.display = 'none';
      fathersNotWorkableReasonContainer.style.display = 'none';

      // Remove the 'required' attribute from both input fields.
      document.getElementById('fathers_occupation_name').required = false;
      document.getElementById('fathers_not_workable_reason').required = false;
    }
  }
</script>
<script>
  function showMothersOccupationStatus() {
    // Get the selected value of the "Father's Status" dropdown.
    const mothersStatus = document.getElementById('mothers_status').value;

    // Get the container element for the "Father's Occupation Status" dropdown.
    const mothersOccupationStatusContainer = document.getElementById('mothers_occupation_status_container');

    // If the selected value is "Alive", show the "Father's Occupation Status" dropdown, otherwise hide it.
    if (mothersStatus === 'Alive') {
      mothersOccupationStatusContainer.style.display = 'block';
      document.getElementById('mothers_occupation_status').required = true;
    } else {
      mothersOccupationStatusContainer.style.display = 'none';
      document.getElementById('mothers_occupation_status').required = false;
    }
  }
  function showOccupationFields1() {
    // Get the selected value of the "Father's Occupation Status" dropdown.
    const mothersOccupationStatus = document.getElementById('mothers_occupation_status').value;

    // Get the container elements for the occupation name and not workable reason input fields.
    const mothersOccupationNameContainer = document.getElementById('mothers_occupation_name_container');
    const mothersNotWorkableReasonContainer = document.getElementById('mothers_not_workable_reason_container');

    // Show or hide the input fields based on the selected value.
    if (mothersOccupationStatus === 'workable') {
      mothersOccupationNameContainer.style.display = 'block';
      mothersNotWorkableReasonContainer.style.display = 'none';
      // Set the 'required' attribute on the visible input field, and remove it from the hidden field.
      document.getElementById('mothers_occupation_name').required = true;
      document.getElementById('mothers_not_workable_reason').required = false;
    } else if (mothersOccupationStatus === 'not_workable') {
      mothersOccupationNameContainer.style.display = 'none';
      mothersNotWorkableReasonContainer.style.display = 'block';
      // Set the 'required' attribute on the visible input field, and remove it from the hidden field.
      document.getElementById('mothers_occupation_name').required = false;
      document.getElementById('mothers_not_workable_reason').required = true;
    } else {
      mothersOccupationNameContainer.style.display = 'none';
      mothersNotWorkableReasonContainer.style.display = 'none';

      // Remove the 'required' attribute from both input fields.
      document.getElementById('mothers_occupation_name').required = false;
      document.getElementById('mothers_not_workable_reason').required = false;
    }
  }
</script>
<script>
    function updatePermanentAddressFields() {
        var sameAsPresentAddressCheckbox = document.getElementById('same_as_present_address');
        var permanentAddressFields = document.getElementsByClassName('permanent-address-fields');
        var permanentAddressInputs = document.querySelectorAll('.permanent-address-fields input, .permanent-address-fields select');

        if (sameAsPresentAddressCheckbox.checked) {
            // Checkbox is checked, hide the permanent address fields and remove the 'required' attribute
            for (var i = 0; i < permanentAddressFields.length; i++) {
                permanentAddressFields[i].style.display = 'none';
            }
            for (var i = 0; i < permanentAddressInputs.length; i++) {
                permanentAddressInputs[i].removeAttribute('required');
            }
        } else {
            // Checkbox is not checked, show the permanent address fields and add the 'required' attribute
            for (var i = 0; i < permanentAddressFields.length; i++) {
                permanentAddressFields[i].style.display = 'block';
            }
            for (var i = 0; i < permanentAddressInputs.length; i++) {
                permanentAddressInputs[i].setAttribute('required', true);
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var sameAsPresentAddressCheckbox = document.getElementById('same_as_present_address');

        // Update the permanent address fields on page load
        updatePermanentAddressFields();

        sameAsPresentAddressCheckbox.addEventListener('change', function() {
            // Update the permanent address fields when the checkbox state changes
            updatePermanentAddressFields();
        });
    });
</script>
<script>
function updateOtherSubjectField() {
    var majorSelect = document.getElementById('major');
    var otherSubjectContainer = document.getElementById('other_subject_container');
    var otherSubjectInput = document.getElementById('other_subject');

    if (majorSelect.value === 'Others') {
        // Show the 'Other Subject' input field and make it required
        otherSubjectContainer.style.display = 'block';
        otherSubjectInput.setAttribute('required', true);
    } else {
        // Hide the 'Other Subject' input field and remove the 'required' attribute
        otherSubjectContainer.style.display = 'none';
        otherSubjectInput.removeAttribute('required');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var majorSelect = document.getElementById('major');

    // Update the 'Other Subject' field on page load
    updateOtherSubjectField();

    majorSelect.addEventListener('change', function() {
        // Update the 'Other Subject' field when the 'Major / Subject' dropdown value changes
        updateOtherSubjectField();
    });
});
</script>
<script>
    function updateOtherInstituteField() {
    var instituteSelect = document.getElementById('institute_name');
    var otherInstituteContainer = document.getElementById('other_institute_container');
    var otherInstituteInput = document.getElementById('other_institute');

    if (instituteSelect.value === 'Others') {
        // Show the 'Other Institute' input field and make it required
        otherInstituteContainer.style.display = 'block';
        otherInstituteInput.setAttribute('required', true);
    } else {
        // Hide the 'Other Institute' input field and remove the 'required' attribute
        otherInstituteContainer.style.display = 'none';
        otherInstituteInput.removeAttribute('required');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var instituteSelect = document.getElementById('institute_name');

    // Update 'Other Institute' fields on page load
    
    updateOtherInstituteField();

    instituteSelect.addEventListener('change', function() {
        // Update the 'Other Institute' field when the 'Institute Name' dropdown value changes
        updateOtherInstituteField();
    });
});

</script>

@endsection
