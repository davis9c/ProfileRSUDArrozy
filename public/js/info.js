let poliChart = null;
(() => {

    const API_BASE = "https://app-rsudarrozy.probolinggokota.go.id/api";

    const el = (id) => document.getElementById(id);

    function setText(id, value) {
        const element = el(id);

        if (element) {
            element.textContent = value ?? "-";
        }
    }

    function updatePoliHariIni(data) {
        const tbody = el("tablePoliHariIni");

        if (!tbody || !Array.isArray(data)) return;

        tbody.innerHTML = "";

        data
            .filter(item => Number(item.total) > 0)
            .sort((a, b) => b.total - a.total)
            .forEach((item) => {

                const tr = document.createElement("tr");

                tr.className = "border-b border-slate-100 hover:bg-slate-50 transition";

                tbody.innerHTML += `
                <div class="flex justify-between items-center px-4 py-2 border-b border-slate-100 hover:bg-slate-50 transition">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>

                        <span class="font-medium text-slate-700 text-sm">
                            ${item.nm_poli}
                        </span>
                    </div>

                    <span class="inline-flex items-center justify-center min-w-[36px] h-7 px-2 rounded-full bg-blue-500 text-black text-xs font-bold">
                        ${item.total}
                    </span>
                </div>
                `;

                tbody.appendChild(tr);

            });

        if (tbody.children.length === 0) {

            tbody.innerHTML = `
            <tr>
                <td colspan="2" class="py-10 text-center text-slate-400">
                    Tidak ada kunjungan poli hari ini
                </td>
            </tr>
        `;

        }

    }

    function updateChartPoliHariIni(data) {

        const canvas = el("chartPoliHariIni");

        if (!canvas) return;

        const filtered = data
            .filter(item => Number(item.total) > 0)
            .sort((a, b) => b.total - a.total);

        if (poliChart) {
            poliChart.destroy();
        }

        poliChart = new Chart(canvas, {

            type: "bar",

            data: {

                labels: filtered.map(i => i.nm_poli),

                datasets: [{

                    label: "Jumlah Pasien",

                    data: filtered.map(i => i.total),

                    borderRadius: 10,

                    borderSkipped: false,

                    backgroundColor: [
                        "#3B82F6",
                        "#6366F1",
                        "#06B6D4",
                        "#14B8A6",
                        "#10B981",
                        "#84CC16",
                        "#F59E0B",
                        "#EF4444",
                        "#EC4899",
                        "#8B5CF6"
                    ]

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                indexAxis: "y",

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {
                        backgroundColor: "#1E293B",
                        padding: 12
                    }

                },

                scales: {

                    x: {

                        beginAtZero: true,

                        grid: {
                            color: "#E2E8F0"
                        },

                        ticks: {
                            precision: 0
                        }

                    },

                    y: {

                        grid: {
                            display: false
                        },

                        ticks: {

                            autoSkip: false,

                            font: {
                                size: 9
                            },

                            color: "#475569"

                        }

                    }

                }

            }

        });

    }

    function updateTableTempatTidur(data) {

        const tbody = el("tableTempatTidur");
        if (!tbody || !data) return;

        tbody.innerHTML = "";

        for (let i = 0; i < data.labels.length; i++) {

            // Skip bangsal yang tidak memiliki bed
            const totalBed = (data.data_terisi[i] || 0) + (data.data_kosong[i] || 0);

            if (totalBed === 0) continue;

            const namaBangsal = data.labels[i];
            const terisi = data.data_terisi[i];
            const kosong = data.data_kosong[i];
            const bor = Number(data.bor[i]).toFixed(2);

            let borClass = "bg-green-500";

            if (bor >= 80) {
                borClass = "bg-red-500";
            } else if (bor >= 50) {
                borClass = "bg-yellow-500";
            }

            const tr = document.createElement("tr");

            tr.innerHTML = `
            <td class="px-4 py-2 text-black">${namaBangsal}</td>
            <td class="px-4 py-2 text-center text-black">${totalBed}</td>
            <td class="px-4 py-2 text-center text-black">${terisi}</td>
            <td class="px-4 py-2 text-center text-black">${kosong}</td>
            <td class="px-4 py-2">
            <div class="relative w-full bg-gray-200 rounded-full h-5 overflow-hidden">
                <!-- Progress -->
                <div
                    class="${borClass} h-5"
                    style="width:${bor}%">
                </div>

                <!-- Text -->
                <div class="absolute inset-0 flex items-center justify-center text-black font-bold text-xs">
                    ${bor}%
                </div>
            </div>
        </td>
        `;

            tbody.appendChild(tr);
        }

    }

    async function loadKPI() {

        try {

            const response = await fetch(`${API_BASE}/dashboard-data`);

            if (!response.ok) {
                throw new Error("Gagal mengambil data");
            }

            const json = await response.json();

            const summary = json.summary ?? {};

            setText("ranap", summary.rawat_inap);
            setText("igd", summary.igd);
            setText("poli", summary.poli);
            setText("operasi", summary.operasi);
            setText("lahir", summary.lahir);
            setText("pasien", summary.pasien);

            const poliHariIni = json.chart_poli_hari_ini ?? [];
            const tempatTidur = json.tempat_tidur_per_bangsal ?? {};

            updatePoliHariIni(poliHariIni);
            updateTableTempatTidur(tempatTidur);
            updateChartPoliHariIni(poliHariIni);

        } catch (err) {

            console.error("Load KPI Error:", err);

        }

    }

    document.addEventListener("DOMContentLoaded", () => {

        loadKPI();

        setInterval(loadKPI, 15000);

    });

})();