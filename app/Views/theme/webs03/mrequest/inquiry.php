<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--mrequest-inquiry');
    $this->setVar('heroTitle', '진료 문의');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/mrequest-inquiry.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container container--max-md section mt-0">
        <div class="section-divider-sm section-card section-card--sidebar text-center text-md-left text-muted bg-primary--air">
            <div class="section-card__sidebar mb-0">
                <span class="material-icons-round text-center text-primary" style="font-size: 56px;">
                    contact_support
                </span>
            </div>
            <div class="section-card__body">
                <p>
                    안녕하세요.<br>
                    본 서식을 통해 <strong class="text-primary">원하는 의료서비스에 대한 문의</strong>를 남겨주시기 바랍니다.<br class="d-none d-lg-block">
                    이를 위해 아래 양식을 작성해 주시면 곧 연락드리겠습니다.
                </p>
            </div>
        </div>

        <form method="post" class="js__mrequest-form" novalidate data-success-msg="정상적으로 등록되었습니다.">
            <fieldset class="section-divider-sm section-text">
                <div class="section-header border-bottom border-dark">
                    <legend class="section-title">기본 정보 <small class="text-caption text-muted">(<strong class="text-danger">*</strong> 필수 기재)</small></legend>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="name" class="col-12 col-md-3 require-mark--before">이름</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="" value="" id="name" class="form-control form-control-lg" placeholder="예) 홍길동" required data-validator data-validator-type="required" data-required-msg="이름을 입력해 주세요.">
                    </div>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="nationality" class="col-12 col-md-3 require-mark--before">국적</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="" value="" id="nationality" class="form-control form-control-lg" placeholder="예) 한국" required data-validator data-validator-type="required" data-required-msg="국적을 입력해 주세요.">
                    </div>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="email" class="col-12 col-md-3 require-mark--before">이메일</label>
                    <div class="col-12 col-md-9">
                        <input type="email" name="" value="" id="email" class="form-control form-control-lg" placeholder="예) honggildong@gmail.com" required data-validator data-validator-type="required|email" data-required-msg="이메일을 입력해 주세요." data-email-msg="이메일 형식으로 입력해 주세요.">
                    </div>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="tel" class="col-12 col-md-3 require-mark--before">연락처</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="" value="" id="tel" class="form-control form-control-lg js__cleave-input-number" placeholder="예) 01012345678" required data-validator data-validator-type="required" data-required-msg="연락처를 입력해 주세요.">
                        <p class="form-text text-caption text-warning">* 숫자만 입력</p>
                    </div>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="birth" class="col-12 col-md-3 require-mark--before">생년월일</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="" value="" id="birth" class="form-control form-control-lg js__cleave-input-date" placeholder="예) 2021-11-02" required data-validator data-validator-type="required" data-required-msg="생년월일을 입력해 주세요.">
                        <p class="form-text text-caption text-warning">* yyyy-mm-dd 형태, 숫자만 입력</p>
                    </div>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="gender" class="col-12 col-md-3 require-mark--before">성별</label>
                    <div class="col-12 col-md-9">
                        <div class="custom-control custom-control-inline custom-radio custom-radio--v1">
                            <input type="radio" name="gender" id="male" class="custom-control-input" data-validator data-validator-type="required" data-required-msg="성별을 선택해 주세요.">
                            <label for="male" class="custom-control-label">남자</label>
                        </div>

                        <div class="custom-control custom-control-inline custom-radio custom-radio--v1">
                            <input type="radio" name="gender" id="female" class="custom-control-input" data-validator data-validator-type="required" data-required-msg="성별을 선택해 주세요.">
                            <label for="female" class="custom-control-label">여자</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="section-divider-sm section-text">
                <div class="section-header border-bottom border-dark">
                    <label class="section-title">진료 상담 <small class="text-caption text-muted">(<strong class="text-danger">*</strong> 필수 기재)</small></label>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="subject" class="col-12 col-md-3 require-mark--before">주제</label>
                    <div class="col-12 col-md-9">
                        <input type="text" name="" value="" id="subject" class="form-control form-control-lg" required data-validator data-validator-type="required" data-required-msg="주제를 입력해 주세요.">
                    </div>
                </div>

                <div class="form-group form-group--v1 form-row">
                    <label for="content" class="col-12 col-md-3 require-mark--before">상담 내용</label>
                    <div class="col-12 col-md-9">
                        <textarea name="content" rows="8" id="content" class="form-control form-control-lg" required data-validator data-validator-type="required" data-required-msg="상담 내용을 입력해 주세요."></textarea>
                    </div>
                </div>

                <div class="form-group form-group--v1">
                    <div class="agreement-card">
                        <div class="agreement-card__control-group">
                            <div class="custom-control custom-checkbox custom-checkbox--v1">
                                <input type="checkbox" class="custom-control-input" id="agree">
                                <label class="custom-control-label" for="agree"><span class="require-mark--before">개인 정보 이용 약관 동의</span></label>
                            </div>

                            <button class="agreement-card__btn-detail text-muted" type="button" data-toggle="collapse" data-target="#agreeDetail" aria-expanded="false" aria-controls="agreeDetail">
                                자세히 보기
                            </button>
                        </div>

                        <div class="collapse" id="agreeDetail">
                            <div class="mt-2 section-card section-card-sm text-caption border bg-white" style="max-height: 10em; overflow-x: hidden;">
                                개인 정보 이용 약관<br><br>
                                이용 약관 내용을 넣어 주세요.<br>
                                이용 약관 내용을 넣어 주세요.<br>
                                이용 약관 내용을 넣어 주세요.<br>
                                이용 약관 내용을 넣어 주세요.<br>
                                이용 약관 내용을 넣어 주세요.<br>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>


            <div class="row">
                <div class="col-12 offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-lg btn-block btn-primary">보내기</button>
                </div>
            </div>
        </form>
    </div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('appendBody'); ?>
    <script src="/assets/plugins/cleave/cleave.min.js"></script>
    <script>
        // 입력 형식 강제
        new Cleave('.js__cleave-input-number', {
            numeral: true,
            numeralThousandsGroupStyle: 'none',
            numeralDecimalScale: 0,
            numeralPositiveOnly: true,
            stripLeadingZeroes: false,
        });

        new Cleave('.js__cleave-input-date', {
            date: true,
            delimiter: '-',
            datePattern: ['Y', 'm', 'd']
        });

        $('.js__mrequest-form').on('submit', function(e) {
            var $form = $(this);
            var formSuccessMsg = $form.data('successMsg') || 'submitted form.';

            // 폼 유효성 체크 실패시 전송 중단
            if (!isValidForm()) {
                return false;
            }

            alert(formSuccessMsg);
            
    });

        function isValidForm() {
            var emailReg = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;

            var isValid = true;
            var $invalidTarget = null;
            var message = '';

            $('[data-validator]').each(function(index, item) {

                // 유효성 체크
                var $item = $(item);
                var type = $item.attr('type');
                var value = type === 'radio' ? $('[name='+$item.attr('name')+']:checked').length : $.trim($item.val());
                var validatorTypes = $item.data('validatorType').split('|');

                $.each(validatorTypes, function(index, validatorType) {

                    if (validatorType === 'required' && !value) {

                        $invalidTarget = $item;
                        message = $item.data(validatorType+'Msg') || 'required';
                        isValid = false;
                        return false;
                    }

                    if (validatorType === 'email' && !emailReg.test(value)) {
                        $invalidTarget = $item;
                        message = $item.data(validatorType+'Msg') || 'invalid email';
                        isValid = false;
                        return false;
                    }
                });

                if (!isValid) {
                    return isValid;
                }
            });

            if (!isValid) {
                $invalidTarget && $invalidTarget.length && $invalidTarget.focus();
                alert(message);
            }

            return isValid;
        }
    </script>
<?php echo $this->endSection();
