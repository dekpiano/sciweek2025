<?php

namespace App\Controllers;

class ControlUserCertificate extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // $Tb_compet = $this->db->table('tb_competition_types');
        // $data['ListCompetition'] = $Tb_compet
        // ->groupBy('ctype_name')
        // ->orderBy('ctype_id', 'ASC')
        // ->get()->getResult();
        //echo '<pre>';print_r($data); exit();
        $data = [];

        return view('User/Pages/Certificate/PageCertificate',$data);
    }
}
