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
                        <h5 class="text-white bold inline"><b>진료문의 처리 완료</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/about/ordersample' class='text-white'>
                                <h1 class="text-white bold inline no-margin mb20"><?php echo number_format($inq_count_10)?> 명
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6 mb10">
                <div class="tiles red" >
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
                        <h5 class="text-white bold inline"><b>문의 처리 미완료</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/about/ordersample' class='text-white'>
                                <h1 class="text-white bold inline no-margin mb20"><?php echo number_format($inq_count_1)?> 건
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6 mb10">
                <div class="tiles blue" >
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
                        <h5 class="text-white bold inline"><b>이번주 후기</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/about/ordersample' class='text-white'>
                                <h1 class="text-white bold inline no-margin mb20"><?php echo number_format($week_rev_count)?> 건
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-6 mb10">
                <div class="tiles purple" >
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10 b-b b-grey">
                        <h5 class="text-white bold inline"><b>이번주 접속자</b></h5>
                        <h5 class="text-white bold inline m-l-10"></h5>
                        <div class="">
                            <a href='/master/about/ordersample' class='text-white'>
                                <h1 class="text-white bold inline no-margin mb20"><?php echo number_format($week_log_count)?> 명
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

            <div class="col-md-6  col-sm-6  mb10 graphPanel ">
                <div class="tiles white pd10">
                    <div class="p-l-20 p-r-20 p-b-10 p-t-10">
                        <h5 class="text-black bold inline  mb10">최근 일주일 문의현황</h5>
                        <canvas id="canvas2" class=''></canvas>
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
        labels: [<?php foreach($dateList as $dt){echo "'".date("m-d",$dt)."',";}?>],
        datasets: [{
            label: 'PC',
            backgroundColor: color(window.chartColors.blue).alpha(0.7).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 0,
            data: [<?php foreach($logData as $log){echo "'".$log[0]."',";}?>],fill:false,
        },{
            label: '모바일',
            backgroundColor: color(window.chartColors.red).alpha(0.7).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 0,
            data: [<?php foreach($logData as $log){echo "'".$log[1]."',";}?>],fill:false,
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

    var color = Chart.helpers.color;
    var chartData2 = {
        labels: [<?php foreach($dateList as $dt){echo "'".date("m-d",$dt)."',";}?>],
        datasets: [{
            label: '문의',
            backgroundColor: color(window.chartColors.blue).alpha(0.7).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 0,
            data: [<?php foreach($inqData as $log){echo "'".$log[0]."',";}?>],fill:false,
        }]
    };

    var ctx = document.getElementById("canvas2").getContext("2d");
    ctx.canvas.height = 120;
    new Chart(ctx, {
        type: 'bar',
        data: chartData2,
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