<?php include_once('./views/layout/header.php'); ?>
<?php include_once('./views/layout/menu.php'); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <h1>Liên hệ</h1>
            <p>Nếu bạn có bất kỳ thắc mắc hoặc góp ý nào, vui lòng liên hệ với chúng tôi:</p>
            <ul>
                <li>Hotline: 0123456789</li>
                <li>Email: abc@gmail.com</li>
                <li>Địa chỉ: 123 trịnh văn bô, hà nội</li>
            </ul>
            <form>
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên của bạn">
                <label for="">Email</label>
                <input type="email" class="form-control" placeholder="Nhập email">
                <label for="">Nội dung</label>
                <textarea class="form-control" placeholder="Nội dung liên hệ"></textarea>
                <button type="submit" class="btn btn-primary mt-2">Gửi</button>
            </form>
        </div>
    </section>
</div>

<?php include_once('./views/layout/footer.php'); ?>