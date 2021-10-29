<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--board page--board-'.$boc_code);
    $this->setVar('heroTitle', $boc_title);
?>

<?php echo $this->section('content'); ?>
    <aside class="container">
        <form method="get" role="search"  class="searchform searchform--v1">
            <legend class="sr-only">내용 검색하기</legend>
            <input type="hidden" name="page" value="1">
            <div class="searchform-sidebar">
                <select name="s1" id="s1" class="custom-select">
                    <option value="bod_title" <?php if($s1=="bod_title")echo "selected";?>>제목</option>
                    <option value="bod_content" <?php if($s1=="bod_content")echo "selected";?>>내용</option>
                </select>
            </div>

            <div class="searchform-control-submit">
                <input type="text" name="s2" id="s2" value="<?php echo $s2?>" class="form-control" placeholder="검색어를 입력하세요." required>
                <button type="submit" class="btn btn-primary form-submit">
                    <span class="sr-only">검색</span>
                    <span class="material-icons-round">search</span>
                </button>
            </div>
        </form>
    </aside>

    <div class="container section">

        <?php if (isset($_GET['s2']) && !empty($_GET['s2'])): ?>
            <div class="mb-3 text-center">
                <a href="<?php echo $list_page; ?>" class="btn btn-outline-dark">전체 목록 페이지로 돌아가기</a>
            </div>
        <?php endif; ?>

        <ul class="list-unstyled row row-sm section-divider-sm gallery-card-row">
            <?php if ($total_count>0){

                foreach($list as $row){

                    $secret = "";
                    if($row["bod_secret"]){
                        $secret = "<span class='material-icons-round material-icons-20'>lock</span>";
                    }
                    ?>
                    <li class="col-12 col-sm-12 col-lg-4 mb-3 mb-md-4">
                        <a href="<?php echo $read_page."/".$row["bod_idx"].$qstr?>" class="card gallery-card gallery-card--responsive gallery-card--link-hover">
                            <div class="card-thumbnail card-box">
                                <div class="card-thumbnail__frame">
                                    <span class="card-thumbnail__frame-img bg-light" style="background-image:url('');"></span>
                                </div>
                            </div>

                            <div class="card-content card-box text-lg-center">
                                <h4 class="card-title mb-2"><?php echo $secret; ?> <?php echo $row["bod_title"]?></h4>
                                <time class="text-caption text-muted"><?php echo substr($row["bod_created_at"],0,10)?></time>

                                <?php if($row['bod_category']): ?>
                                    <p class="text-caption text-primary mt-3" style="line-height: 1"><?php echo $row['bod_category']; ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </li>
                <?php }
            }else{?>
                <li class="col-12">
                    <section class="gallery-card text-center border-top border-bottom">
                        <div class="card-box">
                            <h3 class="h6 mb-0 py-5">등록된 글이 없습니다.</h3>
                        </div>
                    </section>
                </li>
            <?php }?>
        </ul>

        <div class="section-divider-sm pagination-wrapper">
            <?php echo $links?>
        </div>

        <div class="px-3 text-right">
            <a href="<?php echo $write_page.$qstr?>" class="btn btn-lg btn-primary">작성하기</a>
        </div>
    </div>
<?php echo $this->endSection(); ?>

