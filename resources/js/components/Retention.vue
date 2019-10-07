<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Retention Curve</div>

                    <!-- Our focus right now -->
                    <div id="retention-chart"  style="height: 400px" class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Highcharts from 'highcharts';

    export default {
        data() {
            return {
            }
        },
        mounted() {
            Highcharts.chart('retention-chart', {
                chart: {
                    zoomType: 'xy',
                    width: 1000,
                },
                title: {
                    text: 'Weekly Retention Curve'
                },
                xAxis: {
                    percentage: ['0','20','40','50','70','90','99','100'],
                    tickInterval: 10,
                    min: 0,
                    max: 100

                },
                yAxis: {
                    title: {text: "Total Onboarded in percentage"},
                    labels: {
                        format: '{value}%'
                    },
                    min: '0',
                    max: '100',
                },
                legend: {
                    layout: 'horizontal',
                    floating: true,
                    backgroundColor: '#FFFFFF',
                    align: 'right',
                    verticalAlign: 'top',
                    y: 60,
                    x: -60
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.x + ': ' + this.y;
                    }
                },
                series: [{type: 'spline',
                    data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                }]
            });
        }
    }
</script>
