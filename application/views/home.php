<?php
include('includes/header-link.php');
?>
<div class="wrapper">

    <?php
    include('includes/header.php');
    include('includes/sidebar.php');
    ?>

    <div class="content-wrapper" style="min-height: 1302.4px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Inbox</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search Mail">
                                    <div class="input-group-append">
                                        <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body p-0">
                            <div class="mailbox-controls">

                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-star"></i>
                                    </button>

                                </div>

                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                                <div class="float-right">
                                    1-50/200
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr class="read_mail new">
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" id="check1">
                                                    <label for="check1"></label>
                                                </div>
                                            </td>
                                            <td class="mailbox-star"><a href="javascript: void(0);"><i class="fas fa-star text-warning"></i></a></td>
                                            <td class="mailbox-name"><a href="javascript: void(0);">Sagar Thakur</a></td>
                                            <td class="mailbox-subject"><b>This is subject</b> - This is message
                                            </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">5 mins ago</td>
                                        </tr>
                                        <tr class="read_mail">
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" id="check2">
                                                    <label for="check2"></label>
                                                </div>
                                            </td>
                                            <td class="mailbox-star"><a href="javascript: void(0);"><i class="fas fa-star-o text-warning"></i></a></td>
                                            <td class="mailbox-name"><a href="javascript: void(0);">Sagar Thakur</a></td>
                                            <td class="mailbox-subject"><b>This is subject</b> - This is message
                                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                            <td class="mailbox-date">28 mins ago</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <div class="float-right">
                                    1-50/200
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>


    <?php
    include('includes/footer.php');
    ?>
</div>

<script>
    let mailLink = document.querySelectorAll('.read_mail');
    
        mailLink.forEach(function(mails) {
            mails.onclick = () => {
                window.location.href = "<?= base_url('read-mail') ?>";
            }
        });
    
    
</script>

<?php
include('includes/footer-link.php');
?>