<?php

namespace App\Controllers;

date_default_timezone_set('Asia/Bangkok');

class Register extends BaseController
{
    public function UserRegister()
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            $CompaniesModel = new \App\Models\CompaniesModel();

            $requestPayload = $this->request->getJSON();
            $email = $requestPayload->email ?? null;
            $password = $requestPayload->password ?? null;
            $companies_name = $requestPayload->companies_name ?? null;
            $package = $requestPayload->package ?? null;

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $date = date('Y-m-d H:i:s');

            $packet_exp_date = date('Y-m-d H:i:s', strtotime($date . ' +7 day'));
            // if (!$email || !$password ) throw new \Exception('กรุณาตรวจสอบ email หรือ password ของท่าน');
            // if (!$companies_name || !$package ) throw new \Exception('กรุณาตรวจสอบ package ของท่าน');
            
            $create = $CompaniesModel->insertCompanies([
                'companies_user' => $email,
                'companies_password' => $hashed_password,
                'companies_name' => $companies_name,
                'packet_id' => $package,
                'packet_exp_date' => $packet_exp_date,
                'companies_status' => 'Active',
            ]);

            $companies_id = $create;

            $EmployeeModel = new \App\Models\EmployeeModel();

            $create = $EmployeeModel->insertEmployee([
                'username' => $email,
                'password' => $hashed_password,
                'companies_id' => $companies_id,
            ]);

            $InformationModel = new \App\Models\InformationModel();

            $create = $InformationModel->insertInformation([
                'shopname' => $companies_name,
                'companies_id' => $companies_id,
            ]);

            if ($create) {
                $status = 200;
                $response['success'] = 1;
                $response['message'] = 'สมัครสมาชิกสำเร็จ';
            } else {
                $status = 200;
                $response['success'] = 0;
                $response['message'] = 'สมัครสมาชิกไม่สำเร็จ';
            }
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }
}
