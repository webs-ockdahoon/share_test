
<div class="content ">
    <div class="page-title">
        <h3>방문자 통계 </h3>
    </div>
    <div id="container">

        <!-- row -->
        <div class="row">
            <div class="col-md-12">

                <!-- Search Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>검색</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <form method="get">

                            <div class="form-group col-xs-12 pd0">
                                <div class='input-group date w150' style='display:inline-table;vertical-align:middle;' id='inS1Wrarp'>
                                    <input type='text' class="form-control" id="s1" name="s1" style='background:#fff;' value="<?php echo $s1?>" readonly />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                                ~
                                <div class='input-group date w150' style='display:inline-table;vertical-align:middle;'  id='inS2Wrarp'>
                                    <input type='text' class="form-control" id="s2" name="s2" style='background:#fff;' value="<?php echo $s2?>" readonly />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>

                            </div>
                            <div class="form-group col-xs-12 pd0">
                                <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date11?>','<?php echo $date12?>')">이번주</button>
                                <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date21?>','<?php echo $date22?>')">지난주</button>
                                <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date31?>','<?php echo $date32?>')">이번달</button>
                                <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date41?>','<?php echo $date42?>')">지난달</button>
                                <button type='button' class='btn btn-sm btn-default' onclick="fnReportDateSet('<?php echo $date51?>','<?php echo $date52?>')">올해</button>
                            </div>
                        </div>

                        <div class="form-group text-center col-xs-12">
                            <button type="submit" class="btn btn-primary">검색</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn" onclick='fnSearchReset()'>검색 초기화</button>
                        </div>
                        </form>

                    </div>
                </div>
                <!--/ Search Area -->

                <!-- Content Area -->
                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>방문자 수</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">
                            <div class='col-xs-12 col-md-6'><div id='chart_div1'></div></div>
                            <div class='col-xs-12 col-md-6'>
                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th><?php echo $dateField?></th><th>방문자 수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($logList1 as $list){?>
                                        <tr>
                                            <td><?php echo $list["logItem"]?></td>
                                            <td><?php echo $list["logCount"]?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>유입 사이트</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">
                            <div class='col-xs-12 col-md-6'><div id='chart_div2'></div></div>
                            <div class='col-xs-12 col-md-6'>

                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th>유입사이트</th><th>방문자 수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($logList2 as $list){?>
                                        <tr>
                                            <td><?php echo $list["logItem"]?></td>
                                            <td><?php echo $list["logCount"]?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>검색어</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <div class='col-xs-12 col-md-6'><div id='chart_div3'></div></div>
                            <div class='col-xs-12 col-md-6'>
                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th>검색어</th><th>방문자 수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($logList3 as $list){?>
                                        <tr>
                                            <td><?php echo $list["logItem"]?></td>
                                            <td><?php echo $list["logCount"]?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>브라우저</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <div class='col-xs-12 col-md-6'><div id='chart_div4'></div></div>
                            <div class='col-xs-12 col-md-6'>

                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th>브라우저</th><th>사용자 수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($logList4 as $list){?>
                                        <tr>
                                            <td><?php echo $list["logItem"]?></td>
                                            <td><?php echo $list["logCount"]?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>운영체제</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <div class='col-xs-12 col-md-6'><div id='chart_div5'></div></div>
                            <div class='col-xs-12 col-md-6'>

                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th>운영체제</th><th>사용자 수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($logList5 as $list){?>
                                        <tr>
                                            <td><?php echo $list["logItem"]?></td>
                                            <td><?php echo $list["logCount"]?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>PC/모바일</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <div class='col-xs-12 col-md-6'><div id='chart_div6'></div></div>
                            <div class='col-xs-12 col-md-6'>

                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th>PC/모바일</th><th>사용자 수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($logList6 as $list){?>
                                        <tr>
                                            <td><?php echo $list["logItem"]?></td>
                                            <td><?php echo $list["logCount"]?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="grid simple ">
                    <div class="grid-title no-border">
                        <h4>해상도</h4>
                    </div>

                    <div class="grid-body ">
                        <div class="row-fluid">

                            <div class='col-xs-12 col-md-6'><div id='chart_div7'></div></div>
                            <div class='col-xs-12 col-md-6'>

                                <table class='table table-bordered'>
                                    <thead>
                                    <tr>
                                        <th>해상도</th><th>사용자 수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($logList7 as $list){?>
                                        <tr>
                                            <td><?php echo $list["logItem"]?></td>
                                            <td><?php echo $list["logCount"]?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <!--/ Content Area -->



            </div>
        </div>
        <!--/ row -->

    </div>
    <!-- END PAGE -->
</div>

<!--  google chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#s1').datepicker({
            language: "kr",
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
        $('#s2').datepicker({
            language: "kr",
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Set chart options
        var options = {'height':300,pieHole: 0.4,};

        /*
        chart1
        */
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', '날짜');
        data.addColumn('number', '접속자수');
        data.addRows(<?php echo $logData1?>);
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, options);

        /*
        chart2
        */
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LogItem');
        data.addColumn('number', 'LogCount');
        data.addRows(<?php echo $logData2?>);
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);

        /*
        chart3
        */
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LogItem');
        data.addColumn('number', 'LogCount');
        data.addRows(<?php echo $logData3?>);
        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);

        /*
        chart4
        */
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LogItem');
        data.addColumn('number', 'LogCount');
        data.addRows(<?php echo $logData4?>);
        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, options);

        /*
        chart5
        */
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LogItem');
        data.addColumn('number', 'LogCount');
        data.addRows(<?php echo $logData5?>);
        var chart = new google.visualization.PieChart(document.getElementById('chart_div5'));
        chart.draw(data, options);

        /*
        chart6
        */
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LogItem');
        data.addColumn('number', 'LogCount');
        data.addRows(<?php echo $logData6?>);
        var chart = new google.visualization.PieChart(document.getElementById('chart_div6'));
        chart.draw(data, options);

        /*
        chart7
        */
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'LogItem');
        data.addColumn('number', 'LogCount');
        data.addRows(<?php echo $logData7?>);
        var chart = new google.visualization.PieChart(document.getElementById('chart_div7'));
        chart.draw(data, options);

    }
</script>