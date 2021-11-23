<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--board page--board-delete');
$this->setVar('heroTitle', '글 삭제하기');
?>

<?php echo $this->section('content'); ?>
    <div class="container container--max-sm">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

            <div class="section-box section-card border shadow-sm">
                <div class="section-divider-sm">
                    <h3 class="section-title">글 삭제 후 절대 복구할 수 없습니다.</h3>
                    <p class="section-subtitle text-secondary">해당 글을 정말 삭제하시겠습니까?</p>
                </div>

                <?php if(!$article_auth_check){?>
                    <div class="form-group">
                        <label for="bod_password">비밀번호</label>
                        <input type="password" name="bod_password" id="bod_password" class="form-control" required>
                        <p class="form-text text-muted">글 작성시 입력한 비밀번호를 입력해 주세요.</p>
                    </div>
                <?php }?>

                <button type="submit" class="btn btn-danger btn-block">삭제하기</button>
            </div>

            <div class="section-box section-card pt-0 text-center">
                <a href="<?php echo $list_page.$qstr?>" class="btn btn-light">목록으로 돌아가기</a>
            </div>
        </form>

    </div>
<?php echo $this->endSection(); ?>