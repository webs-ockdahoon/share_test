<style>
    #ieBrowserUpgradeNotification {
        display: none;
    }
    .unsupported-ie body {
        overflow: hidden;
    }
    .unsupported-ie #ieBrowserUpgradeNotification {
        display: block;
    }
    .unsupported-ie #ieBrowserUpgradeModal {
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 1060;
    }
</style>

<div id="ieBrowserUpgradeNotification">
    <aside class="modal fade show d-block" id="ieBrowserUpgradeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="ieBrowserUpgradeModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <article class="card border-0 browser-upgrade-notification text-body2" style="word-break: keep-all">
                        <div class="card-body">
                            <h2 id="ieBrowserUpgradeModalLabel" class="h5 mb-4 text-dark">
                                <span class="text-primary">사용하고 있는 브라우저</span>를 <span class="text-primary">업데이트</span>해 주세요.
                            </h2>

                            <div class="mb-3" style="font-size: 0.9375rem;">
                                <p>
                                    <strong class="text-dark">웹 보안상 인터넷 익스플로러 11 이상 버전을 지원</strong>합니다.<br>인터넷 익스플로러 10 이하 버젼으로 접속할 경우, <br><span class="text-danger">일부 기능이 제한되거나 페이지가 정상적으로 동작하지 않을 수 있습니다.</span>
                                </p>
                            </div>

                            <div class="mb-3" style="font-size: 0.9375rem;">
                                <p class="mb-2">
                                    <strong class="text-dark">보다 안정적인 웹 서비스 제공</strong>을 위해, <br> <span class="text-primary">브라우저 업데이트</span> 또는 <span class="text-primary">엣지 브라우저 사용</span>을 권합니다.
                                </p>

                                <a href="https://support.microsoft.com/ko-kr/help/17621/internet-explorer-downloads" target="_blank" rel="noopener noreferrer" title="새창열림" class="btn btn-outline-dark mr-1 mb-1">
                                   인터넷 익스플로러 업데이트
                                </a>

                                <a href="https://www.microsoft.com/edge" target="_blank" rel="noopener noreferrer" title="새창열림" class="btn btn-primary mb-1">
                                    엣지 다운
                                </a>
                            </div>
                        </div>

                        <div class="card-footer border-0 bg-light">
                            <h3 class="mb-2 text-dark" style="font-size: 1rem;">다른 최신 브라우저 사용하기</h3>
                            <div class="browser-links">
                                <a href="https://www.google.com/chrome/browser/desktop/" target="_blank" rel="noopener noreferrer" title="새창열림" class="btn btn-sm bg-white border pr-3">
                                    <img src="<?php echo $THEME_URL; ?>/images/icons/icon-chrome.svg" alt="" class="mr-1" style="max-height: 32px; height: auto;">
                                    크롬
                                </a>
                                <a href="https://www.mozilla.org/firefox/new" target="_blank" rel="noopener noreferrer" title="새창열림" class="ml-1 btn btn-sm bg-white border pr-3">
                                    <img src="<?php echo $THEME_URL; ?>/images/icons/icon-firefox.png" alt="" class="mr-1" style="max-height: 32px; height: auto;">
                                    파이어폭스
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </aside>
    <div class="modal-backdrop fade show"></div>
</div>

