<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex w-100">
            <img src="<?= base_url() ?>assets/img/logo-trans.png" class="" style="width: 150px; margin: 0 auto;" alt="Qmail">
        </div>

        <div class="form-inline">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex w-100">
                <div class="image bg-gray rounded-circle" style="padding: 10px 15px;">
                    <!-- <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                    <i class="fas fa-user"></i>
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $this->name ?></a>
                </div>
            </div>
        </div>

        <div class="compose_btn mb-3">
            <!-- <button type="button" class="btn btn-primary btn-primary"><i class="fa fa-edit"></i> Compose</button> -->
            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-lg">
                <i class="fa fa-edit"></i> Compose
            </button>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php
                $urlArray = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $segments = explode('/', $urlArray);
                $numSegments = count($segments);
                $currentSegment = $segments[$numSegments - 1];

                ?>



                <li class="nav-item">
                    <a href="<?= base_url('inbox') ?>" class="nav-link <?= (($currentSegment == 'inbox') ? 'active' : '') ?>">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Inbox
                            <span class="badge badge-danger right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript: void(0);" class="nav-link <?= (($currentSegment == 'starred') ? 'active' : '') ?>">
                        <i class="nav-icon far fa-star"></i>
                        <p>
                            Starred
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('sent') ?>" class="nav-link <?= (($currentSegment == 'sent') ? 'active' : '') ?>">
                        <i class="nav-icon far fa-share-square"></i>
                        <p>
                            Sent
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>