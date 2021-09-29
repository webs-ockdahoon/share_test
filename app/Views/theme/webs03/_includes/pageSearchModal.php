<div id="pageSearchModal" class="modal modal-v1 page-search-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container modal-container">
                <div class="modal-header modal-header--close">
                    <h2 class="modal-title">무엇이 궁금하신가요?</h2>

                    <button type="button" class="btn btn-icon modal-close" data-dismiss="modal" aria-label="Close">
                        <span class="material-icons-round">close</span>
                    </button>
                </div>

                <form class="modal-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="searchType1" name="searchType" class="custom-control-input" checked>
                            <label class="custom-control-label" for="searchType1">통합 검색</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="searchType2" name="searchType" class="custom-control-input">
                            <label class="custom-control-label" for="searchType2">의료진 검색</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="searchType3" name="searchType" class="custom-control-input">
                            <label class="custom-control-label" for="searchType3">진료과 검색</label>
                        </div>
                    </div>
                    <div class="form-group form-group--pull">
                        <input type="search" class="form-control form-control-lg form-control--underline" placeholder="검색어를 입력해 주세요." required>

                        <div class="form-control-pull">
                            <button type="submit" class="btn btn-icon" title="검색하기">
                                <span class="material-icons-round">search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
