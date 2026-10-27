(() => {
    const API_BASE = "https://app-rsudarrozy.probolinggokota.go.id/api";

    let chartKunjungan = null;

    document.addEventListener("DOMContentLoaded", () => {

        const el = document.querySelector("#chartKunjungan");

        if (!el) return;

        loadChartPasien(el);

        setInterval(() => {
            loadChartPasien(el);
        }, interval);

    });

    const interval = 15000;


    document.addEventListener("DOMContentLoaded", () => {

        loadChartPasien(el);

        setInterval(() => {
            loadChartPasien(el);
        }, interval);

    });

    function formatTanggalDenganHari(tanggalArr) {
        const hari = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
        const tahun = new Date().getFullYear();

        return tanggalArr.map((tgl) => {
            const dateObj = new Date(`${tgl} ${tahun}`);
            return `${hari[dateObj.getDay()]}, ${tgl}`;
        });
    }

    function loadChartPasien(el) {

        if (!el) return;

        fetch(`${API_BASE}/dashboard-data`)
            .then((res) => res.json())
            .then((res) => {
                const data = res.chart_kunjungan;

                if (!data?.tanggal?.length) return;

                const categoriesHari = formatTanggalDenganHari(data.tanggal);

                const options = {
                    series: [
                        {
                            name: "Pasien BPJS",
                            type: "column",
                            data: data.bpjs,
                        },
                        {
                            name: "Pasien Umum",
                            type: "column",
                            data: data.umum,
                        },
                        {
                            name: "Total Pasien",
                            type: "line",
                            data: data.total,
                        },
                    ],

                    chart: {
                        type: "line",
                        height: 420,
                        stacked: false,

                        toolbar: {
                            show: false,
                        },

                        zoom: {
                            enabled: false,
                        },

                        animations: {
                            enabled: true,
                            easing: "easeinout",
                            speed: 900,
                        },

                        dropShadow: {
                            enabled: true,
                            top: 2,
                            left: 2,
                            blur: 5,
                            opacity: 0.12,
                        },
                    },

                    title: {
                        text: "📊 Statistik Pengunjung",
                        align: "center",
                        margin: 15,

                        style: {
                            fontSize: "22px",
                            fontWeight: 700,
                            color: "#1e293b",
                        },
                    },

                    subtitle: {
                        text: "7 Hari Terakhir",
                        align: "center",

                        style: {
                            fontSize: "13px",
                            color: "#64748b",
                        },
                    },

                    colors: [
                        "#2196F3",
                        "#10B981",
                        "#F59E0B",
                    ],

                    stroke: {
                        width: [0, 0, 4],
                        curve: "smooth",
                    },

                    fill: {
                        type: ["solid", "solid", "gradient"],

                        gradient: {
                            shade: "light",
                            type: "vertical",
                            shadeIntensity: 0.4,
                            gradientToColors: ["#fbbf24"],
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100],
                        },
                    },

                    markers: {
                        size: [0, 0, 6],

                        strokeWidth: 2,

                        strokeColors: "#ffffff",

                        hover: {
                            size: 8,
                        },
                    },

                    plotOptions: {
                        bar: {
                            borderRadius: 8,
                            columnWidth: "42%",
                        },
                    },

                    dataLabels: {
                        enabled: false,
                    },

                    xaxis: {
                        categories: categoriesHari,

                        labels: {
                            rotate: -20,

                            style: {
                                colors: "#475569",
                                fontSize: "12px",
                            },
                        },

                        title: {
                            text: "Hari, Tanggal",

                            style: {
                                fontWeight: 600,
                                color: "#475569",
                            },
                        },
                    },

                    yaxis: {
                        title: {
                            text: "Jumlah Pasien",

                            style: {
                                fontWeight: 600,
                                color: "#475569",
                            },
                        },

                        labels: {
                            style: {
                                colors: "#475569",
                                fontSize: "12px",
                            },
                        },
                    },

                    legend: {
                        position: "top",

                        horizontalAlign: "center",

                        fontSize: "14px",

                        offsetY: 5,

                        markers: {
                            radius: 12,
                        },

                        itemMargin: {
                            horizontal: 15,
                        },
                    },

                    grid: {
                        borderColor: "#e2e8f0",

                        strokeDashArray: 5,

                        padding: {
                            left: 15,
                            right: 15,
                        },
                    },

                    tooltip: {
                        shared: true,

                        intersect: false,

                        theme: "light",

                        y: {
                            formatter: function (val) {
                                return val + " pasien";
                            },
                        },
                    },

                    annotations: {
                        xaxis: [
                            {
                                x: categoriesHari[categoriesHari.length - 1],

                                borderColor: "#ef4444",

                                label: {
                                    text: "Hari Ini",

                                    style: {
                                        background: "#ef4444",
                                        color: "#fff",
                                        fontSize: "11px",
                                    },
                                },
                            },
                        ],
                    },

                    responsive: [
                        {
                            breakpoint: 768,

                            options: {
                                chart: {
                                    height: 350,
                                },

                                xaxis: {
                                    labels: {
                                        rotate: -45,
                                    },
                                },

                                legend: {
                                    position: "bottom",
                                },
                            },
                        },
                    ],
                };

                if (chartKunjungan) {
                    chartKunjungan.updateOptions(options, false, true);
                } else {
                    chartKunjungan = new ApexCharts(el, options);
                    chartKunjungan.render();
                }
            })
            .catch((err) => {
                console.error("Chart Kunjungan:", err);
            });
    }
})();