function showTooltip(event, content) {
  const tooltip = document.getElementById("tooltip");
  tooltip.innerHTML = content;
  tooltip.style.display = "block";
  tooltip.style.left = event.pageX + "px";
  tooltip.style.top = event.pageY + "px";
}

function hideTooltip() {
  const tooltip = document.getElementById("tooltip");
  tooltip.style.display = "none";
}

function fetchContent(folder, file, event) {
  fetch(`fetch_activity.php?folder=${folder}&file=${file}`)
    .then((response) => response.text())
    .then((data) => {
      showTooltip(event, data);
    })
    .catch((error) => console.error("Error fetching content:", error));
}
