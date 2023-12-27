<style>
  .group-action-hide {
    display: none;
    /* กำหนดให้ซ่อนเริ่มต้น */
  }

  .sub-action-hide {
    display: none;
    /* กำหนดให้ซ่อนเริ่มต้น */
  }

  .group:hover .group-action-hide {
    display: block;
    /* แสดงเมื่อมีการโฮเวอร์รายการ list-group-item */
  }

  .sub-group:hover .sub-action-hide {
    display: block;
    /* แสดงเมื่อมีการโฮเวอร์รายการ list-group-item sub*/
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
                  <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="false">Overview</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="manage-expense-group-tab" data-bs-toggle="tab" href="#manage_expense_group" role="tab" aria-controls="manage_expense_group" aria-selected="false">Manage Expense Group</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="white_card_body">
            <div class="tab-content" id="settingTabContent">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="main_content_iner ">
                  <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12">
                      <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                          <div class="box_header m-0">
                            <div class="main-title">
                              <h3 class="m-0">Expense List</h3>
                            </div>
                          </div>
                        </div>
                        <div class="white_card_body">
                          <div class="row">
                            <div class="col-md-2 mt-2">
                              <div class="main-title">
                                <h5 class="m-0">Pick Date</h5>
                              </div>
                            </div>
                            <div class="col-md-5 mt-1">
                              <input type="text" class="datepicker-here float-end form-control flatpickr-input text-center digits" id="datepicker" name="datepicker" placeholder="<?php echo date('Y-m-d') ?>" readonly="readonly" data-language="en">
                            </div>
                            <div class="col-md-5" style="text-align: right;">
                              <a href="javascript:void(0);" class="white_btn3" id="addUserBtn" onclick="openModalAddExpenseList();"><i class="ti-plus"></i>&nbsp;&nbsp;Add Expense</a>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-2 mt-2">
                              <div class="main-title">
                                <h5 class="m-0">View Mode</h5>
                              </div>
                            </div>
                            <div class="col-md-2 mt-1">
                              <ul class="nav nav-pills nav-fill custom_bootstrap_nav">
                                <li class="nav-item">
                                  <a class="nav-link active" id="Group" data-bs-toggle="tab" role="tab" href="#group" aria-controls="group" aria-selected="false" onclick="TableGroup()">Group</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="List" data-bs-toggle="tab" role="tab" href="#list" aria-controls="list" aria-selected="false" onclick="TableList()">List</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="tab-pane fade show active" id="group" role="tabpanel" aria-labelledby="Group" style="display: block;">
                            <div class="col-lg-12 col-xl-12 col-md-12">
                              <div class="col-md-12">
                                <div id="total_expenses"></div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div id="total_expenses_list"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="List" style="display: none;">
                            <div class="col-lg-12 col-xl-12 col-md-12">
                              <div class="QA_section">
                                <div class="QA_table mb_20">
                                  <table class="table mt-3" id="tableListshow">
                                    <thead>
                                      <tr>
                                        <th class="text-center" style="width: 20px;" scope="col">#</th>
                                        <th class="text-center" style="width: 100px;" scope="col">Group</th>
                                        <th class="text-center" style="width: 100px;" scope="col">Title</th>
                                        <th class="text-center" style="width: 50px;" scope="col">Amount</th>
                                        <th class="text-center" style="width: 150px;" scope="col">Comment</th>
                                        <th class="text-center" style="width: 50px;" scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div id="total_expenses_table"></div>
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
              <div class="tab-pane fade" id="manage_expense_group" role="tabpanel" aria-labelledby="manage-expense-group-tab">
                <div class="main_content_iner ">
                  <div class="row">
                    <div class="col-lg-12 col-xl-12 col-md-12">
                      <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                          <div class="box_header m-0">
                            <div class="main-title">
                              <h3 class="m-0">จัดการประเภทรายจ่าย</h3>
                            </div>
                            <div class="header_more_tool">
                              <div class="action_btns d-flex">
                                <a href="javascript:void(0);" class="white_btn3" id="addUserBtn" onclick="openModalAddExpense();"><i class="ti-plus"></i>&nbsp;&nbsp;Add</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="white_card_body">
                          <div class="panel-body mb-3" style="text-align: left">
                            <span class="help-inline"><B>Group รายจ่าย</B> คือ ประเภทค่าใช้จ่ายหลักๆ เช่น ค่าสาภารณปใภค <br><B>รายจ่าย</B> คือ ชนิดของรายจ่ายที่เกิดขึ้นจริง เช่น ค่าน้ำ ค่าไฟ ค่าอินเตอร์เนท<br><B>Comment</B> คือ รายละเอียดเพื่อข้อมูลเพิ่มเติมของรายจ่ายนั้นๆ เช่น ค่าอินเตอร์เนท (True)</span><br>
                            <span style="font-style: italic">Click ที่ชื่อเพื่อดูรายการย่อย</span>
                          </div>
                          <ul id="sort-group" class="list-group ui-sortable">
                            <?php foreach ($ExpenseGroups as $ExpenseGroup) { ?>
                              <li class="list-group-item" data-expense-id="<?php echo $ExpenseGroup->id; ?>">
                                <div class="group">
                                  <div class="click-hover">
                                    <i class="fas fa-plus-square" style="cursor: pointer"></i>
                                    <span style="font-weight: bold; cursor: pointer; padding-left: 10px"><?php echo $ExpenseGroup->expense_name; ?></span>
                                    <?php $i = 0;
                                    foreach ($ExpenseSubGroups as $ExpenseSubGroup) {
                                      if ($ExpenseSubGroup->expense_group_id == $ExpenseGroup->id) {
                                        $i++;
                                      }
                                    } ?>
                                    <span style="font-style: italic; margin-left: 10px; color: gray">(<?php echo $i; ?>)</span>
                                  </div>
                                  <button type="button" class="btn btn-success group-action-hide seveAddSubExpense" data-id="<?php echo $ExpenseGroup->id; ?>" style="position: absolute; left: 320px; padding-top: 0px; margin-top: -26px;padding-bottom: 2px;"><i class="fa fa-plus f_s_14 me-2" style="vertical-align: middle;"></i>Add Sub-Group</button>
                                  <button type="button" class="btn btn-primary group-action-hide saveEditExpense" data-id="<?php echo $ExpenseGroup->id; ?>" style="position: absolute; left: 500px; padding-top: 0px; margin-top: -26px;padding-bottom: 2px;"><i class="ti-pencil f_s_14 me-2" style="vertical-align: middle;"></i>Edit</button>
                                  <button type="button" class="btn btn-danger group-action-hide saveRemoveExpense" data-id="<?php echo $ExpenseGroup->id; ?>" style="position: absolute; left: 600px; padding-top: 0px; margin-top: -26px;padding-bottom: 2px;"><i class="ti-trash f_s_14 me-2" style="vertical-align: middle;"></i>Remove</button>
                                </div>
                                <div class="sort-sub-group" style="margin-top: 5px; display: none;">
                                  <ul class="sort-sub-group ui-sortable" data-expense-id="<?php echo $ExpenseGroup->id; ?>">
                                    <?php foreach ($ExpenseSubGroups as $ExpenseSubGroup) {
                                      if ($ExpenseSubGroup->expense_group_id == $ExpenseGroup->id) {
                                    ?>
                                        <li class="list-group-item sub" data-sub-expense-id="<?php echo $ExpenseSubGroup->id; ?>" style="border-left: 0;border-right: 0;">
                                          <div class="sub-group">
                                            <span><?php echo $ExpenseSubGroup->sub_expense_name; ?></span>
                                            <button type="button" class="btn btn-primary sub-action-hide saveEditSubExpense" data-id="<?php echo $ExpenseSubGroup->id; ?>" style="position: absolute; left: 400px; padding-top: 0px; margin-top: -25px;padding-bottom: 2px;"><i class="ti-pencil f_s_14 me-2" style="vertical-align: middle;"></i>Edit</button>
                                            <button type="button" class="btn btn-danger sub-action-hide saveRemoveSubExpense" data-id="<?php echo $ExpenseSubGroup->id; ?>" style="position: absolute; left: 500px; padding-top: 0px;padding-bottom: 2px; margin-top: -25px;"><i class="ti-trash f_s_14 me-2" style="vertical-align: middle;"></i>Remove</button>
                                          </div>
                                        </li>
                                    <?php }
                                    } ?>
                                  </ul>
                                </div>
                              </li>
                            <?php } ?>
                          </ul>
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
    </div>
  </div>
</div>

<div class="modal fade bd-add-expense" tabindex="-1" role="dialog" aria-labelledby="AddExpenseModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddExpense();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">New Expense Group</h3>
              </div>
            </div>
          </div>
          <form id="addExpense" name="addExpense" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Expense Group</span>
                </div>
                <input type="text" class="form-control" placeholder="Expense Group" aria-label="expense_name" id="expense_name" name="expense_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" onclick="closeModalAddExpense();" class="btn btn-outline-danger m-1">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnSaveAddExpense">
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

<div class="modal fade bd-add-sup-expense" tabindex="-1" role="dialog" aria-labelledby="AddSubExpenseModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddSubExpense();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="modal-title" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">New Sub-Group for </h3>
              </div>
            </div>
          </div>
          <form id="addSubExpense" name="addSubExpense" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="ExpenseId" id="ExpenseId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Expense Sub Group</span>
                </div>
                <input type="text" class="form-control" placeholder="Expense Sub Group" aria-label="expense_sub_name" id="expense_sub_name" name="expense_sub_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" onclick="closeModalAddSubExpense();" class="btn btn-outline-danger m-1">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnSaveAddSubExpense">
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

<!-- Model Edit Sup Expense -->
<div class="modal fade bd-edit-sub-expense" tabindex="-1" role="dialog" aria-labelledby="EditSubExpenseModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">แก้ไข Sub-Group</h3>
              </div>
            </div>
          </div>
          <form id="editSubExpense" name="editSubExpense" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="ExpenseId" id="ExpenseId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Expense Sub Group</span>
                </div>
                <input type="text" class="form-control" placeholder="Expense" aria-label="expense_sub_name" id="expense_sub_name" name="expense_sub_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnEditSubExpenseSave">
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

<!-- Model Edit Expense -->
<div class="modal fade bd-edit-expense" tabindex="-1" role="dialog" aria-labelledby="EditExpenseModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" class="btn-close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">แก้ไขExpense</h3>
              </div>
            </div>
          </div>
          <form id="editExpense" name="editExpense" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="ExpenseId" id="ExpenseId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Expense Group</span>
                </div>
                <input type="text" class="form-control" placeholder="Expense" aria-label="expense_name" id="expense_name" name="expense_name" required />
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnEditExpenseSave">
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
<div class="modal fade add-expense-list" tabindex="-1" role="dialog" aria-labelledby="AddExpenseListModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-xl">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddExpenseList();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">Add Expense</h3>
              </div>
            </div>
          </div>
          <form id="addExpenseList" name="addExpenseList" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="white_card_body">
              <div class="row">
                <div class="col-md-12 mb-3">
                  <div class="main-title">
                    <h5 class="m-0">1. เลือกวัน</h5>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 mt-1">
                  <div class="main-title">
                    <h5 class="m-0">Pick Date</h5>
                  </div>
                </div>
                <div class="col-md-4">
                  <input type="text" class="datepicker-here float-end form-control flatpickr-input text-center" id="datepickerExpenseList" name="datepickerExpenseList" placeholder="เลือกวันที่ต้องการดูข้อมูล" readonly="readonly" data-language="en">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-3 mt-3">
                  <div class="main-title">
                    <h5 class="m-0">2. ใส่ข้อมูลรายจ่าย</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="QA_section">
                  <div class="QA_table mb_30">
                    <table class="table mt-3" id="tableLists">
                      <thead>
                        <tr>
                          <th style="width: 40px;" scope="col">#</th>
                          <th style="width: 250px;" scope="col">Group</th>
                          <th style="width: 250px;" scope="col">Title</th>
                          <th style="width: 250px;" scope="col">Amount</th>
                          <th style="width: 250px;" scope="col">Comment</th>
                          <th style="width: 50px;" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $defaultRows = 5;
                        for ($rowNumber = 1; $rowNumber <= $defaultRows; $rowNumber++) { ?>
                          <tr>
                            <td>
                              <p><?php echo $rowNumber; ?></p>
                            </td>
                            <td>
                              <select class="form-select" name="group_lists" id="group_lists" onchange="updateTitle(<?php echo $rowNumber; ?>,this.value)">
                                <option value="0">Select Group</option>
                                <?php foreach ($ExpenseGroups as $ExpenseGroup) { ?>
                                  <option value="<?php echo $ExpenseGroup->id; ?>"><?php echo $ExpenseGroup->expense_name; ?></option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <div id="title_<?php echo $rowNumber; ?>"></div>
                            </td>
                            <td>
                              <div class="input-group" id="amount_<?php echo $rowNumber; ?>"></div>
                            </td>
                            <td>
                              <div class="input-group" id="comment_<?php echo $rowNumber; ?>"></div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-danger saveRemoveLine" onclick="removeRow(this)">Remove</button>
                              <!-- <button type="button" data-bind="click: $root.removeLine" class="btn btn-link"><i class="fa fa-trash-o"></i> remove</button> -->
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <button type="button" class="btn btn-outline-success m-1 btnAddLine" onclick="addNewRow()">Add New line</button>
                </div>
                <div class="col-md-6">
                  <div class="justify-content-end" style="display: flex;">
                    <button type="button" onclick="closeModalAddExpenseList();" class="btn btn-outline-danger m-1">
                      ยกเลิก
                    </button>
                    <button type="button" class="btn btn-outline-success m-1 btnSaveAddExpenseList" onclick="addExpensesList()">
                      ยืนยัน
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>