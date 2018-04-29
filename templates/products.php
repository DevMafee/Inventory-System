<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="product_form" onsubmit="return false">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date</label>
              <input type="text" class="form-control" id="added_date" name="added_date" value="<?php echo date("Y-m-d");?>" readonly />
            </div>
            <div class="form-group col-md-6">
              <label">Product Name</label>
              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Category</label>
              <select id="select_cat" name="select_cat" class="form-control" required>
                
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Brand</label>
              <select id="select_brand" name="select_brand" class="form-control" required>
                
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Product Price</label>
              <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price">
            </div>
            <div class="form-group col-md-6">
              <label>Quantity</label>
              <input type="text" name="product_qty" id="product_qty" class="form-control" placeholder="Product Quantity">
            </div>
          </div>

          <button type="submit" class="btn btn-success">Add Product</button>

        </form>
      </div>
      <div class="modal-footer">
        <label id="product_success"></label><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>