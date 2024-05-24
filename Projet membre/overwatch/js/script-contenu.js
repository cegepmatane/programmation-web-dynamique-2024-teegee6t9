// Graphique Tarte

const pieChart = document.querySelector("#pieChart");
const myChart = new Chart(pieChart, {
  type: "doughnut",
  data: {
    labels: labelPie,
    datasets: [
      {
        data: dataPieNombre,
        backgroundColor: ["orange", "yellow", "red", "blue", "green", "grey"],
        hoverOffset: 20,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 1,
    plugins: {
      title: {
        text: "Héros par classe",
        display: true,
        position: "top",
        color: "white",
      },
      legend: {
        position: "top",
      },
    },
  },
});

// Graphique anneau

const anneauChart = document.querySelector("#anneauChart");
const myChart2 = new Chart(anneauChart, {
  type: "doughnut",
  data: {
    labels: labelPie,
    datasets: [
      {
        data: dataPiePvMoy,
        backgroundColor: ["orange", "yellow", "red", "blue", "green", "grey"],
        hoverOffset: 20,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 1,
    plugins: {
      title: {
        text: "PV moyen par classe",
        display: true,
        position: "top",
      },
      legend: {
        position: "top",
      },
    },
  },
});
