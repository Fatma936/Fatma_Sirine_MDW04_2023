<html>
<head>
    <title>Water Level Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="water-level-chart"></canvas>

    <script>
        var data = {
            datasets: [{
                label: 'Water Level',
                data: {!! json_encode($waterLevels) !!}
            }]
        };

        var options = {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                }]
            }
        };

        var ctx = document.getElementById('water-level-chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    </script>
</body>
</html>
