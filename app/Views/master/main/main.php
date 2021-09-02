<style>
    .dashboard{}
    .dashboard .tiles title{}
    .dashboard .tiles .boardList{font-size:14px;color:#333;}
</style>
<div class="content dashboard sm-gutter">
    <div class="page-title">
        <h3>대쉬보드 </h3>
    </div>
    <div id="container">
        <div class='row'>

            <div class="col-md-3 col-lg-3 col-sm-6 mb10">
                <div class="tiles green">
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
                        <h5 class="text-white bold inline"><b>총 회원 수</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/' class='text-white'>
                                -
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6 mb10">
                <div class="tiles red" >
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
                        <h5 class="text-white bold inline"><b>금일 주문</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/' class='text-white'>
                                -
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6 mb10">
                <div class="tiles blue" >
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
                        <h5 class="text-white bold inline"><b>금일 발송 예정</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/' class='text-white'>
                                -
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6 mb10">
                <div class="tiles purple" >
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
                        <h5 class="text-white bold inline"><b>총 상품 수</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/' class='text-white'>
                                -
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6  col-sm-6  mb10 graphPanel">
                <div class="tiles white pd10">
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10">
                        <h5 class="text-black bold inline  mb10">최근 일주일 접속현황</h5>
                        <canvas id="canvas1" class=''></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6  col-sm-6  mb10 graphPanel">
                <div class="tiles white pd10">
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10">
                        <h5 class="text-black bold inline  mb10">최근 일주일 주문현황</h5>
                        <canvas id="canvas2" class=''></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6  col-sm-6  mb10 graphPanel">
                <div class="tiles white pd10">
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10">
                        <h5 class="text-black bold inline  mb10">최근 회원가입 현황</h5>
                        <canvas id="canvas3" class=''></canvas>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- END PAGE -->
</div>

<script>
    // chartjs 사용 - https://github.com/chartjs/Chart.js/
    var color = Chart.helpers.color;
    var chartData1 = {
        labels: ['1,2,3'],
        datasets: [{
            label: 'PC',
            backgroundColor: color(window.chartColors.blue).alpha(0.7).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 0,
            data: [1,2,3],fill:false,
        },{
            label: '모바일',
            backgroundColor: color(window.chartColors.red).alpha(0.7).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 0,
            data: [2,3,4],fill:false,
        }]
    };

    var ctx = document.getElementById("canvas1").getContext("2d");
    ctx.canvas.height = 120;
    new Chart(ctx, {
        type: 'bar',
        data: chartData1,
        options: {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: false,
                text: ''
            },
        }
    });

    var ctx = document.getElementById("canvas2").getContext("2d");
    ctx.canvas.height = 120;
    new Chart(ctx, {
        type: 'bar',
        data: chartData1,
        options: {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: false,
                text: ''
            },
        }
    });

    var ctx = document.getElementById("canvas3").getContext("2d");
    ctx.canvas.height = 120;
    new Chart(ctx, {
        type: 'bar',
        data: chartData1,
        options: {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: false,
                text: ''
            },
        }
    });


    $(document).ready(function(){
        fnPanelSizeSet();
    });

    $(window).resize(function(){
        setTimeout("fnPanelSizeSet()",300);
    });

    function fnPanelSizeSet(){
        grp = $(".graphPanel>.tiles");
        h = grp.eq(0).height();

        for(k=1;k<grp.length;k++){
            grp.eq(k).height(h);
        }

    }

</script>