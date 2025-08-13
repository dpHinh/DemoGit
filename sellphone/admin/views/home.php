<!DOCTYPE html>
<html lang="vi">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Dashboard | ZPhone Admin</title>

     <!-- Google Font -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
     <!-- DataTables -->
     <link rel="stylesheet" href="./assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="./assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="./assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
     <div class="wrapper">
          <?php include_once('./views/layout/header.php'); ?>
          <?php include_once('./views/layout/navbar.php'); ?>
          <?php include_once('./views/layout/sidebar.php'); ?>
          <!-- Content Wrapper -->
          <div class="content-wrapper">
               <section class="content pt-3">
                    <div class="container-fluid">
                         <div class="card">
                              <div class="card-header">
                                   <h3 class="card-title">📈 Doanh thu 6 tháng gần nhất</h3>
                              </div>
                              <div class="card-body">
                                   <canvas id="revenueChart" height="100"></canvas>
                              </div>
                         </div>

                         <h2 class="mb-4 text-primary">📊 Dashboard Quản trị</h2>

                         <div class="row">
                              <div class="col-md-4">
                                   <div class="small-box bg-info">
                                        <div class="inner">
                                             <h3>120</h3>
                                             <p>Sản phẩm</p>
                                        </div>
                                        <div class="icon">
                                             <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <a href="?act=product" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                   </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="small-box bg-success">
                                        <div class="inner">
                                             <h3>85</h3>
                                             <p>Đơn hàng</p>
                                        </div>
                                        <div class="icon">
                                             <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <a href="?act=order" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                   </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="small-box bg-warning">
                                        <div class="inner">
                                             <h3>12</h3>
                                             <p>Admin</p>
                                        </div>
                                        <div class="icon">
                                             <i class="fas fa-users-cog"></i>
                                        </div>
                                        <a href="?act=admin" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                                   </div>
                              </div>
                         </div>

                    </div>
               </section>
          </div>

          <!-- Chart.js -->
          <script src="./assets/plugins/chart.js/Chart.min.js"></script>

          <script>
               const ctx = document.getElementById('revenueChart').getContext('2d');
               const revenueChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                         labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6'],
                         datasets: [{
                              label: 'Doanh thu (triệu VND)',
                              data: [120, 150, 180, 130, 200, 170],
                              backgroundColor: 'rgba(60,141,188,0.9)',
                              borderColor: 'rgba(60,141,188,1)',
                              borderWidth: 1
                         }]
                    },
                    options: {
                         responsive: true,
                         scales: {
                              y: {
                                   beginAtZero: true,
                                   title: {
                                        display: true,
                                        text: 'Triệu VND'
                                   }
                              }
                         },
                         plugins: {
                              legend: {
                                   display: false
                              }
                         }
                    }
               });
          </script>

</body>

</html>