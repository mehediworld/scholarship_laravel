<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipApplication extends Model
{
    use HasFactory;

    protected $table = 'scholarship_applications';

    protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'father_name',
        'fathers_status',
        'fathers_occupation_status',
        'fathers_occupation_name',
        'fathers_not_workable_reason',
        'mother_name',
        'mothers_status',
        'mothers_occupation_status',
        'mothers_occupation_name',
        'mothers_not_workable_reason',
        'monthly_income',
        'email',
        'phone_number',
        'are_physically_disable',
        'disability_type',
        'present_care_of',
        'present_address_line_2',
        'present_city',
        'present_thana',
        'present_post_office',
        'present_postal_code',
        'same_as_present_address',
        'permanent_care_of',
        'permanent_address_line_2',
        'permanent_city',
        'permanent_thana',
        'permanent_post_office',
        'permanent_postal_code',
        'o_level_degree',
        'o_level_board_name',
        'o_level_group',
        'o_gpa_with_4th',
        'o_gpa_without_4th',
        'o_total_marks',
        'o_roll',
        'o_registration_no',
        'o_level_passing_year',
        'a_level_degree',
        'a_level_board_name',
        'a_level_group',
        'a_gpa_with_4th',
        'a_gpa_without_4th',
        'a_total_marks',
        'a_roll',
        'a_registration_no',
        'a_level_passing_year',
        'location_of_college',
        'degree_name',
        'institute_name',
        'other_institute',
        'major',
        'other_subject',
        'guardian_name',
        'relation_with_applicant',
        'guardian_profession',
        'guardian_mobile',
        'guardian_email',
        'number_of_siblings',
        'other_scholarship',
        
        
    ];
}

