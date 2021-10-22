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
                    <option value="bod_writer_name" <?php if($s1=="bod_writer_name")echo "selected";?>>작성자</option>
                </select>
            </div>

            <div class="searchform-control-submit">
                <input type="text" name="s2" id="s2" value="<?php echo $s2?>" class="form-control" placeholder="검색어를 입력하세요.">
                <button type="submit" class="btn btn-primary form-submit">
                    <span class="sr-only">검색</span>
                    <span class="material-icons-round">search</span>
                </button>
            </div>
        </form>
    </aside>

    <div class="container section">

        <table class="table table--v2 text-center text-muted">
            <thead>
                <tr>
                <th class="d-none d-md-table-cell w-num">번호</th>
                <th class="text-left">제목</th>
                <th class="d-none d-md-table-cell w-author">작성자</th>
                <th class="w-date">작성일</th>
                <th class="d-none d-lg-table-cell w-hit">조회수</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td class="d-none d-md-table-cell w-num">
                    <span class="text-overline badge badge-sm badge-primary">공지</span>
                </td>
                <td class="text-left">
                    <a href="" class="section-text text-dark">공지사항 제목 입니다.</a>
                </td>
                <td class="d-none d-md-table-cell w-author">관리자</td>
                <td class="w-date">2021-10-22</td>
                <td class="d-none d-lg-table-cell w-hit">1,234</td>
            </tr>

            <?php if ($total_count>0){

                foreach($list as $row){

                    $reply = "";
                    for($k=1;$k<$row["bod_level"];$k++){
                        $reply.= "&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    if($reply)$reply = $reply . '└&nbsp;&nbsp;';

                    $secret = "";
                    if($row["bod_secret"]){
                        $secret = "[비밀글] ";
                    }
                    ?>
                    <tr>
                        <td class="d-none d-md-table-cell w-num"><?php echo $row["bod_group"]?></td>
                        <td class="text-left w-title">
                            <?php echo $reply . $secret?>
                            <a href="<?php echo $read_page."/".$row["bod_idx"].$qstr?>" class="section-text text-dark"><?php echo $row["bod_title"]?></a>
                        </td>
                        <td class="d-none d-md-table-cell w-author"><?php echo $row["bod_writer_name"]?></td>
                        <td class="w-date"><?php echo substr($row["bod_created_at"],0,10)?></td>
                        <td class="d-none d-lg-table-cell w-hit"><?php echo $row["bod_read"]?></td>
                    </tr>
                <?php }
            }else{?>
                <tr>
                    <td class="empty-cell" colspan="5">등록된 글이 없습니다.</td>
                </tr>
            <?php }?>
            </tbody>
        </table>

        <div class="pagination-wrapper">
            <?php echo $links?>
        </div>

        <div>
            <a href="<?php echo $write_page.$qstr?>" class="btn btn-primary">작성하기</a>
        </div>
    </div>
<?php echo $this->endSection(); ?>

