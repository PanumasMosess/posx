<!-- <style>
  #tableEmployeePinPos td,
  #tableEmployeePinStock td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style> -->
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
                            <th style="width: 100px;" scope="col">Printer Name</th>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Model Add GroupProduct -->
<div class="modal fade bd-add-group-product" tabindex="-1" role="dialog" aria-labelledby="AddGroupProductModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
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
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Printer Name</span>
                </div>
                <input type="text" class="form-control" placeholder="Printer Name" aria-label="printer_name" id="printer_name" name="printer_name" required />
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
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <span class id="basic-addon1">Printer Name</span>
                </div>
                <input type="text" class="form-control" placeholder="Printer Name" aria-label="printer_name" id="printer_name" name="printer_name" required />
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
  <div class="modal-dialog">
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