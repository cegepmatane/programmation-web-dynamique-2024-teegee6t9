const lineChart1 = document.querySelector("#lineChart1");
const graph1 = new Chart(lineChart1, {
  // The type of chart we want to create
  type: "line",
  data: {
    labels: labelLine,
    datasets: [
      {
        data: dataLine,
        backgroundColor: ["#ee6314"],
        borderColor: ["#393939"],
        label: "Visites par jour",
        fill: true,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 1,
    plugins: {
      title: {
        text: "Visites selon les jours",
        font: { size: 22 },
        color: "white",
        display: true,
        position: "top",
        padding: { bottom: 30 },
      },
      customCanvasBackgroundColor: {
        color: "#808080",
      },
      legend: {
        position: "bottom",
      },
    },
  },
});

// graphique 2
const lineChart2 = document.querySelector("#lineChart2");
const graph2 = new Chart(lineChart2, {
  // The type of chart we want to create
  type: "line",
  data: {
    labels: labelBar,
    datasets: [
      {
        data: dataBar,
        backgroundColor: ["#ee6314"],
        borderColor: ["#393939"],
        label: "Visites par Langue",
        fill: true,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 1,
    plugins: {
      title: {
        text: "Visites selon la langue",
        font: { size: 22 },
        color: "white",
        display: true,
        position: "top",
      },
      legend: {
        position: "bottom",
      },
    },
  },
});
