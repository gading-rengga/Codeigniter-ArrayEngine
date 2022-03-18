<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="page-title"> <?php if (isset($card)) {
                                                echo $title;
                                            } else {
                                                echo "title Kosong";
                                            } ?></h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container pt-2 pl-5 pr-5 pb-2">
            <?php if (isset($card)) {
                echo $card;
            } else {
                echo "Config Card Tidak ada";
            } ?>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->