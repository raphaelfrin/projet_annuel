const monthNames = [
  "Janvier",
  "Février",
  "Mars",
  "Avril",
  "Mai",
  "Juin",
  "Juillet",
  "Août",
  "Septembre",
  "Octobre",
  "Novembre",
  "Décembre",
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
  const isCurrentMonth =
    today.getMonth() === month && today.getFullYear() === year;

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

document.addEventListener("DOMContentLoaded", function () {
  const dialog = document.getElementById("mydialog");
  const openBtn = document.querySelector(".boutons_habitude button");

  let ignoreNextClick = false;

  openBtn.addEventListener("click", function () {
    dialog.showModal();
    ignoreNextClick = true;
  });

  document.addEventListener("click", function (event) {
    if (!dialog.open) return;

    // Ignore le premier clic (celui qui ouvre la modale)
    if (ignoreNextClick) {
      ignoreNextClick = false;
      return;
    }

    const rect = dialog.getBoundingClientRect();
    const isInDialog =
      event.clientX >= rect.left &&
      event.clientX <= rect.right &&
      event.clientY >= rect.top &&
      event.clientY <= rect.bottom;

    if (!isInDialog) {
      dialog.close();
    }
  });

  dialog.addEventListener("close", function () {
    console.log("Fermeture.");
  });
});

document.addEventListener("DOMContentLoaded", () => {
    const editButtons = document.querySelectorAll(".edit-button");

    editButtons.forEach(button => {
        button.addEventListener("click", () => {
            const id = button.dataset.id;
            const nom = button.dataset.nom;
            const tag = button.dataset.tag;
            const heure = button.dataset.heure;
            const occurence = button.dataset.occurence;

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nom').value = nom;
            document.getElementById('edit-tag').value = tag;
            document.getElementById('edit-heure').value = heure;
            document.getElementById('edit-occurence').value = occurence;

            document.getElementById('editDialog').showModal();
        });
    });
});
