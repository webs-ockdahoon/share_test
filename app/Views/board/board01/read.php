<div class="board_wrap">
    <form method="post" enctype="multipart/form-data" onsubmit="return fnBoardSubmit();">

        <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

        <table class="board_write">
            <tbody>
            <tr>
                <th>작성자명</th>
                <td><?php echo $bod_writer_name?></td>
            </tr>
            <tr>
                <th >제목</th>
                <td><?php echo $bod_title?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td><?php echo nl2br($bod_content)?></td>
            </tr>

            <?php if(isset($bof_list)){
                foreach($bof_list as $bof){
                    $bof_file_size = fnConvertFileSize($bof["bof_file_size"]);

                    ?>
                <tr>
                    <th>첨부파일</th>
                    <td><a href="<?php echo $download_page?>/<?php echo $bod_idx?>/<?php echo $bof["bof_idx"]?>"><?php echo $bof["bof_file_name"]?></a> (<?php echo $bof_file_size?>)</td>
                </tr>
            <?php }
            }?>

            </tbody>
        </table>

        <div class="btn_wrap">
            <a href="<?php echo $list_page.$qstr?>" class="btn">목록으로</a>
            <a href="<?php echo $reply_page."/".$idx.$qstr?>" class="btn btn-primary">답변하기</a>
            <a href="<?php echo $write_page."/".$idx.$qstr?>" class="btn btn-primary">수정하기</a>
            <a href="<?php echo $delete_page."/".$idx.$qstr?>" class="btn btn-danger">삭제하기</a>
        </div>

    </form>

</div>