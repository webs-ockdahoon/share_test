<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--board page--board-basic');
    $this->setVar('heroTitle', '공지사항');
    $this->setVar('heroText', NULL);
?>

<?php echo $this->section('content'); ?>
    <div class="container">
        <table class="table board-table text-caption text-muted section-divider">
            <thead>
            <tr class="text-dark">
                <th scope="col" class="cell-number">NO</th>
                <th scope="col">제목</th>
                <th scope="col" class="cell-date">등록일</th>
            </tr>
            </thead>

            <tbody>

            <?php foreach($items as  $index => $item){ ?>
                    <tr>
                        <td class="text-overline  font-en cell-number"><?php echo count($items) - $index; ?></td>
                        <td>
                            <a href="/" class="text-base text-dark">
                                <?php echo $item["title"]?>
                            </a>
                        </td>

                        <td class="text-overline cell-date">
                            <time datetime="<?php echo $item["created_at"]; ?>"><?php echo substr($item["created_at"],0,10)?></time>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" class="board-table__empty-cell text-center text-body2 text-dark">
                        <?php if (false): ?>
                            <p class="mb-4">'<strong>Search Keyword</strong>'<br>검색 결과가 없습니다.</p>
                            <a href="/" class="btn btn-wide btn-dark text-caption">
                               목록으로 돌아가기
                            </a>
                        <?php else: ?>
                            <p>등록된 내용이 없습니다.</p>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="pagination-wrapper font-en text-body2">
            pagination
        </div>
    </div>
<?php echo $this->endSection(); ?>
