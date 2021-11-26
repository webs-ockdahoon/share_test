<div class="board_wrap">

    <table class="board_list">
        <thead>
            <tr>
                <th class="w100">글번호</th>
                <th>제목</th>
                <th class="w100">글쓴이</th>
                <th class="w100">열람</th>
                <th class="w100">작성일시</th>
            </tr>
        </thead>
        <tbody>

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
                <td class="text-center"><?php echo $row["bod_group"]?></td>
                <td class="text-left"><?php echo $reply . $secret?><a href="<?php echo $read_page."/".$row["bod_idx"].$qstr?>"><?php echo $row["bod_title"]?></a></td>
                <td class="text-center"><?php echo $row["bod_writer_name"]?></td>
                <td class="text-center"><?php echo $row["bod_read"]?></td>
                <td class="text-center"><?php echo substr($row["bod_created_at"],0,10)?></td>
            </tr>
        <?php }
        }else{?>
            <tr>
                <td class="text-center" colspan="5">등록된 글이 없습니다.</td>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <div class="board_list_foot">
        <div class="btn_wrap"></div>
        <div class="paging_wrap"><?php echo $links?></div>
        <div class="btn_wrap text-right">
            <?php if($board_auth["write"]){?>
                <a href="<?php echo $write_page.$qstr?>" class="btn">글작성</a>
            <?php }?>
        </div>
        <div class="search_wrap">
            <form method="get">
                <input type="hidden" name="page" value="1">

                <select name="s1" id="s1">
                    <option value="bod_title" <?php if($s1=="bod_title")echo "selected";?>>제목</option>
                    <option value="bod_content" <?php if($s1=="bod_content")echo "selected";?>>내용</option>
                    <option value="bod_writer_name" <?php if($s1=="bod_writer_name")echo "selected";?>>글쓴이</option>
                </select>
                <input type="text" name="s2" id="s2" value="<?php echo $s2?>">
                <button type="submit">검색</button>
            </form>
        </div>
    </div>

</div>