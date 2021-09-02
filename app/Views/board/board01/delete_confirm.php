<div class="board_wrap">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
        <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

        <div class="board_pass_check">
            <h1>해당 글을 삭제하시겠습니까?</h1>

            <div class="pass_wrap">

                글 삭제 후 절대 복구할 수 없습니다.<br>
                해당 글을 삭제하시겠습니까?

                <?php if(!$auth_check){?>
                <br><br>
                <input type="password" name="bod_password" required>
                <br>
                <span class="pass_help">글 작성시 입력한 비밀번호를 다시한번 입력해 주세요.</span>
                <?php }?>
            </div>

        </div>

        <div class="btn_wrap text-center">
            <button type="submit" class="btn btn-danger">삭제</button>
            <a href="<?php echo $list_page.$qstr?>" class="btn">취소</a>
        </div>

    </form>

</div>