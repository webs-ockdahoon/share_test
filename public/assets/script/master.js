$(function(){
    $(".list_del_btn").click(function(){
       list_del($(this).attr("data-idx"));
    });
});

/**
 * 리스트 1개 항목 삭제하기
 * @param idx
 */
function list_del(idx){
    if(!confirm("해당 자료를 삭제하시겠습니까?"))return;

    var idx_arr = [];
    idx_arr[0] = idx;
    $.ajax({
        url:cont_url+"/del",
        data:{'idx':idx_arr},
        dataType:'JSON',
        method:'POST',
        success:function(data){
            if(data["result"]=="OK"){
                document.location.reload();
            }
        }
    });
}

/**
 * 리스트 선택항목 삭제하기
 */
function list_check_del(){
    var chkObj = $(".table-bordered tbody input[type='checkbox']:checked");
    if(!chkObj.length){
        alert("삭제할 정보를 선택해 주세요.");
        return;
    }

    if(!confirm(chkObj.length + "개의 정보를 삭제하시겠습니까?\n삭제 후 복구할 수 없습니다."))return;

    var idx_arr = [];
    for(k=0;k<chkObj.length;k++){
        idx_arr[k] = chkObj.eq(k).val();
    }

    $.ajax({
        url:cont_url+"/del",
        data:{'idx':idx_arr},
        dataType:'JSON',
        method:'POST',
        success:function(data){
            if(data["result"]=="OK"){
                document.location.reload();
            }
        }
    });
}

/**
 * 리스트 모두 체크 / 체크 해제
 */
function list_check_all(chk){
    if(chk){
        $(".table-bordered input[type='checkbox']").prop("checked",true);
    }else{
        $(".table-bordered input[type='checkbox']").prop("checked",false);
    }
    list_selected_chk();
}

/**
 * product > category
 */
var sortTree;
function fnCategoryListInit(){
    //
    $("ol.nested_with_switch").sortable();
    sortTree = $(".sortList").sortable({
        handle: '.fa.fa-arrows-alt',
        group: 'serialization',
        onDragStart:function(obj,container,_super,event){
            obj.css({
                height: obj.outerHeight(),
                width: obj.outerWidth()
            });
            obj.addClass(container.group.options.draggedClass);
            $("ol.sortList li.placeholder").height(obj.outerHeight());
            $("ol.sortList li.placeholder").css("border","1px solid red !important");
        },
        onDrag:function(obj,position,_super,event){
            obj.css(position)
            $("ol.sortList li.placeholder").height(obj.height());
        },
        onDrop:function (obj, container, _super, event) {
            obj.removeClass(container.group.options.draggedClass).removeAttr("style")
            $("body").removeClass(container.group.options.bodyClass)
            obj.css("background-color","#d44950").animate({"background-color":"#ffffff"},500);
        }
    });
}

function fnCategorySortSave(){
    //
    if(!confirm("현재 순서를 저장하시겠습니까?"))return;
    var data = sortTree.sortable("serialize").get();
    var jsonString = JSON.stringify(data, null, ' ');

    $.ajax({
        url:cont_url + "/sortSave",
        data:{"sortData":data},
        dataType:'JSON',
        method:'POST',
        success:function(data){
            if(data["result"]=="OK"){
                alert("저장되었습니다.");
            }
        }
    });
}

function fnCategoryDelFail(Pcount){
    alert("해당 분류에 " + Pcount + "개의 상품이 있습니다.\n\n분류에 속하는 상품이 있을경우 삭제할 수 없습니다.\n\n상품관리에서 해당 분류의 상품을 다른 분류로 변경해 주세요.");
}

/**
 * 리스트 공통 - 항목 1개 삭제하기 - 수정 - 소속된 상품이 있거나, 하위 카테고리가 있을경우 삭제 불가.
 */
function fnCategoryDel(cat_idx){
    //
    if($("li[data-id="+cat_idx+"]").find("ol>li").length){
        alert("하위 분류가 존재합니다. 하위 분류를 먼저 삭제 후 삭제 가능하니다.");
        return;
    }

    if(!confirm("정말로 삭제하시겠습니까?\n\n삭제 후 복구는 불가능합니다."))return;

    $.ajax({
        url:cont_url+"/del",
        data:{'idx':cat_idx},
        dataType:'JSON',
        method:'POST',
        success:function(data){
            if(data["result"]=="OK"){
                document.location.reload();
            }
        }
    });
}

/**
 * 카테고리 선택하기
 * @type {number}
 */
maxStep = 3;	//-- 최고 단계
function fnCategorySelectInit(objID,selected){

    for(k=1;k<maxStep;k++){
        $("#"+objID+"_"+k).change(function(){
            tmp = $(this).prop("id").split("_");
            nextStep = parseInt(tmp[tmp.length-1])+1;
            fnCategorySelect(objID,nextStep,"");
        });
    }

    if(parseInt(selected)){	//-- 초기 선택값이 있을경우 전체를 셋팅해야함.

        $.ajax({
            "url":"/master/product/category/step/",
            "data":{"selected":selected},
            "dataType":"json",
            "type":"post",
            "success":function(data){

                for(k=1;k<=maxStep;k++){
                    d = data["data"][k];
                    if(d.length){
                        str = "<option value=''>" + k + "단계 선택</option>";
                        for(j=0;j<d.length;j++){
                            s = "";
                            if(d[j]["selected"])s="selected";
                            str+="<option value='" + d[j]["cat_idx"] + "' " + s + ">" + d[j]["cat_title"] + "</option>";
                        }
                    }else{
                        str = "<option value=''>선택사항 없음</option>";
                    }
                    obj = $("#"+objID+"_"+k);
                    obj.html(str);
                }
            }
        });

    }else{
        fnCategorySelect(objID,1,"");
    }
}

function fnCategorySelect(objID,nextStep,selected){
    var parentObj="";
    if(nextStep>1){
        parentObj = $("#"+objID+"_"+(nextStep-1)).val();
    }


    $.ajax({
        "url":"/master/product/category/step/",
        "data":{"step":nextStep,"parent":parentObj},
        "dataType":"json",
        "type":"post",
        "success":function(data){
            level = data["level"];
            for(k=1;k<=maxStep;k++){
                obj = $("#"+objID+"_"+k);
                if(k<nextStep)continue;	//-- 이전 단계 객체는 건들지 않음
                else if(k==nextStep){		//-- 새로운 단계 데이터로 셋팅
                    d = data["data"];
                    if(d.length){
                        str = "<option value=''>" + k + "단계 선택</option>";
                        for(j=0;j<d.length;j++){
                            str+="<option value='" + d[j]["cat_idx"] + "'>" + d[j]["cat_title"] + "</option>";
                        }
                    }else{
                        str = "<option value=''>선택사항 없음</option>";
                    }
                    obj.html(str);
                }else if(k>nextStep){		//-- 새로 셋팅한 이후 객체 초기화
                    obj.html("<option value=''>선택사항 없음</option>");
                }
            }

        }
    });
}

function fnHeaderPreview(){
    hTitle = $("#header_title").val();
    hDescription = $("#header_description").val();
    hImage = $("#header_image").val();
    hAdditional = $("#header_additional").val();

    //-- 문자 작성하기
    str = '<title>'+hTitle+'</title>\n';
    str+= '<meta name="description" content="' + hDescription + '">\n';
    str+= '<meta property="og:type" content="website">\n';
    str+= '<meta property="og:title" content="'+hTitle+'">\n';
    str+= '<meta property="og:description" content="' + hDescription + '">\n';
    str+= '<meta property="og:image" content="'+hImage+'">\n';

    str+= '<meta name="twitter:card" content="summary">\n';
    str+= '<meta name="twitter:title" content="'+hTitle+'">\n';
    str+= '<meta name="twitter:description" content="' + hDescription + '">\n';
    str+= '<meta name="twitter:image" content="'+hImage+'">\n';
    str+= hAdditional;

    str = str.replaceAll("<","&lt;");
    str = str.replaceAll(">","&gt;");
    str = str.replaceAll("\n","<br>");
    $("#previewCode").html(str);
}

// 관리자모드 검색시 날짜 셋팅하기
function fnReportDateSet(d1,d2){
    $("#s1").val(d1);
    $("#s2").val(d2);
}

// 관리자모드 업로드한 이미지 썸네일 확인하기
function fnThumbView(fpath){
    if(!fpath){
        alert("존재하지 않는 이미지 입니다.");
        return;
    }
    var str = "<img src='/uploaded/file/" + fpath + "' class='img-responsive'>";
    $("#thumbView .modal-body").html(str);
    $("#thumbView").modal("show");
}

/**
 * 엑셀 다운로드 페이지 호출
 */
function fnExcelDown(){
    var loc = document.location.href;
    var qstr = "";
    if(loc.indexOf("?")>-1){
        var temp = document.location.href.split("?");
        qstr = temp[1];
    }
    var excel_url = cont_url+'/excel';
    if(qstr)excel_url+="?"+qstr;
    document.location=excel_url;
}

/**
 * 관리자모드 공통 List Display Toggle
 */
$(function(){
    $(".toggle_display_btn").each(function(){
        if($(this).html()=="Y")$(this).removeClass("btn-danger").addClass("btn-success");
        else $(this).removeClass("btn-success").addClass("btn-danger");

        $(this).click(function(){
            var n_display = $(this).html();

            if(n_display == "Y")n_display = "N";
            else n_display = "Y";

            var idx = $(this).prop("id").replace("display_","");

            $.ajax({
                url:cont_url + "/set_display",
                data:{'idx':idx,'display':n_display},
                dataType:'JSON',
                method:'POST',
                async:false,
                success:function(data){
                    if(data["result"]=="OK"){
                        var btn_obj = $("#display_"+idx);
                        btn_obj.html(n_display);
                        if(n_display=="Y")btn_obj.removeClass("btn-danger").addClass("btn-success");
                        else btn_obj.removeClass("btn-success").addClass("btn-danger");

                        // 단일 Y 처리
                        if(data["active_idx"]){
                            if($("#display_"+data["active_idx"]).length) {
                                $(".toggle_display_btn").each(function () {
                                    if(data["active_group"]){
                                        if($(this).attr("data-group")!=data["active_group"])return;
                                    }
                                    $(this).removeClass("btn-success").addClass("btn-danger").html("N");
                                });
                                $("#display_"+data["active_idx"]).removeClass("btn-danger").addClass("btn-success").html("Y");
                            }
                        }

                    }else{
                        alert("오류가 발생하였습니다.");
                    }
                }
            });
        });
    });
});