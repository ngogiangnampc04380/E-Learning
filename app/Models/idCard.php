<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idCard extends Model
{
    protected $collection = 'id-card';
    protected $fillable = [
        "id",
        'mentor_id',
        "id_prob",
        "name",
        "name_prob",
        "dob",
        "dob_prob",
        "sex",
        "sex_prob",
        "nationality",
        "nationality_prob",
        "home",
        "home_prob",
        "address",
        "address_prob",
        "doe",
        "doe_prob",
        "overall_score",
        "address_entities",
        "type_new",
        "type",
        "religion_prob",
        "religion",
        "ethnicity_prob",
        "ethnicity",
        "features",
        "features_prob",
        "issue_date",
        "issue_date_prob",
        "issue_loc_prob",
        "issue_loc",
        
    ];
}
