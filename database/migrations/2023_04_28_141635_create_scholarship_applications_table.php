<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_applications', function (Blueprint $table) {
            $table->id();
			$table->string('full_name');
			$table->date('date_of_birth');
			$table->string('gender');
			$table->string('father_name');
			$table->string('fathers_status');
			$table->string('fathers_occupation_status')->nullable();
			$table->string('fathers_occupation_name')->nullable();
			$table->string('fathers_not_workable_reason')->nullable();
			$table->string('mother_name');
			$table->string('mothers_status');
			$table->string('mothers_occupation_status')->nullable();
			$table->string('mothers_occupation_name')->nullable();
			$table->string('mothers_not_workable_reason')->nullable();
			$table->unsignedInteger('monthly_income');
			$table->string('email')->unique();
			$table->string('phone_number')->unique();
			$table->string('are_physically_disable');
			$table->string('disability_type')->nullable();
			$table->text('present_care_of');
			$table->text('present_address_line_2')->nullable();
			$table->string('present_city');
			$table->string('present_thana');
			$table->string('present_post_office');
			$table->string('present_postal_code');
			$table->boolean('same_as_present_address')->default(false);
			$table->text('permanent_care_of')->nullable();
			$table->text('permanent_address_line_2')->nullable();
			$table->string('permanent_city')->nullable();
			$table->string('permanent_thana')->nullable();
			$table->string('permanent_post_office')->nullable();
			$table->string('permanent_postal_code')->nullable();
			$table->string('o_level_degree');
			$table->string('o_level_board_name');
			$table->string('o_level_group');
			$table->float('o_gpa_with_4th');
			$table->float('o_gpa_without_4th');
			$table->integer('o_total_marks');
			$table->integer('o_roll');
			$table->integer('o_registration_no');
			$table->integer('o_level_passing_year');
			$table->string('a_level_degree');
			$table->string('a_level_board_name');
			$table->string('a_level_group');
			$table->float('a_gpa_with_4th');
			$table->float('a_gpa_without_4th');
			$table->integer('a_total_marks');
			$table->integer('a_roll');
			$table->integer('a_registration_no');
			$table->integer('a_level_passing_year');
			$table->string('location_of_college');
			$table->string('degree_name');
			$table->string('institute_name');
			$table->string('other_institute')->nullable();
			$table->string('major');
			$table->string('other_subject')->nullable();
			$table->string('guardian_name');
			$table->string('relation_with_applicant');
			$table->string('guardian_profession');
			$table->string('guardian_mobile');
			$table->string('guardian_email');
			$table->integer('number_of_siblings');
			$table->string('other_scholarship');
			$table->string('photo_path')->default('');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarship_applications');
    }
};
