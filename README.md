# Création d'un widget(extension) météo wordPress!

## I-Étape 1 :
Pour développer le plugin wordpress météo ,la plus simple méthode que j'ai trouvé c'est d'aller sur **la documentation officielle de wordpress** qui est en anglais et très complète.
Elle donne un exemple de création d'un plugin texte et son explication étape par étape.

**exemple d'un widget texte** : 
![enter image description here](https://image.noelshack.com/fichiers/2020/06/4/1580977011-exemple-widget.png)

 Dans le dossier wordpress/wp-content/plugins/temperature  je crée un fichier temperature.php  et je colle le code de l'exemple pour suivre la structure donné de wordpress.
 Ce qui j'ai compris dans l'exemple :
 1-
 -Pour créé un widget on doit commencer par configurer une classe widget qui étend de la classe WP widget .
 et dans le constructeur de la classe on appelle le constructeur parent et on lui passe l’ID et le nom de base du widget et la description
 2-

-Ensuite on déclare la fonction widget (une fonction très importante) qui va nous permettre d’afficher quelque chose dans la barre latérale (afficher le contenu dans la barre latérale ), et on déclare les arguments qu’on utilise lors de la création de notre widget. Il y a quatre arguments qu’on doit définir, `before_title`, `after_title`, `before_widget`et `after_widget`. Ces arguments définiront le code qui enveloppe le titre du widgets et le widget lui-même.=>en résumé : la fonction widget reçoit deux paramètres (un premier tableau $args avec les arguments nécessaires a affichage du widget et $instance paramètres spécifiques
A ce widget la  qui va être afficher).
3-
- La fonction form qui va récupérer le titre et afficher le label et le champs de texte avec a l’intérieur le titre  récupérer.
4-
Dernière fonction update qui va permettre de modifier les valeur juste avant de les sauvegarder elle reçoit les nouvelles information $new_instance en prévenance du formulaire (l’utilisateur va taper dans le champs texte son titre et  va être envoyé a wordpress pour qu’il le stocke en base mais avant de le stocker en base on va pouvoir effectuer des versifications dans notre fonction update donc on reçoit avec le paramètre $new_instance les nouveaux  paramètres du  widget  et dans $old_instance les anciens.
## Étape 2 : 

Apres cette étape j’avait trouvé un problème => mon extension n’a pas été détecté dans l extension de wordpress  alors j’ai du faire une recherche dans  **la documentation wordpress**, j’ai trouvé le header a mettre au tout début pour que wordpress comprenne  que le fichier php ajouté est une extension (image 1) et la fonction a ajouté qui permet  l'enregistrement de ce widget(image 2) .

**image 1 :**

![enter image description here](https://image.noelshack.com/fichiers/2020/06/4/1580978935-header-plugin.png)

**image 2 :** 
![enter image description here](https://image.noelshack.com/fichiers/2020/06/4/1580979528-enregistrement-widget.png)
 

**Résultat** : le  widget est détecté et affiché voir les image ci-dessous (**image 1 :** l'affichage du widget , **images 2 :** la fonction  nécessaire a l'affichage du formulaire du widget) .

**image 1 : **

![enter image description here](https://image.noelshack.com/fichiers/2020/06/4/1580979690-ccvv.png)
**image 2 :**
![enter image description here](https://image.noelshack.com/fichiers/2020/06/4/1580979960-form.png)
 
 ## Étape 3 :
 
Jusqu’ici je considéré que l'étape 2 est fini et je passe a la récupération de la température  Avec l’Api OpenWeather , site correspondant ([https://openweathermap.org/api](https://openweathermap.org/api))) et je remplace tout ce qui concerne le titre  par le nom de la ville et a la place de l’affichage du texte je vais récupérer et afficher  la température qui correspond a la ville pour la quelle j'ai  renseigné le nom de  la ville:
**Résultat :**
![enter image description here](https://image.noelshack.com/fichiers/2020/07/3/1581498326-coderemplacement.png)

![enter image description here](https://image.noelshack.com/fichiers/2020/07/3/1581496882-resultwidget.png)

Pour récupérer la température ,on a une URL sur la quelle php va devoir aller  pour récupérer les informations dans mon cas j'ai un fichier en  json dont on trouve toutes les informations concernant la ville voir l'image ci dessous :

![enter image description here](https://image.noelshack.com/fichiers/2020/07/3/1581497959-fichierjson.png)

On va faire une récupération d'un contenu  distants et récupérer avec le file_get_contents ( la on a sauvegardé toutes les informations nécessaires dans la base de données de wordpress en tant que paramètres et on va pouvoir y accéder lorsqu'on rafraîchit  la page .
Pour récupérer la températures et d'autres paramètres de la ville et pour cela il doit falloir utiliser les fonctions php qui se rapport a la récupération de donnée json  pour faire ça y a une fonction en php ( json_decode) qui va nous permettre de directement manipuler du json et du récupérer les informations  dans un code json très simplement.
 
![enter image description here](https://image.noelshack.com/fichiers/2020/07/3/1581498970-recupdonne.png)
