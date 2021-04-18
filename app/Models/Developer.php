<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $table = 'developer';
    public $timestamps = false;

    public function findAllDevelopers()
    {
        return Developer::all();
    }

    public function findDeveloperByName(string $nome)
    {
        return Developer::Where('nome', 'like', '%' . $nome . '%')->get();
    }

    public function findDeveloper($id)
    {
        return Developer::find($id);
    }

    public function storeDeveloper(array $request)
    {
        $developer = new Developer;

        $developer->nome = $request['nome'];
        $developer->sexo = $request['sexo'];
        $developer->idade = $request['idade'];
        $developer->hobby = $request['hobby'];
        $developer->datanascimento = $request['datanascimento'];

        $developer->save();

        return $developer->id;
    }

    public function updateDeveloper(int $id, array $request)
    {
        $developer = Developer::find($id);

        $developer->nome = $request['nome'];
        $developer->sexo = $request['sexo'];
        $developer->idade = $request['idade'];
        $developer->hobby = $request['hobby'];
        $developer->datanascimento = $request['datanascimento'];

        return $developer->save();
    }

    public function deleteDeveloper(int $id)
    {
        $developer = Developer::find($id);

        return $developer->delete();
    }
}
