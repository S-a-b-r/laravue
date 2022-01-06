<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $req, Person $person){
        $data = $req->validated();
        $person->update($data);
        return $data;
    }
}
