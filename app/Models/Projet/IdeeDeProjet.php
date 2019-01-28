<?php

namespace App\Models\Projet;

use Illuminate\Database\Eloquent\Model;

class IdeeDeProjet extends Model
{



protected $table=[
'intituleIdee',
'institutionSouhaite_id',
'personneinterne_id',
'cheminProtocole',
'dateSoumission',
'institutionProposeur_id'
];






      protected $table='idees_de_projet';
}
