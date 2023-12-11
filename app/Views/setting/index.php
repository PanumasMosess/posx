<style>
  .form-control:disabled,
  .form-control[readonly] {
    background-color: #ffffff;
  }

  .email-container {
    border: 1px solid #ccc;
    padding: 5px;
  }

  .email-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 0;
  }

  .email {
    flex: 1;
  }

  .remove-btn {
    padding: 5px 10px;
    background-color: #ff0000;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  .add-container {
    display: flex;
    align-items: center;
    gap: 10px;
    /* margin-top: 5px; */
  }

  /* .input-container {
    position: relative;
    display: inline-block;
  } */

  /* .percentage-sign {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
  } */

  /* ให้คลาส bg-warning เป็นสีจางลง */
  .bg-warning-light {
    background-color: #fff3cd;
    /* เปลี่ยนค่า alpha (0.5) เพื่อทำให้สีพื้นหลังเป็นสีจางลง */
  }

  #tableEmployeePinPos td,
  #tableEmployeePinStock td,
  #tableMobile td,
  #tablePaymentType td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
<div class="main_content_iner">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card mb_30">
          <div class="white_card_header">
            <div class="bulder_tab_wrapper">
              <ul class="nav" id="stockTab" role="tablist">
                <!-- <li class="nav-item">
                  <a class="nav-link" id="position-tab" data-bs-toggle="tab" href="#position" role="tab" aria-controls="position" aria-selected="false">ตำแหน่ง</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="branch-tab" data-bs-toggle="tab" href="#branch" role="tab" aria-controls="branch" aria-selected="false">สาขา</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link active" id="information-tab" data-bs-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="user-accounts-tab" data-bs-toggle="tab" href="#user_accounts" role="tab" aria-controls="user_accounts" aria-selected="false">User Accounts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pos-pin-tab" data-bs-toggle="tab" href="#pos_pin" role="tab" aria-controls="pos_pin" aria-selected="false">POS Employees PIN</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="stock-pin-tab" data-bs-toggle="tab" href="#stock_pin" role="tab" aria-controls="stock_pin" aria-selected="false">Stock Employees PIN</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="mobile-tab" data-bs-toggle="tab" href="#mobile" role="tab" aria-controls="mobile" aria-selected="false">Mobile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="payment-type-tab" data-bs-toggle="tab" href="#payment_type" role="tab" aria-controls="payment_type" aria-selected="false">Payment Type</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="printer-seting-tab" data-bs-toggle="tab" href="#printer_seting" role="tab" aria-controls="printer_seting" aria-selected="false">Printer Seting</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="white_card_body">
            <div class="tab-content" id="settingTabContent">
              <!-- <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="position-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddPosition();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มตำแหน่ง</a></div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tablePosition">
                        <thead>
                          <tr>
                            <th style="width: 50px;" scope="col">#</th>
                            <th style="width: 350px;" scope="col">ชื่อตำแหน่ง</th>
                            <th style="width: 200px;" scope="col">สร้างขึ้นเมื่อ</th>
                            <th style="width: 200px;" scope="col">แก้ไขล่าสุด</th>
                            <th style="width: 100px;" scope="col">จัดการ</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="branch" role="tabpanel" aria-labelledby="branch-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddBranch();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มสาขา</a></div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tableBranch">
                        <thead>
                          <tr>
                            <th style="width: 50px;" scope="col">#</th>
                            <th style="width: 250px;" scope="col">ชื่อสาขา</th>
                            <th style="width: 250px;" scope="col">สร้างขึ้นเมื่อ</th>
                            <th style="width: 250px;" scope="col">แก้ไขล่าสุด</th>
                            <th style="width: 100px;" scope="col">จัดการ</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                <div class="builder_select">
                  <div class="board_wrapper">
                    <div class="single_board">
                      <div class="main_board_card">
                        <div class="row">
                          <div class="col-lg-12 col-xl-6 col-md-12">
                            <div class="white_card card_height_100 mb_20">
                              <div class="main-title">
                                <h3 class="mb-2">User Info</h3>
                              </div>
                              <form class="row mb-3">
                                <div class="col-md-6">
                                  <div class="input-group mb-2">
                                    <div class="input-group-text col-md-2">
                                      <div class="">Username</div>
                                    </div>
                                    <input type="text" class="form-control" id="information_username" placeholder="Username" value="<?php echo $companies->companies_user; ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="input-group mb-2">
                                    <div class="input-group-text col-md-2">
                                      <div class="">Password</div>
                                    </div>
                                    <a type="text" href="#" class="form-control" placeholder="Password" aria-label="password" id="password" data-bs-toggle="modal" data-bs-target="#EditPasswordCompanies" aria-describedby="basic-addon1">******</a>
                                  </div>
                                </div>
                              </form>
                              <div class="main-title">
                                <h3 class="mb-2">Shop Info</h3>
                              </div>
                              <div class="col-md-12 mb-3">
                                <div class="input-group">
                                  <div class="input-group-text col-md-1">
                                    <div class="">ชื่อร้าน</div>
                                  </div>
                                  <input class="form-control" placeholder="shopname" aria-label="shopname" id="shopname" aria-describedby="basic-addon1">
                                </div>
                              </div>
                              <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary" href="#" id="EditInformation">Edit</button>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12 col-xl-6 col-md-12">
                            <div class="white_card card_height_100 mb_20">
                              <div class="main-title">
                                <h3 class="mb-2">Set Parameters</h3>
                              </div>
                              <form class="row mb-3">
                                <div class="col-md-3">
                                  <div class="input-group">
                                    <div class="input-group-text col-md-8">
                                      <div class="">Service Charge (%)</div>
                                    </div>
                                    <div class="input-container col-md-4">
                                      <input type="text" class="form-control" placeholder="0.00" aria-label="service_charge" id="service_charge" aria-describedby="basic-addon1">
                                      <span class="percentage-sign">%</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="input-group">
                                    <div class="input-group-text col-md-8">
                                      <div class="">ส่วนลด (%)</div>
                                    </div>
                                    <div class="input-container col-md-4">
                                      <input type="text" class="form-control discount-text" placeholder="0.00" aria-label="discount" id="discount" aria-describedby="basic-addon1">
                                      <span class="percentage-sign">%</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="input-group">
                                    <div class="input-group-text col-md-3">
                                      <div class="">Discount Mode</div>
                                    </div>
                                    <select class="form-select" name="discount_mode" id="discount_mode">
                                      <option value="0">% ส่วนลดท้ายบิล</option>
                                      <option value="1">ส่วนลดราคา</option>
                                      <option value="2">% ลดเปอร์เซ็น (โดยไม่รวมสินค้าที่มีการลดแล้ว)</option>
                                    </select>
                                  </div>
                                </div>
                              </form>
                              <div class="main-title">
                                <h3 class="mb-2">Tax</h3>
                              </div>
                              <form class="row mb-3">
                                <div class="col-md-3">
                                  <div class="input-group">
                                    <div class="input-group-text col-md-5">
                                      <div class="">Tax Status</div>
                                    </div>
                                    <select class="form-select" name="taxStatus" id="taxStatus">
                                      <option value="0">No</option>
                                      <option value="1">Active</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="input-group">
                                    <div class="input-group-text col-md-5">
                                      <div class="">Tax Id</div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Tax Id" aria-label="taxId" id="taxId" aria-describedby="basic-addon1">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="input-group">
                                    <div class="input-group-text col-md-5">
                                      <div class="">VAT Mode</div>
                                    </div>
                                    <select class="form-select" name="taxMode" id="taxMode">
                                      <option value="0">No Vat</option>
                                      <option value="1">Included</option>
                                      <option value="2">Excluded</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="input-group">
                                    <div class="input-group-text col-md-8">
                                      <div class="">Rate (%)</div>
                                    </div>
                                    <div class="input-container col-md-4">
                                      <input type="text" class="form-control" placeholder="0.00" aria-label="taxRate" id="taxRate" aria-describedby="basic-addon1">
                                      <span class="percentage-sign">%</span>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary" href="#" id="EditInformation">Edit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                <div class="main_content_iner ">
                  <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                      <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                          <div class="box_header m-0">
                            <div class="main-title">
                              <h3 class="m-0">Setting Info</h3>
                            </div>
                          </div>
                        </div>
                        <div class="white_card_body">
                          <label class="form-label">User Info</label>
                          <!-- <h5 class="card-title font-16">User Info</h5> -->
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Username</div>
                            </div>
                            <input type="text" class="form-control" id="information_username" placeholder="Username" value="<?php echo $companies->companies_user; ?>" readonly>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Password</div>
                            </div>
                            <a type="text" href="#" class="form-control" placeholder="Password" aria-label="password" id="password" data-bs-toggle="modal" data-bs-target="#EditPasswordCompanies" aria-describedby="basic-addon1">******</a>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text col-md-3">
                              <span>Email Report</span>
                            </div>
                            <div class="col-md-9">
                              <?php if ($email_reports == null) {
                                $displayEmail = 'style="display: none"';
                              } else {
                                $displayEmail = '';
                              } ?>
                              <div class="email-container" <?php echo $displayEmail; ?>>
                                <?php foreach ($email_reports as $email_report) { ?>
                                  <div class="email-row" data-id="<?php echo $email_report->id; ?>">
                                    <p class="email"><?php echo $email_report->email; ?></p>
                                    <button type="button" class="btn btn-danger f_s_14" onclick="removeEmail(this.parentNode)"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button>
                                  </div>
                                <?php } ?>
                              </div>
                              <div class="add-container">
                                <input class="form-control add-input" type="text" placeholder="Enter email report" aria-label="addemail" id="addemail" aria-describedby="basic-addon1">
                                <button type="submit" class="btn btn-primary f_s_14" id="AddEmail">Add</button>
                              </div>
                            </div>
                          </div>
                          <label class="form-label">Shop Info</label>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">ชื่อร้าน</div>
                            </div>
                            <input class="form-control" placeholder="shopname" aria-label="shopname" id="shopname" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">หน่วยค่าเงินระบบ</div>
                            </div>
                            <select class="form-select" name="valueMoney" id="valueMoney">
                              <option value="">--- เลือก ---</option>
                              <option value="THB">บาท (฿)</option>
                              <option value="USD">ดอลล่า ($)</option>
                              <option value="LAK">กีบ</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12">
                      <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                          <div class="box_header m-0">
                            <div class="main-title">
                              <h3 class="m-0">Setting Parameters/Tax</h3>
                            </div>
                          </div>
                        </div>
                        <div class="white_card_body">
                          <label class="form-label">Set Parameters</label>
                          <!-- <h5 class="card-title font-16">User Info</h5> -->
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Service Charge (%)</div>
                            </div>
                            <input type="text" class="form-control" placeholder="0.00" aria-label="service_charge" id="service_charge" aria-describedby="basic-addon1">
                            <div class="input-group-text">
                              <span class="">%</span>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">ส่วนลด (%)</div>
                            </div>
                            <input type="text" class="form-control discount-text" placeholder="0.00" aria-label="discount" id="discount" aria-describedby="basic-addon1">
                            <div class="input-group-text">
                              <span class="">%</span>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Discount Mode</div>
                            </div>
                            <select class="form-select" name="discount_mode" id="discount_mode">
                              <option value="0">% ส่วนลดท้ายบิล</option>
                              <option value="1">ส่วนลดราคา</option>
                              <option value="2">% ลดเปอร์เซ็น (โดยไม่รวมสินค้าที่มีการลดแล้ว)</option>
                            </select>
                          </div>
                          <label class="form-label">Tax</label>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Tax Status</div>
                            </div>
                            <select class="form-select" name="taxStatus" id="taxStatus">
                              <option value="0">No</option>
                              <option value="1">Active</option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Tax Id</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Tax Id" aria-label="taxId" id="taxId" aria-describedby="basic-addon1">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">VAT Mode</div>
                            </div>
                            <select class="form-select" name="taxMode" id="taxMode">
                              <option value="0">No Vat</option>
                              <option value="1">Included</option>
                              <option value="2">Excluded</option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Rate (%)</div>
                            </div>
                            <input type="text" class="form-control" placeholder="0.00" aria-label="taxRate" id="taxRate" aria-describedby="basic-addon1">
                            <div class="input-group-text">
                              <span class="">%</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" href="#" id="EditInformation" style="float: right; margin-top: -18px;">Edit</button>
                  <!-- <div class="row">
                    <div class="col-xl-11 col-lg-12 col-md-12">
                    </div>
                    <div class="col-xl-1 col-lg-12 col-md-12">
                      <button type="submit" class="btn btn-primary" href="#" id="EditInformation" style="float: right; margin-top: -15px;">Edit</button>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="tab-pane fade" id="user_accounts" role="tabpanel" aria-labelledby="user-accounts-tab">
                <div class="main_content_iner ">
                  <div class="row">
                    <div class="col-lg-12 col-xl-6 col-md-12">
                      <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                          <div class="box_header m-0">
                            <div class="main-title">
                              <h3 class="m-0">Users Accounts</h3>
                            </div>
                            <div class="header_more_tool">
                              <div class="action_btns d-flex">
                                <a href="javascript:void(0);" class="white_btn3" id="addUserBtn"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-md-8">
                          <div class="white_card_header">
                            <div class="main-title">
                              <h3 class="m-0">Users Accounts</h3>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                          <a href="javascript:void(0);" class="white_btn3 mb-3" id="addUserBtn"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                        </div> -->
                        <div class="white_card_body">
                          <div class="A list-group" data-bind="foreach: list">
                            <?php foreach ($employees as $employee) { ?>
                              <?php if ($employee->roles == 1) {
                                $roles = 'Admin';
                              } else {
                                $roles = 'Custom User';
                              } ?>
                              <a class="list-group-item editUser" data-id="<?php echo $employee->id; ?>" style="cursor: pointer;">
                                <span><?php echo $employee->username ?></span>
                                <span class="roles" style="margin-left: 15px; font-size: 0.8em; font-style: italic; color: gray"> ( <?php echo $roles ?> )</span>
                              </a>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12">
                      <div id="newUser" style="display: none">
                        <div class="white_card card_height_100 mb_20">
                          <div class="white_card_header">
                            <div class="box_header m-0 mt-2 mb-3">
                              <div class="main-title">
                                <h3 class="m-0">สร้าง User Login</h3>
                              </div>
                            </div>
                          </div>
                          <div class="white_card_body">
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <div class="">Username</div>
                              </div>
                              <input class="form-control" placeholder="Username" aria-label="username" id="username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <div class="">Password</div>
                              </div>
                              <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
                              <div class="input-group-text">
                                <span toggle="#user_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <div class="">Re Password</div>
                              </div>
                              <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re Password">
                              <div class="input-group-text">
                                <span toggle="#repassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <span>Name</span>
                              </div>
                              <div class="form-group col-md-9">
                                <input class="form-control" placeholder="Name" aria-label="name_userlogin" id="name_userlogin" aria-describedby="basic-addon1">
                              </div>
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-9 mt-2">
                                <span class="help-inline">ชื่อจะแสดงตอนพิมพ์ใบเสร็จ</span>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <span>Role</span>
                              </div>
                              <div class="col-md-9">
                                <select class="form-select" name="roles" id="roles">
                                  <option value="1">Admin</option>
                                  <option value="0">Custom User</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-9 mt-2">
                                <span class="help-inline">กำหนดสิทธิ์การใช้งาน <br>Admin สามารถใช้งานได้ทุก Features<br>Custom User สามารถกำหนดการใช้งานบาง Feature ได้</span>
                                <!-- เงื่อนไขสำหรับแสดง/ซ่อนกล่องเช็ค -->
                                <ul id="checkboxes" style="list-style-type: none; display: none;margin-top: 5px;">
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Pos" id="checkbox_Pos">
                                      <span class="custom-control-label custom-control-label-md">POS</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Report" id="checkbox_Report">
                                      <span class="custom-control-label custom-control-label-md">REPORT</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Menu" id="checkbox_Menu">
                                      <span class="custom-control-label custom-control-label-md">MENU</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Expense" id="checkbox_Expense">
                                      <span class="custom-control-label custom-control-label-md">EXPENSE</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Stock" id="checkbox_Stock">
                                      <span class="custom-control-label custom-control-label-md">STOCK</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Setting" id="checkbox_Setting">
                                      <span class="custom-control-label custom-control-label-md">SETTING</span>
                                    </label>
                                  </li>
                                </ul>
                                <!-- <br>
                            <button type="submit" class="btn btn-primary mt-2" href="#" id="saveNewUser">Add</button> -->
                              </div>
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-9">
                                <button type="submit" class="btn btn-primary mt-2" href="#" id="saveNewUser">Add</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="user-detail" style="display: none">
                        <div class="white_card card_height_100 mb_20">
                          <div class="white_card_header">
                            <div class="box_header m-0 mt-2 mb-3">
                              <div class="main-title">
                                <h3 class="m-0">รายละเอียด</h3>
                              </div>
                            </div>
                          </div>
                          <div class="white_card_body">
                            <input type="hidden" name="editUserID" id="editUserID" />
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <span>Username</span>
                              </div>
                              <div class="form-group col-md-9">
                                <input type="text" class="form-control" placeholder="Username" aria-label="edit_username" id="edit_username" aria-describedby="basic-addon1" readonly>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <span>Name</span>
                              </div>
                              <div class="form-group col-md-9">
                                <input class="form-control" placeholder="Name" aria-label="edit_name_userlogin" id="edit_name_userlogin" aria-describedby="basic-addon1">
                              </div>
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-9 mt-1">
                                <span class="help-inline">ชื่อจะแสดงตอนพิมพ์ใบเสร็จ</span>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-text col-md-3">
                                <span>Role</span>
                              </div>
                              <div class="col-md-9">
                                <select class="form-select" name="edit_roles" id="edit_roles">
                                  <option value="1">Admin</option>
                                  <option value="0">Custom User</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-9 mt-1">
                                <span class="help-inline">กำหนดสิทธิ์การใช้งาน <br>Admin สามารถใช้งานได้ทุก Features<br>Custom User สามารถกำหนดการใช้งานบาง Feature ได้</span>
                                <!-- เงื่อนไขสำหรับแสดง/ซ่อนกล่องเช็ค -->
                                <ul id="editcheckboxes" style="list-style-type: none; display: none;margin-top: 5px;">
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Edit_Pos" id="checkbox_Edit_Pos">
                                      <span class="custom-control-label custom-control-label-md">POS</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Edit_Report" id="checkbox_Edit_Report">
                                      <span class="custom-control-label custom-control-label-md">REPORT</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Edit_Menu" id="checkbox_Edit_Menu">
                                      <span class="custom-control-label custom-control-label-md">MENU</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Edit_Expense" id="checkbox_Edit_Expense">
                                      <span class="custom-control-label custom-control-label-md">EXPENSE</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md mb-1">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Edit_Stock" id="checkbox_Edit_Stock">
                                      <span class="custom-control-label custom-control-label-md">STOCK</span>
                                    </label>
                                  </li>
                                  <li>
                                    <label class="custom-control custom-checkbox custom-control-md">
                                      <input type="checkbox" class="custom-control-input" name="checkbox_Edit_Setting" id="checkbox_Edit_Setting">
                                      <span class="custom-control-label custom-control-label-md">SETTING</span>
                                    </label>
                                  </li>
                                </ul>
                                <!-- <br>
                            <button type="submit" class="btn btn-primary mt-2 me-2 saveEditUser" href="#">Edit</button>
                            <button type="submit" class="btn btn-danger mt-2 saveRemoveUser">Remove</button> -->
                              </div>
                              <div class="col-md-3">
                              </div>
                              <div class="col-md-9">
                                <button type="submit" class="btn btn-primary mt-2 me-2 saveEditUser" href="#">Edit</button>
                                <button type="submit" class="btn btn-danger mt-2 saveRemoveUser">Remove</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pos_pin" role="tabpanel" aria-labelledby="pos-pin-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="row">
                    <div class="col-md-10 mt-3">
                      <div class="main-title">
                        <h3 class="m-0">Employee PIN ใช้สำหรับให้พนักงานคีย์ Order ในหน้าการขาย POS</h3>
                      </div>
                      <!-- <h5 style="display: inline" class="panel-title">Employee PIN ใช้สำหรับให้พนักงานคีย์ Order ในหน้าการขาย POS</h5> -->
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                      <a href="javascript:void(0);" class="white_btn3 mb-3" onclick="openModalAddEmployeePinPos();"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                    </div>
                  </div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tableEmployeePinPos">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>PIN</th>
                            <th>Permission (For cashier or manager)</th>
                            <th>Hide Cashier</th>
                            <th>Acitons</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="stock_pin" role="tabpanel" aria-labelledby="stock-pin-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="row">
                    <div class="col-md-10 mt-3">
                      <div class="main-title">
                        <h3 class="m-0">STOCK Employee PIN ใช้สำหรับหน้า Stock</h3>
                      </div>
                      <!-- <h5 style="display: inline" class="panel-title">STOCK Employee PIN ใช้สำหรับหน้า Stock</h5> -->
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                      <a href="javascript:void(0);" class="white_btn3 mb-3" onclick="openModalAddEmployeePinStock();"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                    </div>
                  </div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tableEmployeePinStock">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>PIN</th>
                            <th>Permission</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="mobile" role="tabpanel" aria-labelledby="mobile-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="row">
                    <div class="col-md-10 mt-3">
                      <div class="main-title">
                        <h3 class="m-0">Paired mobiles (เชื่อมต่อการสั่งอาหารผ่านมือถือ Package 1390+)</h3>
                      </div>
                      <!-- <h5 style="display: inline" class="panel-title">Paired mobiles (เชื่อมต่อการสั่งอาหารผ่านมือถือ Package 1390+)</h5> -->
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                      <a href="javascript:void(0);" class="white_btn3 mb-3" onclick="openModalAddMobile();"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                    </div>
                  </div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tableMobile">
                        <thead>
                          <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th class="text-center" style="width: 350px;">Device Id</th>
                            <th class="text-center" style="width: 350px;">Model</th>
                            <th class="text-center" style="width: 400px;">Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="payment_type" role="tabpanel" aria-labelledby="payment-type-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="row">
                    <div class="col-md-10 mt-3">
                      <!-- <div class="main-title">
                        <h3 class="m-0">Payment Type</h3>
                      </div> -->
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                      <a href="javascript:void(0);" class="white_btn3 mb-3" onclick="openModalAddPaymentType();"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                    </div>
                  </div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tablePaymentType">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Credit Card</th>
                            <th>On The House / Entertain</th>
                            <th>Acitons</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="printer_seting" role="tabpanel" aria-labelledby="printer-seting-tab">
                <div class="main_content_iner ">
                  <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                      <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                          <div class="box_header m-0">
                            <div class="main-title">
                              <h3 class="m-0">Setting Info</h3>
                            </div>
                          </div>
                        </div>
                        <div class="white_card_body">
                          <input id='id_printer' type="hidden" />
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Printer Order</div>
                            </div>
                            <input type="text" class="form-control" id="printer_order" placeholder="printer name for print order">
                            <button type="button" class="btn btn-primary f_s_14" onclick="printer_order();"><i class="ti-plus"></i> Add</button>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Printer Bill</div>
                            </div>
                            <input type="text" class="form-control" id="printer_bill" placeholder="printer name for print bill">
                            <button type="button" class="btn btn-primary f_s_14" onclick="printer_bill();"><i class="ti-plus"></i> Add</button>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-text">
                              <div class="">Printer Summary Order</div>
                            </div>
                            <input type="text" class="form-control" id="printer_order_sum" placeholder="printer name for print summary order">
                            <button type="button" class="btn btn-primary f_s_14" onclick="printer_order_sum();"><i class="ti-plus"></i> Add</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12">
                      <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                          <div class="main-title">
                            <h3 class="m-0">File Print Seting</h3>
                          </div>
                        </div>
                        <div class="white_card_body">
                          <form id="addFileSetting" name="addFileSetting" action="#" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="input-group mb-3 b">
                              <input type="file" class="form-control" id="file_setting" accept=".txt, .js" name="file_setting" onchange="encodeImgtoBase64(this);" required>
                              <label class="input-group-text" for="file_order">File ตั้งค่า</label>
                              <input type="hidden" id="file_setting_base64" name="file_setting_base64">
                              <input type="hidden" id="file_old_setting" name="file_old_setting">
                            </div>
                            <button type="submit" class="btn btn-primary f_s_14" style="float:right;"><i class="ti-plus"></i> Add</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Model Add Branch -->
        <!-- <div class="modal fade bd-add-branch" tabindex="-1" role="dialog" aria-labelledby="AddBranchModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddBranch();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่มสาขา</h3>
              </div>
            </div>
          </div>
          <form id="addBranch" name="addBranch" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">สาขา</span>
                </div>
                <input type="text" class="form-control" placeholder="สาขา" aria-label="branch_name" id="branch_name" name="branch_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" onclick="closeModalAddBranch();" class="btn btn-outline-danger m-1">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnSaveBranch">
                  ยืนยัน
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->

        <!-- Model Edit Branch -->
        <!-- <div class="modal fade bd-edit-branch" tabindex="-1" role="dialog" aria-labelledby="EditBranchModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">แก้ไขสาขา</h3>
              </div>
            </div>
          </div>
          <form id="editBranch" name="editBranch" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="BranchId" id="BranchId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">สาขา</span>
                </div>
                <input type="text" class="form-control" placeholder="สาขา" aria-label="branch_name" id="branch_name" name="branch_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnEditSaveBranch">
                  ยืนยัน
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->
        <!-- Model Add Position -->
        <!-- <div class="modal fade bd-add-position" tabindex="-1" role="dialog" aria-labelledby="AddPositionModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddPosition();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่มตำแหน่ง</h3>
              </div>
            </div>
          </div>
          <form id="addPosition" name="addPosition" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">ตำแหน่ง</span>
                </div>
                <input type="text" class="form-control" placeholder="ตำแหน่ง" aria-label="position_name" id="position_name" name="position_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" onclick="closeModalAddPosition();" class="btn btn-outline-danger m-1">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnSavePosition">
                  ยืนยัน
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->

        <!-- Model Edit Position -->
        <!-- <div class="modal fade bd-edit-position" tabindex="-1" role="dialog" aria-labelledby="EditPositionModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">แก้ไขตำแหน่ง</h3>
              </div>
            </div>
          </div>
          <form id="editPosition" name="editPosition" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="PositionId" id="PositionId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">ตำแหน่ง</span>
                </div>
                <input type="text" class="form-control" placeholder="ตำแหน่ง" aria-label="position_name" id="position_name" name="position_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnEditSavePosition">
                  ยืนยัน
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->

        <!-- Model Edit Companies Password -->
        <div class="modal fade" id="EditPasswordCompanies" tabindex="-1" role="dialog" aria-labelledby="EditPasswordModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content p-4">
              <div class="col-lg-12">
                <div class="white_card card_height_100">
                  <button type="button" class="close" aria-label="Close" onclick="closeModalEditPassword();">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="white_card_header">
                    <div class=" m-0">
                      <div class="justify-content-center" style="display:flex;">
                        <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">แก้ไขรหัสผ่าน</h3>
                      </div>
                    </div>
                  </div>
                  <form id="editPasswordCompanies" name="editPasswordCompanies" action="#" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="white_card_body">
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">รหัสผ่านใหม่</span>
                        </div>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="รหัสผ่านใหม่">
                        <div class="input-group-text">
                          <span toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">ยืนยันรหัสผ่านใหม่</span>
                        </div>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่">
                        <div class="input-group-text">
                          <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                      </div>
                      <div class="col-auto justify-content-end" style="display: flex;">
                        <button type="button" class="btn btn-outline-danger m-1" onclick="closeModalEditPassword();">
                          ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-outline-success m-1 btnEditPasswordCompanies">
                          ยืนยัน
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Model Employee PIN POS -->
        <div class="modal fade add-employee-pin-pos" tabindex="-1" role="dialog" aria-labelledby="AddEmployeePinPosModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content p-4">
              <div class="col-lg-12">
                <div class="white_card card_height_100">
                  <button type="button" class="close" aria-label="Close" onclick="closeModalAddEmployeePinPos();">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="white_card_header">
                    <div class=" m-0">
                      <div class="justify-content-center" style="display:flex;">
                        <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่ม Employee PIN POS</h3>
                      </div>
                    </div>
                  </div>
                  <form id="addEmployeePinPos" name="addEmployeePinPos" action="#" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="white_card_body">
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Name" aria-label="username_employee_pos" id="username_employee_pos" name="username_employee_pos" required />
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">New PIN</span>
                        </div>
                        <input type="password" class="form-control" id="new_password_employee_pos" name="new_password_employee_pos" placeholder="New Password">
                        <div class="input-group-text">
                          <span toggle="#new_password_employee_pos" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">Confirm PIN</span>
                        </div>
                        <input type="password" class="form-control" id="confirm_password_employee_pos" name="confirm_password_employee_pos" placeholder="Confirm Password">
                        <div class="input-group-text">
                          <span toggle="#confirm_password_employee_pos" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
                        </div>
                      </div>
                      <div class="col-auto justify-content-end" style="display: flex;">
                        <button type="button" class="btn btn-outline-danger m-1" onclick="closeModalAddEmployeePinPos();">
                          ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-outline-success m-1 btnAddEmployeePinPos">
                          ยืนยัน
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Model Employee PIN STOCK -->
        <div class="modal fade add-employee-pin-stock" tabindex="-1" role="dialog" aria-labelledby="AddEmployeePinStockModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content p-4">
              <div class="col-lg-12">
                <div class="white_card card_height_100">
                  <button type="button" class="close" aria-label="Close" onclick="closeModalAddEmployeePinStock();">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="white_card_header">
                    <div class=" m-0">
                      <div class="justify-content-center" style="display:flex;">
                        <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่ม Employee PIN STOCK</h3>
                      </div>
                    </div>
                  </div>
                  <form id="addEmployeePinStock" name="addEmployeePinStock" action="#" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="white_card_body">
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Name" aria-label="username_employee_stock" id="username_employee_stock" name="username_employee_stock" required />
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">New PIN</span>
                        </div>
                        <input type="password" class="form-control" id="new_password_employee_stock" name="new_password_employee_stock" placeholder="New Password">
                        <div class="input-group-text">
                          <span toggle="#new_password_employee_stock" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-text col-md-5">
                          <span class id="basic-addon1">Confirm PIN</span>
                        </div>
                        <input type="password" class="form-control" id="confirm_password_employee_stock" name="confirm_password_employee_stock" placeholder="Confirm Password">
                        <div class="input-group-text">
                          <span toggle="#confirm_password_employee_stock" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
                        </div>
                      </div>
                      <div class="col-auto justify-content-end" style="display: flex;">
                        <button type="button" class="btn btn-outline-danger m-1" onclick="closeModalAddEmployeePinStock();">
                          ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-outline-success m-1 btnAddEmployeePinStock">
                          ยืนยัน
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Model AddMobileModal -->
        <div class="modal fade add-mobile" tabindex="-1" role="dialog" aria-labelledby="AddMobileModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content p-4">
              <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                  <button type="button" class="close" aria-label="Close" onclick="closeModalAddMobile();">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="white_card_header">
                    <div class=" m-0">
                      <div class="justify-content-center" style="display:flex;">
                        <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่ม Mobile</h3>
                      </div>
                    </div>
                  </div>
                  <form id="addMobile" name="addMobile" action="#" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="white_card_body" style="margin-bottom: -35px;">
                      <div class="input-group mb-3">
                        <div class="input-group-text">
                          <span class id="basic-addon1">Device Id</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Device Id" aria-label="device_id" id="device_id" name="device_id" required />
                      </div>
                      <div class="col-auto justify-content-end" style="display: flex;">
                        <button type="button" onclick="closeModalAddMobile();" class="btn btn-outline-danger m-1">
                          ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-outline-success m-1 btnAddMobile">
                          ยืนยัน
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Model AddPaymentTypeModal -->
        <div class="modal fade add-payment-type" tabindex="-1" role="dialog" aria-labelledby="AddPaymentTypeModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content p-4">
              <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                  <button type="button" class="close" aria-label="Close" onclick="closeModalAddPaymentType();">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="white_card_header">
                    <div class=" m-0">
                      <div class="justify-content-center" style="display:flex;">
                        <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่ม Payment Type</h3>
                      </div>
                    </div>
                  </div>
                  <form id="addPaymentType" name="addPaymentType" action="#" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="white_card_body" style="margin-bottom: -35px;">
                      <div class="input-group mb-3">
                        <div class="input-group-text">
                          <span class id="basic-addon1">Type</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type" aria-label="type" id="type" name="type" required />
                      </div>
                      <div class="col-auto justify-content-end" style="display: flex;">
                        <button type="button" onclick="closeModalAddPaymentType();" class="btn btn-outline-danger m-1">
                          ยกเลิก
                        </button>
                        <button type="submit" class="btn btn-outline-success m-1 btnAddPaymentType">
                          ยืนยัน
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>