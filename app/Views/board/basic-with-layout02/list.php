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

        <table class="table table--v2 text-center text-muted section-divider-sm">
            <thead>
                <tr>
                <th class="d-none d-md-table-cell w-num">번호</th>
                <th class="text-left">제목</th>
                <th class="w-date">작성일</th>
                <th class="d-none d-lg-table-cell w-hit">조회수</th>
            </tr>
            </thead>
            <tbody>

            <?php
            // 공지사항 출력
            foreach($notice_list as $row){
            $reply = "";
            $secret = "";
            ?>
            <tr>
                <td class="d-none d-md-table-cell w-num">
                    <span class="text-overline badge badge-sm badge-primary">공지</span>
                </td>
                <td class="text-left">
                    <?php echo $reply . $secret?><a href="<?php echo $read_page."/".$row["bod_idx"].$qstr?>" class="section-text text-dark"><?php echo $row["bod_title"]?></a>
                </td>
                <td class="w-date"><?php echo substr($row["bod_created_at"],0,10)?></td>
                <td class="d-none d-lg-table-cell w-hit"><?php echo $row["bod_read"]?></td>
            </tr>
            <?php }?>

            <?php if ($total_count>0){

                foreach($list as $row){

                    $reply = "";
                    if ($row["bod_level"] > 1) {
                        $reply_margin_left = ((int)$row["bod_level"] - 1) * 0.625;
                        $reply = '<span class="material-icons-round icon icon-reply mr-1" style="margin-left: '.$reply_margin_left.'rem">subdirectory_arrow_right</span>';
                    }

                    $secret = "";
                    if($row["bod_secret"]){
                        $secret = "<span class='material-icons-round icon icon-sm icon-secret mr-1'>lock</span>";
                    }
                    ?>
                    <tr>
                        <td class="d-none d-md-table-cell w-num"><?php echo $start_num--?></td>
                        <td class="text-left w-title">
                            <div class="d-flex align-items-center text-reply">
                                <?php echo $reply;?>
                                <?php echo $secret; ?>

                                <a href="<?php echo $read_page."/".$row["bod_idx"].$qstr?>" class="section-text text-dark d-inline-flex flex-wrap align-items-center link--hover-text-underline">
                                    <?php if($row['bod_category']): ?>
                                        <span class="flex-auto text-caption text-primary mr-2" style="line-height: 1"><?php echo $row['bod_category']; ?></span>
                                    <?php endif; ?>

                                    <span class="link-text">
                                        <?php echo $row["bod_title"]?>
                                    </span>
                                </a>
                            </div>
                        </td>
                        <td class="w-date"><?php echo substr($row["bod_created_at"],0,10)?></td>
                        <td class="d-none d-lg-table-cell w-hit"><?php echo $row["bod_read"]?></td>
                    </tr>
                <?php }
            }else{?>
                <tr>
                    <td class="empty-cell" colspan="4">등록된 글이 없습니다.</td>
                </tr>
            <?php }?>
            </tbody>
        </table>

        <?php if (!empty($links)): ?>
            <div class="section-divider-sm pagination-wrapper">
                <?php echo $links?>
            </div>
        <?php endif; ?>

        <div class="text-right px-3">
            <?php if($board_auth["write"]){?>
                <a href="<?php echo $write_page.$qstr?>" class="btn btn-lg btn-primary">작성하기</a>
            <?php }?>
        </div>
    </div>
<?php echo $this->endSection(); ?>

