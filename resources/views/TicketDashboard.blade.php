<x-navbar>
    <div style="width: 80%; margin: auto;">
        {{--  Summary Cards --}}
        <div style="display: flex; justify-content: space-between; gap: 20px; margin-bottom: 40px;">
            <div style="flex: 1; background: #f0f0f0; padding: 20px; text-align: center; border-radius: 10px;">
                <h3>Total Tickets</h3>
                <p style="font-size: 24px; font-weight: bold;">{{ $totalTickets }}</p>
            </div>
            <div style="flex: 1; background: #d4edda; padding: 20px; text-align: center; border-radius: 10px;">
                <h3>Resolved</h3>
                <p style="font-size: 24px; font-weight: bold;">{{ $resolved }}</p>
            </div>
            <div style="flex: 1; background: #fff3cd; padding: 20px; text-align: center; border-radius: 10px;">
                <h3>In Process</h3>
                <p style="font-size: 24px; font-weight: bold;">{{ $inProcess }}</p>
            </div>
            <div style="flex: 1; background: #f8d7da; padding: 20px; text-align: center; border-radius: 10px;">
                <h3>Pending</h3>
                <p style="font-size: 24px; font-weight: bold;">{{ $pending }}</p>
            </div>
        </div><br>

        {{--  Charts Bar + Doughnut --}}
        <div style="display: flex; justify-content: space-between; gap: 30px;">
            {{-- Bar Chart --}}
            <div style="width: 48%;">
                <h2 style="text-align: center;">Tickets per Department</h2>
                <div style="position: relative; height: 300px;">
                    <canvas id="deptChart"></canvas>
                </div>
            </div>

            {{-- Doughnut Chart --}}
            <div style="width: 48%;">
                <h2 style="text-align: center;">Tickets per Handler</h2>
                <div style="position: relative; height: 300px;">
                    <canvas id="handlerChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- 📊 Chart Scripts --}}
    <script>
        // Bar Chart Tickets per Department
        const deptCtx = document.getElementById('deptChart').getContext('2d');
        new Chart(deptCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($departments) !!}, //x-axis
                datasets: [{
                    label: 'Ticket raise',
                    data: {!! json_encode($counts) !!}, //y-axis
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    barThickness: 20,
                    maxBarThickness: 25
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            display: false // ❌ Hide x-axis labels
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Doughnut Chart Tickets per Handler
        const handlerCtx = document.getElementById('handlerChart').getContext('2d');
        new Chart(handlerCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($handlers) !!},
                datasets: [{
                    data: {!! json_encode($handlerCounts) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(25, 206, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(0, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</x-navbar>
