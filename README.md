# projet_annuel

je vous met les base pour coder sur git, creer de nouvelle branche se qui permet de coder sur le projet sans coder sur le main(le code principale duprojet) puis pour pish votre branche ainsi que pour recuperer les ficher en local sur votr pc.
et aussi vous devre instaler le terminal GitBash et potentiellement l'aplication GitHub Desktop pour push.


3️⃣ Cloner le dépôt en local
Chaque membre peut récupérer le projet avec :

git clone https://github.com/ton-user/projet-groupe.git
cd projet-groupe


4️⃣ Travailler sur le projet
🔹 Créer une branche pour chaque nouvelle fonctionnalité

git checkout -b nom-de-la-branche

git add .
git commit -m "Ajout d'une nouvelle fonctionnalité"

git push origin nom-de-la-branche


5️⃣ Créer et gérer les Pull Requests (PR)
Quand une branche est prête à être fusionnée :

Aller sur GitHub.
Cliquer sur "Pull Requests" > "New Pull Request".
Sélectionner la branche à fusionner avec main.
Cliquer sur "Create Pull Request".
Un membre peut approuver la PR avant de la fusionner.

6️⃣ Gérer les conflits
Si plusieurs membres travaillent sur le même fichier, il peut y avoir des conflits. Pour les résoudre :

git pull origin main
# Modifier les fichiers concernés
git add .
git commit -m "Résolution des conflits"
git push origin nom-de-la-branche



