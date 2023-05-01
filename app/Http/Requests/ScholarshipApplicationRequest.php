<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Import the Rule class

class ScholarshipApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'full_name' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female',
        'father_name' => 'required|string|max:255',
        'fathers_status' => 'required|string|max:255',
        'fathers_occupation_status' => 'nullable|string|max:255',
        'fathers_occupation_name' => 'nullable|string|max:255',
        'fathers_not_workable_reason' => 'nullable|string|max:255',
        'mother_name' => 'required|string|max:255',
        'mothers_status' => 'required|string|max:255',
        'mothers_occupation_status' => 'nullable|string|max:255',
        'mothers_occupation_name' => 'nullable|string|max:255',
        'mothers_not_workable_reason' => 'nullable|string|max:255',
        'monthly_income' => 'required|numeric|min:0',
         'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('scholarship_applications'),
        ],
		'phone_number' => [
            'required',
            'numeric',
            Rule::unique('scholarship_applications'),
        ],
        'are_physically_disable' => 'required|string|max:255',
        'disability_type' => 'nullable|string|max:255',
        'present_care_of' => 'required|string|max:255',
        'present_address_line_2' => 'required|string|max:255',
        'present_city' => 'required|string|max:255',
        'present_thana' => 'required|string|max:255',
        'present_post_office' => 'required|string|max:255',
        'present_postal_code' => 'required|integer',
        //'same_as_present_address' => 'boolean',
        'permanent_care_of' => 'nullable|string|max:255',
        'permanent_address_line_2' => 'nullable|string|max:255',
        'permanent_city' => 'nullable|string|max:255',
        'permanent_thana' => 'nullable|string|max:255',
        'permanent_post_office' => 'nullable|string|max:255',
        'permanent_postal_code' => 'nullable|integer',
        'o_level_degree' => 'required|string|max:255',
        'o_level_board_name' => 'required|string|max:255',
        'o_level_group' => 'required|string|max:255',
        'o_gpa_with_4th' => 'required|numeric',
        'o_gpa_without_4th' => 'required|numeric',
        'o_total_marks' => 'required|integer',
        'o_roll' => 'required|integer',
        'o_registration_no' => 'required|integer',
        'o_level_passing_year' => 'required|integer|min:1900|max:' . date('Y'),
        'a_level_degree' => 'required|string|max:255',
        'a_level_board_name' => 'required|string|max:255',
        'a_level_group' => 'required|string|max:255',
        'a_gpa_with_4th' => 'required|numeric',
        'a_gpa_without_4th' => 'required|numeric',
        'a_total_marks' => 'required|integer',
        'a_roll' => 'required|integer',
        'a_registration_no' => 'required|integer',
        'a_level_passing_year' => 'required|integer|min:1900|max:' . date('Y'),
        'location_of_college' => 'required|string|max:255',
        'degree_name' => 'required|string|max:255',
        'institute_name' => 'required|string|max:255',
        'other_institute' => 'nullable|string|max:255',
        'major' => 'required|string|max:255',
        'other_subject' => 'nullable|string|max:255',
        'guardian_name' => 'required|string|max:255',
        'relation_with_applicant' => 'required|string|max:255',
        'guardian_profession' => 'required|string|max:255',
        'guardian_mobile' => 'required|string|max:255',
        'guardian_email' => 'required|string|max:255',
        'number_of_siblings' => 'required|integer',
        'other_scholarship' => 'required|string|max:255',
        
        
        
        
    ];
    }
}
