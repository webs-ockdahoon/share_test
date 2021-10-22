<div class="board_wrap">
    <form method="post" enctype="multipart/form-data" onsubmit="return fnBoardSubmit();">
        <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
        <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

        <table class="board_write">
            <tbody>
            
            <?php if(sizeof($category)>0 && $bod_level==1){?>
                <tr>
                    <th>분류</th>
                    <td>
                        <select name="bod_category" id="bod_category" class="form-control" required>
                            <option value="">미선택</option>
                            <?php foreach($category as $cate){?>
                                <option value="<?php echo $cate?>" <?php if($bod_category==$cate)echo "selected";?>><?php echo $cate?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
            <?php }?>
            
            <tr>
                <th>작성자명</th>
                <td><input type="text" name="bod_writer_name" id="bod_writer_name" placeholder="작성자명 입력" value="<?php echo $bod_writer_name?>" required></td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td><input type="password" name="bod_password" id="bod_password" minlength="4" placeholder="4자 이상 입력" required></td>
            </tr>

            <?php
            if($bod_origin_secret){?>
            <tr>
                <th>비밀글</th>
                <td>
                    <small>원글과 동일하게 비밀글로 작성됩니다.</small>
                </td>
            </tr>
            <?php }else if($conf["boc_secret"]=="check"){?>
            <tr>
                <th>비밀글</th>
                <td>
                    <label><input type="checkbox" name="bod_secret" id="bod_secret" value="1" <?php if($bod_secret)echo "checked";?>> 비밀글로 설정</label>
                </td>
            </tr>
            <?php }else if($conf["boc_secret"]=="force"){?>
                <tr>
                    <th>비밀글</th>
                    <td>
                        <small>해당 게시판은 글 작성시 자동으로 비밀글로 작성됩니다.</small>
                    </td>
                </tr>
            <?php }?>

            <tr>
                <th >제목</th>
                <td>
                    <?php if(sizeof($fixed_title)<1){?>
                    <input type="text" class="wfull" name="bod_title" id="bod_title" placeholder="제목 입력" value="<?php echo $bod_title?>" required>
                    <?php }else{?>
                        <select name="bod_title" id="bod_title" class="form-control" required>
                            <option value="">미선택</option>
                            <?php foreach($fixed_title as $ttl){?>
                                <option value="<?php echo $ttl?>" <?php if(trim($bod_title)==trim($ttl))echo "selected";?>><?php echo $ttl?></option>
                            <?php }?>
                        </select>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <th>내용</th>
                <td><textarea name="bod_content" id="bod_content" required><?php echo $bod_content?></textarea></td>
            </tr>

            <?php
            for($k=1;$k<=$conf["boc_file_count"];$k++){?>
            <tr>
                <th >파일첨부</th>
                <td>
                    <input type="file" class="wfull" name="bod_file<?php echo $k?>" id="bod_file<?php echo $k?>" placeholder="" value="" >
                    <?php
                    if(isset($bof_list[$k]["bof_idx"])){
                        echo "현재파일 : " . $bof_list[$k]["bof_file_name"] . "&nbsp;&nbsp;&nbsp;&nbsp;<label><input type='checkbox' name='bod_file".$k."_del' value='1'> 파일 삭제</label>";
                    }?>
                    <br><small><?php echo $conf["boc_file_size"]?>Mbyte 이하로 등록해 주세요.</small>
                </td>
            </tr>
            <?php }?>


            </tbody>
        </table>

        <div class="btn_wrap text-center">
            <button type="submit" class="btn btn-primary">저장</button>
            <a href="<?php echo $list_page.$qstr?>" class="btn">취소</a>
        </div>

    </form>

</div>