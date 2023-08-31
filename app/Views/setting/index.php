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
                  <div class="QA_table mb_30">
                    <table class="table lms_table_active3" id="tableGroupProduct">
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
              <div class="tab-pane fade" id="supplier" role="tabpanel" aria-labelledby="supplier-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddSupplier();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มSupplier</a></div>
                  <div class="QA_table mb_30">
                    <table class="table lms_table_active3" id="tableSupplier">
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
              <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="position-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddPosition();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มตำแหน่ง</a></div>
                  <div class="QA_table mb_30">
                    <table class="table lms_table_active3" id="tablePosition">
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
              <div class="tab-pane fade" id="branch" role="tabpanel" aria-labelledby="branch-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddBranch();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มสาขา</a></div>
                  <div class="QA_table mb_30">
                    <table class="table lms_table_active3" id="tableBranch">
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
              <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <h3 class="block">User Info </h3>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>Username</span>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" placeholder="Username" aria-label="username" id="username" aria-describedby="basic-addon1" value="<?php echo $companies->companies_user; ?>" readonly>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-text col-md-2">
                      <span>Password</span>
                    </div>
                    <div class="col-md-10">
                      <a type="text" href="#" class="form-control" placeholder="Password" aria-label="password" id="password" data-bs-toggle="modal" data-bs-target="#EditPasswordCompanies" aria-describedby="basic-addon1">******</a>
                    </div>
                  </div>
                  <h3 class="block">Shop Info </h3>
                  <div class="input-group mb-3">
                    <div class="input-group-text col-md-2">
                      <span>ชื่อร้าน</span>
                    </div>
                    <div class="form-group col-md-10 disabled ">
                      <input class="form-control" placeholder="shopname" aria-label="shopname" id="shopname" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <h3 class="block">Set Parameters </h3>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>Service Charge (%)</span>
                    </div>
                    <div class="input-container col-md-10">
                      <input type="text" class="form-control" placeholder="Service Charge (%)" aria-label="service_charge" id="service_charge" aria-describedby="basic-addon1">
                      <span class="percentage-sign">%</span>
                    </div>
                  </div>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>ส่วนลด (%)</span>
                    </div>
                    <div class="input-container col-md-10">
                      <input type="text" class="form-control discount-text" placeholder="ส่วนลด (%)" aria-label="discount" id="discount" aria-describedby="basic-addon1">
                      <span class="percentage-sign">%</span>
                    </div>
                  </div>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>Discount Mode</span>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control SlectBox" name="discount_mode" id="discount_mode">
                        <option value="0">% ส่วนลดท้ายบิล</option>
                        <option value="1">ส่วนลดราคา</option>
                        <option value="2">% ลดเปอร์เซ็น (โดยไม่รวมสินค้าที่มีการลดแล้ว)</option>
                      </select>
                    </div>
                  </div>
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
                  <h3 class="block">Tax </h3>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>Tax Status</span>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control SlectBox" name="taxStatus" id="taxStatus">
                        <option value="0">No</option>
                        <option value="1">Active</option>
                      </select>
                    </div>
                  </div>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>Tax Id</span>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" placeholder="Tax Id" aria-label="taxId" id="taxId" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>VAT Mode</span>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control SlectBox" name="taxMode" id="taxMode">
                        <option value="0">No Vat</option>
                        <option value="1">Included</option>
                        <option value="2">Excluded</option>
                      </select>
                    </div>
                  </div>
                  <div class="input-group mb-1">
                    <div class="input-group-text col-md-2">
                      <span>Rate (%)*</span>
                    </div>
                    <div class="input-container col-md-10">
                      <input type="text" class="form-control" placeholder="Rate (%)" aria-label="taxRate" id="taxRate" aria-describedby="basic-addon1">
                      <span class="percentage-sign">%</span>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" href="#" id="EditInformation">Edit</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="user_accounts" role="tabpanel" aria-labelledby="user-accounts-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="row" id="account">
                    <div class="col-md-6">
                      <div style="float: right">
                      </div>
                      <h3>Users Accounts <button class="pull-right btn default" id="addUserBtn"><i class="fa fa-plus"></i> Add</button></h3>
                      <h3 class="text-center" style="margin-top: 10px; margin-bottom: 10px; display: none;" data-bind="visible: list().length == 0">Loading...</h3>
                      <div class="A list-group" data-bind="foreach: list">
                        <a class="list-group-item" data-bind="  click: $parent.clickUser">
                          <span data-bind="text : $data.UserName">collabbar.bs@gmail.com</span>
                          <span style="margin-left: 15px; font-size: 0.8em; font-style: italic; color: gray" data-bind="text: $data.Role() == 1 ? ' ( Admin )':'( Custom User ) '  "> ( Admin )</span>
                        </a>
                      </div>
                      <p>Accounts : <span data-bind="text: list().length">1</span> / <span data-bind="text : maxUser">5</span></p>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                      <div id="user-detail" data-bind="for: thisUser" style="display: none">
                        <h3>รายละเอียด</h3>
                        <form data-bind="with: thisUser" class="form-horizontal"></form>
                      </div>
                      <div id="newUser-dialog">
                        <h3>สร้าง User Login</h3>
                        <!-- <form class="form-horizontal"> -->
                          <div class="form-group">
                            <label class="control-label col-md-3">Username </label>
                            <div class="col-md-9">
                              <input type="text" name="username" placeholder="" class="form-control input-medium">
                              <span class="help-inline"> </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                              <input type="password" name="password" placeholder="" class="form-control input-medium">
                              <span class="help-inline"> </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Re password </label>
                            <div class="col-md-9">
                              <input type="password" name="repassword" placeholder="" class="form-control input-medium">
                              <span class="help-inline"> </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Name </label>
                            <div class="col-md-9">
                              <input type="text" name="name" placeholder="" class="form-control input-medium">
                              <span class="help-inline">ชื่อจะแสดงตอนพิมพ์ใบเสร็จ</span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Role </label>
                            <div class="col-md-9">
                              <select name="role" class="small form-control" tabindex="1">
                                <option value="1">Admin</option>
                                <option value="0">Custom User</option>
                              </select>
                              <span class="help-inline">กำหนดสิทธิ์การใช้งาน <br>Admin สามารถใช้งานได้ทุก Features<br>Custom User สามารถกำหนดการใช้งานบาง Feature ได้</span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3"> </label>
                            <div class="col-md-9">
                              <button class=" btn default purple" id="saveNewUser" data-bind="click: add"><i class="fa fa-save"></i> Add</button>
                              <button class=" btn" id=""><i class="fa fa-circle-o"></i> Reset</button>
                            </div>
                          </div>
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pos_pin" role="tabpanel" aria-labelledby="pos-pin-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading" style="height: 60px">
                      <h3 style="display: inline" class="panel-title">Employee PIN ใช้สำหรับให้พนักงานคียย์ Order ในหน้าการขาย POS
                      </h3>
                      <button class="btn-default btn" style="float: right; display: inline" data-bind="click: $data.addNewUserRequest">AddNew</button>
                      <span data-bind="visible: showCount" style="color: grey; float: right; display: none; margin-right: 15px; margin-top: 7px;">Max 20</span>
                    </div>
                    <div class="panel-body" style="color: gray">
                      <table class="table table-striped" style=" color: black; margin-left: 1%">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Permission (For cashier or manager)</th>
                            <th>Hide Cashier</th>
                          </tr>
                        </thead>
                        <tbody data-bind="foreach: $data.list">
                          <tr data-bind="style: { 'background-color':  $data.justLoad() ?   'aliceblue !important' : '' }">
                            <td>
                              <span data-bind="text : ($index() +1 ) + '.'">1.</span>
                            </td>
                            <td style="font-weight: bold" data-bind="text: $data.Name">ART</td>
                            <td>*****</td>
                            <td>
                              <employee-accesslist params="user : $data, blockPaymentFromEmployee : $parent.blockPaymentFromEmployee">
                                <div data-bind=" ">
                                  <label style="font-weight: bold">
                                    <input type="checkbox" data-bind=" checked: $data.editable">
                                    <span>All</span>
                                  </label>
                                  <ul style="color: gray;  list-style-type: none; display: inline; padding-left: 10px" data-bind="foreach: $data.allList, style: { 'visibility': !$data.editable() == false ? 'hidden' : '' }">
                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_move">
                                        <span data-bind="text : $data.displayText">Move</span>
                                      </label>
                                    </li>
                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_set_discount">
                                        <span data-bind="text : $data.displayText">Discount</span>
                                      </label>
                                    </li>
                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_set_unit_price">
                                        <span data-bind="text : $data.displayText">Set price</span>
                                      </label>
                                    </li>
                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_void">
                                        <span data-bind="text : $data.displayText">Void</span>
                                      </label>
                                    </li>
                                  </ul>
                                </div>
                              </employee-accesslist>
                            </td>
                            <td>
                              <label>
                                <input type="checkbox" data-bind="value : $data.hideCashier,  checked: $data.hideCashier" value="false">
                                <span style="color: gray;">Hide Cahsier</span>
                              </label>
                            </td>
                            <td>
                              <a class="btn btn-default  btn-sm" style="background-color: yellow; color: black; visibility: hidden;" href="#" data-bind="click: $root.saveAccessList, style: { 'visibility': $data.dataHasChanged() ? 'visible' : 'hidden' }"> <i class="fa fa-save"></i> Save</a>
                              <a style="margin-left: 15px" href="#" data-bind="click: $root.removeUser"> <i class="fa fa-trash-o"></i> remove</a>
                            </td>
                          </tr>
                          <tr data-bind="style: { 'background-color':  $data.justLoad() ?   'aliceblue !important' : '' }">
                            <td>
                              <span data-bind="text : ($index() +1 ) + '.'">7.</span>
                            </td>
                            <td style="font-weight: bold" data-bind="text: $data.Name">Nutcha</td>
                            <td>*****</td>
                            <td>
                              <employee-accesslist params="user : $data, blockPaymentFromEmployee : $parent.blockPaymentFromEmployee">
                                <div data-bind=" ">
                                  <label style="font-weight: bold">
                                    <input type="checkbox" data-bind=" checked: $data.editable">
                                    <span>All</span>
                                  </label>
                                  <ul style="color: gray; list-style-type: none; display: inline; padding-left: 10px; visibility: hidden;" data-bind="foreach: $data.allList, style: { 'visibility': !$data.editable() == false ? 'hidden' : '' }">
                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_move">
                                        <span data-bind="text : $data.displayText">Move</span>
                                      </label>
                                    </li>

                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_set_discount">
                                        <span data-bind="text : $data.displayText">Discount</span>
                                      </label>
                                    </li>

                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_set_unit_price">
                                        <span data-bind="text : $data.displayText">Set price</span>
                                      </label>
                                    </li>
                                    <li style="display: inline; margin: 0 10px">
                                      <label>
                                        <input type="checkbox" data-bind="checkedValue: $data.value, checked: $parent.currentList" value="pos_void">
                                        <span data-bind="text : $data.displayText">Void</span>
                                      </label>
                                    </li>
                                  </ul>
                                </div>
                              </employee-accesslist>
                            </td>
                            <td>
                              <label>
                                <input type="checkbox" data-bind="value : $data.hideCashier,  checked: $data.hideCashier" value="false">
                                <span style="color: gray;">Hide Cahsier</span>
                              </label>
                            </td>
                            <td>
                              <a class="btn btn-default  btn-sm" style="background-color: yellow; color: black; visibility: hidden;" href="#" data-bind="click: $root.saveAccessList, style: { 'visibility': $data.dataHasChanged() ? 'visible' : 'hidden' }"> <i class="fa fa-save"></i> Save</a>
                              <a style="margin-left: 15px" href="#" data-bind="click: $root.removeUser"> <i class="fa fa-trash-o"></i> remove</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="stock_pin" role="tabpanel" aria-labelledby="stock-pin-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div id="stock-employeepin-setting">
                    <div>
                      <div class="panel panel-default">
                        <div class="panel-heading" style="height: 60px;">
                          <h3 class="panel-title" style="display: inline;">STOCK Employee PIN <b>ใช้สำหรับหน้า Stock</b></h3><button class="btn-default btn" style="float: right; display: inline;">AddNew</button>
                        </div>
                        <div class="panel-body" style="color: gray;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>PIN</th>
                                <th>Permission</th>
                                <th>Acitons</th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="mobile" role="tabpanel" aria-labelledby="mobile-tab">
                <div class="col-lg-12 col-xl-12 col-md-12">
                  <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                      <h3 class="panel-title">Paired mobiles (เชื่อมต่อการสั่งอาหารผ่านมือถือ Package 1390+)
                        <span style="float: right">
                          <span data-bind="text: $root.pairedList() ? pairedList().length : 0 ">3</span>
                          <span data-bind=" text: ' / ' +  $root.currentQuota()"> / 5</span>
                        </span>
                      </h3>
                    </div>
                    <div class="panel-body" style="color: gray">
                    </div>
                    <div class="row" style="margin: 0px">
                      <div class="col-lg-offset-1  col-md-3">
                        <p>Device Id</p>
                      </div>
                      <div class="col-md-4">
                        <p>Model</p>
                      </div>
                    </div>
                    <!-- List group -->
                    <ul class="list-group" data-bind="foreach: $data.pairedList ">
                      <li class="list-group-item" style="line-height: 30px">
                        <div class="row">
                          <div class="col-lg-offset-1 col-md-3">
                            <p data-bind="text : $data.deviceId">c0f65</p>
                          </div>
                          <div class="col-md-4">
                            <p>
                              <i class="fa fa-mobile"></i>
                              <span data-bind="text: $data.model"></span>
                            </p>
                          </div>
                          <div class="col-md-2">
                            <a href="#" data-bind="click : $root.remove">remove</a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item" style="line-height: 30px">
                        <div class="row">
                          <div class="col-lg-offset-1 col-md-3">
                            <p data-bind="text : $data.deviceId">d7d57</p>
                          </div>
                          <div class="col-md-4">
                            <p>
                              <i class="fa fa-mobile"></i>
                              <span data-bind="text: $data.model"></span>
                            </p>
                          </div>
                          <div class="col-md-2">
                            <a href="#" data-bind="click : $root.remove">remove</a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item" style="line-height: 30px">
                        <div class="row">
                          <div class="col-lg-offset-1 col-md-3">
                            <p data-bind="text : $data.deviceId">c308c</p>
                          </div>
                          <div class="col-md-4">
                            <p>
                              <i class="fa fa-mobile"></i>
                              <span data-bind="text: $data.model"></span>
                            </p>
                          </div>
                          <div class="col-md-2">
                            <a href="#" data-bind="click : $root.remove">remove</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="row" style="margin: 10px 0px">
                      <div class="col-lg-offset-1  col-md-3">
                        <div class="input-group input-large">
                          <span class="input-group-btn">
                            <button data-bind="click : $root.add" class="btn blue" type="button">Add</button>
                          </span>
                          <input data-bind="value : $root.input" type="text" class="form-control" placeholder="Enter Device Id">
                        </div>
                      </div>
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
<div class="modal fade bd-add-group-product" tabindex="-1" role="dialog" aria-labelledby="GroupProductModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade bd-edit-group-product" tabindex="-1" role="dialog" aria-labelledby="GroupProductModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade bd-add-supplier" tabindex="-1" role="dialog" aria-labelledby="SupplierModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade bd-edit-supplier" tabindex="-1" role="dialog" aria-labelledby="SupplierModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade bd-add-branch" tabindex="-1" role="dialog" aria-labelledby="BranchModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade bd-edit-branch" tabindex="-1" role="dialog" aria-labelledby="BranchModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade bd-add-position" tabindex="-1" role="dialog" aria-labelledby="PositionModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade bd-edit-position" tabindex="-1" role="dialog" aria-labelledby="PositionModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade" id="EditPasswordCompanies" tabindex="-1" role="dialog" aria-labelledby="PasswordModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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