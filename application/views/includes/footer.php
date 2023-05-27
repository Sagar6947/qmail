<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="<?= base_url('inbox') ?>">qmail.com</a>.</strong>
    All rights reserved.
</footer>

<!-- <div class="modal fade" id="modal-lg"> -->
<div class="modal fade" id="modal-lg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" placeholder="To:" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Subject:" />
                    </div>
                    <div class="form-group">
                        <textarea id="compose-textarea" class="form-control" style="height: 200px">
                      
                    </textarea>
                    </div>
                    <div class="form-group">
                        <div class="btn btn-default btn-file">
                            <i class="fas fa-paperclip"></i> Attachment
                            <input type="file" name="attachment" />
                        </div>
                        <p class="help-block">Max. 32MB</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Send
                </button>
            </div>
        </div>
    </div>
</div>