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
        props: ['cohorts'],
        data() {
            return {
                seriesData: []
            }
        },
        mounted() {
            for (let [key, values] of Object.entries(this.cohorts)) {
                this.seriesData.push({
                    name: key,
                    type: 'spline',
                    data: Object.values(values),

                })
            }

            Highcharts.chart('retention-chart', {
                chart: {
                    zoomType: 'xy',
                    width: 1000,
                },
                title: {
                    text: 'Weekly Retention Curve'
                },
                xAxis: {
                    title: {text: "Steps in the onboarding flow"},
                    percentage: [0,20,40,50,70,90,99,100],
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
                series: this.seriesData
            });
        }
    }
</script>
