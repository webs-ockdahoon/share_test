<div class="board_wrap">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
        <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

        <div class="board_pass_check">
            <h1>비밀번호 입력</h1>

            <div class="pass_wrap">
                <input type="password" name="bod_password" required>
                <br>
                <span class="pass_help">글 작성시 입력한 비밀번호를 다시한번 입력해 주세요.</span>
            </div>

        </div>

        <div class="btn_wrap text-center">
            <button type="submit" class="btn btn-primary">확인</button>
            <a href="<?php echo $list_page.$qstr?>" class="btn">취소</a>
        </div>

    </form>

</div>