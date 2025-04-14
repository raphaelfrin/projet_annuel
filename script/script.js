document.getElementById("current_date").value = new Date();
function ChangerDate() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('Dateactuelle').textContent = now.toLocaleDateString('fr-FR', options);
            document.getElementById('Heureactuelle').textContent = now.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
        }

        function AjouterElement() {
            const ajout = document.getElementById('elementajoute');
            const nouvel_element = ajout.value;
            if (nouvel_element) {
                const li = document.createElement('li');
                li.innerHTML = `<input type="checkbox" onclick="MarquerOk(newTodo)`;
                document.getElementById('todoList').appendChild(li);
                input.value = '';
            }
        }

        function MarquerOk(checkbox) {
            if (checkbox.checked) {
                checkbox.parentElement.style.textDecoration = "line-through";
            } else {
                checkbox.parentElement.style.textDecoration = "none";
            }
        }

        function AjouterHabitude() {
            const ajout_habitude = document.getElementById('habitude_ajoute');
            const nouvelle_habitude = ajout_habitude.value;
            if (nouvelle_habitude) {
                const li = document.createElement('li');
                li.textContent =  nouvelle_habitude;
                document.getElementById('ListeHabitudes').appendChild(li);
                input.value = '';
            }
        }

        function connect() {
            alert("Connexion en cours...");
        }

        ChangerDate();
// Pour changer chaque minutes
        setInterval(ChangerDate, 60000);
