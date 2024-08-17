<?php

namespace App\Controllers;

use App\Models\ProvinceModel;
use App\Models\DistrictModel;
use App\Models\CommuneModel;

class Location extends BaseController
{
    public function index()
    {
        $provinceModel = new ProvinceModel();
        $districtModel = new DistrictModel();
        $communeModel = new CommuneModel();

        $provinces = $provinceModel->findAll();
        $districts = $districtModel->findAll();
        $communes = $communeModel->findAll();

        return view('location/index', [
            'provinces' => $provinces,
            'districts' => $districts,
            'communes' => $communes,
        ]);
    }

    public function getProvinces()
    {
        $provinceModel = new ProvinceModel();
        return $this->response->setJSON($provinceModel->findAll());
    }

    public function getDistricts($province_id)
    {
        $districtModel = new DistrictModel();
        return $this->response->setJSON($districtModel->where('province_id', $province_id)->findAll());
    }

    public function getCommunes($district_id)
    {
        $communeModel = new CommuneModel();
        return $this->response->setJSON($communeModel->where('district_id', $district_id)->findAll());
    }
}
