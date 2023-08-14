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
                <h4>ตำแหน่ง</h4>
                <div class="box_right d-flex lms_block">
                  <!-- <div class="serach_field_2 mt-1">
                    <div class="search_inner">
                      <form active="#">
                        <div class="search_field">
                          <input type="text" placeholder="Search content here..." />
                        </div>
                        <button type="submit">
                          <i class="ti-search"></i>
                        </button>
                      </form>
                    </div>
                  </div> -->
                  <!-- <div class="add_button ms-2">
                    <a href="#" data-toggle="modal" data-target="#addPosition" class="btn_1">Add New</a>
                  </div> -->
                  <div class=" justify-content-end d-flex"> <a href="javascript:void(0);" class="white_btn3 ms-2" onclick="openModalAddPosition();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มตำแหน่ง</a></div>
                </div>
              </div>
              <div class="QA_table mb_30">
                <table class="table tablePosition">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;" scope="col">#</th>
                      <th class="text-center" style="width: 250px;" scope="col">ชื่อตำแหน่ง</th>
                      <th class="text-center" style="width: 250px;" scope="col">สร้างขึ้นเมื่อ</th>
                      <th class="text-center" style="width: 250px;" scope="col">แก้ไขล่าสุด</th>
                      <th class="text-center" style="width: 100px;" scope="col">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($positions) : ?>
                      <?php $i = 0 ?>
                      <?php foreach ($positions as $position) : ?>
                        <?php $i++ ?>

                        <tr id="<?php echo $position->id; ?>">
                          <td><?php echo $i; ?></td>
                          <td><?php echo $position->position_name; ?></td>
                          <td class="text-center"> <?php echo datetime_compare($position->created_at); ?></td>
                          <?php if ($position->updated_at == '') {
                            $updated = $position->created_at;
                          } else {
                            $updated = $position->updated_at;
                          }
                          ?>
                          <td class="text-center"><?php echo dateThai($updated); ?></td>
                          <td>
                            <div class="action_btns d-flex" style="justify-content: center;">
                              <a href="#" class="action_btn btnEditPosition mr_10" data-id="<?php echo $position->id; ?>"> <i class="far fa-edit"></i> </a>
                              <a href="#" class="action_btn btnDeletePosition" data-id="<?php echo $position->id; ?>"> <i class="fas fa-trash"></i> </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- <tr>
                      <th class="text-center">1</th>
                      <td class="text-center">เครื่องดื่ม</td>
                      <td class="text-center">26 กรกฏาคม 2566</td>
                      <td class="text-center">28 กรกฏาคม 2566</td>
                      <td>
                        <div class="action_btns d-flex" style="justify-content: center;">
                          <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                          <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                        </div>
                      </td>
                    </tr> -->
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