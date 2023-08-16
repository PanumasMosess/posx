<div class="main_content_iner">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <!-- <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">หมวดหมู่สินค้า</h3>
                    </div>
                  </div>
                </div> -->
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header mt-3">
                <h4>รายชื่อพนักงาน</h4>
                <div class="box_right d-flex lms_block">
                  <div class=" justify-content-end d-flex"> <a href="javascript:void(0);" class="white_btn3 ms-2" onclick="openModalAddEmployee();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มพนักงาน</a></div>
                </div>
              </div>
              <div class="QA_table mb_30">
                <table class="table tableEmployee">
                  <thead>
                    <tr>
                      <th style="width: 36px;" scope="col">#</th>
                      <th style="width: 70px;" scope="col">ภาพ</th>
                      <th style="width: 500px;" scope="col">ชื่อ-นามสกุล</th>
                      <th style="width: 160px;" scope="col">ชื่อเล่น</th>
                      <th style="width: 185px;" scope="col">เบอร์โทรศัพท์</th>
                      <th style="width: 100px;" scope="col">พนักงาน</th>
                      <th style="width: 100px;" scope="col">ตำแหน่ง</th>
                      <th style="width: 112px;" scope="col">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($employees) : ?>
                      <?php $i = 0 ?>
                      <?php foreach ($employees as $employee) : ?>
                        <?php $i++ ?>
                        <tr $id=<?php echo $employee->employee_Id; ?>>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td class="text-center">
                            <img class="avatar-xl " src="<?php echo base_url('/uploads/img/' . $employee->thumbnail); ?>" style="height: 60px; width: 60px; text-align: center; background-color: #fff;" onerror="this.onerror=null;this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAANlBMVEXz9Pa5vsq2u8jN0dnV2N/o6u7FydPi5Onw8fS+ws3f4ee6v8v29/jY2+Hu7/Ly9PbJztbQ1dxJagBAAAAC60lEQVR4nO3b2ZaCMBREUQbDJOP//2wbEGVIFCHKTa+zH7uVRVmBBJQgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMCpdOzvQQqaq2KmuSrOzQ02lSeRem8rpsQq/ozg72Kj4UkAxEev8awnzs7P1yiIadsfpQXjfZCHhUCzbfmeurdNz6bDRsBWRsB+k0cXxdHjpa0wkTBn3hKnjzRZyEgYk3IeEv2RKWCt1cN9EJ0zjfm7Mq/rAVgUnbLpwnK/zA2tnuQmzJHquuqJq91blJuwmAW8rHbV3q2ITFrOAt7Xz3l2UmrBMlpcHe9fOUhOqRYVhFO/cqtSEy0H6bh/tJ1uhCctqlTB/NSnG9pOt1ISXjxLq825laVFowo9GaRPrF9talJqw3n6macaZ09yi1ISG2cLyriwePwxzi1ITru4s2naxma59TC2KTRjE83FqmQ6yeDaUDS3KTRhMV96h5TTSLD4HQ4uCE9bxePUU5pYL/3mD5o9CcMKgTONc39NNLrV5iK4aNLUoOWHQ38RQtW3nsm6db92i8ISvGBtct+hvwqyzBFxE9DehrcHlQPU1YWNvcNGirwlfNThv0ZOE9eJG1OsGZy36kVBdczU9e7RvAz5b9CFhqfIwSp4XwG+OwUWLPiRUV/33Z4tbGtTvGK635CfUDfb/SO5rt20N9t8m65fLT9g3GD5abDY2qC+lvEg4NjhEvLW4tUFvEj4a7OXq3TzoW8Jpg0PEzfk8SThv8EMeJFw1+O8SHmrQg4QHG/Qg4cEGxSc83KD4hIcblJ6w3L508TXh+vtDEpLw3GwDEpKQhOdznVD2fRr9tdpRw/1HqQndIeEvkXCXUlDC+1NBndsnge/fwyVnp9PGH3p95dm1WMKza4/fI37j+UPXR/c+2X9/hjQI0uO3LsyuMioM9A8Sjy/W1iIhY7Sn2tzpUahdWyXiNDNSxcWtSlCBAAAAAAAAAAAAAAAAAAAAAAAAAAAAwCn+AEXGNosxDBhFAAAAAElFTkSuQmCC';">
                          </td>
                          <td><?php echo $employee->name; ?></td>
                          <td><?php echo $employee->nickname; ?></td>
                          <td><?php echo $employee->phone_number; ?></td>
                          <td><?php echo $employee->branch_name; ?></td>
                          <td><?php echo $employee->position_name; ?></td>
                          <td>
                            <div class="action_btns d-flex" style="justify-content: center;">
                              <button type="button" class="action_btn btnEditEmployee me-2" data-id="<?php echo $employee->employee_Id; ?>"><i class="far fa-edit"> </i></button>
                              <button type="button" class="action_btn btnDeleteEmployee me-2" data-id="<?php echo $employee->employee_Id; ?>"><i class="fas fa-trash"></i></button>
                              <button type="button" class="action_btn btnEditPasswordEmployee me-0" data-id="<?php echo $employee->employee_Id; ?>"><i class="fa fa-key"></i></button>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- <div class="action_btns d-flex" style="justify-content: center;">
                          <a href="#" class="action_btn btnEditEmployee mr_10" data-id="<php echo $employee->id; ?>"> <i class="far fa-edit"></i> </a>
                          <a href="#" class="action_btn btnDeleteEmployee" data-id="<php echo $employee->id; ?>"> <i class="fas fa-trash"></i> </a>
                        </div> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Model Add Employee -->
<div class="modal fade bd-add-employee" tabindex="-1" role="dialog" aria-labelledby="EmployeeModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <button type="button" class="close" aria-label="Close" onclick="closeModalAddEmployee();">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="white_card_header">
            <div class=" m-0">
              <div class="justify-content-center" style="display:flex;">
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">เพิ่มพนักงาน</h3>
              </div>
            </div>
          </div>
          <form id="addEmployee" name="addEmployee" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <div class="col-md-12 text-center">
              <img id="aPreviewThumbnail" class="rounded-circle" src="<?php echo base_url('/img/man.png'); ?>" style="background-color: #fff; width: 130px; height: 130px;" onerror="this.onerror=null;this.src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAANlBMVEXz9Pa5vsq2u8jN0dnV2N/o6u7FydPi5Onw8fS+ws3f4ee6v8v29/jY2+Hu7/Ly9PbJztbQ1dxJagBAAAAC60lEQVR4nO3b2ZaCMBREUQbDJOP//2wbEGVIFCHKTa+zH7uVRVmBBJQgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMCpdOzvQQqaq2KmuSrOzQ02lSeRem8rpsQq/ozg72Kj4UkAxEev8awnzs7P1yiIadsfpQXjfZCHhUCzbfmeurdNz6bDRsBWRsB+k0cXxdHjpa0wkTBn3hKnjzRZyEgYk3IeEv2RKWCt1cN9EJ0zjfm7Mq/rAVgUnbLpwnK/zA2tnuQmzJHquuqJq91blJuwmAW8rHbV3q2ITFrOAt7Xz3l2UmrBMlpcHe9fOUhOqRYVhFO/cqtSEy0H6bh/tJ1uhCctqlTB/NSnG9pOt1ISXjxLq825laVFowo9GaRPrF9talJqw3n6macaZ09yi1ISG2cLyriwePwxzi1ITru4s2naxma59TC2KTRjE83FqmQ6yeDaUDS3KTRhMV96h5TTSLD4HQ4uCE9bxePUU5pYL/3mD5o9CcMKgTONc39NNLrV5iK4aNLUoOWHQ38RQtW3nsm6db92i8ISvGBtct+hvwqyzBFxE9DehrcHlQPU1YWNvcNGirwlfNThv0ZOE9eJG1OsGZy36kVBdczU9e7RvAz5b9CFhqfIwSp4XwG+OwUWLPiRUV/33Z4tbGtTvGK635CfUDfb/SO5rt20N9t8m65fLT9g3GD5abDY2qC+lvEg4NjhEvLW4tUFvEj4a7OXq3TzoW8Jpg0PEzfk8SThv8EMeJFw1+O8SHmrQg4QHG/Qg4cEGxSc83KD4hIcblJ6w3L508TXh+vtDEpLw3GwDEpKQhOdznVD2fRr9tdpRw/1HqQndIeEvkXCXUlDC+1NBndsnge/fwyVnp9PGH3p95dm1WMKza4/fI37j+UPXR/c+2X9/hjQI0uO3LsyuMioM9A8Sjy/W1iIhY7Sn2tzpUahdWyXiNDNSxcWtSlCBAAAAAAAAAAAAAAAAAAAAAAAAAAAAwCn+AEXGNosxDBhFAAAAAElFTkSuQmCC';">
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label class="container">
                  <img id="avaterThumbnail" class="rounded-circle mb-1" src="<?php echo base_url('/uploads/img/1.png'); ?>" style=" width: 50px; height: 50px;">
                  <br>
                  <input type="radio" name="avatar_Thumbnail" id="avatar_Thumbnail" value="1.png" checked="checked" style="margin-left: 1.25rem!important;margin-top: 5px;margin-bottom: 10px;">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3">
                <label class="container">
                  <img id="avaterThumbnail" class="rounded-circle mb-1" src="<?php echo base_url('/uploads/img/2.png'); ?>" style=" width: 50px; height: 50px;">
                  <br>
                  <input type="radio" name="avatar_Thumbnail" id="avatar_Thumbnail" value="2.png" style="margin-left: 1.25rem!important;margin-top: 5px;margin-bottom: 10px;">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3">
                <label class="container">
                  <img id="avaterThumbnail" class="rounded-circle mb-1" src="<?php echo base_url('/uploads/img/3.png'); ?>" style=" width: 50px; height: 50px;">
                  <br>
                  <input type="radio" name="avatar_Thumbnail" id="avatar_Thumbnail" value="3.png" style="margin-left: 1.25rem!important;margin-top: 5px;margin-bottom: 10px;">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="col-lg-3">
                <label class="container">
                  <img id="avaterThumbnail" class="rounded-circle mb-1" src="<?php echo base_url('/uploads/img/4.png'); ?>" style=" width: 50px; height: 50px;">
                  <br>
                  <input type="radio" name="avatar_Thumbnail" id="avatar_Thumbnail" value="4.png" style="margin-left: 1.25rem!important;margin-top: 5px;margin-bottom: 10px;">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="input-group mb-3">
              <input class="form-control" type="file" name="thumbnail" onchange="PreviewImage(this, 'aPreviewThumbnail');" accept=".png, .jpg, .jpeg">
              <!-- <div id="validationServer03Feedback" class="invalid-feedback" style="display: block;"> ขนาดแนะนำ 1000X500</div> -->
            </div>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <span class id="basic-addon1">ชื่อ-นามสกุล</span>
              </div>
              <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" aria-label="name" id="name" name="name" required />
            </div>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <span class id="basic-addon1">ชื่อเล่น</span>
              </div>
              <input type="text" class="form-control" placeholder="ชื่อเล่น" aria-label="nickname" id="nickname" name="nickname" required />
            </div>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <span class id="basic-addon1">เบอร์โทรศัพท์</span>
              </div>
              <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" aria-label="phone_number" id="phone_number" name="phone_number" required />
            </div>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <span class id="basic-addon1">อีเมล</span>
              </div>
              <input type="text" class="form-control" placeholder="อีเมล" aria-label="employee_email" id="employee_email" name="employee_email" required />
            </div>
            <div class="row g-12">
              <div class="col-6">
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <span class id="basic-addon1">สาขา</span>
                  </div>
                  <select class="form-control SlectBox" name="branch_id" id="branch_id">
                    <option value="0">โปรดเลือก</option>
                    <?php foreach ($branchs as $branch) { ?>
                      <option value="<?php echo $branch->id; ?>"><?php echo $branch->branch_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <span class id="basic-addon1">ตำแหน่ง</span>
                  </div>
                  <select class="SlectBox form-control" name="position_id" id="position_id" required>
                    <option value="0">โปรดเลือก</option>
                    <?php foreach ($positions as $position) { ?>
                      <option value="<?php echo $position->id; ?>"><?php echo $position->position_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <p class="mb-3" style="border-bottom: 2px dashed #bdbdbd;"></p>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <span class id="basic-addon1">ชื่อผู้ใช้</span>
              </div>
              <input type="text" class="form-control" placeholder="ชื่อผู้ใช้" aria-label="username" id="username" name="username" required />
            </div>
            <div class="input-group mb-3">
              <div class="input-group-text">
                <span class id="basic-addon1">รหัสผ่าน</span>
              </div>
              <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
              <div class="input-group-text">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
              </div>
            </div>
            <div class="col-auto justify-content-end" style="display: flex;">
              <button type="button" onclick="closeModalAddEmployee();" class="btn btn-outline-danger m-1">
                ยกเลิก
              </button>
              <button type="submit" class="btn btn-outline-success m-1 btnSaveEmployee">
                ยืนยัน
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Model Edit Employee -->
<div class="modal fade bd-edit-employee" tabindex="-1" role="dialog" aria-labelledby="EmployeeModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;">แก้ไขพนักงาน</h3>
              </div>
            </div>
          </div>
          <form id="editEmployee" name="editEmployee" action="#" method="POST" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="EmployeeId" id="EmployeeId" />
            <div class="white_card_body">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">ชื่อ-นามสกุล</span>
                </div>
                <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" aria-label="name" id="name" name="name" required />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">ชื่อเล่น</span>
                </div>
                <input type="text" class="form-control" placeholder="ชื่อเล่น" aria-label="nickname" id="nickname" name="nickname" required />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">เบอร์โทรศัพท์</span>
                </div>
                <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" aria-label="phone_number" id="phone_number" name="phone_number" required />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">อีเมล</span>
                </div>
                <input type="text" class="form-control" placeholder="อีเมล" aria-label="employee_email" id="employee_email" name="employee_email" required />
              </div>
              <div class="row g-12">
                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-text">
                      <span class id="basic-addon1">สาขา</span>
                    </div>
                    <select class="form-control SlectBox" name="branch_id" id="branch_id">
                      <option value="0">โปรดเลือก</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-text">
                      <span class id="basic-addon1">ตำแหน่ง</span>
                    </div>
                    <select class="SlectBox form-control" name="position_id" id="position_id" required>
                      <option value="0">โปรดเลือก</option>
                    </select>
                  </div>
                </div>
              </div>
              <p class="mb-3" style="border-bottom: 2px dashed #bdbdbd;"></p>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">ชื่อผู้ใช้</span>
                </div>
                <input type="text" class="form-control" placeholder="ชื่อผู้ใช้" aria-label="username" id="username" name="username" required />
              </div>
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">รหัสผ่าน</span>
                </div>
                <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน">
                <div class="input-group-text">
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
                </div>
              </div>
              <div class="col-auto justify-content-end" style="display: flex;">
                <button type="button" class="btn btn-outline-danger m-1" aria-label="Close" data-bs-dismiss="modal">
                  ยกเลิก
                </button>
                <button type="submit" class="btn btn-outline-success m-1 btnEditSaveEmployee">
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