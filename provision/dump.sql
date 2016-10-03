-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.5.52-0+deb7u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `blog`
--

/*!40000 DROP DATABASE IF EXISTS `blog`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `blog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `blog`;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `preview` text NOT NULL,
  `text` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (2,'Aenean nunc lorem','Aenean nunc lorem, ornare a nunc sit amet, posuere eleifend est. Cras vitae ante diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque tincidunt placerat elit, et iaculis justo cursus sit amet. Suspendisse potenti. Fusce convallis lacus dolor, sollicitudin ultrices nibh efficitur at. Maecenas non ultricies purus, et ornare est.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque convallis purus elit, vel fringilla mauris tincidunt at. Aenean vel mollis velit, nec dapibus est. Integer a enim vel sapien feugiat ultrices. Ut et urna nunc. Duis malesuada, ex eget mollis sodales, sapien magna ultrices purus, eu venenatis est eros quis quam. Ut a tempus tortor, nec consectetur ante. Quisque vestibulum, nisl sed tempus ultrices, mi neque efficitur turpis, at accumsan urna nulla eu tortor. Pellentesque ornare nisi id massa viverra consectetur. Donec id ex ligula. Etiam sed ornare velit, vel viverra lacus. Proin efficitur nec nisl ac mollis. Pellentesque tincidunt massa ac ante convallis, interdum mollis nibh vulputate. Fusce sed commodo felis. Ut sed enim a lacus placerat consectetur. Mauris lobortis dui id eleifend laoreet. Suspendisse mattis non mi quis iaculis.','John','2016-10-02 18:42:36'),(3,'Integer tempor pellentesque sapien','Integer tempor pellentesque sapien id ultricies. Proin ornare est quis mattis blandit. Aliquam erat volutpat. Etiam vel aliquam nibh, eu dignissim nisi. Integer at dui lorem. Quisque viverra massa diam, sit amet varius felis volutpat eget. Cras suscipit lorem id laoreet tempus.','Curabitur fermentum arcu magna, eget luctus eros pulvinar sed. Praesent tincidunt porta sem eget facilisis. Quisque ullamcorper orci convallis risus fringilla, non imperdiet eros cursus. Cras arcu arcu, vulputate non neque quis, feugiat vehicula risus. Nulla feugiat rutrum tortor ac lobortis. Maecenas molestie placerat orci, nec posuere enim tempor at. Mauris nec neque consectetur, egestas massa vitae, congue est. Vestibulum semper, libero in ornare vehicula, mi justo iaculis urna, at mollis tellus nulla in tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.','Mike','2016-10-02 19:20:37'),(4,'Morbi nec ornare lectus','Morbi nec ornare lectus, sit amet scelerisque ligula. Nulla sit amet risus sit amet nunc facilisis auctor. Morbi dapibus vehicula est, ac molestie metus faucibus ut. Vivamus at erat justo. Morbi et ex faucibus, vehicula libero nec, imperdiet mi. Curabitur et dignissim turpis. Proin malesuada fringilla velit, eu lobortis ex gravida nec. Praesent tempor luctus urna, eget aliquet massa varius nec.','Quisque semper, mauris luctus convallis aliquet, tortor quam placerat neque, sit amet condimentum diam ligula sit amet dui. Cras ut vulputate mi. Maecenas viverra ipsum eu ultrices consectetur. Nulla vitae eros viverra, placerat urna vel, fringilla ligula. Aliquam tempor, urna nec imperdiet venenatis, orci purus posuere purus, eu consequat quam nisi sed est. Donec pellentesque nec elit sed pharetra. Vestibulum suscipit libero sit amet risus egestas dignissim. Pellentesque enim lacus, gravida eu lacinia et, dictum gravida ex. Morbi a gravida ante. Etiam porta quam in aliquet rutrum. Praesent rutrum augue diam, et tempus dolor auctor nec.','Julia','2016-10-02 19:20:42'),(5,'Donec molestie','Donec molestie, ex vitae euismod rutrum, metus metus porttitor lorem, sed aliquet dui purus sed mauris. Sed eget elit mi. Mauris tincidunt ex quis massa sodales ornare. Fusce eleifend gravida aliquet. Suspendisse orci nisi, tempor id felis et, rutrum vehicula tortor. Etiam cursus ipsum eu vestibulum lacinia. Pellentesque dapibus fermentum turpis, nec iaculis diam malesuada eu. Aenean est justo, convallis porttitor mauris ut, ornare iaculis tellus.','Donec semper mi sed purus fermentum convallis. Aenean consectetur augue eu porttitor vehicula. Quisque risus nibh, mollis sit amet ullamcorper vel, consequat in lorem. Morbi interdum id sem id suscipit. Maecenas nunc metus, fringilla et egestas id, efficitur vel elit. Sed sit amet mattis velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris vel sem eget justo suscipit volutpat quis in erat. Fusce varius a lacus ut ornare. Phasellus eget odio eu quam cursus auctor.','Sue','2016-10-02 19:42:36'),(6,'Nam sit amet est sit amet nibh ornare dignissim','Nam sit amet est sit amet nibh ornare dignissim sed blandit lorem. Fusce condimentum eros enim, nec faucibus nibh dignissim ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec augue ligula, pulvinar vitae nisi vitae, pharetra semper sem. Sed faucibus ac felis non egestas. Etiam vel faucibus massa. Nunc id orci quis augue porttitor convallis. Morbi nec mi risus. Sed auctor nulla id magna dignissim aliquet. Ut sit amet nisi egestas, facilisis erat at, posuere ante. Fusce dapibus mi vitae aliquet varius. Proin at nulla sapien. Nullam venenatis nibh ac odio laoreet rhoncus.','Aliquam orci libero, scelerisque a viverra in, vestibulum ut augue. Praesent ornare nulla id ultrices fringilla. Vivamus ac massa erat. Aenean fringilla, lacus eget iaculis accumsan, justo tortor pretium mi, vitae mollis tortor felis a metus. In tempus leo elit, a sollicitudin diam tempor sed. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque posuere orci at ultrices laoreet. Cras a aliquet mi. Integer vehicula sollicitudin vulputate. In tellus sapien, dictum dapibus commodo sed, gravida et augue.\r\n\r\nCras leo felis, iaculis eu odio sed, eleifend finibus ante. Sed mauris mauris, vulputate ac enim sed, pharetra facilisis erat. In eu vehicula dui. Aenean felis turpis, ultrices in eros vitae, hendrerit dignissim velit. Morbi egestas elementum enim eget cursus. Aenean consectetur elit quis lectus dignissim efficitur. Maecenas cursus malesuada facilisis. Curabitur non elit lobortis, facilisis augue sit amet, congue quam. Fusce tincidunt pretium sapien vel volutpat. Nullam magna lectus, tincidunt ullamcorper sollicitudin non, auctor in eros. Sed auctor iaculis vehicula. Vivamus et eros finibus, feugiat ipsum et, condimentum nisl. Sed tempor ligula sed turpis consectetur, eget viverra tellus euismod. Nulla facilisi. Nam porttitor vulputate nibh ut accumsan. Vivamus molestie sed sem eget pulvinar.','Robert','2016-10-02 19:42:42'),(7,'Suspendisse porta congue','Suspendisse porta congue neque quis condimentum. Pellentesque at semper eros. Quisque a sollicitudin mi. Praesent non condimentum leo, et semper massa. Nunc a nisl ut urna convallis ullamcorper sit amet a sapien. Cras interdum quis odio non tincidunt. Nulla facilisi. Aliquam dapibus, purus non porta cursus, dui quam cursus ex, egestas porta lacus nisi et arcu. Aenean vulputate vitae risus nec consectetur. Duis hendrerit scelerisque nunc quis hendrerit.','Donec quis dictum leo. Sed vitae eros sed neque ullamcorper egestas. Quisque sit amet finibus lectus. Pellentesque ornare urna a nunc rutrum sagittis. Pellentesque facilisis a nisi ut volutpat. Fusce venenatis hendrerit sem sed vehicula. Quisque placerat purus eget velit aliquet egestas quis et massa. Morbi varius aliquam magna. Curabitur accumsan accumsan dui id suscipit. Curabitur metus quam, fermentum quis mi ut, sollicitudin fringilla lectus. Vestibulum purus est, placerat in tincidunt id, tincidunt ac elit. Praesent feugiat et justo nec finibus. Nulla auctor ornare aliquet.','Rebecca','2016-10-02 19:42:48'),(8,'Pellentesque','Pellentesque at pulvinar lorem. Vestibulum vitae feugiat tortor. Maecenas sagittis libero sed venenatis pulvinar. Donec hendrerit luctus mi, et auctor ex efficitur a. Nullam aliquam nulla nec diam cursus, quis rutrum eros dignissim. Etiam lobortis blandit velit bibendum finibus. Sed bibendum pellentesque leo, ac pretium quam maximus nec. Sed malesuada, nibh sit amet faucibus bibendum, odio purus fringilla ante, quis hendrerit nisi augue vel lectus. Donec et mauris euismod, vulputate arcu eget, pellentesque diam. Vestibulum aliquet dolor lacus, nec elementum nibh volutpat eu.','Proin id pulvinar felis. Praesent aliquam ullamcorper gravida. Pellentesque ut rutrum nibh. Mauris at laoreet lectus, non tincidunt turpis. Cras non lectus dapibus, blandit ante vel, mattis ipsum. Proin et lorem hendrerit, consequat augue non, fermentum diam. Donec quis urna ultricies, placerat orci ac, fringilla urna. Nullam vitae velit nec tortor consequat aliquet id eget enim. Vestibulum facilisis tellus in justo sodales laoreet. Quisque faucibus sagittis sodales. Praesent id diam erat. Suspendisse viverra pulvinar auctor. In gravida sem in erat condimentum facilisis. Nunc mattis justo neque, id gravida magna interdum vel. Quisque scelerisque tempor nisi, et scelerisque lacus lobortis non.','Bob','2016-10-02 21:18:44'),(9,'Aenean ut finibus quam','Aenean ut finibus quam. Curabitur sollicitudin dui non ex volutpat, ultricies laoreet nunc ultrices. Curabitur lacinia dui vitae arcu tempus, quis euismod orci pellentesque. Sed lorem mi, convallis ut dolor at, porta efficitur lorem. Phasellus vel metus accumsan, sodales augue eu, gravida metus. Vestibulum maximus vitae est tincidunt maximus. Aliquam et tempor magna. Sed nibh lorem, dapibus in consequat ut, feugiat ut nisl.','Suspendisse euismod mi consequat libero maximus lobortis. Duis auctor, tellus mollis pulvinar vulputate, lectus dolor gravida dui, vel placerat felis ligula ut lacus. Proin feugiat odio tellus, ut tincidunt tellus efficitur id. Sed ullamcorper tristique ligula, quis eleifend arcu cursus efficitur. Pellentesque vehicula urna turpis, quis scelerisque tellus molestie non. Proin elementum erat sit amet egestas gravida. Aenean sapien turpis, posuere eget condimentum id, viverra ac justo. Maecenas pretium ex interdum, varius neque vel, viverra mi. Praesent fermentum, lorem et consectetur suscipit, turpis odio mollis nibh, vitae elementum nunc libero et ante. Pellentesque vel pulvinar sapien. Nunc a gravida felis, non auctor enim. Aliquam lobortis neque sed tortor iaculis auctor sit amet id ipsum. Pellentesque eu ullamcorper libero, ut suscipit odio. Duis scelerisque ligula a lobortis iaculis. Ut vel volutpat lorem. Pellentesque hendrerit diam vitae sapien egestas, pellentesque laoreet est ultricies.','Kate','2016-10-02 21:19:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
