<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--board page--board-'.$boc_code);
    $this->setVar('heroTitle', $bod_title);
    $this->setVar('heroText', $boc_title);
?>

<?php echo $this->section('content'); ?>
    <article class="container container--max-sm section">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

            <div class="section-box section-card border shadow-sm">
                <div class="section-divider-sm">
                    <h3 class="section-title">비밀글 기능으로 보호하고 있습니다.</h3>
                    <p class="section-subtitle text-secondary">글 작성시 입력한 비밀번호를 입력해 주세요.</p>
                </div>

                <div class="form-group">
                    <label for="bod_password" class="text-dark">비밀번호</label>
                    <input type="password" name="bod_password" id="bod_password" class="form-control" placeholder="비밀번호를 입력해 주세요." required>
                </div>

                <button type="submit" class="btn btn-secondary btn-block btn-lg">게시물 확인하기</button>
            </div>

            <div class="section-box text-center">
                <a href="<?php echo $list_page.$qstr?>" class="btn btn-light">목록으로 돌아가기</a>
            </div>

        </form>
    </article>
<?php echo $this->endSection(); ?>