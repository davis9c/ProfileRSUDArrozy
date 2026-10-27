document.addEventListener("DOMContentLoaded", () => {
    const card = document.querySelector("[data-video-harian]");
    if (!card) return;

    const videos = card.querySelectorAll(".kpi-video");

    const hari = new Date().getDay();

    const videoMap = {
        0: "/vid/minggu.mp4",
        1: "/vid/senin.mp4",
        2: "/vid/selasa.mp4",
        3: "/vid/rabu.mp4",
        4: "/vid/kamis.mp4",
        5: "/vid/jumat.mp4",
        6: "/vid/sabtu.mp4",
    };

    videos.forEach(video => {
        video.src = videoMap[hari];
        video.load();
        video.play().catch(() => {});
    });
});