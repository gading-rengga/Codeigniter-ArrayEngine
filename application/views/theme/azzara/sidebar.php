<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url('assets/azzara/') ?>img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if (isset($sidebar)) { ?>
                <?php foreach ($sidebar as $value) { ?>
                    <ul class="nav nav-primary">
                        <?php if ($value['sub_menu'] == '') { ?>
                            <li <?= $this->uri->segment(1) == $value['link'] ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                                <a href="<?= $value['link'] ?>">
                                    <i class="<?= $value['icon'] ?>"></i>
                                    <p><?= $value['tittle'] ?></p>
                                </a>
                            </li>
                        <?php } else { ?>
                            <?php if ($value['tittle-group'] == '' || $value['tittle-group'] == null) { ?>

                            <?php } else { ?>
                                <li class="nav-section">
                                    <span class="sidebar-mini-icon">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </span>
                                    <h4 class="text-section"><?= $value['tittle-group'] ?></h4>
                                </li>
                            <?php } ?>
                            <li <?php if (is_array($value['sub_menu'])) {
                                    foreach ($value['sub_menu'] as $x) {
                                        if ($x['link'] == $this->uri->segment(1)) { ?> class="nav-item active submenu" <?php } else { ?> class="nav-item" <?php }
                                                                                                                                                    }
                                                                                                                                                } else { ?> class="nav-item" <?php } ?>>
                                <a <?= $value['sub_menu'] !== '' ? 'data-toggle="collapse"' : '' ?> href="<?= $value['link'] ?>" class="collapsed" aria-expanded="false">
                                    <i class="<?= $value['icon'] ?>"></i>
                                    <p><?= $value['tittle'] ?></p>
                                    <span <?= $value['sub_menu'] !== '' ? ' class="caret"' : 'class=""' ?>></span>
                                </a>
                                <div <?php if (is_array($value['sub_menu'])) {
                                            foreach ($value['sub_menu'] as $x) {
                                                if ($x['link'] == $this->uri->segment(1)) { ?> class="collapse show" <?php } else { ?> class="collapse" <?php }
                                                                                                                                                }
                                                                                                                                            } ?> id="<?= $value['id_collapse'] ?>">
                                    <?php if ($value['sub_menu'] !== '') { ?>
                                        <ul class="nav nav-collapse">
                                            <?php if (is_array($value['sub_menu'])) { ?>
                                                <?php foreach ($value['sub_menu'] as $index) { ?>
                                                    <li <?= $index['link'] == $this->uri->segment(1) ? ' class="active"' : 'class=""' ?>>
                                                        <a href="<?= base_url($index['link']) ?>">
                                                            <span class="sub-item"><?= $index['tittle'] ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            <?php } else {
                                            } ?>
                                        </ul>
                                    <?php } else {
                                    } ?>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            <?php } else {
            ?> <h4 class="text-danger">Config Sidebar Tidak Ada! Silahkan Buat Config untuk membuat sidebar!</h4> <?php
                                                                                                                } ?>

        </div>
    </div>
</div>
<!-- End Sidebar -->