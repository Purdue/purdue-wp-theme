if(typeof(wpDataCharts)!=='undefined'){
    Object.keys(wpDataCharts).map(i => {
        // set better sizing for all google charts
        if(wpDataCharts[i].render_data.options.chartArea){
            wpDataCharts[i].render_data.options.chartArea.width = "70%"
            wpDataCharts[i].render_data.options.chartArea.height = "85%"
            wpDataCharts[i].render_data.options.chartArea.top = "0"
        }
        // set available colors for pie chart
        if (wpDataCharts[i].render_data.type === 'google_pie_chart') {
            wpDataCharts[i].render_data.options.chartArea.width = "100%"
            wpDataCharts[i].render_data.options.chartArea.height = "100%"
            wpDataCharts[i].render_data.options.colors = ['#DAAA00', '#6F727B', '#C4BFC0', '#EBD99F', '#FFFFFF', '#AA864B', '#827839']
            wpDataCharts[i].render_data.options.pieSliceTextStyle = {color: 'black'}
            // wpDataCharts[i].render_data.options.slices = {4: {textStyle: {color: 'black'}}}
            wpDataCharts[i].render_data.options.pieSliceBorderColor = ''
        }
    })
    jQuery(window).load(function(){
        if( typeof wpDataChartsCallbacks == 'undefined' ){ wpDataChartsCallbacks = {}; }
        wpDataChartsCallbacks[82] = function(obj){
            obj.options.data.datasets[0].backgroundColor = [
                                                            '#6F727B',
                                                            '#C4BFC0',
                                                            '#C4BFC0',
                                                            '#FFFFFF',
                                                            '#AA864B',
                                                            '#827839',
                                                            '#DAAA00'
            ]
        }
    });
}



