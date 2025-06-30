<?php

namespace App\Controllers;

class ConUserRegister extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index($key = null)
    {
        $Tb_compet = $this->db->table('tb_competition_types');
        $data['ListCompetition'] = $Tb_compet
        ->groupBy('ctype_name')
        ->orderBy('ctype_id', 'ASC')
        ->get()->getResult();
        //echo '<pre>';print_r($data); exit();

        return view('User/Pages/Register/PagsRegister',$data);
    }
}
