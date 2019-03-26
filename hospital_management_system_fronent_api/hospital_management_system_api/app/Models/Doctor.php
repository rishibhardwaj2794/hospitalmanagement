<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model{
  protected $table = "doctor";
  protected $fillable = ['doctor_id', 'doctor_name', 'doctor_type', 'doctor_qualification','doctor_specialization', 'doctor_about', 'doctor_dob', 'doctor_city', 'doctor_state', 'doctor_pincode', 'doctor_address', 'doctor_image', 'doctor_hospital_id'];
}
