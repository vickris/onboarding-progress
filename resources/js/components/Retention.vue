<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
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
        methods: {
            drawChart(seriesData) {
                Highcharts.chart('retention-chart', {
                chart: {
                    type: 'line',
                    width: 800,
                },
                title: {
                    text: 'Weekly Retention Curve'
                },
                xAxis: {
                    title: {text: "% reached in the onboarding flow"},
                    categories: ['0','20','40','50','70','90','99','100'],
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
                series: seriesData
            });
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
            this.drawChart(this.seriesData)
        }

    }
</script>
