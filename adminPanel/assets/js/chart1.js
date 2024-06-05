const xArray = ["Laptops", "Monitors", "Accessories", "Desktops"];
const yArray = [55 , 49, 44, 24,];

const layout = { title:"Our Sales in 2024" };

const data = [{ labels: xArray, values: yArray, hole: .4, type: "pie" }];

Plotly.newPlot("myPlot", data, layout);