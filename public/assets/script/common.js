/**
 * cleave 사용시 공통처리
 */
$(document).ready(function(){
    $(".cleave_number_format").each(function(){
        var cleave = new Cleave($(this), {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        })
    });

    $(".cleave_date").each(function(){
        var cleave = new Cleave($(this), {
            date: true,
            delimiter: '-',
            datePattern: ['Y', 'm', 'd']
        })
    });

    $(".cleave_tel").each(function(){
        var cleave = new Cleave($(this), {
            phone: true,
            phoneRegionCode: 'kr',
            delimiter: '-',
        })
    });

    $(".datepicker").each(function(){
        $(this).datepicker({
            calendarWeeks: false,
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
            language: "kr"
        });
    });

    $(".cleave_number").each(function(){
        var cleave = new Cleave($(this), {
            numeral: true,
            numeralThousandsGroupStyle: 'none'
        })
    });

    $("#editForm button[type='submit']").click(function(){
        $(".cleave_number_format").each(function(){
            $(this).val($(this).val().replaceAll(",",""));
        });

        try{
            len = oEditors.length;
            for(k=0;k<len;k++)oEditors[k].exec("UPDATE_CONTENTS_FIELD", []);
        }catch(e){}

    });

    $("input").attr("autocomplete","off");
});


/**
 * replace all
 * @param searchStr
 * @param replaceStr
 * @returns {String}
 */
String.prototype.replaceAll = function( searchStr, replaceStr ){
    var temp = this;
    while( temp.indexOf( searchStr ) != -1 ){temp = temp.replace( searchStr, replaceStr );}
    return temp;
}

/**
 * 천단위 쉼표 찍기
 * @param n
 * @returns {*}
 */
function fnCommify(n) {
    var reg = /(^[+-]?\d+)(\d{3})/;   // 정규식
    n += '';                          // 숫자를 문자열로 변환
    while (reg.test(n))
        n = n.replace(reg, '$1' + ',' + '$2');
    return n;
}


/**
 * 다음 우편번호 찾기
 *
 * daum js 파일을 꼭 미리 넣어주셔야 작동합니다.
 * <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
 *
 * divboxID : div 객체;
 * objID1 : 우편번호 inputbox
 * objID2 : 주소1 inputbox
 * objID3 : 주소2 inputbox
 */
var postDIV = "";
//-- 창 닫기
function closeDaumPostcode() {
    // iframe을 넣은 element를 안보이게 한다.
    postDIV.css("display","none");
}
function callDaumPostCode(objID1,objID2,objID3) {
    postDIV = $("#zipWrap");
    obj1 = $("#" + objID1);
    obj2 = $("#" + objID2);
    if(objID3)obj3 = $("#" + objID3);

    if(!postDIV.length){
        str = '<div id="zipWrap" style="display:none;position:fixed;overflow:hidden;z-index:350;-webkit-overflow-scrolling:touch;"><img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:350" onclick="closeDaumPostcode()" alt="닫기 버튼"></div>';
        $("body").append(str);
        postDIV = $("#zipWrap");
    }

    divObj = document.getElementById("zipWrap");

    new daum.Postcode({
        oncomplete: function(data) {
            // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

            // 각 주소의 노출 규칙에 따라 주소를 조합한다.
            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
            var fullAddr = data.address; // 최종 주소 변수
            var extraAddr = ''; // 조합형 주소 변수

            // 기본 주소가 도로명 타입일때 조합한다.
            if(data.addressType === 'R'){
                //법정동명이 있을 경우 추가한다.
                if(data.bname !== ''){
                    extraAddr += data.bname;
                }
                // 건물명이 있을 경우 추가한다.
                if(data.buildingName !== ''){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
            }

            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            obj1.val(data.zonecode); //5자리 새우편번호 사용
            obj2.val(fullAddr);
            if(objID3)obj3.focus();
            //obj3.value = data.addressEnglish; 필요없다.

            // iframe을 넣은 element를 안보이게 한다.
            // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
            //element_layer.style.display = 'none';
            closeDaumPostcode();
        },
        width : '100%',
        height : '100%'
    }).embed(divObj);

    // iframe을 넣은 element를 보이게 한다.
    postDIV.css("display","block");

    // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
    initLayerPosition();
}

// 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
// resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
// 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
function initLayerPosition(){
    var width = 350; //우편번호서비스가 들어갈 element의 width
    var height = 400; //우편번호서비스가 들어갈 element의 height
    var borderWidth = 5; //샘플에서 사용하는 border의 두께

    // 위에서 선언한 값들을 실제 element에 넣는다.
    postDIV.css("width",width + 'px');
    postDIV.css("height",height + 'px');
    postDIV.css("border",borderWidth + 'px solid');

    // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
    postDIV.css("left",(((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px');
    postDIV.css("top",(((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px');

    //alert(postDIV.css("left") + "\n" + postDIV.css("top") + " \n\n" + postDIV.width() + "\n\n" + postDIV.height());
    //postDIV.css("border","2px solid red");
}

/*
* 쿠키 체크 함수
*/
function fnGetCookie(name){
    var Found = false
    var start, end
    var i = 0
    while(i <= document.cookie.length) {
        start = i
        end = start + name.length
        if(document.cookie.substring(start, end) == name) {
            Found = true
            break;
        }
        i++
    }

    if(Found == true) {
        start = end + 1
        end = document.cookie.indexOf(";", start)
        if(end < start)
            end = document.cookie.length
        return document.cookie.substring(start, end)
    }
    return ""
}

/*
* 쿠키 설정 함수
*/
function fnSetCookie(name, value, expiredays){
    var todayDate = new Date();
    todayDate.setDate( todayDate.getDate() + expiredays );
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    return true;
}

//-- byte 구하기
function fnGetByte(str){
    var resultSize = 0;
    if(str == null)return 0;

    for(var i=0; i<str.length; i++){
        var c = escape(str.charAt(i));
        if(c.length == 1)//기본 아스키코드
        {resultSize ++;}
        else if(c.indexOf("%u") != -1)//한글 혹은 기타
        {resultSize += 2;}
        else resultSize ++;
    }
    return resultSize;
}

function randomString() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var string_length = 15;
    var randomstring = '';
    for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum,rnum+1);
    }
    //document.randform.randomfield.value = randomstring;
    return randomstring;
}

function getWeekName(d){
    var week = new Array('일', '월', '화', '수', '목', '금', '일');

    var today = new Date(d).getDay();
    var todayLabel = week[today];

    return todayLabel;
}