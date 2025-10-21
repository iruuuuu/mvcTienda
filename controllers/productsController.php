<?php

// Delete Subject
if(isset($_GET['delete'])){
     SubjectRepository::deleteSubject($_GET['delete']);
     header('location:index.php');
     exit();
}

// Add new Subject
if(isset($_POST["title"]) && isset($_POST["content"])){
     $title = $db->real_escape_string($_POST['title']);
     $content = $db->real_escape_string($_POST['content']);
     $authorId = $_SESSION['user']->getId();
     $SubjectId = SubjectRepository::addSubject($title, $content, $authorId);
     header('location:index.php?c=Subject&id=' . $SubjectId);
     exit();
}

// Show new Subject form
if(isset($_GET["newSubject"])){
     require_once("views/newSubject.phtml");
     exit();
}

// Show single Subject
if(isset($_GET['id'])){
     $Subject = SubjectRepository::getSubjectById($_GET['id']);
     require_once 'views/showSubject.phtml';
     exit();
}
// Show Subject list
else {
     $Subjects = SubjectRepository::getSubjects();
     require_once 'views/mainView.phtml';
     exit();
}