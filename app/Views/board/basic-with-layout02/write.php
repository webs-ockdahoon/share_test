<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--board page--board-'.$boc_code);
    $this->setVar('heroTitle', $boc_title);
    $this->setVar('heroText', '작성하기');
?>

<?php echo $this->section('content'); ?>
    <article class="container container--max-lg section">
        <form method="post" enctype="multipart/form-data" onsubmit="return fnBoardSubmit();">
            <input type="hidden" name="<?php echo $primaryKey?>" id="<?php echo $primaryKey?>" value="<?php echo $idx?>">
            <input type="hidden" name="qstr" id="qstr" value="<?php echo $qstr;?>">

            <table class="section-divider-sm table table--v2 table--responsive-column2">
                <tbody>

                <tr>
                    <th>공지</th>
                    <td>
                        <label class="custom-control custom-control-inline custom-checkbox mb-0">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label">공지로 설정하기</span>
                        </label>
                        <small class="font-sm form-text text-muted">* 설정시 목록 상단에 노출됩니다.</small>
                    </td>
                </tr>

                <?php
                if($bod_origin_secret){?>
                    <tr>
                        <th>비밀글</th>
                        <td>
                            <small class="font-sm text-danger">원글과 동일하게 비밀글로 작성됩니다.</small>
                        </td>
                    </tr>
                <?php }else if($conf["boc_secret"]=="check"){?>
                    <tr>
                        <th>비밀글</th>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="bod_secret" id="bod_secret" class="custom-control-input" value="1" <?php if($bod_secret)echo "checked";?>>
                                <span class="custom-control-label">비밀글로 설정하기</span>
                            </label>
                        </td>
                    </tr>
                <?php }else if($conf["boc_secret"]=="force"){?>
                    <tr>
                        <th>비밀글</th>
                        <td>
                            <small class="font-sm text-danger">해당 게시판은 글 작성시 자동으로 비밀글로 작성됩니다.</small>
                        </td>
                    </tr>
                <?php }?>

                <?php if(sizeof($category)>0 && $bod_level==1){?>
                    <tr>
                        <th>분류</th>
                        <td>
                            <select name="bod_category" id="bod_category" class="custom-select" required>
                                <option value="">분류를 선택해 주세요.</option>
                                <?php foreach($category as $cate){?>
                                    <option value="<?php echo $cate?>" <?php if($bod_category==$cate)echo "selected";?>><?php echo $cate?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                <?php }?>

                <tr>
                    <th>작성자</th>
                    <td>
                        <input type="text" name="bod_writer_name" id="bod_writer_name" class="form-control" placeholder="작성자를 입력해 주세요." value="<?php echo $bod_writer_name?>" required>
                    </td>
                </tr>

                <tr>
                    <th>비밀번호</th>
                    <td>
                        <input type="password" name="bod_password" id="bod_password" class="form-control" minlength="4" placeholder="4자 이상 입력해 주세요." required>
                    </td>
                </tr>

                <tr>
                    <th >제목</th>
                    <td>
                        <?php if(sizeof($fixed_title)<1){?>
                            <input type="text" name="bod_title" id="bod_title" class="form-control" placeholder="제목을 입력해 주세요." value="<?php echo $bod_title?>" required>
                        <?php }else{?>
                            <select name="bod_title" id="bod_title" class="custom-select" required>
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
                    <td>
                        <textarea name="bod_content" id="bod_content" class="form-control" rows="8" required><?php echo $bod_content?></textarea>
                    </td>
                </tr>

                <?php
                for($k=1;$k<=$conf["boc_file_count"];$k++){?>
                    <tr>
                        <th >파일첨부</th>
                        <td>
                            <input type="file" name="bod_file<?php echo $k?>" id="bod_file<?php echo $k?>" class="form-control" placeholder="" value="" >
                            <small class="form-text text-muted"><?php echo $conf["boc_file_size"]?>Mbyte 이하로 등록해 주세요.</small>

                            <?php if(isset($bof_list[$k]["bof_idx"])){ ?>
                                <label class="mt-3 font-sm custom-control custom-checkbox custom-control-inline">
                                    <input type='checkbox' name='bod_file<?php echo $k; ?>_del' class="custom-control-input" value='1'>
                                    <span class="custom-control-label text-danger">등록된 <?php echo $bof_list[$k]["bof_file_name"]; ?> 파일 삭제</span>
                                </label>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }?>

                <tr>
                    <th>관련 링크</th>
                    <td>
                        <div class="mb-3">
                            <h4 class="font-sm font-weight-bold">링크</h4>
                            <div class="input-group">
                                <label for="link1Label" class="input-group-prepend mb-0">
                                    <span class="input-group-text">이름</span>
                                </label>
                                <input type="url" id="link1Label" class="form-control" placeholder="예) 링크 이름">
                            </div>
                            <div class="input-group">
                                <label for="link1URL" class="input-group-prepend mb-0">
                                    <span class="input-group-text">주소</span>
                                </label>
                                <input type="url" id="link1URL" class="form-control" placeholder="예) https://url.com">
                            </div>
                            <p class="mt-1 text-caption text-muted">* 입력된 링크는 새창으로 열립니다.</p>
                        </div>

                        <div>
                            <h4 class="font-sm font-weight-bold">링크</h4>
                            <div class="input-group">
                                <label for="link2Label" class="input-group-prepend mb-0">
                                    <span class="input-group-text">이름</span>
                                </label>
                                <input type="url" id="link2Label" class="form-control" placeholder="예) 링크 이름">
                            </div>
                            <div class="input-group">
                                <label for="link2URL" class="input-group-prepend mb-0">
                                    <span class="input-group-text">주소</span>
                                </label>
                                <input type="url" id="link2URL" class="form-control" placeholder="예) https://url.com">
                            </div>
                            <p class="mt-1 text-caption text-muted">* 입력된 링크는 새창으로 열립니다.</p>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="px-3 text-center text-md-right">
                <a href="<?php echo $list_page.$qstr?>" class="btn btn-lg btn-outline-gray--dark mr-2">목록으로 돌아가기</a>
                <button type="submit" class="btn btn-lg btn-primary">작성완료</button>
            </div>

        </form>
    </article>
<?php echo $this->endSection(); ?>