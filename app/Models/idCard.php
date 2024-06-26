<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class idCard extends Model
{
    protected $table = 'idcards';
    protected $fillable = [
        "_id",
        "id",
        "id_mentor",
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
        "number_of_name_lines",
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
        "mrz",
        "mrz_prob",
        
    ];

}
