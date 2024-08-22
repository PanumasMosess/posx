<?php

namespace App\Controllers;
use App\Models\EmployeeSettingStatusModel;

class Authentication extends BaseController
{

    public function login()
    {
        $status = 500;
        $response['success'] = 0;
        $response['message'] = '';

        try {

            if ($this->request->getMethod() != 'post') throw new \Exception('Invalid Credentials.');

            $EmployeeModel = new \App\Models\EmployeeModel();
            $EmployeeLoginDetailModel = new \App\Models\EmployeeLoginDetailModel();

            $requestPayload = $this->request->getJSON();
            $username = $requestPayload->username ?? null;
            $password = $requestPayload->password ?? null;

            if (!$username || !$password) throw new \Exception('กรุณาตรวจสอบ username หรือ password ของท่าน');

            $employees = $EmployeeModel->getEmployee($username);

            if ($employees) {

                foreach ($employees as $employee) {

                    if ($employee->login_fail < 5) {

                        if (password_verify($password, $employee->password)) {

                            $EmployeeModel->updateEmployeeByID($employee->id, ['login_fail' => 0]);

                            $employeeloginDetailID = $EmployeeLoginDetailModel->insertEmployeeLoginDetail([
                                'employee_id' => $employee->id
                            ]);

                            if($employee->roles == 1){
                                $roles = 'Admin';
                            }else{
                                $roles = 'Custom User';
                            }

                            // $EmployeeSettingStatusModel = new EmployeeSettingStatusModel();
                            $PositionModel = new \App\Models\PositionModel();
                            //หาการเข้าถึง
                            // $check_id   = $EmployeeSettingStatusModel->getEmployee_Setting_Status_ByID($employee->position_id);
                            $position_name   = $PositionModel->getPositionByID($employee->position_id);

                            // $employee_setting_status_document = 0;
                            // $employee_setting_status_report = 0;
                            // $employee_setting_status_setting = 0;
                            // $employee_setting_status_landing = 0;
                            // $employee_setting_status_buy_type = 0;
                            // $employee_setting_status_check_car = 0;
                            // $employee_setting_status_doc_payment = 0;
                            // $employee_setting_status_employee = 0;
                            // $employee_setting_status_seller = 0;
                            // $employee_setting_status_customer = 0;
                            // $employee_setting_status_car_stock = 0;
                            // $employee_setting_status_cut_release = 0;
                            // $employee_setting_status_booking = 0;
                            // $employee_setting_status_cost_in_car_stock = 0;
                            // $employee_setting_status_profit_in_cut_release = 0;
                            // $employee_setting_status_manager_approval = 0;
                            // $employee_setting_status_customer_seller = 0;
                            // $employee_setting_status_report_summary = 0;
                            // $employee_setting_status_cashflow_dashboard = 0;
                            // $employee_setting_status_cost_in_car_show = 0;
                            // $employee_setting_status_registration = 0;
                            // $employee_setting_status_acclimate = 0;
                            // $employee_setting_status_loan_work = 0;

                            // if($check_id == null){

                            //     if($position_name->position_name == 'Admin'){
                            //         $EmployeeSettingStatusModel->insertEmployee_Setting_Status([
                            //             "position_id" =>  $employee->position_id,
                            //             "employee_setting_status_document" => 1,
                            //             "employee_setting_status_report" => 1,
                            //             "employee_setting_status_setting" => 1,
                            //             "employee_setting_status_landing" => 1,
                            //             "employee_setting_status_buy_type" => 1,
                            //             "employee_setting_status_check_car" => 1,
                            //             "employee_setting_status_doc_payment" => 1,
                            //             "employee_setting_status_employee" => 1,
                            //             "employee_setting_status_seller" => 1,
                            //             "employee_setting_status_customer" => 1,
                            //             "employee_setting_status_car_stock" => 1,
                            //             "employee_setting_status_cut_release" => 1,
                            //             "employee_setting_status_booking" => 1,
                            //             "employee_setting_status_cost_in_car_stock" => 1,
                            //             "employee_setting_status_profit_in_cut_release" => 1,
                            //             "employee_setting_status_manager_approval" => 1,
                            //             "employee_setting_status_customer_seller" => 1,
                            //             "employee_setting_status_report_summary" => 1,
                            //             "employee_setting_status_cashflow_dashboard" => 1,
                            //             "employee_setting_status_cost_in_car_show" => 1,
                            //             "employee_setting_status_registration" => 1,
                            //             "employee_setting_status_acclimate" => 1,
                            //             "employee_setting_status_loan_work" => 1,
                            //             'created_at' => date('Y-m-d H:i:s')
                            //         ]);

                            //         $employee_setting_status_document = 1;
                            //         $employee_setting_status_report = 1;
                            //         $employee_setting_status_setting = 1;
                            //         $employee_setting_status_landing = 1;
                            //         $employee_setting_status_buy_type = 1;
                            //         $employee_setting_status_check_car = 1;
                            //         $employee_setting_status_doc_payment = 1;
                            //         $employee_setting_status_employee = 1;
                            //         $employee_setting_status_seller = 1;
                            //         $employee_setting_status_customer = 1;
                            //         $employee_setting_status_car_stock = 1;
                            //         $employee_setting_status_cut_release = 1;
                            //         $employee_setting_status_booking = 1;
                            //         $employee_setting_status_cost_in_car_stock = 1;
                            //         $employee_setting_status_profit_in_cut_release = 1;
                            //         $employee_setting_status_manager_approval = 1;
                            //         $employee_setting_status_customer_seller = 1;
                            //         $employee_setting_status_report_summary = 1;
                            //         $employee_setting_status_cashflow_dashboard = 1;
                            //         $employee_setting_status_cost_in_car_show = 1;
                            //         $employee_setting_status_registration = 1;
                            //         $employee_setting_status_acclimate = 1;
                            //         $employee_setting_status_loan_work = 1;
                            //     }
                            //     else
                            //     {
                            //         $EmployeeSettingStatusModel->insertEmployee_Setting_Status([
                            //             "position_id" =>  $employee->position_id,
                            //             "employee_setting_status_document" => 0,
                            //             "employee_setting_status_report" => 0,
                            //             "employee_setting_status_setting" => 0,
                            //             "employee_setting_status_landing" => 0,
                            //             "employee_setting_status_buy_type" => 0,
                            //             "employee_setting_status_check_car" => 0,
                            //             "employee_setting_status_doc_payment" => 0,
                            //             "employee_setting_status_employee" => 0,
                            //             "employee_setting_status_seller" => 0,
                            //             "employee_setting_status_customer" => 0,
                            //             "employee_setting_status_car_stock" => 0,
                            //             "employee_setting_status_cut_release" => 0,
                            //             "employee_setting_status_booking" => 0,
                            //             "employee_setting_status_cost_in_car_stock" => 0,
                            //             "employee_setting_status_profit_in_cut_release" => 0,  
                            //             "employee_setting_status_manager_approval" => 0,
                            //             "employee_setting_status_customer_seller" => 0,           
                            //             "employee_setting_status_report_summary" => 0, 
                            //             "employee_setting_status_cashflow_dashboard" => 0,
                            //             "employee_setting_status_cost_in_car_show" => 0,
                            //             "employee_setting_status_registration" => 0,
                            //             "employee_setting_status_acclimate" => 0,
                            //             "employee_setting_status_loan_work" => 0,
                            //             'created_at' => date('Y-m-d H:i:s')
                            //         ]);
                            //     }
                            // }
                            // else
                            // {
                            //     $employee_setting_status_document = $check_id->employee_setting_status_document;
                            //     $employee_setting_status_report = $check_id->employee_setting_status_report;
                            //     $employee_setting_status_setting = $check_id->employee_setting_status_setting;
                            //     $employee_setting_status_landing = $check_id->employee_setting_status_landing;
                            //     $employee_setting_status_buy_type = $check_id->employee_setting_status_buy_type;
                            //     $employee_setting_status_check_car = $check_id->employee_setting_status_check_car;
                            //     $employee_setting_status_doc_payment = $check_id->employee_setting_status_doc_payment;
                            //     $employee_setting_status_employee = $check_id->employee_setting_status_employee;
                            //     $employee_setting_status_seller = $check_id->employee_setting_status_seller;
                            //     $employee_setting_status_customer = $check_id->employee_setting_status_customer;
                            //     $employee_setting_status_car_stock = $check_id->employee_setting_status_car_stock;
                            //     $employee_setting_status_cut_release = $check_id->employee_setting_status_cut_release;
                            //     $employee_setting_status_booking = $check_id->employee_setting_status_booking;
                            //     $employee_setting_status_cost_in_car_stock = $check_id->employee_setting_status_cost_in_car_stock;
                            //     $employee_setting_status_profit_in_cut_release = $check_id->employee_setting_status_profit_in_cut_release;
                            //     $employee_setting_status_manager_approval = $check_id->employee_setting_status_manager_approval;
                            //     $employee_setting_status_customer_seller = $check_id->employee_setting_status_customer_seller;
                            //     $employee_setting_status_report_summary = $check_id->employee_setting_status_report_summary;
                            //     $employee_setting_status_cashflow_dashboard = $check_id->employee_setting_status_cashflow_dashboard;
                            //     $employee_setting_status_cost_in_car_show = $check_id->employee_setting_status_cost_in_car_show;
                            //     $employee_setting_status_registration = $check_id->employee_setting_status_registration;
                            //     $employee_setting_status_acclimate = $check_id->employee_setting_status_acclimate;
                            //     $employee_setting_status_loan_work = $check_id->employee_setting_status_loan_work;
                            // }
                            

                            // หาตำแหน่ง
                            $position = '';
                            if ($employee->position_id != '') {
                                $PositionModel = new \App\Models\PositionModel();
                                $position = $PositionModel->getPositionByID($employee->position_id)->position_name;
                            }

                            session()->set([
                                'employeeID' => $employee->id,
                                'username' => $employee->username,
                                'employee_fullname' => $employee->name, // ชื่อพนักงาน
                                'employee_nickname' => $employee->nickname,
                                'employee_position_name' => $position, // ตำแหน่งพนักงาน
                                'thumbnail' => $employee->thumbnail,
                                'isEmployeeLoggedIn' => true,
                                'login_detail_id' => $employeeloginDetailID,
                                'companies_id' => $employee->companies_id,
                                'name' => $employee->name, // ชื่อพนักงาน
                                'role' => $roles,
                                // 'status_document' => $employee_setting_status_document,
                                // 'status_report' => $employee_setting_status_report,
                                // 'status_setting' => $employee_setting_status_setting,
                                // 'status_landing' => $employee_setting_status_landing,
                                // 'status_buy_type' => $employee_setting_status_buy_type,
                                // 'status_check_car' => $employee_setting_status_check_car,
                                // 'status_doc_payment' => $employee_setting_status_doc_payment,
                                // 'status_employee' => $employee_setting_status_employee,
                                // 'status_seller' => $employee_setting_status_seller ,
                                // 'status_customer' => $employee_setting_status_customer ,
                                // 'status_car_stock' => $employee_setting_status_car_stock ,
                                // 'status_cut_release' => $employee_setting_status_cut_release, 
                                // 'status_booking' => $employee_setting_status_booking ,
                                // 'status_cost_in_car_stock' => $employee_setting_status_cost_in_car_stock,
                                // 'status_profit_in_cut_release' => $employee_setting_status_profit_in_cut_release,
                                // 'status_manager_approval' => $employee_setting_status_manager_approval,
                                // 'status_customer_seller' => $employee_setting_status_customer_seller,
                                // 'status_report_summary' => $employee_setting_status_report_summary,
                                // 'status_cashflow_dashboard' => $employee_setting_status_cashflow_dashboard,
                                // 'status_cost_in_car_show' => $employee_setting_status_cost_in_car_show,
                                // 'status_registration' => $employee_setting_status_registration,
                                // 'status_acclimate' => $employee_setting_status_acclimate,
                                // 'status_loan_work' => $employee_setting_status_loan_work,
                            ]);

                            session()->setFlashdata('announce', true);

                            // //pusher Login
                            // $pusher = getPusher();
                            // $pusher->trigger('color_Status', 'event', [
                            //     'img' => '/uploads/img/' . session()->get('thumbnail') != '' ? session()->get('thumbnail') : 'nullthumbnail.png',
                            //     'event' => 'status_Green',
                            //     'title' => $employee->username . " : " . 'เข้าสู่ระบบ Backoffice'
                            // ]);

                            logger_store([
                                'employee_id' => $employee->id,
                                'username' => $employee->username,
                                'event' => 'เข้าสู่ระบบ',
                                'detail' => 'เข้าสู่ระบบ Backoffice',
                                'ip' => $this->request->getIPAddress()
                            ]);

                            $status = 200;
                            $response['success'] = 1;
                            $response['message'] = 'เข้าสู่ระบบสำเร็จ';

                            $response['redirect_to'] = base_url('/dashboard');
                        } else {
                            $missedTotal = $employee->login_fail + 1;
                            $EmployeeModel->updateEmployeeByID($employee->id, ['login_fail' => $missedTotal]);
                            throw new \Exception('กรุณาตรวจสอบ username หรือ password ของท่าน ' . "$missedTotal/5");
                        }
                    } else {
                        throw new \Exception('User ของท่านถูกล็อค');
                    }
                }
            } else {
                throw new \Exception('กรุณาตรวจสอบ username หรือ password ของท่าน');
            }
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();
        }

        return $this->response
            ->setStatusCode($status)
            ->setContentType('application/json')
            ->setJSON($response);
    }

    public function logout()
    {
        try {
            $EmployeeLoginDetailModel = new \App\Models\EmployeeLoginDetailModel();
            $EmployeeLoginDetailModel->updateEmployeeLoginDetailByID(session()->get('login_detail_id'), ['active' => '0']);

            // // pusherAdd
            // $pusher = getPusher();
            // $pusher->trigger('color_Status', 'event', [
            //     'img' => '/uploads/img/' . session()->get('thumbnail') != '' ? session()->get('thumbnail') : 'nullthumbnail.png',
            //     'event' => 'status_Red',
            //     'title' => session()->get('username') . " : " . 'ออกจากระบบ Backoffice'
            // ]);

            logger_store([
                'employee_id' => session()->get('employeeID'),
                'username' => session()->get('username'),
                'event' => 'ออกจากระบบ',
                'detail' => 'ออกจากระบบ Backoffice',
                'ip' => $this->request->getIPAddress()
            ]);

            session()->destroy();

            return redirect()->to('/');
        } catch (\Exception $e) {
            //            echo $e->getMessage();
        }
    }
}
