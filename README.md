## TP n°9

Ceci est le résultat obtenu à l'issue du TP n°9

## Installation

Clonez le dépôt en spécifiant un répertoire de destination (ici 'tp9') :

```bash
git clone https://github.com/Kole63/tp9 tp9
```

Installez les packages en vous plaçant dans le répertoire créé :

```bash
cd tp9
composer install
```

Si vous souhaitez mettre à jour les packages et la version de Laravel (depuis la création de ce dépôt) :

```bash
composer update
```

Créez le fichier `.env` pour configurer l'application à partir du fichier d'exemple :

```bash
copy .env.example .env
ou
cp .env.example .env
```

Modifiez le fichier `.env` en fonction de votre configuration (nom de la base de données, login et mot de passe).

Générez la clé :

```bash
php artisan key:generate
```

Lancez les migrations et le peuplement :

```bash
php artisan migrate --seed
```
Pour que les images s'affichent
```bash
php artisan storage:link
```
Installer les modules Node.js et compiler les fichiers CSS et JS :

```bash
npm install
npm run build
```

Si nécessaire, vous pouvez mettre à jour les packages à l'aide de la commande suivante :

```bash
npm update
```
