const monthNames = [
  "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
  "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];

let currentDate = new Date();

function updateMonthYearDisplay(month, year) {
  const monthYear = document.getElementById("monthYear");
  monthYear.innerText = `${monthNames[month]} ${year}`;
}

function createCalendar(month, year) {
  const calendar = document.querySelector("#calendar");
  calendar.innerHTML = "";

  const today = new Date();
  const isCurrentMonth = today.getMonth() === month && today.getFullYear() === year;

  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const firstDay = new Date(year, month, 1).getDay();
  let date = 1;

  for (let i = 0; i < 6; i++) {
    const row = document.createElement("tr");

    for (let j = 0; j < 7; j++) {
      const cell = document.createElement("td");

      if (i === 0 && j < firstDay) {
        cell.classList.add("inactive");
      } else if (date > daysInMonth) {
        cell.classList.add("inactive");
      } else {
        cell.innerText = date;
        cell.classList.add("active-day");

        if (isCurrentMonth && date === today.getDate()) {
          cell.classList.add("today");
        }

        date++;
      }

      row.appendChild(cell);
    }

    calendar.appendChild(row);
  }

  updateMonthYearDisplay(month, year);
}


document.addEventListener("DOMContentLoaded", function () {
  createCalendar(currentDate.getMonth(), currentDate.getFullYear());

  document.getElementById("prevMonth").addEventListener("click", function () {
    currentDate.setMonth(currentDate.getMonth() - 1);
    createCalendar(currentDate.getMonth(), currentDate.getFullYear());
  });

  document.getElementById("nextMonth").addEventListener("click", function () {
    currentDate.setMonth(currentDate.getMonth() + 1);
    createCalendar(currentDate.getMonth(), currentDate.getFullYear());
  });
});


