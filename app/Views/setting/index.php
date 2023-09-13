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
    margin-top: 5px;
  }

  .input-container {
    position: relative;
    display: inline-block;
  }

  .percentage-sign {
    position: absolute;
    right: 10px;
    /* ปรับตำแหน่งตามที่คุณต้องการ */
    top: 50%;
    transform: translateY(-50%);
  }

  /* ให้คลาส bg-warning เป็นสีจางลง */
  .bg-warning-light {
    background-color: #fff3cd;
    /* เปลี่ยนค่า alpha (0.5) เพื่อทำให้สีพื้นหลังเป็นสีจางลง */
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
                <li class="nav-item">
                  <a class="nav-link active" id="group-product-tab" data-bs-toggle="tab" href="#group_product" role="tab" aria-controls="group_product" aria-selected="true">Group Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="supplier-tab" data-bs-toggle="tab" href="#supplier" role="tab" aria-controls="supplier" aria-selected="false">Supplier</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="position-tab" data-bs-toggle="tab" href="#position" role="tab" aria-controls="position" aria-selected="false">ตำแหน่ง</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="branch-tab" data-bs-toggle="tab" href="#branch" role="tab" aria-controls="branch" aria-selected="false">สาขา</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="information-tab" data-bs-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">Information</a>
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
              </ul>
            </div>
          </div>
          <div class="white_card_body">
            <div class="tab-content" id="settingTabContent">
              <div class="tab-pane fade show active" id="group_product" role="tabpanel" aria-labelledby="group-product-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalGroupProduct();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มหมวดสินค้า</a></div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tableGroupProduct">
                        <thead>
                          <tr>
                            <th style="width: 50px;" scope="col">#</th>
                            <th style="width: 200px;" scope="col">หมวดสินค้า</th>
                            <th style="width: 200px;" scope="col">หน่วยสินค้า</th>
                            <th style="width: 150px;" scope="col">สร้างขึ้นเมื่อ</th>
                            <th style="width: 150px;" scope="col">แก้ไขล่าสุด</th>
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
              <div class="tab-pane fade" id="supplier" role="tabpanel" aria-labelledby="supplier-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddSupplier();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มSupplier</a></div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tableSupplier">
                        <thead>
                          <tr>
                            <th style="width: 20px;" scope="col">#</th>
                            <th style="width: 400px;" scope="col">Supplier</th>
                            <th style="width: 200px;" scope="col">สร้างขึ้นเมื่อ</th>
                            <th style="width: 200px;" scope="col">แก้ไขล่าสุด</th>
                            <th style="width: 75px;" scope="col">จัดการ</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="position-tab">
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
              </div>
              <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
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
                  <div class="input-group mb-3">
                    <div class="input-group-text col-md-2">
                      <span>Email Report</span>
                    </div>
                    <div class="col-md-10">
                      <div class="email-container">
                        <?php foreach ($email_reports as $email_report) { ?>
                          <div class="email-row" data-id="<?php echo $email_report->id; ?>">
                            <p class="email"><?php echo $email_report->email; ?></p>
                            <button type="button" class="btn btn-danger f_s_14" onclick="removeEmail(this.parentNode)"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="add-container">
                        <input class="form-control add-input" type="text" placeholder="Enter email report" aria-label="addemail" id="addemail" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-success f_s_14" id="AddEmail">Add</button>
                      </div>
                    </div>
                  </div>
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

                  <!-- <div class="input-group mb-3">
                    <div class="input-group-text col-md-2">
                      <span>Tax Status</span>
                    </div>
                    <div class="col-md-10">
                      <select class="form-select" name="taxStatus" id="taxStatus">
                        <option value="0">No</option>
                        <option value="1">Active</option>
                      </select>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-text col-md-2">
                      <span>Tax Id</span>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" placeholder="Tax Id" aria-label="taxId" id="taxId" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-text col-md-2">
                      <span>VAT Mode</span>
                    </div>
                    <div class="col-md-10">
                      <select class="form-select" name="taxMode" id="taxMode">
                        <option value="0">No Vat</option>
                        <option value="1">Included</option>
                        <option value="2">Excluded</option>
                      </select>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-text col-md-2">
                      <span>Rate (%)*</span>
                    </div>
                    <div class="input-container col-md-10">
                      <input type="text" class="form-control" placeholder="Rate (%)" aria-label="taxRate" id="taxRate" aria-describedby="basic-addon1">
                      <span class="percentage-sign">%</span>
                    </div>
                  </div> -->
                  <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-primary" href="#" id="EditInformation">Edit</button>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="user_accounts" role="tabpanel" aria-labelledby="user-accounts-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="row" id="account">
                    <div class="col-md-5">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="main-title">
                            <h3 class="mt-2">Users Accounts</h3>
                          </div>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                          <a href="javascript:void(0);" class="white_btn3 mb-3" id="addUserBtn"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                        </div>
                      </div>
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
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                      <div id="newUser" style="display: none">
                        <div class="main-title">
                          <h3 class="mb-3">สร้าง User Login</h3>
                        </div>
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
                      <div id="user-detail" style="display: none">
                        <div class="main-title">
                          <h3 class="mb-3">รายละเอียด</h3>
                        </div>
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
                    <div class="col-md-1">
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pos_pin" role="tabpanel" aria-labelledby="pos-pin-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="row">
                    <div class="col-md-10 mt-3">
                      <h5 style="display: inline" class="panel-title">Employee PIN ใช้สำหรับให้พนักงานคีย์ Order ในหน้าการขาย POS</h5>
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                      <a href="javascript:void(0);" class="white_btn3 mb-3" onclick="openModalAddEmployeePinPos();"><i class="ti-plus"></i>&nbsp;&nbsp;AddNew</a>
                    </div>
                  </div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="tables" id="tableEmployeePinPos">
                        <thead>
                          <tr>
                            <th style="width: 8px;">#</th>
                            <th style="width: 180px;">Name</th>
                            <th style="width: 120px;">PIN</th>
                            <th style="width: 500px;">Permission (For cashier or manager)</th>
                            <th style="width: 100px;">Hide Cashier</th>
                            <th style="width: 200px;">Acitons</th>
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
                      <h5 style="display: inline" class="panel-title">STOCK Employee PIN ใช้สำหรับหน้า Stock</h5>
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                      <a href="javascript:void(0);" class="white_btn3 mb-3" onclick="openModalAddEmployeePinStock();"><i class="ti-plus"></i>&nbsp;&nbsp;AddNew</a>
                    </div>
                  </div>
                  <div class="QA_section">
                    <div class="QA_table mb_30">
                      <table class="table" id="tableEmployeePinStock">
                        <thead>
                          <tr>
                            <th style="width: 20px;">#</th>
                            <th style="width: 90px;">Name</th>
                            <th style="width: 70px;">PIN</th>
                            <th style="width: 640px;">Permission</th>
                            <th style="width: 185px;">Actions</th>
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
                      <h5 style="display: inline" class="panel-title">Paired mobiles (เชื่อมต่อการสั่งอาหารผ่านมือถือ Package 1390+)</h5>
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
                          <tr data-row-id="1" role="row">
                            <td class=" text-center">1</td>
                            <td class=" text-center">c0f65</td>
                            <td class=" text-center"><i class="fa fa-mobile"></i></td>
                            <td class=" text-center">
                            <button type="button" class="btn btn-danger f_s_14"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button>
                            </td>
                          </tr>
                          <tr data-row-id="2" role="row">
                            <td class=" text-center">2</td>
                            <td class=" text-center">d7d57</td>
                            <td class=" text-center"><i class="fa fa-mobile"></i></td>
                            <td class=" text-center">
                            <button type="button" class="btn btn-danger f_s_14"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button>
                            </td>
                          </tr>
                          <tr data-row-id="3" role="row">
                            <td class=" text-center">3</td>
                            <td class=" text-center">as48s</td>
                            <td class=" text-center"><i class="fa fa-mobile"></i></td>
                            <td class=" text-center">
                            <button type="button" class="btn btn-danger f_s_14"><i class="fas fa-trash f_s_13 me-2"></i>Remove</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="payment_type" role="tabpanel" aria-labelledby="payment-type-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                      <h3 class="panel-title">Payment Type</h3>
                    </div>
                    <div class="panel-body" style="color: gray">
                    </div>
                    <div class="row" style="margin: 0px">
                      <div class="col-md-1">
                      </div>
                      <div class="col-md-3">
                        <p>Type</p>
                      </div>
                      <div class="col-md-2">
                        <p>Credit Card</p>
                      </div>
                      <div class="col-md-4 on-the-house">
                        <p style="margin-bottom: 0px">On The House / Entertain</p>
                        <span style="margin-bottom: 10px; background-color: yellow;  font-size: 0.85em; color: gray;  font-style: italic">(All items price will be 0)</span>
                      </div>
                      <div class="col-md-2">
                      </div>
                    </div>
                    <!-- List group -->
                    <ul class="list-group" data-bind="foreach : list ">
                      <li class="list-group-item" style="line-height: 30px">
                        <div class="row">
                          <div class="col-md-1">
                            <i style="color: #ddd; cursor: move" class="fa fa-resize-vertical"></i>
                          </div>
                          <div class="col-md-3">
                            <span style="margin-right: 7px" data-bind="text : ($index() +1) +'. ' "></span>
                            <input style="display: inline-block; font-weight: bold" type="text" data-bind="value :$data.name" class="form-control input-small" placeholder="">
                          </div>
                          <div class="col-md-2" data-bind="visible : $index() != 0">
                            <i data-bind="visible: !$data.isCreditCard(), click: $root.applyCard" class="fa fa-square-o"></i>

                            <i data-bind="visible: $data.isCreditCard, click : $root.applyCard" class="fa fa-check-square-o"></i>
                            Credit Card
                          </div>
                          <div class="col-md-2 on-the-house" data-bind="visible: $index() != 0">
                            <i data-bind="visible: !$data.onTheHouse(), click: $root.applyOnTheHouse" class="fa fa-square-o"></i>

                            <i data-bind="visible: $data.onTheHouse, click: $root.applyOnTheHouse" class="fa fa-check-square-o"></i>
                            Entertain
                          </div>
                          <div class="col-md-2">
                            <a href="#" data-bind="visible: $data.unSave, click: $root.save " class="btn green pull-right">
                              <i class="fa fa-save"></i> Save
                            </a>
                          </div>
                          <div class="col-md-2" data-bind="visible: $index() != 0">
                            <a href="#" data-bind=" click: $root.remove " style="float: right; margin-right: 15px">
                              <i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Remove"></i> Remove
                            </a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <button style="margin-left: 20px; margin-bottom: 20px" class="btn blue" data-bind="click: addNewLine">Add new</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Model Add GroupProduct -->
<div class="modal fade bd-add-group-product" tabindex="-1" role="dialog" aria-labelledby="AddGroupProductModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddGroupProduct();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่มหมวดสินค้า</h3>
              </div>
            </div>
          </div>
          <form id="addGroupProduct" name="addGroupProduct" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">หมวดหมู่สินค้า</span>
                </div>
                <input type="text" class="form-control" placeholder="หมวดหมู่สินค้า" aria-label="category_name" id="category_name" name="category_name" required />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">หน่วยสินค้า</span>
                </div>
                <input type="text" class="form-control" placeholder="หน่วยสินค้า" aria-label="product unit" id="productunit" name="productunit" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" onclick="closeModalAddGroupProduct();" class="btn btn-outline-danger m-1">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnSaveGroupProduct">
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
<!-- Model Edit GroupProduct -->
<div class="modal fade bd-edit-group-product" tabindex="-1" role="dialog" aria-labelledby="EditGroupProductModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่มหมวดสินค้า</h3>
              </div>
            </div>
          </div>
          <form id="editGroupProduct" name="editGroupProduct" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="GroupProductId" id="GroupProductId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">หมวดหมู่สินค้า</span>
                </div>
                <input type="text" class="form-control" placeholder="หมวดหมู่สินค้า" aria-label="category_name" id="category_name" name="category_name" required />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">หน่วยสินค้า</span>
                </div>
                <input type="text" class="form-control" placeholder="หน่วยสินค้า" aria-label="product unit" id="productunit" name="productunit" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnSaveEditGroupProduct">
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
<!-- Model Add Supplier -->
<div class="modal fade bd-add-supplier" tabindex="-1" role="dialog" aria-labelledby="AddSupplierModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddSupplier();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่มSupplier</h3>
              </div>
            </div>
          </div>
          <form id="addSupplier" name="addSupplier" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Supplier</span>
                </div>
                <input type="text" class="form-control" placeholder="Supplier" aria-label="supplier_name" id="supplier_name" name="supplier_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" onclick="closeModalAddSupplier();" class="btn btn-outline-danger m-1">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnSave">
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

<!-- Model Edit Supplier -->
<div class="modal fade bd-edit-supplier" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">แก้ไขSupplier</h3>
              </div>
            </div>
          </div>
          <form id="editSupplier" name="editSupplier" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="SupplierId" id="SupplierId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Supplier</span>
                </div>
                <input type="text" class="form-control" placeholder="Supplier" aria-label="supplier_name" id="supplier_name" name="supplier_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnEditSave">
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
<!-- Model Add Branch -->
<div class="modal fade bd-add-branch" tabindex="-1" role="dialog" aria-labelledby="AddBranchModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
</div>

<!-- Model Edit Branch -->
<div class="modal fade bd-edit-branch" tabindex="-1" role="dialog" aria-labelledby="EditBranchModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
</div>
<!-- Model Add Position -->
<div class="modal fade bd-add-position" tabindex="-1" role="dialog" aria-labelledby="AddPositionModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
</div>

<!-- Model Edit Position -->
<div class="modal fade bd-edit-position" tabindex="-1" role="dialog" aria-labelledby="EditPositionModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
</div>

<!-- Model Edit Companies Password -->
<div class="modal fade" id="EditPasswordCompanies" tabindex="-1" role="dialog" aria-labelledby="EditPasswordModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100">
          <button type="button" class="close" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
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
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
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
          <button type="button" class="close" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
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
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
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
          <button type="button" class="close" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
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
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
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