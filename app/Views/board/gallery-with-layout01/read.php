<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $heroText = $bod_category ? "<span class='text-primary'>{$bod_category}</span>" : NULL;
    $this->setVar('bodyClassName', 'page--board page--board-'.$boc_code);
    $this->setVar('heroTitle', $boc_title);
    $this->setVar('heroText', $heroText);
?>

<?php echo $this->section('content'); ?>
    <article class="container">
        <div class="section border-top is-2 border-primary section-text text-muted">
            <form method="post" enctype="multipart/form-data" onsubmit="return fnBoardSubmit();">

                <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

                <header class="section-card border-bottom">
                    <h3 class="section-title mb-2 text-dark"><?php echo $bod_title?></h3>
                    <ul class="list-bullet is-inline list-bullet--reset font-base">
                        <li><strong class="font-weight-normal text-dark">작성자</strong> <?php echo $bod_writer_name?></li>
                        <li><strong class="font-weight-normal text-dark">작성일</strong> <?php echo $bod_created_at; ?></li>
                        <li><strong class="font-weight-normal text-dark">조회수</strong> <?php echo $bod_read; ?></li>
                    </ul>
                </header>

                <?php if(isset($bof_list) && !empty($bof_list)){ ?>
                    <section class="section-card section-card--sidebar border-bottom">
                        <h4 class="section-card__sidebar section-subtitle font-weight-medium text-dark">파일</h4>

                        <ul class="list-unstyled section-card__body font-base mb-n2">
                            <?php  foreach($bof_list as $bof){
                                $bof_file_size = fnConvertFileSize($bof["bof_file_size"]);
                                ?>
                                    <li class="mb-2">
                                        <a href="<?php echo $download_page?>/<?php echo $bod_idx?>/<?php echo $bof["bof_idx"]?>" class="d-inline-flex align-items-center link--hover-text-underline text-reset">
                                            <span class="material-icons-round material-icons-20 mr-2 text-dark">download</span>
                                            <span class="link-text text-break">
                                        <?php echo $bof["bof_file_name"]?>
                                        <small class="ml-1 text-muted">(<?php echo $bof_file_size?>)</small>
                                    </span>
                                        </a>
                                    </li>
                            <?php } ?>
                        </ul>
                    </section>
                <?php }?>

                <section class="section-card border-bottom">
                    <h4 class="sr-only">내용</h4>
                    <div><?php echo nl2br($bod_content)?></div>
                </section>

                <ul class="list-unstyled">
                    <li class="border-bottom">
                        <a href="." class="section-card py-3 d-inline-flex align-items-center link--hover-text-underline text-reset">
                            <span class="mr-2 d-flex align-items-center text-dark">
                               이전글 <span class="material-icons-round font-base ml-1 text-black-50">expand_less</span>
                            </span>
                            <span class="link-text">이전글 제목입니다.</span>
                        </a>
                    </li>

                    <li class="border-bottom">
                        <a href="." class="section-card py-3 d-inline-flex align-items-center link--hover-text-underline text-reset">
                            <span class="mr-2 d-flex align-items-center text-dark">
                                다음글 <span class="material-icons-round font-base ml-1 text-black-50">expand_more</span>
                            </span>
                            <span class="link-text">다음글 제목입니다.</span>
                        </a>
                    </li>
                </ul>

                <div class="section-card pb-0 text-center text-md-right row justify-content-md-between">
                    <div class="col-12 col-md-auto mb-4 mb-md-3">
                        <a href="<?php echo $reply_page."/".$idx.$qstr?>" class="btn btn-light mr-1">답변하기</a>
                        <a href="<?php echo $write_page."/".$idx.$qstr?>" class="btn btn-light mr-1">수정하기</a>
                        <a href="<?php echo $delete_page."/".$idx.$qstr?>" class="btn btn-outline-danger">삭제하기</a>
                    </div>

                    <div class="col-12 col-md-auto mb-3">
                        <a href="<?php echo $list_page.$qstr?>" class="btn btn-lg btn-outline-gray--dark">목록보기</a>
                    </div>
                </div>

            </form>
        </div>
    </article>
<?php echo $this->endSection(); ?>

