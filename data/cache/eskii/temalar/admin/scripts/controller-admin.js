(function($) {
    "use strict";

})(jQuery);

if ($('#karakter-diagrami').length) {
    var ctx = document.getElementById("karakter-diagrami").getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Şaman", "Sura", "Ninja", "Savaşçı", "Wolfman"],
            datasets: [{
                backgroundColor: [
                    "#8919FE",
                    "#12C498",
                    "#F8CB3F",
                    "#E36D68",
                    "#81c4e2",
                ],
                borderColor: '#fff',
                data: karakterData,
            }]
        },
        options: {
            legend: {
                display: true
            },
            animation: {
                easing: "easeInOutBack"
            }
        }
    });
}

if ($('#bayrak-diagrami').length) {
    var ctx = document.getElementById("bayrak-diagrami").getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Mavi", "Sarı", "Kırmızı"],
            datasets: [{
                backgroundColor: [
                    "#4f53fb",
                    "#f1c73e",
                    "#e5716e",
                ],
                borderColor: '#fff',
                data: bayrakData,
            }]
        },
        options: {
            legend: {
                display: true
            },
            animation: {
                easing: "easeInOutBack"
            }
        }
    });
}