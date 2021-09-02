<div id="pageSearchModal" class="modal fade page-search-modal" tabindex="-1" aria-labelledby="pageSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="material-icons-round md-32">close</span>
                </button>
            </div>
            <div class="modal-body pt-0 pb-5">
                <h5 id="pageSearchModalLabel" class="mb-2 ml-3 modal-title">상품 검색하기</h5>
                <?php echo $this->include($THEME_URL."/common/pageSearchform"); ?>
            </div>
        </div>
    </div>
</div>