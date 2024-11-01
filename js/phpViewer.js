function showTooltip(event, content) {
  const tooltip = document.getElementById("tooltip");
  tooltip.innerHTML = content;
  tooltip.style.display = "block";

  // Calculate the position of the tooltip
  const tooltipWidth = tooltip.offsetWidth;
  const tooltipHeight = tooltip.offsetHeight;
  let left = event.pageX;
  let top = event.pageY;

  // Adjust position if the tooltip goes beyond the right edge of the viewport
  if (left + tooltipWidth > window.innerWidth) {
    left = left - tooltipWidth; // Move tooltip to the left
  }

  // Adjust position if the tooltip goes beyond the bottom edge of the viewport
  if (top + tooltipHeight > window.innerHeight) {
    top = top - tooltipHeight; // Move tooltip above the cursor
  } else if (top - tooltipHeight < 0) {
    top = top + tooltipHeight; // Move tooltip below the cursor if there's not enough space above
  }

  tooltip.style.left = `${left}px`;
  tooltip.style.top = `${top}px`;
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
