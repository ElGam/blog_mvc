-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2020 at 10:31 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
CREATE TABLE IF NOT EXISTS `accueil` (
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `nom_prenom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accueil`
--

INSERT INTO `accueil` (`title`, `description`, `nom_prenom`) VALUES
('Créateur d\'innovations digitales', '', 'DELOS Médérick');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `post_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `contenu` varchar(1200) NOT NULL,
  `date` datetime NOT NULL,
  `statut` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `post_id`, `user_id`, `auteur`, `contenu`, `date`, `statut`) VALUES
(12, 3, 2, 'DELOS Médérick', 'Test numero 2', '2020-05-19 11:09:22', 'En Attente'),
(11, 2, 2, 'DELOS Médérick', 'Test2', '2020-05-16 19:59:13', 'Valide'),
(17, 7, 2, 'DELOS Médérick', 'TESTESTESTS', '2020-07-18 14:53:40', 'En Attente'),
(13, 2, 2, 'DELOS Médérick', 'Test Marie', '2020-05-19 11:10:19', 'En Attente'),
(16, 4, 2, 'DELOS Médérick', 'Test', '2020-06-13 14:02:56', 'Valide'),
(15, 2, 2, 'DELOS Médérick', 'Rien ne détrônera PHP ^^', '2020-05-21 18:32:26', 'En Attente'),
(23, 7, 2, 'DELOS Médérick', 'Test openclassrooms test 111111', '2020-07-21 19:08:01', 'Valide'),
(19, 7, 2, 'DELOS Médérick', 'ESSAI NUMERO 6 !!!', '2020-07-18 14:58:52', 'En Attente');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `chapo` text,
  `content` longtext,
  `date` datetime DEFAULT NULL,
  `author_id` int(50) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapo`, `content`, `date`, `author_id`, `author`) VALUES
(1, 'Pourquoi choisir Laravel ?', 'Le 3 septembre dernier Laravel est sorti en version 6.0. Laravel est un framework PHP bas&eacute; sur Symfony.\r\n\r\nSelon Wikip&eacute;dia &laquo; Laravel est un framework web open-source &eacute;crit en PHP1 respectant le principe mod&egrave;le-vue-contr&ocirc;leur et enti&egrave;rement d&eacute;velopp&eacute; en programmation orient&eacute;e objet. Laravel est distribu&eacute; sous licence MIT, avec ses sources h&eacute;berg&eacute;es sur GitHub. &raquo;', 'Laravel est aujourd&rsquo;hui une solution largement reconnue dans le monde informatique et tr&egrave;s populaire pour le d&eacute;veloppement de logiciels personnalis&eacute;s. Selon Taylor Otwell, le cr&eacute;ateur de Laravel : &laquo; Laravel est le plus puissant rival de l&rsquo;&eacute;cosyst&egrave;me PHP, simplement parce qu&rsquo;il inclut les fonctionnalit&eacute;s n&eacute;cessaires &agrave; la cr&eacute;ation d&rsquo;applications Web modernes &raquo;.\r\n\r\nEasy Partner vous livre aujourd&rsquo;hui ses avantages et vous explique pourquoi vous devriez le choisir plut&ocirc;t qu&rsquo;un autre.\r\n\r\nS&eacute;curit&eacute; et performance\r\nL&rsquo;un des avantages les plus importants du choix de Laravel pour le d&eacute;veloppement de vos applications Web r&eacute;side dans ses capacit&eacute;s &agrave; fournir une s&eacute;curit&eacute; de haut niveau. Si vous choisissez Laravel, votre application Web ne pr&eacute;sente aucun risque d&rsquo;injections SQL involontaires et cach&eacute;es.\r\n\r\nDe plus, Laravel est capable de fournir une excellente performance des applications Web. Il arrive que certaines caract&eacute;ristiques et fonctionnalit&eacute;s affectent les performances du site. Mais Laravel propose divers outils qui aident les d&eacute;veloppeurs &agrave; am&eacute;liorer leurs performances.\r\n\r\nBiblioth&egrave;ques orient&eacute;es objet\r\nLaravel est l&rsquo;un des meilleurs frameworks PHP car il poss&egrave;de des biblioth&egrave;ques orient&eacute;es objet et d&rsquo;autres pr&eacute; install&eacute;es, qui ne se trouvent dans aucun autre framework PHP. L&rsquo;une des biblioth&egrave;ques pr&eacute; install&eacute;es est la biblioth&egrave;que d&rsquo;authentification. Ces biblioth&egrave;ques regorgent d&rsquo;excellentes fonctionnalit&eacute;s faciles &agrave; utiliser et &agrave; impl&eacute;menter pour chaque d&eacute;veloppeur.\r\n\r\nDocumentation et communaut&eacute;\r\nLaravel poss&egrave;de une puissante communaut&eacute; de d&eacute;veloppeurs qui fournit en permanence une assistance pour la rendre plus flexible et &eacute;volutive. Ainsi, si vous souhaitez apporter des fonctionnalit&eacute;s complexes, de nombreuses documentations sont &agrave; votre disposition.\r\n\r\nTests unitaires\r\nAvec les tests unitaires de Laravel, chaque module de votre application Web est test&eacute; avant la mise en ligne du site. Ces tests garantissent une application performante, sans bug et finalement sans tracas pour vos utilisateurs finaux. C&rsquo;est une autre exception du framework Laravel.\r\n\r\nArtisan\r\nLaravel fournit un outil de ligne de commande int&eacute;gr&eacute; appel&eacute; Artisan. Cet outil aide &agrave; cr&eacute;er une architecture de code &laquo; squelette &raquo; et de base de donn&eacute;es, ainsi que leurs migrations. La gestion de la base de donn&eacute;es en devient plus facile. L&rsquo;outil Artisan permet d&rsquo;effectuer presque toutes les t&acirc;ches de programmation r&eacute;p&eacute;titives et fastidieuses.\r\n\r\nPrise en charge de l&rsquo;architecture MVC\r\nSi vous recherchez sur google vous trouverez que Laravel suit une architecture Mod&egrave;le-Vue-Contr&ocirc;leur. Et c&rsquo;est ce qui fait de Laravel un &laquo; super &raquo; framework &agrave; utiliser pour le d&eacute;veloppement de vos applications Web. Il am&eacute;liore les performances, assure la clart&eacute; et permet une meilleure documentation.\r\n\r\nG&eacute;n&eacute;ration d&rsquo;URLS\r\nLaravel aide &eacute;galement &agrave; g&eacute;n&eacute;rer des URL, ce qui est tr&egrave;s utile pour cr&eacute;er des liens dans vos mod&egrave;les. Lorsqu&rsquo;un utilisateur clique ou tape un lien, il souhaite voir le contenu souhait&eacute;, tel qu&rsquo;un article, une description du produit, etc&hellip; Ce qui n&rsquo;est pas possible sans l&rsquo;aide du routage d&rsquo;URL. Le framework Laravel fournit une strat&eacute;gie de description de route tr&egrave;s simple en acceptant simplement un URI et une fermeture.\r\n\r\nInt&eacute;gration aux services de messagerie\r\nL&rsquo;int&eacute;gration du service de messagerie est un autre avantage fourni par Laravel. Il est utilis&eacute; pour envoyer des notifications aux utilisateurs pour les informer des diff&eacute;rents &eacute;v&eacute;nements qui se produisent. Il fournit &eacute;galement des pilotes pour Mailgun, SMTP, Mandrill, SparkPost, la fonction de courrier &eacute;lectronique de PHP et Amazon SES, qui permettent &agrave; une application de d&eacute;marrer rapidement.\r\n\r\nCr&eacute;ateur d&rsquo;applications multilingues\r\nC&rsquo;est donc la bonne option pour les entreprises qui cherchent &agrave; s&rsquo;&eacute;tendre &agrave; travers diff&eacute;rents pays avec diff&eacute;rentes langues. Le framework Laravel vous aide donc &agrave; cr&eacute;er facilement et rapidement votre application Web dans diff&eacute;rentes langues.\r\n\r\nTutoriels Laracasts\r\nLaravel propose des fonctionnalit&eacute;s de Laracasts, un m&eacute;lange de tutoriels vid&eacute;o gratuits et payants qui vous montrent comment utiliser Laravel pour le d&eacute;veloppement. Les vid&eacute;os sont toutes cr&eacute;&eacute;es par Jeffery Way, un instructeur expert. La qualit&eacute; vid&eacute;o est excellente et les le&ccedil;ons sont bien pens&eacute;es et utiles.\r\n\r\nPour conclure, nous ne pouvons pas confirmer que Laravel est le meilleur framework car tout ce que fait Laravel (et que nous venons de voir) d&rsquo;autres framework le font aussi. Seule la fa&ccedil;on de faire les choses reste diff&eacute;rente. Vous voulez un framework qui d&eacute;veloppe lui m&ecirc;me ses modules et librairies capable de faire tout ce que vous voulez sans avoir a piocher dans des librairies quitte &agrave; avoir un fonctionnement un peu plus complexe ? Vous utilisez Symfony. Si vous avez juste besoin de certaines fonctionnalit&eacute;s, d&rsquo;un d&eacute;ploiement rapide et par la suite pouvoir facilement ajouter des librairies &agrave; votre application sans casser tout votre code ? Laravel est le meilleur dans ce cas l&agrave;.', '2020-07-17 16:14:11', 2, 'DELOS Médérick'),
(2, 'PHP vs NODE.JS', 'PHP et Node.js sont tous les deux utilisés pour le développement côté serveur et sont donc devenus des concurrents l’un pour l’autre. Mais alors, qui dessinera l’avenir de la programmation ?', 'PHP est par définition le langage de programmation le plus utilisé pour le développement Web. A l’heure actuelle des milliers de sites et systèmes de gestion de contenu tels que WordPress ou Drupal exécutent PHP sur leurs serveurs. Et ces nombreux sites n’ont pas encore l’intention de passer à Node.js à l’avenir. La demande de développeurs PHP ne va pas se tarir de sitôt. Mais selon la tendance et les changements récents, un abandon progressif de PHP sur le web se poursuivra…\r\n\r\nFace à lui Node.js : un environnement d’exécution JavaScript construit sur le moteur JavaScript V8 de Chrome. Cette plateforme logicielle libre permet notamment de développer des applications en utilisant du JavaScript. Node.js utilise un modèle d’Entrée/Sortie non bloquant, basé sur les événements, qui le rend léger et efficace.\r\n\r\nGrâce à sa flexibilité et sa facilité d’acquisition, l’utilisation de Node.js est en pleine croissance depuis sa création en 2009. Le sujet n’est pas nouveau mais les avis sont toujours autant partagés et les développeurs, eux, ont toujours du mal à faire un choix entre les deux environnements. Selon le rapport 2018 de JavaScript, Node.js est utilisé par 63% des développeurs contre 50% en PHP.\r\n\r\nIl existe un bon nombre de facteurs sur lesquels nous pouvons nous baser pour comparer les deux environnements PHP et Node.js.\r\n\r\nQu\'en dites-vous ?', '2019-12-03 07:31:00', 2, 'DELOS Médérick'),
(10, 'React Native vs Ionic', 'Il y a encore 5 ans, si vous souhaitiez développer une application mobile, vous étiez confronté au problème de ne pouvoir développer votre application iOS et Android en même temps. Quelle application alliez vous privilégier ? Comme vous assurer de l\'homogénéité entre les deux ?\r\n\r\nEn 2019, il existe de nombreux frameworks qui permettent de développer une application multiplateforme (ou cross-platform) avec une base de code unique. Les deux frameworks actuellement les plus utilisés sont Ionic et React-native, conçus respectivement par Google et Facebook. Si ceux-ci ont le même objectif, ils n’ont pas la même approche.', 'IONIC, LA PREMIÈRE TECHNOLOGIE MULTIPLATEFORME\r\nSorti en 2013, Ionic a été conçu à l’origine avec les technologies Apache Cordova et Angular. Cette plateforme permet de développer des applications hybrides à l\'aide de HTML, CSS et JavaScript avec une base de code unique et réutilisable.\r\n\r\nAu fur et à mesure de son développement, Ionic s’est enrichi de composants et de fonctionnalités UI qui vous permettent de construire de belles applications. Attention toutefois, vous aurez besoin de Cordova et de PhoneGap pour que Ionic fonctionne.\r\n\r\nLa prise en main de Ionic vous sera d’autant plus aisée si vous connaissez déjà Angular.\r\n\r\nLe framework comporte un certain nombre de composants pré-développés pour l\'interface utilisateur. En conséquence, cela peut considérablement simplifier votre travail. \"Écrivez un code une fois et lancez-le sur toutes les plateformes.\"\r\n\r\nIonic fournit beaucoup de plug-ins bon marché qui vous permettent d\'oublier l\'utilisation de solutions tierces. De plus, vous pouvez toujours aller regarder les plugins de Cordova si vous ne trouvez pas ce que vous voulez.\r\n\r\nIONIC : SES POINTS FORTS\r\nIonic est basé sur des technologies populaires telles que Angular, CSS, HTLM, permettant d’être utilisé rapidement par les développeurs.\r\n\r\nCe framework fournit de nombreux composants et plugins. Il est également possible d’utiliser un kit de développement d’applications riche en fonctionnalités : bibliothèque de blocs front-end, des composants UI, plugins vous permettant d’accès à l’appareil photo, etc/t\r\n\r\nUne bibliothèque propose des composants qui agissent et ressemblent à des éléments natifs de toutes les plates-formes prises en charge. De plus, il existe un kit de développement d\'applications complet: une riche bibliothèque de blocs de construction frontaux, des composants d\'interface utilisateur, des centaines d\'icônes d\'applications les plus courantes. Les plugins nous donnent accès à des fonctions téléphoniques, telles que Bluetooth, GPS ou appareil photo.\r\n\r\nCes différents avantages permettent de créer une application à moindre coût. D’une part, les technologies utilisées sous Ionic sont très connues. D’autre part, vous économisez du temps de développement puisque vous développez un code unique pour plusieurs plateformes.\r\n\r\nIONIC – SES POINTS FAIBLES\r\nLes apps développées avec Ionic peuvent avoir des performances réduites par rapport aux apps natives, en particulier pour les apps qui demandent de nombreuses fonctions de rappel (ou « callbacks ») vers le code natif.\r\n\r\nDe plus, le développement de features nécessitant de nombreuses transitions graphiques ou intéractives avancées peuvent être compliquées à développer.\r\n\r\nEnfin, Ionic demande de bonnes connaissances de la librairie RxJS (qui a pour but de faciliter la gestion des évènements asynchrones) ce qui peut ralentir la vitesse de développement si vous ne les maîtrisez pas.\r\n\r\nREACT NATIVE, LA TECHNOLOGIE MULTI-PLATEFORME POUSSÉE PAR FACEBOOK\r\nCe framework a été créé par Facebook en 2015, en appliquant l\'architecture React aux applications natives iOS et Android.\r\n\r\nIl possède une fonctionnalité intéressante qui permet de créer des applications multi plateformes, difficiles à distinguer des applications natives. Cela revient à taper une phrase dans Google Translate qui vous donne automatiquement une traduction. En termes simples, le processus est le même : vous écrivez un code dans les composants React. Par la suite, ce code sera rendu sous forme de composants d\'interface utilisateur natifs dans votre application mobile. WebView et les navigateurs n\'étant pas utilisés, vos applications pourront fonctionner plus rapidement.\r\n\r\nReact Native est basé sur JavaScript, ce qui offre de larges possibilités aux développeurs de partager leur code sur des plateformes différentes. Attention, toutefois, ne vous attendez pas à utiliser une seule barre d’outils pour plusieurs plateforme. Au contraire, vous allez utiliser des composants au plus proche du comportement natif de la plateforme ! De plus, vous ne pourrez pas vous dire que vous pourrez utiliser React Native partout. Vous devrez dans certains cas modifier un code spécifique à iOS ou Android si vous souhaitez avoir une apparence 100% native.\r\n\r\nREACT NATIVE – SES POINTS FORTS\r\nLa principale force de React Native est le temps de développement court. Le framework fournit de nombreux composants prêts à l\'emploi qui peuvent accélérer la sortie de votre application. Même si React Native n’a pas toujours la solution que vous souhaitez intégrer, vous pouvez la construire rapidement “from scratch” puisqu’il est basé sur JavaScript, le langage le plus populaire dans le monde et dispose ainsi de nombreux composants déjà existants et une communauté très large prête à vous aider.\r\n\r\nUn autre gros avantage de React Native provient de sa capacité à pouvoir réutiliser son code base sur iOS et Android. Selon la complexité de votre application et du nombre de modules natifs que vous utilisez, il est possible de développer à 100% en cross-platform.\r\n\r\nEn étant développé en Javascript, le framework vous donne la possibilité de partager le codebase entre les plateformes mobiles et les applications en React web\r\n\r\nReact Native permet également aux développeurs de faire fonctionner l\'application tout en implémentant de nouvelles versions et en peaufinant l\'interface utilisateur gràce au concept de Hot Reloading. Cela rend les modifications visibles instantanément sans que le développeur ait besoin de compiler à nouveau l’application. Fini les pertes de temps à compiler et perdre le statut de l’application lors des modifications réalisées, ce qui raccourcir toujours plus le temps de développement.\r\n\r\nEn termes de coûts, développer une application sous React Native est mois cher que de développer à la fois sous iOS et Android. En effet, vous aurez essentiellement besoin de développeurs en JS.\r\n\r\nBeaucoup de développeurs étaient sceptiques sur les performances d’une application en React Native par rapport à une app en natif. Il n’en est rien. Les différences de rapidité ou de performance sont minimes ou nulles.\r\n\r\nREACT NATIVE – SES POINTS FAIBLES\r\nMême si React Native est utilisé par de nombreux acteurs (Instagram, Twitter, etc.), ce framework est toujours en phase bêta, ce qui signifie qu’il y a souvent des changements de versions pour lesquels la migration n’est pas immédiate, et certaines fonctionnalités sont encore instables. Ainsi, les développeurs React Native font parfois face à des problèmes liés aux outils de débugs par exemple.\r\n\r\nDe plus, React Native manque encore de certains composants, en particulier personnalisables. Rassurez-vous, la plupart des modules personnalisés dont vous aurez besoin sont disponibles et très bien documentés.\r\n\r\nS’agissant des technologies à maîtriser, vos développeurs devront quelques connaissances spécifiques à iOS et Android. En effet, certaines fonctionnalités et modules natifs ne sont pas pris en charge (ex : push notifs, appareil photo, etc.). A noter toutefois que la communauté propose de plus en plus de bibliothèques en open source qui vous permettent d’intégrer ces fonctionnalités natives. Néanmoins, la mise en œuvre de fonctionnalités plus avancées peut nécessiter encore l’aide des développeurs iOS et Android.\r\n\r\nLes frameworks multi-plateformes sont devenus incontournables avec la multiplicité des modèles de téléphones et des versions des système d’exploitation iOS et Android. Si Ionic et React-Native sont les deux frameworks les plus populaires ; React-Native attire un nombre croissant de nouvelles applications. Les applications les plus populaires Facebook, Uber, Amazon et Netflix ont choisi ce framework. Chez BAM, nous avons expérimenté à la fois Ionic et React-Native. Finalement, c’est sur ce dernier que nous avons choisi de développer des applications pour nos clients. Les avantages proposés par React-Native sont nombreux : des performances comparables aux applications natives, un temps de développement plus court, une expérience utilisateur fluide et une possibilité de partager le codebase entre les plateformes mobiles et les applications en React web. Tout pour vous fournir un MVP en un temps record ou optimiser une application déjà existante que vous soyez une startup, une PME ou une grand entreprise.', '2020-07-25 20:29:22', 2, 'DELOS Médérick');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin` varchar(5) DEFAULT NULL,
  `redacteur` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `prenom`, `nom`, `password`, `admin`, `redacteur`) VALUES
(12, 'user.lambda@monsite.com', 'Mister', 'LAMBDA', 'ed2b1f468c5f915f3f1cf75d7068baae', 'false', 'false'),
(11, 'redacteur@monsite.com', 'Francois', 'TERNET', 'ed2b1f468c5f915f3f1cf75d7068baae', 'false', 'true'),
(13, 'test.test@gmail.com', 'Test', 'Test', 'ed2b1f468c5f915f3f1cf75d7068baae', NULL, ''),
(2, 'mederick.delos@gmail.com', 'Médérick', 'DELOS', 'ed2b1f468c5f915f3f1cf75d7068baae', 'true', 'true');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
