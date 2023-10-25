<style>
  .image-container {
    position: relative;
  }

  .delete-button {
    position: absolute;
    top: 7px;
    right: 7px;
    background: none;
    border: none;
    visibility: hidden;
    /* เริ่มต้นปุ่มลบในสถานะซ่อน */
    transition: visibility 0.3s, transform 0.3s;
    transform: scale(1.4);
    /* ขนาดเริ่มต้นของปุ่ม */
  }

  .image-container:hover .delete-button {
    visibility: visible;
    /* เมื่อชี้เข้าสู่ image-container ให้แสดงปุ่มลบ */
    transform: scale(1.5);
    /* เพิ่มขนาดของปุ่มเมื่อ hover */
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
                  <a class="nav-link active" id="setting-tv-tab" data-bs-toggle="tab" href="#setting_tv" role="tab" aria-controls="setting_tv" aria-selected="true">Setting TV</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="setting-barcode-tab" data-bs-toggle="tab" href="#setting_barcode" role="tab" aria-controls="setting_barcode" aria-selected="true">Barcode</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="white_card_body">
            <div class="tab-content" id="settingTabContent">
              <div class="tab-pane fade show active" id="setting_tv" role="tabpanel" aria-labelledby="setting-tv-tab">
                <div class="main_content_iner">
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                      <div class="white_card card_height_100 mb_50">
                        <div class="white_card_header">
                          <div class="box_header m-0">
                            <div class="main-title">
                              <h3 class="lang m-0" key='SETTING_TY'>ตั้งค่า TV</h3>
                            </div>
                          </div>
                        </div>
                        <div class="white_card_body">
                          <form id="updatePicture" name="updatePicture" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="col-sm-12 col-md-12" style="text-align: center;">
                              <label for="file_picture_update" class="form-label">Background (ขนาดแนะนำ 1920 x 1080)</label>
                              <!-- <label for="file_picture_other_update" class="form-label" style="font-weight: bold;">Background</label> -->
                              <!-- <input id="file_picture_other_update" type="file" class="dropify" name="file_picture_other_update[]" accept="image/jpeg, image/png" data-height="200" multiple /> -->
                              <div class="input-images">
                              </div>
                            </div>
                            <p class="border-bottom-dashed tx-primary"></p>
                            <div align="right">
                              <div class="form-group mb-2 mt-2">
                                <button type="submit" id="updated_btn_picture" class="btn btn-primary mb-0 me-2" role="button"><i class="ti-cloud-up"></i>  เพิ่มรูปภาพ</button>
                              </div>
                            </div>
                          </form>
                          <div class="main_content_iner" style="padding: 15px;">
                            <div class="white_card card_height_100">
                              <div class="box_body">
                                <div class="scroll-bar-wrap" style="width: 100%; max-width: 100%; overflow-y: hidden;">
                                  <div class="vertical-scroll scroll-demo ps-container ps-theme-default ps-active-y" data-ps-id="5df81836-24e5-e65f-5f12-683ae24a9d79" style="height: 550px;">
                                    <div class="row photo_gallery justify-content-center m-2" id="other_picture" itemscope="" data-pswp-uid="1">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- <label class="form-label">Shop Info</label> -->
                          <div class="input-group mb-3 mt-3">
                            <div class="input-group-text">
                              <div class="">ตั้งค่าเวลา (วินาที)</div>
                            </div>
                            <input class="form-control" placeholder="ตั้งค่าเวลา" aria-label="setting_time" id="setting_time" aria-describedby="basic-addon1">
                            <div class="input-group-text">
                              <span class="">วินาที</span>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary" href="#" id="EditTVSetting" style="float: right;"><i class="ti-alarm-clock"></i> ตั้งค่าเวลา</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade show " id="setting_barcode" role="tabpanel" aria-labelledby="setting-barcode-tab">
                <div class="main_content_iner">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="white_card card_height_100 mb_20">
                      <div class="white_card_header">
                        <div class="box_header m-0">
                          <div class="main-title">
                            <h3 class="lang m-0" key='SETTING_BARCODE'>Barcode ทั้งหมด</h3>
                          </div>
                        </div>
                      </div>
                      <div class=" white_card_body">
                        <!-- temp card -->
                        <div class="row justify-content-center" id='qr_table'>
                        
                      </div>
                        <button type="submit" class="btn btn-outline-primary" href="#" id="Print" style="float: right;margin-top: -20px;"><i class="ti-printer"></i>  Print Barcode All</button>
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