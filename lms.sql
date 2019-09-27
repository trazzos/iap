-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2019 at 10:22 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `abreviacion`
--

DROP TABLE IF EXISTS `abreviacion`;
CREATE TABLE IF NOT EXISTS `abreviacion` (
  `abreviacionId` int(11) NOT NULL AUTO_INCREMENT,
  `abreviacion` varchar(255) NOT NULL,
  PRIMARY KEY (`abreviacionId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abreviacion`
--

INSERT INTO `abreviacion` (`abreviacionId`, `abreviacion`) VALUES
(1, 'Lic.'),
(2, 'CP');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `activityId` int(11) NOT NULL AUTO_INCREMENT,
  `activityConfigId` int(11) NOT NULL,
  `courseModuleId` int(11) NOT NULL,
  `activityType` enum('Lectura','Tarea','Examen','Otro','Foro') NOT NULL,
  `initialDate` date NOT NULL,
  `horaInicial` time NOT NULL,
  `finalDate` datetime NOT NULL,
  `modality` enum('Individual','Por Equipo') NOT NULL,
  `description` mediumtext NOT NULL,
  `resumen` varchar(30) NOT NULL,
  `requiredActivity` int(11) NOT NULL,
  `ponderation` int(3) NOT NULL DEFAULT '0',
  `timeLimit` int(3) NOT NULL,
  `noQuestions` int(2) NOT NULL,
  `tries` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`activityId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityId`, `activityConfigId`, `courseModuleId`, `activityType`, `initialDate`, `horaInicial`, `finalDate`, `modality`, `description`, `resumen`, `requiredActivity`, `ponderation`, `timeLimit`, `noQuestions`, `tries`) VALUES
(1, 0, 1, 'Tarea', '2019-08-10', '00:00:00', '2019-08-10 23:59:00', 'Individual', '', 'ACTIVIDAD B', 0, 20, 0, 0, 1),
(2, 0, 2, 'Lectura', '2019-08-10', '00:03:00', '2019-08-10 23:59:00', 'Individual', '', 'Actividad 3', 0, 10, 0, 0, 1),
(3, 0, 2, 'Lectura', '2019-08-10', '00:00:00', '2019-08-10 23:59:00', 'Individual', '&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &#039;Open Sans&#039;, Arial, sans-serif; font-size: 14px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis nisi porta, cursus est nec, p', 'aaa', 0, 0, 0, 0, 1),
(4, 0, 2, 'Lectura', '2019-08-10', '00:00:00', '2019-08-10 23:59:00', 'Individual', '&lt;p&gt;dasdasdasdas&amp;nbsp;&lt;/p&gt;', 'dasdasd', 0, 0, 0, 0, 1),
(5, 0, 2, 'Lectura', '2019-08-10', '00:00:00', '2019-08-10 23:59:00', 'Individual', '&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &#039;Open Sans&#039;, Arial, sans-serif; font-size: 14px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis nisi porta, cursus est nec, p', 'dasdasd', 0, 0, 0, 0, 1);
INSERT INTO `activity` (`activityId`, `activityConfigId`, `courseModuleId`, `activityType`, `initialDate`, `horaInicial`, `finalDate`, `modality`, `description`, `resumen`, `requiredActivity`, `ponderation`, `timeLimit`, `noQuestions`, `tries`) VALUES
(6, 0, 2, 'Lectura', '2019-08-10', '00:00:00', '2019-08-10 23:59:00', 'Individual', '&lt;div id=&quot;lipsum&quot; style=&quot;margin: 0px; padding: 0px; text-align: justify; font-family: &#039;Open Sans&#039;, Arial, sans-serif; font-size: 14px;&quot;&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quis nisi porta, cursus est nec, pharetra risus. Morbi tristique augue in ipsum scelerisque consequat eget ut neque. Vivamus hendrerit ante ante, quis fringilla elit tempor in. Praesent eu erat ut nisi lacinia dictum. Donec at mollis lectus, nec luctus leo. Vestibulum non orci luctus, imperdiet purus nec, dignissim nunc. Donec viverra, dui ac convallis tincidunt, mi quam convallis ligula, vestibulum dapibus mi quam eget nibh. Duis hendrerit quis augue id interdum. Suspendisse venenatis neque mauris, id molestie massa molestie in. Nam eget orci ac nibh vestibulum molestie ac eget diam. Morbi porttitor mattis est nec sodales. Maecenas rhoncus non odio ultricies pellentesque. Nam et sollicitudin ligula. Praesent in tempus arcu. Aenean imperdiet enim dui, sit amet porttitor ante sodales vel. Suspendisse convallis libero et magna varius pretium.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque semper eu nunc a molestie. Quisque nec leo ac turpis fermentum ornare vel sed orci. Curabitur tincidunt iaculis auctor. Sed at ullamcorper nisl. Nulla dapibus orci sit amet neque congue molestie. Suspendisse eros orci, lacinia id ex a, ullamcorper lobortis mi. Fusce tempor lacinia urna sit amet varius. Nullam faucibus tortor volutpat mattis suscipit. Mauris pellentesque, dolor a aliquam imperdiet, augue augue fermentum nulla, id malesuada quam risus iaculis libero. Suspendisse eget tristique nisi, eget vehicula mi. Phasellus ut lorem nec enim convallis elementum. Quisque tincidunt pretium elit, vitae consequat mi blandit eget. Ut non dapibus quam, et placerat justo. Integer accumsan erat eu turpis egestas, id imperdiet metus posuere.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;In sagittis mattis mattis. Quisque pulvinar risus quis mollis vestibulum. Curabitur elementum, ipsum a fringilla venenatis, sem libero elementum diam, fringilla laoreet tortor velit et nunc. Nulla aliquam tellus non volutpat posuere. Etiam in sodales ante. Phasellus ut neque eget nunc iaculis euismod a sit amet tortor. Sed dignissim dignissim mi, at fermentum risus commodo a.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nullam laoreet risus nec sagittis porta. Aliquam tristique rutrum sem, sed pretium orci semper vel. Nulla metus dolor, fringilla a mauris vitae, tincidunt tempus lectus. Mauris mattis ullamcorper est, ac dapibus arcu tincidunt ut. Donec tempus purus velit, vestibulum condimentum turpis elementum ut. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce porta turpis sit amet pharetra ultrices. Sed ultricies orci sed velit vehicula, sed tristique dolor ultricies. Morbi nunc augue, tincidunt eu sapien at, aliquet condimentum nibh. Praesent eget felis eget arcu vestibulum hendrerit. Sed non porta magna. Cras rhoncus placerat erat ut ultricies. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus dignissim, mi in consequat luctus, tellus lectus egestas felis, non varius lorem risus ut elit.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Fusce ultrices efficitur malesuada. In at est non quam porta malesuada luctus quis tellus. Integer ac aliquam augue. Morbi venenatis cursus varius. Ut malesuada, nisl sit amet laoreet placerat, turpis ligula finibus arcu, id accumsan nulla dui vel est. Sed mollis iaculis felis eu commodo. In interdum mauris ac nisi commodo porta.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Etiam vel faucibus mauris. Quisque varius, ligula at suscipit accumsan, eros orci bibendum turpis, id aliquam tellus arcu sed justo. Ut vitae accumsan velit. Curabitur feugiat eu sapien tristique sodales. Duis arcu diam, rhoncus interdum erat eu, varius laoreet turpis. Morbi maximus purus lorem, sit amet pulvinar massa venenatis sit amet. Curabitur convallis bibendum maximus. Aliquam pharetra sem sit amet urna gravida finibus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Duis magna dui, auctor dapibus fermentum eu, placerat vel felis. In bibendum, ante eget tempor facilisis, sem quam feugiat nulla, eu accumsan sapien dolor a nunc. In sit amet vulputate nunc. Proin vitae ligula a magna egestas sollicitudin eget sed lectus. Pellentesque at pharetra est. Proin elit sem, blandit sit amet scelerisque accumsan, tincidunt sit amet libero. Nullam eget nisl pretium, bibendum mauris sit amet, tincidunt est. In hac habitasse platea dictumst. Sed quis turpis eros. Morbi pretium laoreet velit eu gravida. In ultricies, urna vel tincidunt aliquam, lectus est venenatis turpis, eu porta lorem odio a nisl.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Maecenas non bibendum nulla. Curabitur quis nunc mi. Nunc efficitur eros ut tortor feugiat, ut sodales justo pretium. Praesent nulla lectus, pretium eu lacus vitae, elementum laoreet dolor. Vivamus tincidunt urna elit, sed porta nibh finibus id. Donec mollis urna ex, vitae iaculis tellus pulvinar vitae. Phasellus dapibus metus a mauris maximus malesuada. Sed bibendum ipsum nec sem dictum condimentum. Aliquam vehicula quis odio a tincidunt. Aenean magna tellus, vestibulum in augue nec, tempor tincidunt dui. Morbi sed mauris urna. Curabitur ornare arcu in neque efficitur, quis aliquam lorem tincidunt.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aenean vel elit sagittis, volutpat arcu tincidunt, porttitor leo. Nunc rhoncus consequat commodo. Donec cursus metus sit amet augue aliquet, vitae vestibulum dui rutrum. Sed in bibendum sem, ut gravida tellus. Nunc sit amet dictum nibh, commodo aliquam purus. Sed mi risus, convallis vitae congue eu, rhoncus ac erat. Maecenas at tortor nunc. Cras id commodo enim. Fusce id diam lorem. Quisque ac diam gravida, bibendum sem quis, placerat lorem. Donec a tempor velit, in tristique quam. Donec eget venenatis ipsum. Quisque finibus quis tellus eu posuere. Curabitur pharetra tellus id mauris imperdiet dignissim.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam eget rhoncus ante. Aliquam in ligula ut magna imperdiet viverra. Vestibulum ligula lectus, congue sed pretium sit amet, imperdiet vitae augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer dignissim bibendum massa vitae vulputate. Nulla consequat elit lectus, sed eleifend dolor condimentum id. Praesent vel eros mollis, mollis neque et, ultrices neque. Cras felis ante, rhoncus non congue in, ultrices at ligula. Vestibulum pellentesque faucibus diam mollis egestas. Vivamus congue lorem id purus dictum, at aliquam urna efficitur. Vivamus ante ex, molestie nec orci in, faucibus mollis justo. Sed eu eros tristique, porta sapien eget, hendrerit nisl. Proin imperdiet lacus nunc. Donec lorem nunc, fermentum in risus nec, posuere porttitor orci. Praesent ante nunc, porttitor blandit rutrum id, ullamcorper in est.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Morbi sagittis nulla sit amet placerat pulvinar. Curabitur dictum nulla et facilisis efficitur. Nullam augue leo, bibendum at ultricies sit amet, tempus in leo. Maecenas sit amet justo finibus, convallis massa in, tincidunt odio. Duis volutpat libero vel venenatis pulvinar. Etiam condimentum ligula odio, sit amet viverra nisl pretium quis. Donec vel malesuada leo.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Etiam hendrerit efficitur commodo. Nam at malesuada velit. Sed vitae eros vitae enim efficitur viverra. Etiam pharetra facilisis arcu ac imperdiet. Nullam sit amet varius ante. Mauris mi ipsum, posuere sed diam non, interdum molestie sapien. In posuere nunc quam, id convallis diam vehicula nec. Aenean maximus accumsan augue, ut rhoncus sapien aliquam ut. Proin venenatis, eros eu volutpat porta, libero elit mollis odio, et volutpat nisi nisi id enim. Nullam consectetur blandit ultricies. Mauris tristique volutpat urna nec sollicitudin. Pellentesque eu laoreet nibh, eget sodales dui.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aenean urna velit, condimentum et venenatis et, rutrum vitae magna. Donec varius convallis maximus. Duis mattis, nibh vitae faucibus finibus, enim augue tincidunt leo, id mattis tortor turpis eu est. In quis lacus mauris. Vivamus elementum ex in tellus fringilla, et sollicitudin odio viverra. Sed porttitor imperdiet hendrerit. Ut gravida tincidunt rutrum. Quisque at ante eros. Sed in lorem in sem ultricies cursus. Fusce pulvinar ac urna eu faucibus. Morbi id urna lacinia, pharetra nulla ac, consectetur sem. Donec sed finibus lacus. Donec tristique auctor felis, quis mattis massa venenatis eu.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pulvinar eu tellus nec dapibus. Pellentesque non convallis lorem. Ut vulputate est in posuere vestibulum. Vestibulum bibendum augue eu sollicitudin hendrerit. Vestibulum vulputate mi turpis, vel mollis dolor pharetra non. Morbi nec dictum odio. Praesent metus sem, tristique sit amet massa ac, rhoncus interdum purus. Vivamus ornare justo sit amet erat placerat dignissim.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nulla at arcu sagittis justo facilisis pulvinar eget vel sapien. Integer scelerisque tristique risus, sit amet tincidunt est efficitur eu. Proin efficitur, dui id congue placerat, mauris tortor aliquam lacus, mollis aliquet magna nulla vitae urna. Etiam faucibus, erat et maximus facilisis, sem mi tempor neque, ut eleifend purus dui sed nulla. Suspendisse eleifend, mauris quis sodales eleifend, augue quam consectetur justo, interdum congue velit nisl a ex. Duis ullamcorper finibus diam. Nunc imperdiet urna sit amet risus sodales, id pulvinar nibh viverra. Pellentesque aliquet ante id tempor pharetra. Nunc finibus arcu vitae posuere pharetra.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam auctor, elit vitae dictum venenatis, orci velit facilisis ante, non efficitur augue magna ut nibh. Maecenas sollicitudin mattis sapien non tincidunt. Vivamus commodo turpis eget orci luctus elementum. Nam pulvinar scelerisque urna eu euismod. Praesent gravida dolor faucibus turpis condimentum, at condimentum mi cursus. Maecenas fermentum elementum nulla, consectetur posuere sem varius nec. Integer nibh sem, ultricies id enim et, vestibulum lacinia leo. Phasellus aliquet elit sapien, et pellentesque enim sagittis ut. Duis sed ipsum gravida, pharetra magna eget, aliquet lectus. Cras ut justo orci. Morbi nec nunc varius, efficitur augue vel, scelerisque nibh. Maecenas aliquet porta nisl, vitae pharetra velit sodales eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In dapibus finibus tempus. Etiam tempus enim nisl, ac ultricies justo dignissim finibus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam erat volutpat. Suspendisse vulputate lacinia risus, sed porttitor massa imperdiet non. Curabitur ac magna id nisi cursus vulputate. Maecenas quis lacus quis quam vestibulum tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi nec ultricies libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed dignissim lectus nulla, et luctus urna lacinia id. Morbi mattis sodales viverra. Praesent vitae eros eu sem malesuada blandit vitae eget elit. Phasellus turpis elit, venenatis at euismod non, blandit quis eros. Sed sollicitudin ex ac mauris aliquet, et eleifend tortor rutrum. Donec rhoncus quam vel consequat convallis.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam tellus justo, consequat aliquet nisi ut, laoreet pulvinar est. Nam fringilla tincidunt cursus. Vestibulum condimentum at ex quis condimentum. Etiam pellentesque diam sit amet leo egestas, non egestas quam mattis. Morbi non nisl ligula. Sed eleifend, risus nec viverra tempor, nunc massa porta eros, vel molestie lectus enim at ante. Maecenas enim ipsum, mattis sed velit id, suscipit lobortis purus. Ut venenatis purus eget dictum sagittis. Nunc neque libero, pharetra quis arcu eget, tincidunt pellentesque leo. Morbi urna tellus, laoreet a metus in, mollis molestie sapien.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam erat volutpat. Praesent lorem ante, dictum quis ex in, gravida efficitur est. Duis cursus dui non pharetra ultricies. Maecenas nec lorem ultrices, feugiat est eu, efficitur mi. Duis sit amet volutpat neque. Ut a blandit odio. Curabitur ut felis consectetur justo scelerisque efficitur non id libero. Pellentesque consectetur, tellus ut cursus auctor, lacus sapien ornare eros, vel volutpat ligula orci vitae dolor. Morbi vitae nunc gravida, imperdiet ligula non, sagittis leo. Nulla venenatis sit amet lorem at ullamcorper. Pellentesque sed rutrum augue, ut interdum dui. Phasellus egestas cursus dolor molestie condimentum. Vestibulum at congue nunc.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Maecenas imperdiet porttitor lacus in bibendum. Ut posuere turpis sed arcu ornare vulputate. Vivamus blandit, tellus in gravida sollicitudin, mauris magna volutpat dui, id malesuada urna augue sit amet felis. In hac habitasse platea dictumst. Sed pharetra ex non pretium porttitor. Nulla viverra pulvinar interdum. Vestibulum eget ultricies erat. Vestibulum non arcu in tellus pharetra accumsan.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Maecenas eget dui metus. Maecenas sem dui, mollis non commodo a, facilisis ac dui. Donec felis libero, vehicula egestas elit eu, tincidunt molestie ex. Nam fringilla sem quam. Nullam ut mauris dolor. Nunc cursus blandit ipsum, sed ornare metus mollis id. Ut nulla lectus, congue a eleifend non, gravida vitae lacus. Ut semper odio quis tortor posuere luctus. Mauris elementum ullamcorper ante quis posuere. Nullam sem urna, dapibus ac justo eleifend, accumsan scelerisque dui. Ut ornare enim a ligula auctor, vitae rhoncus quam egestas. Ut suscipit eros id quam auctor, sed accumsan odio rhoncus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nam commodo ligula et augue blandit, sit amet volutpat arcu lacinia. Sed ornare eros id lorem luctus lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tempus turpis sit amet libero blandit, eu pharetra diam tincidunt. Nulla aliquam libero at eleifend semper. Morbi sed tincidunt elit. Etiam dignissim felis dui, at consectetur diam auctor quis. Suspendisse potenti. Phasellus at augue ultrices, lobortis lectus quis, consequat metus. Donec tempor elementum nulla, sed suscipit nunc. Curabitur gravida turpis at condimentum pulvinar. Donec quis risus sem. Quisque nec nibh id orci ultricies vestibulum quis non orci. Donec at dolor velit. In fringilla iaculis lacus, sed egestas nisl commodo sed.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam erat volutpat. Integer at nunc aliquet, laoreet lectus vel, feugiat nulla. Nam vitae libero euismod, posuere augue tempus, consequat metus. Suspendisse fringilla risus sit amet eros consequat, nec dapibus metus sodales. Donec posuere massa ex, vel feugiat orci varius in. Pellentesque non urna blandit, vestibulum lorem id, dictum tortor. Nulla quam sem, auctor ut nisi in, elementum imperdiet odio. Quisque molestie pharetra magna eget euismod.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque posuere laoreet magna sit amet scelerisque. Sed dignissim dui et nibh imperdiet lobortis ac id tortor. Fusce libero magna, auctor et molestie ac, egestas sed turpis. Mauris lacinia, lacus ac porta tempus, leo elit cursus enim, id ultricies enim sem quis eros. Curabitur semper, lorem vel tincidunt mattis, nibh lorem tristique nunc, rhoncus ultricies risus est eu sem. Pellentesque maximus consequat enim quis congue. Nulla facilisi. Maecenas sed turpis ut libero ullamcorper tincidunt.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Integer auctor molestie dignissim. In hac habitasse platea dictumst. Proin dolor lectus, pharetra ut venenatis ut, posuere sed ligula. Phasellus malesuada libero velit, sit amet finibus purus imperdiet vel. Etiam vitae scelerisque nunc, nec efficitur justo. Praesent et magna cursus, consequat dolor et, elementum orci. Duis facilisis ante id ipsum eleifend scelerisque.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque condimentum, lacus ut tincidunt viverra, eros nulla laoreet libero, a venenatis dui arcu quis massa. Donec velit est, congue nec aliquam sed, consequat a augue. Pellentesque ut ex nisi. Sed ultrices lobortis felis sit amet dignissim. Nulla facilisi. Nam tincidunt nec nibh at consectetur. Nulla rutrum lacinia commodo. Etiam feugiat hendrerit convallis. In convallis arcu lacus, pharetra malesuada diam laoreet auctor.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nam tincidunt posuere est, aliquet gravida lacus imperdiet at. Aliquam fringilla mauris sit amet mollis semper. Mauris vestibulum massa elit, et laoreet augue eleifend eleifend. In eleifend, ante eget tristique euismod, leo ligula congue orci, ut viverra tortor risus quis augue. Sed congue nunc ut purus tempor facilisis. Etiam ut felis auctor, egestas lorem quis, pellentesque tellus. Aenean mauris ipsum, tempus a neque vitae, suscipit tristique tellus. Sed semper est porttitor elit blandit, ut suscipit justo viverra. Sed commodo fermentum magna.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;In ornare ut ligula ac malesuada. Donec quis congue dui, eu condimentum urna. Pellentesque consectetur enim urna, quis finibus nisl ultrices a. Proin lobortis eget eros nec egestas. Nam et felis vel urna sodales facilisis. Donec ut risus in mauris imperdiet facilisis. Morbi gravida, augue et rhoncus facilisis, odio felis placerat turpis, sit amet hendrerit enim mi et turpis. Proin non rhoncus libero. Nam sed tempor sem, at porta purus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nunc bibendum sed ligula vel mattis. Cras quis nunc ex. Suspendisse condimentum lacus nec turpis ornare sodales. Sed in vehicula lectus. Morbi at dui turpis. Donec sodales a metus id rutrum. Cras blandit purus vitae felis finibus porttitor. Donec blandit tempor mollis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum id nibh lobortis, vehicula diam eu, fermentum velit. Cras ut finibus nulla, at tempus dui. Nulla mi dui, dignissim vel imperdiet nec, tincidunt quis velit. Praesent efficitur suscipit tortor, vel commodo dolor pellentesque nec. Vestibulum at velit suscipit, commodo velit sed, laoreet orci. Nunc dictum mi ut mauris dignissim, in imperdiet lectus ultrices.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Vestibulum tincidunt velit ex, tristique interdum enim viverra sed. Fusce ornare gravida libero, non pharetra nisl tempor nec. Sed et ultricies magna. Mauris consequat est et felis porta semper. Maecenas cursus augue porta, sagittis sapien consequat, ullamcorper ipsum. In vitae pretium massa. Ut sit amet dui eu lectus molestie ornare.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Phasellus semper, magna eu blandit consequat, massa odio commodo nisl, eget pretium sapien leo a velit. Nullam ultrices dictum lacus, vitae scelerisque purus fringilla et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc justo leo, rutrum at consectetur et, efficitur a leo. In eget ante neque. Duis pulvinar tortor eget lorem varius commodo et in est. Cras scelerisque mi enim, quis tempus nisi facilisis ut. Morbi dignissim vulputate interdum. Nulla pharetra tortor urna, nec dapibus est tristique eu. Integer ornare malesuada neque a egestas. Mauris sapien arcu, aliquam vel lacus sit amet, maximus pulvinar sem. Ut sed nunc sed est mattis varius vitae quis massa. Aenean rutrum purus in tincidunt molestie.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Suspendisse sit amet diam maximus, hendrerit ante nec, malesuada metus. Suspendisse pharetra, mi a mattis lacinia, ipsum enim fringilla arcu, sed varius ex augue quis dolor. Nam vel pharetra felis, vitae feugiat sem. Ut scelerisque porta orci, tincidunt varius velit. Curabitur ultrices gravida dui, vitae ullamcorper urna finibus vitae. Suspendisse libero leo, accumsan vel aliquam quis, lobortis placerat erat. Vivamus at fringilla nibh, non molestie tortor. Sed metus ligula, porta quis tellus at, dictum consectetur velit. Nam a tristique elit. Donec lacinia in massa id fringilla.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Vivamus faucibus turpis id nibh maximus accumsan. Integer blandit ultrices facilisis. Curabitur pellentesque erat eget elit laoreet auctor. Maecenas nibh magna, ornare nec nibh lobortis, aliquam fermentum risus. Praesent posuere pretium lectus et suscipit. Fusce ultrices consectetur massa quis dignissim. Proin malesuada, neque at efficitur posuere, nisl diam sodales risus, in malesuada lorem ex in ligula. Phasellus et odio elit. Sed a nisl facilisis, ullamcorper massa mollis, feugiat purus. Sed elementum est a leo scelerisque, sit amet pharetra mauris hendrerit. Aliquam lobortis egestas mi ac maximus. Sed sit amet dictum massa, in gravida tellus. Cras luctus tortor sed eros blandit blandit.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque luctus gravida erat, sed consequat tellus dignissim eu. Cras laoreet mollis metus a dignissim. Nam ac nisl nibh. Morbi nec molestie arcu. Ut et dapibus purus. Pellentesque bibendum luctus luctus. Nunc nisi erat, pretium pretium nisi id, pulvinar faucibus lectus. Morbi at augue condimentum massa laoreet maximus quis eget tellus. Ut accumsan, leo vitae scelerisque volutpat, ipsum nisl accumsan orci, at lobortis tortor ante id massa. Vivamus congue enim sit amet mauris lobortis, sit amet interdum felis accumsan. Donec consectetur felis dui, rutrum fringilla urna consectetur vel. Aliquam magna urna, fringilla ut mattis vel, vehicula quis sapien. Pellentesque risus eros, semper nec nisl accumsan, feugiat vehicula felis. Suspendisse finibus at dolor in convallis. Ut aliquet diam a turpis dignissim lacinia.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Integer ac neque a massa tristique elementum. Praesent in tellus sed odio vehicula pretium. Donec suscipit nisi ex, sit amet ultricies nibh gravida et. Nulla libero sapien, aliquam malesuada fermentum non, facilisis vel nibh. Donec luctus iaculis mauris, eu semper tortor mollis faucibus. Duis facilisis tellus viverra justo rhoncus, auctor molestie lectus semper. Fusce aliquet pharetra lacus in blandit. Quisque non nisi leo. Maecenas nec eros tempus, placerat justo a, blandit ipsum. Sed hendrerit tincidunt sem vitae convallis. Sed dignissim nulla in aliquet volutpat. Curabitur lacinia nisi et enim consequat, in auctor velit tempor. Aliquam vel elit elit. Duis sed purus eu mi fringilla euismod nec sit amet mauris. Mauris blandit efficitur dolor, nec fringilla felis ultrices nec.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nulla in egestas orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum mattis sollicitudin metus ut cursus. Aliquam interdum posuere erat, a vulputate lacus condimentum et. Proin vitae lacinia eros. Nulla non quam vitae ante cursus ultrices vitae vel magna. Proin interdum, lectus in venenatis ultricies, dolor felis scelerisque leo, quis finibus neque dolor et elit. Fusce sit amet neque id nisi convallis aliquam. Integer eget purus nec mi molestie rutrum sit amet eu mi. Donec fermentum a nisi vel sagittis.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nunc pellentesque elit vel condimentum sagittis. Curabitur porttitor nisl in justo lobortis tincidunt. Aliquam vitae gravida magna, bibendum finibus tellus. Pellentesque sit amet gravida velit, ut aliquam sem. Phasellus eros sapien, fringilla id feugiat nec, laoreet eget eros. Cras eget risus rhoncus, vestibulum mauris in, molestie ligula. In sodales mi vitae feugiat condimentum. Nulla pretium purus turpis.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Donec maximus posuere urna vel accumsan. Mauris nec est elementum purus hendrerit condimentum. Integer sodales sem at eleifend auctor. Cras a erat est. Sed laoreet neque leo, quis bibendum odio eleifend non. Vestibulum a nisi sagittis mauris tincidunt aliquet. Praesent sed nisi sollicitudin, suscipit mauris a, consectetur ante. In tincidunt suscipit ante, nec pretium diam molestie eget. In vitae ante ultricies, tincidunt nulla quis, aliquam turpis. Curabitur vitae hendrerit ligula, in dapibus augue. Proin lacus libero, porttitor eu tincidunt ut, mollis vitae diam. Vestibulum vitae tincidunt justo. Suspendisse potenti. Morbi vel aliquet augue. Morbi dictum leo a quam eleifend, efficitur malesuada dolor fermentum. Nam varius pulvinar congue.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam tincidunt nec lacus ut tristique. Mauris tincidunt eget nisi ac efficitur. Proin mattis eleifend mollis. Quisque odio mauris, tempor sed neque eget, dapibus cursus dolor. Etiam placerat nibh nec lacus scelerisque hendrerit. Phasellus quam nunc, maximus sit amet aliquam condimentum, mattis in turpis. Integer volutpat, lorem et suscipit pharetra, metus eros egestas tortor, eu ultricies diam justo et nulla. Curabitur dapibus ipsum in enim posuere aliquet. In a consequat justo. Proin a bibendum dui. Nam laoreet placerat nisi, in ullamcorper dui malesuada et. Nullam pulvinar lacus a nunc malesuada semper. Vestibulum quis nibh et quam egestas maximus at porttitor metus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Proin sit amet dui orci. Nullam est dolor, tempor at accumsan a, placerat non eros. Sed sed odio a eros cursus molestie. Suspendisse porta tortor rutrum tellus eleifend, a maximus nunc eleifend. Sed venenatis, arcu sed pharetra condimentum, nisl ante cursus arcu, et malesuada tortor enim non risus. Phasellus nec convallis augue. Phasellus volutpat sapien vel libero aliquam mollis eget quis enim. Vivamus a leo sit amet nunc facilisis dapibus vel id quam. Aenean sed sodales metus, nec vestibulum metus. Nullam aliquam arcu eget libero lobortis, at pellentesque eros tincidunt. Suspendisse eget laoreet lectus. Quisque pharetra lacus eu ex iaculis, nec tristique justo sodales. Aliquam viverra lacinia est, vitae faucibus turpis consequat vitae.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Fusce vel dolor suscipit, porttitor elit vel, auctor lectus. Ut magna augue, viverra ut dui eget, faucibus imperdiet lacus. Fusce porta, arcu vitae dapibus vulputate, elit nisl tincidunt libero, vel blandit arcu est quis nunc. Fusce eu nisl varius, sodales turpis eu, vestibulum orci. Nulla facilisi. Morbi in est ac sapien posuere laoreet at sit amet dolor. Integer elit lacus, feugiat a purus sed, viverra condimentum mauris. Nam vitae fringilla purus. Vivamus feugiat magna in lobortis faucibus. Nunc blandit gravida velit, eu lobortis justo bibendum gravida. Donec dignissim magna eget justo pulvinar, sit amet volutpat justo iaculis. Etiam eu erat placerat, pulvinar neque vitae, commodo massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut ut finibus mauris, eu volutpat ex. Cras luctus laoreet tortor sed dignissim.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque quis nisl tristique purus feugiat fringilla. Phasellus tristique scelerisque nunc, in imperdiet nisi ullamcorper ac. Proin congue ullamcorper magna quis volutpat. Morbi viverra velit ut odio egestas, sit amet venenatis lorem elementum. Cras sed mattis tellus. Nulla laoreet nec erat non ultrices. Integer quam erat, dignissim in metus ut, tempor molestie nisi. Integer condimentum dictum ex eu egestas.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ullamcorper tempus est, in dapibus urna faucibus a. Integer luctus ligula leo, nec iaculis arcu pretium nec. Donec augue est, posuere vel lobortis a, malesuada non nibh. Proin at sem dignissim, rhoncus tortor sit amet, gravida turpis. Donec enim felis, pretium ut accumsan vel, consectetur a ante. Suspendisse eget dolor elit. Donec non eros blandit, imperdiet ipsum et, gravida massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Curabitur quis eros sagittis, facilisis leo sit amet, porttitor nunc. In eu dui ultricies lacus laoreet ultricies a eget est. Mauris condimentum nisi turpis, sed pharetra purus vestibulum a. Quisque non libero enim. Duis vel urna id enim facilisis volutpat. Sed blandit, sapien eu viverra rhoncus, ex libero sollicitudin libero, nec dictum turpis orci quis tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin volutpat aliquam sem, in elementum magna. Sed vel mattis eros.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Sed ipsum dui, facilisis eget luctus non, blandit et velit. Vestibulum ipsum nunc, porta in gravida eget, pretium vitae arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse at dolor finibus, cursus nibh quis, auctor justo. Proin porta pulvinar pretium. Nunc pharetra dui id hendrerit venenatis. Fusce metus arcu, fermentum at mi at, suscipit efficitur odio. Praesent vestibulum mi quis sapien congue imperdiet. Ut eget eros sapien. Quisque non ligula urna. Vivamus vitae risus a erat maximus finibus eu eu enim. Aliquam interdum sapien non felis finibus ultricies. Nam mi lorem, elementum vel leo sed, congue varius est.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nunc accumsan, odio eu pellentesque pulvinar, ligula felis luctus diam, non ultrices lectus libero non metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc eu ante lacinia, viverra orci ut, sollicitudin velit. Vestibulum rhoncus, justo laoreet varius ornare, nibh justo lacinia velit, at suscipit magna ex at tortor. Ut sed sollicitudin leo, non convallis arcu. Nunc sed vulputate sapien, sed scelerisque dui. Sed varius ornare ex at dictum. Etiam consequat dui quis purus laoreet mollis. Phasellus nisl mi, suscipit at fringilla vel, elementum vitae tellus. Praesent tempus rhoncus orci ut tristique. Vivamus ultrices facilisis tortor, mollis auctor quam finibus eu.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Phasellus eleifend nisi laoreet, interdum erat ut, consequat erat. Proin eleifend non nulla eget dapibus. Ut ullamcorper augue at eros iaculis, id eleifend ligula laoreet. Quisque condimentum lacus et arcu fringilla, sed mattis ligula aliquet. Nulla facilisi. Praesent sagittis tellus quis varius ullamcorper. Pellentesque lacinia porta varius. Pellentesque a viverra massa. Integer at ornare diam. Aliquam ultricies scelerisque nibh vitae bibendum. Sed ac mauris dictum, suscipit mauris vitae, consectetur leo. Ut ut odio purus. Vestibulum felis leo, mollis congue leo ac, imperdiet elementum lacus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Integer quis neque eget eros accumsan iaculis quis id eros. Ut sollicitudin dui sem, vel elementum neque auctor in. Duis euismod velit eget leo euismod maximus. Mauris vitae tortor id sem tincidunt consectetur vel id orci. Aenean sodales luctus nisi, sed euismod velit auctor ac. Morbi rutrum magna ut lectus luctus sodales semper eget sapien. Nam egestas tellus condimentum enim scelerisque tempus vel eu massa. Morbi bibendum mi leo, id rutrum sem accumsan a. Donec pulvinar tellus non ligula laoreet lobortis. Nullam ac iaculis felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus dignissim faucibus consequat. Donec sodales bibendum mauris id aliquet. Maecenas et lorem quis dui tincidunt tempor eget nec neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sed nunc vel urna tempor iaculis vitae a nibh.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam erat volutpat. Etiam egestas, turpis vitae sollicitudin ultrices, tellus felis tempus ipsum, et porttitor est neque auctor mauris. Proin auctor, orci id venenatis cursus, tellus eros accumsan est, sed interdum mauris felis et nisi. Proin efficitur ac est blandit fringilla. Sed efficitur elit est, a lacinia eros blandit nec. Nullam vitae orci ex. Suspendisse potenti. Nam vestibulum nunc sapien, eu dapibus odio sodales eget. Ut mattis elit a dui laoreet, id sollicitudin ipsum dapibus. Vivamus luctus nisl orci, nec luctus orci pulvinar ac. Fusce facilisis in nulla eu sagittis. Sed at condimentum erat, at interdum neque. Aliquam viverra ante et nisl tempus, ut pulvinar ipsum congue. Duis erat est, gravida eu venenatis vitae, tincidunt quis dui. In hac habitasse platea dictumst.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;In facilisis porta elementum. Nam vitae fringilla magna. Mauris eget tortor eu sem consectetur accumsan. Quisque et leo ut libero condimentum iaculis. Donec pellentesque luctus ornare. Donec in ullamcorper risus, at ornare augue. Aliquam ornare finibus tortor.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Suspendisse eget feugiat enim, quis tristique leo. Aenean in feugiat ex, quis porta elit. Fusce volutpat et nulla eu suscipit. Nam justo est, facilisis lobortis tempor a, rutrum vel orci. Pellentesque suscipit, justo quis mollis ullamcorper, neque velit varius ligula, non ultrices lacus felis ut odio. Duis elementum leo et dui aliquam tempus. Praesent ornare ipsum pellentesque, consequat nibh id, hendrerit leo. In in justo auctor, maximus odio a, placerat ex. Fusce porta massa at libero luctus dapibus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque diam quam, semper non odio at, dictum efficitur lorem. Donec at cursus purus. Aenean diam tellus, efficitur quis mollis in, commodo at elit. Sed mi lorem, feugiat porttitor mauris nec, convallis eleifend metus. Quisque vitae ex nec ligula consequat viverra a eu quam. Duis placerat justo quam, vel malesuada diam sodales sit amet. Suspendisse nibh urna, vehicula et dapibus id, fermentum mollis sapien. Integer vel egestas orci, id tempor metus. In ut metus vitae felis volutpat dapibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut eu vestibulum lacus. Pellentesque in eros suscipit, lacinia ex ut, convallis enim.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Ut vitae tortor non nulla consectetur placerat. Nulla in orci blandit, vehicula nisi ut, dictum ante. Aliquam viverra magna nec lacus porttitor vestibulum. Maecenas maximus hendrerit porta. Vivamus leo lacus, lacinia id egestas nec, scelerisque ut ante. Sed mauris ligula, rutrum vitae ullamcorper eu, pretium id lorem. In tincidunt semper sapien. Suspendisse placerat aliquam aliquet. Maecenas varius nunc dui, eget varius nisl dapibus id. Mauris in diam sed magna facilisis luctus ac sed enim. Vestibulum iaculis mollis sollicitudin. Morbi laoreet, diam vel congue tincidunt, ligula ante interdum turpis, quis sagittis nisi enim eget erat.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Sed fermentum, neque ut viverra interdum, orci enim tincidunt felis, eget facilisis est arcu vitae est. Maecenas ornare gravida leo sed accumsan. Praesent pellentesque ultrices nunc non imperdiet. Phasellus id augue lectus. Sed lobortis rutrum ultrices. Nam ultricies at justo id pharetra. Etiam convallis euismod porta. Phasellus at nisl nec tellus consequat tincidunt. Etiam at dolor quis ipsum efficitur efficitur. Suspendisse potenti. Duis sit amet sodales erat. Nulla facilisi. Nunc nec nunc consectetur, vulputate eros eget, rhoncus massa. Curabitur pretium nisi nec metus suscipit, eget dignissim urna scelerisque.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Vestibulum laoreet risus ut ultricies varius. Duis vulputate ac erat eget consequat. Nulla sagittis erat ut nibh facilisis viverra. Sed condimentum eu est quis laoreet. Donec malesuada massa et consectetur sodales. Donec faucibus, augue a tempor congue, lectus ligula porta nisl, non sodales lorem enim vel dolor. Nulla ultricies dignissim ipsum id finibus. Quisque pharetra augue et risus rutrum, non ultrices enim consequat. Nunc vel libero sem. Etiam dictum vulputate eros ut dapibus. Morbi id tristique sem. Morbi bibendum vestibulum ullamcorper.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Duis ut efficitur eros. Etiam lobortis sollicitudin est, consectetur gravida arcu malesuada non. Suspendisse dapibus quam id erat tristique, ac convallis lectus porttitor. Morbi vel felis enim. Sed ligula ex, aliquet vel accumsan vel, varius sit amet elit. Sed sit amet ornare enim. Curabitur sed ex neque. Aliquam feugiat, massa ac placerat ornare, tortor lectus dignissim nisi, ac varius nisl felis ut orci. Curabitur non leo vehicula, sagittis nunc in, fringilla lacus. Sed varius urna et ante euismod malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin tellus diam, porttitor vehicula imperdiet vitae, luctus sed nisi. In volutpat suscipit rhoncus. Morbi laoreet volutpat varius. Nam quam eros, dictum ac pulvinar non, porta ac nibh.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aenean eget diam non felis sagittis luctus. Pellentesque ac quam massa. In laoreet, libero at pharetra sagittis, mauris elit tempor nulla, id viverra lorem sapien at diam. Nunc vitae purus eget diam ullamcorper tempus. Praesent vel massa neque. Mauris vel magna sed est luctus pretium. Praesent vel arcu leo. Etiam eget nisi accumsan, lacinia turpis ac, condimentum arcu. Sed sed nulla eget ante blandit aliquam vitae eget purus. Phasellus est ipsum, tempus id pharetra eleifend, ullamcorper non ipsum. Curabitur gravida felis in libero cursus accumsan. Nullam id urna interdum neque suscipit vulputate. Cras a pretium nisl. Nam gravida lacus leo, eget viverra turpis tincidunt ut. Ut semper, leo non imperdiet laoreet, risus augue convallis lectus, ac sagittis justo nunc id tellus. Morbi at nibh eget lorem ultricies pharetra sed eu dolor.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nullam odio lacus, blandit a tempus sit amet, porttitor vestibulum arcu. Nulla viverra ullamcorper massa non sollicitudin. Cras sed arcu vel sem imperdiet scelerisque vel et felis. Mauris condimentum risus semper nisl placerat, rutrum vestibulum sem molestie. Donec dapibus nibh sit amet maximus aliquam. Integer facilisis nisi lectus, at ultrices justo sodales id. Pellentesque eleifend vestibulum molestie. Proin commodo dapibus cursus. Pellentesque at turpis sit amet arcu hendrerit feugiat.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam eu suscipit ligula, ac porta lectus. Sed molestie nisl ante, ut tempus dolor finibus non. Sed bibendum urna at dolor placerat, at accumsan odio scelerisque. Nullam ullamcorper purus a turpis lacinia faucibus. Suspendisse sit amet nulla lacus. Nunc malesuada lacus sit amet dolor elementum, sit amet faucibus nunc ultricies. Pellentesque ornare congue sem a commodo. Quisque ante leo, vehicula vitae rutrum vel, hendrerit at tellus. Sed eu lacinia diam. Sed non semper turpis. Cras in faucibus sem, egestas ornare ligula. Integer facilisis accumsan imperdiet.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nam elementum dui eu ligula molestie dignissim. Vestibulum auctor, enim nec blandit mollis, leo lorem cursus odio, a consequat augue tellus in sapien. Ut ut lobortis est. Suspendisse auctor orci sit amet libero gravida, ac malesuada magna ultrices. Nulla facilisi. Vivamus cursus purus vitae facilisis tempus. Praesent sed quam eget neque finibus posuere.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Pellentesque dignissim mollis sem, ac faucibus lacus accumsan sed. Suspendisse eu maximus augue. Sed iaculis congue tempus. Fusce et tincidunt ipsum. Nam leo quam, egestas sagittis magna a, pellentesque imperdiet justo. Sed laoreet fringilla eleifend. Phasellus semper hendrerit interdum. Etiam interdum velit at ornare sodales. Duis placerat posuere dictum. Nulla bibendum elementum risus ut finibus. Nullam volutpat nisl eget mi ornare tempus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Suspendisse diam tortor, vulputate eu ligula et, viverra dapibus eros. Curabitur quis lacus at massa dictum dictum eu sit amet erat. In ac sem maximus, maximus justo ut, fermentum arcu. Etiam a lorem felis. Quisque auctor nisi vitae diam eleifend pharetra. Donec id diam nunc. Fusce magna est, rutrum vitae justo id, imperdiet congue dui. Cras facilisis, lectus vitae tempus convallis, eros ipsum ultricies elit, sed finibus nisi augue vel lectus. Sed quis ipsum non velit hendrerit interdum nec iaculis urna. Praesent euismod accumsan vestibulum. Maecenas molestie, urna ut blandit ultrices, justo risus rhoncus velit, sit amet ornare neque metus eget libero. Sed felis elit, viverra id metus eget, posuere eleifend diam. Quisque ultrices orci lectus, ac convallis odio blandit ac. Nulla tempor id tortor vitae dictum. Donec nec turpis nisl. Maecenas sodales augue eu odio fringilla dictum.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nunc nisl dolor, viverra vitae porttitor et, vestibulum eu augue. Praesent ultrices scelerisque lacus vitae viverra. Integer tincidunt feugiat urna, sit amet mollis nisl sodales ac. Sed viverra elit vel justo luctus, non rhoncus purus semper. Nullam molestie lorem diam, quis venenatis dui pretium eget. Suspendisse malesuada orci fermentum efficitur elementum. Curabitur euismod urna augue, eget scelerisque justo fringilla quis. In sapien diam, venenatis quis dapibus ut, venenatis sed lacus. Phasellus non pellentesque tortor. Proin consequat sollicitudin enim, ut fermentum ligula imperdiet et. Phasellus vitae quam dui.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Curabitur dapibus ex id nisl pulvinar, sit amet ullamcorper turpis cursus. Cras semper vehicula nisi tempor viverra. Donec posuere sapien at porta varius. Nunc hendrerit justo arcu, commodo bibendum arcu sodales quis. Mauris pharetra efficitur arcu, vel auctor lorem. Suspendisse ut ipsum orci. Nunc vel vulputate nulla, sit amet bibendum purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis justo turpis, mollis et metus id, pulvinar ullamcorper libero. Quisque ullamcorper varius neque eget fringilla. Fusce enim mauris, feugiat a luctus at, commodo eu elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nunc congue posuere arcu, sit amet porttitor ligula blandit vel. Duis suscipit elit a risus luctus egestas. Vivamus id viverra metus, vitae pharetra nisl. Vivamus arcu sem, sodales quis ex ut, lobortis commodo velit. Curabitur bibendum dui semper eros accumsan fringilla. Ut pretium ultricies sodales. Quisque in lacinia mauris. Nulla tempus id nibh euismod elementum. Nam pretium, mi quis pulvinar porta, est elit sagittis est, et egestas velit sapien a ante. Pellentesque mollis arcu tortor, eget congue quam maximus id. Sed ac magna diam. Cras convallis arcu leo, non porta ex accumsan in. Donec elementum dolor id sodales faucibus. Donec vehicula eget mauris quis condimentum. Proin quis fringilla metus, eget ultrices urna. Aenean sollicitudin et justo at sagittis.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque id egestas odio, in consectetur ex. Duis eu vehicula tellus. Nulla quis semper erat. Morbi non aliquam leo. Fusce eleifend turpis nec dolor bibendum, vel ornare leo blandit. Cras sit amet metus libero. Quisque volutpat sem vel lectus pharetra tristique. Fusce blandit ultrices luctus. Sed dignissim, ipsum sit amet consectetur consequat, risus dolor rhoncus massa, et pulvinar sem ante et augue. Donec a orci sed ligula bibendum tempor in fringilla mi. Nunc malesuada laoreet volutpat. Nam finibus imperdiet mauris, a facilisis odio. Aenean a efficitur sapien, eget tincidunt nisl. Mauris luctus risus a bibendum vestibulum.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Pellentesque efficitur magna a lorem posuere, eget dapibus est rhoncus. Nulla feugiat ante dui, at ultricies mauris euismod quis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus elementum auctor eros eu tempor. Phasellus mi ligula, tincidunt suscipit urna non, mattis tempor magna. Suspendisse rhoncus sapien at tellus imperdiet varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. In quis posuere augue, non elementum ligula. Aenean neque dui, bibendum quis nisl in, tristique laoreet tortor. Nullam sodales lobortis odio accumsan scelerisque. Aliquam tempor, nunc blandit efficitur pellentesque, ante magna porta urna, quis vulputate augue orci sit amet orci. Nullam sodales nisi ut nunc iaculis commodo.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam arcu turpis, sollicitudin eu posuere a, placerat vel justo. Duis porttitor ut neque elementum suscipit. Vestibulum et arcu venenatis, interdum tellus ac, mollis purus. Aliquam at turpis augue. In faucibus orci lacinia, hendrerit sapien a, consequat enim. Sed commodo ex aliquet massa sagittis aliquam. Nam pellentesque sem et pulvinar porttitor. Quisque enim massa, accumsan ut finibus in, consequat nec enim. Fusce id velit lectus. Phasellus ac urna ex. Quisque pellentesque enim nec eros sodales finibus. Suspendisse ut venenatis mauris.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Donec placerat ante augue, sit amet dapibus risus fringilla ac. Aenean quis fringilla erat. In faucibus a ex ut iaculis. In vulputate, est eu eleifend tincidunt, dolor nisi tempor libero, in imperdiet dui est in nibh. Quisque volutpat id nisi in lobortis. Suspendisse potenti. Curabitur pretium, nisl sit amet blandit sodales, diam enim iaculis risus, ut tincidunt risus magna nec lectus. Suspendisse in sapien quam. Aenean quis elit erat. Vestibulum tortor magna, venenatis nec rhoncus nec, laoreet quis nulla. Fusce diam ex, eleifend nec dolor quis, pulvinar tempus arcu.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nam tempus consectetur velit non condimentum. Donec volutpat mi in leo ullamcorper, eget pulvinar libero tristique. In fringilla sem et ante ultrices fringilla ac eget neque. Etiam iaculis ut ante eget hendrerit. Praesent sed nisi tortor. Sed ex justo, sollicitudin a magna ac, mollis sodales leo. Pellentesque vitae turpis sed purus cursus placerat non vel ligula. Nunc ultricies, dolor at congue auctor, libero elit vestibulum ligula, id pretium justo mi in sapien. Integer luctus, leo ut posuere consectetur, lectus risus convallis ante, in lobortis velit eros nec libero. Vestibulum laoreet dui ut massa mattis posuere. Cras porta bibendum justo quis eleifend. Sed nisi enim, interdum eu quam ac, volutpat lacinia dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus dolor erat, tempus sodales pulvinar sed, feugiat vel purus. Nullam pellentesque neque non ullamcorper posuere.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nulla auctor ac magna ut malesuada. Vivamus tempor turpis eget accumsan suscipit. Vestibulum ut massa quam. Phasellus condimentum enim libero, eget hendrerit turpis faucibus et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam arcu nibh, pretium ac condimentum vel, dignissim non ligula. Integer vulputate congue placerat. Mauris tempor velit sed fringilla volutpat. Aliquam erat volutpat. In hac habitasse platea dictumst. Pellentesque pretium lectus lectus, id scelerisque nisl suscipit mattis.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Donec bibendum luctus risus, eget sodales tortor tincidunt non. Pellentesque suscipit facilisis volutpat. Etiam varius feugiat tortor tempor luctus. In et finibus turpis, et molestie enim. Nunc hendrerit nec augue sit amet pellentesque. Suspendisse ornare felis ac porttitor tincidunt. Praesent ut leo ac purus accumsan elementum. Sed vitae nisi mollis, volutpat nunc eu, tristique nunc. Sed ac auctor sapien. Vivamus eu mollis eros, id condimentum lorem. Nulla eleifend mattis ligula, at egestas elit semper eget. Nam nec tellus sed sapien ultricies tincidunt. Nunc at ipsum sollicitudin, fringilla magna dictum, sollicitudin nulla. Nunc quis faucibus justo, et sagittis neque.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Curabitur id eros mauris. Aenean accumsan eros eu pretium accumsan. Etiam ut aliquam turpis. Vivamus viverra urna leo. Morbi ut orci suscipit, hendrerit leo ac, consectetur enim. Donec sem turpis, rutrum vitae interdum sed, venenatis vel diam. Sed fermentum id justo vel venenatis.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nam in luctus arcu. Pellentesque sollicitudin, purus sit amet suscipit cursus, nibh enim pretium metus, id tempor metus leo ut nisi. Maecenas eget commodo velit, eu sagittis ipsum. Vivamus faucibus sagittis leo ac finibus. Sed sapien tortor, malesuada ac leo ac, lobortis laoreet metus. Suspendisse auctor est vitae quam iaculis bibendum. Fusce hendrerit nisi sed tincidunt maximus. Praesent id bibendum nisi. Pellentesque arcu magna, tincidunt id magna in, volutpat aliquam orci. Duis ac ullamcorper diam, in fringilla erat. Proin nunc ex, tempor eget eros eget, gravida bibendum tortor.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Cras at purus eu justo commodo molestie. Cras eget felis nec nisl fermentum maximus eget id ipsum. Fusce venenatis mattis justo, ut elementum mi. Etiam pretium nec diam eu imperdiet. Donec cursus lobortis est, eget vulputate ante porttitor sit amet. Vestibulum venenatis dignissim tortor nec elementum. Donec lacinia aliquet turpis, eu aliquam lectus vehicula ut. Nunc fermentum gravida ultricies.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Pellentesque vitae lacus mollis, accumsan mi quis, tincidunt lectus. Duis ultricies magna in lacus condimentum, at aliquam mi eleifend. Phasellus nec venenatis sem, eu imperdiet nibh. Sed accumsan elit maximus lacinia molestie. Etiam quis lorem in mi placerat maximus. In hac habitasse platea dictumst. Vestibulum vulputate auctor sem sed semper. Pellentesque suscipit erat sed velit varius, sit amet tincidunt dui dignissim. Etiam sit amet felis eu felis lacinia porttitor quis sed tellus. Aliquam erat volutpat. Suspendisse nec erat purus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aenean faucibus commodo sagittis. Praesent porttitor arcu diam, vel mattis lectus malesuada vel. Quisque ex erat, sagittis consectetur rutrum nec, commodo eu odio. In in est ut nunc faucibus posuere vel elementum arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis pellentesque tellus quis lorem euismod, sollicitudin vehicula felis posuere. Mauris eros est, faucibus sed cursus vel, aliquam ut nisl. Fusce hendrerit blandit quam, eu sodales lorem aliquet sed. Vestibulum ut tincidunt erat. Vivamus posuere consequat tincidunt.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nullam tempor faucibus est ultricies varius. Nullam sit amet erat sodales, varius ipsum a, fermentum eros. Quisque dictum, sem quis viverra pretium, felis eros sodales nisl, et consectetur eros urna ultricies mauris. Aenean ante lorem, facilisis id tincidunt nec, euismod porttitor leo. Sed sit amet purus aliquam, eleifend massa eu, ultricies massa. Vivamus dapibus dictum vehicula. Aliquam nec arcu ac nunc dapibus aliquam. In facilisis justo turpis, in vestibulum velit efficitur in. Vestibulum sed lorem elit. Sed laoreet lorem sapien, id placerat nisi fringilla non. Donec nec enim tempus risus mattis posuere sed sed erat. Ut lobortis quam ligula, id ultrices massa aliquam at. Etiam aliquet consequat enim, sed commodo nisi pharetra id. Quisque vitae bibendum augue, gravida efficitur velit. Praesent nibh massa, volutpat ac accumsan et, fringilla vitae magna.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Praesent fermentum at nisi sit amet eleifend. Sed eu nisl ullamcorper, molestie erat id, tristique arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc convallis, ipsum vitae varius scelerisque, libero tortor cursus nisi, sed lobortis ex nunc nec nibh. Aenean porta commodo rutrum. Phasellus nec eleifend ipsum, sed egestas magna. Vestibulum id tincidunt elit. Sed vulputate, arcu nec volutpat dignissim, ante libero ultrices mauris, at interdum ex quam nec mi. Suspendisse lacinia ipsum id finibus interdum. Maecenas et eros tincidunt, feugiat mauris a, ultrices odio.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Vestibulum fringilla vel est vitae accumsan. Pellentesque nec nunc pellentesque mauris tincidunt mollis in eget magna. Duis egestas sit amet orci vel bibendum. Duis blandit, massa et scelerisque mattis, orci tortor sagittis ante, in imperdiet dolor nulla finibus justo. Nam ornare elit nec lacus sodales porttitor quis non erat. Nulla sed urna pellentesque, efficitur eros in, pharetra massa. Pellentesque in massa bibendum, ultrices quam at, lacinia purus. Nullam purus nibh, eleifend et mi quis, facilisis elementum ligula. Vivamus ultricies ipsum at mauris mollis, eu consectetur sapien consequat. Nullam consectetur mi mauris, sit amet viverra metus pellentesque lacinia. Ut vel magna vitae sapien interdum porttitor. Etiam vestibulum, ante vestibulum congue hendrerit, risus tellus mollis ipsum, non hendrerit lacus ligula non arcu. Aenean consequat magna turpis, eu tristique libero semper sit amet.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Sed ante elit, vulputate vitae lobortis quis, varius ac lacus. Curabitur felis ante, dictum tincidunt nibh id, condimentum tincidunt tellus. Integer suscipit rhoncus augue quis efficitur. Mauris malesuada laoreet ultrices. Praesent eu augue porttitor, semper enim vitae, varius eros. Sed lobortis elit eros, vel condimentum massa consequat id. Integer sed tincidunt tortor, eu consequat odio. Nunc orci metus, porttitor non enim quis, sollicitudin porttitor libero.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam ac suscipit ex, ut tincidunt nunc. Curabitur finibus lacus vehicula, tempus libero nec, maximus felis. Curabitur aliquam molestie congue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus lobortis urna in augue varius, eget auctor ipsum scelerisque. Nam interdum augue enim, quis imperdiet nunc egestas non. Donec sed metus sit amet nulla porta convallis scelerisque in risus.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Praesent justo metus, consequat in vestibulum eget, laoreet non leo. Quisque commodo dapibus dui, sed tincidunt sem semper at. In neque lectus, maximus ut lectus et, tempus placerat sapien. Integer ultrices consequat augue, vitae pulvinar leo egestas non. Suspendisse suscipit mi cursus, aliquet felis id, pretium ipsum. Curabitur imperdiet diam quis purus scelerisque tincidunt. Quisque sed quam sit amet nulla commodo posuere eu ac justo.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Aliquam rutrum justo hendrerit laoreet pellentesque. Nunc et elit quis justo ornare placerat eu eu libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit arcu, luctus non enim non, maximus luctus sapien. Phasellus sit amet augue maximus, placerat sem at, pellentesque libero. Quisque in porta sapien.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Cras gravida dui eget est consequat venenatis. Duis felis eros, finibus sit amet volutpat elementum, dictum id nibh. Praesent quis suscipit dolor. Nullam at dui lorem. Donec aliquet nibh nec dolor lobortis faucibus. Pellentesque varius auctor nisi eget mattis. Donec eleifend, leo vitae maximus ultrices, neque lorem posuere ex, ac fermentum eros mauris in sapien. Sed ultricies hendrerit dapibus. Nunc a sapien dui. In luctus eget arcu eget elementum. Quisque eleifend auctor ipsum, eget pulvinar lectus dignissim sit amet. Morbi commodo quis urna luctus pharetra. Suspendisse tortor massa, tempus quis quam eu, lobortis congue nunc. In sed erat aliquam, aliquam enim et, lobortis augue. Vestibulum cursus semper erat, in hendrerit risus imperdiet ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nullam lacinia magna vitae elit finibus, et ultrices ex dapibus. In consectetur vehicula erat, sit amet ullamcorper libero aliquet vel. Vestibulum nunc lacus, aliquet eget felis eget, aliquet porta purus. Curabitur quis finibus nulla. Cras non metus vitae augue ultricies scelerisque sed ac neque. Nam sed luctus dui. Vestibulum elementum dolor at euismod volutpat. Nullam massa nisi, laoreet eu auctor id, fringilla et mi. Nam et ullamcorper odio. Proin at sem id odio tincidunt fermentum. Vivamus blandit auctor odio convallis sodales. Vivamus at sodales mauris, luctus ultrices metus. Proin iaculis dictum arcu. Maecenas id nunc libero.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque nec nulla non turpis bibendum fermentum. Cras congue ut dolor ac malesuada. Nulla ante mi, viverra at lacinia vitae, ullamcorper id ligula. Pellentesque pharetra ante vel lectus semper, ut blandit turpis mollis. Donec varius vehicula lectus, vitae aliquet ipsum tristique nec. Maecenas at tincidunt purus. Donec viverra dapibus risus ac laoreet. Sed quis libero sollicitudin, vestibulum nunc vitae, egestas nunc. Curabitur tincidunt condimentum pulvinar. Donec nec orci scelerisque, hendrerit elit quis, mollis eros. Phasellus convallis augue sed tempor pharetra. In hac habitasse platea dictumst. Duis ut aliquet est. Nullam fermentum, diam euismod ullamcorper imperdiet, metus sem mollis lacus, et molestie tellus mauris id eros. Mauris et massa vitae sem facilisis egestas. Curabitur venenatis quam sollicitudin justo rhoncus, iaculis tincidunt purus lacinia.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Praesent quis venenatis orci. Mauris posuere a nisi at mattis. Donec eget tristique massa. Nullam feugiat massa id sapien dapibus, sit amet congue ligula blandit. Nullam venenatis a nulla ut lobortis. Quisque condimentum finibus augue, eu faucibus felis posuere at. Vestibulum odio diam, fermentum et ornare et, laoreet vitae elit. Nunc dictum quis lectus vitae placerat. Aliquam nec suscipit leo, ut consectetur nisl. Mauris tempor, neque nec bibendum consequat, arcu erat semper purus, et egestas odio justo eu metus. Etiam vestibulum iaculis justo.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Sed orci ante, laoreet id ultricies eu, ornare at lacus. Etiam a volutpat libero, et lobortis ante. Aliquam aliquam eleifend dui non hendrerit. Mauris non nulla eget lorem tincidunt porttitor et eu magna. Mauris varius magna ante, vel iaculis quam vehicula non. Vivamus laoreet, libero et dictum elementum, augue urna dapibus lorem, nec ultrices elit ipsum sed dui. Aliquam pretium sed tellus non malesuada. Nullam quis diam eros. Donec ac lobortis ipsum. Curabitur ut maximus felis. Curabitur in nisi ut leo ultricies convallis.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Maecenas eget dui purus. Maecenas rutrum interdum felis. Sed ac nisl lacinia, placerat erat ut, scelerisque velit. Nunc pellentesque, ante a semper dictum, erat elit varius diam, vel aliquam erat leo sed nulla. Fusce efficitur augue cursus, luctus diam id, euismod ex. Nulla et sapien iaculis, ullamcorper purus at, placerat massa. Aliquam erat volutpat. Maecenas neque erat, consectetur sed laoreet sit amet, malesuada ut ante. Maecenas vehicula malesuada tincidunt. Vivamus vulputate sem vel egestas dignissim. Etiam et tincidunt orci. Maecenas eu interdum ex, nec consequat lacus. Phasellus arcu quam, posuere et maximus et, consequat sit amet ligula. Phasellus ornare neque non turpis hendrerit, vel faucibus turpis rutrum. Praesent tempus sapien commodo nibh interdum, vel convallis mauris elementum.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Mauris id leo finibus, lobortis nunc et, ultricies orci. Duis congue aliquet volutpat. Morbi molestie, nunc a vulputate gravida, nunc elit congue elit, ut auctor dui erat vitae est. Quisque sed nulla vel est maximus mollis. Praesent tincidunt fringilla tellus, non ultrices mi pellentesque sed. Pellentesque arcu sapien, pulvinar vel tortor ac, cursus mollis nulla. Etiam euismod est at orci mollis sollicitudin. Proin vehicula leo dolor, nec iaculis ipsum dapibus in. Proin libero felis, tincidunt a purus placerat, congue lacinia quam. Pellentesque maximus quam vitae eros suscipit, in euismod elit condimentum.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nunc et neque nec erat volutpat maximus eget et neque. Nam venenatis, mauris vitae lacinia vehicula, nisi odio aliquam ex, lacinia convallis leo libero a dolor. Vestibulum rhoncus ultricies diam sit amet lobortis. Nullam iaculis lectus at hendrerit semper. Pellentesque quam libero, fringilla nec posuere vel, imperdiet ac eros. Vestibulum eget tincidunt quam, non congue mauris. Nam ac lacus velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla volutpat interdum magna, vel semper mi faucibus sed. Nullam pharetra sollicitudin libero, blandit interdum justo ullamcorper vitae. Duis est augue, dignissim quis tincidunt a, auctor ac augue. Curabitur porttitor mauris et enim tincidunt, id consectetur tellus convallis. Mauris iaculis congue porta. Sed eget nulla cursus, vestibulum dolor sit amet, ullamcorper mauris. Phasellus lacinia tellus at ex lacinia, vitae ultrices arcu malesuada.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Donec in rutrum nulla. Maecenas id commodo purus. Nulla pretium interdum dolor sit amet consectetur. Aenean eget volutpat magna, ut iaculis massa. Duis finibus tristique velit ut convallis. Vivamus vel commodo lacus. Mauris iaculis, metus eget eleifend consectetur, dui augue rutrum sem, a semper nunc justo a magna. Praesent luctus tellus ac justo aliquet tristique. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus gravida quis tortor eget tincidunt. Nulla viverra laoreet dolor in vestibulum. Praesent vitae quam ligula. In eget metus eget mi lobortis scelerisque. Vestibulum nec nibh vel ante rhoncus molestie. Sed scelerisque sit amet felis sit amet pharetra.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Fusce dapibus fermentum dui eu sodales. Morbi sed urna non dui fermentum scelerisque. Morbi elementum accumsan dui, ut blandit erat. Nullam gravida gravida ligula. Duis at dignissim enim. Etiam quis laoreet ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum a dictum dolor, ut aliquam magna. Sed non commodo massa. Aenean sapien nulla, tincidunt tempus nisl non, posuere commodo mi. Nunc quis ultrices justo. Curabitur fermentum neque in pharetra aliquam. Quisque nisi ante, convallis at augue ac, ullamcorper efficitur libero. Proin tempus purus vitae tellus blandit tincidunt. Mauris fermentum lobortis diam, eget gravida tortor rutrum non. Curabitur vitae ornare neque.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Duis pretium eros vitae nisi convallis, quis auctor felis porttitor. Curabitur sit amet porttitor turpis. Morbi pretium mauris et nunc semper, sit amet dapibus diam dictum. Proin pellentesque ac est quis commodo. Morbi viverra, dolor vitae tincidunt pretium, lorem lorem luctus nisi, in malesuada sem ante non massa. Praesent aliquam ac lorem at laoreet. Phasellus ullamcorper, ante sit amet elementum ultrices, eros leo elementum quam, eget porttitor nisi odio accumsan nunc. Sed id augue pharetra, pharetra ex id, lacinia metus. Nulla eu odio enim. Sed eleifend tempus tempus. Nulla ut bibendum elit. Curabitur elementum arcu et est pharetra, id ornare ante eleifend. Ut vehicula viverra tincidunt. Vivamus eleifend tellus ut vehicula pretium. Aenean placerat elementum dui sit amet sodales.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Curabitur ultricies tortor dui, sed bibendum magna tincidunt a. Aliquam quam justo, rutrum ac dictum a, mattis at ipsum. Ut nisi tellus, elementum sit amet suscipit in, gravida quis justo. Maecenas quis leo non sapien malesuada cursus sit amet in magna. Donec convallis nisi eu posuere blandit. Nam euismod at augue quis tempus. Nunc luctus efficitur dolor, eu cursus libero varius in. Nam porta, magna ac consectetur sagittis, orci tortor porttitor eros, vel tempor urna quam quis nulla.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Pellentesque imperdiet ullamcorper ligula, vel luctus elit congue at. Phasellus vel ullamcorper lorem, in tincidunt eros. Vivamus non enim in sem posuere mollis vitae ut enim. Maecenas euismod metus ac aliquet ornare. Nam tincidunt facilisis condimentum. Suspendisse vel ipsum feugiat, fringilla libero vehicula, consectetur sapien. Donec in quam a mi consectetur rhoncus vel sit amet purus. Morbi eu ligula dignissim leo dictum porttitor nec non eros. In suscipit est sit amet sollicitudin porttitor. Fusce sagittis erat eu vehicula consectetur.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Curabitur iaculis a ex tincidunt tristique. Aliquam porttitor est in ligula ultricies, eu volutpat turpis scelerisque. Donec quis sem eget massa porttitor efficitur. Maecenas dapibus ut sem ut faucibus. Vestibulum rhoncus dolor orci, non varius sem consequat ac. Nullam consectetur ipsum luctus justo molestie euismod. Etiam sed porttitor neque. Nulla facilisi. Nam eu massa eu felis faucibus bibendum vel semper nunc. Vestibulum venenatis posuere dui, sit amet volutpat odio ultrices a. Proin dignissim quam a mollis aliquam. Phasellus rutrum nec arcu in tristique. In posuere condimentum iaculis. Donec hendrerit, diam quis iaculis pulvinar, nulla enim iaculis urna, ut posuere quam sapien vestibulum velit. Nullam posuere nibh augue, quis ullamcorper orci condimentum eget.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Nunc vel massa et metus ornare rutrum. Phasellus aliquam turpis eu nulla fermentum, et luctus quam imperdiet. Morbi tincidunt ac felis eu tristique. Maecenas lorem mauris, blandit non nunc ac, tincidunt tristique massa. Donec eu quam id justo porta faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus tortor dui, gravida non lorem quis, consectetur blandit dolor. Suspendisse tellus mauris, luctus in placerat id, pulvinar id nibh. Aenean id rutrum neque. Duis quis enim quis lorem lacinia volutpat et vitae mi. Morbi et ante ornare, elementum tellus vitae, bibendum risus. Praesent sem lectus, auctor non elit ut, bibendum mattis sem.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px;&quot;&gt;Quisque dignissim elit diam, a vehicula augue suscipit eget. Proin porttitor ante nec turpis suscipit vulputate. Pellentesque nec ultrices nulla, id vehicula risus. Morbi lobortis, mi sed sodales eleifend, justo libero mattis nulla, ut lacinia tortor sem et velit. Quisque placerat at eros ut mollis. Nunc condimentum felis lacus, a semper eros varius a. Etiam fringilla odio eget laoreet tristique.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;generated&quot; style=&quot;margin: 0px; padding: 0px; font-weight: bold; font-family: &#039;Open Sans&#039;, Arial, sans-serif; font-size: 14px;&quot;&gt;Generated 100 paragraphs, 9248 words, 62291 bytes of&amp;nbsp;&lt;a style=&quot;margin: 0px; padding: 0px; color: #000000;&quot; title=&quot;Lorem Ipsum&quot; href=&quot;https://www.lipsum.com/&quot;&gt;Lorem Ipsum&lt;/a&gt;&lt;/div&gt;', 'dasdsadsad', 0, 0, 0, 0, 1);
INSERT INTO `activity` (`activityId`, `activityConfigId`, `courseModuleId`, `activityType`, `initialDate`, `horaInicial`, `finalDate`, `modality`, `description`, `resumen`, `requiredActivity`, `ponderation`, `timeLimit`, `noQuestions`, `tries`) VALUES
(7, 0, 1, 'Examen', '2019-08-10', '00:00:00', '2019-08-10 23:59:00', 'Individual', '', 'EXAMEN A', 0, 11, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `activity_config`
--

DROP TABLE IF EXISTS `activity_config`;
CREATE TABLE IF NOT EXISTS `activity_config` (
  `activityConfigId` int(11) NOT NULL AUTO_INCREMENT,
  `courseModuleId` int(11) NOT NULL,
  `subject_moduleId` int(11) NOT NULL,
  `activityType` enum('Lectura','Tarea','Examen','Otro','Foro') NOT NULL,
  `initialDate` date NOT NULL,
  `horaInicial` time NOT NULL,
  `finalDate` datetime NOT NULL,
  `modality` enum('Individual','Por Equipo') NOT NULL,
  `description` mediumtext NOT NULL,
  `resumen` varchar(30) NOT NULL,
  `requiredActivity` int(11) NOT NULL,
  `ponderation` int(3) NOT NULL DEFAULT '0',
  `timeLimit` int(3) NOT NULL,
  `noQuestions` int(2) NOT NULL,
  `tries` int(11) NOT NULL DEFAULT '1',
  `diaInicial` varchar(255) NOT NULL,
  `diaFinal` varchar(255) NOT NULL,
  PRIMARY KEY (`activityConfigId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_config`
--

INSERT INTO `activity_config` (`activityConfigId`, `courseModuleId`, `subject_moduleId`, `activityType`, `initialDate`, `horaInicial`, `finalDate`, `modality`, `description`, `resumen`, `requiredActivity`, `ponderation`, `timeLimit`, `noQuestions`, `tries`, `diaInicial`, `diaFinal`) VALUES
(1, 0, 2, 'Tarea', '0000-00-00', '00:00:00', '0000-00-00 00:00:00', 'Individual', '', 'ACTIVIDAD A', 0, 20, 0, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `activity_score`
--

DROP TABLE IF EXISTS `activity_score`;
CREATE TABLE IF NOT EXISTS `activity_score` (
  `activityScoreId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `ponderation` float(5,2) NOT NULL,
  `try` int(11) NOT NULL DEFAULT '0',
  `retro` mediumtext NOT NULL,
  `rutaArchivoRetro` varchar(255) NOT NULL,
  PRIMARY KEY (`activityScoreId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity_test`
--

DROP TABLE IF EXISTS `activity_test`;
CREATE TABLE IF NOT EXISTS `activity_test` (
  `testId` int(11) NOT NULL AUTO_INCREMENT,
  `activityId` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `opcionA` mediumtext NOT NULL,
  `opcionB` mediumtext NOT NULL,
  `opcionC` mediumtext NOT NULL,
  `opcionD` mediumtext NOT NULL,
  `opcionE` mediumtext NOT NULL,
  `answer` enum('opcionA','opcionB','opcionC','opcionD','opcionE') NOT NULL DEFAULT 'opcionA',
  PRIMARY KEY (`testId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_test`
--

INSERT INTO `activity_test` (`testId`, `activityId`, `question`, `opcionA`, `opcionB`, `opcionC`, `opcionD`, `opcionE`, `answer`) VALUES
(1, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', ''),
(2, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', ''),
(3, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', ''),
(4, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', ''),
(5, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', ''),
(6, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', ''),
(7, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', ''),
(8, 7, 'Haz tu Pregunta', 'Cambiar Opcion A', 'Cambiar Opcion B', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `alumnoshistorial`
--

DROP TABLE IF EXISTS `alumnoshistorial`;
CREATE TABLE IF NOT EXISTS `alumnoshistorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(20) NOT NULL,
  `clavenivel` varchar(100) NOT NULL,
  `nombrenivel` varchar(255) NOT NULL,
  `gradogrupo` varchar(100) NOT NULL,
  `ciclo` varchar(10) NOT NULL,
  `becapesos` decimal(12,2) NOT NULL,
  `becaporcentaje` decimal(12,2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `fechainiciopagos` date NOT NULL,
  `infocambio` varchar(255) DEFAULT NULL,
  `activado` smallint(6) NOT NULL,
  `idplan` int(11) NOT NULL,
  `idespecialidad` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL DEFAULT 'admin',
  `fechacreacion` date DEFAULT NULL,
  `usuariomodificacion` varchar(50) DEFAULT NULL,
  `fechamodificacion` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `fechastatus` date DEFAULT NULL,
  `observaciones` mediumtext,
  `numPagos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `announcementId` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `courseModuleId` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `personalId` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`announcementId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcementId`, `courseId`, `courseModuleId`, `title`, `date`, `personalId`, `description`) VALUES
(1, 1, 1, 'AVISO A', '2019-08-10 11:58:43', 1, '&lt;p&gt;TEST&lt;/p&gt;'),
(2, 1, 2, 'AVISO DE MATERIA', '2019-08-10 15:48:36', 200, '&lt;p&gt;UN AVISO DE MATERIA&lt;/p&gt;'),
(3, 0, 0, 'NOTICIA GENERAL', '2019-08-10 15:57:19', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `automovilprofesor`
--

DROP TABLE IF EXISTS `automovilprofesor`;
CREATE TABLE IF NOT EXISTS `automovilprofesor` (
  `automovilId` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `placas` varchar(255) NOT NULL,
  `personalId` int(11) NOT NULL,
  PRIMARY KEY (`automovilId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bancoprofesor`
--

DROP TABLE IF EXISTS `bancoprofesor`;
CREATE TABLE IF NOT EXISTS `bancoprofesor` (
  `bancoprofesorId` int(11) NOT NULL AUTO_INCREMENT,
  `nombreBanco` varchar(255) NOT NULL,
  `numCuenta` varchar(255) NOT NULL,
  `claveInterbancaria` varchar(255) NOT NULL,
  `sucursal` varchar(255) NOT NULL,
  `numeroPlaza` varchar(255) NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `personalId` int(11) NOT NULL,
  PRIMARY KEY (`bancoprofesorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `bankId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`bankId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

DROP TABLE IF EXISTS `bank_account`;
CREATE TABLE IF NOT EXISTS `bank_account` (
  `bank_accountId` int(11) NOT NULL AUTO_INCREMENT,
  `numCuenta` varchar(255) NOT NULL,
  `bankId` int(11) NOT NULL,
  PRIMARY KEY (`bank_accountId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cancel_code`
--

DROP TABLE IF EXISTS `cancel_code`;
CREATE TABLE IF NOT EXISTS `cancel_code` (
  `codeId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`codeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cancel_code`
--

INSERT INTO `cancel_code` (`codeId`, `clave`, `name`) VALUES
(1, '01', 'Reprobaci?n'),
(2, '02', 'Deserci?n'),
(3, '03', 'Solic. Inter. (T)'),
(4, '04', 'Solic. Inter. (D)'),
(5, '05', 'Cambio Adscrip.'),
(6, '06', 'Otras');

-- --------------------------------------------------------

--
-- Table structure for table `catalogodocumento`
--

DROP TABLE IF EXISTS `catalogodocumento`;
CREATE TABLE IF NOT EXISTS `catalogodocumento` (
  `catalogodocumentoId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `estatus` enum('activo','eliminado') NOT NULL,
  PRIMARY KEY (`catalogodocumentoId`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogodocumento`
--

INSERT INTO `catalogodocumento` (`catalogodocumentoId`, `nombre`, `descripcion`, `estatus`) VALUES
(10, 'Carta de pago', 'Subir carta de autorización de pago (La pueden descargar en &quot;Información personal&quot; -&gt; &quot;Carta de Pago&quot;)', 'activo'),
(11, 'Currículum Vitae (Actualizado)', 'Mantener siempre Actualizado ', 'activo'),
(12, 'Semblanza Profesional', 'Breve reseña personal para que nosotros realicemos su presentación ante los alumnos', 'activo'),
(13, 'Acta de nacimiento', 'Escaneado a color y vigente 2016 al 2019', 'activo'),
(14, 'Credencial de elector', 'Ambos lados, escaneados en un solo archivo tamaño media carta cada imagen, ambas en una pagina', 'activo'),
(15, 'Cédula Fiscal o RFC', 'Hoja que emite el Sat desde su portal con sus datos fiscales', 'activo'),
(16, 'CURP', 'Actualizado de la página de internet', 'activo'),
(17, 'Comprobante de domicilio', 'Actualizado imagen a color escaneada', 'activo'),
(18, 'Cédula de Grado de Doctor', 'Escaneado ambos lados en una sola pagina a color ', 'activo'),
(19, 'Grado de Doctor', 'Documento escaneado a color ambas caras una por página en una sola hoja', 'activo'),
(20, 'Opinión de Obligaciones Fiscales Positiva', 'Cada vez que sea contratado, tomando en cuenta que tiene una vigencia de 90 días', 'eliminado'),
(21, 'Opinión de Cumplimiento de Obligaciones Fiscales Positiva', 'Cada vez que sea contratado, tomando en cuenta su vigencia de 90 días', 'eliminado'),
(22, 'Título de Licenciatura', '', 'eliminado'),
(23, 'Cédula de Licenciatura', '', 'eliminado'),
(24, 'Cédula de Grado de Maestro', 'Escaneado ambos lados en una sola pagina a color', 'activo'),
(25, 'Grado de Maestro', 'Documento escaneado a color ambas caras una por página en una sola hoja', 'activo'),
(26, 'Cédula de Licenciatura', 'Escaneado ambos lados en una sola pagina a color', 'activo'),
(27, 'Título de Licenciatura', 'Documento escaneado a color ambas caras una por página en una sola hoja', 'activo'),
(28, 'Opinión de Cumplimiento de Obligaciones Fiscales Positiva	', 'Cada vez que sea contratado, tomando en cuenta su vigencia de 90 días', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_pregunta`
--

DROP TABLE IF EXISTS `categoria_pregunta`;
CREATE TABLE IF NOT EXISTS `categoria_pregunta` (
  `categoriapreguntaId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `encuestaId` int(11) NOT NULL,
  PRIMARY KEY (`categoriapreguntaId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_pregunta`
--

INSERT INTO `categoria_pregunta` (`categoriapreguntaId`, `nombre`, `encuestaId`) VALUES
(1, 'Planeacion', 1),
(2, 'Estrategias Didácticas', 1),
(3, 'Comunicación', 1),
(4, 'Evaluación del aprendizaje', 1),
(5, 'Elemento ético o de valores', 1),
(6, 'Material de apoyo', 1),
(7, 'Satisfacción General', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chatId` int(11) NOT NULL AUTO_INCREMENT,
  `yoId` int(11) NOT NULL,
  `quienEnvia` enum('alumno','personal') NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `asunto` mediumtext NOT NULL,
  `mensaje` mediumtext NOT NULL,
  `fechaEnvio` date NOT NULL,
  `courseModuleId` int(11) NOT NULL,
  `estatus` enum('activo','eliminado','borrador') NOT NULL,
  `rutaAdjunto` varchar(255) NOT NULL,
  `favorito` enum('no','si') NOT NULL,
  `leido` enum('no','si') NOT NULL,
  PRIMARY KEY (`chatId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `classroomId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`classroomId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complementoconcepto`
--

DROP TABLE IF EXISTS `complementoconcepto`;
CREATE TABLE IF NOT EXISTS `complementoconcepto` (
  `complementoConceptoId` int(11) NOT NULL AUTO_INCREMENT,
  `conceptoId` int(11) NOT NULL,
  `any` mediumtext NOT NULL,
  PRIMARY KEY (`complementoConceptoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complementoconceptoparte`
--

DROP TABLE IF EXISTS `complementoconceptoparte`;
CREATE TABLE IF NOT EXISTS `complementoconceptoparte` (
  `complementoConceptoParteId` int(11) NOT NULL AUTO_INCREMENT,
  `conceptoId` int(11) NOT NULL,
  `any` mediumtext NOT NULL,
  PRIMARY KEY (`complementoConceptoParteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comprobante`
--

DROP TABLE IF EXISTS `comprobante`;
CREATE TABLE IF NOT EXISTS `comprobante` (
  `comprobanteId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `formaDePago` varchar(255) NOT NULL DEFAULT 'Pago En Una Sola Exhibicion',
  `condicionesDePago` varchar(255) NOT NULL,
  `metodoDePago` varchar(255) NOT NULL,
  `tasaIva` enum('16','11','0','1') NOT NULL DEFAULT '16',
  `tipoDeMoneda` enum('peso','dolar','euro') NOT NULL DEFAULT 'peso',
  `tipoDeCambio` float(20,2) NOT NULL DEFAULT '1.00',
  `porcentajeRetIva` enum('0','4','10','10.666666') NOT NULL DEFAULT '0',
  `porcentajeRetIsr` enum('0','10','10.666666') NOT NULL DEFAULT '0',
  `tiposComprobanteId` int(11) NOT NULL DEFAULT '1',
  `porcentajeIEPS` int(3) NOT NULL DEFAULT '0',
  `porcentajeDescuento` int(3) NOT NULL DEFAULT '0',
  `empresaId` int(11) NOT NULL,
  `sucursalId` int(11) NOT NULL,
  `observaciones` mediumtext,
  `version` varchar(10) NOT NULL DEFAULT '2.0',
  `serie` varchar(10) NOT NULL,
  `folio` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `sello` mediumtext NOT NULL,
  `noAprobacion` int(11) NOT NULL,
  `anoAprobacion` int(4) NOT NULL,
  `noCertificado` varchar(20) NOT NULL,
  `certificado` mediumtext,
  `subTotal` float(20,6) NOT NULL,
  `descuento` float(20,6) DEFAULT NULL,
  `motivoDescuento` mediumtext,
  `total` float(20,6) NOT NULL,
  `tipoDeComprobante` enum('ingreso','egreso','traslado') NOT NULL,
  `cadenaOriginal` mediumtext NOT NULL,
  `xml` mediumtext,
  `rfcId` int(11) NOT NULL DEFAULT '1',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `ivaTotal` float(20,6) NOT NULL,
  `efectoComprobante` enum('I','E','T') NOT NULL DEFAULT 'I',
  `pedimento` varchar(300) DEFAULT NULL,
  `fechaPedimento` date DEFAULT NULL,
  `aduana` varchar(600) DEFAULT NULL,
  `data` mediumtext,
  `motivoCancelacion` mediumtext,
  `motivoNotaCredito` mediumtext,
  `conceptos` mediumtext,
  `impuestos` mediumtext,
  `timbreFiscal` mediumtext,
  PRIMARY KEY (`comprobanteId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comprobante`
--

INSERT INTO `comprobante` (`comprobanteId`, `userId`, `formaDePago`, `condicionesDePago`, `metodoDePago`, `tasaIva`, `tipoDeMoneda`, `tipoDeCambio`, `porcentajeRetIva`, `porcentajeRetIsr`, `tiposComprobanteId`, `porcentajeIEPS`, `porcentajeDescuento`, `empresaId`, `sucursalId`, `observaciones`, `version`, `serie`, `folio`, `fecha`, `sello`, `noAprobacion`, `anoAprobacion`, `noCertificado`, `certificado`, `subTotal`, `descuento`, `motivoDescuento`, `total`, `tipoDeComprobante`, `cadenaOriginal`, `xml`, `rfcId`, `status`, `ivaTotal`, `efectoComprobante`, `pedimento`, `fechaPedimento`, `aduana`, `data`, `motivoCancelacion`, `motivoNotaCredito`, `conceptos`, `impuestos`, `timbreFiscal`) VALUES
(1, 1, 'PAGO EN UNA SOLA EXHIBICION', '', 'No Identificado', '16', 'peso', 1.00, '0', '0', 1, 0, 0, 15, 0, '', '2.0', 'A', 1, '2013-02-06 13:26:17', 'iGnm734sSQCvyubqU4Ph5n4yjSuAnjssPLl87AhgoWBxxusmepGApaZC2EFgQX1zOdfhIHQlkesCWr05ohtdBk52OzVjOr4QYGhpeZFYcpri2YITKCGV7urCL49gWMcFTRPEVKIVBLg+sTUrHYUUElAurFJi4oQ9SPQCqhL/GuU=', 0, 0, '00001000000200751201', 'MIIEZTCCA02gAwIBAgIUMDAwMDEwMDAwMDAyMDA3NTEyMDEwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDQxMDIwNTg1MFoXDTE2MDQxMDIwNTg1MFowgaYxGDAWBgNVBAMTD0JSQVVOIEhVRVJJTiBTQzEYMBYGA1UEKRMPQlJBVU4gSFVFUklOIFNDMRgwFgYDVQQKEw9CUkFVTiBIVUVSSU4gU0MxJTAjBgNVBC0THEJIVTEyMDMyMENRMSAvIEhFQUY3MTExMDJRVjUxHjAcBgNVBAUTFSAvIEhFQUY3MTExMDJIQ1NSUlIwOTEPMA0GA1UECxMGVU5JREFEMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDzAysAe8MCguM2dNpiuLJVBQ+l09epMs+bPKrDpl7fdkWDwjdS8HATOkg6Be9c+oRM+ULN3idq6QZJQSaIKfZYS4zZOvqE3+zpIpYB7n+C3QryrmkakSMBIlnDwZojJnIG+7BZqxbF0FF7Iu9XTG0LmnRYDrbA4HQvHiR3dYDBbwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAMUl0MFQnEZJu+BhwEJgAKIF16f2z2OA6UcDtA7yHlzwU6gsaRQ2QhNRUEiONdRccT+YqU28kJGt86/UVTfxD3aon33qc9I2H4M/T40EbkYSxV3OOAffCsH3NA2b/xMcsLcFny0u7bS/DnAkLi9SIJQ+FZmbRKLYKbechhrG3wpAY8qQWEtIbs82kX6/X4J0mahXHuazwB4ZP4VwaJ3lZE11+3xsLvRDhXRtZMkrZIZwQ4pRo6EpVmq5dPtHUv9z6WbzkbYbrPgHWiWt/GU6DeTQn/2S3VGaG/e7mV5Ac2vF+72GYSsYHyixkI8Jpt1IgihAwfYBIcSbHXsD3v9kfRw==', 1000.000000, 0.000000, '', 1160.000000, 'ingreso', '||3.2|2013-02-06T13:26:17|ingreso|PAGO EN UNA SOLA EXHIBICION|1000.00|0.00|1.00|MXN|1160.00|No Identificado|Matriz|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|RÃ?Â©gimen de las Personas FÃ?Â­sicas con Actividades Empresariales y Profesionales|POKV650926UBA|VICTOR POLITIS KAMKHAJI|AV DE LA INDUSTRIA|10|NO APLICA|FRACC IND TREBOL|TEPOTZOTLAN|TEPOTZOTLAN|ESTADO DE MEXICO|Mexico|12345|1.00|No Aplica|CONTABILIDAD MENSUAL Correspondiente al mes de Ene del 2013|1000.00|1000.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|160.00|IEPS|0.00|0.00|160.00||', '15_A_1', 1, '1', 160.000000, 'I', NULL, NULL, NULL, '', NULL, NULL, 'a%3A1%3A%7Bi%3A1%3Ba%3A8%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22cantidad%22%3Bi%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A9%3A%22No+Aplica%22%3Bs%3A13%3A%22valorUnitario%22%3Bs%3A7%3A%221000.00%22%3Bs%3A7%3A%22importe%22%3Bs%3A7%3A%221000.00%22%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A59%3A%22CONTABILIDAD+MENSUAL+Correspondiente+al+mes+de+Ene+del+2013%22%3Bs%3A7%3A%22tasaIva%22%3Bs%3A2%3A%2216%22%3B%7D%7D', '', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"FFDFFDCC-7E57-41B5-9AA8-DAFFC6E89C73\";s:13:\"FechaTimbrado\";s:19:\"2013-02-06T13:26:19\";s:8:\"selloCFD\";s:172:\"iGnm734sSQCvyubqU4Ph5n4yjSuAnjssPLl87AhgoWBxxusmepGApaZC2EFgQX1zOdfhIHQlkesCWr05ohtdBk52OzVjOr4QYGhpeZFYcpri2YITKCGV7urCL49gWMcFTRPEVKIVBLg+sTUrHYUUElAurFJi4oQ9SPQCqhL/GuU=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"C8nwPlsHm5C3FJUWEariyN8nzO3Z6qx7kbkajo9wKQAZGOD+dKnk3nbOY/x/xrtnRigR6JaC8EdzpEeyh+NGmVPrlKedSDQJ3FUzIjIzbg44UllIxJvLEOMS+yF3OANBgM4l8v5O7TnRWYG8gH6mBvpgNv6UUddx11kfXlTEVic=\";s:8:\"original\";s:258:\"||1.0|FFDFFDCC-7E57-41B5-9AA8-DAFFC6E89C73|2013-02-06T13:26:19|iGnm734sSQCvyubqU4Ph5n4yjSuAnjssPLl87AhgoWBxxusmepGApaZC2EFgQX1zOdfhIHQlkesCWr05ohtdBk52OzVjOr4QYGhpeZFYcpri2YITKCGV7urCL49gWMcFTRPEVKIVBLg sTUrHYUUElAurFJi4oQ9SPQCqhL/GuU=|20001000000100005867||\";s:4:\"sha1\";s:40:\"4538fbcf8cab888f4782ac5f7f37a7642916b444\";}'),
(15, 618, 'Pago%20en%20Una%20Sola%20Exhibicion', '', 'dad', '16', 'peso', 1.00, '0', '0', 1, 0, 0, 15, 1, '', '2.0', 'A', 15, '2013-03-04 10:09:41', 'z+DUoBp5OdJITiDgGDQLRduouoCe4ElSlEhEcv3lLOKDksQEXYHRLS+u6NjqFGWLXs2ITXh/Qq0egVgLCFAQ8rmioQpVLN/XVtDxxo8l90Loqg0aUlDiUS9oiLCs6uC9zeTwhTd0jKeO8JqqLrryeXGaplq75NHcOoxMF4EZMUk=', 0, 0, '00001000000200751201', 'MIIEZTCCA02gAwIBAgIUMDAwMDEwMDAwMDAyMDA3NTEyMDEwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDQxMDIwNTg1MFoXDTE2MDQxMDIwNTg1MFowgaYxGDAWBgNVBAMTD0JSQVVOIEhVRVJJTiBTQzEYMBYGA1UEKRMPQlJBVU4gSFVFUklOIFNDMRgwFgYDVQQKEw9CUkFVTiBIVUVSSU4gU0MxJTAjBgNVBC0THEJIVTEyMDMyMENRMSAvIEhFQUY3MTExMDJRVjUxHjAcBgNVBAUTFSAvIEhFQUY3MTExMDJIQ1NSUlIwOTEPMA0GA1UECxMGVU5JREFEMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDzAysAe8MCguM2dNpiuLJVBQ+l09epMs+bPKrDpl7fdkWDwjdS8HATOkg6Be9c+oRM+ULN3idq6QZJQSaIKfZYS4zZOvqE3+zpIpYB7n+C3QryrmkakSMBIlnDwZojJnIG+7BZqxbF0FF7Iu9XTG0LmnRYDrbA4HQvHiR3dYDBbwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAMUl0MFQnEZJu+BhwEJgAKIF16f2z2OA6UcDtA7yHlzwU6gsaRQ2QhNRUEiONdRccT+YqU28kJGt86/UVTfxD3aon33qc9I2H4M/T40EbkYSxV3OOAffCsH3NA2b/xMcsLcFny0u7bS/DnAkLi9SIJQ+FZmbRKLYKbechhrG3wpAY8qQWEtIbs82kX6/X4J0mahXHuazwB4ZP4VwaJ3lZE11+3xsLvRDhXRtZMkrZIZwQ4pRo6EpVmq5dPtHUv9z6WbzkbYbrPgHWiWt/GU6DeTQn/2S3VGaG/e7mV5Ac2vF+72GYSsYHyixkI8Jpt1IgihAwfYBIcSbHXsD3v9kfRw==', 1.000000, 0.000000, '', 1.160000, 'ingreso', '||3.2|2013-03-04T10:09:41|ingreso|Pago en Una Sola Exhibicion|1.00|0.00|1.00|peso|1.16|dad|matriz|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|R??©gimen de las Personas F??­sicas con Actividades Empresariales y Profesionales|LOAD850511SX3|daniel l??³pez|calle ac??©ntos|123|321|col|num|est|Mexico|00123|1.00|da|dada|1.00|1.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|0.16|IEPS|0.00|0.00|0.16||', '15_A_15', 1, '1', 0.160000, 'I', NULL, NULL, NULL, 'a%3A9%3A%7Bs%3A16%3A%22datosFacturacion%22%3Bs%3A557%3A%22userId%3D618%26rfc%3DLOAD850511SX3%26razonSocial%3Ddaniel%2520l%25C3%25B3pez%26calle%3Dcalle%2520ac%25C3%25A9ntos%26noExt%3D123%26noInt%3D321%26colonia%3Dcol%26municipio%3Dnum%26estado%3Dest%26localidad%3D%26cp%3D00123%26pais%3DMexico%26referencia%3D%26email%3Dd%2540ta.com%26formaDePago%3DPago%2520en%2520Una%2520Sola%2520Exhibicion%26condicionesDePago%3D%26metodoDePago%3Ddad%26NumCtaPago%3D%26tasaIva%3D16%26tiposDeMoneda%3Dpeso%26porcentajeRetIva%3D0%26porcentajeIEPS%3D%26porcentajeDescuento%3D%26tipoDeCambio%3D%26porcentajeRetIsr%3D0%26tiposComprobanteId%3D1-5%26sucursalId%3D1%26cantidad%3D1%26noIdentificacion%3D%26unidad%3Dda%26valorUnitario%3D1%26excentoIva%3Dno%26descripcion%3Ddada%26observaciones%3D%22%3Bs%3A13%3A%22observaciones%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22reviso%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22autorizo%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22recibio%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22vobo%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22pago%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22spf%22%3BN%3Bs%3A3%3A%22isn%22%3BN%3B%7D', NULL, NULL, 'a%3A1%3A%7Bi%3A1%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%22da%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A1%3Bs%3A7%3A%22importe%22%3Bd%3A1%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A4%3A%22dada%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7D%7D', 'N%3B', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"867594CC-7E57-47FC-B277-27FD334798B9\";s:13:\"FechaTimbrado\";s:19:\"2013-03-04T10:09:43\";s:8:\"selloCFD\";s:172:\"z+DUoBp5OdJITiDgGDQLRduouoCe4ElSlEhEcv3lLOKDksQEXYHRLS+u6NjqFGWLXs2ITXh/Qq0egVgLCFAQ8rmioQpVLN/XVtDxxo8l90Loqg0aUlDiUS9oiLCs6uC9zeTwhTd0jKeO8JqqLrryeXGaplq75NHcOoxMF4EZMUk=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"r0yAwt7+a/Msy7J7uRNebvxhg+dHX2F2q0OHuCLpWdakd8JUiLsCxfW6Q1NrdngNiEafcMLXW4xDsGldkrdH58QK+CVE0XtzEiFkX+ZweymCHPd7sEEbgJHAJKZhggGFdLnrxpXbQXmt5U/lokZlqlwt1dJ+C8DEU2sB/iWsS2Q=\";s:8:\"original\";s:258:\"||1.0|867594CC-7E57-47FC-B277-27FD334798B9|2013-03-04T10:09:43|z DUoBp5OdJITiDgGDQLRduouoCe4ElSlEhEcv3lLOKDksQEXYHRLS u6NjqFGWLXs2ITXh/Qq0egVgLCFAQ8rmioQpVLN/XVtDxxo8l90Loqg0aUlDiUS9oiLCs6uC9zeTwhTd0jKeO8JqqLrryeXGaplq75NHcOoxMF4EZMUk=|20001000000100005867||\";s:4:\"sha1\";s:40:\"56695ff28238f6700816148db83df6e2d594075d\";}'),
(16, 618, 'Pago%20en%20Una%20Sola%20Exhibicion', '', 'dasda', '16', 'peso', 1.00, '0', '0', 1, 0, 0, 15, 1, '', '2.0', 'A', 16, '2013-03-04 10:32:17', 'ELcJF7ORinTlIHXZOV6NLAAPQIgyVynAlj0M26rdehNWR4Yr+UP2KQA7D6QBzPKSlO0SvocBuWaaBnxRVjydTWIRo36af1c5YHT03ZFUw6N6NPOBbiHoXzcnP0Fz3V7rY2F434kbFkF+Zb1OkunVJ/Rw4uDTyBLYpOz4KP3I7TU=', 0, 0, '00001000000200751201', 'MIIEZTCCA02gAwIBAgIUMDAwMDEwMDAwMDAyMDA3NTEyMDEwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDQxMDIwNTg1MFoXDTE2MDQxMDIwNTg1MFowgaYxGDAWBgNVBAMTD0JSQVVOIEhVRVJJTiBTQzEYMBYGA1UEKRMPQlJBVU4gSFVFUklOIFNDMRgwFgYDVQQKEw9CUkFVTiBIVUVSSU4gU0MxJTAjBgNVBC0THEJIVTEyMDMyMENRMSAvIEhFQUY3MTExMDJRVjUxHjAcBgNVBAUTFSAvIEhFQUY3MTExMDJIQ1NSUlIwOTEPMA0GA1UECxMGVU5JREFEMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDzAysAe8MCguM2dNpiuLJVBQ+l09epMs+bPKrDpl7fdkWDwjdS8HATOkg6Be9c+oRM+ULN3idq6QZJQSaIKfZYS4zZOvqE3+zpIpYB7n+C3QryrmkakSMBIlnDwZojJnIG+7BZqxbF0FF7Iu9XTG0LmnRYDrbA4HQvHiR3dYDBbwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAMUl0MFQnEZJu+BhwEJgAKIF16f2z2OA6UcDtA7yHlzwU6gsaRQ2QhNRUEiONdRccT+YqU28kJGt86/UVTfxD3aon33qc9I2H4M/T40EbkYSxV3OOAffCsH3NA2b/xMcsLcFny0u7bS/DnAkLi9SIJQ+FZmbRKLYKbechhrG3wpAY8qQWEtIbs82kX6/X4J0mahXHuazwB4ZP4VwaJ3lZE11+3xsLvRDhXRtZMkrZIZwQ4pRo6EpVmq5dPtHUv9z6WbzkbYbrPgHWiWt/GU6DeTQn/2S3VGaG/e7mV5Ac2vF+72GYSsYHyixkI8Jpt1IgihAwfYBIcSbHXsD3v9kfRw==', 1.000000, 0.000000, '', 1.160000, 'ingreso', '||3.2|2013-03-04T10:32:17|ingreso|Pago en Una Sola Exhibicion|1.00|0.00|1.00|peso|1.16|dasda|matriz|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|R??©gimen de las Personas F??­sicas con Actividades Empresariales y Profesionales|LOAD850511SX3|daniel l??³pez|calle ac??©ntos|123|321|col|num|est|Mexico|00123|1.00|da|dasdasd|1.00|1.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|0.16|IEPS|0.00|0.00|0.16||', '15_A_16', 1, '1', 0.160000, 'I', NULL, NULL, NULL, 'a%3A9%3A%7Bs%3A16%3A%22datosFacturacion%22%3Bs%3A562%3A%22userId%3D618%26rfc%3DLOAD850511SX3%26razonSocial%3Ddaniel%2520l%25C3%25B3pez%26calle%3Dcalle%2520ac%25C3%25A9ntos%26noExt%3D123%26noInt%3D321%26colonia%3Dcol%26municipio%3Dnum%26estado%3Dest%26localidad%3D%26cp%3D00123%26pais%3DMexico%26referencia%3D%26email%3Dd%2540ta.com%26formaDePago%3DPago%2520en%2520Una%2520Sola%2520Exhibicion%26condicionesDePago%3D%26metodoDePago%3Ddasda%26NumCtaPago%3D%26tasaIva%3D16%26tiposDeMoneda%3Dpeso%26porcentajeRetIva%3D0%26porcentajeIEPS%3D%26porcentajeDescuento%3D%26tipoDeCambio%3D%26porcentajeRetIsr%3D0%26tiposComprobanteId%3D1-5%26sucursalId%3D1%26cantidad%3D1%26noIdentificacion%3D%26unidad%3Dda%26valorUnitario%3D1%26excentoIva%3Dno%26descripcion%3Ddasdasd%26observaciones%3D%22%3Bs%3A13%3A%22observaciones%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22reviso%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22autorizo%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22recibio%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22vobo%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22pago%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22spf%22%3BN%3Bs%3A3%3A%22isn%22%3BN%3B%7D', NULL, NULL, 'a%3A1%3A%7Bi%3A1%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%22da%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A1%3Bs%3A7%3A%22importe%22%3Bd%3A1%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A7%3A%22dasdasd%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7D%7D', 'N%3B', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"7E8041D8-7E57-48B1-BD56-2C760CEC4A0B\";s:13:\"FechaTimbrado\";s:19:\"2013-03-04T10:32:19\";s:8:\"selloCFD\";s:172:\"ELcJF7ORinTlIHXZOV6NLAAPQIgyVynAlj0M26rdehNWR4Yr+UP2KQA7D6QBzPKSlO0SvocBuWaaBnxRVjydTWIRo36af1c5YHT03ZFUw6N6NPOBbiHoXzcnP0Fz3V7rY2F434kbFkF+Zb1OkunVJ/Rw4uDTyBLYpOz4KP3I7TU=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"MIITfl4Q4veJDpWDZsCO2LCBWnoFmiShGBCiXZ33tz4akiDhAd+eoUz7QbxNI+B8eAV1v0TR3XIU3yxqIUC8hbAtvSRadpBhSqSMechhuwIsz8t1cMRfesXfz2XyaRq2EzSS+yLYE2vzUJ6ORm5a2VxpGpHG33uXJh4OkvbEhIY=\";s:8:\"original\";s:258:\"||1.0|7E8041D8-7E57-48B1-BD56-2C760CEC4A0B|2013-03-04T10:32:19|ELcJF7ORinTlIHXZOV6NLAAPQIgyVynAlj0M26rdehNWR4Yr UP2KQA7D6QBzPKSlO0SvocBuWaaBnxRVjydTWIRo36af1c5YHT03ZFUw6N6NPOBbiHoXzcnP0Fz3V7rY2F434kbFkF Zb1OkunVJ/Rw4uDTyBLYpOz4KP3I7TU=|20001000000100005867||\";s:4:\"sha1\";s:40:\"9a6fbcedb213d859007cc085c25397eaadb9ba1c\";}'),
(17, 618, 'Pago%20en%20Una%20Sola%20Exhibicion', '', 'dasda', '16', 'peso', 1.00, '0', '0', 1, 0, 0, 15, 1, '', '2.0', 'A', 17, '2013-03-04 10:32:26', 'QcyN1N5Ev2fr/FjDQL1GDouoo2YDiX0MEXS1bPVJi42ZB7U1jX7/imKQ3hrVENrnDwe9q4dbYnv0kLeA26GMTy2xxikmeYQiUpDmFeFhS/9eCZxPU0Qi9Y5dJpOQlv8zmfH4pYIxqDXy2oZ2rDjLL9/MVbz8NXg/b4omoR9W+UU=', 0, 0, '00001000000200751201', 'MIIEZTCCA02gAwIBAgIUMDAwMDEwMDAwMDAyMDA3NTEyMDEwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDQxMDIwNTg1MFoXDTE2MDQxMDIwNTg1MFowgaYxGDAWBgNVBAMTD0JSQVVOIEhVRVJJTiBTQzEYMBYGA1UEKRMPQlJBVU4gSFVFUklOIFNDMRgwFgYDVQQKEw9CUkFVTiBIVUVSSU4gU0MxJTAjBgNVBC0THEJIVTEyMDMyMENRMSAvIEhFQUY3MTExMDJRVjUxHjAcBgNVBAUTFSAvIEhFQUY3MTExMDJIQ1NSUlIwOTEPMA0GA1UECxMGVU5JREFEMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDzAysAe8MCguM2dNpiuLJVBQ+l09epMs+bPKrDpl7fdkWDwjdS8HATOkg6Be9c+oRM+ULN3idq6QZJQSaIKfZYS4zZOvqE3+zpIpYB7n+C3QryrmkakSMBIlnDwZojJnIG+7BZqxbF0FF7Iu9XTG0LmnRYDrbA4HQvHiR3dYDBbwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAMUl0MFQnEZJu+BhwEJgAKIF16f2z2OA6UcDtA7yHlzwU6gsaRQ2QhNRUEiONdRccT+YqU28kJGt86/UVTfxD3aon33qc9I2H4M/T40EbkYSxV3OOAffCsH3NA2b/xMcsLcFny0u7bS/DnAkLi9SIJQ+FZmbRKLYKbechhrG3wpAY8qQWEtIbs82kX6/X4J0mahXHuazwB4ZP4VwaJ3lZE11+3xsLvRDhXRtZMkrZIZwQ4pRo6EpVmq5dPtHUv9z6WbzkbYbrPgHWiWt/GU6DeTQn/2S3VGaG/e7mV5Ac2vF+72GYSsYHyixkI8Jpt1IgihAwfYBIcSbHXsD3v9kfRw==', 1.000000, 0.000000, '', 1.160000, 'ingreso', '||3.2|2013-03-04T10:32:26|ingreso|Pago en Una Sola Exhibicion|1.00|0.00|1.00|peso|1.16|dasda|matriz|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|R??©gimen de las Personas F??­sicas con Actividades Empresariales y Profesionales|LOAD850511SX3|daniel l??³pez|calle ac??©ntos|123|321|col|num|est|Mexico|00123|1.00|da|dasdasd|1.00|1.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|0.16|IEPS|0.00|0.00|0.16||', '15_A_17', 1, '1', 0.160000, 'I', NULL, NULL, NULL, 'a%3A9%3A%7Bs%3A16%3A%22datosFacturacion%22%3Bs%3A562%3A%22userId%3D618%26rfc%3DLOAD850511SX3%26razonSocial%3Ddaniel%2520l%25C3%25B3pez%26calle%3Dcalle%2520ac%25C3%25A9ntos%26noExt%3D123%26noInt%3D321%26colonia%3Dcol%26municipio%3Dnum%26estado%3Dest%26localidad%3D%26cp%3D00123%26pais%3DMexico%26referencia%3D%26email%3Dd%2540ta.com%26formaDePago%3DPago%2520en%2520Una%2520Sola%2520Exhibicion%26condicionesDePago%3D%26metodoDePago%3Ddasda%26NumCtaPago%3D%26tasaIva%3D16%26tiposDeMoneda%3Dpeso%26porcentajeRetIva%3D0%26porcentajeIEPS%3D%26porcentajeDescuento%3D%26tipoDeCambio%3D%26porcentajeRetIsr%3D0%26tiposComprobanteId%3D1-5%26sucursalId%3D1%26cantidad%3D1%26noIdentificacion%3D%26unidad%3Dda%26valorUnitario%3D1%26excentoIva%3Dno%26descripcion%3Ddasdasd%26observaciones%3D%22%3Bs%3A13%3A%22observaciones%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22reviso%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22autorizo%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22recibio%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22vobo%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22pago%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22spf%22%3BN%3Bs%3A3%3A%22isn%22%3BN%3B%7D', NULL, NULL, 'a%3A1%3A%7Bi%3A1%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%22da%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A1%3Bs%3A7%3A%22importe%22%3Bd%3A1%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A7%3A%22dasdasd%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7D%7D', 'N%3B', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"F8FF83A7-7E57-4300-A46C-216F33BE4666\";s:13:\"FechaTimbrado\";s:19:\"2013-03-04T10:32:28\";s:8:\"selloCFD\";s:172:\"QcyN1N5Ev2fr/FjDQL1GDouoo2YDiX0MEXS1bPVJi42ZB7U1jX7/imKQ3hrVENrnDwe9q4dbYnv0kLeA26GMTy2xxikmeYQiUpDmFeFhS/9eCZxPU0Qi9Y5dJpOQlv8zmfH4pYIxqDXy2oZ2rDjLL9/MVbz8NXg/b4omoR9W+UU=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"aRATyuDod6uL//lfXOI8KP2FUGGSeYPY6TNmgIjReGtJQZ3BDnkHePaqdjv8juxdwB8i+YDUMjAXIrEGzUYRL5ELox9RWwRXKgZs0fZl9eVWqmF7aqFRyOgsNpmO9JbLmnSBNh8xZeNO1gZ7JO0D2T0byYhK2IEPPyQnmNSpfxU=\";s:8:\"original\";s:258:\"||1.0|F8FF83A7-7E57-4300-A46C-216F33BE4666|2013-03-04T10:32:28|QcyN1N5Ev2fr/FjDQL1GDouoo2YDiX0MEXS1bPVJi42ZB7U1jX7/imKQ3hrVENrnDwe9q4dbYnv0kLeA26GMTy2xxikmeYQiUpDmFeFhS/9eCZxPU0Qi9Y5dJpOQlv8zmfH4pYIxqDXy2oZ2rDjLL9/MVbz8NXg/b4omoR9W UU=|20001000000100005867||\";s:4:\"sha1\";s:40:\"2b6b0d82638f686718406abb2dff18f46c77d39c\";}'),
(18, 618, 'Pago%20en%20Una%20Sola%20Exhibicion', '', 'dasda', '16', 'peso', 1.00, '0', '0', 1, 0, 0, 15, 1, '', '2.0', 'A', 18, '2013-03-04 10:32:40', 'amKWYxNRTIeZZxYyklV5rjVQZ/GRmXb8Fs6RZQxCAEYX/x2wv+2tqj1xNncfwVh+SlscTi2NEr/UJosnZUGg56tdKKb1cRc6/BNFzB2j89bJixndYuYeqqIkr4Va/aqff31O0oslPgP+dWfDoLSnFNVThztdOaGGtRL3ESeo+Lw=', 0, 0, '00001000000200751201', 'MIIEZTCCA02gAwIBAgIUMDAwMDEwMDAwMDAyMDA3NTEyMDEwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDQxMDIwNTg1MFoXDTE2MDQxMDIwNTg1MFowgaYxGDAWBgNVBAMTD0JSQVVOIEhVRVJJTiBTQzEYMBYGA1UEKRMPQlJBVU4gSFVFUklOIFNDMRgwFgYDVQQKEw9CUkFVTiBIVUVSSU4gU0MxJTAjBgNVBC0THEJIVTEyMDMyMENRMSAvIEhFQUY3MTExMDJRVjUxHjAcBgNVBAUTFSAvIEhFQUY3MTExMDJIQ1NSUlIwOTEPMA0GA1UECxMGVU5JREFEMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDzAysAe8MCguM2dNpiuLJVBQ+l09epMs+bPKrDpl7fdkWDwjdS8HATOkg6Be9c+oRM+ULN3idq6QZJQSaIKfZYS4zZOvqE3+zpIpYB7n+C3QryrmkakSMBIlnDwZojJnIG+7BZqxbF0FF7Iu9XTG0LmnRYDrbA4HQvHiR3dYDBbwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAMUl0MFQnEZJu+BhwEJgAKIF16f2z2OA6UcDtA7yHlzwU6gsaRQ2QhNRUEiONdRccT+YqU28kJGt86/UVTfxD3aon33qc9I2H4M/T40EbkYSxV3OOAffCsH3NA2b/xMcsLcFny0u7bS/DnAkLi9SIJQ+FZmbRKLYKbechhrG3wpAY8qQWEtIbs82kX6/X4J0mahXHuazwB4ZP4VwaJ3lZE11+3xsLvRDhXRtZMkrZIZwQ4pRo6EpVmq5dPtHUv9z6WbzkbYbrPgHWiWt/GU6DeTQn/2S3VGaG/e7mV5Ac2vF+72GYSsYHyixkI8Jpt1IgihAwfYBIcSbHXsD3v9kfRw==', 1.000000, 0.000000, '', 1.160000, 'ingreso', '||3.2|2013-03-04T10:32:40|ingreso|Pago en Una Sola Exhibicion|1.00|0.00|1.00|peso|1.16|dasda|matriz|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|R??©gimen de las Personas F??­sicas con Actividades Empresariales y Profesionales|LOAD850511SX3|daniel l??³pez|calle ac??©ntos|123|321|col|num|est|Mexico|00123|1.00|da|dasdasd|1.00|1.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|0.16|IEPS|0.00|0.00|0.16||', '15_A_18', 1, '0', 0.160000, 'I', NULL, '2013-03-04', NULL, 'a%3A9%3A%7Bs%3A16%3A%22datosFacturacion%22%3Bs%3A562%3A%22userId%3D618%26rfc%3DLOAD850511SX3%26razonSocial%3Ddaniel%2520l%25C3%25B3pez%26calle%3Dcalle%2520ac%25C3%25A9ntos%26noExt%3D123%26noInt%3D321%26colonia%3Dcol%26municipio%3Dnum%26estado%3Dest%26localidad%3D%26cp%3D00123%26pais%3DMexico%26referencia%3D%26email%3Dd%2540ta.com%26formaDePago%3DPago%2520en%2520Una%2520Sola%2520Exhibicion%26condicionesDePago%3D%26metodoDePago%3Ddasda%26NumCtaPago%3D%26tasaIva%3D16%26tiposDeMoneda%3Dpeso%26porcentajeRetIva%3D0%26porcentajeIEPS%3D%26porcentajeDescuento%3D%26tipoDeCambio%3D%26porcentajeRetIsr%3D0%26tiposComprobanteId%3D1-5%26sucursalId%3D1%26cantidad%3D1%26noIdentificacion%3D%26unidad%3Dda%26valorUnitario%3D1%26excentoIva%3Dno%26descripcion%3Ddasdasd%26observaciones%3D%22%3Bs%3A13%3A%22observaciones%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22reviso%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22autorizo%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22recibio%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22vobo%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22pago%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22spf%22%3BN%3Bs%3A3%3A%22isn%22%3BN%3B%7D', 'test', NULL, 'a%3A1%3A%7Bi%3A1%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%22da%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A1%3Bs%3A7%3A%22importe%22%3Bd%3A1%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A7%3A%22dasdasd%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7D%7D', 'N%3B', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"3AFE44B3-7E57-4820-9882-6D323EF32323\";s:13:\"FechaTimbrado\";s:19:\"2013-03-04T10:32:42\";s:8:\"selloCFD\";s:172:\"amKWYxNRTIeZZxYyklV5rjVQZ/GRmXb8Fs6RZQxCAEYX/x2wv+2tqj1xNncfwVh+SlscTi2NEr/UJosnZUGg56tdKKb1cRc6/BNFzB2j89bJixndYuYeqqIkr4Va/aqff31O0oslPgP+dWfDoLSnFNVThztdOaGGtRL3ESeo+Lw=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"CIYh+XrLFeIPkY1vcIrz3r8Ytj8++VIfU4IDU8TGDNcawpr/W8eibPcU0ePhQuygyLH0Vhi4ooVtg7xyAotMG69hBXEaZLergDBcFCy0mLHokFPaTmSVj3Uz7kGfyLxysVBTJUDJ1xywU5uGUvr783KxpJ+ZyI5O8e1HEqbrZIk=\";s:8:\"original\";s:258:\"||1.0|3AFE44B3-7E57-4820-9882-6D323EF32323|2013-03-04T10:32:42|amKWYxNRTIeZZxYyklV5rjVQZ/GRmXb8Fs6RZQxCAEYX/x2wv 2tqj1xNncfwVh SlscTi2NEr/UJosnZUGg56tdKKb1cRc6/BNFzB2j89bJixndYuYeqqIkr4Va/aqff31O0oslPgP dWfDoLSnFNVThztdOaGGtRL3ESeo Lw=|20001000000100005867||\";s:4:\"sha1\";s:40:\"0629464b1af7bd3b4fe9745ea786016a144c7113\";}'),
(19, 618, 'Pago%20en%20Una%20Sola%20Exhibicion', '', 'dasda', '16', 'peso', 1.00, '0', '0', 1, 0, 0, 15, 1, '', '2.0', 'A', 19, '2013-03-04 10:32:48', 'lC4eksYQxXkmxhapDzPy/drAk3SuehOqb9MvB2vXcjsrc/eN8TEhe7e6w6LBmLUNn8ZuAWXYXCR5rUfot6DBPmoGhT9ENrntbIZT5oK+3l1Asvs1bTyY+dgv5h1KDdwA/I9ARs3HiRDOS22INxnd/njVMHKyd0APfj+whJa+d6U=', 0, 0, '00001000000200751201', 'MIIEZTCCA02gAwIBAgIUMDAwMDEwMDAwMDAyMDA3NTEyMDEwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDQxMDIwNTg1MFoXDTE2MDQxMDIwNTg1MFowgaYxGDAWBgNVBAMTD0JSQVVOIEhVRVJJTiBTQzEYMBYGA1UEKRMPQlJBVU4gSFVFUklOIFNDMRgwFgYDVQQKEw9CUkFVTiBIVUVSSU4gU0MxJTAjBgNVBC0THEJIVTEyMDMyMENRMSAvIEhFQUY3MTExMDJRVjUxHjAcBgNVBAUTFSAvIEhFQUY3MTExMDJIQ1NSUlIwOTEPMA0GA1UECxMGVU5JREFEMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDzAysAe8MCguM2dNpiuLJVBQ+l09epMs+bPKrDpl7fdkWDwjdS8HATOkg6Be9c+oRM+ULN3idq6QZJQSaIKfZYS4zZOvqE3+zpIpYB7n+C3QryrmkakSMBIlnDwZojJnIG+7BZqxbF0FF7Iu9XTG0LmnRYDrbA4HQvHiR3dYDBbwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAMUl0MFQnEZJu+BhwEJgAKIF16f2z2OA6UcDtA7yHlzwU6gsaRQ2QhNRUEiONdRccT+YqU28kJGt86/UVTfxD3aon33qc9I2H4M/T40EbkYSxV3OOAffCsH3NA2b/xMcsLcFny0u7bS/DnAkLi9SIJQ+FZmbRKLYKbechhrG3wpAY8qQWEtIbs82kX6/X4J0mahXHuazwB4ZP4VwaJ3lZE11+3xsLvRDhXRtZMkrZIZwQ4pRo6EpVmq5dPtHUv9z6WbzkbYbrPgHWiWt/GU6DeTQn/2S3VGaG/e7mV5Ac2vF+72GYSsYHyixkI8Jpt1IgihAwfYBIcSbHXsD3v9kfRw==', 1.000000, 0.000000, '', 1.160000, 'ingreso', '||3.2|2013-03-04T10:32:48|ingreso|Pago en Una Sola Exhibicion|1.00|0.00|1.00|peso|1.16|dasda|matriz|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|R??©gimen de las Personas F??­sicas con Actividades Empresariales y Profesionales|LOAD850511SX3|daniel l??³pez|calle ac??©ntos|123|321|col|num|est|Mexico|00123|1.00|da|dasdasd|1.00|1.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|0.16|IEPS|0.00|0.00|0.16||', '15_A_19', 1, '0', 0.160000, 'I', NULL, '2013-03-04', NULL, 'a%3A9%3A%7Bs%3A16%3A%22datosFacturacion%22%3Bs%3A562%3A%22userId%3D618%26rfc%3DLOAD850511SX3%26razonSocial%3Ddaniel%2520l%25C3%25B3pez%26calle%3Dcalle%2520ac%25C3%25A9ntos%26noExt%3D123%26noInt%3D321%26colonia%3Dcol%26municipio%3Dnum%26estado%3Dest%26localidad%3D%26cp%3D00123%26pais%3DMexico%26referencia%3D%26email%3Dd%2540ta.com%26formaDePago%3DPago%2520en%2520Una%2520Sola%2520Exhibicion%26condicionesDePago%3D%26metodoDePago%3Ddasda%26NumCtaPago%3D%26tasaIva%3D16%26tiposDeMoneda%3Dpeso%26porcentajeRetIva%3D0%26porcentajeIEPS%3D%26porcentajeDescuento%3D%26tipoDeCambio%3D%26porcentajeRetIsr%3D0%26tiposComprobanteId%3D1-5%26sucursalId%3D1%26cantidad%3D1%26noIdentificacion%3D%26unidad%3Dda%26valorUnitario%3D1%26excentoIva%3Dno%26descripcion%3Ddasdasd%26observaciones%3D%22%3Bs%3A13%3A%22observaciones%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22reviso%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22autorizo%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22recibio%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22vobo%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22pago%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22spf%22%3BN%3Bs%3A3%3A%22isn%22%3BN%3B%7D', 'test', NULL, 'a%3A1%3A%7Bi%3A1%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%22da%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A1%3Bs%3A7%3A%22importe%22%3Bd%3A1%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A7%3A%22dasdasd%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7D%7D', 'N%3B', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"97A3B78E-7E57-4820-843A-A5CC8EFC48CE\";s:13:\"FechaTimbrado\";s:19:\"2013-03-04T10:32:50\";s:8:\"selloCFD\";s:172:\"lC4eksYQxXkmxhapDzPy/drAk3SuehOqb9MvB2vXcjsrc/eN8TEhe7e6w6LBmLUNn8ZuAWXYXCR5rUfot6DBPmoGhT9ENrntbIZT5oK+3l1Asvs1bTyY+dgv5h1KDdwA/I9ARs3HiRDOS22INxnd/njVMHKyd0APfj+whJa+d6U=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"HYJ2XczKMaM4glxfSRGrSuLA9WI57xCm4RjGXbTlrFNZN8fqtT/Lo2rwaZm9zg6k97rwNyJQLNinDmoVFR1ZSa5lvD3P3pPka6/XtAq8DTYQptEOMMKOGGzno8owQSW6uaoRPqLMWoLRVWBGkkmHUtg93VbBJAb+3POOK4YTlds=\";s:8:\"original\";s:258:\"||1.0|97A3B78E-7E57-4820-843A-A5CC8EFC48CE|2013-03-04T10:32:50|lC4eksYQxXkmxhapDzPy/drAk3SuehOqb9MvB2vXcjsrc/eN8TEhe7e6w6LBmLUNn8ZuAWXYXCR5rUfot6DBPmoGhT9ENrntbIZT5oK 3l1Asvs1bTyY dgv5h1KDdwA/I9ARs3HiRDOS22INxnd/njVMHKyd0APfj whJa d6U=|20001000000100005867||\";s:4:\"sha1\";s:40:\"49785991609c7e0129040a9657c19eaa2f41dcf3\";}'),
(20, 626, 'Pago%20en%20Una%20Sola%20Exhibicion', 'kj', 'Efectivo', '16', 'peso', 1.00, '0', '0', 1, 3, 0, 15, 1, '', '2.0', 'A', 20, '2013-03-05 17:41:53', 'Or67iyPL0ZgR6anDMoybNvqr/RFqxc1YvbNj0CaAv20J+BmbJq/DHGmWkddeMQxoEEYx5tnmubZOx9vkYkJQCyGrr/wn4YYJJmL7Hjhuee5aepIy78eDc25AiEa0iiA6aPtxiXcncZS2kyJvE5a6Q+n0QIMT/Q2hthb/dl3I9MU=', 0, 0, '00001000000200751201', 'MIIEZTCCA02gAwIBAgIUMDAwMDEwMDAwMDAyMDA3NTEyMDEwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDQxMDIwNTg1MFoXDTE2MDQxMDIwNTg1MFowgaYxGDAWBgNVBAMTD0JSQVVOIEhVRVJJTiBTQzEYMBYGA1UEKRMPQlJBVU4gSFVFUklOIFNDMRgwFgYDVQQKEw9CUkFVTiBIVUVSSU4gU0MxJTAjBgNVBC0THEJIVTEyMDMyMENRMSAvIEhFQUY3MTExMDJRVjUxHjAcBgNVBAUTFSAvIEhFQUY3MTExMDJIQ1NSUlIwOTEPMA0GA1UECxMGVU5JREFEMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDzAysAe8MCguM2dNpiuLJVBQ+l09epMs+bPKrDpl7fdkWDwjdS8HATOkg6Be9c+oRM+ULN3idq6QZJQSaIKfZYS4zZOvqE3+zpIpYB7n+C3QryrmkakSMBIlnDwZojJnIG+7BZqxbF0FF7Iu9XTG0LmnRYDrbA4HQvHiR3dYDBbwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAMUl0MFQnEZJu+BhwEJgAKIF16f2z2OA6UcDtA7yHlzwU6gsaRQ2QhNRUEiONdRccT+YqU28kJGt86/UVTfxD3aon33qc9I2H4M/T40EbkYSxV3OOAffCsH3NA2b/xMcsLcFny0u7bS/DnAkLi9SIJQ+FZmbRKLYKbechhrG3wpAY8qQWEtIbs82kX6/X4J0mahXHuazwB4ZP4VwaJ3lZE11+3xsLvRDhXRtZMkrZIZwQ4pRo6EpVmq5dPtHUv9z6WbzkbYbrPgHWiWt/GU6DeTQn/2S3VGaG/e7mV5Ac2vF+72GYSsYHyixkI8Jpt1IgihAwfYBIcSbHXsD3v9kfRw==', 663.000000, 0.000000, '', 743.210022, 'ingreso', '||3.2|2013-03-05T17:41:53|ingreso|Pago en Una Sola Exhibicion|kj|663.00|0.00|1.00|peso|743.21|Efectivo|matriz|0304|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|R??©gimen de las Personas F??­sicas con Actividades Empresariales y Profesionales|XAXX010101000|Jesus Velazquez Diaz|Av. Lomas del oriente|456|Chiapa de corzo|tuxtla gutierrez|Chiapas|M??©xico|29000|1.00|12|767|Libreta de notas marca office depot|143.00|143.00|1.00|12|767|Libreta de notas marca office depot0|143.00|143.00|1.00|12|767|Libretaa de nootas marca office depot0|143.00|143.00|1.00|23|767|Libretaa de nootas marca office depot0|234.00|234.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|60.32|IEPS|3.00|19.89|80.21||', '15_A_20', 1, '0', 60.320000, 'I', NULL, '2013-03-05', NULL, 'a%3A9%3A%7Bs%3A16%3A%22datosFacturacion%22%3Bs%3A676%3A%22userId%3D626%26rfc%3DXAXX010101000%26razonSocial%3DJesus%2520Velazquez%2520Diaz%26calle%3DAv.%2520Lomas%2520del%2520oriente%26noExt%3D456%26noInt%3D%26colonia%3DChiapa%2520de%2520corzo%26municipio%3Dtuxtla%2520gutierrez%26estado%3DChiapas%26localidad%3D%26cp%3D29000%26pais%3DM%25C3%25A9xico%26referencia%3D%26email%3Ddarchus%2540gmail.com%26formaDePago%3DPago%2520en%2520Una%2520Sola%2520Exhibicion%26condicionesDePago%3Dkj%26metodoDePago%3DEfectivo%26NumCtaPago%3D0304%26tasaIva%3D16%26tiposDeMoneda%3Dpeso%26porcentajeRetIva%3D0%26porcentajeIEPS%3D3%26porcentajeDescuento%3D%26tipoDeCambio%3D%26porcentajeRetIsr%3D0%26tiposComprobanteId%3D1-5%26sucursalId%3D1%26cantidad%3D1%26noIdentificacion%3D767%26unidad%3D23%26valorUnitario%3D234%26excentoIva%3Dno%26descripcion%3DLibretaa%2520de%2520nootas%2520marca%2520office%2520depot0%26observaciones%3D%22%3Bs%3A13%3A%22observaciones%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22reviso%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22autorizo%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22recibio%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22vobo%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22pago%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22spf%22%3BN%3Bs%3A3%3A%22isn%22%3BN%3B%7D', 'No nos realizo el pago', NULL, 'a%3A4%3A%7Bi%3A3%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A3%3A%22767%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%2212%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A143%3Bs%3A7%3A%22importe%22%3Bd%3A143%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22si%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A35%3A%22Libreta+de+notas+marca+office+depot%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bi%3A0%3B%7Di%3A4%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A3%3A%22767%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%2212%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A143%3Bs%3A7%3A%22importe%22%3Bd%3A143%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22si%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A36%3A%22Libreta+de+notas+marca+office+depot0%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bi%3A0%3B%7Di%3A5%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A3%3A%22767%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%2212%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A143%3Bs%3A7%3A%22importe%22%3Bd%3A143%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A38%3A%22Libretaa+de+nootas+marca+office+depot0%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7Di%3A6%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A3%3A%22767%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%2223%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A234%3Bs%3A7%3A%22importe%22%3Bd%3A234%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A38%3A%22Libretaa+de+nootas+marca+office+depot0%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7D%7D', 'N%3B', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"09BF3F06-7E57-49D1-A1B7-DAF191B7B6FD\";s:13:\"FechaTimbrado\";s:19:\"2013-03-05T17:41:55\";s:8:\"selloCFD\";s:172:\"Or67iyPL0ZgR6anDMoybNvqr/RFqxc1YvbNj0CaAv20J+BmbJq/DHGmWkddeMQxoEEYx5tnmubZOx9vkYkJQCyGrr/wn4YYJJmL7Hjhuee5aepIy78eDc25AiEa0iiA6aPtxiXcncZS2kyJvE5a6Q+n0QIMT/Q2hthb/dl3I9MU=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"TEv1StDHXowi1WUe2eqXLpAnO+iutYLPxIVGuggjsf2L6XkhnSCuX7MF7mLX7D5eCCvmB1GccF6utdWKnPPL6lqxU1XESm6bDBRJLR1vyXRc8Ds0zsZxjYSL+B0KKKjo8KowQGMpPLqUsFkmGg06OY3fpzrJH7KQt/fPF1jrWYI=\";s:8:\"original\";s:258:\"||1.0|09BF3F06-7E57-49D1-A1B7-DAF191B7B6FD|2013-03-05T17:41:55|Or67iyPL0ZgR6anDMoybNvqr/RFqxc1YvbNj0CaAv20J BmbJq/DHGmWkddeMQxoEEYx5tnmubZOx9vkYkJQCyGrr/wn4YYJJmL7Hjhuee5aepIy78eDc25AiEa0iiA6aPtxiXcncZS2kyJvE5a6Q n0QIMT/Q2hthb/dl3I9MU=|20001000000100005867||\";s:4:\"sha1\";s:40:\"4d9d572d8435adc14c097a1d62fd0174155f8237\";}'),
(21, 636, 'Pago%20en%20Una%20Sola%20Exhibicion', '', 'Efectivo', '16', 'peso', 1.00, '0', '0', 1, 0, 0, 15, 1, '', '2.0', 'A', 1, '2013-03-06 14:40:24', 'pvUrKTCFx7XD5XDd0txvUFQLHp21K0TIdrXRv0ad7qkaoEf/vTRlX6PGXfZLh4w4oz+rFWcXkTdoQtNQYKUrZsJCGBl1PpeQrt1tTOJN5IhmfaWq7TqOHGjIfnOR7AlzW8bDSJlba/wNvtDb6IJNYtoxy6jfagnJPbG+j+PGkhI=', 0, 0, '00001000000201889852', 'MIIEdDCCA1ygAwIBAgIUMDAwMDEwMDAwMDAyMDE4ODk4NTIwDQYJKoZIhvcNAQEFBQAwggGVMTgwNgYDVQQDDC9BLkMuIGRlbCBTZXJ2aWNpbyBkZSBBZG1pbmlzdHJhY2nDs24gVHJpYnV0YXJpYTEvMC0GA1UECgwmU2VydmljaW8gZGUgQWRtaW5pc3RyYWNpw7NuIFRyaWJ1dGFyaWExODA2BgNVBAsML0FkbWluaXN0cmFjacOzbiBkZSBTZWd1cmlkYWQgZGUgbGEgSW5mb3JtYWNpw7NuMSEwHwYJKoZIhvcNAQkBFhJhc2lzbmV0QHNhdC5nb2IubXgxJjAkBgNVBAkMHUF2LiBIaWRhbGdvIDc3LCBDb2wuIEd1ZXJyZXJvMQ4wDAYDVQQRDAUwNjMwMDELMAkGA1UEBhMCTVgxGTAXBgNVBAgMEERpc3RyaXRvIEZlZGVyYWwxFDASBgNVBAcMC0N1YXVodMOpbW9jMRUwEwYDVQQtEwxTQVQ5NzA3MDFOTjMxPjA8BgkqhkiG9w0BCQIML1Jlc3BvbnNhYmxlOiBDZWNpbGlhIEd1aWxsZXJtaW5hIEdhcmPDrWEgR3VlcnJhMB4XDTEyMDkwNTE1MDQyNloXDTE2MDkwNTE1MDQyNlowgbUxIzAhBgNVBAMTGkRBTklFTCBBTEZPTlNPIExPUEVaIEFOR0VMMSMwIQYDVQQpExpEQU5JRUwgQUxGT05TTyBMT1BFWiBBTkdFTDEjMCEGA1UEChMaREFOSUVMIEFMRk9OU08gTE9QRVogQU5HRUwxFjAUBgNVBC0TDUxPQUQ4NTA1MTFTWDMxGzAZBgNVBAUTEkxPQUQ4NTA1MTFIQ1NQTk4wNjEPMA0GA1UECxMGbWF0cml6MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDCQ2peNeLvW2O0DTXeqwLrR+fKIT/Q1wsNMZUSh4Jbaj6lJWnBJxb7iR0hZbRB5ANAW5yQHNd+lEQQJPgNPd7eaRbS+7nCuI7KOYTEWWeFhLpqWEL2pMxOxnvGDdc1qI54SXUDarAq/SXrRtfuYqZw3+fEDt/f0A4xttAfrnF8rwIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQUFAAOCAQEAoBzuCpmK5Q1/Cvjlv4yL1/7iQHtB5XNyGR+LXQkX2/t/DjazyiAQgQFlIGHysrHCvxGKtpoUn8cFqEHcUydDJBDcsGNyaBGlfVmsRvv0MCCST9mYq1DCslHRo7cuf4C+6sN11TDTGI5J3oD9ev2zTo8SCup71bGbdPO0TH/H/6oQhoJIaw/CaMAuOIS0dFn2sbva/dstVPPHk6jg/nM6Pc5hKe9joGaf0zZfgylyneWU+Djfk5Arf7qBsmo2fNk+RWFGEFkiFQJdQElRMlg3xGmXuOmcbV+PAMJcNwPOqdFJho8fw5fG8j/tBjeB1gzlr8w6N4ckMyD74xvjJ06h1g==', 21.000000, 0.000000, '', 24.360001, 'ingreso', '||3.2|2013-03-06T14:40:24|ingreso|Pago en Una Sola Exhibicion|21.00|0.00|1.00|peso|24.36|Efectivo|matriz|0704|LSF100610LS2|DEMO FACTURASE|DEMO|13|45|DEMO|DEMO|DEMO|DEMO|DEMO|DEMO|11111|R??©gimen de las Personas F??­sicas con Actividades Empresariales y Profesionales|PEHM8003214EA|Miguel Angel perez Hernandez|Calle central norte|345|Potinaspack|tuxtla gutierrez|Chiapas|Mexico|34553|1.00|kg|01|Botana para el cliente|12.00|12.00|1.00|pieza|02|Refresco de cola|9.00|9.00|IVA|0.00|ISR|0.00|0.00|IVA|16.00|3.36|IEPS|0.00|0.00|3.36||', '15_A_1', 1, '0', 3.360000, 'I', NULL, '2013-03-06', NULL, 'a%3A9%3A%7Bs%3A16%3A%22datosFacturacion%22%3Bs%3A644%3A%22userId%3D636%26rfc%3DPEHM8003214EA%26razonSocial%3DMiguel%2520Angel%2520perez%2520Hernandez%26calle%3DCalle%2520central%2520norte%26noExt%3D345%26noInt%3D%26colonia%3DPotinaspack%26municipio%3Dtuxtla%2520gutierrez%26estado%3DChiapas%26localidad%3D%26cp%3D34553%26pais%3DMexico%26referencia%3D%26email%3Djvelazquez%2540trazzos.com%26formaDePago%3DPago%2520en%2520Una%2520Sola%2520Exhibicion%26condicionesDePago%3D%26metodoDePago%3DEfectivo%26NumCtaPago%3D0704%26tasaIva%3D16%26tiposDeMoneda%3Dpeso%26porcentajeRetIva%3D0%26porcentajeIEPS%3D%26porcentajeDescuento%3D%26tipoDeCambio%3D%26porcentajeRetIsr%3D0%26tiposComprobanteId%3D1-51%26sucursalId%3D1%26cantidad%3D1%26noIdentificacion%3D02%26unidad%3Dpieza%26valorUnitario%3D9%26excentoIva%3Dno%26descripcion%3DRefresco%2520de%2520cola%26observaciones%3D%22%3Bs%3A13%3A%22observaciones%22%3Bs%3A0%3A%22%22%3Bs%3A6%3A%22reviso%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22autorizo%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22recibio%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22vobo%22%3Bs%3A0%3A%22%22%3Bs%3A4%3A%22pago%22%3Bs%3A0%3A%22%22%3Bs%3A3%3A%22spf%22%3BN%3Bs%3A3%3A%22isn%22%3BN%3B%7D', 'No nos ha realizado los pagos', NULL, 'a%3A2%3A%7Bi%3A1%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A2%3A%2201%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A2%3A%22kg%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A12%3Bs%3A7%3A%22importe%22%3Bd%3A12%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A22%3A%22Botana+para+el+cliente%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7Di%3A2%3Ba%3A9%3A%7Bs%3A16%3A%22noIdentificacion%22%3Bs%3A2%3A%2202%22%3Bs%3A8%3A%22cantidad%22%3Bd%3A1%3Bs%3A6%3A%22unidad%22%3Bs%3A5%3A%22pieza%22%3Bs%3A13%3A%22valorUnitario%22%3Bd%3A9%3Bs%3A7%3A%22importe%22%3Bd%3A9%3Bs%3A10%3A%22excentoIva%22%3Bs%3A2%3A%22no%22%3Bs%3A11%3A%22descripcion%22%3Bs%3A16%3A%22Refresco+de+cola%22%3Bs%3A17%3A%22categoriaConcepto%22%3Bs%3A0%3A%22%22%3Bs%3A7%3A%22tasaIva%22%3Bd%3A16%3B%7D%7D', 'N%3B', 'a:9:{s:14:\"schemaLocation\";s:122:\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd\";s:7:\"version\";s:3:\"1.0\";s:4:\"UUID\";s:36:\"8872510C-7E57-4A12-B307-C78DA1B1FAA0\";s:13:\"FechaTimbrado\";s:19:\"2013-03-06T14:40:26\";s:8:\"selloCFD\";s:172:\"pvUrKTCFx7XD5XDd0txvUFQLHp21K0TIdrXRv0ad7qkaoEf/vTRlX6PGXfZLh4w4oz+rFWcXkTdoQtNQYKUrZsJCGBl1PpeQrt1tTOJN5IhmfaWq7TqOHGjIfnOR7AlzW8bDSJlba/wNvtDb6IJNYtoxy6jfagnJPbG+j+PGkhI=\";s:16:\"noCertificadoSAT\";s:20:\"20001000000100005867\";s:8:\"selloSAT\";s:172:\"q/HsdiSZCmRMzzbGFvtnltLKaaDmBtBPmOSbneb4e/he7Sw48qKAExvvwxBkzDtLRHCqTdXbPIyJfAqlY7y89sFW8e8CKQMo+NHTaSnha+0EObVh7R2o/YoRNT3NCLAPrxd9fyVajXnPUpfKteS+uOszw0YRV4CX3BzV7aKThec=\";s:8:\"original\";s:258:\"||1.0|8872510C-7E57-4A12-B307-C78DA1B1FAA0|2013-03-06T14:40:26|pvUrKTCFx7XD5XDd0txvUFQLHp21K0TIdrXRv0ad7qkaoEf/vTRlX6PGXfZLh4w4oz rFWcXkTdoQtNQYKUrZsJCGBl1PpeQrt1tTOJN5IhmfaWq7TqOHGjIfnOR7AlzW8bDSJlba/wNvtDb6IJNYtoxy6jfagnJPbG j PGkhI=|20001000000100005867||\";s:4:\"sha1\";s:40:\"b33c522c460fd4423b31bf6bd142c689db8bb429\";}');

-- --------------------------------------------------------

--
-- Table structure for table `concepto`
--

DROP TABLE IF EXISTS `concepto`;
CREATE TABLE IF NOT EXISTS `concepto` (
  `comprobanteId` int(11) NOT NULL,
  `cantidad` float(10,2) NOT NULL,
  `unidad` varchar(255) DEFAULT NULL,
  `noIdentificacion` varchar(255) DEFAULT NULL,
  `descripcion` mediumtext NOT NULL,
  `valorUnitario` float(10,2) NOT NULL,
  `excentoIva` enum('no','si') NOT NULL DEFAULT 'no',
  `importe` float(10,2) NOT NULL,
  `userId` int(11) NOT NULL,
  `empresaId` int(11) NOT NULL,
  `conceptoId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`conceptoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `escuela` varchar(255) NOT NULL DEFAULT 'INSTITUTO DE ADMINISTRACION PUBLICA DEL ESTADO DE CHIAPAS',
  `localidad` varchar(255) NOT NULL DEFAULT 'TUXTLA GUTIERREZ',
  `clave` varchar(255) NOT NULL DEFAULT 'TUXTLA GUTIERREZ',
  `municipio` varchar(255) NOT NULL DEFAULT 'TUXTLA GUTIERREZ',
  `respServiciosEscolares` varchar(255) NOT NULL DEFAULT 'LIC. EMELINA ALVAREZ TORRES',
  `jefeOficina` varchar(255) NOT NULL DEFAULT 'ARQ. CARLOS VAZQUEZ LOZADA',
  `presidente` varchar(255) NOT NULL DEFAULT 'LIC. ADRIANA CAMACHO PIMIENTA',
  `directorAcademico` varchar(255) NOT NULL DEFAULT 'LIC. HELENA JIMENEZ MARTINEZ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`escuela`, `localidad`, `clave`, `municipio`, `respServiciosEscolares`, `jefeOficina`, `presidente`, `directorAcademico`) VALUES
('INSTITUTO DE ADMINISTRACION PUBLICA DEL ESTADO DE CHIAPAS', 'TUXTLA GUTIERREZ', '07PBT0381E', 'TUXTLA GUTIERREZ', 'LIC. EMELINA ALVAREZ TORRES', 'ARQ. CARLOS VAZQUEZ LOZADA', 'LIC. ADRIANA CAMACHO PIMIENTA', 'LUIS ENRIQUE ALVARADO GORDILLO');

-- --------------------------------------------------------

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `configId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  PRIMARY KEY (`configId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `confirma_inscripcion`
--

DROP TABLE IF EXISTS `confirma_inscripcion`;
CREATE TABLE IF NOT EXISTS `confirma_inscripcion` (
  `confirmaInscripcionId` int(11) NOT NULL AUTO_INCREMENT,
  `courseModuleId` int(11) NOT NULL,
  `reinscrito` enum('no','si') NOT NULL,
  `nivel` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`confirmaInscripcionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseId` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` int(11) NOT NULL,
  `initialDate` date NOT NULL,
  `finalDate` date NOT NULL,
  `daysToFinish` int(4) NOT NULL,
  `active` enum('si','no') NOT NULL DEFAULT 'si',
  `modality` enum('Local','Online') NOT NULL DEFAULT 'Local',
  `access` mediumtext NOT NULL,
  `group` varchar(5) NOT NULL DEFAULT 'A',
  `turn` varchar(255) NOT NULL DEFAULT 'Matutino',
  `scholarCicle` varchar(255) NOT NULL,
  `libro` varchar(255) NOT NULL DEFAULT '03',
  `folio` varchar(255) NOT NULL DEFAULT '3',
  `backDiploma` varchar(255) NOT NULL DEFAULT 'DIRECTOR ACADEMICO',
  `ponenteText` varchar(255) NOT NULL DEFAULT 'PONENTE',
  `fechaDiploma` varchar(255) NOT NULL,
  `horario` varchar(255) NOT NULL,
  `dias` varchar(255) NOT NULL,
  `apareceTabla` enum('no','si') NOT NULL,
  `tarifaMtro` varchar(255) NOT NULL,
  `tarifaDr` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `tipo` enum('Cuatrimestre','Semestre') NOT NULL,
  `listar` enum('no','si') NOT NULL,
  PRIMARY KEY (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `subjectId`, `initialDate`, `finalDate`, `daysToFinish`, `active`, `modality`, `access`, `group`, `turn`, `scholarCicle`, `libro`, `folio`, `backDiploma`, `ponenteText`, `fechaDiploma`, `horario`, `dias`, `apareceTabla`, `tarifaMtro`, `tarifaDr`, `hora`, `subtotal`, `tipo`, `listar`) VALUES
(1, 8, '2019-08-10', '2019-08-31', 0, 'si', 'Local', '200|0|0|0', '', '', '', '', '', 'DIRECTOR ACADEMICO', 'PONENTE', '', '', '', 'si', '', '', '', '0.00', 'Cuatrimestre', 'si'),
(2, 8, '2019-07-31', '2008-01-21', 0, 'si', 'Local', '0|0|0|0', '', '', '', '', '', 'DIRECTOR ACADEMICO', 'PONENTE', '', '', '', 'no', '', '', '', '0.00', '', 'no'),
(3, 9, '2019-08-08', '2019-01-09', 0, 'si', 'Local', '0|0|0|0', '', '', '', '', '', 'DIRECTOR ACADEMICO', 'PONENTE', '', '', '', 'no', '', '', '', '0.00', '', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `course_module`
--

DROP TABLE IF EXISTS `course_module`;
CREATE TABLE IF NOT EXISTS `course_module` (
  `courseModuleId` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `subjectModuleId` int(11) NOT NULL,
  `initialDate` date NOT NULL,
  `finalDate` date NOT NULL,
  `fechaContrato` date NOT NULL,
  `inicioContrato` date NOT NULL,
  `finContrato` date NOT NULL,
  `fechaMateria` date NOT NULL,
  `noContrato` varchar(255) NOT NULL,
  `habilitarDescargaContrato` enum('no','si') NOT NULL,
  `daysToFinish` int(11) NOT NULL,
  `active` enum('no','si') NOT NULL,
  `access` varchar(255) NOT NULL,
  `calificacionValida` enum('no','si') NOT NULL,
  `evalDocenteCompleta` varchar(255) NOT NULL,
  `creditos` varchar(255) NOT NULL,
  `habilitarCalificar` enum('si','no') NOT NULL,
  `rutaActa` varchar(255) NOT NULL,
  `perfilParticipante` mediumtext NOT NULL,
  `duracion` varchar(255) NOT NULL,
  `numParticipantes` varchar(255) NOT NULL,
  `horario` varchar(255) NOT NULL,
  `objetivoParticular` mediumtext NOT NULL,
  `estructutaTematica` mediumtext NOT NULL,
  `estructuraTematica` mediumtext NOT NULL,
  `criteriosEvaluacion` mediumtext NOT NULL,
  `tecnicas` mediumtext NOT NULL,
  `bibliografias` mediumtext NOT NULL,
  `rutaCedula` varchar(255) NOT NULL,
  `rutaContrato` varchar(255) NOT NULL,
  `rutaContratoFirmado` varchar(255) NOT NULL,
  `rutaPlan` varchar(255) NOT NULL,
  `rutaCarta` varchar(255) NOT NULL,
  `periodo` mediumtext NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `rutaEncuadre` varchar(255) NOT NULL,
  `rutaRubrica` varchar(255) NOT NULL,
  `rutaInforme` varchar(255) NOT NULL,
  PRIMARY KEY (`courseModuleId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_module`
--

INSERT INTO `course_module` (`courseModuleId`, `courseId`, `subjectModuleId`, `initialDate`, `finalDate`, `fechaContrato`, `inicioContrato`, `finContrato`, `fechaMateria`, `noContrato`, `habilitarDescargaContrato`, `daysToFinish`, `active`, `access`, `calificacionValida`, `evalDocenteCompleta`, `creditos`, `habilitarCalificar`, `rutaActa`, `perfilParticipante`, `duracion`, `numParticipantes`, `horario`, `objetivoParticular`, `estructutaTematica`, `estructuraTematica`, `criteriosEvaluacion`, `tecnicas`, `bibliografias`, `rutaCedula`, `rutaContrato`, `rutaContratoFirmado`, `rutaPlan`, `rutaCarta`, `periodo`, `subtotal`, `rutaEncuadre`, `rutaRubrica`, `rutaInforme`) VALUES
(1, 1, 2, '2019-08-10', '2019-09-07', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', 'no', 0, 'si', '0|200|0|0', 'no', '', '', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', ''),
(2, 1, 1, '0000-00-00', '0000-00-00', '2019-01-10', '0000-00-00', '0000-00-00', '2019-02-10', '2/2019', 'no', 0, 'si', '0|200|0|0', 'no', '', '', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_module_personal`
--

DROP TABLE IF EXISTS `course_module_personal`;
CREATE TABLE IF NOT EXISTS `course_module_personal` (
  `personalId` int(11) NOT NULL,
  `courseModPId` int(11) NOT NULL AUTO_INCREMENT,
  `courseModuleId` int(11) NOT NULL,
  PRIMARY KEY (`courseModPId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_module_personal`
--

INSERT INTO `course_module_personal` (`personalId`, `courseModPId`, `courseModuleId`) VALUES
(200, 2, 2),
(200, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_module_score`
--

DROP TABLE IF EXISTS `course_module_score`;
CREATE TABLE IF NOT EXISTS `course_module_score` (
  `courseModuleScoreId` int(11) NOT NULL AUTO_INCREMENT,
  `courseModuleId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  PRIMARY KEY (`courseModuleScoreId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cuentapredialconcepto`
--

DROP TABLE IF EXISTS `cuentapredialconcepto`;
CREATE TABLE IF NOT EXISTS `cuentapredialconcepto` (
  `conceptoId` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `cuentaPredialConceptoId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cuentaPredialConceptoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cuentapredialparte`
--

DROP TABLE IF EXISTS `cuentapredialparte`;
CREATE TABLE IF NOT EXISTS `cuentapredialparte` (
  `conceptoId` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `cuentaPredialParteId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cuentaPredialParteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documentosprofesor`
--

DROP TABLE IF EXISTS `documentosprofesor`;
CREATE TABLE IF NOT EXISTS `documentosprofesor` (
  `documentosprofesorId` int(11) NOT NULL AUTO_INCREMENT,
  `documentoId` int(11) NOT NULL,
  `personalId` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  PRIMARY KEY (`documentosprofesorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `estadoId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(2) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `abrev` varchar(16) NOT NULL,
  `paisId` int(11) NOT NULL,
  PRIMARY KEY (`estadoId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='Tabla de Estados de la Rep??ca Mexicana';

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`estadoId`, `clave`, `nombre`, `abrev`, `paisId`) VALUES
(1, '01', 'Aguascalientes', 'Ags.', 1),
(2, '02', 'Baja California', 'BC', 1),
(3, '03', 'Baja California Sur', 'BCS', 1),
(4, '04', 'Campeche', 'Camp.', 1),
(5, '05', 'Coahuila', 'Coah.', 1),
(6, '06', 'Colima', 'Col.', 1),
(7, '07', 'Chiapas', 'Chis.', 1),
(8, '08', 'Chihuahua', 'Chih.', 1),
(9, '09', 'Distrito Federal', 'DF', 1),
(10, '10', 'Durango', 'Dgo.', 1),
(11, '11', 'Guanajuato', 'Gto.', 1),
(12, '12', 'Guerrero', 'Gro.', 1),
(13, '13', 'Hidalgo', 'Hgo.', 1),
(14, '14', 'Jalisco', 'Jal.', 1),
(15, '15', 'Mexico', 'Mex.', 1),
(16, '16', 'Michoacan', 'Mich.', 1),
(17, '17', 'Morelos', 'Mor.', 1),
(18, '18', 'Nayarit', 'Nay.', 1),
(19, '19', 'Nuevo Leon', 'NL', 1),
(20, '20', 'Oaxaca', 'Oax.', 1),
(21, '21', 'Puebla', 'Pue.', 1),
(22, '22', 'Queretaro', 'Qro.', 1),
(23, '23', 'Quintana Roo', 'Q. Roo', 1),
(24, '24', 'San Luis Potos', 'SLP', 1),
(25, '25', 'Sinaloa', 'Sin.', 1),
(26, '26', 'Sonora', 'Son.', 1),
(27, '27', 'Tabasco', 'Tab.', 1),
(28, '28', 'Tamaulipas', 'Tamps.', 1),
(29, '29', 'Tlaxcala', 'Tlax.', 1),
(30, '30', 'Veracruz', 'Ver.', 1),
(31, '31', 'Yucatan', 'Yuc.', 1),
(32, '32', 'Zacatecas', 'Zac.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `estudioprofesor`
--

DROP TABLE IF EXISTS `estudioprofesor`;
CREATE TABLE IF NOT EXISTS `estudioprofesor` (
  `estudioprofesorId` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('lic','master','doc') NOT NULL,
  `escuela` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `estudio` int(11) NOT NULL,
  `titulo` enum('no','si') NOT NULL,
  `actaExamen` enum('no','si') NOT NULL,
  `cedula` enum('no','si') NOT NULL,
  `personalId` int(11) NOT NULL,
  PRIMARY KEY (`estudioprofesorId`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estudioprofesor`
--

INSERT INTO `estudioprofesor` (`estudioprofesorId`, `tipo`, `escuela`, `carrera`, `estudio`, `titulo`, `actaExamen`, `cedula`, `personalId`) VALUES
(13, 'lic', 'ITTG', 'Ing. en Sistemas Computacionales', 0, 'si', 'no', 'si', 130),
(14, 'master', 'ITESM', 'Administración de Tecnologías de la Información', 0, 'si', 'no', 'si', 130),
(15, 'doc', 'SI', 'SI', 0, 'no', 'no', 'no', 130),
(16, 'lic', 'Instituto de Estudios Superiores de Chiapas', 'Licenciatura en Derecho', 0, 'si', 'si', 'si', 172),
(17, 'master', 'Instituto Nacional de Estudios Fiscales', 'Maestría en Derecho Constitucional y Amparo', 0, 'si', 'si', 'no', 172),
(18, 'doc', 'Instituto de Administración Pública, A.C.', 'Doctorado en Administración Pública', 0, 'no', 'no', 'no', 172),
(19, 'lic', 'UNIVERSIADAD AUTONOMA DE CHIAPAS', 'INGENIERO AGRONOMO', 0, 'si', 'si', 'si', 166),
(20, 'master', 'COLEGIO DE POSGRADUADOS', 'MAESTRO EN CIENCIAS', 0, 'si', 'si', 'no', 166),
(21, 'doc', 'AUBURN UNIVERSITY,  ALABAMA, USA', 'PHYLOSOPHY DOCTOR', 0, 'si', 'si', 'no', 166),
(22, 'lic', 'Universidad Iberoamericana', 'Ingeniería civil', 0, 'si', 'no', 'si', 147),
(23, 'master', 'Instituto de Administración Pública de Chiapas, A.C.', 'Administración y Políticas Públicas', 0, 'si', 'no', 'no', 147),
(24, 'doc', '', '', 0, 'no', 'no', 'no', 147),
(25, 'lic', 'Instituto de Estudios Superiores de Chiapas', 'Contador Público', 0, 'si', 'si', 'si', 154),
(26, 'master', 'Universidad de Zaragoza, España', 'Contabilidad y Finanzas', 0, 'si', 'si', 'no', 154),
(27, 'doc', 'Universidad de Zaragoza, España', 'Contabilidad y Finanzas', 0, 'si', 'si', 'no', 154),
(28, 'lic', 'Instituto de Estudios Superiores de Chiapas', 'Licenciatura en Derecho', 0, 'si', 'si', 'si', 171),
(29, 'master', 'Universidad Carlos III de Madrid', 'Master en de Derechos Fundamentales', 0, 'si', 'no', 'no', 171),
(30, 'doc', 'Instituto de Investigaciones Jurídicas UNACH', 'Doctorado en Derecho', 0, 'no', 'si', 'no', 171),
(31, 'lic', 'Facultad de Ciencias Sociales. UNACH', 'Licenciatura en economía', 0, 'si', 'si', 'si', 174),
(32, 'master', 'Centro de Estudios Superiores de México y Centroamérica. Universidad de Ciencias y Artes de Chiapas. (CESMECA-UNICACH)', 'Maestría en Ciencias Sociales y Humanísticas', 0, 'si', 'si', 'si', 174),
(33, 'doc', 'Centro de Estudios Superiores de México y Centroamérica. Universidad de Ciencias y Artes de Chiapas. (CESMECA-UNICACH)', 'Doctorado en Ciencias Sociales y Humanísticas', 0, 'si', 'si', 'si', 174),
(34, 'lic', 'Benemerita Universidad Autónoma de Puebla', 'Licenciatura en Administración Pública', 0, 'si', 'si', 'si', 127),
(35, 'master', 'Universidad Autónoma de Chiapas', 'Maestría en Administración con Formación en Organizaciones', 0, 'si', 'si', 'si', 127),
(36, 'doc', 'Instituto de Estudios Superiores de Chiapas', 'Doctorado en Administración', 0, 'si', 'si', 'si', 127),
(37, 'lic', 'MATEMÁTICAS', 'EDUCACIÓN PRIMARIA', 0, 'si', 'si', 'si', 161),
(38, 'master', 'UNIVERSIDAD PEDAGÓGICA NACIONAL-AJUSCO, CIUDAD DE MEXICO', 'PEDAGOGÍA', 0, 'si', 'si', 'si', 161),
(39, 'doc', 'ICE-UNIVERSIDAD AUTÓNOMA DE OAXACA DE JUÁREZ', 'CIENCIAS DE LA EDUCACIÓN', 0, 'si', 'si', 'si', 161),
(40, 'lic', 'Instituto Tecnológico de Comitán ', 'Ingeniería en Sistemas Computacionales', 0, 'si', 'si', 'si', 179),
(41, 'master', 'Instituto Tecnológico de Tuxtla Gutierrez', 'Maestría en Ciencias de la Ingeniería en Mecatrónica', 0, 'si', 'si', 'si', 179),
(42, 'doc', '', '', 0, 'no', 'no', 'no', 179),
(43, 'lic', 'Facultad de Derecho de la Universidad Autónoma de Chiapas', 'Licenciatura en Derecho', 0, 'no', 'no', 'si', 143),
(44, 'master', 'INEF', 'Derecho Constitucional y Amparo', 0, 'no', 'no', 'si', 143),
(45, 'doc', 'INEF', 'Derecho Público', 0, 'no', 'no', 'si', 143),
(46, 'lic', 'FACULTAD DE CIENCIAS POLÍTICAS Y SOCIALES. UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO', 'Ciencias Políticas y Administración Pública (AP)', 0, 'si', 'no', 'si', 131),
(47, 'master', 'INSTITUTO NACIONAL DE ADMINISTRACIÓN PÚBLICA A.C.', 'Administración Pública', 0, 'si', 'no', 'si', 131),
(48, 'doc', '', '', 0, 'no', 'no', 'no', 131),
(49, 'lic', 'Instituto Tecnológico de Tuxtla Gutiérrez', 'Ingeniería Electrónica', 0, 'si', 'no', 'si', 176),
(50, 'master', 'Instituto Tecnológico de Estudios Superiores de Monterrey', 'Administración en Instituciones Educativas con acentuación en Educación Superior', 0, 'si', 'no', 'si', 176),
(51, 'doc', 'IESCH', 'Administración', 0, 'si', 'no', 'no', 176),
(52, 'lic', 'UNAM', 'Actuaria', 0, 'si', 'si', 'si', 183),
(53, 'master', 'El Colegio de México', 'Demografía', 0, 'si', 'no', 'si', 183),
(54, 'doc', 'Universidad Autónoma de Barcelona', 'Demografía', 0, 'si', 'no', 'no', 183),
(55, 'lic', 'UNIVERSIDAD AUTÓNOMA DEL ESTADO DE MÉXICO', 'CONTADOR PÚBLICO', 0, 'no', 'no', 'si', 184),
(56, 'master', 'INSTITUTO NACIONAL DE ADMINISTRACIÓN PÚBLICA //  UNIVERSIDAD AUTÓNOMA DEL ESTADO DE MÉXICO', 'ADMINISTRACIÓN PÚBLICA //  AUDITORÍA', 0, 'no', 'no', 'si', 184),
(57, 'doc', 'INSTITUTO NACIONAL DE ADMINISTRACIÓN PÚBLICA', 'ADMINISTRACIÓN PÚBLICA', 0, 'no', 'no', 'no', 184),
(58, 'lic', 'UNIVERSIDAD DE CIENCIAS Y ARTES DE CHIAPAS', 'LICENCIATURA EN PSICOLOGÍA', 0, 'si', 'si', 'si', 139),
(59, 'master', 'UNIVERSIDAD AUTÓNOMA DE NUEVO LEÓN', 'MAESTRÍA EN PSICOLOGÍA LABORAL', 0, 'si', 'si', 'si', 139),
(60, 'doc', 'UNIVERSIDAD PABLO GUARDADO CHAVEZ', 'DOCTORADO EN ALTA DIRECCIÓN Y NEGOCIOS (Cursando)', 0, 'no', 'no', 'no', 139),
(61, 'lic', 'Benemérita Universidad Autónoma de Puebla', 'Licenciatura en Computación', 0, 'si', 'no', 'si', 145),
(62, 'master', 'Institutos de Estudios Universitarios', 'Maestría en Administración', 0, 'si', 'no', 'si', 145),
(63, 'doc', '', '', 0, 'no', 'no', 'no', 145),
(64, 'lic', 'UNIVERSIDAD VERACRUZANA', 'LICENCIATURA EN NUTRICIÓN', 0, 'si', 'no', 'no', 117),
(65, 'master', 'INEF', 'MAESTRÍA EN CALIDAD', 0, 'si', 'no', 'no', 117),
(66, 'doc', 'IAP CHIAPAS', 'ADMINISTRACIÓN PÚBLICA', 0, 'no', 'no', 'no', 117),
(67, 'lic', 'Universidad Autónoma Metropolitana. Unidad Azcapotzalco.', 'Economía', 0, 'si', 'no', 'si', 137),
(68, 'master', 'Escuela Superior de Ingeniería y Arquitectura, Unidad Zacatenco. Instituto Politécnico Nacional.', 'Maestría en Ciencias en Administración, Planeación y Economía de los Hidrocarburos.', 0, 'si', 'no', 'si', 137),
(69, 'doc', 'Facultad de Derecho, Campus III de la Universidad Autónoma de Chiapas.', 'Doctorado en Derechos Humanos', 0, 'si', 'no', 'si', 137),
(70, 'lic', 'Universidad Nacional Autónoma de México', 'Ciencias Políticas y Administración Pública', 0, 'si', 'si', 'si', 159),
(71, 'master', 'Instituto Pensamiento y Cultura de América Latina (IPECAL)', 'Formación de Sujetos y Conciencia Histórica', 0, 'si', 'si', 'si', 159),
(72, 'doc', 'Instituto de Administración Pública de Chiapas', 'Administración Pública', 0, 'si', 'si', 'si', 159),
(73, 'lic', 'Universidad Pedagógica Nacional', 'Licenciatura en Intervención Educativa', 0, 'si', 'si', 'si', 187),
(74, 'master', 'Instituto de Estudio de Posgrado', 'Maestría en Docencia', 0, 'si', 'si', 'si', 187),
(75, 'doc', 'Universidad Autónoma de Chiapas', 'Doctorado en Estudios Regionales', 0, 'si', 'si', 'si', 187),
(76, 'lic', 'FACULTAD DE HUMANIDADES, CAMPUS IV, UNIVERSIDAD AUTÓNOMA DE CHIAPAS ', 'PEDAGOGÍA', 0, 'si', 'si', 'si', 186),
(77, 'master', 'FACULTAD DE HUMANIDADES, CAMPUS IV, UNIVERSIDAD AUTÓNOMA DE CHIAPAS ', 'PSICOPEDAGOGÍA ', 0, 'si', 'si', 'si', 186),
(78, 'doc', 'Consorcio de Ciencias Sociales y Humanidades, Universidad Autónoma de Chiapas ', 'Doctorado en Estudios Regionales', 0, 'no', 'si', 'no', 186),
(79, 'lic', 'Instituto Tecnológico y de Estudios Superiores de Monterrey Campus Monterrey', 'Economía', 0, 'si', 'si', 'si', 106),
(80, 'master', 'Instituto de Administración Pública del Estado de Chiapas A.C.', 'Administración y Gestión Pública', 0, 'si', 'si', 'si', 106),
(81, 'doc', 'Universidad Autónoma de Chiapas', 'Estudios Regionales', 0, 'si', 'si', 'si', 106),
(82, 'lic', 'Universidad Autónoma de Chiapas', 'Pedagogía', 0, 'si', 'si', 'si', 175),
(83, 'master', 'Universidad Autónoma de Chiapas', 'Maestría en Educación Superior', 0, 'si', 'si', 'si', 175),
(84, 'doc', 'Universidad de Málaga', 'Política Educativa en la Sociedad Neoliberal', 0, 'si', 'si', 'si', 175),
(85, 'lic', 'INSTITUTO TECNOLÓGICO SUPERIOR DE CINTALAPA', 'INGENIERO EN SISTEMAS  COMPUTACIONALES', 0, 'si', 'si', 'si', 118),
(86, 'master', 'UNIVERSIDAD VALLE DEL GRIJALVA', 'MAESTRÍA EN CIENCIAS DE LA COMPUTACIÓN', 0, 'si', 'si', 'si', 118),
(87, 'doc', 'UNIVERSIDAD DE GUADALAJARA', 'DOCTORADO EN SISTEMAS Y AMBIENTES EDUCATIVOS', 0, 'no', 'no', 'no', 118),
(88, 'lic', 'Escuela Profesional de Contabilidad y Administración', 'Administración de la computación', 0, 'no', 'no', 'si', 181),
(89, 'master', 'Instituto Estudios Universitarios, A.C.', 'Maestria en administración', 0, 'no', 'no', 'si', 181),
(90, 'doc', 'Instituto Nacional Estudios Fiscales, A.C', 'Derecho Público/ Doctorado en Educación', 0, 'no', 'no', 'si', 181),
(91, 'lic', 'Universidad Nacional Autónoma de México', 'Licenciado en Psicología ', 0, 'si', 'no', 'si', 109),
(92, 'master', 'Universidad Nacional Autónoma de México ', 'Maestría en Administración', 0, 'si', 'no', 'si', 109),
(93, 'doc', '', '', 0, 'no', 'no', 'no', 109),
(94, 'lic', 'UNIVERSIDAD VALLE DEL GRIJALVA', 'CONTADURÍA PÚBLICA', 0, 'si', 'si', 'si', 148),
(95, 'master', 'UNIVERSIDAD VALLE DEL GRIJALVA', 'FINANZAS ESTRATÉGICAS', 0, 'si', 'si', 'si', 148),
(96, 'doc', 'INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE CHIAPAS', 'EN ADMINISTRACIÓN PÚBLICA', 0, 'si', 'si', 'no', 148),
(97, 'lic', 'FACULTAD DE CIENCIAS AGRONOMICAS CAMPUS V UNACH', 'INGENIERO AGRONOMO EN PRODUCCIÓN ANIMAL', 0, 'si', 'si', 'si', 189),
(98, 'master', 'UNIVERSIDAD DEL SUR', 'MAESTRO EN PEDAGOGIA', 0, 'si', 'si', 'no', 189),
(99, 'doc', 'UNIVERSIDAD DEL SUR', 'DOCTOR EN EDUCACIÓN', 0, 'si', 'si', 'no', 189),
(100, 'lic', 'Instituto Tecnológico de Tuxtla Gutiérrez', 'Ingeniería en sistemas computacionales', 0, 'si', 'si', 'si', 188),
(101, 'master', 'Universidad Autónoma de Chiapas', 'Maestría en Ciencias con Especialidad en Matemática Educativa', 0, 'si', 'si', 'si', 188),
(102, 'doc', 'Universidad Autónoma de Chiapas', 'Doctorado en Estudios Regionales (línea Educación, Actores y Procesos de Enseñanza-Aprendizaje)', 0, 'si', 'si', 'si', 188),
(103, 'lic', 'UNIVERSIDADA IBEROAMERICANA, CAMPUS CIUDAD DE MÉXICO, MÉXICO', 'CIENCIAS POLÍTICAS Y ADMINISTRACIÓN PÚBLICA', 0, 'si', 'no', 'no', 129),
(104, 'master', 'UNIVERSIDAD DE MANCHESTER, INGLATERRA, REINO UNIDO', 'POLÍTCA SOCIAL Y GESTIÓN SOCIAL', 0, 'si', 'no', 'no', 129),
(105, 'doc', 'UNIVERSIDAD DE LONDRES, INGLATERRA, REINO UNIDO', 'EN FILOSOFÍA', 0, 'si', 'no', 'no', 129),
(106, 'lic', 'Universidad Autónoma de Chiapas', 'Pedagogía', 0, 'si', 'si', 'si', 190),
(107, 'master', 'Instituto de Estudios Superiores de Chiapas', 'Administración en Educación Superior', 0, 'si', 'si', 'si', 190),
(108, 'doc', 'Universidad del Sur', 'Educación', 0, 'si', 'si', 'no', 190),
(109, 'lic', 'FACULTAD DE LENGUAS, TUXTLA UNIVERSIDAD AUTÓNOMA DE CHIAPAS', 'LICENCIATURA EN LA ENSEÑANZA DEL INGLÉS', 0, 'si', 'no', 'si', 192),
(110, 'master', 'FACULTAD DE LENGUAS TUXTLA, UNIVERSIDAD AUTÓNOMA DE CHIAPAS', 'MAESTRÍA EN DIDÁCTICA DE LAS LENGUAS', 0, 'si', 'si', 'no', 192),
(111, 'doc', '', '', 0, 'no', 'no', 'no', 192),
(112, 'lic', 'UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO', 'LICENCIATURA EN CIENCIAS POLÍTICAS Y ADMINISTRACIÓN PÚBLICA', 0, 'si', 'si', 'si', 193),
(113, 'master', 'UNIVERSIDAD VALLE DEL GRIJALVA', 'MAESTRÍA EN DOCENCIA E INVESTIGACIÓN', 0, 'si', 'si', 'si', 193),
(114, 'doc', 'UNIVERSIDAD DEL SUR', 'DOCTORADO EN EDUCACIÓN', 0, 'si', 'si', 'si', 193),
(115, 'lic', 'Facultad de Ciencias Políticas y Sociales de la UNAM', 'Ciencias Políticas y Administración Pública', 0, 'si', 'no', 'si', 141),
(116, 'master', 'Universidad del Valle de México', 'Administración en Sistemas de Calidad', 0, 'si', 'no', 'si', 141),
(117, 'doc', 'Instituto Nacional de Administración Pública', 'Administración Pública', 0, 'no', 'no', 'no', 141),
(118, 'lic', 'UNIERSIDAD ESTUDIOS SUPERIORES DE TUXTLA', 'LICENCIATURA EN DERECHO', 0, 'si', 'si', 'si', 115),
(119, 'master', 'INSTITUO NACIONAL DE ESTUDIOS FISCALES', 'CIENCIAS JURIDICO PENALES Y CRIMINOLOGICAS', 0, 'si', 'si', 'no', 115),
(120, 'doc', 'UNIVERSIDAD DEL SUR', 'DERECHO PENAL', 0, 'si', 'si', 'si', 115),
(121, 'lic', 'INSTITUTO TECNOLÓGICO Y DE ESTUDIOS SUPERIORES DE MONTERREY', 'LICENCIATURA EN CIENCIAS DE LA COMUNICACIÓN', 0, 'si', 'no', 'si', 196),
(122, 'master', 'INSTITUTO TECNOLÓGICO Y DE ESTUDIOS SUPERIORES DE MONTERREY', 'MAESTRÍA EN EDUCACIÓN CON ESPECIALIDAD EN COMUNICACIÓN', 0, 'si', 'no', 'si', 196),
(123, 'doc', 'INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE CHIAPAS', 'DOCTORADO EN ADMINISTRACIÓN PÚBLICA', 0, 'no', 'no', 'no', 196),
(124, 'lic', 'Universidad de Ciencias y Artes de Chiapas', 'Ingeniero Topógrafo Fotogrametrísta', 0, 'si', 'si', 'si', 195),
(125, 'master', 'Universidad Autónoma de Chiapas', 'Maestría en Desarrollo Urbano y Ordenamiento Territorial', 0, 'si', 'si', 'si', 195),
(126, 'doc', 'Universidad Mesoemricana', 'Doctorado en Educación (Área Matemática)', 0, 'no', 'si', 'no', 195),
(127, 'lic', 'Universidad Nacional Autónoma de México', 'Licenciatura en Sociología', 0, 'si', 'no', 'si', 191),
(128, 'master', 'Universidad Nacional Autónoma de Chapingo', 'Maestria en Ciencias de Sociología Rural', 0, 'si', 'no', 'si', 191),
(129, 'doc', 'Universidad Nacional Autónoma de Chapingo', 'Doctorado en Economía Agrícola', 0, 'no', 'no', 'no', 191),
(130, 'lic', 'SEP', 'Licienciatura en Educación Preescolar', 0, 'si', 'no', 'si', 198),
(131, 'master', 'INSTITUTO TECNOLOGICO Y DE ESTUDIOS SUPERIORES DE MONTERREY', 'Administración de Instituciones Educativas', 0, 'si', 'si', 'si', 198),
(132, 'doc', 'UNACH', 'Estudios Regionales', 0, 'no', 'no', 'no', 198),
(133, 'lic', 'FACULTAD DE CIENCIAS SOCIALES CAMPUS III', 'ECONOMIA', 0, 'si', 'no', 'si', 199),
(134, 'master', 'UNIVERSIDAD VALLE DEL GRIJALVA', 'CIENCIAS DE LA EDUCACIÓN CON FORMACIÓN EN DOCENCIA E INVESTIGACIÓN', 0, 'si', 'no', 'si', 199),
(135, 'doc', 'UNIVERSIDAD AUTONOMA DE CHIAPAS', 'DOCTOR EN ESTUDIOS REGIONALES', 0, 'no', 'si', 'no', 199),
(136, 'lic', 'Universidad Autónoma de Chiapas, Campus III ', 'en Derecho ', 0, 'si', 'no', 'si', 197),
(137, 'master', 'Instituto de Estudios Superiores de Chiapas \"Universidad Salazar\"', 'Derecho Constitucional y Amparo', 0, 'si', 'no', 'si', 197),
(138, 'doc', 'Universidad Autónoma de Chiapas/Universidad del Sur ', '', 0, 'si', 'no', 'si', 197),
(139, 'lic', 'Universidad Autónoma de Chiapas', 'Lic. en Informática', 0, 'si', 'no', 'si', 155),
(140, 'master', 'En Administración', 'Universidad Privada del Sur de México', 0, 'si', 'no', 'si', 155),
(141, 'doc', 'Administración Pública', 'Instituto de Administración Pública del Estado de Chiapas', 0, 'si', 'no', 'no', 155),
(142, 'lic', 'Escuela Normal Superior del Estado de Chiapas', 'Licenciatura en Educación Secundaria con especialidad en Matemáticas', 0, 'si', 'si', 'si', 182),
(143, 'master', 'Instituto de Estudios Superior de Monterrey (ITESM)', 'Maestría en Administración de Instituciones Educativas, con énfasis en educación básica', 0, 'si', 'si', 'si', 182),
(144, 'doc', '', '', 0, 'no', 'no', 'no', 182);

-- --------------------------------------------------------

--
-- Table structure for table `eval_alumno_docente`
--

DROP TABLE IF EXISTS `eval_alumno_docente`;
CREATE TABLE IF NOT EXISTS `eval_alumno_docente` (
  `evalalumnodocenteId` int(11) NOT NULL AUTO_INCREMENT,
  `courseModuleId` int(11) NOT NULL,
  `docenteId` int(11) NOT NULL,
  `alumnoId` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` mediumtext NOT NULL,
  PRIMARY KEY (`evalalumnodocenteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE IF NOT EXISTS `ficha` (
  `idFicha` int(10) NOT NULL AUTO_INCREMENT,
  `folioFicha` int(10) NOT NULL,
  `carrera` int(11) NOT NULL DEFAULT '1',
  `carrera2` int(11) NOT NULL DEFAULT '1',
  `carrera3` int(11) NOT NULL DEFAULT '1',
  `nombre` varchar(100) NOT NULL,
  `aPaterno` varchar(100) NOT NULL,
  `aMaterno` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `domicilioEstado` varchar(100) NOT NULL,
  `codigoPostal` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `curp` varchar(100) NOT NULL,
  `nombreTutor` varchar(100) NOT NULL,
  `apellidosTutor` varchar(100) NOT NULL,
  `domicilioTutor` varchar(100) NOT NULL,
  `telefonoTutor` varchar(100) NOT NULL,
  `nombreEscuelaProcedencia` varchar(100) NOT NULL,
  `tipoEscuelaProcedencia` varchar(100) NOT NULL,
  `claveEscuelaProcedencia` varchar(100) NOT NULL,
  `periodoId` int(11) NOT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  `status` enum('pendiente','autorizada','cancelada') NOT NULL DEFAULT 'pendiente',
  `modalidad` enum('escolarizado','semiescolarizado') NOT NULL DEFAULT 'escolarizado',
  `estadoSec` varchar(255) NOT NULL,
  `municipioSec` varchar(255) NOT NULL,
  `promedio` float(10,2) NOT NULL,
  `certificado` enum('si','no') NOT NULL DEFAULT 'no',
  `modalidadSec` enum('escolarizado','semiescolarizado','otro') NOT NULL DEFAULT 'escolarizado',
  PRIMARY KEY (`idFicha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `folio`
--

DROP TABLE IF EXISTS `folio`;
CREATE TABLE IF NOT EXISTS `folio` (
  `folioId` int(11) NOT NULL AUTO_INCREMENT,
  `folioActual` varchar(255) NOT NULL,
  `folioSiguiente` varchar(255) NOT NULL,
  `nomenclatura` varchar(255) NOT NULL,
  `tiposolicitudId` int(11) NOT NULL,
  `anio` varchar(255) NOT NULL,
  PRIMARY KEY (`folioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradereport`
--

DROP TABLE IF EXISTS `gradereport`;
CREATE TABLE IF NOT EXISTS `gradereport` (
  `gradereportId` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL,
  `generation` varchar(10) NOT NULL,
  `periodoId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `regularization` char(1) NOT NULL,
  PRIMARY KEY (`gradereportId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradereport_inter`
--

DROP TABLE IF EXISTS `gradereport_inter`;
CREATE TABLE IF NOT EXISTS `gradereport_inter` (
  `gradereportInterId` int(11) NOT NULL AUTO_INCREMENT,
  `alumnoId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `datetest` date NOT NULL,
  `scheduletestId` int(11) NOT NULL,
  `periodoId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  PRIMARY KEY (`gradereportInterId`),
  KEY `alumnoId` (`alumnoId`,`subjectId`,`scheduletestId`,`periodoId`,`semesterId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradereport_recur`
--

DROP TABLE IF EXISTS `gradereport_recur`;
CREATE TABLE IF NOT EXISTS `gradereport_recur` (
  `gradereportRecurId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del registro',
  `alumnoId` int(11) NOT NULL COMMENT 'id del alumno',
  `subjectId` int(11) NOT NULL COMMENT 'id de la materia reprobada',
  `periodoId` int(11) NOT NULL COMMENT 'id del perido en el que se reprobo la materia',
  `semesterId` int(11) NOT NULL COMMENT 'id del semestre en el que se reprobo la materia',
  PRIMARY KEY (`gradereportRecurId`),
  KEY `alumnoId` (`alumnoId`,`subjectId`,`periodoId`,`semesterId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='registro de alumnos de recursamiento';

-- --------------------------------------------------------

--
-- Table structure for table `gradereport_user`
--

DROP TABLE IF EXISTS `gradereport_user`;
CREATE TABLE IF NOT EXISTS `gradereport_user` (
  `gradReportUserId` int(11) NOT NULL AUTO_INCREMENT,
  `gradereportId` int(11) NOT NULL,
  `alumnoId` int(11) NOT NULL,
  `testIdentifier` varchar(50) NOT NULL,
  `datetest` date NOT NULL,
  `gradescore` decimal(5,2) NOT NULL,
  `scheduletestId` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  PRIMARY KEY (`gradReportUserId`),
  KEY `gradereportId` (`gradereportId`,`alumnoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupId`, `clave`, `name`) VALUES
(1, 'AM', 'AM'),
(2, 'BM', 'BM'),
(3, 'CM', 'CM'),
(4, 'DM', 'DM'),
(5, 'EM', 'EM'),
(6, 'FM', 'FM'),
(7, 'GM', 'GM'),
(8, 'HM', 'HM'),
(9, 'IM', 'IM'),
(10, 'JM', 'JM'),
(11, 'KM', 'KM'),
(12, 'LM', 'LM'),
(13, 'MM', 'MM');

-- --------------------------------------------------------

--
-- Table structure for table `groupdel`
--

DROP TABLE IF EXISTS `groupdel`;
CREATE TABLE IF NOT EXISTS `groupdel` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `majorId` int(11) NOT NULL,
  `specialityId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `periodoId` int(11) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group_subject`
--

DROP TABLE IF EXISTS `group_subject`;
CREATE TABLE IF NOT EXISTS `group_subject` (
  `gposubId` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  PRIMARY KEY (`gposubId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

DROP TABLE IF EXISTS `homework`;
CREATE TABLE IF NOT EXISTS `homework` (
  `homeworkId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `activityId` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `mime` varchar(255) NOT NULL,
  `confirmacion` varchar(255) NOT NULL,
  `dateUpdate` date NOT NULL,
  `countUpdate` varchar(255) NOT NULL,
  PRIMARY KEY (`homeworkId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`homeworkId`, `userId`, `activityId`, `nombre`, `path`, `date`, `mime`, `confirmacion`, `dateUpdate`, `countUpdate`) VALUES
(1, 713, 1, 'test', '713_1_team.JPG', '2019-08-10 13:16:29', 'image/jpeg', '190713065', '2019-08-10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `informacionaduaneraconcepto`
--

DROP TABLE IF EXISTS `informacionaduaneraconcepto`;
CREATE TABLE IF NOT EXISTS `informacionaduaneraconcepto` (
  `conceptoId` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `aduana` varchar(255) NOT NULL,
  `informacionAduaneraConceptoId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`informacionAduaneraConceptoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `informacionaduaneraparte`
--

DROP TABLE IF EXISTS `informacionaduaneraparte`;
CREATE TABLE IF NOT EXISTS `informacionaduaneraparte` (
  `conceptoId` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `aduana` varchar(255) NOT NULL,
  `informacionAduaneraParteId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`informacionAduaneraParteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

DROP TABLE IF EXISTS `institution`;
CREATE TABLE IF NOT EXISTS `institution` (
  `institutionId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_long` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) NOT NULL,
  `ubication` varchar(255) NOT NULL,
  `ubication_long` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `jefeOficina` varchar(255) NOT NULL,
  `presidente` varchar(255) NOT NULL,
  `respServiciosEscolares` varchar(255) NOT NULL,
  `directorAcademico` varchar(255) NOT NULL DEFAULT 'LIC. HELENA MARGARITA JIMENEZ JIMENEZ',
  `jefeServiciosEscolares` varchar(255) NOT NULL DEFAULT 'ING. JULIO MONTERO MEDEROS',
  PRIMARY KEY (`institutionId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`institutionId`, `name`, `name_long`, `identifier`, `ubication`, `ubication_long`, `phone`, `fax`, `jefeOficina`, `presidente`, `respServiciosEscolares`, `directorAcademico`, `jefeServiciosEscolares`) VALUES
(1, 'IAP', 'TRAZZOS', '07PSU0129J', 'TUXTLA GUTIERREZ, CHIAPAS.', 'LIBRAMIENTO NORTE PONINETE NO. 2718, COL. LADERA DE LA LOMA.', '961-12-5-15-08', '961-12-5-15-08', 'ARQ. CARLOS VAZQUEZ LOZADA', 'M.A. HARVEY GUTIÉRREZ ÁLVAREZ', 'LIC. ANA GLORIA CARVAJAL CRUZ', 'director', 'jefe');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `dueDate` date NOT NULL,
  `amount` float NOT NULL,
  `status` enum('Pagado','Por Pagar','Cancelado') NOT NULL DEFAULT 'Por Pagar',
  `Facturado` enum('si','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`invoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ipn`
--

DROP TABLE IF EXISTS `ipn`;
CREATE TABLE IF NOT EXISTS `ipn` (
  `ipnid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `user` bigint(21) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `trans` varchar(30) NOT NULL DEFAULT '0',
  `before` int(5) NOT NULL DEFAULT '0',
  `after` int(5) NOT NULL DEFAULT '0',
  `ipnstatus` tinyint(1) NOT NULL DEFAULT '0',
  `verified` varchar(15) NOT NULL DEFAULT '',
  `time` bigint(15) NOT NULL DEFAULT '0',
  `given` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`ipnid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipn`
--

INSERT INTO `ipn` (`ipnid`, `name`, `user`, `points`, `trans`, `before`, `after`, `ipnstatus`, `verified`, `time`, `given`) VALUES
(1, '', 114, 0, '7ES78916RK480333A', 0, 0, 1, 'Completed', 1360109764, '0'),
(2, '140', 114, 0, '3PD70401HE312760Y', 0, 0, 1, 'Completed', 1360167346, '0'),
(3, '140', 114, 0, '65T71622L9549492T', 0, 0, 1, 'Completed', 1360168044, '0'),
(4, '140', 114, 0, '69H14816LS424182R', 0, 0, 1, 'Completed', 1360168241, '0'),
(5, '140', 114, 0, '0GP75662SN069232N', 0, 0, 1, 'Completed', 1360168770, '0'),
(6, '140', 114, 0, '72V76995CF2198803', 0, 0, 0, 'Completed', 1360547090, '0'),
(7, '140', 114, 0, '2RE95647YN4128314', 0, 0, 1, 'Completed', 1360547186, '0'),
(8, '140', 114, 0, '6VD79840RC090825D', 0, 0, 1, 'Completed', 1360547828, '0'),
(9, '140', 114, 0, '4UT40576D77716744', 0, 0, 1, 'Completed', 1360547994, '0'),
(10, '140', 114, 0, '9JT80712LS438282T', 0, 0, 1, 'Completed', 1360548081, '0'),
(11, '140', 114, 0, '2G433067FG304935P', 0, 0, 1, 'Completed', 1360548293, '0');

-- --------------------------------------------------------

--
-- Table structure for table `kardex_calificacion`
--

DROP TABLE IF EXISTS `kardex_calificacion`;
CREATE TABLE IF NOT EXISTS `kardex_calificacion` (
  `karCalId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `majorId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `calif` decimal(10,2) NOT NULL,
  `typeCalifId` int(11) NOT NULL,
  `periodoId` int(11) NOT NULL,
  PRIMARY KEY (`karCalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
CREATE TABLE IF NOT EXISTS `major` (
  `majorId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` mediumtext,
  PRIMARY KEY (`majorId`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`majorId`, `name`, `description`) VALUES
(1, 'MAESTRIA', 'Maestria'),
(2, 'SEMINARIO', 'SEMINARIO'),
(3, 'DIPLOMADO', ''),
(4, 'ESPECIALIDAD', ''),
(5, 'CURSO', ''),
(17, 'CURSO - TALLER', ''),
(18, 'DOCTORADO', ''),
(34, 'LICENCIATURA', '');

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
CREATE TABLE IF NOT EXISTS `mensaje` (
  `mensajeId` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mensaje` mediumtext NOT NULL,
  `enviarId` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  PRIMARY KEY (`mensajeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mensaje_personal`
--

DROP TABLE IF EXISTS `mensaje_personal`;
CREATE TABLE IF NOT EXISTS `mensaje_personal` (
  `personalId` int(11) NOT NULL,
  `mensajeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_app`
--

DROP TABLE IF EXISTS `menu_app`;
CREATE TABLE IF NOT EXISTS `menu_app` (
  `menuAppId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `menuId` int(11) NOT NULL,
  `contenido` mediumtext NOT NULL,
  PRIMARY KEY (`menuAppId`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_app`
--

INSERT INTO `menu_app` (`menuAppId`, `nombre`, `menuId`, `contenido`) VALUES
(1, 'Nosotros', 0, ''),
(2, 'PRODIM', 0, ''),
(3, 'Red Conocer', 0, ''),
(4, 'Profesionalización', 0, ''),
(5, 'Redes Sociales', 6, '<br>\r\n<br>\r\n<center>\r\n    <table width=50% border=0 width=100% >\r\n        <tr>\r\n            <td><img src=\"http://www.iapchiapasenlinea.mx/images/face.png\" style=\"border-radius: 2%;\" /></td>\r\n            <td ><a target=\"_blank\" href=\'https://www.facebook.com/IAPChiapas/\'>Facebook</a></td>\r\n        </tr>\r\n        <tr>\r\n            <td><img src=\"http://www.iapchiapasenlinea.mx/images/twitter.png\" style=\"border-radius: 2%;\" /></td>\r\n            <td style><a target=\"_blank\" href=\'https://twitter.com/IapChiapas\'>Twitter</a></td>\r\n        </tr>\r\n        <tr>\r\n            <td><img src=\"http://www.iapchiapasenlinea.mx/images/insta.png\" style=\"border-radius: 2%;\" /></td>\r\n            <td><a target=\"_blank\" href=\'https://www.instagram.com/iapchiapas/\'>Instagram</a></td>\r\n        </tr>\r\n        <tr>\r\n            <td><img src=\"http://www.iapchiapasenlinea.mx/images/link.png\" style=\"border-radius: 2%;\" /></td>\r\n            <td><a target=\"_blank\" href=\'https://www.linkedin.com/in/iapchiapas/\'>LinkedIn</a></td>\r\n        </tr>\r\n    </table>\r\n</center>'),
(6, 'Contacto', 0, ''),
(7, 'Nosotros', 1, '<br>\n<br>\n<b>NOSOTROS</b>\n<br>\n<br>\nFue fundado el 22 de Junio de 1977.<br>\n\nEl IAP Chiapas coadyuva desde hace 40 años en el fortalecimiento de la gestión pública de los tres órdenes de gobierno, así como con la realización de investigación, consultoría y difusión del desarrollo de las ciencias administrativas, en beneficio de la sociedad.\n\n<br>\n<br>\n<b>MISIÓN</b></br>\nContribuir al fortalecimiento de la administración y la gestión pública en el estado de Chiapas, a través de la impartición del conocimiento de las mejores prácticas y experiencias a nivel nacional e internacional en administración pública, para la profesionalización y capacitación continua de los servidores públicos de los tres órdenes de gobierno, así como con la realización de investigación, consultoría y difusión del desarrollo de las ciencias administrativas, en beneficio de la sociedad.\n<br>\n<br>\n<b>VISIÓN</b><br>\nSer una institución académica y de investigación con reconocimiento a nivel nacional e internacional, por fomentar el compromiso social, ético y moral de sus egresados en el ejercicio del servicio público, a través de la difusión y estudio de las mejores prácticas y experiencias en el desarrollo de las ciencias administrativas, en el contexto de la profesionalización y desarrollo de capacidades y habilidades de quienes participan en la función pública.\n<br>\n<br>\n<b>OBJETIVOS</b>\n<br>\n<br>\n<li> Fomentar y realizar investigaciones sobre la teoría y práctica de la administración pública</li>\n<li>	Promover e impartir la enseñanza sobre la teoría y práctica de la administración pública</li>\n<li>	Impulsar el desarrollo de la administración pública en los tres niveles de gobierno</li>\n<li>	Prestar servicios de asesoría y consultoría a instituciones y personas de los sectores público, social y privado.</li>\n<li>	Propicias el intercambio de información y colaboración con instituciones afines.</li>\n<br>\n<br>\n<b>VALORES</b>\n<br>\n<br>\n<li>	Institucionalidad</li>\n<li>	Ética</li>\n<li>	Eficiencia</li>\n<li>	Eficacia</li>\n<li>	Economía</li>\n<li>	Calidad</li>'),
(8, 'Presidencia', 1, '<div style=\'text-align:center\'><b>M.A. Harvey Gutiérrez Álvarez</b><br>\nPresidente del Consejo Directivo del <br>\nInstituto de Administración Pública del \nEstado de Chiapas, A. C.\n</div><br><br>\n\n\nNació el 3 de junio de 1951 en Tecpatán, Chiapas.\n\n\n<br>\n<br>\n\n\n\n<b>GRADOS ACADÉMICOS</b>\n<br>\n<li>	Contador Público, Egresado de la Universidad Autonoma de Chiapas.</li>\n<li>	Maestro en Administración, por la Universidad Nacional Autónoma de México.</li>\n<li>	Maestria en Alta Dirección, por el Colegio de Graduados en Alta Dirección de la Ciudad de México.</li>\n<li>	Diplomados en Finanzas, Proyectos de Inversión y Habilidades Gerenciales por el Tecnológico de Monterrey. </li>\n<br><br>\n<b>EXPERIENCIA ACADÉMICA</b>\n<br>\n<br>\n<li>	Profesor de Tiempo Completo de la Universidad de Montemorelos, Nuevo León, una de las instituciones de educación superior más prestigiadas del país.</li>\n<li>	Ha impartido cursos de Posgrado en la Maestría de Administración de la UNACH.</li>\n<br><br>\n<b>LABOR ALTRUISTA</b>\n<br><br>\n<li>	Como ser humano se ha destacado por su labor de gestoría y altruismo que le ha permitido desde hace 20 años realizar obras de carácter social y filantrópico en todo el Estado de Chiapas, mediante la Fundación que lleva su nombre (FUNDACIÓN HARVEY GUTIÉRREZ).</li>\n<li>	Conocedor de las necesidades del campo, y por ello promotor y asesor de proyectos productivos en beneficio de Ejidatarios y Ganaderos.</li>\n<li>	La Cruz Roja Mexicana le entregó un reconocimiento por su altruismo, al apoyarla con despensas y ropa para los damnificados del huracán \"Stan\" que afectó a comunidades y municipios de la Costa de Chiapas, así como al prestarle las instalaciones adjuntas a la UVG que sirvieron como centros de acopio para sus actividades de ayuda humanitaria. </li>\n<br><br>\n<b>SU TRAYECTORIA EMPRESARIAL</b>\n<br><br>\n<li>Como ser humano se ha destacado por su labor de gestoría y altruismo que le ha permitido desde hace 20 años realizar obras de carácter social y filantrópico en todo el Estado de Chiapas, mediante la Fundación que lleva su nombre (FUNDACIÓN HARVEY GUTIÉRREZ).</li>\n<li>	Conocedor de las necesidades del campo, y por ello promotor y asesor de proyectos productivos en beneficio de Ejidatarios y Ganaderos.</li>\n<li>	La Cruz Roja Mexicana le entregó un reconocimiento por su altruismo, al apoyarla con despensas y ropa para los damnificados del huracán \"Stan\" que afectó a comunidades y municipios de la Costa de Chiapas, así como al prestarle las instalaciones adjuntas a la UVG que sirvieron como centros de acopio para sus actividades de ayuda humanitaria.</li>\n\n'),
(9, 'PRODIM', 2, '<br><b>PRODIM</b>\n<BR>\nPrograma de Desarrollo Institucional Municipal<BR>\n<BR>\n<BR>\nEl programa de Desarrollo Institucional Municipal (PRODIM), tiene por objeto promover un proceso de carácter integral, gradual y continuo, que permita elevar el nivel de desempeño del servidor público municipal, proporcionandole los conocimientos y herramientas necesarias para que realice adecuadamente las funciones del puesto que tiene asignado para que brinde un servicio útil, ágil y oportuno a la ciudadania.\n<BR>\n<BR>\nEs por esto que los funcionarios municipales que estan a cargo de la atención de los asuntos públicos tienen que actuar con mayor creatividad y eficiencia, lo que únicamente se logrará si se mantienen en una dinámica de capacitación, profesionalización y actualización acorde a los nuevos retos que plantea el desarrollo económico, la pluralidad política y la dinámica social.\n<BR>\n<BR>\nEl PRODIM es el resultado de la detección de las necesidades de capacitación de los funcionarios municipales y personal técnico-operativo de los gobiernos locales; con la finalidad de desarrollar un programa acorde a las necesidades reales para lograr administraciones municipales, política y estructuralmente sólidas, funcionales y eficientes que respondan a las necesidades y requerimientos de los tiempos actuales. \n<BR>\n<BR>\n<b>OBJETIVO:</b>\n<BR>\nCoadyuvar al fortalecimiento de la gestión pública municipal, a través de la capacitación, profesionalización, consultoría y asistencia técnica especializada a las autoridades municipales y funcionarios públicos municipales. \n<BR>\n<BR>\nDirigido a Autoridades municipales y funcionarios públicos municipales.\n<BR>\n<BR>\n\n<b>El programa se divide en:</b>\n<BR>\n<BR>\n<b>I.Cursos en sedes académicas del IAP-Chiapas.</b>\n<BR>\n<BR>\nLos cursos programados se desarrollarán en las 11 sedes académicas del IAP-Chiapas situados en municipios estratégicos del Estado.\n<BR>\n<BR>\n<b>II.Cursos denominados a la “Medida”.</b>\n<BR>\n<BR>\nImpartidos directamente en los H. Ayuntamientos Municipales a solicitud de estos contando con un catálogo de mas de 30 cursos.\n<BR>\n<BR>\n<b>III.Consultoría Municipal.</b>\n<BR>\n–Planes de Desarrollo Municipal.<BR>\n–Reglamento de la Administración Pública Municipal.<BR>\n–Manuales de Organización.<BR>\n–Reglamentos Municipales.<BR>\n–Mejora Regulatoria.<BR>\n'),
(10, 'Sedes', 2, '<b>CURSOS EN SEDES ACADÉMICAS</b>\n<BR>\n<BR>\n<li>Financiamiento Público del Ayuntamiento a Partir de los Recursos Públicos de los Programas Federales y de los Fondos de la Cámara de Diputados</li>\n<br>\n<li>	Cierre Presupuestal, Contable y Financiero del Ejercicio</li>\n<br>\n<li>	Elaboración del Presupuesto de Egresos</li>\n<br>\n<li>Elaboración del Plan de Trabajo para la Entrega-Recepción de la Administración Pública Municipal</li>\n<br>\n<li>	Ley de Contabilidad Gubernamental</li>\n<br>\n<li>	Obligaciones Fiscales del Gobierno Municipal ante El Sistema De Administración Tributaria (SAT)</li>\n<br>\n<li>	Presupuesto Basado en Resultados</li>\n<br>\n<li>	Seguridad Pública Municipal</li>\n<br>\n<li>	Administración de Recursos Humanos en la Administración Pública Municipal</li>\n<br>\n<li>	Auditoria Gubernamental a la Administración Pública Municipal</li>\n<br>\n<li>	Planeación Estratégica Municipal</li>\n<br>\n<li>	Ramo 33: Integración de Expedientes Técnicos</li>\n<br>\n<li>	Sistema de Precios Unitarios NEODATA y la Presupuestación de Obra</li>\n<br>\n<li>	La Transparencia y el Derecho a la Información Pública Estatal</li>\n<br>\n<li>	Administración y Evaluación de la Gestión Pública Municipal</li><br>\n<li>	Estrategias de Ingresos Catastrales</li>\n<br>\n<li>	Sistemas de Control y Gestión de Calidad</li>\n<br>\n<li>	Administración de los Ingresos Municipales</li>\n<br>\n<li>	Informática Básica</li>\n<br>\n<li>	Administración Financiera</li>\n<br>\n<li>	Auditoría Financiera y Técnica</li>\n'),
(11, 'A la Medida', 2, '<br>\n<b>CURSOS A LA MEDIDA</b>\n<br>\n<br>\n<li>	Relaciones Humanas y Trabajo en Equipo</li>\n<br>\n<li>	Las 9 Eses </li>\n<br>\n<li>	Administración y Gobierno Municipal </li>\n<br>\n<li>    Auditoria Interna </li>\n<br>\n<li>	Gestión Pública y Municipal</li>\n<br>\n<li>	Desarrollo de Reuniones Efectivas</li>\n<br>\n<li>	Estrategias de Ingresos Catastrales</li>\n<br>\n<li>	Taller de la Agenda desde lo Local</li>\n<br>\n<li>	Cómo lograr Objetivos a Corto Plazo</li>\n<br>\n<li>	Redacción de Documentos Oficiales</li>\n<br>\n<li>	Calidad en el Servicio Público Municipal</li>\n<br>\n<li>	Análisis del Marco Constitucional del Municipio</li>\n<br>\n<li>	Administración de Recursos Humanos</li>\n<br>\n<li>	Auditoría Financiara y Técnica</li>\n<br>\n<li>	Supervisión y Bitácora Electrónica de Obra Pública</li>\n<br>\n<li>	Presupuesto basado en Resultados</li>\n<br>\n<li>	Derecho Municipal</li>\n<br>\n<li>	Funcionamiento y Desempeño Efectivo de la Tesoreria Municipal</li>\n<br>\n<li>	Optimización de Inventarios</li>\n<br>\n<li>	Aspectos Relevantes de la Ley y de Obra Pública y Ley de Adquisiciones</li>\n<br>\n<li>	Reglamento Municipal</li>\n<li>	Transparencia y Rendición de Cuentas</li>\n<br>\n<li>	Estructura Orgánica Municipal</li>\n<br>\n<li>	Lineamientos del COPLADEM, Fondos Federales y Municipales</li>\n<br>\n<li>	Proyectos de Inversión Municipal</li>\n<br>\n<li>	Atribuciones y Obligaciones del Regidor y del Síndicos Municipal</li>\n<br>\n<li>	Responsabilidad de los Servidores Públicos Municipales</li>\n<br>\n<li>	Comunicación Efectiva</li>\n<br>\n<li>	Conflicto y Negociación</li>'),
(12, 'Red Conocer', 3, '<br><b>RED CONOCER</b>\n<br>\n<br>\nEl Sistema Nacional de Competencias, promovido por el CONOCER, es un Instrumento del Gobierno Federal que contribuye a la competitividad económica, al desarrollo educativo y al progreso social de México, con base en el fortalecimiento de las competencias de las personas.\n<br>\n<br>\nPara enfrentar con éxito los desafíos de los mercados cada vez más globalizados, México requiere de empresarios, trabajadores, docentes y servidores públicos más competentes. El Sistema Nacional de Competencias facilita los mecanismos para que las organizaciones e instituciones públicas y privadas, cuenten con personas más competentes.\n<br>\n<br>\nPara ello, surge la Los Estándares de Competencia, que son las definiciones de los conocimientos, habilidades, destrezas y actitudes requeridas, para que una persona realice cualquier actividad productiva, social o de gobierno, con un nivel de alto desempeño, definidos por los propios sectores.\n<br>\n<br>\nLas Entidades de Certificación y Evaluación (ECE) son las personas morales, organizaciones o instituciones públicas o privadas, unidades administrativas de alguna dependencia, entidad o su similar en los niveles de Gobierno Federal, Estatal o Municipal, acreditada por el CONOCER para capacitar, evaluar y/o certificar las competencias laborales de las personas, con base en Estándares de Competencia inscritos en el Registro Nacional de Estándares de Competencia, así como para acreditar, previa autorización del CONOCER, Centros de Evaluación y/o Evaluadores Independientes en uno o varios Estándares de Competencia en un periodo determinado.\n<br>\n<br>\nEl Instituto de Administración Pública del Estado de Chiapas A.C., es una Entidad de Certificación y Evaluación de Competencias Laborales (ECE213-15) en la cual podrás acreditar tus habilidades y eficiencia laboral de las actividades que desempeñas cotidianamente. \n\n'),
(13, 'Estandares de Competencia', 3, '<b>ESTÁNDARES DE COMPETENCIA</b>\n<br>\n<br>\nConsiste en la obtención de un certificado, que respalda, en términos de resultados, el conjunto de conocimientos, habilidades, destrezas y actitudes que requieres para realizar una actividad en el ámbito laboral, social, gobierno o educativo y que sirve como referente para evaluar tus competencias.\n<br>\n<br>\nEn el ECE del Instituto de Administración Pública del Estado de Chiapas A.C, te podemos capacitar, evaluar y certificar en los siguientes Estándares de Competencia:\n<br>\n<br>\n(cada uno de los elementos siguientes llevará a la página correspondiente, que se creará a continuación)\n<br>\n<br>\n<li>EC0076 Evaluación de la competencia de candidatos con base en Estándares de Competencia</li>\n<li>	EC0105 Atención al ciudadano en el sector público</li>\n<li>	EC0217 Impartición de cursos de formación del capital humano de manera presencial grupal</li>\n<li>	EC0462 Ejecución de las atribuciones de la secretaría del ayuntamiento</li>\n<li>	EC0625 Administración de la obra pública municipal</li>\n<li>	EC0689 Ejecución de las atribuciones de la hacienda pública municipal</li>\n<li>	EC0775 Administración de los servicios públicos municipales</li>\n<li>	EC0777 Ejecución de las atribuciones de la contraloría municipal</li>\n<li>	EC0778 Inscripción de actos y hechos jurídicos relativos al estado civil de las personas</li>\n<li>	EC0779 Transversalización de la perspectiva de género en la administración pública municipal</li>\n'),
(24, 'Profesionalización', 4, '<b>PROGRAMA DE PROFESIONALIZACIÓN GUBERNAMENTAL</b>\n<br>\n<br>\nEl Instituto de Administración Pública del Estado de Chiapas (IAP Chiapas), es una Asociación Civil, que tiene por objeto fortalecer el estudio y difusión de la Administración Pública en la entidad. \n<br>\n<br>\nPor lo anterior, el IAP Chiapas, ha diseñado el Programa de Profesionalización Gubernamental, como resultado de la detección de las necesidades de capacitación de las instituciones que integran la Administración Pública Estatal (APE). \n<br>\n<br>\nComo parte del Programa de Profesionalización Gubernamental, el IAP ha considerado la impartición de Posgrados, así como Diplomados, Seminarios, Talleres y otras actividades para el fortalecimiento académico, que permitan el desarrollo de capacidades y habilidades de quienes día a día hacen su labor cotidiana en la función pública.\n<br>\n<br>\n Este Programa permite la profesionalización de diversos niveles jerárquicos de la APE, ya que se consideran cursos de posgrado que requieren de un mayor grado de especialización, así como Seminarios y Cursos-Taller, que abarcan temas dirigidos a personal operativo, con lo cual la capacitación que se imparte a los servidores público del gobierno del estado es de carácter integral.\n<br>\n<br>\n<b>POSGRADOS:</b>\n<br>\n<br>\n<li>	Doctorado en Administración Pública (Presencial)</li>\n<br>\n<li>	Doctorado en Educación (Presencial y En Línea)</li>\n<br>\n<li>	Maestría en Administración y Políticas Públicas (Presencial y En Línea)</li>\n<br>\n<li>	Maestría en Educación (Presencial y En Línea)</li>\n'),
(25, 'Presencial', 4, '<b>DOCTORADO EN ADMINISTRACIÓN PÚBLICA (PRESENCIAL)</b>\n<br>\n<br>\n<b>Objetivo General</b><br>\nFormar expertos de manera sistematizada y rigurosa que contribuyan a la generación de conocimiento inédito y original para el fortalecimiento de la administración pública, tanto en los aspectos teóricos como aplicados. Que nutran a las organizaciones públicas al desarrollar proyectos y sistemas para mejorar su eficacia, así como la formulación, diseño, implementación y evaluación de políticas públicas que atiendan las demandas de la sociedad y el estado mexicano.\n<br>\n<br>\n<b>RVOE</b><br>\nPSU-185/2013.\n<br>\n<b>DURACIÓN</b><br>\nDesarrollado en 4 semestres.\n<br>\n<b>LUGAR</b><br>\<br>\n<b>DÍAS Y HORARIOS</b><br>\nSábados de 8:00 a 16:00 hrs.><br>\n\n<b>MAPA CURRICULAR</b>\nPrimer Semestre\n<br>\n<br>\n<li>Seminario de Pensadores Administrativos Clásicos.</li>\n<li>	Epistemología y Metodología Científica.</li>\n<li>Elaboración de la Investigación I.</li>\n\nSegundo Semestre<br>\n<li>	Seminario de Pensadores Administrativos Contemporaneos.</li>\n<li>	Hermenéutica Jurídica.</li>\n<li>	Elaboración de la Investigación II.</li>\n\nTercer Semestre<br>\n<li>	Análisis y Evaluación de Políticas Públicas.</li>\n<li>	Investigación Multidisciplinaria y Transdisciplinaria.</li>\n<li>	Elaboración de la Investigación III.</li>\n\nCuarto Semestre<br>\n <li>   Análisis del Discurso.</li>\n <li>   Elaboración de la Investigación IV.</li>\n<br>\n<br>\n<b>REQUISITOS</b>\n<li> 	Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n<li> 	Presentar un protocolo de investigación para la tesis de grado.</li>\n<li> 	Acudir a una entrevista con el comité de ingreso y selección.</li>\n<li> 	Original y dos copias de los siguientes documentos:</li>\n<li> 	Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos, firmada por el titular de la Dependencia.</li>\n<li> 	Acta de nacimiento (actualizada)</li>\n<li> 	Carta de exposición de motivos.</li>\n<li> 	Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n<li> 	Cédula de grado de Maestría.</li>\n<li> 	En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n<li> 	Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.</li>'),
(26, 'En Linea', 4, '<b>DOCTORADO EN EDUCACIÓN (PRESENCIAL Y EN LÍNEA)</b><br>\n<br>\n<b>Objetivo General</b><br>\nFormar doctores específicamente en los ámbitos de gestión, planeación y evaluación de la educación, capaces de basar su toma de decisiones en conocimientos provenientes de procesos investigativos, donde entran en juego sus aptitudes, habilidades, actitudes y valores adquiridos durante su formación y necesarios para las funciones a desarrollar en alguna instancia que conforma la estructura educativa.\n<br>\n<br>\n<b>RVOE</b><br>\nPSU-107/2014.\n<br>\n<b>DURACIÓN</b><br>\n5 semestres.\n<br>\n<b>PRESENCIAL	EN LÍNEA</b><br>\n<b>LUGAR</b><br>\n\n<br>\n<b>DÍAS Y HORARIOS</b><br>\nSábados de 8:00 a 16:00 hrs.<br>\n	SISTEMA DE EDUCACIÓN EN LÍNEA DEL IAP-CHIAPAS\nNuestro Sistema está disponible las 24 horas durante los 7 días de la semana, por lo cual el participante puede establecer sus horarios de estudio.\n\n<b>MAPA CURRICULAR</b><br>\n<br>\n<b>Primer Semestre</b><br>\n<li>Políticas Educativas.</li>\n<li>	Historia de las Instituciones Educativas.</li>\n<li>	Introducción a la Evaluación de Instituciones y Procesos en Educación.</li>\n<li>	Introducción a la investigación educativa.</li>\n\n<b>Segundo Semestre</b><br>\n<li>	Reformas Educativas.</li>\n<li>	Administración y Organización Escolar.</li>\n<li>	Modelos de Evaluación Académica y Administrativa.</li>\n<li>	Modelos de Investigación Evaluativa.</li>\n\n<b>Tercer Semestre</b><br>\n<li>	Modelos de Planeación de la Educación.</li>\n<li>	Del Paradigma de la Administración al Paradigma de la Gestión.</li>\n<li>	Modelos de Evaluación de Procesos y Resultados Educativos.</li>\n<li>	Elaboración de Proyectos de Gestión Educativa.</li>\n\n<b>Cuarto Semestre</b><br>\n<li>	Planeación de Instituciones Educativas.</li>\n<li>	Gestión de Instituciones Educativas.</li>\n<li>	Certificación de Instituciones y Procesos Educativos.</li>\n<li>	Taller I, de Seguimiento de Proyectos de Gestión Educativa.</li>\n\n<b>Quinto Semestre</b>\n<li>		Planes y Programas de Desarrollo Institucional.</li>\n<li>		Gestión del Currículum.</li>\n<li>		Acreditación de Programas Educativos.</li>\n<li>		Taller II, de Seguimiento de Proyectos de Gestión Educativa.</li>\n\n\n<b>REQUISITOS</b><br>\n\n<li>		Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n<li>		Presentar un protocolo de investigación para la tesis de grado.</li>\n<li>		Acudir a una entrevista con el comité de ingreso y selección.</li>\n<li>		Original y dos copias de los siguientes documentos:</li>\n<li>		Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos, firmada por el titular de la Dependencia.</li>\n<li>	Acta de nacimiento (actualizada)</li>\n<li>	Carta de exposición de motivos.</li>\n<li>	Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n<li>	Cédula de grado de Maestría.</li>\n<li>	En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n<li>	Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.</li>\n'),
(28, 'Facebook', 5, ''),
(29, 'Twitter', 5, ''),
(30, 'Linkedin', 5, ''),
(31, 'Instagram', 5, ''),
(32, 'Ubicación', 6, ''),
(34, 'Formulario de Contacto', 6, ''),
(36, 'Directorio ', 1, '<br><table border=\'0\' style=\'width:100%; text-align:center; font-size:10px;\'>\n<tr>\n	<td colspan=\'2\'>\n	<b>C.P. y M.A. HARVEY GUTIÉRREZ ÁLVAREZ</b><br>\n	Presidente del Consejo Directivo<br>\n	tel.(961) 125 1508, 125 1509, 125 1510<br>\n	Ext. 102<br>\n	hgutierrez@iapchiapas.org.mx<br>\n	<br>\n	<br>\n	<br>\n	<b>C.P. ELISEO MAHEDA LÓPEZ</b><br>\n	Secretario Ejecutivo><br>\n	Tel.(961) 125 1508, 125 1509, 125 1510\n	Ext. 107\n	eliseo@iapchiapas.org.mx><br>\n	<br>\n	<br>\n	<br>\n	</td>\n</tr>\n<tr>\n	<td>\n		<b>C.P. y L.D. ORFANEL TOALÁ RAMOS</b><br>\n		Director Académico<br>\n		Tel.(961) 125 1508, 125 1509, 125 1510<br>\n		Ext. 106<br>\n		otoala@iapchiapas.org.mx<br>\n\n	</td>\n	<td>\n		<b>C.P. y L.D. JOSÉ FEDERICO GUZMÁN HERNÁNDEZ</b><br>\n		Coordinador Administrativo<br>\n		Tel.(961) 125 1508, 125 1509, 125 1510<br>\n		EXT. 113<br>\n		jguzman@iapchiapas.org.mx<br>\n\n	</td>\n</tr>\n</table>'),
(38, 'Consultoria', 2, '<br><b>CONSULTORÍAS Y DIPLOMADOS</b>\n<br>\n<br>\n\n<b>CONSULTORÍAS</b>\n<br><br>\n<li>	Reglamentos </li>\n<li>	Manuales </li>\n<li>	Planes Municipales de Desarrollo </li>\n<br>\n<br>\n<b>DIPLOMADOS</b>\n<br><br>\n<li>	Gobierno y Administración Pública Municipal</li>\n<li>	Políticas Públicas para la Cultura Física y el Deporte</li>\n<li>	Inteligencia para la Seguridad y el Desarrollo Estatal</li>\n<li>	Contabilidad Gubernamental</li>\n'),
(40, 'Instalaciones', 0, ''),
(41, 'Consejo Directivo', 0, '<br>\n<table border=\'0\' style=\'width:100%; text-align:center; font-size:10px;\'>\n	<tr>\n		<td colspan=\'2\'>\n		<b>LIC. MANUEL VELASCO COELLO </b><br>\n		Presidente Honorífico<br><br>\n		<b>MTRO. HARVEY GUTIÉRREZ ÁLVAREZ </b><br>\n		Presidente del Consejo Directivo<br><br>\n		<b>LIC. FERNANDO CASTELLANOS CAL Y MAYOR</b> <br>\n		Vicepresidente<br><br>\n		<b>LIC. HUMBERTO PEDRERO MORENO </b><br>\n		Tesorero<br>\n		</td>\n	</tr>\n	<tr>\n		<td colspan=\'2\'>\n		<br>\n		<b>CONSEJEROS</b>\n		<br>\n		<br>\n		</td>\n	</tr>\n	<tr>\n		<td style=\'width:50%; text-align:center; font-size:10px;\'>\n			<b>LIC. JUAN CARLOS GÓMEZ ARANDA </b><br><br>\n			<b>MTRO. NAVOR FRANCISCO BALLINAS MORALES</b> <br><br>\n			<b>LIC. LUIS MANUEL GARCÍA MORENO</b><br><br>\n			<b>DR. FERNANDO ÁLVAREZ SIMÁN</b><br>\n		</td>\n		<td style=\'width:50%; text-align:center; font-size:10px;\'>\n			<b>DR. CARLOS EUGENIO RUÍZ HERNÁNDEZ </b><br><br>\n			<b>ING. ROBERTO DOMÍNGUEZ CASTELLANOS </b><br><br>\n			<b>C.P. MIGUEL AGUSTÍN LÓPEZ CAMACHO</b>  <br><br>\n			<b>LIC. JORGE DE LA VEGA DOMÍNGUEZ </b> \n	\n		</td>\n	</tr>\n</table>'),
(42, 'Estándar EC0076', 13, '<center><br><b>ESTÁNDAR EC0076</b>\n<br>\n<br>\n<b>“Evaluación de la competencia de candidatos con base en Estándares de Competencia”</b>\n</center>\n<br>\n<br>\n<br>\nPropósito del Estándar de Competencia:\n<br>\n<br>\nServir como referente para la evaluación y certificación de las personas que evalúan la competencia de candidatos con base en Estándares de Competencia y aseguran la excelencia en el proceso de evaluación de competencia.\n<br>\n<br>\nEste Estándar de Competencia contempla las funciones que una persona realiza para evaluar la competencia de candidatos con base en Estándares de Competencia cumpliendo los principios de transparencia, imparcialidad y objetividad.\n'),
(43, 'Estándar EC0105', 13, '<center><br><b>ESTÁNDAR EC0105\n<br>\n<br>\n“Atención al ciudadano en el sector público”<br>\n</b>\n</center>\n<br>\n<br>\nPropósito del Estándar de Competencia:\n<br>\n<br>\nServir como referente para la evaluación y certificación de las personas que prestan un servicio de atención personalizada al ciudadano en el Sector Público, desde la detección de las necesidades del servicio, la gestión y procesamiento de la información/documentación del servicio proporcionado, siguiendo los lineamientos institucionales.\n<br>\n<br>\nEste Estándar de Competencia expresa la competencia que una persona realiza para prestar atención personalizada al ciudadano en el sector público, conforme a los lineamientos establecidos en cada institución pública. Desde que atiende al ciudadano y detecta el tipo de servicio que requiere, de acuerdo a lo que expresa y las preguntas que el candidato le realiza, solicitando, verificando y procesando la información / documentación requerida para gestionar el servicio hasta la conclusión del mismo.\n'),
(44, 'Estándar EC0217', 13, '<center><br><b>ESTÁNDAR EC0217\n<br>\n<br>\n“Impartición de cursos de formación del capital humano de manera presencial grupal”</b></center>\n<br>\n<br>\nPropósito del Estándar de Competencia:\n<br>\nServir como referente para la evaluación y certificación de las personas que imparten cursos de formación del capital humano de manera presencial y grupal.\n<br>\n<br>\nEste estándar de competencia contempla las funciones sustantivas de preparar, conducir y evaluar cursos de capacitación. Preparar la sesión mediante la planeación de la sesión y la comprobación de la existencia y el funcionamiento de los recursos requeridos para la misma. Conducir la sesión realizando el encuadre, desarrollo y cierre, empleando técnicas instruccionales y grupales que faciliten el proceso de aprendizaje. Evaluar el aprendizaje antes, durante y al final del curso, considerando la satisfacción de los participantes.\n'),
(45, 'Estándar EC0462', 13, '<center><br><b>ESTÁNDAR EC0462\n<br>\n<br>\n“Ejecuciones de las atribuciones de la Secretaría del Ayuntamiento”</b></center><br>\n<br>\nPropósito del Estándar de Competencia:\n<br>\nServir como referente para la evaluación y certificación de las personas que ejecutan las atribuciones de Secretario del Ayuntamiento y que comprende la coordinación para la celebración de las sesiones de cabildo, la administración de los documentos oficiales del Ayuntamiento y la Administración Pública Municipal, la publicación de las disposiciones de observancia general y la coordinación administrativa de los acuerdos del Gobierno Municipal\n<br>\n<br>\nEste Estándar de Competencia expresa la competencia que una persona tiene para ejercer las atribuciones de Secretario del Ayuntamiento, que va desde convocar y llevar a cabo las sesiones de cabildo con los Integrantes del Ayuntamiento, dar seguimiento a los asuntos generados, llevar el control de la correspondencia oficial del ayuntamiento, expedir copias certificadas de los documentos del archivo municipal, citar a las sesiones del cabildo, levantar las actas de las sesiones, compilar todos los documentos oficiales emanados del ayuntamiento o del presidente municipal, certificar y publicar todas las disposiciones emanadas del ayuntamiento, auxiliar a las autoridades federales y estatales, formular el inventario general de bienes muebles e inmuebles del municipio, hacer cumplir los bandos, reglamentos, circulares y disposiciones de observancia general emitidos por el ayuntamiento y coordinar administrativamente los acuerdos del Gobierno Municipal.\n'),
(46, 'Estándar EC0625', 13, '<center><br><b>ESTÁNDAR EC0625\n<br>\n<br>\n\n“Administración de la Obra Pública Municipal”<br>\n<br></b></center>\nPropósito del Estándar de Competencia:\n<br>\nEvaluación y certificación de las personas que ejercen la función de Administración de la Obra Pública Municipal y que comprende desde realizar la planeación de la obra pública municipal, revisar la integración del expediente técnico inicial/base de la obra pública municipal, supervisar la contratación y ejecución de la obra pública municipal, hasta realizar la entrega-recepción de la obra pública municipal.\n<br>\n<br>\nDirigido a: Director de Obras Públicas, Jefe de Obras Públicas, Supervisor de Obra Públicas\n<br>\n<br>\nElementos que evalúa el estándar: 4\n<br>\n<br>\n<b>Elemento 1 de 4</b><br>\nRealizar la planeación de la Obra Pública Municipal<br>\n<b>Elemento 2 de 4</b><br>\nRevisar la integración del expediente técnico inicial/base de la obra pública municipal<br>\n<b>Elemento 3 de 4</b><br>\nSupervisar la contratación y ejecución de la obra pública municipal.<br>\n<b>Elemento 4 de 4</b><br>\nRealizar la Entrega-Recepción de la Obra Pública Municipal.<br>\n<br>\nDuración estimada de la evaluación: De 2 a 3 horas\n<br>\n<b>Proceso de evaluación:</b>\n<li>	Llenar: Ficha de registro, Evaluación diagnóstica, Foto para certificado y firma de acuse de derechos</li>\n<li>	Llevar el Curso de capacitación para certificación</li>\n<li>	Presentarse el día de evaluación para entregar Productos</li>\n<li>	Presentarse para recibir el certificado en un evento público</li>\n'),
(47, 'Estándar EC0689', 13, '<center><br><b>ESTÁNDAR EC0689\n<br><br>\n\n“Ejecución de las Atribuciones de la Hacienda Pública Municipal”</b><br></center>\n<br>\n<br>\nPropósito del Estándar de Competencia:<br>\n\nEvaluación y certificación de los servidores públicos que realizan la función de la Administración de la Hacienda Pública Municipal, lo cual incluye obtener los recursos financieros para el municipio, administrar el gasto público del municipio, gestionar los pasivos y disciplina financiera municipal, y transparentar y rendir cuentas de la hacienda pública municipal.\n<br>\n<br>\nDirigido a: Presidente Municipal, Regidor, Síndico, Secretario de Finanzas, Director de Finanzas, Secretario de Administración y Finanzas, Director de Administración y Finanzas, Director de Ingresos, Director de Egresos\n<br>\n<br>\nElementos que evalúa el estándar: 4<br>\n\n<b>Elemento 1 de 4</b><br>\nObtener los recursos financieros para el municipio.<br>\n<b>Elemento 2 de 4</b><br>\nCoordinar el anteproyecto de presupuesto de egresos para la administración del gasto público del municipio.<br>\n<b>Elemento 3 de 4</b><br>\nGestionar los pasivos y disciplina financiera municipal.<br>\n<b>Elemento 4 de 4</b><br>\nTransparentar y rendir cuentas de la hacienda pública municipal.<br>\n\nDuración estimada de la evaluación: De 3 a 4 horas<br>\n<br>\n<b>Proceso de evaluación:</b>\n<li>Llenar: Ficha de registro, Evaluación diagnóstica, Foto para certificado y firma de acuse de derechos</li>\n<li>	Llevar el Curso de capacitación para certificación</li>\n<li>	Presentarse el día de evaluación para entregar Productos</li>\n<li>	Presentarse para recibir el certificado en un evento público</li>\n'),
(48, 'Estándar EC0775', 13, '<center><br><b>ESTÁNDAR EC0775\n<br>\n<br>\n\n“Administración de los Servicios Públicos Municipales”<br></b>\n</center>\n<br>\n<br>\n\nPropósito del Estándar de Competencia:\n<br>\n<br>\n\nEvaluación y certificación de las personas que se desempeñan en la administración de los servicios públicos municipales.<br>\n\nDirigido a: Síndico, Regidor, Titular de Servicios Públicos Municipales<br>\n<br>\nElementos que evalúa el estándar: 2<br>\n<br>\n<b>Elemento 1 de 2</b><br>\nPlanear la prestación de los servicios públicos municipales.<br>\n<b>Elemento 2 de 2</b><br>\nImplementar los programas para la prestación de los servicios públicos municipales.<br>\n\nDuración estimada de la evaluación: 2 horas<br>\n\n<b>Proceso de evaluación:</b><br>\n<li>	Llenar: Ficha de registro, Evaluación diagnóstica, Foto para certificado y firma de acuse de derechos</li>\n<li>	Llevar el Curso de capacitación para certificación</li>\n<li>	Presentarse el día de evaluación para entregar Productos</li>\n<li>	Presentarse para recibir el certificado en un evento público</li>'),
(49, 'Estándar EC0777', 13, '<center><b>ESTÁNDAR EC0777\n<br>\n<br>\n\n“Ejecución de las Atribuciones de la Contraloría Municipal”</b></center>\n<br>\n<br>\n\nPropósito del Estándar de Competencia:\n<br>\n<br>\nEvaluación y certificación de las personas que se desempeñan en las funciones de control interno de la administración pública municipal.\n<br>\n<br>\n\nDirigido a: Regidor, Síndico, Titular del Órgano Interno de Control Municipal, Contralor administrativo\n<br>\n<br>\n\nElementos que evalúa el estándar: \n<br>\n<br>\n\n<b>Elemento 1 de 4</b><br>\nImplementar auditorias en materia de control interno en la administración pública municipal.<br>\n<b>Elemento 2 de 4</b><br>\nAtender quejas y denuncias en la administración pública municipal<br>\n<b>Elemento 3 de 4</b><br>\nSustanciar procedimientos administrativos de responsabilidades en la administración pública municipal<br>\n<b>Elemento 4 de 4</b><br>\nImplementar acciones de control y evaluación en materia de control interno en la administración pública municipal<br>\n\nDuración estimada de la evaluación: De 3 a 4 horas<br>\n\n<b>Proceso de evaluación:</b><br>\n<li>	Llenar: Ficha de registro, Evaluación diagnóstica, Foto para certificado y firma de acuse de derechos</li>\n<li>	Llevar el Curso de capacitación para certificación</li>\n<li>	Presentarse el día de evaluación para entregar Productos</li>\n<li>Presentarse para recibir el certificado en un evento público</li>\n'),
(50, 'Estándar EC0778', 13, '<center><br><b>ESTÁNDAR EC0778\n<br>\n<br>\n\n\n“Inscripción de Actos y Hechos Jurídicos Relativos al Estado Civil de las Personas”</b></center>\n<br>\nPropósito del Estándar de Competencia:\n<br>\n<br>\n\nEvaluación y certificación de los servidores públicos que realizan la inscripción del nacimiento, matrimonio y defunción de las personas.\n<br>\n<br>\nDirigido a: Juez de Registro Civil; Oficial del Registro Civil; Coordinadores y jefes de área en servicios legales; jueces calificadores y fiscales; Personal de la Secretaría municipal que orienta a las personas en estos trámites.\n<br>\n<br>\nElementos que evalúa el estándar: 3<br>\n<b>Elemento 1 de 3</b><br>\nInscribir el nacimiento de las personas<br>\n<b>Elemento 2 de 3</b><br>\nInscribir el matrimonio de las personas<br>\n<b>Elemento 3 de 3</b><br>\nInscribir la defunción de las personas<br>\n<br>\n<br>\nDuración estimada de la evaluación: De 2 a 3 horas<br>\n<br>\n<b>Proceso de evaluación:</b><br>\n<li>	Llenar: Ficha de registro, Evaluación diagnóstica, Foto para certificado y firma de acuse de derechos</li>\n<li>	Llevar el Curso de capacitación para certificación</li>\n<li>	Presentarse el día de evaluación para entregar Productos</li>\n<li>	Presentarse para recibir el certificado en un evento público</li>\n'),
(51, 'Estándar EC0779', 13, '<center><br><b>ESTÁNDAR EC0779\n<br>\n<br>\n“Transversalización de la Perspectiva de Género en la Administración Pública Municipal”</b>\n</center>\n<br>\n<br>\nPropósito del Estándar de Competencia:\n<br>\n<br>\nEvaluación y certificación de las personas que se desarrollan como servidores/as públicos en la Instancia Municipal de las Mujeres\n<br>\n<br>\nDirigido a: Directora del Instituto Municipal de las Mujeres, Directora de la Instancia Municipal de las Mujeres, Titular de la Instancia Municipal de las Mujeres.\n<br>\n<br>\nElementos que evalúa el estándar: 2<br>\n<b>Elemento 1 de 2</b><br>\nPlanear la transversalidad de la perspectiva de género en la administración pública municipal.<br>\n<b>Elemento 2 de 2</b><br>\nGestionar la transversalidad de la perspectiva de género en la administración pública municipal<br>\n<br>\n<br>\nDuración estimada de la evaluación: De 2 a 3 horas<br>\n<br>\n<b>Proceso de evaluación:</b>\n<li>	Llenar: Ficha de registro, Evaluación diagnóstica, Foto para certificado y firma de acuse de derechos</li>\n<li>	Llevar el Curso de capacitación para certificación</li>\n<li>	Presentarse el día de evaluación para entregar Productos</li>\n<li>	Presentarse para recibir el certificado en un evento público</li>'),
(52, 'Doctorado en Administración Pública', 25, '<br><b>DOCTORADO EN ADMINISTRACIÓN PÚBLICA</b><br><br>\n<b>Objetivo General</b><br>Formar expertos de manera sistematizada y rigurosa que contribuyan a la generación de conocimiento inédito y original\n para el fortalecimiento de la administración pública, tanto en los aspectos teóricos como aplicados. Que nutran a las organizaciones públicas \n al desarrollar proyectos y sistemas para mejorar su eficacia, así como la formulación, diseño, implementación y evaluación de políticas públicas\n que atiendan las demandas de la sociedad y el estado mexicano.<br><br><b>RVOE</b><br>PSU-185/2013.\n <br>\n <br>\n <b>DURACIÓN</b><br>Desarrollado en 4 semestres.\n <br>\n <br>\n <b>LUGAR</b>\n <br>\n <br>\n <br>\n <b>DÍAS Y HORARIOS</b><br>Sábados de 8:00 a 16:00 hrs.\n <br>\n <br>\n <b>MAPA CURRICULAR</b>\n <br>\n <br>\n <b>Primer Semestre</b>\n <br>\n <li>Seminario de Pensadores Administrativos Clásicos.</li>\n <li>	Epistemología y Metodología Científica.</li>\n <li>Elaboración de la Investigación I.</li>\n <br>\n <br>\n <b>Segundo Semestre</b><br>\n <li>	Seminario de Pensadores Administrativos Contemporaneos.</li>\n <li>	Hermenéutica Jurídica.</li><li>	Elaboración de la Investigación II.</li>\n  <br>\n <br>\n <b>Tercer Semestre</b><br>\n <li>	Análisis y Evaluación de Políticas Públicas.</li>\n <li>	Investigación Multidisciplinaria y Transdisciplinaria.</li>\n <li>	Elaboración de la Investigación III.</li>\n  <br>\n <br>\n  <b>Cuarto Semestre</b><br> \n <li>   Análisis del Discurso.</li> \n <li>   Elaboración de la Investigación IV.</li>\n <br><br>\n <b>REQUISITOS</b><br>\n <li> 	Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n <br>\n <li> 	Presentar un protocolo de investigación para la tesis de grado.</li>\n  <br>\n <li> 	Acudir a una entrevista con el comité de ingreso y selección.</li>\n  <br>\n <li> 	Original y dos copias de los siguientes documentos:</li>\n  <br>\n <li> 	Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos, firmada por el titular de la Dependencia.</li>\n  <br>\n <li> 	Acta de nacimiento (actualizada)</li>\n <br>\n <li> 	Carta de exposición de motivos.</li>\n  <br>\n <li> 	Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n  <br>\n <li> 	Cédula de grado de Maestría.</li>\n  <br>\n <li> 	En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n  <br>\n <li> 	Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.</li>\n'),
(53, 'Doctorado en Educación', 25, '<br>\n<b>DOCTORADO EN EDUCACIÓN </b>\n<br><br>\n<b>Objetivo General</b><br>\nFormar doctores específicamente en los ámbitos de gestión, planeación y evaluación de la educación, \ncapaces de basar su toma de decisiones en conocimientos provenientes de procesos investigativos, donde \nentran en juego sus aptitudes, habilidades, actitudes y valores adquiridos durante su formación y necesarios \npara las funciones a desarrollar en alguna instancia que conforma la estructura educativa.\n<br><br>\n<b>RVOE</b>\n<br>PSU-107/2014.\n<br>\n<br>\n<b>DURACIÓN</b><br>5 semestres.\n<br>\n<br>\n<b>LUGAR</b><br>\nInstituto de Administración Pública del Estado de Chiapas, A.C\n<br>\n<br>\n<b>DIAS Y HORARIOS</b><br>\n<br>\nSábados de 8:00 a 16:00 hrs.\n<br><br>\n\n\n	<b>MAPA CURRICULAR</b>\n	<br><br>\n	<b>Primer Semestre</b><br>\n	<br><li>Políticas Educativas.</li>\n	<li>	Historia de las Instituciones Educativas.</li>\n	<li>	Introducción a la Evaluación \n	de Instituciones y Procesos en Educación.</li>\n	<li>	Introducción a la investigación educativa.</li>\n	<br>\n	<br>\n	<b>Segundo Semestre</b><br>\n	<li>	Reformas Educativas.</li>\n	<li>	Administración y Organización Escolar.</li>\n	<li>	Modelos de Evaluación Académica y Administrativa.</li>\n	<li>	Modelos de Investigación Evaluativa.</li>\n	<br>\n	<br>\n	<b>Tercer Semestre</b><br>\n	<li>	Modelos de Planeación de la Educación.</li>\n	<li>	Del Paradigma de la Administración al Paradigma de la Gestión.</li>\n	<li>	Modelos de Evaluación de Procesos y Resultados Educativos.</li>\n	<li>	Elaboración de Proyectos de Gestión Educativa.</li>\n	<br>\n	<br>\n	<b>Cuarto Semestre</b><br>\n	<li>	Planeación de Instituciones Educativas.</li><li>	\n	Gestión de Instituciones Educativas.</li>\n	<li>	Certificación de Instituciones y Procesos Educativos.</li>\n	<li>	Taller I, de Seguimiento de Proyectos de Gestión Educativa.</li>\n	<br>\n	<br>\n	<b>Quinto Semestre</b>\n	<li>		Planes y Programas de Desarrollo Institucional.</li>\n	<li> Gestión del Currículum.</li>\n	<li>		Acreditación de Programas Educativos.</li>\n	<li>Taller II, de Seguimiento de Proyectos de Gestión Educativa.</li>\n	<br><br>\n	<b>REQUISITOS</b><br>\n	<li>		Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n	<br>\n	<li>	\n	Presentar un protocolo de investigación para la tesis de grado.</li><br>\n	<li>		Acudir a una entrevista con el comité de ingreso y selección.</li>\n	<br>\n	<li>\n	Original y dos copias de los siguientes documentos:</li><br>\n	<li>		Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos,\n firmada por el titular de la Dependencia.</li><li>	Acta de nacimiento (actualizada)</li><br>\n <li>	Carta de exposición de motivos.</li>\n <br>\n <li>\n Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n <li>	Cédula de grado de Maestría.</li>\n <br>\n <li>\n En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n <li>Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.</li>\n'),
(54, 'Maestría en Administración y Políticas Públicas', 25, '<br><b>MAESTRÍA EN ADMINISTRACIÓN Y POLÍTICAS PÚBLICAS</b>\n<br><br>\n\n<b>Objetivo General</b>\n<br>Formar Maestros en Administración y Políticas Públicas, que dispongan de las herramientas teórico-metodológicas para proponer, \nimplementar, y evaluar políticas públicas innovadoras, que permitan hacer cambios organizacionales para incrementar los\n niveles de calidad en los tres órdenes de gobierno.<br>\n <br><b>RVOE</b>\n <br>PSU-45/2011.\n <br>\n <br>\n <b>DURACIÓN</b>\n <br>4 cuatrimestres.\n <br>\n <br>\n\n<b>LUGAR</b><br>\n\n<br>\n<br>\n<b>DIAS Y HORARIOS</b><br>\nSábados de 8:00 a 16:00 hrs.\n\n \n\n <br><br><b>MAPA CURRICULAR</b><br><br>\n <b>Primer Cuatrimestre</b><br>\n <li>	Fundamentos Jurídicos de la Administración Pública.</li>\n <li>	Política Económica.</li>\n <li>	Planeación Estratégica.</li>\n <br>\n <br>\n<b>Segundo Cuatrimestre</b><br>\n <li>	Diseño y Análisis de Políticas Públicas.</li>\n <li>	Desarrollo Organizacional.</li>\n <li>	Gestión para Resultados.</li>\n <br><br>\n <b>Tercer Cuatrimestre</b><br>\n <li>	Estadística Administrativa.</li><li>\n Metodología de la Investigación.</li>\n <li>	Tecnologías de la Información y Comunicación en Administración.</li>\n <br><br>\n <b>Cuarto Cuatrimestre</b><br>\n <li>	Proyecto de Investigación.</li>\n <li>	Evaluación e Impacto de las Políticas Públicas.</li>\n <li>	Rendición de Cuentas y Contraloría Social.</li>\n <br><br>\n <b>REQUISITOS</b><br>\n <li>	Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n <br>\n <li>	Presentar un protocolo de investigación para la tesis de grado.</li>\n  <br>\n <li>	Acudir a una entrevista con el comité de ingreso y selección.</li>\n <li>	Original y dos copias de los siguientes documentos:</li>\n  <br>\n <li>	Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos,\n firmada por el titular de la Dependencia.</li>\n  <br>\n <li>	Acta de nacimiento (actualizada)</li>\n  <br>\n <li>	Carta de exposición de motivos.</li>\n <li>	Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n  <br>\n <li>	Cédula de grado de Maestría.</li>\n <li>	En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n  <br>\n <li>	Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.\n </li>\n'),
(55, 'Maestría en Educación', 25, '<b>MAESTRÍA EN EDUCACIÓN</b>\n\n<br>\n<br>\n<b>Objetivo General</b><br>\nFormar maestros en Educación con énfasis en el ámbito de la gestión educativa, capaz de diagnosticar situaciones problemáticas en el contexto donde se desempeña; así como emprender proyectos de gestión participativa para impulsar procesos de cambio educativo.\n<br>\n<br>\n<b>RVOE</b><br>\nPSU-106/2014.\n<br>\n<br>\n<b>DURACIÓN</b><br>\n4 semestres.\n<br>\n<br>\n<b>LUGAR</b><br>\n\n<br>\n<br>\n<b>DIAS Y HORARIOS</b><br>\nSábados de 8:00 a 16:00 hrs.\n<br>\n<br>\n<b>MAPA CURRÍCULAR</b>\n<br>\n<br>\n<b>Primer Semestre</b>\n<li>	Filosofía de la Educación.</li>\n<li>	Cambio, Reforma e Innovación Educativa.</li>\n<li>	Política Educativa.</li>\n<li>	Taller de Gestión I.</li>\n<br>\n<br>\n<b>Segundo Semestre</b>\n<li>	Historia de la Educación.</li>\n<li>	Ámbito de la Gestión para el Cambio Educativo.</li>\n<li>	Legislación Educativa.</li>\n<li>	Taller de Gestión II.</li>\n<br>\n<br>\n<b>Tercer Semestre</b>\n<li>	Enfoques Pedagógicos Actuales.</li>\n<li>	Gestión y Agentes del Cambio Educativo.</li>\n<li>	Reformas Educativas.</li>\n<li>	Taller de Gestión III.</li>\n<br>\n<br>\n<b>Cuarto Semestre</b>\n<li>	La Educación en la Sociedad del Conocimiento y la Información.</li>\n<li>	Gestión y Procesos de Cambio Educativo.</li>\n<li>	Programas Educativos.</li>\n<li>	Taller de Gestión IV.</li>\n<br>\n<br>\n<b>REQUISITOS</b><br>\n<li>		Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n<br>\n<li>		Presentar un protocolo de investigación para la tesis de grado.</li>\n<br>\n<li>		Acudir a una entrevista con el comité de ingreso y selección.</li>\n<br>\n<li>	Original y dos copias de los siguientes documentos:</li>\n<br>\n<li>	Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos, firmada por el titular de la Dependencia.</li>\n<br>\n<li>	Acta de nacimiento (actualizada)</li>\n<br>\n<li>	Carta de exposición de motivos.</li>\n<br>\n<li>	Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n<br>\n<li>	Cédula de grado de Maestría.</li>\n<br>\n<li>	En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n<br>\n<li>	Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.</li>\n\n');
INSERT INTO `menu_app` (`menuAppId`, `nombre`, `menuId`, `contenido`) VALUES
(56, 'Doctorado en Educación', 26, '<b>DOCTORADO EN EDUCACIÓN </b><br><br><b>Objetivo General</b>\n<br>Formar doctores específicamente en los ámbitos de gestión, planeación y evaluación de la educación, \ncapaces de basar su toma de decisiones en conocimientos provenientes de procesos investigativos, \ndonde entran en juego sus aptitudes, habilidades, actitudes y valores adquiridos durante su formación y\n necesarios para las funciones a desarrollar en alguna instancia que conforma la estructura educativa.<br><br>\n <b>RVOE</b><br>PSU-107/2014.\n <br>\n <br>\n <b>DURACIÓN</b><br>5 semestres.\n <br>\n <br>\n <b>LUGAR</b>\n <br>\nSISTEMA DE EDUCACIÓN EN LÍNEA DEL IAP-CHIAPAS Nuestro Sistema está disponible las 24 horas durante los 7 días de la semana,\n por lo cual el participante puede establecer sus horarios de estudio.\n <br>\n <br>	\n <b>MAPA CURRICULAR</b><br><br>\n Primer Semestre</b><br>\n <li>Políticas Educativas.</li>\n <li>Historia de las Instituciones Educativas.</li>\n <li>Introducción a la Evaluación de Instituciones y Procesos en Educación.</li>\n <li>Introducción a la investigación educativa.</li>\n <br>\n <br>\n <b>Segundo Semestre</b>\n <br>\n <li>Reformas Educativas.</li>\n <li>Administración y Organización Escolar.</li>\n <li>Modelos de Evaluación Académica y Administrativa.</li>\n <li>Modelos de Investigación Evaluativa.</li>\n <br>\n <br>\n <b>Tercer Semestre</b><br>\n <li>Modelos de Planeación de la Educación.</li>\n <li>Del Paradigma de la Administración al Paradigma de la Gestión.</li>\n <li>Modelos de Evaluación de Procesos y Resultados Educativos.</li>\n <li>Elaboración de Proyectos de Gestión Educativa.</li>\n<br>\n<br>\n <b>Cuarto Semestre</b>\n <br>\n <li>Planeación de Instituciones Educativas.</li>\n <li>Gestión de Instituciones Educativas.</li>\n <li>Certificación de Instituciones y Procesos Educativos.</li>\n <li>Taller I, de Seguimiento de Proyectos de Gestión Educativa.</li>\n <br>\n <br>\n <b>Quinto Semestre</b>\n <li>Planes y Programas de Desarrollo Institucional.</li>\n <li>Gestión del Currículum.</li>\n <li>Acreditación de Programas Educativos.</li>\n <li>Taller II, de Seguimiento de Proyectos de Gestión Educativa.</li>\n  <br>\n <br>\n <b>REQUISITOS</b><br><li>	\n Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n <li>		Presentar un protocolo de investigación para la tesis de grado.</li>\n <li>	 Acudir a una entrevista con el comité de ingreso y selección.</li>\n <li>		Original y dos copias de los siguientes documentos:</li>\n <li>	 Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos, firmada por el titular de la Dependencia.</li>\n <li> Acta de nacimiento (actualizada)</li>\n <li>	Carta de exposición de motivos.</li>\n <li> Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n <li>	Cédula de grado de Maestría.</li>\n <li> En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n <li> Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.</li>\n'),
(57, 'Maestría en Administración y Políticas Públicas', 26, '<br><b>MAESTRÍA EN ADMINISTRACIÓN Y POLÍTICAS PÚBLICAS</b>\n<br><br>\n\n<b>Objetivo General</b>\n<br>Formar Maestros en Administración y Políticas Públicas, que dispongan de las herramientas teórico-metodológicas para proponer, \nimplementar, y evaluar políticas públicas innovadoras, que permitan hacer cambios organizacionales para incrementar los\n niveles de calidad en los tres órdenes de gobierno.<br>\n <br><b>RVOE</b>\n <br>PSU-45/2011.\n <br>\n <br>\n <b>DURACIÓN</b>\n <br>4 cuatrimestres.\n <br>\n <br>\n\n<b>LUGAR</b><br>\n\nSISTEMA DE EDUCACIÓN EN LÍNEA DEL IAP-CHIAPAS Nuestro Sistema está disponible las 24 horas durante los 7 días de la semana,\n por lo cual el participante puede establecer sus horarios de estudio.\n\n\n \n\n <br><br><b>MAPA CURRICULAR</b><br><br>\n <b>Primer Cuatrimestre</b><br>\n <li>	Fundamentos Jurídicos de la Administración Pública.</li>\n <li>	Política Económica.</li>\n <li>	Planeación Estratégica.</li>\n <br>\n <br>\n<b>Segundo Cuatrimestre</b><br>\n <li>	Diseño y Análisis de Políticas Públicas.</li>\n <li>	Desarrollo Organizacional.</li>\n <li>	Gestión para Resultados.</li>\n <br><br>\n <b>Tercer Cuatrimestre</b><br>\n <li>	Estadística Administrativa.</li><li>\n Metodología de la Investigación.</li>\n <li>	Tecnologías de la Información y Comunicación en Administración.</li>\n <br><br>\n <b>Cuarto Cuatrimestre</b><br>\n <li>	Proyecto de Investigación.</li>\n <li>	Evaluación e Impacto de las Políticas Públicas.</li>\n <li>	Rendición de Cuentas y Contraloría Social.</li>\n <br><br>\n <b>REQUISITOS</b><br>\n <li>	Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n <br>\n <li>	Presentar un protocolo de investigación para la tesis de grado.</li>\n  <br>\n <li>	Acudir a una entrevista con el comité de ingreso y selección.</li>\n <li>	Original y dos copias de los siguientes documentos:</li>\n  <br>\n <li>	Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos,\n firmada por el titular de la Dependencia.</li>\n  <br>\n <li>	Acta de nacimiento (actualizada)</li>\n  <br>\n <li>	Carta de exposición de motivos.</li>\n <li>	Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n  <br>\n <li>	Cédula de grado de Maestría.</li>\n <li>	En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n  <br>\n <li>	Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.\n </li>\n'),
(58, 'Maestría en Educación', 26, '<b>MAESTRÍA EN EDUCACIÓN</b>\n\n<br>\n<br>\n<b>Objetivo General</b><br>\nFormar maestros en Educación con énfasis en el ámbito de la gestión educativa, capaz de diagnosticar situaciones problemáticas en el contexto donde se desempeña; así como emprender proyectos de gestión participativa para impulsar procesos de cambio educativo.\n<br>\n<br>\n<b>RVOE</b><br>\nPSU-106/2014.\n<br>\n<br>\n<b>DURACIÓN</b><br>\n4 semestres.\n<br>\n<br>\n<b>LUGAR</b><br>\nSISTEMA DE EDUCACIÓN EN LÍNEA DEL IAP-CHIAPAS Nuestro Sistema está disponible las 24 horas durante los 7 días de la semana,\n por lo cual el participante puede establecer sus horarios de estudio.\n<br>\n<br>\n\n<b>MAPA CURRÍCULAR</b>\n<br>\n<br>\n<b>Primer Semestre</b>\n<li>	Filosofía de la Educación.</li>\n<li>	Cambio, Reforma e Innovación Educativa.</li>\n<li>	Política Educativa.</li>\n<li>	Taller de Gestión I.</li>\n<br>\n<br>\n<b>Segundo Semestre</b>\n<li>	Historia de la Educación.</li>\n<li>	Ámbito de la Gestión para el Cambio Educativo.</li>\n<li>	Legislación Educativa.</li>\n<li>	Taller de Gestión II.</li>\n<br>\n<br>\n<b>Tercer Semestre</b>\n<li>	Enfoques Pedagógicos Actuales.</li>\n<li>	Gestión y Agentes del Cambio Educativo.</li>\n<li>	Reformas Educativas.</li>\n<li>	Taller de Gestión III.</li>\n<br>\n<br>\n<b>Cuarto Semestre</b>\n<li>	La Educación en la Sociedad del Conocimiento y la Información.</li>\n<li>	Gestión y Procesos de Cambio Educativo.</li>\n<li>	Programas Educativos.</li>\n<li>	Taller de Gestión IV.</li>\n<br>\n<br>\n<b>REQUISITOS</b><br>\n<li>		Llenar solicitud de registro www.iapchiapasenlinea.mx/register</li>\n<br>\n<li>		Presentar un protocolo de investigación para la tesis de grado.</li>\n<br>\n<li>		Acudir a una entrevista con el comité de ingreso y selección.</li>\n<br>\n<li>	Original y dos copias de los siguientes documentos:</li>\n<br>\n<li>	Oficio de solicitud de ingreso y beca con el porcentaje autorizado para los servidores públicos, firmada por el titular de la Dependencia.</li>\n<br>\n<li>	Acta de nacimiento (actualizada)</li>\n<br>\n<li>	Carta de exposición de motivos.</li>\n<br>\n<li>	Carta de aceptación del 80% de asistencia como requisito para tener derecho a examen.</li>\n<br>\n<li>	Cédula de grado de Maestría.</li>\n<br>\n<li>	En caso de no tener su Cédula Profesional del grado de Maestría deberá presentar: Certificado, Acta de examen y Título de grado</li>\n<br>\n<li>	Si sus documentos son de otro estado o del extranjero deberá ser validado por la institución que lo emitió.</li>\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `moduleId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`moduleId`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleId`, `name`) VALUES
(1, 'Carreras'),
(3, 'Personal'),
(4, 'Alumnos'),
(5, 'Puestos'),
(8, 'Materias'),
(9, 'Roles'),
(11, 'Cursos'),
(13, 'Conf. Escuela'),
(17, 'Salones'),
(34, 'Pagos'),
(35, 'Profesiones'),
(36, 'videoconferencias'),
(37, 'Curriculas-Detalle'),
(38, 'Inf. Alumnos'),
(39, 'Grupos'),
(40, 'Solicitudes'),
(41, 'Inbox'),
(42, 'Inf. Docente'),
(43, 'Reportes');

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `municipioId` int(11) NOT NULL AUTO_INCREMENT,
  `estadoId` int(11) NOT NULL COMMENT 'Relaci??on estados',
  `clave` varchar(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  PRIMARY KEY (`municipioId`),
  KEY `estadoId` (`estadoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2496 DEFAULT CHARSET=utf8 COMMENT='Tabla de Municipios de la Republica Mexicana';

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`municipioId`, `estadoId`, `clave`, `nombre`, `sigla`) VALUES
(1, 1, '001', 'Aguascalientes', ''),
(2, 1, '002', 'Asientos', ''),
(3, 1, '003', 'Calvillo', ''),
(4, 1, '004', 'Cos', ''),
(5, 1, '005', 'Jes', ''),
(6, 1, '006', 'Pabell', ''),
(7, 1, '007', 'Rinc', ''),
(8, 1, '008', 'San Jos', ''),
(9, 1, '009', 'Tepezal', ''),
(10, 1, '010', 'El Llano', ''),
(11, 1, '011', 'San Francisco de los Romo', ''),
(12, 2, '001', 'Ensenada', ''),
(13, 2, '002', 'Mexicali', ''),
(14, 2, '003', 'Tecate', ''),
(15, 2, '004', 'Tijuana', ''),
(16, 2, '005', 'Playas de Rosarito', ''),
(17, 3, '001', 'Comond', ''),
(18, 3, '002', 'Muleg', ''),
(19, 3, '003', 'La Paz', ''),
(20, 3, '008', 'Los Cabos', ''),
(21, 3, '009', 'Loreto', ''),
(22, 4, '001', 'Calkin', ''),
(23, 4, '002', 'Campeche', ''),
(24, 4, '003', 'Carmen', ''),
(25, 4, '004', 'Champot', ''),
(26, 4, '005', 'Hecelchak', ''),
(27, 4, '006', 'Hopelch', ''),
(28, 4, '007', 'Palizada', ''),
(29, 4, '008', 'Tenabo', ''),
(30, 4, '009', 'Esc', ''),
(31, 4, '010', 'Calakmul', ''),
(32, 4, '011', 'Candelaria', ''),
(33, 5, '001', 'Abasolo', ''),
(34, 5, '002', 'Acu', ''),
(35, 5, '003', 'Allende', ''),
(36, 5, '004', 'Arteaga', ''),
(37, 5, '005', 'Candela', ''),
(38, 5, '006', 'Casta', ''),
(39, 5, '007', 'Cuatro Ci', ''),
(40, 5, '008', 'Escobedo', ''),
(41, 5, '009', 'Francisco I. Madero', ''),
(42, 5, '010', 'Frontera', ''),
(43, 5, '011', 'General Cepeda', ''),
(44, 5, '012', 'Guerrero', ''),
(45, 5, '013', 'Hidalgo', ''),
(46, 5, '014', 'Jim', ''),
(47, 5, '015', 'Ju', ''),
(48, 5, '016', 'Lamadrid', ''),
(49, 5, '017', 'Matamoros', ''),
(50, 5, '018', 'Monclova', ''),
(51, 5, '019', 'Morelos', ''),
(52, 5, '020', 'M', ''),
(53, 5, '021', 'Nadadores', ''),
(54, 5, '022', 'Nava', ''),
(55, 5, '023', 'Ocampo', ''),
(56, 5, '024', 'Parras', ''),
(57, 5, '025', 'Piedras Negras', ''),
(58, 5, '026', 'Progreso', ''),
(59, 5, '027', 'Ramos Arizpe', ''),
(60, 5, '028', 'Sabinas', ''),
(61, 5, '029', 'Sacramento', ''),
(62, 5, '030', 'Saltillo', ''),
(63, 5, '031', 'San Buenaventura', ''),
(64, 5, '032', 'San Juan de Sabinas', ''),
(65, 5, '033', 'San Pedro', ''),
(66, 5, '034', 'Sierra Mojada', ''),
(67, 5, '035', 'Torre', ''),
(68, 5, '036', 'Viesca', ''),
(69, 5, '037', 'Villa Uni', ''),
(70, 5, '038', 'Zaragoza', ''),
(71, 6, '001', 'Armer', ''),
(72, 6, '002', 'Colima', ''),
(73, 6, '003', 'Comala', ''),
(74, 6, '004', 'Coquimatl', ''),
(75, 6, '005', 'Cuauht', ''),
(76, 6, '006', 'Ixtlahuac', ''),
(77, 6, '007', 'Manzanillo', ''),
(78, 6, '008', 'Minatitl', ''),
(79, 6, '009', 'Tecom', ''),
(80, 6, '010', 'Villa de ', ''),
(81, 7, '001', 'Acacoyagua', ''),
(82, 7, '002', 'Acala', ''),
(83, 7, '003', 'Acapetahua', ''),
(84, 7, '004', 'Altamirano', ''),
(85, 7, '005', 'Amatan', ''),
(86, 7, '006', 'Amatenango de la Frontera', ''),
(87, 7, '007', 'Amatenango del Valle', ''),
(88, 7, '008', 'Angel Albino Corzo', ''),
(89, 7, '009', 'Arriaga', ''),
(90, 7, '010', 'Bejucal de Ocampo', ''),
(91, 7, '011', 'Bella Vista', ''),
(92, 7, '012', 'Berriozabal', ''),
(93, 7, '013', 'Bochil', ''),
(94, 7, '014', 'El Bosque', ''),
(95, 7, '015', 'Cacahoatan', ''),
(96, 7, '016', 'Catazaja', ''),
(97, 7, '017', 'Cintalapa', ''),
(98, 7, '018', 'Coapilla', ''),
(99, 7, '019', 'Comitan de Dominguez', ''),
(100, 7, '020', 'La Concordia', ''),
(101, 7, '021', 'Copainala', ''),
(102, 7, '022', 'Chalchihuitan', ''),
(103, 7, '023', 'Chamula', ''),
(104, 7, '024', 'Chanal', ''),
(105, 7, '025', 'Chapultenango', ''),
(106, 7, '026', 'Chenalhó', ''),
(107, 7, '027', 'Chiapa de Corzo', ''),
(108, 7, '028', 'Chiapilla', ''),
(109, 7, '029', 'Chicoasén', ''),
(110, 7, '030', 'Chicomuselo', ''),
(111, 7, '031', 'Chilón', ''),
(112, 7, '032', 'Escuintla', ''),
(113, 7, '033', 'Francisco León', ''),
(114, 7, '034', 'Frontera Comalapa', ''),
(115, 7, '035', 'Frontera Hidalgo', ''),
(116, 7, '036', 'La Grandeza', ''),
(117, 7, '037', 'Huehuetán', ''),
(118, 7, '038', 'Huixtán', ''),
(119, 7, '039', 'Huitiupán', ''),
(120, 7, '040', 'Huixtla', ''),
(121, 7, '041', 'La Independencia', ''),
(122, 7, '042', 'Ixhuatán', ''),
(123, 7, '043', 'Ixtacomitán', ''),
(124, 7, '044', 'Ixtapa', ''),
(125, 7, '045', 'Ixtapangajoya', ''),
(126, 7, '046', 'Jiquipilas', ''),
(127, 7, '047', 'Jitotol', ''),
(128, 7, '048', 'Juárez', ''),
(129, 7, '049', 'Larrainzar', ''),
(130, 7, '050', 'La Libertad', ''),
(131, 7, '051', 'Mapastepec', ''),
(132, 7, '052', 'Las Margaritas', ''),
(133, 7, '053', 'Mazapa de Madero', ''),
(134, 7, '054', 'Mazatán', ''),
(135, 7, '055', 'Metapa', ''),
(136, 7, '056', 'Mitontic', ''),
(137, 7, '057', 'Motozintla', ''),
(138, 7, '058', 'Nicolás Ruiz', ''),
(139, 7, '059', 'Ocosingo', ''),
(140, 7, '060', 'Ocotepec', ''),
(141, 7, '061', 'Ocozocoautla de Espinosa', ''),
(142, 7, '062', 'Ostuacán', ''),
(143, 7, '063', 'Osumacinta', ''),
(144, 7, '064', 'Oxchuc', ''),
(145, 7, '065', 'Palenque', ''),
(146, 7, '066', 'Pantelhó', ''),
(147, 7, '067', 'Pantepec', ''),
(148, 7, '068', 'Pichucalco', ''),
(149, 7, '069', 'Pijijiapan', ''),
(150, 7, '070', 'El Porvenir', ''),
(151, 7, '071', 'Villa Comaltitlán', ''),
(152, 7, '072', 'Pueblo Nuevo Solistahuacán', ''),
(153, 7, '073', 'Rayón', ''),
(154, 7, '074', 'Reforma', ''),
(155, 7, '075', 'Las Rosas', ''),
(156, 7, '076', 'Sabanilla', ''),
(157, 7, '077', 'Salto de Agua', ''),
(158, 7, '078', 'San Cristóbal de las Casas', ''),
(159, 7, '079', 'San Fernando', ''),
(160, 7, '080', 'Siltepec', ''),
(161, 7, '081', 'Simojovel', ''),
(162, 7, '082', 'Sitalá', ''),
(163, 7, '083', 'Socoltenango', ''),
(164, 7, '084', 'Solosuchiapa', ''),
(165, 7, '085', 'Soyaló', ''),
(166, 7, '086', 'Suchiapa', ''),
(167, 7, '087', 'Suchiate', ''),
(168, 7, '088', 'Sunuapa', ''),
(169, 7, '089', 'Tapachula', ''),
(170, 7, '090', 'Tapalapa', ''),
(171, 7, '091', 'Tapilula', ''),
(172, 7, '092', 'Tecpatán', ''),
(173, 7, '093', 'Tenejapa', ''),
(174, 7, '094', 'Teopisca', ''),
(175, 7, '096', 'Tila', ''),
(176, 7, '097', 'Tonalá', ''),
(177, 7, '098', 'Totolapa', ''),
(178, 7, '099', 'La Trinitaria', ''),
(179, 7, '100', 'Tumbalá', ''),
(180, 7, '101', 'Tuxtla Gutiérrez', ''),
(181, 7, '102', 'Tuxtla Chico', ''),
(182, 7, '103', 'Tuzantán', ''),
(183, 7, '104', 'Tzimol', ''),
(184, 7, '105', 'Unión juarez', ''),
(185, 7, '106', 'Venustiano Carranza', ''),
(186, 7, '107', 'Villa Corzo', ''),
(187, 7, '108', 'Villaflores', ''),
(188, 7, '109', 'Yajalón', ''),
(189, 7, '110', 'San Lucas', ''),
(190, 7, '111', 'Zinacantán', ''),
(191, 7, '112', 'San Juan Cancuc', ''),
(192, 7, '113', 'Aldama', ''),
(193, 7, '114', 'Benemérito de las Américas', ''),
(194, 7, '115', 'Maravilla Tenejapa', ''),
(195, 7, '116', 'Marqués de Comillas', ''),
(196, 7, '117', 'Montecristo de Guerrero', ''),
(197, 7, '118', 'San Andres Duraznal', ''),
(198, 7, '119', 'Santiago el Pinar', ''),
(199, 8, '001', 'Ahumada', ''),
(200, 8, '002', 'Aldama', ''),
(201, 8, '003', 'Allende', ''),
(202, 8, '004', 'Aquiles Serd', ''),
(203, 8, '005', 'Ascensi', ''),
(204, 8, '006', 'Bach', ''),
(205, 8, '007', 'Balleza', ''),
(206, 8, '008', 'Batopilas', ''),
(207, 8, '009', 'Bocoyna', ''),
(208, 8, '010', 'Buenaventura', ''),
(209, 8, '011', 'Camargo', ''),
(210, 8, '012', 'Carich', ''),
(211, 8, '013', 'Casas Grandes', ''),
(212, 8, '014', 'Coronado', ''),
(213, 8, '015', 'Coyame del Sotol', ''),
(214, 8, '016', 'La Cruz', ''),
(215, 8, '017', 'Cuauht', ''),
(216, 8, '018', 'Cusihuiriachi', ''),
(217, 8, '019', 'Chihuahua', ''),
(218, 8, '020', 'Ch', ''),
(219, 8, '021', 'Delicias', ''),
(220, 8, '022', 'Dr. Belisario Dom', ''),
(221, 8, '023', 'Galeana', ''),
(222, 8, '024', 'Santa Isabel', ''),
(223, 8, '025', 'G', ''),
(224, 8, '026', 'Gran Morelos', ''),
(225, 8, '027', 'Guachochi', ''),
(226, 8, '028', 'Guadalupe', ''),
(227, 8, '029', 'Guadalupe y Calvo', ''),
(228, 8, '030', 'Guazapares', ''),
(229, 8, '031', 'Guerrero', ''),
(230, 8, '032', 'Hidalgo del Parral', ''),
(231, 8, '033', 'Huejotit', ''),
(232, 8, '034', 'Ignacio Zaragoza', ''),
(233, 8, '035', 'Janos', ''),
(234, 8, '036', 'Jim', ''),
(235, 8, '037', 'Ju', ''),
(236, 8, '038', 'Julimes', ''),
(237, 8, '039', 'L', ''),
(238, 8, '040', 'Madera', ''),
(239, 8, '041', 'Maguarichi', ''),
(240, 8, '042', 'Manuel Benavides', ''),
(241, 8, '043', 'Matach', ''),
(242, 8, '044', 'Matamoros', ''),
(243, 8, '045', 'Meoqui', ''),
(244, 8, '046', 'Morelos', ''),
(245, 8, '047', 'Moris', ''),
(246, 8, '048', 'Namiquipa', ''),
(247, 8, '049', 'Nonoava', ''),
(248, 8, '050', 'Nuevo Casas Grandes', ''),
(249, 8, '051', 'Ocampo', ''),
(250, 8, '052', 'Ojinaga', ''),
(251, 8, '053', 'Praxedis G. Guerrero', ''),
(252, 8, '054', 'Riva Palacio', ''),
(253, 8, '055', 'Rosales', ''),
(254, 8, '056', 'Rosario', ''),
(255, 8, '057', 'San Francisco de Borja', ''),
(256, 8, '058', 'San Francisco de Conchos', ''),
(257, 8, '059', 'San Francisco del Oro', ''),
(258, 8, '060', 'Santa B', ''),
(259, 8, '061', 'Satev', ''),
(260, 8, '062', 'Saucillo', ''),
(261, 8, '063', 'Tem', ''),
(262, 8, '064', 'El Tule', ''),
(263, 8, '065', 'Urique', ''),
(264, 8, '066', 'Uruachi', ''),
(265, 8, '067', 'Valle de Zaragoza', ''),
(266, 9, '002', 'Azcapotzalco', ''),
(267, 9, '003', 'Coyoac', ''),
(268, 9, '004', 'Cuajimalpa de Morelos', ''),
(269, 9, '005', 'Gustavo A. Madero', ''),
(270, 9, '006', 'Iztacalco', ''),
(271, 9, '007', 'Iztapalapa', ''),
(272, 9, '008', 'La Magdalena Contreras', ''),
(273, 9, '009', 'Milpa Alta', ''),
(274, 9, '010', '', ''),
(275, 9, '011', 'Tl', ''),
(276, 9, '012', 'Tlalpan', ''),
(277, 9, '013', 'Xochimilco', ''),
(278, 9, '014', 'Benito Ju', ''),
(279, 9, '015', 'Cuauht', ''),
(280, 9, '016', 'Miguel Hidalgo', ''),
(281, 9, '017', 'Venustiano Carranza', ''),
(282, 10, '001', 'Canatl', ''),
(283, 10, '002', 'Canelas', ''),
(284, 10, '003', 'Coneto de Comonfort', ''),
(285, 10, '004', 'Cuencam', ''),
(286, 10, '005', 'Durango', ''),
(287, 10, '006', 'General Sim', ''),
(288, 10, '007', 'G', ''),
(289, 10, '008', 'Guadalupe Victoria', ''),
(290, 10, '009', 'Guanacev', ''),
(291, 10, '010', 'Hidalgo', ''),
(292, 10, '011', 'Ind', ''),
(293, 10, '012', 'Lerdo', ''),
(294, 10, '013', 'Mapim', ''),
(295, 10, '014', 'Mezquital', ''),
(296, 10, '015', 'Nazas', ''),
(297, 10, '016', 'Nombre de Dios', ''),
(298, 10, '017', 'Ocampo', ''),
(299, 10, '018', 'El Oro', ''),
(300, 10, '019', 'Ot', ''),
(301, 10, '020', 'P', ''),
(302, 10, '021', 'Pe', ''),
(303, 10, '022', 'Poanas', ''),
(304, 10, '023', 'Pueblo Nuevo', ''),
(305, 10, '024', 'Rodeo', ''),
(306, 10, '025', 'San Bernardo', ''),
(307, 10, '026', 'San Dimas', ''),
(308, 10, '027', 'San Juan de Guadalupe', ''),
(309, 10, '028', 'San Juan del R', ''),
(310, 10, '029', 'San Luis del Cordero', ''),
(311, 10, '030', 'San Pedro del Gallo', ''),
(312, 10, '031', 'Santa Clara', ''),
(313, 10, '032', 'Santiago Papasquiaro', ''),
(314, 10, '033', 'S', ''),
(315, 10, '034', 'Tamazula', ''),
(316, 10, '035', 'Tepehuanes', ''),
(317, 10, '036', 'Tlahualilo', ''),
(318, 10, '037', 'Topia', ''),
(319, 10, '038', 'Vicente Guerrero', ''),
(320, 10, '039', 'Nuevo Ideal', ''),
(321, 11, '001', 'Abasolo', ''),
(322, 11, '002', 'Ac', ''),
(323, 11, '003', 'San Miguel de Allende', ''),
(324, 11, '004', 'Apaseo el Alto', ''),
(325, 11, '005', 'Apaseo el Grande', ''),
(326, 11, '006', 'Atarjea', ''),
(327, 11, '007', 'Celaya', ''),
(328, 11, '008', 'Manuel Doblado', ''),
(329, 11, '009', 'Comonfort', ''),
(330, 11, '010', 'Coroneo', ''),
(331, 11, '011', 'Cortazar', ''),
(332, 11, '012', 'Cuer', ''),
(333, 11, '013', 'Doctor Mora', ''),
(334, 11, '014', 'Dolores Hidalgo Cuna de la Independencia Nacional', ''),
(335, 11, '015', 'Guanajuato', ''),
(336, 11, '016', 'Huan', ''),
(337, 11, '017', 'Irapuato', ''),
(338, 11, '018', 'Jaral del Progreso', ''),
(339, 11, '019', 'Jer', ''),
(340, 11, '020', 'Le', ''),
(341, 11, '021', 'Morole', ''),
(342, 11, '022', 'Ocampo', ''),
(343, 11, '023', 'P', ''),
(344, 11, '024', 'Pueblo Nuevo', ''),
(345, 11, '025', 'Pur', ''),
(346, 11, '026', 'Romita', ''),
(347, 11, '027', 'Salamanca', ''),
(348, 11, '028', 'Salvatierra', ''),
(349, 11, '029', 'San Diego de la Uni', ''),
(350, 11, '030', 'San Felipe', ''),
(351, 11, '031', 'San Francisco del Rinc', ''),
(352, 11, '032', 'San Jos', ''),
(353, 11, '033', 'San Luis de la Paz', ''),
(354, 11, '034', 'Santa Catarina', ''),
(355, 11, '035', 'Santa Cruz de Juventino Rosas', ''),
(356, 11, '036', 'Santiago Maravat', ''),
(357, 11, '037', 'Silao', ''),
(358, 11, '038', 'Tarandacuao', ''),
(359, 11, '039', 'Tarimoro', ''),
(360, 11, '040', 'Tierra Blanca', ''),
(361, 11, '041', 'Uriangato', ''),
(362, 11, '042', 'Valle de Santiago', ''),
(363, 11, '043', 'Victoria', ''),
(364, 11, '044', 'Villagr', ''),
(365, 11, '045', 'Xich', ''),
(366, 11, '046', 'Yuriria', ''),
(367, 12, '001', 'Acapulco de Ju', ''),
(368, 12, '002', 'Ahuacuotzingo', ''),
(369, 12, '003', 'Ajuchitl', ''),
(370, 12, '004', 'Alcozauca de Guerrero', ''),
(371, 12, '005', 'Alpoyeca', ''),
(372, 12, '006', 'Apaxtla', ''),
(373, 12, '007', 'Arcelia', ''),
(374, 12, '008', 'Atenango del R', ''),
(375, 12, '009', 'Atlamajalcingo del Monte', ''),
(376, 12, '010', 'Atlixtac', ''),
(377, 12, '011', 'Atoyac de ', ''),
(378, 12, '012', 'Ayutla de los Libres', ''),
(379, 12, '013', 'Azoy', ''),
(380, 12, '014', 'Benito Ju', ''),
(381, 12, '015', 'Buenavista de Cu', ''),
(382, 12, '016', 'Coahuayutla de Jos', ''),
(383, 12, '017', 'Cocula', ''),
(384, 12, '018', 'Copala', ''),
(385, 12, '019', 'Copalillo', ''),
(386, 12, '020', 'Copanatoyac', ''),
(387, 12, '021', 'Coyuca de Ben', ''),
(388, 12, '022', 'Coyuca de Catal', ''),
(389, 12, '023', 'Cuajinicuilapa', ''),
(390, 12, '024', 'Cual', ''),
(391, 12, '025', 'Cuautepec', ''),
(392, 12, '026', 'Cuetzala del Progreso', ''),
(393, 12, '027', 'Cutzamala de Pinz', ''),
(394, 12, '028', 'Chilapa de ', ''),
(395, 12, '029', 'Chilpancingo de los Bravo', ''),
(396, 12, '030', 'Florencio Villarreal', ''),
(397, 12, '031', 'General Canuto A. Neri', ''),
(398, 12, '032', 'General Heliodoro Castillo', ''),
(399, 12, '033', 'Huamuxtitl', ''),
(400, 12, '034', 'Huitzuco de los Figueroa', ''),
(401, 12, '035', 'Iguala de la Independencia', ''),
(402, 12, '036', 'Igualapa', ''),
(403, 12, '037', 'Ixcateopan de Cuauht', ''),
(404, 12, '038', 'Zihuatanejo de Azueta', ''),
(405, 12, '039', 'Juan R. Escudero', ''),
(406, 12, '040', 'Leonardo Bravo', ''),
(407, 12, '041', 'Malinaltepec', ''),
(408, 12, '042', 'M', ''),
(409, 12, '043', 'Metlat', ''),
(410, 12, '044', 'Mochitl', ''),
(411, 12, '045', 'Olinal', ''),
(412, 12, '046', 'Ometepec', ''),
(413, 12, '047', 'Pedro Ascencio Alquisiras', ''),
(414, 12, '048', 'Petatl', ''),
(415, 12, '049', 'Pilcaya', ''),
(416, 12, '050', 'Pungarabato', ''),
(417, 12, '051', 'Quechultenango', ''),
(418, 12, '052', 'San Luis Acatl', ''),
(419, 12, '053', 'San Marcos', ''),
(420, 12, '054', 'San Miguel Totolapan', ''),
(421, 12, '055', 'Taxco de Alarc', ''),
(422, 12, '056', 'Tecoanapa', ''),
(423, 12, '057', 'T', ''),
(424, 12, '058', 'Teloloapan', ''),
(425, 12, '059', 'Tepecoacuilco de Trujano', ''),
(426, 12, '060', 'Tetipac', ''),
(427, 12, '061', 'Tixtla de Guerrero', ''),
(428, 12, '062', 'Tlacoachistlahuaca', ''),
(429, 12, '063', 'Tlacoapa', ''),
(430, 12, '064', 'Tlalchapa', ''),
(431, 12, '065', 'Tlalixtaquilla de Maldonado', ''),
(432, 12, '066', 'Tlapa de Comonfort', ''),
(433, 12, '067', 'Tlapehuala', ''),
(434, 12, '068', 'La Uni', ''),
(435, 12, '069', 'Xalpatl', ''),
(436, 12, '070', 'Xochihuehuetl', ''),
(437, 12, '071', 'Xochistlahuaca', ''),
(438, 12, '072', 'Zapotitl', ''),
(439, 12, '073', 'Zir', ''),
(440, 12, '074', 'Zitlala', ''),
(441, 12, '075', 'Eduardo Neri', ''),
(442, 12, '076', 'Acatepec', ''),
(443, 12, '077', 'Marquelia', ''),
(444, 12, '078', 'Cochoapa el Grande', ''),
(445, 12, '079', 'Jos', ''),
(446, 12, '080', 'Juchit', ''),
(447, 12, '081', 'Iliatenco', ''),
(448, 13, '001', 'Acatl', ''),
(449, 13, '002', 'Acaxochitl', ''),
(450, 13, '003', 'Actopan', ''),
(451, 13, '004', 'Agua Blanca de Iturbide', ''),
(452, 13, '005', 'Ajacuba', ''),
(453, 13, '006', 'Alfajayucan', ''),
(454, 13, '007', 'Almoloya', ''),
(455, 13, '008', 'Apan', ''),
(456, 13, '009', 'El Arenal', ''),
(457, 13, '010', 'Atitalaquia', ''),
(458, 13, '011', 'Atlapexco', ''),
(459, 13, '012', 'Atotonilco el Grande', ''),
(460, 13, '013', 'Atotonilco de Tula', ''),
(461, 13, '014', 'Calnali', ''),
(462, 13, '015', 'Cardonal', ''),
(463, 13, '016', 'Cuautepec de Hinojosa', ''),
(464, 13, '017', 'Chapantongo', ''),
(465, 13, '018', 'Chapulhuac', ''),
(466, 13, '019', 'Chilcuautla', ''),
(467, 13, '020', 'Eloxochitl', ''),
(468, 13, '021', 'Emiliano Zapata', ''),
(469, 13, '022', 'Epazoyucan', ''),
(470, 13, '023', 'Francisco I. Madero', ''),
(471, 13, '024', 'Huasca de Ocampo', ''),
(472, 13, '025', 'Huautla', ''),
(473, 13, '026', 'Huazalingo', ''),
(474, 13, '027', 'Huehuetla', ''),
(475, 13, '028', 'Huejutla de Reyes', ''),
(476, 13, '029', 'Huichapan', ''),
(477, 13, '030', 'Ixmiquilpan', ''),
(478, 13, '031', 'Jacala de Ledezma', ''),
(479, 13, '032', 'Jaltoc', ''),
(480, 13, '033', 'Ju', ''),
(481, 13, '034', 'Lolotla', ''),
(482, 13, '035', 'Metepec', ''),
(483, 13, '036', 'San Agust', ''),
(484, 13, '037', 'Metztitl', ''),
(485, 13, '038', 'Mineral del Chico', ''),
(486, 13, '039', 'Mineral del Monte', ''),
(487, 13, '040', 'La Misi', ''),
(488, 13, '041', 'Mixquiahuala de Ju', ''),
(489, 13, '042', 'Molango de Escamilla', ''),
(490, 13, '043', 'Nicol', ''),
(491, 13, '044', 'Nopala de Villagr', ''),
(492, 13, '045', 'Omitl', ''),
(493, 13, '046', 'San Felipe Orizatl', ''),
(494, 13, '047', 'Pacula', ''),
(495, 13, '048', 'Pachuca de Soto', ''),
(496, 13, '049', 'Pisaflores', ''),
(497, 13, '050', 'Progreso de Obreg', ''),
(498, 13, '051', 'Mineral de la Reforma', ''),
(499, 13, '052', 'San Agust', ''),
(500, 13, '053', 'San Bartolo Tutotepec', ''),
(501, 13, '054', 'San Salvador', ''),
(502, 13, '055', 'Santiago de Anaya', ''),
(503, 13, '056', 'Santiago Tulantepec de Lugo Guerrero', ''),
(504, 13, '057', 'Singuilucan', ''),
(505, 13, '058', 'Tasquillo', ''),
(506, 13, '059', 'Tecozautla', ''),
(507, 13, '060', 'Tenango de Doria', ''),
(508, 13, '061', 'Tepeapulco', ''),
(509, 13, '062', 'Tepehuac', ''),
(510, 13, '063', 'Tepeji del R', ''),
(511, 13, '064', 'Tepetitl', ''),
(512, 13, '065', 'Tetepango', ''),
(513, 13, '066', 'Villa de Tezontepec', ''),
(514, 13, '067', 'Tezontepec de Aldama', ''),
(515, 13, '068', 'Tianguistengo', ''),
(516, 13, '069', 'Tizayuca', ''),
(517, 13, '070', 'Tlahuelilpan', ''),
(518, 13, '071', 'Tlahuiltepa', ''),
(519, 13, '072', 'Tlanalapa', ''),
(520, 13, '073', 'Tlanchinol', ''),
(521, 13, '074', 'Tlaxcoapan', ''),
(522, 13, '075', 'Tolcayuca', ''),
(523, 13, '076', 'Tula de Allende', ''),
(524, 13, '077', 'Tulancingo de Bravo', ''),
(525, 13, '078', 'Xochiatipan', ''),
(526, 13, '079', 'Xochicoatl', ''),
(527, 13, '080', 'Yahualica', ''),
(528, 13, '081', 'Zacualtip', ''),
(529, 13, '082', 'Zapotl', ''),
(530, 13, '083', 'Zempoala', ''),
(531, 13, '084', 'Zimap', ''),
(532, 14, '001', 'Acatic', ''),
(533, 14, '002', 'Acatl', ''),
(534, 14, '003', 'Ahualulco de Mercado', ''),
(535, 14, '004', 'Amacueca', ''),
(536, 14, '005', 'Amatit', ''),
(537, 14, '006', 'Ameca', ''),
(538, 14, '007', 'San Juanito de Escobedo', ''),
(539, 14, '008', 'Arandas', ''),
(540, 14, '009', 'El Arenal', ''),
(541, 14, '010', 'Atemajac de Brizuela', ''),
(542, 14, '011', 'Atengo', ''),
(543, 14, '012', 'Atenguillo', ''),
(544, 14, '013', 'Atotonilco el Alto', ''),
(545, 14, '014', 'Atoyac', ''),
(546, 14, '015', 'Autl', ''),
(547, 14, '016', 'Ayotl', ''),
(548, 14, '017', 'Ayutla', ''),
(549, 14, '018', 'La Barca', ''),
(550, 14, '019', 'Bola', ''),
(551, 14, '020', 'Cabo Corrientes', ''),
(552, 14, '021', 'Casimiro Castillo', ''),
(553, 14, '022', 'Cihuatl', ''),
(554, 14, '023', 'Zapotl', ''),
(555, 14, '024', 'Cocula', ''),
(556, 14, '025', 'Colotl', ''),
(557, 14, '026', 'Concepci', ''),
(558, 14, '027', 'Cuautitl', ''),
(559, 14, '028', 'Cuautla', ''),
(560, 14, '029', 'Cuqu', ''),
(561, 14, '030', 'Chapala', ''),
(562, 14, '031', 'Chimaltit', ''),
(563, 14, '032', 'Chiquilistl', ''),
(564, 14, '033', 'Degollado', ''),
(565, 14, '034', 'Ejutla', ''),
(566, 14, '035', 'Encarnaci', ''),
(567, 14, '036', 'Etzatl', ''),
(568, 14, '037', 'El Grullo', ''),
(569, 14, '038', 'Guachinango', ''),
(570, 14, '039', 'Guadalajara', ''),
(571, 14, '040', 'Hostotipaquillo', ''),
(572, 14, '041', 'Huej', ''),
(573, 14, '042', 'Huejuquilla el Alto', ''),
(574, 14, '043', 'La Huerta', ''),
(575, 14, '044', 'Ixtlahuac', ''),
(576, 14, '045', 'Ixtlahuac', ''),
(577, 14, '046', 'Jalostotitl', ''),
(578, 14, '047', 'Jamay', ''),
(579, 14, '048', 'Jes', ''),
(580, 14, '049', 'Jilotl', ''),
(581, 14, '050', 'Jocotepec', ''),
(582, 14, '051', 'Juanacatl', ''),
(583, 14, '052', 'Juchitl', ''),
(584, 14, '053', 'Lagos de Moreno', ''),
(585, 14, '054', 'El Lim', ''),
(586, 14, '055', 'Magdalena', ''),
(587, 14, '056', 'Santa Mar', ''),
(588, 14, '057', 'La Manzanilla de la Paz', ''),
(589, 14, '058', 'Mascota', ''),
(590, 14, '059', 'Mazamitla', ''),
(591, 14, '060', 'Mexticac', ''),
(592, 14, '061', 'Mezquitic', ''),
(593, 14, '062', 'Mixtl', ''),
(594, 14, '063', 'Ocotl', ''),
(595, 14, '064', 'Ojuelos de Jalisco', ''),
(596, 14, '065', 'Pihuamo', ''),
(597, 14, '066', 'Poncitl', ''),
(598, 14, '067', 'Puerto Vallarta', ''),
(599, 14, '068', 'Villa Purificaci', ''),
(600, 14, '069', 'Quitupan', ''),
(601, 14, '070', 'El Salto', ''),
(602, 14, '071', 'San Crist', ''),
(603, 14, '072', 'San Diego de Alejandr', ''),
(604, 14, '073', 'San Juan de los Lagos', ''),
(605, 14, '074', 'San Juli', ''),
(606, 14, '075', 'San Marcos', ''),
(607, 14, '076', 'San Mart', ''),
(608, 14, '077', 'San Mart', ''),
(609, 14, '078', 'San Miguel el Alto', ''),
(610, 14, '079', 'G', ''),
(611, 14, '080', 'San Sebasti', ''),
(612, 14, '081', 'Santa Mar', ''),
(613, 14, '082', 'Sayula', ''),
(614, 14, '083', 'Tala', ''),
(615, 14, '084', 'Talpa de Allende', ''),
(616, 14, '085', 'Tamazula de Gordiano', ''),
(617, 14, '086', 'Tapalpa', ''),
(618, 14, '087', 'Tecalitl', ''),
(619, 14, '088', 'Tecolotl', ''),
(620, 14, '089', 'Techaluta de Montenegro', ''),
(621, 14, '090', 'Tenamaxtl', ''),
(622, 14, '091', 'Teocaltiche', ''),
(623, 14, '092', 'Teocuitatl', ''),
(624, 14, '093', 'Tepatitl', ''),
(625, 14, '094', 'Tequila', ''),
(626, 14, '095', 'Teuchitl', ''),
(627, 14, '096', 'Tizap', ''),
(628, 14, '097', 'Tlajomulco de Z', ''),
(629, 14, '098', 'San Pedro Tlaquepaque', ''),
(630, 14, '099', 'Tolim', ''),
(631, 14, '100', 'Tomatl', ''),
(632, 14, '101', 'Tonal', ''),
(633, 14, '102', 'Tonaya', ''),
(634, 14, '103', 'Tonila', ''),
(635, 14, '104', 'Totatiche', ''),
(636, 14, '105', 'Tototl', ''),
(637, 14, '106', 'Tuxcacuesco', ''),
(638, 14, '107', 'Tuxcueca', ''),
(639, 14, '108', 'Tuxpan', ''),
(640, 14, '109', 'Uni', ''),
(641, 14, '110', 'Uni', ''),
(642, 14, '111', 'Valle de Guadalupe', ''),
(643, 14, '112', 'Valle de Ju', ''),
(644, 14, '113', 'San Gabriel', ''),
(645, 14, '114', 'Villa Corona', ''),
(646, 14, '115', 'Villa Guerrero', ''),
(647, 14, '116', 'Villa Hidalgo', ''),
(648, 14, '117', 'Ca', ''),
(649, 14, '118', 'Yahualica de Gonz', ''),
(650, 14, '119', 'Zacoalco de Torres', ''),
(651, 14, '120', 'Zapopan', ''),
(652, 14, '121', 'Zapotiltic', ''),
(653, 14, '122', 'Zapotitl', ''),
(654, 14, '123', 'Zapotl', ''),
(655, 14, '124', 'Zapotlanejo', ''),
(656, 14, '125', 'San Ignacio Cerro Gordo', ''),
(657, 15, '001', 'Acambay', ''),
(658, 15, '002', 'Acolman', ''),
(659, 15, '003', 'Aculco', ''),
(660, 15, '004', 'Almoloya de Alquisiras', ''),
(661, 15, '005', 'Almoloya de Ju', ''),
(662, 15, '006', 'Almoloya del R', ''),
(663, 15, '007', 'Amanalco', ''),
(664, 15, '008', 'Amatepec', ''),
(665, 15, '009', 'Amecameca', ''),
(666, 15, '010', 'Apaxco', ''),
(667, 15, '011', 'Atenco', ''),
(668, 15, '012', 'Atizap', ''),
(669, 15, '013', 'Atizap', ''),
(670, 15, '014', 'Atlacomulco', ''),
(671, 15, '015', 'Atlautla', ''),
(672, 15, '016', 'Axapusco', ''),
(673, 15, '017', 'Ayapango', ''),
(674, 15, '018', 'Calimaya', ''),
(675, 15, '019', 'Capulhuac', ''),
(676, 15, '020', 'Coacalco de Berrioz', ''),
(677, 15, '021', 'Coatepec Harinas', ''),
(678, 15, '022', 'Cocotitl', ''),
(679, 15, '023', 'Coyotepec', ''),
(680, 15, '024', 'Cuautitl', ''),
(681, 15, '025', 'Chalco', ''),
(682, 15, '026', 'Chapa de Mota', ''),
(683, 15, '027', 'Chapultepec', ''),
(684, 15, '028', 'Chiautla', ''),
(685, 15, '029', 'Chicoloapan', ''),
(686, 15, '030', 'Chiconcuac', ''),
(687, 15, '031', 'Chimalhuac', ''),
(688, 15, '032', 'Donato Guerra', ''),
(689, 15, '033', 'Ecatepec de Morelos', ''),
(690, 15, '034', 'Ecatzingo', ''),
(691, 15, '035', 'Huehuetoca', ''),
(692, 15, '036', 'Hueypoxtla', ''),
(693, 15, '037', 'Huixquilucan', ''),
(694, 15, '038', 'Isidro Fabela', ''),
(695, 15, '039', 'Ixtapaluca', ''),
(696, 15, '040', 'Ixtapan de la Sal', ''),
(697, 15, '041', 'Ixtapan del Oro', ''),
(698, 15, '042', 'Ixtlahuaca', ''),
(699, 15, '043', 'Xalatlaco', ''),
(700, 15, '044', 'Jaltenco', ''),
(701, 15, '045', 'Jilotepec', ''),
(702, 15, '046', 'Jilotzingo', ''),
(703, 15, '047', 'Jiquipilco', ''),
(704, 15, '048', 'Jocotitl', ''),
(705, 15, '049', 'Joquicingo', ''),
(706, 15, '050', 'Juchitepec', ''),
(707, 15, '051', 'Lerma', ''),
(708, 15, '052', 'Malinalco', ''),
(709, 15, '053', 'Melchor Ocampo', ''),
(710, 15, '054', 'Metepec', ''),
(711, 15, '055', 'Mexicaltzingo', ''),
(712, 15, '056', 'Morelos', ''),
(713, 15, '057', 'Naucalpan de Ju', ''),
(714, 15, '058', 'Nezahualc', ''),
(715, 15, '059', 'Nextlalpan', ''),
(716, 15, '060', 'Nicol', ''),
(717, 15, '061', 'Nopaltepec', ''),
(718, 15, '062', 'Ocoyoacac', ''),
(719, 15, '063', 'Ocuilan', ''),
(720, 15, '064', 'El Oro', ''),
(721, 15, '065', 'Otumba', ''),
(722, 15, '066', 'Otzoloapan', ''),
(723, 15, '067', 'Otzolotepec', ''),
(724, 15, '068', 'Ozumba', ''),
(725, 15, '069', 'Papalotla', ''),
(726, 15, '070', 'La Paz', ''),
(727, 15, '071', 'Polotitl', ''),
(728, 15, '072', 'Ray', ''),
(729, 15, '073', 'San Antonio la Isla', ''),
(730, 15, '074', 'San Felipe del Progreso', ''),
(731, 15, '075', 'San Mart', ''),
(732, 15, '076', 'San Mateo Atenco', ''),
(733, 15, '077', 'San Sim', ''),
(734, 15, '078', 'Santo Tom', ''),
(735, 15, '079', 'Soyaniquilpan de Ju', ''),
(736, 15, '080', 'Sultepec', ''),
(737, 15, '081', 'Tec', ''),
(738, 15, '082', 'Tejupilco', ''),
(739, 15, '083', 'Temamatla', ''),
(740, 15, '084', 'Temascalapa', ''),
(741, 15, '085', 'Temascalcingo', ''),
(742, 15, '086', 'Temascaltepec', ''),
(743, 15, '087', 'Temoaya', ''),
(744, 15, '088', 'Tenancingo', ''),
(745, 15, '089', 'Tenango del Aire', ''),
(746, 15, '090', 'Tenango del Valle', ''),
(747, 15, '091', 'Teoloyucan', ''),
(748, 15, '092', 'Teotihuac', ''),
(749, 15, '093', 'Tepetlaoxtoc', ''),
(750, 15, '094', 'Tepetlixpa', ''),
(751, 15, '095', 'Tepotzotl', ''),
(752, 15, '096', 'Tequixquiac', ''),
(753, 15, '097', 'Texcaltitl', ''),
(754, 15, '098', 'Texcalyacac', ''),
(755, 15, '099', 'Texcoco', ''),
(756, 15, '100', 'Tezoyuca', ''),
(757, 15, '101', 'Tianguistenco', ''),
(758, 15, '102', 'Timilpan', ''),
(759, 15, '103', 'Tlalmanalco', ''),
(760, 15, '104', 'Tlalnepantla de Baz', ''),
(761, 15, '105', 'Tlatlaya', ''),
(762, 15, '106', 'Toluca', ''),
(763, 15, '107', 'Tonatico', ''),
(764, 15, '108', 'Tultepec', ''),
(765, 15, '109', 'Tultitl', ''),
(766, 15, '110', 'Valle de Bravo', ''),
(767, 15, '111', 'Villa de Allende', ''),
(768, 15, '112', 'Villa del Carb', ''),
(769, 15, '113', 'Villa Guerrero', ''),
(770, 15, '114', 'Villa Victoria', ''),
(771, 15, '115', 'Xonacatl', ''),
(772, 15, '116', 'Zacazonapan', ''),
(773, 15, '117', 'Zacualpan', ''),
(774, 15, '118', 'Zinacantepec', ''),
(775, 15, '119', 'Zumpahuac', ''),
(776, 15, '120', 'Zumpango', ''),
(777, 15, '121', 'Cuautitl', ''),
(778, 15, '122', 'Valle de Chalco Solidaridad', ''),
(779, 15, '123', 'Luvianos', ''),
(780, 15, '124', 'San Jos', ''),
(781, 15, '125', 'Tonanitla', ''),
(782, 16, '001', 'Acuitzio', ''),
(783, 16, '002', 'Aguililla', ''),
(784, 16, '003', '', ''),
(785, 16, '004', 'Angamacutiro', ''),
(786, 16, '005', 'Angangueo', ''),
(787, 16, '006', 'Apatzing', ''),
(788, 16, '007', 'Aporo', ''),
(789, 16, '008', 'Aquila', ''),
(790, 16, '009', 'Ario', ''),
(791, 16, '010', 'Arteaga', ''),
(792, 16, '011', 'Brise', ''),
(793, 16, '012', 'Buenavista', ''),
(794, 16, '013', 'Car', ''),
(795, 16, '014', 'Coahuayana', ''),
(796, 16, '015', 'Coalcom', ''),
(797, 16, '016', 'Coeneo', ''),
(798, 16, '017', 'Contepec', ''),
(799, 16, '018', 'Cop', ''),
(800, 16, '019', 'Cotija', ''),
(801, 16, '020', 'Cuitzeo', ''),
(802, 16, '021', 'Charapan', ''),
(803, 16, '022', 'Charo', ''),
(804, 16, '023', 'Chavinda', ''),
(805, 16, '024', 'Cher', ''),
(806, 16, '025', 'Chilchota', ''),
(807, 16, '026', 'Chinicuila', ''),
(808, 16, '027', 'Chuc', ''),
(809, 16, '028', 'Churintzio', ''),
(810, 16, '029', 'Churumuco', ''),
(811, 16, '030', 'Ecuandureo', ''),
(812, 16, '031', 'Epitacio Huerta', ''),
(813, 16, '032', 'Erongar', ''),
(814, 16, '033', 'Gabriel Zamora', ''),
(815, 16, '034', 'Hidalgo', ''),
(816, 16, '035', 'La Huacana', ''),
(817, 16, '036', 'Huandacareo', ''),
(818, 16, '037', 'Huaniqueo', ''),
(819, 16, '038', 'Huetamo', ''),
(820, 16, '039', 'Huiramba', ''),
(821, 16, '040', 'Indaparapeo', ''),
(822, 16, '041', 'Irimbo', ''),
(823, 16, '042', 'Ixtl', ''),
(824, 16, '043', 'Jacona', ''),
(825, 16, '044', 'Jim', ''),
(826, 16, '045', 'Jiquilpan', ''),
(827, 16, '046', 'Ju', ''),
(828, 16, '047', 'Jungapeo', ''),
(829, 16, '048', 'Lagunillas', ''),
(830, 16, '049', 'Madero', ''),
(831, 16, '050', 'Maravat', ''),
(832, 16, '051', 'Marcos Castellanos', ''),
(833, 16, '052', 'L', ''),
(834, 16, '053', 'Morelia', ''),
(835, 16, '054', 'Morelos', ''),
(836, 16, '055', 'M', ''),
(837, 16, '056', 'Nahuatzen', ''),
(838, 16, '057', 'Nocup', ''),
(839, 16, '058', 'Nuevo Parangaricutiro', ''),
(840, 16, '059', 'Nuevo Urecho', ''),
(841, 16, '060', 'Numar', ''),
(842, 16, '061', 'Ocampo', ''),
(843, 16, '062', 'Pajacuar', ''),
(844, 16, '063', 'Panind', ''),
(845, 16, '064', 'Par', ''),
(846, 16, '065', 'Paracho', ''),
(847, 16, '066', 'P', ''),
(848, 16, '067', 'Penjamillo', ''),
(849, 16, '068', 'Perib', ''),
(850, 16, '069', 'La Piedad', ''),
(851, 16, '070', 'Pur', ''),
(852, 16, '071', 'Puru', ''),
(853, 16, '072', 'Quer', ''),
(854, 16, '073', 'Quiroga', ''),
(855, 16, '074', 'Cojumatl', ''),
(856, 16, '075', 'Los Reyes', ''),
(857, 16, '076', 'Sahuayo', ''),
(858, 16, '077', 'San Lucas', ''),
(859, 16, '078', 'Santa Ana Maya', ''),
(860, 16, '079', 'Salvador Escalante', ''),
(861, 16, '080', 'Senguio', ''),
(862, 16, '081', 'Susupuato', ''),
(863, 16, '082', 'Tac', ''),
(864, 16, '083', 'Tanc', ''),
(865, 16, '084', 'Tangamandapio', ''),
(866, 16, '085', 'Tanganc', ''),
(867, 16, '086', 'Tanhuato', ''),
(868, 16, '087', 'Taretan', ''),
(869, 16, '088', 'Tar', ''),
(870, 16, '089', 'Tepalcatepec', ''),
(871, 16, '090', 'Tingambato', ''),
(872, 16, '091', 'Ting', ''),
(873, 16, '092', 'Tiquicheo de Nicol', ''),
(874, 16, '093', 'Tlalpujahua', ''),
(875, 16, '094', 'Tlazazalca', ''),
(876, 16, '095', 'Tocumbo', ''),
(877, 16, '096', 'Tumbiscat', ''),
(878, 16, '097', 'Turicato', ''),
(879, 16, '098', 'Tuxpan', ''),
(880, 16, '099', 'Tuzantla', ''),
(881, 16, '100', 'Tzintzuntzan', ''),
(882, 16, '101', 'Tzitzio', ''),
(883, 16, '102', 'Uruapan', ''),
(884, 16, '103', 'Venustiano Carranza', ''),
(885, 16, '104', 'Villamar', ''),
(886, 16, '105', 'Vista Hermosa', ''),
(887, 16, '106', 'Yur', ''),
(888, 16, '107', 'Zacapu', ''),
(889, 16, '108', 'Zamora', ''),
(890, 16, '109', 'Zin', ''),
(891, 16, '110', 'Zinap', ''),
(892, 16, '111', 'Ziracuaretiro', ''),
(893, 16, '112', 'Zit', ''),
(894, 16, '113', 'Jos', ''),
(895, 17, '001', 'Amacuzac', ''),
(896, 17, '002', 'Atlatlahucan', ''),
(897, 17, '003', 'Axochiapan', ''),
(898, 17, '004', 'Ayala', ''),
(899, 17, '005', 'Coatl', ''),
(900, 17, '006', 'Cuautla', ''),
(901, 17, '007', 'Cuernavaca', ''),
(902, 17, '008', 'Emiliano Zapata', ''),
(903, 17, '009', 'Huitzilac', ''),
(904, 17, '010', 'Jantetelco', ''),
(905, 17, '011', 'Jiutepec', ''),
(906, 17, '012', 'Jojutla', ''),
(907, 17, '013', 'Jonacatepec', ''),
(908, 17, '014', 'Mazatepec', ''),
(909, 17, '015', 'Miacatl', ''),
(910, 17, '016', 'Ocuituco', ''),
(911, 17, '017', 'Puente de Ixtla', ''),
(912, 17, '018', 'Temixco', ''),
(913, 17, '019', 'Tepalcingo', ''),
(914, 17, '020', 'Tepoztl', ''),
(915, 17, '021', 'Tetecala', ''),
(916, 17, '022', 'Tetela del Volc', ''),
(917, 17, '023', 'Tlalnepantla', ''),
(918, 17, '024', 'Tlaltizap', ''),
(919, 17, '025', 'Tlaquiltenango', ''),
(920, 17, '026', 'Tlayacapan', ''),
(921, 17, '027', 'Totolapan', ''),
(922, 17, '028', 'Xochitepec', ''),
(923, 17, '029', 'Yautepec', ''),
(924, 17, '030', 'Yecapixtla', ''),
(925, 17, '031', 'Zacatepec', ''),
(926, 17, '032', 'Zacualpan', ''),
(927, 17, '033', 'Temoac', ''),
(928, 18, '001', 'Acaponeta', ''),
(929, 18, '002', 'Ahuacatl', ''),
(930, 18, '003', 'Amatl', ''),
(931, 18, '004', 'Compostela', ''),
(932, 18, '005', 'Huajicori', ''),
(933, 18, '006', 'Ixtl', ''),
(934, 18, '007', 'Jala', ''),
(935, 18, '008', 'Xalisco', ''),
(936, 18, '009', 'Del Nayar', ''),
(937, 18, '010', 'Rosamorada', ''),
(938, 18, '011', 'Ru', ''),
(939, 18, '012', 'San Blas', ''),
(940, 18, '013', 'San Pedro Lagunillas', ''),
(941, 18, '014', 'Santa Mar', ''),
(942, 18, '015', 'Santiago Ixcuintla', ''),
(943, 18, '016', 'Tecuala', ''),
(944, 18, '017', 'Tepic', ''),
(945, 18, '018', 'Tuxpan', ''),
(946, 18, '019', 'La Yesca', ''),
(947, 18, '020', 'Bah', ''),
(948, 19, '001', 'Abasolo', ''),
(949, 19, '002', 'Agualeguas', ''),
(950, 19, '003', 'Los Aldamas', ''),
(951, 19, '004', 'Allende', ''),
(952, 19, '005', 'An', ''),
(953, 19, '006', 'Apodaca', ''),
(954, 19, '007', 'Aramberri', ''),
(955, 19, '008', 'Bustamante', ''),
(956, 19, '009', 'Cadereyta Jim', ''),
(957, 19, '010', 'El Carmen', ''),
(958, 19, '011', 'Cerralvo', ''),
(959, 19, '012', 'Ci', ''),
(960, 19, '013', 'China', ''),
(961, 19, '014', 'Doctor Arroyo', ''),
(962, 19, '015', 'Doctor Coss', ''),
(963, 19, '016', 'Doctor Gonz', ''),
(964, 19, '017', 'Galeana', ''),
(965, 19, '018', 'Garc', ''),
(966, 19, '019', 'San Pedro Garza Garc', ''),
(967, 19, '020', 'General Bravo', ''),
(968, 19, '021', 'General Escobedo', ''),
(969, 19, '022', 'General Ter', ''),
(970, 19, '023', 'General Trevi', ''),
(971, 19, '024', 'General Zaragoza', ''),
(972, 19, '025', 'General Zuazua', ''),
(973, 19, '026', 'Guadalupe', ''),
(974, 19, '027', 'Los Herreras', ''),
(975, 19, '028', 'Higueras', ''),
(976, 19, '029', 'Hualahuises', ''),
(977, 19, '030', 'Iturbide', ''),
(978, 19, '031', 'Ju', ''),
(979, 19, '032', 'Lampazos de Naranjo', ''),
(980, 19, '033', 'Linares', ''),
(981, 19, '034', 'Mar', ''),
(982, 19, '035', 'Melchor Ocampo', ''),
(983, 19, '036', 'Mier y Noriega', ''),
(984, 19, '037', 'Mina', ''),
(985, 19, '038', 'Montemorelos', ''),
(986, 19, '039', 'Monterrey', ''),
(987, 19, '040', 'Par', ''),
(988, 19, '041', 'Pesquer', ''),
(989, 19, '042', 'Los Ramones', ''),
(990, 19, '043', 'Rayones', ''),
(991, 19, '044', 'Sabinas Hidalgo', ''),
(992, 19, '045', 'Salinas Victoria', ''),
(993, 19, '046', 'San Nicol', ''),
(994, 19, '047', 'Hidalgo', ''),
(995, 19, '048', 'Santa Catarina', ''),
(996, 19, '049', 'Santiago', ''),
(997, 19, '050', 'Vallecillo', ''),
(998, 19, '051', 'Villaldama', ''),
(999, 20, '001', 'Abejones', ''),
(1000, 20, '002', 'Acatl', ''),
(1001, 20, '003', 'Asunci', ''),
(1002, 20, '004', 'Asunci', ''),
(1003, 20, '005', 'Asunci', ''),
(1004, 20, '006', 'Asunci', ''),
(1005, 20, '007', 'Asunci', ''),
(1006, 20, '008', 'Asunci', ''),
(1007, 20, '009', 'Ayotzintepec', ''),
(1008, 20, '010', 'El Barrio de la Soledad', ''),
(1009, 20, '011', 'Calihual', ''),
(1010, 20, '012', 'Candelaria Loxicha', ''),
(1011, 20, '013', 'Ci', ''),
(1012, 20, '014', 'Ciudad Ixtepec', ''),
(1013, 20, '015', 'Coatecas Altas', ''),
(1014, 20, '016', 'Coicoy', ''),
(1015, 20, '017', 'La Compa', ''),
(1016, 20, '018', 'Concepci', ''),
(1017, 20, '019', 'Concepci', ''),
(1018, 20, '020', 'Constancia del Rosario', ''),
(1019, 20, '021', 'Cosolapa', ''),
(1020, 20, '022', 'Cosoltepec', ''),
(1021, 20, '023', 'Cuil', ''),
(1022, 20, '024', 'Cuyamecalco Villa de Zaragoza', ''),
(1023, 20, '025', 'Chahuites', ''),
(1024, 20, '026', 'Chalcatongo de Hidalgo', ''),
(1025, 20, '027', 'Chiquihuitl', ''),
(1026, 20, '028', 'Heroica Ciudad de Ejutla de Crespo', ''),
(1027, 20, '029', 'Eloxochitl', ''),
(1028, 20, '030', 'El Espinal', ''),
(1029, 20, '031', 'Tamazul', ''),
(1030, 20, '032', 'Fresnillo de Trujano', ''),
(1031, 20, '033', 'Guadalupe Etla', ''),
(1032, 20, '034', 'Guadalupe de Ram', ''),
(1033, 20, '035', 'Guelatao de Ju', ''),
(1034, 20, '036', 'Guevea de Humboldt', ''),
(1035, 20, '037', 'Mesones Hidalgo', ''),
(1036, 20, '038', 'Villa Hidalgo', ''),
(1037, 20, '039', 'Heroica Ciudad de Huajuapan de Le', ''),
(1038, 20, '040', 'Huautepec', ''),
(1039, 20, '041', 'Huautla de Jim', ''),
(1040, 20, '042', 'Ixtl', ''),
(1041, 20, '043', 'Heroica Ciudad de Juchit', ''),
(1042, 20, '044', 'Loma Bonita', ''),
(1043, 20, '045', 'Magdalena Apasco', ''),
(1044, 20, '046', 'Magdalena Jaltepec', ''),
(1045, 20, '047', 'Santa Magdalena Jicotl', ''),
(1046, 20, '048', 'Magdalena Mixtepec', ''),
(1047, 20, '049', 'Magdalena Ocotl', ''),
(1048, 20, '050', 'Magdalena Pe', ''),
(1049, 20, '051', 'Magdalena Teitipac', ''),
(1050, 20, '052', 'Magdalena Tequisistl', ''),
(1051, 20, '053', 'Magdalena Tlacotepec', ''),
(1052, 20, '054', 'Magdalena Zahuatl', ''),
(1053, 20, '055', 'Mariscala de Ju', ''),
(1054, 20, '056', 'M', ''),
(1055, 20, '057', 'Mat', ''),
(1056, 20, '058', 'Mazatl', ''),
(1057, 20, '059', 'Miahuatl', ''),
(1058, 20, '060', 'Mixistl', ''),
(1059, 20, '061', 'Monjas', ''),
(1060, 20, '062', 'Natividad', ''),
(1061, 20, '063', 'Nazareno Etla', ''),
(1062, 20, '064', 'Nejapa de Madero', ''),
(1063, 20, '065', 'Ixpantepec Nieves', ''),
(1064, 20, '066', 'Santiago Niltepec', ''),
(1065, 20, '067', 'Oaxaca de Ju', ''),
(1066, 20, '068', 'Ocotl', ''),
(1067, 20, '069', 'La Pe', ''),
(1068, 20, '070', 'Pinotepa de Don Luis', ''),
(1069, 20, '071', 'Pluma Hidalgo', ''),
(1070, 20, '072', 'San Jos', ''),
(1071, 20, '073', 'Putla Villa de Guerrero', ''),
(1072, 20, '074', 'Santa Catarina Quioquitani', ''),
(1073, 20, '075', 'Reforma de Pineda', ''),
(1074, 20, '076', 'La Reforma', ''),
(1075, 20, '077', 'Reyes Etla', ''),
(1076, 20, '078', 'Rojas de Cuauht', ''),
(1077, 20, '079', 'Salina Cruz', ''),
(1078, 20, '080', 'San Agust', ''),
(1079, 20, '081', 'San Agust', ''),
(1080, 20, '082', 'San Agust', ''),
(1081, 20, '083', 'San Agust', ''),
(1082, 20, '084', 'San Agust', ''),
(1083, 20, '085', 'San Agust', ''),
(1084, 20, '086', 'San Agust', ''),
(1085, 20, '087', 'San Agust', ''),
(1086, 20, '088', 'San Andr', ''),
(1087, 20, '089', 'San Andr', ''),
(1088, 20, '090', 'San Andr', ''),
(1089, 20, '091', 'San Andr', ''),
(1090, 20, '092', 'San Andr', ''),
(1091, 20, '093', 'San Andr', ''),
(1092, 20, '094', 'San Andr', ''),
(1093, 20, '095', 'San Andr', ''),
(1094, 20, '096', 'San Andr', ''),
(1095, 20, '097', 'San Andr', ''),
(1096, 20, '098', 'San Andr', ''),
(1097, 20, '099', 'San Andr', ''),
(1098, 20, '100', 'San Andr', ''),
(1099, 20, '101', 'San Andr', ''),
(1100, 20, '102', 'San Andr', ''),
(1101, 20, '103', 'San Antonino Castillo Velasco', ''),
(1102, 20, '104', 'San Antonino el Alto', ''),
(1103, 20, '105', 'San Antonino Monte Verde', ''),
(1104, 20, '106', 'San Antonio Acutla', ''),
(1105, 20, '107', 'San Antonio de la Cal', ''),
(1106, 20, '108', 'San Antonio Huitepec', ''),
(1107, 20, '109', 'San Antonio Nanahuat', ''),
(1108, 20, '110', 'San Antonio Sinicahua', ''),
(1109, 20, '111', 'San Antonio Tepetlapa', ''),
(1110, 20, '112', 'San Baltazar Chichic', ''),
(1111, 20, '113', 'San Baltazar Loxicha', ''),
(1112, 20, '114', 'San Baltazar Yatzachi el Bajo', ''),
(1113, 20, '115', 'San Bartolo Coyotepec', ''),
(1114, 20, '116', 'San Bartolom', ''),
(1115, 20, '117', 'San Bartolom', ''),
(1116, 20, '118', 'San Bartolom', ''),
(1117, 20, '119', 'San Bartolom', ''),
(1118, 20, '120', 'San Bartolom', ''),
(1119, 20, '121', 'San Bartolo Soyaltepec', ''),
(1120, 20, '122', 'San Bartolo Yautepec', ''),
(1121, 20, '123', 'San Bernardo Mixtepec', ''),
(1122, 20, '124', 'San Blas Atempa', ''),
(1123, 20, '125', 'San Carlos Yautepec', ''),
(1124, 20, '126', 'San Crist', ''),
(1125, 20, '127', 'San Crist', ''),
(1126, 20, '128', 'San Crist', ''),
(1127, 20, '129', 'San Crist', ''),
(1128, 20, '130', 'San Dionisio del Mar', ''),
(1129, 20, '131', 'San Dionisio Ocotepec', ''),
(1130, 20, '132', 'San Dionisio Ocotl', ''),
(1131, 20, '133', 'San Esteban Atatlahuca', ''),
(1132, 20, '134', 'San Felipe Jalapa de D', ''),
(1133, 20, '135', 'San Felipe Tejal', ''),
(1134, 20, '136', 'San Felipe Usila', ''),
(1135, 20, '137', 'San Francisco Cahuacu', ''),
(1136, 20, '138', 'San Francisco Cajonos', ''),
(1137, 20, '139', 'San Francisco Chapulapa', ''),
(1138, 20, '140', 'San Francisco Chind', ''),
(1139, 20, '141', 'San Francisco del Mar', ''),
(1140, 20, '142', 'San Francisco Huehuetl', ''),
(1141, 20, '143', 'San Francisco Ixhuat', ''),
(1142, 20, '144', 'San Francisco Jaltepetongo', ''),
(1143, 20, '145', 'San Francisco Lachigol', ''),
(1144, 20, '146', 'San Francisco Logueche', ''),
(1145, 20, '147', 'San Francisco Nuxa', ''),
(1146, 20, '148', 'San Francisco Ozolotepec', ''),
(1147, 20, '149', 'San Francisco Sola', ''),
(1148, 20, '150', 'San Francisco Telixtlahuaca', ''),
(1149, 20, '151', 'San Francisco Teopan', ''),
(1150, 20, '152', 'San Francisco Tlapancingo', ''),
(1151, 20, '153', 'San Gabriel Mixtepec', ''),
(1152, 20, '154', 'San Ildefonso Amatl', ''),
(1153, 20, '155', 'San Ildefonso Sola', ''),
(1154, 20, '156', 'San Ildefonso Villa Alta', ''),
(1155, 20, '157', 'San Jacinto Amilpas', ''),
(1156, 20, '158', 'San Jacinto Tlacotepec', ''),
(1157, 20, '159', 'San Jer', ''),
(1158, 20, '160', 'San Jer', ''),
(1159, 20, '161', 'San Jer', ''),
(1160, 20, '162', 'San Jer', ''),
(1161, 20, '163', 'San Jer', ''),
(1162, 20, '164', 'San Jorge Nuchita', ''),
(1163, 20, '165', 'San Jos', ''),
(1164, 20, '166', 'San Jos', ''),
(1165, 20, '167', 'San Jos', ''),
(1166, 20, '168', 'San Jos', ''),
(1167, 20, '169', 'San Jos', ''),
(1168, 20, '170', 'San Jos', ''),
(1169, 20, '171', 'San Jos', ''),
(1170, 20, '172', 'San Juan Achiutla', ''),
(1171, 20, '173', 'San Juan Atepec', ''),
(1172, 20, '174', '', ''),
(1173, 20, '175', 'San Juan Bautista Atatlahuca', ''),
(1174, 20, '176', 'San Juan Bautista Coixtlahuaca', ''),
(1175, 20, '177', 'San Juan Bautista Cuicatl', ''),
(1176, 20, '178', 'San Juan Bautista Guelache', ''),
(1177, 20, '179', 'San Juan Bautista Jayacatl', ''),
(1178, 20, '180', 'San Juan Bautista Lo de Soto', ''),
(1179, 20, '181', 'San Juan Bautista Suchitepec', ''),
(1180, 20, '182', 'San Juan Bautista Tlacoatzintepec', ''),
(1181, 20, '183', 'San Juan Bautista Tlachichilco', ''),
(1182, 20, '184', 'San Juan Bautista Tuxtepec', ''),
(1183, 20, '185', 'San Juan Cacahuatepec', ''),
(1184, 20, '186', 'San Juan Cieneguilla', ''),
(1185, 20, '187', 'San Juan Coatz', ''),
(1186, 20, '188', 'San Juan Colorado', ''),
(1187, 20, '189', 'San Juan Comaltepec', ''),
(1188, 20, '190', 'San Juan Cotzoc', ''),
(1189, 20, '191', 'San Juan Chicomez', ''),
(1190, 20, '192', 'San Juan Chilateca', ''),
(1191, 20, '193', 'San Juan del Estado', ''),
(1192, 20, '194', 'San Juan del R', ''),
(1193, 20, '195', 'San Juan Diuxi', ''),
(1194, 20, '196', 'San Juan Evangelista Analco', ''),
(1195, 20, '197', 'San Juan Guelav', ''),
(1196, 20, '198', 'San Juan Guichicovi', ''),
(1197, 20, '199', 'San Juan Ihualtepec', ''),
(1198, 20, '200', 'San Juan Juquila Mixes', ''),
(1199, 20, '201', 'San Juan Juquila Vijanos', ''),
(1200, 20, '202', 'San Juan Lachao', ''),
(1201, 20, '203', 'San Juan Lachigalla', ''),
(1202, 20, '204', 'San Juan Lajarcia', ''),
(1203, 20, '205', 'San Juan Lalana', ''),
(1204, 20, '206', 'San Juan de los Cu', ''),
(1205, 20, '207', 'San Juan Mazatl', ''),
(1206, 20, '208', 'San Juan Mixtepec -Dto. 08 -', ''),
(1207, 20, '209', 'San Juan Mixtepec -Dto. 26 -', ''),
(1208, 20, '210', 'San Juan ', ''),
(1209, 20, '211', 'San Juan Ozolotepec', ''),
(1210, 20, '212', 'San Juan Petlapa', ''),
(1211, 20, '213', 'San Juan Quiahije', ''),
(1212, 20, '214', 'San Juan Quiotepec', ''),
(1213, 20, '215', 'San Juan Sayultepec', ''),
(1214, 20, '216', 'San Juan Taba', ''),
(1215, 20, '217', 'San Juan Tamazola', ''),
(1216, 20, '218', 'San Juan Teita', ''),
(1217, 20, '219', 'San Juan Teitipac', ''),
(1218, 20, '220', 'San Juan Tepeuxila', ''),
(1219, 20, '221', 'San Juan Teposcolula', ''),
(1220, 20, '222', 'San Juan Yae', ''),
(1221, 20, '223', 'San Juan Yatzona', ''),
(1222, 20, '224', 'San Juan Yucuita', ''),
(1223, 20, '225', 'San Lorenzo', ''),
(1224, 20, '226', 'San Lorenzo Albarradas', ''),
(1225, 20, '227', 'San Lorenzo Cacaotepec', ''),
(1226, 20, '228', 'San Lorenzo Cuaunecuiltitla', ''),
(1227, 20, '229', 'San Lorenzo Texmel', ''),
(1228, 20, '230', 'San Lorenzo Victoria', ''),
(1229, 20, '231', 'San Lucas Camotl', ''),
(1230, 20, '232', 'San Lucas Ojitl', ''),
(1231, 20, '233', 'San Lucas Quiavin', ''),
(1232, 20, '234', 'San Lucas Zoqui', ''),
(1233, 20, '235', 'San Luis Amatl', ''),
(1234, 20, '236', 'San Marcial Ozolotepec', ''),
(1235, 20, '237', 'San Marcos Arteaga', ''),
(1236, 20, '238', 'San Mart', ''),
(1237, 20, '239', 'San Mart', ''),
(1238, 20, '240', 'San Mart', ''),
(1239, 20, '241', 'San Mart', ''),
(1240, 20, '242', 'San Mart', ''),
(1241, 20, '243', 'San Mart', ''),
(1242, 20, '244', 'San Mart', ''),
(1243, 20, '245', 'San Mart', ''),
(1244, 20, '246', 'San Mateo Cajonos', ''),
(1245, 20, '247', 'Capul', ''),
(1246, 20, '248', 'San Mateo del Mar', ''),
(1247, 20, '249', 'San Mateo Yoloxochitl', ''),
(1248, 20, '250', 'San Mateo Etlatongo', ''),
(1249, 20, '251', 'San Mateo Nej', ''),
(1250, 20, '252', 'San Mateo Pe', ''),
(1251, 20, '253', 'San Mateo Pi', ''),
(1252, 20, '254', 'San Mateo R', ''),
(1253, 20, '255', 'San Mateo Sindihui', ''),
(1254, 20, '256', 'San Mateo Tlapiltepec', ''),
(1255, 20, '257', 'San Melchor Betaza', ''),
(1256, 20, '258', 'San Miguel Achiutla', ''),
(1257, 20, '259', 'San Miguel Ahuehuetitl', ''),
(1258, 20, '260', 'San Miguel Alo', ''),
(1259, 20, '261', 'San Miguel Amatitl', ''),
(1260, 20, '262', 'San Miguel Amatl', ''),
(1261, 20, '263', 'San Miguel Coatl', ''),
(1262, 20, '264', 'San Miguel Chicahua', ''),
(1263, 20, '265', 'San Miguel Chimalapa', ''),
(1264, 20, '266', 'San Miguel del Puerto', ''),
(1265, 20, '267', 'San Miguel del R', ''),
(1266, 20, '268', 'San Miguel Ejutla', ''),
(1267, 20, '269', 'San Miguel el Grande', ''),
(1268, 20, '270', 'San Miguel Huautla', ''),
(1269, 20, '271', 'San Miguel Mixtepec', ''),
(1270, 20, '272', 'San Miguel Panixtlahuaca', ''),
(1271, 20, '273', 'San Miguel Peras', ''),
(1272, 20, '274', 'San Miguel Piedras', ''),
(1273, 20, '275', 'San Miguel Quetzaltepec', ''),
(1274, 20, '276', 'San Miguel Santa Flor', ''),
(1275, 20, '277', 'Villa Sola de Vega', ''),
(1276, 20, '278', 'San Miguel Soyaltepec', ''),
(1277, 20, '279', 'San Miguel Suchixtepec', ''),
(1278, 20, '280', 'Villa Talea de Castro', ''),
(1279, 20, '281', 'San Miguel Tecomatl', ''),
(1280, 20, '282', 'San Miguel Tenango', ''),
(1281, 20, '283', 'San Miguel Tequixtepec', ''),
(1282, 20, '284', 'San Miguel Tilqui', ''),
(1283, 20, '285', 'San Miguel Tlacamama', ''),
(1284, 20, '286', 'San Miguel Tlacotepec', ''),
(1285, 20, '287', 'San Miguel Tulancingo', ''),
(1286, 20, '288', 'San Miguel Yotao', ''),
(1287, 20, '289', 'San Nicol', ''),
(1288, 20, '290', 'San Nicol', ''),
(1289, 20, '291', 'San Pablo Coatl', ''),
(1290, 20, '292', 'San Pablo Cuatro Venados', ''),
(1291, 20, '293', 'San Pablo Etla', ''),
(1292, 20, '294', 'San Pablo Huitzo', ''),
(1293, 20, '295', 'San Pablo Huixtepec', ''),
(1294, 20, '296', 'San Pablo Macuiltianguis', ''),
(1295, 20, '297', 'San Pablo Tijaltepec', ''),
(1296, 20, '298', 'San Pablo Villa de Mitla', ''),
(1297, 20, '299', 'San Pablo Yaganiza', ''),
(1298, 20, '300', 'San Pedro Amuzgos', ''),
(1299, 20, '301', 'San Pedro Ap', ''),
(1300, 20, '302', 'San Pedro Atoyac', ''),
(1301, 20, '303', 'San Pedro Cajonos', ''),
(1302, 20, '304', 'San Pedro Coxcaltepec C', ''),
(1303, 20, '305', 'San Pedro Comitancillo', ''),
(1304, 20, '306', 'San Pedro el Alto', ''),
(1305, 20, '307', 'San Pedro Huamelula', ''),
(1306, 20, '308', 'San Pedro Huilotepec', ''),
(1307, 20, '309', 'San Pedro Ixcatl', ''),
(1308, 20, '310', 'San Pedro Ixtlahuaca', ''),
(1309, 20, '311', 'San Pedro Jaltepetongo', ''),
(1310, 20, '312', 'San Pedro Jicay', ''),
(1311, 20, '313', 'San Pedro Jocotipac', ''),
(1312, 20, '314', 'San Pedro Juchatengo', ''),
(1313, 20, '315', 'San Pedro M', ''),
(1314, 20, '316', 'San Pedro M', ''),
(1315, 20, '317', 'San Pedro M', ''),
(1316, 20, '318', 'San Pedro Mixtepec -Dto. 22 -', ''),
(1317, 20, '319', 'San Pedro Mixtepec -Dto. 26 -', ''),
(1318, 20, '320', 'San Pedro Molinos', ''),
(1319, 20, '321', 'San Pedro Nopala', ''),
(1320, 20, '322', 'San Pedro Ocopetatillo', ''),
(1321, 20, '323', 'San Pedro Ocotepec', ''),
(1322, 20, '324', 'San Pedro Pochutla', ''),
(1323, 20, '325', 'San Pedro Quiatoni', ''),
(1324, 20, '326', 'San Pedro Sochi', ''),
(1325, 20, '327', 'San Pedro Tapanatepec', ''),
(1326, 20, '328', 'San Pedro Taviche', ''),
(1327, 20, '329', 'San Pedro Teozacoalco', ''),
(1328, 20, '330', 'San Pedro Teutila', ''),
(1329, 20, '331', 'San Pedro Tida', ''),
(1330, 20, '332', 'San Pedro Topiltepec', ''),
(1331, 20, '333', 'San Pedro Totol', ''),
(1332, 20, '334', 'Villa de Tututepec de Melchor Ocampo', ''),
(1333, 20, '335', 'San Pedro Yaneri', ''),
(1334, 20, '336', 'San Pedro Y', ''),
(1335, 20, '337', 'San Pedro y San Pablo Ayutla', ''),
(1336, 20, '338', 'Villa de Etla', ''),
(1337, 20, '339', 'San Pedro y San Pablo Teposcolula', ''),
(1338, 20, '340', 'San Pedro y San Pablo Tequixtepec', ''),
(1339, 20, '341', 'San Pedro Yucunama', ''),
(1340, 20, '342', 'San Raymundo Jalpan', ''),
(1341, 20, '343', 'San Sebasti', ''),
(1342, 20, '344', 'San Sebasti', ''),
(1343, 20, '345', 'San Sebasti', ''),
(1344, 20, '346', 'San Sebasti', ''),
(1345, 20, '347', 'San Sebasti', ''),
(1346, 20, '348', 'San Sebasti', ''),
(1347, 20, '349', 'San Sebasti', ''),
(1348, 20, '350', 'San Sebasti', ''),
(1349, 20, '351', 'San Sim', ''),
(1350, 20, '352', 'San Sim', ''),
(1351, 20, '353', 'Santa Ana', ''),
(1352, 20, '354', 'Santa Ana Ateixtlahuaca', ''),
(1353, 20, '355', 'Santa Ana Cuauht', ''),
(1354, 20, '356', 'Santa Ana del Valle', ''),
(1355, 20, '357', 'Santa Ana Tavela', ''),
(1356, 20, '358', 'Santa Ana Tlapacoyan', ''),
(1357, 20, '359', 'Santa Ana Yareni', ''),
(1358, 20, '360', 'Santa Ana Zegache', ''),
(1359, 20, '361', 'Santa Catalina Quier', ''),
(1360, 20, '362', 'Santa Catarina Cuixtla', ''),
(1361, 20, '363', 'Santa Catarina Ixtepeji', ''),
(1362, 20, '364', 'Santa Catarina Juquila', ''),
(1363, 20, '365', 'Santa Catarina Lachatao', ''),
(1364, 20, '366', 'Santa Catarina Loxicha', ''),
(1365, 20, '367', 'Santa Catarina Mechoac', ''),
(1366, 20, '368', 'Santa Catarina Minas', ''),
(1367, 20, '369', 'Santa Catarina Quian', ''),
(1368, 20, '370', 'Santa Catarina Tayata', ''),
(1369, 20, '371', 'Santa Catarina Ticu', ''),
(1370, 20, '372', 'Santa Catarina Yosonot', ''),
(1371, 20, '373', 'Santa Catarina Zapoquila', ''),
(1372, 20, '374', 'Santa Cruz Acatepec', ''),
(1373, 20, '375', 'Santa Cruz Amilpas', ''),
(1374, 20, '376', 'Santa Cruz de Bravo', ''),
(1375, 20, '377', 'Santa Cruz Itundujia', ''),
(1376, 20, '378', 'Santa Cruz Mixtepec', ''),
(1377, 20, '379', 'Santa Cruz Nundaco', ''),
(1378, 20, '380', 'Santa Cruz Papalutla', ''),
(1379, 20, '381', 'Santa Cruz Tacache de Mina', ''),
(1380, 20, '382', 'Santa Cruz Tacahua', ''),
(1381, 20, '383', 'Santa Cruz Tayata', ''),
(1382, 20, '384', 'Santa Cruz Xitla', ''),
(1383, 20, '385', 'Santa Cruz Xoxocotl', ''),
(1384, 20, '386', 'Santa Cruz Zenzontepec', ''),
(1385, 20, '387', 'Santa Gertrudis', ''),
(1386, 20, '388', 'Santa In', ''),
(1387, 20, '389', 'Santa In', ''),
(1388, 20, '390', 'Santa Luc', ''),
(1389, 20, '391', 'Santa Luc', ''),
(1390, 20, '392', 'Santa Luc', ''),
(1391, 20, '393', 'Santa Luc', ''),
(1392, 20, '394', 'Santa Mar', ''),
(1393, 20, '395', 'Santa Mar', ''),
(1394, 20, '396', 'Santa Mar', ''),
(1395, 20, '397', 'Heroica Ciudad de Tlaxiaco', ''),
(1396, 20, '398', 'Ayoquezco de Aldama', ''),
(1397, 20, '399', 'Santa Mar', '');
INSERT INTO `municipio` (`municipioId`, `estadoId`, `clave`, `nombre`, `sigla`) VALUES
(1398, 20, '400', 'Santa Mar', ''),
(1399, 20, '401', 'Santa Mar', ''),
(1400, 20, '402', 'Santa Mar', ''),
(1401, 20, '403', 'Santa Mar', ''),
(1402, 20, '404', 'Santa Mar', ''),
(1403, 20, '405', 'Villa de Chilapa de D', ''),
(1404, 20, '406', 'Santa Mar', ''),
(1405, 20, '407', 'Santa Mar', ''),
(1406, 20, '408', 'Santa Mar', ''),
(1407, 20, '409', 'Santa Mar', ''),
(1408, 20, '410', 'Santa Mar', ''),
(1409, 20, '411', 'Santa Mar', ''),
(1410, 20, '412', 'Santa Mar', ''),
(1411, 20, '413', 'Santa Mar', ''),
(1412, 20, '414', 'Santa Mar', ''),
(1413, 20, '415', 'Santa Mar', ''),
(1414, 20, '416', 'Santa Mar', ''),
(1415, 20, '417', 'Santa Mar', ''),
(1416, 20, '418', 'Santa Mar', ''),
(1417, 20, '419', 'Santa Mar', ''),
(1418, 20, '420', 'Santa Mar', ''),
(1419, 20, '421', 'Santa Mar', ''),
(1420, 20, '422', 'Santa Mar', ''),
(1421, 20, '423', 'Santa Mar', ''),
(1422, 20, '424', 'Santa Mar', ''),
(1423, 20, '425', 'Santa Mar', ''),
(1424, 20, '426', 'Santa Mar', ''),
(1425, 20, '427', 'Santa Mar', ''),
(1426, 20, '428', 'Santa Mar', ''),
(1427, 20, '429', 'Santa Mar', ''),
(1428, 20, '430', 'Santa Mar', ''),
(1429, 20, '431', 'Santa Mar', ''),
(1430, 20, '432', 'Santa Mar', ''),
(1431, 20, '433', 'Santa Mar', ''),
(1432, 20, '434', 'Santa Mar', ''),
(1433, 20, '435', 'Santa Mar', ''),
(1434, 20, '436', 'Santa Mar', ''),
(1435, 20, '437', 'Santa Mar', ''),
(1436, 20, '438', 'Santa Mar', ''),
(1437, 20, '439', 'Santa Mar', ''),
(1438, 20, '440', 'Santa Mar', ''),
(1439, 20, '441', 'Santa Mar', ''),
(1440, 20, '442', 'Santa Mar', ''),
(1441, 20, '443', 'Santa Mar', ''),
(1442, 20, '444', 'Santa Mar', ''),
(1443, 20, '445', 'Santa Mar', ''),
(1444, 20, '446', 'Santa Mar', ''),
(1445, 20, '447', 'Santa Mar', ''),
(1446, 20, '448', 'Santa Mar', ''),
(1447, 20, '449', 'Santa Mar', ''),
(1448, 20, '450', 'Santiago Amoltepec', ''),
(1449, 20, '451', 'Santiago Apoala', ''),
(1450, 20, '452', 'Santiago Ap', ''),
(1451, 20, '453', 'Santiago Astata', ''),
(1452, 20, '454', 'Santiago Atitl', ''),
(1453, 20, '455', 'Santiago Ayuquililla', ''),
(1454, 20, '456', 'Santiago Cacaloxtepec', ''),
(1455, 20, '457', 'Santiago Camotl', ''),
(1456, 20, '458', 'Santiago Comaltepec', ''),
(1457, 20, '459', 'Santiago Chazumba', ''),
(1458, 20, '460', 'Santiago Cho', ''),
(1459, 20, '461', 'Santiago del R', ''),
(1460, 20, '462', 'Santiago Huajolotitl', ''),
(1461, 20, '463', 'Santiago Huauclilla', ''),
(1462, 20, '464', 'Santiago Ihuitl', ''),
(1463, 20, '465', 'Santiago Ixcuintepec', ''),
(1464, 20, '466', 'Santiago Ixtayutla', ''),
(1465, 20, '467', 'Santiago Jamiltepec', ''),
(1466, 20, '468', 'Santiago Jocotepec', ''),
(1467, 20, '469', 'Santiago Juxtlahuaca', ''),
(1468, 20, '470', 'Santiago Lachiguiri', ''),
(1469, 20, '471', 'Santiago Lalopa', ''),
(1470, 20, '472', 'Santiago Laollaga', ''),
(1471, 20, '473', 'Santiago Laxopa', ''),
(1472, 20, '474', 'Santiago Llano Grande', ''),
(1473, 20, '475', 'Santiago Matatl', ''),
(1474, 20, '476', 'Santiago Miltepec', ''),
(1475, 20, '477', 'Santiago Minas', ''),
(1476, 20, '478', 'Santiago Nacaltepec', ''),
(1477, 20, '479', 'Santiago Nejapilla', ''),
(1478, 20, '480', 'Santiago Nundiche', ''),
(1479, 20, '481', 'Santiago Nuyo', ''),
(1480, 20, '482', 'Santiago Pinotepa Nacional', ''),
(1481, 20, '483', 'Santiago Suchilquitongo', ''),
(1482, 20, '484', 'Santiago Tamazola', ''),
(1483, 20, '485', 'Santiago Tapextla', ''),
(1484, 20, '486', 'Villa Tej', ''),
(1485, 20, '487', 'Santiago Tenango', ''),
(1486, 20, '488', 'Santiago Tepetlapa', ''),
(1487, 20, '489', 'Santiago Tetepec', ''),
(1488, 20, '490', 'Santiago Texcalcingo', ''),
(1489, 20, '491', 'Santiago Textitl', ''),
(1490, 20, '492', 'Santiago Tilantongo', ''),
(1491, 20, '493', 'Santiago Tillo', ''),
(1492, 20, '494', 'Santiago Tlazoyaltepec', ''),
(1493, 20, '495', 'Santiago Xanica', ''),
(1494, 20, '496', 'Santiago Xiacu', ''),
(1495, 20, '497', 'Santiago Yaitepec', ''),
(1496, 20, '498', 'Santiago Yaveo', ''),
(1497, 20, '499', 'Santiago Yolom', ''),
(1498, 20, '500', 'Santiago Yosond', ''),
(1499, 20, '501', 'Santiago Yucuyachi', ''),
(1500, 20, '502', 'Santiago Zacatepec', ''),
(1501, 20, '503', 'Santiago Zoochila', ''),
(1502, 20, '504', 'Nuevo Zoqui', ''),
(1503, 20, '505', 'Santo Domingo Ingenio', ''),
(1504, 20, '506', 'Santo Domingo Albarradas', ''),
(1505, 20, '507', 'Santo Domingo Armenta', ''),
(1506, 20, '508', 'Santo Domingo Chihuit', ''),
(1507, 20, '509', 'Santo Domingo de Morelos', ''),
(1508, 20, '510', 'Santo Domingo Ixcatl', ''),
(1509, 20, '511', 'Santo Domingo Nuxa', ''),
(1510, 20, '512', 'Santo Domingo Ozolotepec', ''),
(1511, 20, '513', 'Santo Domingo Petapa', ''),
(1512, 20, '514', 'Santo Domingo Roayaga', ''),
(1513, 20, '515', 'Santo Domingo Tehuantepec', ''),
(1514, 20, '516', 'Santo Domingo Teojomulco', ''),
(1515, 20, '517', 'Santo Domingo Tepuxtepec', ''),
(1516, 20, '518', 'Santo Domingo Tlatay', ''),
(1517, 20, '519', 'Santo Domingo Tomaltepec', ''),
(1518, 20, '520', 'Santo Domingo Tonal', ''),
(1519, 20, '521', 'Santo Domingo Tonaltepec', ''),
(1520, 20, '522', 'Santo Domingo Xagac', ''),
(1521, 20, '523', 'Santo Domingo Yanhuitl', ''),
(1522, 20, '524', 'Santo Domingo Yodohino', ''),
(1523, 20, '525', 'Santo Domingo Zanatepec', ''),
(1524, 20, '526', 'Santos Reyes Nopala', ''),
(1525, 20, '527', 'Santos Reyes P', ''),
(1526, 20, '528', 'Santos Reyes Tepejillo', ''),
(1527, 20, '529', 'Santos Reyes Yucun', ''),
(1528, 20, '530', 'Santo Tom', ''),
(1529, 20, '531', 'Santo Tom', ''),
(1530, 20, '532', 'Santo Tom', ''),
(1531, 20, '533', 'Santo Tom', ''),
(1532, 20, '534', 'San Vicente Coatl', ''),
(1533, 20, '535', 'San Vicente Lachix', ''),
(1534, 20, '536', 'San Vicente Nu', ''),
(1535, 20, '537', 'Silacayo', ''),
(1536, 20, '538', 'Sitio de Xitlapehua', ''),
(1537, 20, '539', 'Soledad Etla', ''),
(1538, 20, '540', 'Villa de Tamazul', ''),
(1539, 20, '541', 'Tanetze de Zaragoza', ''),
(1540, 20, '542', 'Taniche', ''),
(1541, 20, '543', 'Tataltepec de Vald', ''),
(1542, 20, '544', 'Teococuilco de Marcos P', ''),
(1543, 20, '545', 'Teotitl', ''),
(1544, 20, '546', 'Teotitl', ''),
(1545, 20, '547', 'Teotongo', ''),
(1546, 20, '548', 'Tepelmeme Villa de Morelos', ''),
(1547, 20, '549', 'Heroica Villa Tezoatl', ''),
(1548, 20, '549', 'Heroica Villa Tezoatl', ''),
(1549, 20, '549', 'Heroica Villa Tezoatl', ''),
(1550, 20, '549', 'Heroica Villa Tezoatl', ''),
(1551, 20, '549', 'Heroica Villa Tezoatl', ''),
(1552, 20, '549', 'Heroica Villa Tezoatl', ''),
(1553, 20, '549', 'Heroica Villa Tezoatl', ''),
(1554, 20, '549', 'Heroica Villa Tezoatl', ''),
(1555, 20, '549', 'Heroica Villa Tezoatl', ''),
(1556, 20, '549', 'Heroica Villa Tezoatl', ''),
(1557, 20, '549', 'Heroica Villa Tezoatl', ''),
(1558, 20, '549', 'Heroica Villa Tezoatl', ''),
(1559, 20, '549', 'Heroica Villa Tezoatl', ''),
(1560, 20, '549', 'Heroica Villa Tezoatl', ''),
(1561, 20, '549', 'Heroica Villa Tezoatl', ''),
(1562, 20, '549', 'Heroica Villa Tezoatl', ''),
(1563, 20, '549', 'Heroica Villa Tezoatl', ''),
(1564, 20, '549', 'Heroica Villa Tezoatl', ''),
(1565, 20, '549', 'Heroica Villa Tezoatl', ''),
(1566, 20, '549', 'Heroica Villa Tezoatl', ''),
(1567, 20, '549', 'Heroica Villa Tezoatl', ''),
(1568, 20, '549', 'Heroica Villa Tezoatl', ''),
(1569, 20, '549', 'Heroica Villa Tezoatl', ''),
(1570, 20, '549', 'Heroica Villa Tezoatl', ''),
(1571, 20, '549', 'Heroica Villa Tezoatl', ''),
(1572, 20, '549', 'Heroica Villa Tezoatl', ''),
(1573, 20, '549', 'Heroica Villa Tezoatl', ''),
(1574, 20, '549', 'Heroica Villa Tezoatl', ''),
(1575, 20, '549', 'Heroica Villa Tezoatl', ''),
(1576, 20, '549', 'Heroica Villa Tezoatl', ''),
(1577, 20, '549', 'Heroica Villa Tezoatl', ''),
(1578, 20, '549', 'Heroica Villa Tezoatl', ''),
(1579, 20, '549', 'Heroica Villa Tezoatl', ''),
(1580, 20, '549', 'Heroica Villa Tezoatl', ''),
(1581, 20, '549', 'Heroica Villa Tezoatl', ''),
(1582, 20, '549', 'Heroica Villa Tezoatl', ''),
(1583, 20, '550', 'San Jer', ''),
(1584, 20, '551', 'Tlacolula de Matamoros', ''),
(1585, 20, '552', 'Tlacotepec Plumas', ''),
(1586, 20, '553', 'Tlalixtac de Cabrera', ''),
(1587, 20, '554', 'Totontepec Villa de Morelos', ''),
(1588, 20, '555', 'Trinidad Zaachila', ''),
(1589, 20, '556', 'La Trinidad Vista Hermosa', ''),
(1590, 20, '557', 'Uni', ''),
(1591, 20, '558', 'Valerio Trujano', ''),
(1592, 20, '559', 'San Juan Bautista Valle Nacional', ''),
(1593, 20, '560', 'Villa D', ''),
(1594, 20, '561', 'Yaxe', ''),
(1595, 20, '562', 'Magdalena Yodocono de Porfirio D', ''),
(1596, 20, '563', 'Yogana', ''),
(1597, 20, '564', 'Yutanduchi de Guerrero', ''),
(1598, 20, '565', 'Villa de Zaachila', ''),
(1599, 20, '566', 'San Mateo Yucutind', ''),
(1600, 20, '567', 'Zapotitl', ''),
(1601, 20, '568', 'Zapotitl', ''),
(1602, 20, '569', 'Santa In', ''),
(1603, 20, '570', 'Zimatl', ''),
(1604, 21, '001', 'Acajete', ''),
(1605, 21, '002', 'Acateno', ''),
(1606, 21, '003', 'Acatl', ''),
(1607, 21, '004', 'Acatzingo', ''),
(1608, 21, '005', 'Acteopan', ''),
(1609, 21, '006', 'Ahuacatl', ''),
(1610, 21, '007', 'Ahuatl', ''),
(1611, 21, '008', 'Ahuazotepec', ''),
(1612, 21, '009', 'Ahuehuetitla', ''),
(1613, 21, '010', 'Ajalpan', ''),
(1614, 21, '011', 'Albino Zertuche', ''),
(1615, 21, '012', 'Aljojuca', ''),
(1616, 21, '013', 'Altepexi', ''),
(1617, 21, '014', 'Amixtl', ''),
(1618, 21, '015', 'Amozoc', ''),
(1619, 21, '016', 'Aquixtla', ''),
(1620, 21, '017', 'Atempan', ''),
(1621, 21, '018', 'Atexcal', ''),
(1622, 21, '019', 'Atlixco', ''),
(1623, 21, '020', 'Atoyatempan', ''),
(1624, 21, '021', 'Atzala', ''),
(1625, 21, '022', 'Atzitzihuac', ''),
(1626, 21, '023', 'Atzitzintla', ''),
(1627, 21, '024', 'Axutla', ''),
(1628, 21, '025', 'Ayotoxco de Guerrero', ''),
(1629, 21, '026', 'Calpan', ''),
(1630, 21, '027', 'Caltepec', ''),
(1631, 21, '028', 'Camocuautla', ''),
(1632, 21, '029', 'Caxhuacan', ''),
(1633, 21, '030', 'Coatepec', ''),
(1634, 21, '031', 'Coatzingo', ''),
(1635, 21, '032', 'Cohetzala', ''),
(1636, 21, '033', 'Cohuecan', ''),
(1637, 21, '034', 'Coronango', ''),
(1638, 21, '035', 'Coxcatl', ''),
(1639, 21, '036', 'Coyomeapan', ''),
(1640, 21, '037', 'Coyotepec', ''),
(1641, 21, '038', 'Cuapiaxtla de Madero', ''),
(1642, 21, '039', 'Cuautempan', ''),
(1643, 21, '040', 'Cuautinch', ''),
(1644, 21, '041', 'Cuautlancingo', ''),
(1645, 21, '042', 'Cuayuca de Andrade', ''),
(1646, 21, '043', 'Cuetzalan del Progreso', ''),
(1647, 21, '044', 'Cuyoaco', ''),
(1648, 21, '045', 'Chalchicomula de Sesma', ''),
(1649, 21, '046', 'Chapulco', ''),
(1650, 21, '047', 'Chiautla', ''),
(1651, 21, '048', 'Chiautzingo', ''),
(1652, 21, '049', 'Chiconcuautla', ''),
(1653, 21, '050', 'Chichiquila', ''),
(1654, 21, '051', 'Chietla', ''),
(1655, 21, '052', 'Chigmecatitl', ''),
(1656, 21, '053', 'Chignahuapan', ''),
(1657, 21, '054', 'Chignautla', ''),
(1658, 21, '055', 'Chila', ''),
(1659, 21, '056', 'Chila de la Sal', ''),
(1660, 21, '057', 'Honey', ''),
(1661, 21, '058', 'Chilchotla', ''),
(1662, 21, '059', 'Chinantla', ''),
(1663, 21, '060', 'Domingo Arenas', ''),
(1664, 21, '061', 'Eloxochitl', ''),
(1665, 21, '062', 'Epatl', ''),
(1666, 21, '063', 'Esperanza', ''),
(1667, 21, '064', 'Francisco Z. Mena', ''),
(1668, 21, '065', 'General Felipe ', ''),
(1669, 21, '066', 'Guadalupe', ''),
(1670, 21, '067', 'Guadalupe Victoria', ''),
(1671, 21, '068', 'Hermenegildo Galeana', ''),
(1672, 21, '069', 'Huaquechula', ''),
(1673, 21, '070', 'Huatlatlauca', ''),
(1674, 21, '071', 'Huauchinango', ''),
(1675, 21, '072', 'Huehuetla', ''),
(1676, 21, '073', 'Huehuetl', ''),
(1677, 21, '074', 'Huejotzingo', ''),
(1678, 21, '075', 'Hueyapan', ''),
(1679, 21, '076', 'Hueytamalco', ''),
(1680, 21, '077', 'Hueytlalpan', ''),
(1681, 21, '078', 'Huitzilan de Serd', ''),
(1682, 21, '079', 'Huitziltepec', ''),
(1683, 21, '080', 'Atlequizayan', ''),
(1684, 21, '081', 'Ixcamilpa de Guerrero', ''),
(1685, 21, '082', 'Ixcaquixtla', ''),
(1686, 21, '083', 'Ixtacamaxtitl', ''),
(1687, 21, '084', 'Ixtepec', ''),
(1688, 21, '085', 'Iz', ''),
(1689, 21, '086', 'Jalpan', ''),
(1690, 21, '087', 'Jolalpan', ''),
(1691, 21, '088', 'Jonotla', ''),
(1692, 21, '089', 'Jopala', ''),
(1693, 21, '090', 'Juan C. Bonilla', ''),
(1694, 21, '091', 'Juan Galindo', ''),
(1695, 21, '092', 'Juan N. M', ''),
(1696, 21, '093', 'Lafragua', ''),
(1697, 21, '094', 'Libres', ''),
(1698, 21, '095', 'La Magdalena Tlatlauquitepec', ''),
(1699, 21, '096', 'Mazapiltepec de Ju', ''),
(1700, 21, '097', 'Mixtla', ''),
(1701, 21, '098', 'Molcaxac', ''),
(1702, 21, '099', 'Ca', ''),
(1703, 21, '100', 'Naupan', ''),
(1704, 21, '101', 'Nauzontla', ''),
(1705, 21, '102', 'Nealtican', ''),
(1706, 21, '103', 'Nicol', ''),
(1707, 21, '104', 'Nopalucan', ''),
(1708, 21, '105', 'Ocotepec', ''),
(1709, 21, '106', 'Ocoyucan', ''),
(1710, 21, '107', 'Olintla', ''),
(1711, 21, '108', 'Oriental', ''),
(1712, 21, '109', 'Pahuatl', ''),
(1713, 21, '110', 'Palmar de Bravo', ''),
(1714, 21, '111', 'Pantepec', ''),
(1715, 21, '112', 'Petlalcingo', ''),
(1716, 21, '113', 'Piaxtla', ''),
(1717, 21, '114', 'Puebla', ''),
(1718, 21, '115', 'Quecholac', ''),
(1719, 21, '116', 'Quimixtl', ''),
(1720, 21, '117', 'Rafael Lara Grajales', ''),
(1721, 21, '118', 'Los Reyes de Ju', ''),
(1722, 21, '119', 'San Andr', ''),
(1723, 21, '120', 'San Antonio Ca', ''),
(1724, 21, '121', 'San Diego la Mesa Tochimiltzingo', ''),
(1725, 21, '122', 'San Felipe Teotlalcingo', ''),
(1726, 21, '123', 'San Felipe Tepatl', ''),
(1727, 21, '124', 'San Gabriel Chilac', ''),
(1728, 21, '125', 'San Gregorio Atzompa', ''),
(1729, 21, '126', 'San Jer', ''),
(1730, 21, '127', 'San Jer', ''),
(1731, 21, '128', 'San Jos', ''),
(1732, 21, '129', 'San Jos', ''),
(1733, 21, '130', 'San Juan Atenco', ''),
(1734, 21, '131', 'San Juan Atzompa', ''),
(1735, 21, '132', 'San Mart', ''),
(1736, 21, '133', 'San Mart', ''),
(1737, 21, '134', 'San Mat', ''),
(1738, 21, '135', 'San Miguel Ixitl', ''),
(1739, 21, '136', 'San Miguel Xoxtla', ''),
(1740, 21, '137', 'San Nicol', ''),
(1741, 21, '138', 'San Nicol', ''),
(1742, 21, '139', 'San Pablo Anicano', ''),
(1743, 21, '140', 'San Pedro Cholula', ''),
(1744, 21, '141', 'San Pedro Yeloixtlahuaca', ''),
(1745, 21, '142', 'San Salvador el Seco', ''),
(1746, 21, '143', 'San Salvador el Verde', ''),
(1747, 21, '144', 'San Salvador Huixcolotla', ''),
(1748, 21, '145', 'San Sebasti', ''),
(1749, 21, '146', 'Santa Catarina Tlaltempan', ''),
(1750, 21, '147', 'Santa In', ''),
(1751, 21, '148', 'Santa Isabel Cholula', ''),
(1752, 21, '149', 'Santiago Miahuatl', ''),
(1753, 21, '150', 'Huehuetl', ''),
(1754, 21, '151', 'Santo Tom', ''),
(1755, 21, '152', 'Soltepec', ''),
(1756, 21, '153', 'Tecali de Herrera', ''),
(1757, 21, '154', 'Tecamachalco', ''),
(1758, 21, '155', 'Tecomatl', ''),
(1759, 21, '156', 'Tehuac', ''),
(1760, 21, '157', 'Tehuitzingo', ''),
(1761, 21, '158', 'Tenampulco', ''),
(1762, 21, '159', 'Teopantl', ''),
(1763, 21, '160', 'Teotlalco', ''),
(1764, 21, '161', 'Tepanco de L', ''),
(1765, 21, '162', 'Tepango de Rodr', ''),
(1766, 21, '163', 'Tepatlaxco de Hidalgo', ''),
(1767, 21, '164', 'Tepeaca', ''),
(1768, 21, '165', 'Tepemaxalco', ''),
(1769, 21, '166', 'Tepeojuma', ''),
(1770, 21, '167', 'Tepetzintla', ''),
(1771, 21, '168', 'Tepexco', ''),
(1772, 21, '169', 'Tepexi de Rodr', ''),
(1773, 21, '170', 'Tepeyahualco', ''),
(1774, 21, '171', 'Tepeyahualco de Cuauht', ''),
(1775, 21, '172', 'Tetela de Ocampo', ''),
(1776, 21, '173', 'Teteles de Avila Castillo', ''),
(1777, 21, '174', 'Teziutl', ''),
(1778, 21, '175', 'Tianguismanalco', ''),
(1779, 21, '176', 'Tilapa', ''),
(1780, 21, '177', 'Tlacotepec de Benito Ju', ''),
(1781, 21, '178', 'Tlacuilotepec', ''),
(1782, 21, '179', 'Tlachichuca', ''),
(1783, 21, '180', 'Tlahuapan', ''),
(1784, 21, '181', 'Tlaltenango', ''),
(1785, 21, '182', 'Tlanepantla', ''),
(1786, 21, '183', 'Tlaola', ''),
(1787, 21, '184', 'Tlapacoya', ''),
(1788, 21, '185', 'Tlapanal', ''),
(1789, 21, '186', 'Tlatlauquitepec', ''),
(1790, 21, '187', 'Tlaxco', ''),
(1791, 21, '188', 'Tochimilco', ''),
(1792, 21, '189', 'Tochtepec', ''),
(1793, 21, '190', 'Totoltepec de Guerrero', ''),
(1794, 21, '191', 'Tulcingo', ''),
(1795, 21, '192', 'Tuzamapan de Galeana', ''),
(1796, 21, '193', 'Tzicatlacoyan', ''),
(1797, 21, '194', 'Venustiano Carranza', ''),
(1798, 21, '195', 'Vicente Guerrero', ''),
(1799, 21, '196', 'Xayacatl', ''),
(1800, 21, '197', 'Xicotepec', ''),
(1801, 21, '198', 'Xicotl', ''),
(1802, 21, '199', 'Xiutetelco', ''),
(1803, 21, '200', 'Xochiapulco', ''),
(1804, 21, '201', 'Xochiltepec', ''),
(1805, 21, '202', 'Xochitl', ''),
(1806, 21, '203', 'Xochitl', ''),
(1807, 21, '204', 'Yaon', ''),
(1808, 21, '205', 'Yehualtepec', ''),
(1809, 21, '206', 'Zacapala', ''),
(1810, 21, '207', 'Zacapoaxtla', ''),
(1811, 21, '208', 'Zacatl', ''),
(1812, 21, '209', 'Zapotitl', ''),
(1813, 21, '210', 'Zapotitl', ''),
(1814, 21, '211', 'Zaragoza', ''),
(1815, 21, '212', 'Zautla', ''),
(1816, 21, '213', 'Zihuateutla', ''),
(1817, 21, '214', 'Zinacatepec', ''),
(1818, 21, '215', 'Zongozotla', ''),
(1819, 21, '216', 'Zoquiapan', ''),
(1820, 21, '217', 'Zoquitl', ''),
(1821, 22, '001', 'Amealco de Bonfil', ''),
(1822, 22, '002', 'Pinal de Amoles', ''),
(1823, 22, '003', 'Arroyo Seco', ''),
(1824, 22, '004', 'Cadereyta de Montes', ''),
(1825, 22, '005', 'Col', ''),
(1826, 22, '006', 'Corregidora', ''),
(1827, 22, '007', 'Ezequiel Montes', ''),
(1828, 22, '008', 'Huimilpan', ''),
(1829, 22, '009', 'Jalpan de Serra', ''),
(1830, 22, '010', 'Landa de Matamoros', ''),
(1831, 22, '011', 'El Marqu', ''),
(1832, 22, '012', 'Pedro Escobedo', ''),
(1833, 22, '013', 'Pe', ''),
(1834, 22, '014', 'Quer', ''),
(1835, 22, '015', 'San Joaqu', ''),
(1836, 22, '016', 'San Juan del R', ''),
(1837, 22, '017', 'Tequisquiapan', ''),
(1838, 22, '018', 'Tolim', ''),
(1839, 23, '001', 'Cozumel', ''),
(1840, 23, '002', 'Felipe Carrillo Puerto', ''),
(1841, 23, '003', 'Isla Mujeres', ''),
(1842, 23, '004', 'Oth', ''),
(1843, 23, '005', 'Benito Ju', ''),
(1844, 23, '006', 'Jos', ''),
(1845, 23, '007', 'L', ''),
(1846, 23, '008', 'Solidaridad', ''),
(1847, 23, '009', 'Tulum', ''),
(1848, 23, '010', 'Bacalar', ''),
(1849, 24, '001', 'Ahualulco', ''),
(1850, 24, '002', 'Alaquines', ''),
(1851, 24, '003', 'Aquism', ''),
(1852, 24, '004', 'Armadillo de los Infante', ''),
(1853, 24, '005', 'C', ''),
(1854, 24, '006', 'Catorce', ''),
(1855, 24, '007', 'Cedral', ''),
(1856, 24, '008', 'Cerritos', ''),
(1857, 24, '009', 'Cerro de San Pedro', ''),
(1858, 24, '010', 'Ciudad del Ma', ''),
(1859, 24, '011', 'Ciudad Fern', ''),
(1860, 24, '012', 'Tancanhuitz', ''),
(1861, 24, '013', 'Ciudad Valles', ''),
(1862, 24, '014', 'Coxcatl', ''),
(1863, 24, '015', 'Charcas', ''),
(1864, 24, '016', 'Ebano', ''),
(1865, 24, '017', 'Guadalc', ''),
(1866, 24, '018', 'Huehuetl', ''),
(1867, 24, '019', 'Lagunillas', ''),
(1868, 24, '020', 'Matehuala', ''),
(1869, 24, '021', 'Mexquitic de Carmona', ''),
(1870, 24, '022', 'Moctezuma', ''),
(1871, 24, '023', 'Ray', ''),
(1872, 24, '024', 'Rioverde', ''),
(1873, 24, '025', 'Salinas', ''),
(1874, 24, '026', 'San Antonio', ''),
(1875, 24, '027', 'San Ciro de Acosta', ''),
(1876, 24, '028', 'San Luis Potos', ''),
(1877, 24, '029', 'San Mart', ''),
(1878, 24, '030', 'San Nicol', ''),
(1879, 24, '031', 'Santa Catarina', ''),
(1880, 24, '032', 'Santa Mar', ''),
(1881, 24, '033', 'Santo Domingo', ''),
(1882, 24, '034', 'San Vicente Tancuayalab', ''),
(1883, 24, '035', 'Soledad de Graciano S', ''),
(1884, 24, '036', 'Tamasopo', ''),
(1885, 24, '037', 'Tamazunchale', ''),
(1886, 24, '038', 'Tampac', ''),
(1887, 24, '039', 'Tampamol', ''),
(1888, 24, '040', 'Tamu', ''),
(1889, 24, '041', 'Tanlaj', ''),
(1890, 24, '042', 'Tanqui', ''),
(1891, 24, '043', 'Tierra Nueva', ''),
(1892, 24, '044', 'Vanegas', ''),
(1893, 24, '045', 'Venado', ''),
(1894, 24, '046', 'Villa de Arriaga', ''),
(1895, 24, '047', 'Villa de Guadalupe', ''),
(1896, 24, '048', 'Villa de la Paz', ''),
(1897, 24, '049', 'Villa de Ramos', ''),
(1898, 24, '050', 'Villa de Reyes', ''),
(1899, 24, '051', 'Villa Hidalgo', ''),
(1900, 24, '052', 'Villa Ju', ''),
(1901, 24, '053', 'Axtla de Terrazas', ''),
(1902, 24, '054', 'Xilitla', ''),
(1903, 24, '055', 'Zaragoza', ''),
(1904, 24, '056', 'Villa de Arista', ''),
(1905, 24, '057', 'Matlapa', ''),
(1906, 24, '058', 'El Naranjo', ''),
(1907, 25, '001', 'Ahome', ''),
(1908, 25, '002', 'Angostura', ''),
(1909, 25, '003', 'Badiraguato', ''),
(1910, 25, '004', 'Concordia', ''),
(1911, 25, '005', 'Cosal', ''),
(1912, 25, '006', 'Culiac', ''),
(1913, 25, '007', 'Choix', ''),
(1914, 25, '008', 'Elota', ''),
(1915, 25, '009', 'Escuinapa', ''),
(1916, 25, '010', 'El Fuerte', ''),
(1917, 25, '011', 'Guasave', ''),
(1918, 25, '012', 'Mazatl', ''),
(1919, 25, '013', 'Mocorito', ''),
(1920, 25, '014', 'Rosario', ''),
(1921, 25, '015', 'Salvador Alvarado', ''),
(1922, 25, '016', 'San Ignacio', ''),
(1923, 25, '017', 'Sinaloa', ''),
(1924, 25, '018', 'Navolato', ''),
(1925, 26, '001', 'Aconchi', ''),
(1926, 26, '002', 'Agua Prieta', ''),
(1927, 26, '003', 'Alamos', ''),
(1928, 26, '004', 'Altar', ''),
(1929, 26, '005', 'Arivechi', ''),
(1930, 26, '006', 'Arizpe', ''),
(1931, 26, '007', 'Atil', ''),
(1932, 26, '008', 'Bacad', ''),
(1933, 26, '009', 'Bacanora', ''),
(1934, 26, '010', 'Bacerac', ''),
(1935, 26, '011', 'Bacoachi', ''),
(1936, 26, '012', 'B', ''),
(1937, 26, '013', 'Ban', ''),
(1938, 26, '014', 'Bavi', ''),
(1939, 26, '015', 'Bavispe', ''),
(1940, 26, '016', 'Benjam', ''),
(1941, 26, '017', 'Caborca', ''),
(1942, 26, '018', 'Cajeme', ''),
(1943, 26, '019', 'Cananea', ''),
(1944, 26, '020', 'Carb', ''),
(1945, 26, '021', 'La Colorada', ''),
(1946, 26, '022', 'Cucurpe', ''),
(1947, 26, '023', 'Cumpas', ''),
(1948, 26, '024', 'Divisaderos', ''),
(1949, 26, '025', 'Empalme', ''),
(1950, 26, '026', 'Etchojoa', ''),
(1951, 26, '027', 'Fronteras', ''),
(1952, 26, '028', 'Granados', ''),
(1953, 26, '029', 'Guaymas', ''),
(1954, 26, '030', 'Hermosillo', ''),
(1955, 26, '031', 'Huachinera', ''),
(1956, 26, '032', 'Hu', ''),
(1957, 26, '033', 'Huatabampo', ''),
(1958, 26, '034', 'Hu', ''),
(1959, 26, '035', 'Imuris', ''),
(1960, 26, '036', 'Magdalena', ''),
(1961, 26, '037', 'Mazat', ''),
(1962, 26, '038', 'Moctezuma', ''),
(1963, 26, '039', 'Naco', ''),
(1964, 26, '040', 'N', ''),
(1965, 26, '041', 'Nacozari de Garc', ''),
(1966, 26, '042', 'Navojoa', ''),
(1967, 26, '043', 'Nogales', ''),
(1968, 26, '044', 'Onavas', ''),
(1969, 26, '045', 'Opodepe', ''),
(1970, 26, '046', 'Oquitoa', ''),
(1971, 26, '047', 'Pitiquito', ''),
(1972, 26, '048', 'Puerto Pe', ''),
(1973, 26, '049', 'Quiriego', ''),
(1974, 26, '050', 'Ray', ''),
(1975, 26, '051', 'Rosario', ''),
(1976, 26, '052', 'Sahuaripa', ''),
(1977, 26, '053', 'San Felipe de Jes', ''),
(1978, 26, '054', 'San Javier', ''),
(1979, 26, '055', 'San Luis R', ''),
(1980, 26, '056', 'San Miguel de Horcasitas', ''),
(1981, 26, '057', 'San Pedro de la Cueva', ''),
(1982, 26, '058', 'Santa Ana', ''),
(1983, 26, '059', 'Santa Cruz', ''),
(1984, 26, '060', 'S', ''),
(1985, 26, '061', 'Soyopa', ''),
(1986, 26, '062', 'Suaqui Grande', ''),
(1987, 26, '063', 'Tepache', ''),
(1988, 26, '064', 'Trincheras', ''),
(1989, 26, '065', 'Tubutama', ''),
(1990, 26, '066', 'Ures', ''),
(1991, 26, '067', 'Villa Hidalgo', ''),
(1992, 26, '068', 'Villa Pesqueira', ''),
(1993, 26, '069', 'Y', ''),
(1994, 26, '070', 'General Plutarco El', ''),
(1995, 26, '071', 'Benito Ju', ''),
(1996, 26, '072', 'San Ignacio R', ''),
(1997, 27, '001', 'Balanc', ''),
(1998, 27, '002', 'C', ''),
(1999, 27, '003', 'Centla', ''),
(2000, 27, '004', 'Centro', ''),
(2001, 27, '005', 'Comalcalco', ''),
(2002, 27, '006', 'Cunduac', ''),
(2003, 27, '007', 'Emiliano Zapata', ''),
(2004, 27, '008', 'Huimanguillo', ''),
(2005, 27, '009', 'Jalapa', ''),
(2006, 27, '010', 'Jalpa de M', ''),
(2007, 27, '011', 'Jonuta', ''),
(2008, 27, '012', 'Macuspana', ''),
(2009, 27, '013', 'Nacajuca', ''),
(2010, 27, '014', 'Para', ''),
(2011, 27, '015', 'Tacotalpa', ''),
(2012, 27, '016', 'Teapa', ''),
(2013, 27, '017', 'Tenosique', ''),
(2014, 28, '001', 'Abasolo', ''),
(2015, 28, '002', 'Aldama', ''),
(2016, 28, '003', 'Altamira', ''),
(2017, 28, '004', 'Antiguo Morelos', ''),
(2018, 28, '005', 'Burgos', ''),
(2019, 28, '006', 'Bustamante', ''),
(2020, 28, '007', 'Camargo', ''),
(2021, 28, '008', 'Casas', ''),
(2022, 28, '009', 'Ciudad Madero', ''),
(2023, 28, '010', 'Cruillas', ''),
(2024, 28, '011', 'G', ''),
(2025, 28, '012', 'Gonz', ''),
(2026, 28, '013', 'G', ''),
(2027, 28, '014', 'Guerrero', ''),
(2028, 28, '015', 'Gustavo D', ''),
(2029, 28, '016', 'Hidalgo', ''),
(2030, 28, '017', 'Jaumave', ''),
(2031, 28, '018', 'Jim', ''),
(2032, 28, '019', 'Llera', ''),
(2033, 28, '020', 'Mainero', ''),
(2034, 28, '021', 'El Mante', ''),
(2035, 28, '022', 'Matamoros', ''),
(2036, 28, '023', 'M', ''),
(2037, 28, '024', 'Mier', ''),
(2038, 28, '025', 'Miguel Alem', ''),
(2039, 28, '026', 'Miquihuana', ''),
(2040, 28, '027', 'Nuevo Laredo', ''),
(2041, 28, '028', 'Nuevo Morelos', ''),
(2042, 28, '029', 'Ocampo', ''),
(2043, 28, '030', 'Padilla', ''),
(2044, 28, '031', 'Palmillas', ''),
(2045, 28, '032', 'Reynosa', ''),
(2046, 28, '033', 'R', ''),
(2047, 28, '034', 'San Carlos', ''),
(2048, 28, '035', 'San Fernando', ''),
(2049, 28, '036', 'San Nicol', ''),
(2050, 28, '037', 'Soto la Marina', ''),
(2051, 28, '038', 'Tampico', ''),
(2052, 28, '039', 'Tula', ''),
(2053, 28, '040', 'Valle Hermoso', ''),
(2054, 28, '041', 'Victoria', ''),
(2055, 28, '042', 'Villagr', ''),
(2056, 28, '043', 'Xicot', ''),
(2057, 29, '001', 'Amaxac de Guerrero', ''),
(2058, 29, '002', 'Apetatitl', ''),
(2059, 29, '003', 'Atlangatepec', ''),
(2060, 29, '004', 'Atltzayanca', ''),
(2061, 29, '005', 'Apizaco', ''),
(2062, 29, '006', 'Calpulalpan', ''),
(2063, 29, '007', 'El Carmen Tequexquitla', ''),
(2064, 29, '008', 'Cuapiaxtla', ''),
(2065, 29, '009', 'Cuaxomulco', ''),
(2066, 29, '010', 'Chiautempan', ''),
(2067, 29, '011', 'Mu', ''),
(2068, 29, '012', 'Espa', ''),
(2069, 29, '013', 'Huamantla', ''),
(2070, 29, '014', 'Hueyotlipan', ''),
(2071, 29, '015', 'Ixtacuixtla de Mariano Matamoros', ''),
(2072, 29, '016', 'Ixtenco', ''),
(2073, 29, '017', 'Mazatecochco de Jos', ''),
(2074, 29, '018', 'Contla de Juan Cuamatzi', ''),
(2075, 29, '019', 'Tepetitla de Lardiz', ''),
(2076, 29, '020', 'Sanct', ''),
(2077, 29, '021', 'Nanacamilpa de Mariano Arista', ''),
(2078, 29, '022', 'Acuamanala de Miguel Hidalgo', ''),
(2079, 29, '023', 'Nat', ''),
(2080, 29, '024', 'Panotla', ''),
(2081, 29, '025', 'San Pablo del Monte', ''),
(2082, 29, '026', 'Santa Cruz Tlaxcala', ''),
(2083, 29, '027', 'Tenancingo', ''),
(2084, 29, '028', 'Teolocholco', ''),
(2085, 29, '029', 'Tepeyanco', ''),
(2086, 29, '030', 'Terrenate', ''),
(2087, 29, '031', 'Tetla de la Solidaridad', ''),
(2088, 29, '032', 'Tetlatlahuca', ''),
(2089, 29, '033', 'Tlaxcala', ''),
(2090, 29, '034', 'Tlaxco', ''),
(2091, 29, '035', 'Tocatl', ''),
(2092, 29, '036', 'Totolac', ''),
(2093, 29, '037', 'Ziltlalt', ''),
(2094, 29, '038', 'Tzompantepec', ''),
(2095, 29, '039', 'Xaloztoc', ''),
(2096, 29, '040', 'Xaltocan', ''),
(2097, 29, '041', 'Papalotla de Xicoht', ''),
(2098, 29, '042', 'Xicohtzinco', ''),
(2099, 29, '043', 'Yauhquemehcan', ''),
(2100, 29, '044', 'Zacatelco', ''),
(2101, 29, '045', 'Benito Ju', ''),
(2102, 29, '046', 'Emiliano Zapata', ''),
(2103, 29, '047', 'L', ''),
(2104, 29, '048', 'La Magdalena Tlaltelulco', ''),
(2105, 29, '049', 'San Dami', ''),
(2106, 29, '050', 'San Francisco Tetlanohcan', ''),
(2107, 29, '051', 'San Jer', ''),
(2108, 29, '052', 'San Jos', ''),
(2109, 29, '053', 'San Juan Huactzinco', ''),
(2110, 29, '054', 'San Lorenzo Axocomanitla', ''),
(2111, 29, '055', 'San Lucas Tecopilco', ''),
(2112, 29, '056', 'Santa Ana Nopalucan', ''),
(2113, 29, '057', 'Santa Apolonia Teacalco', ''),
(2114, 29, '058', 'Santa Catarina Ayometla', ''),
(2115, 29, '059', 'Santa Cruz Quilehtla', ''),
(2116, 29, '060', 'Santa Isabel Xiloxoxtla', ''),
(2117, 30, '001', 'Acajete', ''),
(2118, 30, '002', 'Acatl', ''),
(2119, 30, '003', 'Acayucan', ''),
(2120, 30, '004', 'Actopan', ''),
(2121, 30, '005', 'Acula', ''),
(2122, 30, '006', 'Acultzingo', ''),
(2123, 30, '007', 'Camar', ''),
(2124, 30, '008', 'Alpatl', ''),
(2125, 30, '009', 'Alto Lucero de Guti', ''),
(2126, 30, '010', 'Altotonga', ''),
(2127, 30, '011', 'Alvarado', ''),
(2128, 30, '012', 'Amatitl', ''),
(2129, 30, '013', 'Naranjos Amatl', ''),
(2130, 30, '014', 'Amatl', ''),
(2131, 30, '015', 'Angel R. Cabada', ''),
(2132, 30, '016', 'La Antigua', ''),
(2133, 30, '017', 'Apazapan', ''),
(2134, 30, '018', 'Aquila', ''),
(2135, 30, '019', 'Astacinga', ''),
(2136, 30, '020', 'Atlahuilco', ''),
(2137, 30, '021', 'Atoyac', ''),
(2138, 30, '022', 'Atzacan', ''),
(2139, 30, '023', 'Atzalan', ''),
(2140, 30, '024', 'Tlaltetela', ''),
(2141, 30, '025', 'Ayahualulco', ''),
(2142, 30, '026', 'Banderilla', ''),
(2143, 30, '027', 'Benito Ju', ''),
(2144, 30, '028', 'Boca del R', ''),
(2145, 30, '029', 'Calcahualco', ''),
(2146, 30, '030', 'Camerino Z. Mendoza', ''),
(2147, 30, '031', 'Carrillo Puerto', ''),
(2148, 30, '032', 'Catemaco', ''),
(2149, 30, '033', 'Cazones de Herrera', ''),
(2150, 30, '034', 'Cerro Azul', ''),
(2151, 30, '035', 'Citlalt', ''),
(2152, 30, '036', 'Coacoatzintla', ''),
(2153, 30, '037', 'Coahuitl', ''),
(2154, 30, '038', 'Coatepec', ''),
(2155, 30, '039', 'Coatzacoalcos', ''),
(2156, 30, '040', 'Coatzintla', ''),
(2157, 30, '041', 'Coetzala', ''),
(2158, 30, '042', 'Colipa', ''),
(2159, 30, '043', 'Comapa', ''),
(2160, 30, '044', 'C', ''),
(2161, 30, '045', 'Cosamaloapan de Carpio', ''),
(2162, 30, '046', 'Cosautl', ''),
(2163, 30, '047', 'Coscomatepec', ''),
(2164, 30, '048', 'Cosoleacaque', ''),
(2165, 30, '049', 'Cotaxtla', ''),
(2166, 30, '050', 'Coxquihui', ''),
(2167, 30, '051', 'Coyutla', ''),
(2168, 30, '052', 'Cuichapa', ''),
(2169, 30, '053', 'Cuitl', ''),
(2170, 30, '054', 'Chacaltianguis', ''),
(2171, 30, '055', 'Chalma', ''),
(2172, 30, '056', 'Chiconamel', ''),
(2173, 30, '057', 'Chiconquiaco', ''),
(2174, 30, '058', 'Chicontepec', ''),
(2175, 30, '059', 'Chinameca', ''),
(2176, 30, '060', 'Chinampa de Gorostiza', ''),
(2177, 30, '061', 'Las Choapas', ''),
(2178, 30, '062', 'Chocam', ''),
(2179, 30, '063', 'Chontla', ''),
(2180, 30, '064', 'Chumatl', ''),
(2181, 30, '065', 'Emiliano Zapata', ''),
(2182, 30, '066', 'Espinal', ''),
(2183, 30, '067', 'Filomeno Mata', ''),
(2184, 30, '068', 'Fort', ''),
(2185, 30, '069', 'Guti', ''),
(2186, 30, '070', 'Hidalgotitl', ''),
(2187, 30, '071', 'Huatusco', ''),
(2188, 30, '072', 'Huayacocotla', ''),
(2189, 30, '073', 'Hueyapan de Ocampo', ''),
(2190, 30, '074', 'Huiloapan de Cuauht', ''),
(2191, 30, '075', 'Ignacio de la Llave', ''),
(2192, 30, '076', 'Ilamatl', ''),
(2193, 30, '077', 'Isla', ''),
(2194, 30, '078', 'Ixcatepec', ''),
(2195, 30, '079', 'Ixhuac', ''),
(2196, 30, '080', 'Ixhuatl', ''),
(2197, 30, '081', 'Ixhuatlancillo', ''),
(2198, 30, '082', 'Ixhuatl', ''),
(2199, 30, '083', 'Ixhuatl', ''),
(2200, 30, '084', 'Ixmatlahuacan', ''),
(2201, 30, '085', 'Ixtaczoquitl', ''),
(2202, 30, '086', 'Jalacingo', ''),
(2203, 30, '087', 'Xalapa', ''),
(2204, 30, '088', 'Jalcomulco', ''),
(2205, 30, '089', 'J', ''),
(2206, 30, '090', 'Jamapa', ''),
(2207, 30, '091', 'Jes', ''),
(2208, 30, '092', 'Xico', ''),
(2209, 30, '093', 'Jilotepec', ''),
(2210, 30, '094', 'Juan Rodr', ''),
(2211, 30, '095', 'Juchique de Ferrer', ''),
(2212, 30, '096', 'Landero y Coss', ''),
(2213, 30, '097', 'Lerdo de Tejada', ''),
(2214, 30, '098', 'Magdalena', ''),
(2215, 30, '099', 'Maltrata', ''),
(2216, 30, '100', 'Manlio Fabio Altamirano', ''),
(2217, 30, '101', 'Mariano Escobedo', ''),
(2218, 30, '102', 'Mart', ''),
(2219, 30, '103', 'Mecatl', ''),
(2220, 30, '104', 'Mecayapan', ''),
(2221, 30, '105', 'Medell', ''),
(2222, 30, '106', 'Miahuatl', ''),
(2223, 30, '107', 'Las Minas', ''),
(2224, 30, '108', 'Minatitl', ''),
(2225, 30, '109', 'Misantla', ''),
(2226, 30, '110', 'Mixtla de Altamirano', ''),
(2227, 30, '111', 'Moloac', ''),
(2228, 30, '112', 'Naolinco', ''),
(2229, 30, '113', 'Naranjal', ''),
(2230, 30, '114', 'Nautla', ''),
(2231, 30, '115', 'Nogales', ''),
(2232, 30, '116', 'Oluta', ''),
(2233, 30, '117', 'Omealca', ''),
(2234, 30, '118', 'Orizaba', ''),
(2235, 30, '119', 'Otatitl', ''),
(2236, 30, '120', 'Oteapan', ''),
(2237, 30, '121', 'Ozuluama de Mascare', ''),
(2238, 30, '122', 'Pajapan', ''),
(2239, 30, '123', 'P', ''),
(2240, 30, '124', 'Papantla', ''),
(2241, 30, '125', 'Paso del Macho', ''),
(2242, 30, '126', 'Paso de Ovejas', ''),
(2243, 30, '127', 'La Perla', ''),
(2244, 30, '128', 'Perote', ''),
(2245, 30, '129', 'Plat', ''),
(2246, 30, '130', 'Playa Vicente', ''),
(2247, 30, '131', 'Poza Rica de Hidalgo', ''),
(2248, 30, '132', 'Las Vigas de Ram', ''),
(2249, 30, '133', 'Pueblo Viejo', ''),
(2250, 30, '134', 'Puente Nacional', ''),
(2251, 30, '135', 'Rafael Delgado', ''),
(2252, 30, '136', 'Rafael Lucio', ''),
(2253, 30, '137', 'Los Reyes', ''),
(2254, 30, '138', 'R', ''),
(2255, 30, '139', 'Saltabarranca', ''),
(2256, 30, '140', 'San Andr', ''),
(2257, 30, '141', 'San Andr', ''),
(2258, 30, '142', 'San Juan Evangelista', ''),
(2259, 30, '143', 'Santiago Tuxtla', ''),
(2260, 30, '144', 'Sayula de Alem', ''),
(2261, 30, '145', 'Soconusco', ''),
(2262, 30, '146', 'Sochiapa', ''),
(2263, 30, '147', 'Soledad Atzompa', ''),
(2264, 30, '148', 'Soledad de Doblado', ''),
(2265, 30, '149', 'Soteapan', ''),
(2266, 30, '150', 'Tamal', ''),
(2267, 30, '151', 'Tamiahua', ''),
(2268, 30, '152', 'Tampico Alto', ''),
(2269, 30, '153', 'Tancoco', ''),
(2270, 30, '154', 'Tantima', ''),
(2271, 30, '155', 'Tantoyuca', ''),
(2272, 30, '156', 'Tatatila', ''),
(2273, 30, '157', 'Castillo de Teayo', ''),
(2274, 30, '158', 'Tecolutla', ''),
(2275, 30, '159', 'Tehuipango', ''),
(2276, 30, '160', '', ''),
(2277, 30, '161', 'Tempoal', ''),
(2278, 30, '162', 'Tenampa', ''),
(2279, 30, '163', 'Tenochtitl', ''),
(2280, 30, '164', 'Teocelo', ''),
(2281, 30, '165', 'Tepatlaxco', ''),
(2282, 30, '166', 'Tepetl', ''),
(2283, 30, '167', 'Tepetzintla', ''),
(2284, 30, '168', 'Tequila', ''),
(2285, 30, '169', 'Jos', ''),
(2286, 30, '170', 'Texcatepec', ''),
(2287, 30, '171', 'Texhuac', ''),
(2288, 30, '172', 'Texistepec', ''),
(2289, 30, '173', 'Tezonapa', ''),
(2290, 30, '174', 'Tierra Blanca', ''),
(2291, 30, '175', 'Tihuatl', ''),
(2292, 30, '176', 'Tlacojalpan', ''),
(2293, 30, '177', 'Tlacolulan', ''),
(2294, 30, '178', 'Tlacotalpan', ''),
(2295, 30, '179', 'Tlacotepec de Mej', ''),
(2296, 30, '180', 'Tlachichilco', ''),
(2297, 30, '181', 'Tlalixcoyan', ''),
(2298, 30, '182', 'Tlalnelhuayocan', ''),
(2299, 30, '183', 'Tlapacoyan', ''),
(2300, 30, '184', 'Tlaquilpa', ''),
(2301, 30, '185', 'Tlilapan', ''),
(2302, 30, '186', 'Tomatl', ''),
(2303, 30, '187', 'Tonay', ''),
(2304, 30, '188', 'Totutla', ''),
(2305, 30, '189', 'Tuxpan', ''),
(2306, 30, '190', 'Tuxtilla', ''),
(2307, 30, '191', 'Ursulo Galv', ''),
(2308, 30, '192', 'Vega de Alatorre', ''),
(2309, 30, '193', 'Veracruz', ''),
(2310, 30, '194', 'Villa Aldama', ''),
(2311, 30, '195', 'Xoxocotla', ''),
(2312, 30, '196', 'Yanga', ''),
(2313, 30, '197', 'Yecuatla', ''),
(2314, 30, '198', 'Zacualpan', ''),
(2315, 30, '199', 'Zaragoza', ''),
(2316, 30, '200', 'Zentla', ''),
(2317, 30, '201', 'Zongolica', ''),
(2318, 30, '202', 'Zontecomatl', ''),
(2319, 30, '203', 'Zozocolco de Hidalgo', ''),
(2320, 30, '204', 'Agua Dulce', ''),
(2321, 30, '205', 'El Higo', ''),
(2322, 30, '206', 'Nanchital de L', ''),
(2323, 30, '207', 'Tres Valles', ''),
(2324, 30, '208', 'Carlos A. Carrillo', ''),
(2325, 30, '209', 'Tatahuicapan de Ju', ''),
(2326, 30, '210', 'Uxpanapa', ''),
(2327, 30, '211', 'San Rafael', ''),
(2328, 30, '212', 'Santiago Sochiapan', ''),
(2329, 31, '001', 'Abal', ''),
(2330, 31, '002', 'Acanceh', ''),
(2331, 31, '003', 'Akil', ''),
(2332, 31, '004', 'Baca', ''),
(2333, 31, '005', 'Bokob', ''),
(2334, 31, '006', 'Buctzotz', ''),
(2335, 31, '007', 'Cacalch', ''),
(2336, 31, '008', 'Calotmul', ''),
(2337, 31, '009', 'Cansahcab', ''),
(2338, 31, '010', 'Cantamayec', ''),
(2339, 31, '011', 'Celest', ''),
(2340, 31, '012', 'Cenotillo', ''),
(2341, 31, '013', 'Conkal', ''),
(2342, 31, '014', 'Cuncunul', ''),
(2343, 31, '015', 'Cuzam', ''),
(2344, 31, '016', 'Chacsink', ''),
(2345, 31, '017', 'Chankom', ''),
(2346, 31, '018', 'Chapab', ''),
(2347, 31, '019', 'Chemax', ''),
(2348, 31, '020', 'Chicxulub Pueblo', ''),
(2349, 31, '021', 'Chichimil', ''),
(2350, 31, '022', 'Chikindzonot', ''),
(2351, 31, '023', 'Chochol', ''),
(2352, 31, '024', 'Chumayel', ''),
(2353, 31, '025', 'Dz', ''),
(2354, 31, '026', 'Dzemul', ''),
(2355, 31, '027', 'Dzidzant', ''),
(2356, 31, '028', 'Dzilam de Bravo', ''),
(2357, 31, '029', 'Dzilam Gonz', ''),
(2358, 31, '030', 'Dzit', ''),
(2359, 31, '031', 'Dzoncauich', ''),
(2360, 31, '032', 'Espita', ''),
(2361, 31, '033', 'Halach', ''),
(2362, 31, '034', 'Hocab', ''),
(2363, 31, '035', 'Hoct', ''),
(2364, 31, '036', 'Hom', ''),
(2365, 31, '037', 'Huh', ''),
(2366, 31, '038', 'Hunucm', ''),
(2367, 31, '039', 'Ixil', ''),
(2368, 31, '040', 'Izamal', ''),
(2369, 31, '041', 'Kanas', ''),
(2370, 31, '042', 'Kantunil', ''),
(2371, 31, '043', 'Kaua', ''),
(2372, 31, '044', 'Kinchil', ''),
(2373, 31, '045', 'Kopom', ''),
(2374, 31, '046', 'Mama', ''),
(2375, 31, '047', 'Man', ''),
(2376, 31, '048', 'Maxcan', ''),
(2377, 31, '049', 'Mayap', ''),
(2378, 31, '050', 'M', ''),
(2379, 31, '051', 'Mococh', ''),
(2380, 31, '052', 'Motul', ''),
(2381, 31, '053', 'Muna', ''),
(2382, 31, '054', 'Muxupip', ''),
(2383, 31, '055', 'Opich', ''),
(2384, 31, '056', 'Oxkutzcab', ''),
(2385, 31, '057', 'Panab', ''),
(2386, 31, '058', 'Peto', ''),
(2387, 31, '059', 'Progreso', ''),
(2388, 31, '060', 'Quintana Roo', ''),
(2389, 31, '061', 'R', ''),
(2390, 31, '062', 'Sacalum', ''),
(2391, 31, '063', 'Samahil', ''),
(2392, 31, '064', 'Sanahcat', ''),
(2393, 31, '065', 'San Felipe', ''),
(2394, 31, '066', 'Santa Elena', ''),
(2395, 31, '067', 'Sey', ''),
(2396, 31, '068', 'Sinanch', ''),
(2397, 31, '069', 'Sotuta', ''),
(2398, 31, '070', 'Sucil', ''),
(2399, 31, '071', 'Sudzal', ''),
(2400, 31, '072', 'Suma', ''),
(2401, 31, '073', 'Tahdzi', ''),
(2402, 31, '074', 'Tahmek', ''),
(2403, 31, '075', 'Teabo', ''),
(2404, 31, '076', 'Tecoh', ''),
(2405, 31, '077', 'Tekal de Venegas', ''),
(2406, 31, '078', 'Tekant', ''),
(2407, 31, '079', 'Tekax', ''),
(2408, 31, '080', 'Tekit', ''),
(2409, 31, '081', 'Tekom', ''),
(2410, 31, '082', 'Telchac Pueblo', ''),
(2411, 31, '083', 'Telchac Puerto', ''),
(2412, 31, '084', 'Temax', ''),
(2413, 31, '085', 'Temoz', ''),
(2414, 31, '086', 'Tepak', ''),
(2415, 31, '087', 'Tetiz', ''),
(2416, 31, '088', 'Teya', ''),
(2417, 31, '089', 'Ticul', ''),
(2418, 31, '090', 'Timucuy', ''),
(2419, 31, '091', 'Tinum', ''),
(2420, 31, '092', 'Tixcacalcupul', ''),
(2421, 31, '093', 'Tixkokob', ''),
(2422, 31, '094', 'Tixmehuac', ''),
(2423, 31, '095', 'Tixp', ''),
(2424, 31, '096', 'Tizim', ''),
(2425, 31, '097', 'Tunk', ''),
(2426, 31, '098', 'Tzucacab', ''),
(2427, 31, '099', 'Uayma', ''),
(2428, 31, '100', 'Uc', ''),
(2429, 31, '101', 'Um', ''),
(2430, 31, '102', 'Valladolid', ''),
(2431, 31, '103', 'Xocchel', ''),
(2432, 31, '104', 'Yaxcab', ''),
(2433, 31, '105', 'Yaxkukul', ''),
(2434, 31, '106', 'Yoba', ''),
(2435, 32, '001', 'Apozol', ''),
(2436, 32, '002', 'Apulco', ''),
(2437, 32, '003', 'Atolinga', ''),
(2438, 32, '004', 'Benito Ju', ''),
(2439, 32, '005', 'Calera', ''),
(2440, 32, '006', 'Ca', ''),
(2441, 32, '007', 'Concepci', ''),
(2442, 32, '008', 'Cuauht', ''),
(2443, 32, '009', 'Chalchihuites', ''),
(2444, 32, '010', 'Fresnillo', ''),
(2445, 32, '011', 'Trinidad Garc', ''),
(2446, 32, '012', 'Genaro Codina', ''),
(2447, 32, '013', 'General Enrique Estrada', ''),
(2448, 32, '014', 'General Francisco R. Murgu', ''),
(2449, 32, '015', 'El Plateado de Joaqu', ''),
(2450, 32, '016', 'General P', ''),
(2451, 32, '017', 'Guadalupe', ''),
(2452, 32, '018', 'Huanusco', ''),
(2453, 32, '019', 'Jalpa', ''),
(2454, 32, '020', 'Jerez', ''),
(2455, 32, '021', 'Jim', ''),
(2456, 32, '022', 'Juan Aldama', ''),
(2457, 32, '023', 'Juchipila', ''),
(2458, 32, '024', 'Loreto', ''),
(2459, 32, '025', 'Luis Moya', ''),
(2460, 32, '026', 'Mazapil', ''),
(2461, 32, '027', 'Melchor Ocampo', ''),
(2462, 32, '028', 'Mezquital del Oro', ''),
(2463, 32, '029', 'Miguel Auza', ''),
(2464, 32, '030', 'Momax', ''),
(2465, 32, '031', 'Monte Escobedo', ''),
(2466, 32, '032', 'Morelos', ''),
(2467, 32, '033', 'Moyahua de Estrada', ''),
(2468, 32, '034', 'Nochistl', ''),
(2469, 32, '035', 'Noria de ', ''),
(2470, 32, '036', 'Ojocaliente', ''),
(2471, 32, '037', 'P', ''),
(2472, 32, '038', 'Pinos', ''),
(2473, 32, '039', 'R', ''),
(2474, 32, '040', 'Sain Alto', ''),
(2475, 32, '041', 'El Salvador', ''),
(2476, 32, '042', 'Sombrerete', ''),
(2477, 32, '043', 'Susticac', ''),
(2478, 32, '044', 'Tabasco', ''),
(2479, 32, '045', 'Tepechitl', ''),
(2480, 32, '046', 'Tepetongo', ''),
(2481, 32, '047', 'Te', ''),
(2482, 32, '048', 'Tlaltenango de S', ''),
(2483, 32, '049', 'Valpara', ''),
(2484, 32, '050', 'Vetagrande', ''),
(2485, 32, '051', 'Villa de Cos', ''),
(2486, 32, '052', 'Villa Garc', ''),
(2487, 32, '053', 'Villa Gonz', ''),
(2488, 32, '054', 'Villa Hidalgo', ''),
(2489, 32, '055', 'Villanueva', ''),
(2490, 32, '056', 'Zacatecas', ''),
(2491, 32, '057', 'Trancoso', ''),
(2492, 32, '058', 'Santa Mar', ''),
(2493, 7, '120', 'Belisario Domínguez', ''),
(2494, 7, '121', 'El Parral', ''),
(2495, 7, '122', 'Mezcalapa', '');

-- --------------------------------------------------------

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE IF NOT EXISTS `notificacion` (
  `notificacionId` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` mediumtext,
  `vista` varchar(255) DEFAULT NULL,
  `hecho` varchar(255) DEFAULT NULL,
  `fecha_aplicacion` datetime DEFAULT NULL,
  `tablas` varchar(255) DEFAULT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`notificacionId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notificacion`
--

INSERT INTO `notificacion` (`notificacionId`, `actividad`, `vista`, `hecho`, `fecha_aplicacion`, `tablas`, `enlace`) VALUES
(1, 'Se ha Registrado un nuevo Alumno', '714u,1p', '714u', '2019-08-10 12:41:08', 'reply', '/student'),
(2, 'Se ha dado de Alta un Alumno(20150713-José Luis Brandi Bonifaz) desde el panel de Administración ', '1p,1p', '1p', '2019-08-10 12:41:26', 'reply', '/student');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `formato` varchar(20) NOT NULL,
  `aluoper` varchar(15) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `nombrealuoper` varchar(255) NOT NULL,
  `ciclo` varchar(10) DEFAULT NULL,
  `periodoesc` varchar(50) DEFAULT NULL,
  `clavenivel` varchar(100) DEFAULT NULL,
  `nombrenivel` varchar(255) DEFAULT NULL,
  `gradogrupo` varchar(100) DEFAULT NULL,
  `tipoventa` varchar(10) NOT NULL,
  `tipoarticulo` varchar(10) DEFAULT NULL,
  `claveartkit` int(11) DEFAULT NULL,
  `claveconcepto` varchar(20) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `periodo` varchar(10) DEFAULT NULL,
  `periodoletra` varchar(50) DEFAULT NULL,
  `descripcion` mediumtext,
  `unidad` varchar(50) DEFAULT NULL,
  `importe` decimal(12,2) NOT NULL,
  `cantidad` decimal(12,2) NOT NULL,
  `cargos` decimal(12,2) NOT NULL,
  `descto` decimal(12,2) NOT NULL,
  `beca` decimal(12,2) NOT NULL,
  `iva` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `costo` decimal(12,2) DEFAULT NULL,
  `comision` decimal(12,2) DEFAULT NULL,
  `efectivo` decimal(12,2) DEFAULT NULL,
  `cambio` decimal(12,2) DEFAULT NULL,
  `pases` int(11) DEFAULT NULL,
  `accesos` int(11) DEFAULT NULL,
  `formapago` varchar(20) NOT NULL,
  `monedero` varchar(10) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `cuenta` varchar(20) DEFAULT NULL,
  `rfcemisor` varchar(13) DEFAULT NULL,
  `uuid` varchar(50) DEFAULT NULL,
  `cadenaxml` mediumtext,
  `usuario` varchar(50) NOT NULL,
  `observaciongeneral` mediumtext,
  `fechacancelacion` date DEFAULT NULL,
  `usuariocancelacion` varchar(50) DEFAULT NULL,
  `motivocancelacion` mediumtext,
  `status` varchar(20) DEFAULT NULL,
  `convertidoa` varchar(20) DEFAULT NULL,
  `usuariomodfecha` varchar(15) DEFAULT NULL,
  `statuscfdi` varchar(20) DEFAULT NULL,
  `refabono` varchar(20) DEFAULT NULL,
  `clavecomision` varchar(20) DEFAULT NULL,
  `importecomision` decimal(12,2) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `operaciontarjeta` varchar(20) DEFAULT NULL,
  `autorizaciontarjeta` varchar(20) DEFAULT NULL,
  `bancoemisortarjeta` varchar(50) DEFAULT NULL,
  `quienautorizatarjeta` varchar(20) DEFAULT NULL,
  `comisiontarjeta` decimal(12,2) NOT NULL DEFAULT '0.00',
  `tipodocoficialtarjeta` varchar(50) DEFAULT NULL,
  `referenciadocoficialtarjeta` varchar(50) DEFAULT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuariomodificacion` varchar(50) DEFAULT NULL,
  `fechamodificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cadenaoriginal` mediumtext,
  `fechatimbrado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pagosadicio`
--

DROP TABLE IF EXISTS `pagosadicio`;
CREATE TABLE IF NOT EXISTS `pagosadicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciclo` varchar(10) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `clavenivel` varchar(100) NOT NULL,
  `nombrenivel` varchar(255) NOT NULL,
  `gradogrupo` varchar(100) NOT NULL,
  `clavealumno` varchar(20) NOT NULL,
  `claveconcepto` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `periodicidad` smallint(6) NOT NULL,
  `importe` decimal(12,2) NOT NULL,
  `iva` decimal(12,2) NOT NULL,
  `formato` varchar(20) NOT NULL,
  `formapago` varchar(20) NOT NULL,
  `aplicabeca` smallint(6) NOT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  `pagaren` int(11) DEFAULT NULL,
  `pagacada` smallint(6) NOT NULL,
  `pases` int(11) NOT NULL,
  `accesos` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL DEFAULT 'admin',
  `fechacreacion` date DEFAULT NULL,
  `usuariomodificacion` varchar(50) DEFAULT NULL,
  `fechamodificacion` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `paisId` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`paisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pais`
--

INSERT INTO `pais` (`paisId`, `nombre`) VALUES
(1, 'MEXICO'),
(2, 'ESTADOS UNIDOS');

-- --------------------------------------------------------

--
-- Table structure for table `parte`
--

DROP TABLE IF EXISTS `parte`;
CREATE TABLE IF NOT EXISTS `parte` (
  `conceptoId` int(11) NOT NULL,
  `cantidad` float(10,2) NOT NULL,
  `unidad` varchar(255) DEFAULT NULL,
  `noIdentificacion` varchar(255) DEFAULT NULL,
  `descripcion` mediumtext NOT NULL,
  `valorUnitario` float(10,2) NOT NULL,
  `excentoIva` tinyint(1) NOT NULL DEFAULT '0',
  `importe` float(10,2) NOT NULL,
  `userId` int(11) NOT NULL,
  `empresaId` int(11) NOT NULL,
  `parteId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`parteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentId` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `invoiceId` int(10) NOT NULL,
  `amount` double NOT NULL,
  `paymentMethod` enum('Efectivo','Transferencia','Convenio','Saldo Favor') NOT NULL DEFAULT 'Efectivo',
  `comments` varchar(255) NOT NULL,
  `status` enum('activo','cancelado') NOT NULL DEFAULT 'activo',
  `credit` double NOT NULL,
  `amountApplied` double NOT NULL,
  `account` int(4) DEFAULT NULL,
  `anticipo` double NOT NULL,
  `autorize` varchar(255) NOT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `date`, `invoiceId`, `amount`, `paymentMethod`, `comments`, `status`, `credit`, `amountApplied`, `account`, `anticipo`, `autorize`) VALUES
(1, '2013-06-26', 797, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(2, '2013-06-26', 804, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(3, '2013-06-26', 805, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(4, '2013-06-26', 803, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(5, '2013-06-26', 806, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(6, '2013-06-27', 823, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(7, '2013-06-27', 824, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(8, '2013-07-01', 828, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(9, '2013-07-01', 827, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(10, '2013-07-01', 831, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(11, '2013-07-01', 807, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(12, '2013-07-01', 834, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(13, '2013-07-01', 833, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(14, '2013-07-01', 836, 2500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 2500, 0, 0, ''),
(18, '2014-07-02', 4108, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(19, '2014-09-04', 4126, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(21, '2014-09-26', 4990, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(22, '2014-09-26', 5008, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(23, '2014-09-26', 5026, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(24, '2014-09-26', 5044, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(25, '2014-09-26', 5062, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(26, '2014-09-26', 5098, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(27, '2014-09-26', 5116, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(28, '2014-09-26', 5134, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(30, '2014-09-26', 4345, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(31, '2014-09-26', 4327, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(32, '2014-09-26', 4849, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(33, '2014-09-26', 4867, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(34, '2014-09-26', 4885, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(35, '2014-09-26', 4903, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(38, '2014-09-26', 4309, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(40, '2014-09-26', 4291, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(41, '2014-09-26', 4273, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(43, '2014-09-26', 4255, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(44, '2014-09-26', 4381, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(46, '2014-09-26', 4183, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(48, '2014-09-26', 4363, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(49, '2014-09-26', 4399, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(51, '2014-09-26', 4579, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(52, '2014-09-26', 4991, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(53, '2014-09-26', 5009, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(54, '2014-09-26', 5027, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(55, '2014-09-26', 5045, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(56, '2014-09-26', 5063, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(57, '2014-09-26', 5099, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(58, '2014-09-26', 5117, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(59, '2014-09-26', 5135, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(60, '2014-09-26', 4201, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(61, '2014-09-26', 4561, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(62, '2014-09-26', 4417, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(63, '2014-09-26', 4435, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(64, '2014-09-26', 4453, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(65, '2014-09-26', 4471, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(67, '2014-09-26', 4525, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(68, '2014-09-26', 4507, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(71, '2014-10-08', 5243, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(72, '2015-01-12', 5121, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(73, '2015-03-02', 5332, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(77, '2015-03-05', 5656, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(83, '2015-03-08', 5638, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(86, '2015-03-08', 5692, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(87, '2015-03-08', 5944, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(89, '2015-03-08', 5962, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(90, '2015-03-08', 5926, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(91, '2015-03-08', 6178, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(92, '2015-03-08', 5872, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(93, '2015-03-08', 5299, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(99, '2015-03-08', 5710, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(100, '2015-03-08', 5980, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(101, '2015-03-08', 5890, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(104, '2015-03-08', 5728, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(106, '2015-03-08', 5782, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(115, '2015-03-08', 5746, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(117, '2015-03-08', 6124, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(119, '2015-03-08', 5764, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(120, '2015-03-08', 5800, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(123, '2015-03-08', 5908, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(124, '2015-03-30', 6214, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(125, '2015-04-06', 6232, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(126, '2015-04-06', 6196, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(129, '2015-04-13', 6286, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(130, '2015-04-15', 6304, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(133, '2015-09-19', 6376, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(136, '2015-09-19', 6466, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(139, '2015-09-19', 6520, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(141, '2015-09-19', 6574, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(144, '2015-09-19', 6538, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(145, '2015-09-19', 6682, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(148, '2015-09-19', 6916, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(150, '2015-09-19', 6844, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(153, '2015-09-19', 6880, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(154, '2015-09-19', 6898, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(155, '2015-09-19', 6772, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(157, '2015-09-19', 6808, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(158, '2015-09-19', 6826, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(159, '2015-09-19', 6736, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(160, '2015-09-19', 6664, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(161, '2015-09-19', 6754, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(162, '2015-09-19', 6934, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(163, '2015-09-19', 6628, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(166, '2015-09-30', 6988, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(167, '2015-09-30', 7006, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(168, '2015-10-06', 7024, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(169, '2015-10-07', 7042, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(170, '2015-10-07', 7060, 5500, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 5500, 0, 0, ''),
(173, '2016-01-12', 7150, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, ''),
(174, '2016-01-12', 7114, 1100, 'Efectivo', 'Pago de Colegiatura', 'activo', 0, 1100, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
CREATE TABLE IF NOT EXISTS `periodo` (
  `periodoId` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `starts` date NOT NULL,
  `ends` date NOT NULL,
  `fichasStarts` date NOT NULL,
  `fichasEnds` date NOT NULL,
  `vacationsStarts` date NOT NULL COMMENT 'inicio periodo vacacional',
  `vacationsEnds` date NOT NULL COMMENT 'fin periodo vacional',
  `active` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`periodoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `personalId` int(11) NOT NULL AUTO_INCREMENT,
  `positionId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname_materno` varchar(255) NOT NULL,
  `lastname_paterno` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `curp` varchar(255) NOT NULL,
  `rfc` varchar(255) NOT NULL,
  `fecha_nacimiento` varchar(10) NOT NULL,
  `fecha_sep` varchar(10) NOT NULL,
  `sexo` enum('h','m') NOT NULL,
  `fecha_dgta` varchar(10) NOT NULL,
  `claves_presupuestales` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `stateId` int(11) NOT NULL,
  `lastActivity` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'alumnos/no_foto.JPG',
  `correo` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `semblanza` text NOT NULL,
  `firmaConstancia` enum('no','si') NOT NULL,
  `profesion` varchar(255) NOT NULL,
  `INE` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `nInterior` varchar(255) NOT NULL,
  `nExterior` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `rutaFirma` varchar(255) NOT NULL,
  `estatus` enum('activo','eliminado') NOT NULL,
  `tipoContrato` enum('fisica','moral') NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `mostrar` enum('no','si') NOT NULL,
  `numero` varchar(255) NOT NULL,
  PRIMARY KEY (`personalId`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`personalId`, `positionId`, `name`, `lastname_materno`, `lastname_paterno`, `username`, `passwd`, `description`, `curp`, `rfc`, `fecha_nacimiento`, `fecha_sep`, `sexo`, `fecha_dgta`, `claves_presupuestales`, `categoria`, `perfil`, `stateId`, `lastActivity`, `foto`, `correo`, `celular`, `semblanza`, `firmaConstancia`, `profesion`, `INE`, `calle`, `nInterior`, `nExterior`, `colonia`, `estado`, `ciudad`, `rutaFirma`, `estatus`, `tipoContrato`, `facebook`, `twitter`, `mostrar`, `numero`) VALUES
(1, 1, 'Admin', '', '', 'admin', 'admin', '', '', '', '', '', 'h', '', '', '', 'Administrador', 0, 1565473275, 'alumnos/no_foto.JPG', '', '', '', 'no', '', '', '', '', '', '', '', 0, '', 'activo', 'fisica', '', '', 'no', ''),
(200, 2, 'Daniel', 'Lopez', 'Angel', 'docente', 'docente', '', '', '', '11-05-1985', '', 'h', '', '', '', 'Docente', 1, 1565472922, 'alumnos/no_foto.JPG', '', '', '', 'no', '', '', '', '', '', '', '', 0, '', 'activo', 'fisica', '', '', 'si', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_role`
--

DROP TABLE IF EXISTS `personal_role`;
CREATE TABLE IF NOT EXISTS `personal_role` (
  `personalId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_role`
--

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `positionId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext,
  PRIMARY KEY (`positionId`),
  KEY `clave` (`clave`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positionId`, `clave`, `name`, `description`) VALUES
(1, 'ADMIN', 'ADMINISTRADOR GENERAL', 'ADMINISTRADOR GENERAL'),
(4, 'DOC', 'DOCENTE', 'DOCENTE');

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `preguntaId` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` text NOT NULL,
  `tiporespuesta` enum('punto','opcional','abierta') NOT NULL,
  `encuestaId` int(11) NOT NULL,
  `categoriapreguntaId` int(11) NOT NULL,
  `rango` varchar(255) NOT NULL,
  `opcional` text NOT NULL,
  `numCaracter` varchar(255) NOT NULL,
  PRIMARY KEY (`preguntaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `pregunta`
--

INSERT INTO `pregunta` (`preguntaId`, `pregunta`, `tiporespuesta`, `encuestaId`, `categoriapreguntaId`, `rango`, `opcional`, `numCaracter`) VALUES
(32, 'Muestra una preparación y organización sólida de cada clase', 'opcional', 1, 1, '', '6_7_8_9_10', ''),
(33, 'Comunica claramente el programa de la materia (Propósito y objetivos del curso, contenidos, organización, criterios de evaluación y bibliográficas)', 'opcional', 1, 1, '', '6_7_8_9_10', ''),
(34, 'Da a conocer clara y oportunamente los criterios de evaluación de curso', 'opcional', 1, 1, '', '6_7_8_9_10', ''),
(35, 'Promueve el aprendizaje reflexivo', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(36, 'Promueve el análisis, la creatividad, la valoración crítica, entre otras habilidades del pensamiento', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(37, 'Expone y explica claramente. Utiliza ejemplos que ayuda a comprender los diversos contenidos', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(38, 'Promueve que el estudiante desarrolle su capacidad de identificar y plantear problemas desde diversos enfoques teórico - metodológicos', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(40, 'Enriquece el aprendizaje de los estudiantes a través de la retroalimentación de sus actividades y trabajos', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(41, 'Atiende adecuadamente a los comentarios y cuestionamientos de los estudiantes', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(42, 'Organiza diversas actividades para generar ambientes de aprendizaje variados', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(43, 'Motiva al estudiante para que éste aprenda', 'opcional', 1, 2, '', '6_7_8_9_10', ''),
(44, 'Escucha los puntos de vista de los estudiantes', 'opcional', 1, 3, '', '6_7_8_9_10', ''),
(45, 'Favorece un clima agradable de participación y confianza en la clase para que los estudiantes se sientan seguros al exponer sus conocimientos y argumentar sus ideas', 'opcional', 1, 3, '', '6_7_8_9_10', ''),
(46, 'Responde a las preguntas y dudas del estudiante con precisión', 'opcional', 1, 3, '', '6_7_8_9_10', ''),
(47, 'Diseña estrategias de evaluación adecuadas a las caracteristicas del grupo', 'opcional', 1, 4, '', '6_7_8_9_10', ''),
(48, 'Comunica con oportunidad los resultados de las evaluaciones', 'opcional', 1, 4, '', '6_7_8_9_10', ''),
(49, 'Es congruente al evaluar el aprendizaje, conforme los objetivos del programa', 'opcional', 1, 4, '', '6_7_8_9_10', ''),
(50, 'Es respetuoso en su trato con los estudiantes', 'opcional', 1, 5, '', '6_7_8_9_10', ''),
(51, 'Realiza la actividad docente con sentido de responsabilidad y compromiso', 'opcional', 1, 5, '', '6_7_8_9_10', ''),
(52, 'Fortalece los valores de honestidad y ética profesional en el grupo a tráves de su propio comportamiento en clase', 'opcional', 1, 5, '', '6_7_8_9_10', ''),
(53, 'Los materiales de estudio (texto, apuntes, etcétera) han sido adecuados', 'opcional', 1, 6, '', '6_7_8_9_10', ''),
(54, 'Se utilizaron tecnologías de información como internet, videoconferencias, etcétera', 'opcional', 1, 6, '', '6_7_8_9_10', ''),
(56, 'Me motivo a buscar información por mi cuenta', 'opcional', 1, 6, '', '6_7_8_9_10', ''),
(57, 'Fomenta el uso de recursos (bibliográficos o de otro tipo) adicionales a los utilizados en clase', 'opcional', 1, 6, '', '6_7_8_9_10', ''),
(58, 'Realiza suficientes seminarios (Lecturas, charlas, debates) relacionados con la asignatura', 'opcional', 1, 6, '', '6_7_8_9_10', ''),
(59, 'Me siento satisfecho asistiendo a clases ', 'opcional', 1, 7, '', '6_7_8_9_10', ''),
(60, 'Considero que he adquirido conocimiento solido en esta materia', 'opcional', 1, 7, '', '6_7_8_9_10', ''),
(61, 'He dedicado comparativamente más esfuerzo a esta materia que a cualquier otra de este ciclo escolar', 'opcional', 1, 7, '', '6_7_8_9_10', ''),
(62, 'El nivel de esfuerzo y dedicación requerido por esta materia ha sido elevado', 'opcional', 1, 7, '', '6_7_8_9_10', ''),
(63, 'Recomendaría a este(a) profesor (a) a otros(as) compañeros(as)', 'opcional', 1, 7, '', '6_7_8_9_10', '');

-- --------------------------------------------------------

--
-- Table structure for table `profesion`
--

DROP TABLE IF EXISTS `profesion`;
CREATE TABLE IF NOT EXISTS `profesion` (
  `profesionId` int(11) NOT NULL AUTO_INCREMENT,
  `profesionName` varchar(255) NOT NULL,
  PRIMARY KEY (`profesionId`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profesion`
--

INSERT INTO `profesion` (`profesionId`, `profesionName`) VALUES
(1, 'tesy'),
(2, 'ADMINISTRACIÓN PÚBLICA'),
(3, 'ARQUITECTURA'),
(5, 'INVESTIGACION CRIMINAL'),
(6, 'CONTADURIA PÚBLICA'),
(7, 'DERECHO'),
(8, 'TURISMO'),
(9, 'ADMINISTRACIÓN'),
(13, 'ODONTOLOGIA'),
(14, 'PEDAGOGIA'),
(15, 'INGENIERÍA'),
(16, 'CRIMINOLOGIA'),
(17, 'PSICOLOGIA'),
(18, 'DISEÑO GRAFICO'),
(19, 'SOCIOLOGIA'),
(20, 'MERCADOTECNIA'),
(21, 'ECONOMÍA'),
(23, 'RELACIONES INTERNACIONALES'),
(24, 'COMUNICACION'),
(25, 'SISTEMAS COMPUTACIONALES'),
(27, 'CIENCIAS POLITICAS'),
(28, 'SIN PROFESION'),
(29, 'ADMINISTRACIÓN DE EMPRESAS'),
(30, 'ADMINISTRACION TURISTICA'),
(32, 'INGENIERÍA CIVIL'),
(33, 'CIENCIAS DE LA EDUCACIÓN'),
(34, 'VETERINARIA'),
(35, 'INFORMÁTICA'),
(36, 'MEDICINA'),
(37, 'NEGOCIOS INTERNACIONALES'),
(38, 'OTROS'),
(39, 'TEOLOGÍA'),
(40, 'AGRONOMÍA'),
(41, 'LENGUA Y LITERATURA HISPANOAMERICANA'),
(42, 'COMERCIO INTERNACIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `recording`
--

DROP TABLE IF EXISTS `recording`;
CREATE TABLE IF NOT EXISTS `recording` (
  `recordingId` int(11) NOT NULL AUTO_INCREMENT,
  `embed` mediumtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`recordingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `registrationId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `periodoId` int(11) NOT NULL,
  `dateRegister` varchar(10) NOT NULL,
  `confirmed` enum('0','1') NOT NULL,
  PRIMARY KEY (`registrationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registration_v1`
--

DROP TABLE IF EXISTS `registration_v1`;
CREATE TABLE IF NOT EXISTS `registration_v1` (
  `registrationId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `periodoId` int(11) NOT NULL,
  `dateRegister` varchar(10) NOT NULL,
  PRIMARY KEY (`registrationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `replyId` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `replyDate` datetime NOT NULL,
  `topicId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `personalId` int(11) NOT NULL DEFAULT '0',
  `notificado` text NOT NULL,
  `path` varchar(255) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `son` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`replyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `repositorio`
--

DROP TABLE IF EXISTS `repositorio`;
CREATE TABLE IF NOT EXISTS `repositorio` (
  `repositorioId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `activo` enum('no','si') NOT NULL,
  `ruta` varchar(255) NOT NULL,
  PRIMARY KEY (`repositorioId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

DROP TABLE IF EXISTS `resource`;
CREATE TABLE IF NOT EXISTS `resource` (
  `resourceId` int(11) NOT NULL AUTO_INCREMENT,
  `courseModuleId` int(11) NOT NULL DEFAULT '0',
  `resourceConfigId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`resourceId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`resourceId`, `courseModuleId`, `resourceConfigId`, `name`, `description`, `path`) VALUES
(1, 1, 0, 'RECURSO B', '', 'recurso_1.JPG'),
(2, 1, 0, 'RECURSO C', '', 'recurso_2.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `resource_config`
--

DROP TABLE IF EXISTS `resource_config`;
CREATE TABLE IF NOT EXISTS `resource_config` (
  `resourceConfigId` int(11) NOT NULL AUTO_INCREMENT,
  `subjectModuleId` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`resourceConfigId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_config`
--

INSERT INTO `resource_config` (`resourceConfigId`, `subjectModuleId`, `name`, `description`, `path`) VALUES
(4, 2, 'RECURSO A', '', 'recurso_4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `resultado`
--

DROP TABLE IF EXISTS `resultado`;
CREATE TABLE IF NOT EXISTS `resultado` (
  `resultadoId` int(11) NOT NULL AUTO_INCREMENT,
  `preguntaId` int(11) NOT NULL,
  `respuesta` mediumtext NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `courseModuleId` int(11) NOT NULL,
  `encuestaId` int(11) NOT NULL,
  `profesorId` int(11) NOT NULL,
  PRIMARY KEY (`resultadoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rfc`
--

DROP TABLE IF EXISTS `rfc`;
CREATE TABLE IF NOT EXISTS `rfc` (
  `rfcId` int(11) NOT NULL AUTO_INCREMENT,
  `empresaId` int(11) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `razonSocial` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `noExt` varchar(255) NOT NULL,
  `noInt` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `activo` enum('si','no') NOT NULL DEFAULT 'no',
  `main` enum('no','si') NOT NULL,
  `regimenFiscal` varchar(255) NOT NULL,
  `iva` int(3) NOT NULL DEFAULT '16',
  PRIMARY KEY (`rfcId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfc`
--

INSERT INTO `rfc` (`rfcId`, `empresaId`, `rfc`, `razonSocial`, `pais`, `calle`, `noExt`, `noInt`, `colonia`, `localidad`, `municipio`, `ciudad`, `referencia`, `estado`, `cp`, `activo`, `main`, `regimenFiscal`, `iva`) VALUES
(1, 15, 'LSF100610LS2', 'DEMO FACTURASE', 'DEMO', 'DEMO', '13', '45', 'DEMO', 'DEMO', 'DEMO', '', 'DEMO', 'DEMO', '11111', 'si', 'si', 'R%C3%A9gimen%20de%20las%20Personas%20F%C3%ADsicas%20con%20Actividades%20Empresariales%20y%20Profesionales', 16);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `clave`, `name`, `description`) VALUES
(1, 'ADMIN', 'Administrador General', 'Administrador General del Sistema'),
(2, 'DOC', 'DOCENTE', '');

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

DROP TABLE IF EXISTS `role_modules`;
CREATE TABLE IF NOT EXISTS `role_modules` (
  `roleId` int(11) NOT NULL,
  `moduleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_modules`
--

INSERT INTO `role_modules` (`roleId`, `moduleId`) VALUES
(39, 37),
(39, 40),
(39, 8),
(39, 43),
(2, 8),
(39, 41),
(39, 38),
(39, 42),
(38, 8),
(38, 37),
(38, 40),
(38, 43),
(38, 4),
(38, 41),
(23, 4),
(23, 33),
(23, 32),
(23, 15),
(23, 16),
(23, 14),
(23, 11),
(23, 2),
(23, 6),
(23, 18),
(23, 12),
(23, 19),
(23, 8),
(23, 25),
(23, 29),
(23, 30),
(23, 21),
(23, 26),
(23, 27),
(23, 17),
(23, 7),
(23, 31),
(23, 20),
(38, 38),
(38, 42),
(29, 35),
(29, 4),
(2, 37),
(2, 4),
(30, 4),
(30, 1),
(30, 37),
(30, 11),
(30, 8),
(30, 34),
(30, 35),
(30, 36),
(32, 35),
(32, 3),
(32, 34),
(32, 8),
(32, 11),
(32, 37),
(32, 1),
(32, 4),
(32, 5),
(32, 9),
(32, 17),
(32, 36),
(37, 37),
(37, 4),
(37, 8);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `scheduleId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`scheduleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_group`
--

DROP TABLE IF EXISTS `schedule_group`;
CREATE TABLE IF NOT EXISTS `schedule_group` (
  `scheduleGroupId` int(11) NOT NULL AUTO_INCREMENT,
  `majorId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  PRIMARY KEY (`scheduleGroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_test`
--

DROP TABLE IF EXISTS `schedule_test`;
CREATE TABLE IF NOT EXISTS `schedule_test` (
  `scheduletestId` int(11) NOT NULL AUTO_INCREMENT,
  `typetestId` int(11) NOT NULL,
  `datetest` date NOT NULL,
  `comments` varchar(60) NOT NULL,
  `periodoId` int(11) NOT NULL,
  PRIMARY KEY (`scheduletestId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='calendario de ex?menes parciales, globales, etc.';

-- --------------------------------------------------------

--
-- Table structure for table `schedule_time`
--

DROP TABLE IF EXISTS `schedule_time`;
CREATE TABLE IF NOT EXISTS `schedule_time` (
  `schtimeId` int(11) NOT NULL AUTO_INCREMENT,
  `hr_start` int(11) NOT NULL,
  `min_start` int(11) NOT NULL,
  `hr_end` int(11) NOT NULL,
  `min_end` int(11) NOT NULL,
  `periodoId` int(11) NOT NULL,
  `free_time` enum('0','1') NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`schtimeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schgpo_subject`
--

DROP TABLE IF EXISTS `schgpo_subject`;
CREATE TABLE IF NOT EXISTS `schgpo_subject` (
  `schGpoSubjectId` int(11) NOT NULL AUTO_INCREMENT,
  `scheduleGroupId` int(11) NOT NULL,
  `subgpoId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `periodoId` int(11) NOT NULL,
  UNIQUE KEY `schGpoSubjectId` (`schGpoSubjectId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school_type`
--

DROP TABLE IF EXISTS `school_type`;
CREATE TABLE IF NOT EXISTS `school_type` (
  `schtypId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`schtypId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_type`
--

INSERT INTO `school_type` (`schtypId`, `clave`, `name`) VALUES
(1, '01', 'T?cnica'),
(2, '02', 'Estatal'),
(3, '03', 'Federal'),
(4, '04', 'Telesecundaria'),
(5, '05', 'General'),
(6, '06', 'Abierta'),
(7, '07', 'Particular'),
(8, '08', 'Inea'),
(9, '09', 'Otros');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `semesterId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`semesterId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterId`, `clave`, `name`) VALUES
(1, 'I', 'Semester 1'),
(2, 'II', 'Semestre 2'),
(3, 'III', 'Semestre 3'),
(4, 'IV', 'Semestre 4'),
(5, 'V', 'Semestre 5'),
(6, 'VI', 'Semestre 6');

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `serieId` int(11) NOT NULL AUTO_INCREMENT,
  `empresaId` int(11) NOT NULL,
  `sucursalId` int(11) NOT NULL,
  `serie` varchar(16) NOT NULL,
  `folioInicial` int(11) NOT NULL,
  `folioFinal` int(11) NOT NULL,
  `noAprobacion` varchar(255) NOT NULL,
  `anoAprobacion` int(11) NOT NULL,
  `tiposComprobanteId` int(11) NOT NULL,
  `lugarDeExpedicion` varchar(255) NOT NULL,
  `noCertificado` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `consecutivo` int(11) NOT NULL,
  `rfcId` int(11) NOT NULL,
  PRIMARY KEY (`serieId`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`serieId`, `empresaId`, `sucursalId`, `serie`, `folioInicial`, `folioFinal`, `noAprobacion`, `anoAprobacion`, `tiposComprobanteId`, `lugarDeExpedicion`, `noCertificado`, `email`, `consecutivo`, `rfcId`) VALUES
(51, 15, 1, 'A', 1, 1000000, '', 0, 1, '1', '00001000000201889852', 'd@d.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE IF NOT EXISTS `solicitud` (
  `solicitudId` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` mediumtext NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `tiposolicitudId` int(11) NOT NULL,
  `estatus` enum('pendiente','autorizado','completado','en progreso','cancelado') NOT NULL,
  `personalId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `rutaAdjunto` varchar(255) NOT NULL,
  `tipobaja` enum('temporal','definitiva') NOT NULL,
  `courseId` int(11) NOT NULL,
  `courseModuleId` int(11) NOT NULL COMMENT 'coursemoduleId en el que se encuentra inscrito el alumno',
  `nivelInscrito` int(11) NOT NULL COMMENT 'nivel inscrito ya sea cuatri o semestre',
  `subjectId` int(11) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `folio` varchar(255) NOT NULL,
  `nombreFirma` varchar(255) NOT NULL,
  `puestofirmante` varchar(255) NOT NULL,
  `sexoFirma` varchar(255) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `horario` varchar(255) NOT NULL,
  `observacion` mediumtext NOT NULL,
  PRIMARY KEY (`solicitudId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

DROP TABLE IF EXISTS `speciality`;
CREATE TABLE IF NOT EXISTS `speciality` (
  `specialityId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`specialityId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`specialityId`, `clave`, `name`) VALUES
(1, 'F-M', 'FISICO MATEM?TICA'),
(2, 'Q-B', 'QU?MICO BIOL?GICA'),
(3, 'E-A', 'ECON?MICO ADMINISTRATIVA'),
(13, 'C-B?SICO', 'COMPONENTE B?SICO'),
(15, 'AGROPECUARIO', 'T?CNICO AGROPECUARIO'),
(16, 'AGRONEGOCIOS', 'T?CNICO EN AGRONEGOCIOS'),
(17, 'INFORM?TICA', 'T?CNICO EN INFORM?TICA'),
(18, 'DESARROLLO', 'T?CNICO EN DESARROLLO COMUNITARIO'),
(19, 'AGROINDUSTRIAS', 'T?CNICO EN AGROINDUSTRIAS'),
(20, 'OPT', 'OPTATIVA'),
(22, 'ADMINISTRACI?N', 'TECNICO EN ADMINISTRCI?N Y CONTABILIDAD');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `stateId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  PRIMARY KEY (`stateId`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateId`, `name`, `clave`) VALUES
(1, 'AGUASCALIENTES', 'AS'),
(2, 'BAJA CALIFORNIA NTE.', 'BC'),
(3, 'BAJA CALIFORNIA SUR', 'BS'),
(4, 'CAMPECHE', 'CC'),
(5, 'COAHUILA', 'CL'),
(6, 'COLIMA', 'CM'),
(7, 'CHIAPAS', 'CS'),
(8, 'CHIHUAHUA', 'CH'),
(9, 'DISTRITO FEDERAL', 'DF'),
(10, 'DURANGO', 'DG'),
(11, 'GUANAJUATO', 'GT'),
(12, 'GUERRERO', 'GR'),
(13, 'HIDALGO', 'HG'),
(14, 'JALISCO', 'JC'),
(15, 'MEXICO', 'MC'),
(16, 'MICHOACAN', 'MN'),
(17, 'MORELOS', 'MS'),
(18, 'NAYARIT', 'NT'),
(19, 'NUEVO LEON', 'NL'),
(20, 'OAXACA', 'OC'),
(21, 'PUEBLA', 'PL'),
(22, 'QUERETARO', 'QT'),
(23, 'QUINTANA ROO', 'QR'),
(24, 'SAN LUIS POTOSI', 'SP'),
(25, 'SINALOA', 'SL'),
(26, 'SONORA', 'SR'),
(27, 'TABASCO', 'TC'),
(28, 'TAMAULIPAS', 'TS'),
(29, 'TLAXCALA', 'TL'),
(30, 'VERACRUZ', 'VZ'),
(31, 'YUCATAN', 'YN'),
(32, 'ZACATECAS', 'ZS'),
(33, 'SERV. EXTERIOR MEXICANO', 'SM'),
(34, 'NACIDO EN EL EXTRANJERO', 'NE');

-- --------------------------------------------------------

--
-- Table structure for table `subgpo_schedule`
--

DROP TABLE IF EXISTS `subgpo_schedule`;
CREATE TABLE IF NOT EXISTS `subgpo_schedule` (
  `subgpoId` int(11) NOT NULL,
  `schtimeId` int(11) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subjectId` int(11) NOT NULL AUTO_INCREMENT,
  `specialityId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `tipoPeriodo` enum('Cuatrimestre','Semestre') NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fechaRvoe` date NOT NULL,
  `fechaRvoeLinea` date NOT NULL,
  `fechaRevoe` varchar(255) NOT NULL DEFAULT '24 DE ENERO DEL 2011',
  `name` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `group_qty` int(11) NOT NULL,
  `student_limit` int(11) NOT NULL,
  `welcomeText` mediumtext NOT NULL,
  `introduction` mediumtext NOT NULL,
  `intentions` mediumtext NOT NULL,
  `objectives` mediumtext NOT NULL,
  `themes` mediumtext NOT NULL,
  `scheme` mediumtext NOT NULL,
  `methodology` mediumtext NOT NULL,
  `politics` mediumtext NOT NULL,
  `evaluation` mediumtext NOT NULL,
  `bibliography` mediumtext NOT NULL,
  `tipo` int(11) NOT NULL,
  `assignedTo` mediumtext NOT NULL,
  `cost` float(10,2) NOT NULL,
  `payments` int(11) NOT NULL DEFAULT '1',
  `rvoe` varchar(255) NOT NULL,
  `rvoeLinea` varchar(255) NOT NULL,
  PRIMARY KEY (`subjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectId`, `specialityId`, `semesterId`, `tipoPeriodo`, `clave`, `fechaRvoe`, `fechaRvoeLinea`, `fechaRevoe`, `name`, `credits`, `group_qty`, `student_limit`, `welcomeText`, `introduction`, `intentions`, `objectives`, `themes`, `scheme`, `methodology`, `politics`, `evaluation`, `bibliography`, `tipo`, `assignedTo`, `cost`, `payments`, `rvoe`, `rvoeLinea`) VALUES
(8, 0, 0, 'Cuatrimestre', '', '0000-00-00', '0000-00-00', '24 DE ENERO DEL 2011', 'CURRICULA TEST', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 5, '', 0.00, 0, '002', ''),
(9, 0, 0, 'Cuatrimestre', '', '0000-00-00', '0000-00-00', '24 DE ENERO DEL 2011', 'TEST2', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 5, '', 0.00, 0, '111', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject_group`
--

DROP TABLE IF EXISTS `subject_group`;
CREATE TABLE IF NOT EXISTS `subject_group` (
  `subgpoId` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `personalId` int(11) NOT NULL,
  `classroomId` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `recursamiento` enum('0','1') NOT NULL,
  `periodoId` int(11) NOT NULL,
  PRIMARY KEY (`subgpoId`),
  KEY `periodoId` (`periodoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject_module`
--

DROP TABLE IF EXISTS `subject_module`;
CREATE TABLE IF NOT EXISTS `subject_module` (
  `subjectModuleId` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` int(11) NOT NULL,
  `specialityId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `group_qty` int(11) NOT NULL,
  `student_limit` int(11) NOT NULL,
  `welcomeText` mediumtext NOT NULL,
  `introduction` mediumtext NOT NULL,
  `intentions` mediumtext NOT NULL,
  `objectives` mediumtext NOT NULL,
  `themes` mediumtext NOT NULL,
  `scheme` mediumtext NOT NULL,
  `methodology` mediumtext NOT NULL,
  `politics` mediumtext NOT NULL,
  `evaluation` mediumtext NOT NULL,
  `bibliography` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `assignedTo` mediumtext NOT NULL,
  `cost` float(10,2) NOT NULL,
  PRIMARY KEY (`subjectModuleId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_module`
--

INSERT INTO `subject_module` (`subjectModuleId`, `subjectId`, `specialityId`, `semesterId`, `clave`, `name`, `credits`, `group_qty`, `student_limit`, `welcomeText`, `introduction`, `intentions`, `objectives`, `themes`, `scheme`, `methodology`, `politics`, `evaluation`, `bibliography`, `tipo`, `assignedTo`, `cost`) VALUES
(1, 8, 0, 1, '001', 'MODULO 2', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0.00),
(2, 8, 0, 1, '001', 'MODULO 1', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0.00),
(3, 9, 0, 1, '123', 'FINALIZADA 1', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, '', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `sucursalId` int(11) NOT NULL AUTO_INCREMENT,
  `empresaId` int(11) NOT NULL,
  `rfcId` int(11) NOT NULL,
  `identificador` varchar(255) NOT NULL,
  `sucursalActiva` enum('no','si') NOT NULL DEFAULT 'no',
  `razonSocial` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `noExt` varchar(255) NOT NULL,
  `noInt` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  PRIMARY KEY (`sucursalId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sucursal`
--

INSERT INTO `sucursal` (`sucursalId`, `empresaId`, `rfcId`, `identificador`, `sucursalActiva`, `razonSocial`, `pais`, `calle`, `noExt`, `noInt`, `colonia`, `localidad`, `municipio`, `ciudad`, `referencia`, `estado`, `cp`) VALUES
(1, 15, 1, 'matriz', 'si', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `teamId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `courseModuleId` int(11) NOT NULL,
  `teamNumber` int(11) NOT NULL,
  PRIMARY KEY (`teamId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamId`, `userId`, `courseModuleId`, `teamNumber`) VALUES
(2, 713, 1, 1),
(3, 714, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `number` int(11) NOT NULL,
  `float` float NOT NULL,
  `date` date NOT NULL,
  `double` double NOT NULL,
  `enum` enum('si','no') NOT NULL,
  `maxTries` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tiposcomprobante`
--

DROP TABLE IF EXISTS `tiposcomprobante`;
CREATE TABLE IF NOT EXISTS `tiposcomprobante` (
  `tiposComprobanteId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `tipoDeComprobante` enum('ingreso','egreso','traslado') NOT NULL DEFAULT 'ingreso',
  PRIMARY KEY (`tiposComprobanteId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiposcomprobante`
--

INSERT INTO `tiposcomprobante` (`tiposComprobanteId`, `nombre`, `tipoDeComprobante`) VALUES
(1, 'Factura', 'ingreso'),
(2, 'Nota de Credito', 'egreso'),
(3, 'Nota de Debito', 'ingreso'),
(4, 'Honorarios', 'ingreso');

-- --------------------------------------------------------

--
-- Table structure for table `tiposolicitud`
--

DROP TABLE IF EXISTS `tiposolicitud`;
CREATE TABLE IF NOT EXISTS `tiposolicitud` (
  `tiposolicitudId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `idfire` int(11) NOT NULL,
  `orden` varchar(255) NOT NULL,
  PRIMARY KEY (`tiposolicitudId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `topicId` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `tipo` enum('dudas','asesoria','presentacion','discucion') DEFAULT NULL,
  `descripcion` mediumtext NOT NULL,
  `topicDate` datetime NOT NULL,
  `courseId` int(11) NOT NULL DEFAULT '0',
  `courseModuleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topicId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topicId`, `subject`, `tipo`, `descripcion`, `topicDate`, `courseId`, `courseModuleId`, `userId`) VALUES
(1, 'Dudas para el Docente', 'dudas', 'En este foro podrán realizar preguntas referentes al contenido del curso y el docente asignado se las responderá.', '2019-08-10 11:52:17', 1, 1, 0),
(2, 'Asesoria Academica', 'asesoria', 'En este foro podrás incluir dudas referentes al curso y nuestro personal académico los resolverá.', '2019-08-10 11:52:17', 1, 1, 0),
(3, 'Presentacion Personal', 'presentacion', 'Este foro les permitirá conocer a los demás alumnos del curso, dando una breve descripción personal, que puede incluir su nombre completo, estudios, información laboral, pasatiempos, etc.', '2019-08-10 11:52:17', 1, 1, 0),
(4, 'Foro de Discusion', 'discucion', 'Foro dedicado a expresar opiniones acerca de algún tema que el profesor o tutor haya creado.', '2019-08-10 11:52:17', 1, 1, 0),
(5, 'Dudas para el Docente', 'dudas', 'En este foro podrán realizar preguntas referentes al contenido del curso y el docente asignado se las responderá.', '2019-08-10 11:53:14', 1, 2, 0),
(6, 'Asesoria Academica', 'asesoria', 'En este foro podrás incluir dudas referentes al curso y nuestro personal académico los resolverá.', '2019-08-10 11:53:14', 1, 2, 0),
(7, 'Presentacion Personal', 'presentacion', 'Este foro les permitirá conocer a los demás alumnos del curso, dando una breve descripción personal, que puede incluir su nombre completo, estudios, información laboral, pasatiempos, etc.', '2019-08-10 11:53:14', 1, 2, 0),
(8, 'Foro de Discusion', 'discucion', 'Foro dedicado a expresar opiniones acerca de algún tema que el profesor o tutor haya creado.', '2019-08-10 11:53:14', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topicsub`
--

DROP TABLE IF EXISTS `topicsub`;
CREATE TABLE IF NOT EXISTS `topicsub` (
  `topicsubId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `topicId` int(11) NOT NULL,
  `topicsubDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`topicsubId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typetest`
--

DROP TABLE IF EXISTS `typetest`;
CREATE TABLE IF NOT EXISTS `typetest` (
  `testId` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) NOT NULL,
  `typetest` varchar(255) NOT NULL,
  `regularization` varchar(255) NOT NULL,
  PRIMARY KEY (`testId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typetest`
--

INSERT INTO `typetest` (`testId`, `identifier`, `typetest`, `regularization`) VALUES
(1, 'PAR', 'PARCIAL', 'no'),
(2, 'GBL', 'GLOBAL', 'no'),
(3, 'R1', 'RECUPERACION', 'yes'),
(4, 'INT', 'INTERSEMESTRAL', 'yes'),
(5, 'REC', 'RECURSAMIENTO', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `type_calif`
--

DROP TABLE IF EXISTS `type_calif`;
CREATE TABLE IF NOT EXISTS `type_calif` (
  `typeCalifId` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`typeCalifId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_calif`
--

INSERT INTO `type_calif` (`typeCalifId`, `identifier`, `name`) VALUES
(1, 'FINAL', 'FINAL'),
(2, 'R1', 'RECUPERACION'),
(3, 'INT', 'INTERSEMESTRAL'),
(4, 'REC', 'RECURSAMIENTO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `folioFicha` int(11) NOT NULL,
  `controlNumber` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `lastNamePaterno` varchar(255) NOT NULL,
  `lastNameMaterno` varchar(255) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('user','student','maestro','admin') NOT NULL DEFAULT 'user',
  `street` varchar(255) NOT NULL,
  `number` varchar(50) NOT NULL,
  `colony` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pais` int(11) NOT NULL DEFAULT '1',
  `estado` int(11) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `sexo` enum('m','f') NOT NULL DEFAULT 'm',
  `curp` varchar(255) NOT NULL,
  `cityBorn` varchar(255) NOT NULL,
  `stateBorn` varchar(255) NOT NULL,
  `countryBorn` varchar(255) NOT NULL,
  `mainMajor` int(11) NOT NULL,
  `secondMajor` int(11) NOT NULL,
  `thirdMajor` int(11) NOT NULL,
  `mode` tinyint(4) NOT NULL,
  `tutorNames` varchar(255) NOT NULL,
  `tutorLastNamePaterno` varchar(255) NOT NULL,
  `tutorLastNameMaterno` varchar(255) NOT NULL,
  `tutorAddress` varchar(255) NOT NULL,
  `tutorPhone` varchar(50) NOT NULL,
  `prevSchNames` varchar(255) NOT NULL,
  `prevSchType` tinyint(4) NOT NULL,
  `prevSchKey` varchar(255) NOT NULL,
  `prevSchMode` tinyint(4) NOT NULL,
  `prevSchCity` varchar(255) NOT NULL,
  `prevSchState` varchar(255) NOT NULL,
  `prevSchAverage` float NOT NULL,
  `prevSchCertified` tinyint(4) NOT NULL,
  `majorId` int(11) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `periodoId` int(11) NOT NULL,
  `status` enum('pendiente','autorizada','cancelada','baja','egresado') NOT NULL DEFAULT 'pendiente',
  `codeId` int(11) NOT NULL,
  `average` float NOT NULL,
  `cancelPeriodoId` int(10) NOT NULL,
  `nacionality` varchar(255) NOT NULL,
  `anioEgreso` varchar(4) NOT NULL,
  `maritalStatus` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `workplace` varchar(255) NOT NULL,
  `workplaceOcupation` enum('FUNCIONARIO PUBLICO MUNICIPAL','FUNCIONARIO PUBLICO ESTATAL','FUNCIONARIO PUBLICO FEDERAL','OTROS') NOT NULL DEFAULT 'FUNCIONARIO PUBLICO MUNICIPAL',
  `workplaceAddress` varchar(255) NOT NULL,
  `workplaceArea` varchar(255) NOT NULL,
  `workplacePosition` varchar(255) NOT NULL,
  `workplaceCity` varchar(255) NOT NULL,
  `paist` int(11) NOT NULL,
  `estadot` int(11) NOT NULL,
  `ciudadt` int(11) NOT NULL,
  `workplacePhone` varchar(255) NOT NULL,
  `workplaceEmail` varchar(255) NOT NULL,
  `academicDegree` enum('UNIVERSITARIO','LICENCIATURA','MAESTRIA','DOCTORADO','OTROS') NOT NULL DEFAULT 'UNIVERSITARIO',
  `profesion` int(2) NOT NULL,
  `school` varchar(255) NOT NULL,
  `highSchool` varchar(255) NOT NULL,
  `lastActivity` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL,
  `masters` varchar(255) NOT NULL,
  `mastersSchool` varchar(255) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1',
  `referenciaBancaria` varchar(255) NOT NULL,
  `porcentajeBeca` varchar(255) NOT NULL,
  `rutaFoto` varchar(255) NOT NULL,
  `perfil` text NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=715 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `folioFicha`, `controlNumber`, `names`, `lastNamePaterno`, `lastNameMaterno`, `birthdate`, `email`, `phone`, `password`, `type`, `street`, `number`, `colony`, `city`, `state`, `country`, `pais`, `estado`, `ciudad`, `postalCode`, `sexo`, `curp`, `cityBorn`, `stateBorn`, `countryBorn`, `mainMajor`, `secondMajor`, `thirdMajor`, `mode`, `tutorNames`, `tutorLastNamePaterno`, `tutorLastNameMaterno`, `tutorAddress`, `tutorPhone`, `prevSchNames`, `prevSchType`, `prevSchKey`, `prevSchMode`, `prevSchCity`, `prevSchState`, `prevSchAverage`, `prevSchCertified`, `majorId`, `semesterId`, `groupId`, `periodoId`, `status`, `codeId`, `average`, `cancelPeriodoId`, `nacionality`, `anioEgreso`, `maritalStatus`, `fax`, `mobile`, `workplace`, `workplaceOcupation`, `workplaceAddress`, `workplaceArea`, `workplacePosition`, `workplaceCity`, `paist`, `estadot`, `ciudadt`, `workplacePhone`, `workplaceEmail`, `academicDegree`, `profesion`, `school`, `highSchool`, `lastActivity`, `avatar`, `masters`, `mastersSchool`, `activo`, `referenciaBancaria`, `porcentajeBeca`, `rutaFoto`, `perfil`) VALUES
(713, 0, 'alumno', 'José Luis', 'Brandi', 'Bonifaz', '22-09-1987', 'jbrandy01@hotmail.com', '6124873', 'alumno', 'student', '7 y 8 norte', '881', '10° pte', '', '', '', 1, 7, 180, '29054', 'm', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 'pendiente', 0, 0, 0, '', '', 'Soltero(a)', '9616037819', '9611778491', 'Prospera', '', '3 pte 2 nte', 'Padron', 'Supervisor', '', 1, 7, 180, '6124873', 'rdcnegocios@hotmail.com', 'UNIVERSITARIO', 9, 'Fray Bartolome de las Casas', '', 1565473357, '', '', '', 1, '', '', '', ''),
(714, 0, '20190714', 'INACTIVO', 'INACTIVO', 'INACTIVO', '01-01-1950', 'dlopez@trazzos.com', '1231231231', 'Strong47-', 'student', 'INACTIVO', 'INACTIVO', 'INACTIVO', '', '', '', 1, 16, 797, '123123', 'm', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, 0, 'pendiente', 0, 0, 0, '', '', 'Soltero(a)', '1231231231', '12312311321', 'dasdasd', 'FUNCIONARIO PUBLICO MUNICIPAL', 'asdas', 'dasdas', 'jk', '13', 1, 2, 13, '1231231231', 'a@a.com', 'UNIVERSITARIO', 9, 'dasdad', 'jkl', 0, '', 'jlk', 'jkl', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_subject`
--

DROP TABLE IF EXISTS `user_subject`;
CREATE TABLE IF NOT EXISTS `user_subject` (
  `registrationId` int(11) NOT NULL AUTO_INCREMENT,
  `alumnoId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `status` enum('activo','inactivo','finalizado') NOT NULL DEFAULT 'inactivo',
  `mark` int(3) NOT NULL DEFAULT '0',
  `tipo_beca` enum('Ninguno','Particular','Escolar','Prodim') NOT NULL DEFAULT 'Ninguno',
  `por_beca` int(11) NOT NULL DEFAULT '0',
  `matricula` varchar(255) NOT NULL,
  PRIMARY KEY (`registrationId`),
  KEY `alumnoId` (`alumnoId`,`courseId`),
  KEY `courseId` (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_subject`
--

INSERT INTO `user_subject` (`registrationId`, `alumnoId`, `courseId`, `status`, `mark`, `tipo_beca`, `por_beca`, `matricula`) VALUES
(4, 713, 1, 'activo', 0, 'Ninguno', 0, ''),
(5, 714, 1, 'activo', 0, 'Ninguno', 0, ''),
(6, 713, 3, 'activo', 0, 'Ninguno', 0, '');

-- --------------------------------------------------------
