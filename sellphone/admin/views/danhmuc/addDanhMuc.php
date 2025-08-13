<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/navbar.php'); ?>
<?php include_once('./views/layout/sidebar.php'); ?>
<div class="content-wrapper">
   <section  class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản lý danh mục sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item"></li></ol>
            </div>
        </div>
    </div>

</section> 


<section class="content">
     <div class="container-fluid">
        <div class="row">
            <div class=" col-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class=" card-title"> thêm danh mục sản phẩm
                    </h3>
                </div>
                <form action="<?= BASE_URL_ADMIN .'?act=themdanhmuc'?>" method="post">
                    <input type="text"name="id" value="<?= $danhmuc['id']?>" hidden>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">tên danh mục</label>
                        <input type="text" class="form-control" name="ten_loai" placeholder="nhập tên danh mục">
                      <?php if(isset($error['ten_loai'])) { ?>
                            <p class="text-danger"><?=$error['ten_loai']?></p>
                       <?php }?>
                    </div>

                    <div class="form-group">
                        <label for="">mô tả</label>
                        <textarea name="mota" id="" class="form-control" placeholder="nhập mô tả"></textarea>
                    </div>
                </div>
                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
     </div>
</section>
</div>
<?php include_once('./views/layout/footer.php'); ?>