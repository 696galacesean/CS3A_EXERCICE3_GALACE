if (!plot_data.length > 0) {
    console.error("No data available");
} else {

    const label = plot_data.map(item => item.program);
    const data = plot_data.map(item => item.irreg_students);

    const ctxBar = document.getElementById('BarChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Number of Irregular Students',
                data: data,
                backgroundColor: '#75BFEC',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } }
        }
    });

    const ctxLine = document.getElementById('LineChart').getContext('2d');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Number of Irregular Students',
                data: data,
                fill: true,
                borderColor: '#6F9CDE',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } }
        }
    });

    const ctxPie = document.getElementById('PieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: label,
            datasets: [{
                label: 'Number of Irregular Students',
                data: data,
                backgroundColor: ['#69FCDE', '#6879D0', '#75BFEC', '#DFF2FF', '#A3D5FF'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } }
        }
    });
}