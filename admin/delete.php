<?php
include'connection/db.php';
if( $_GET['g_id'])
{
    $gallery_id = $_GET['g_id'];
    $delete_gallery =  mysqli_query($dbcon, "delete from gallery where id ='$gallery_id'");
    if ($delete_gallery) {
        echo("<script> alert('Deleted');  location.href = 'gallerylist.php';   </script>");
    }
}

if( $_GET['ct_id'])
{
    $client_id = $_GET['ct_id'];
    $delete_client =  mysqli_query($dbcon, "delete from clients where id ='$client_id'");
    if ($delete_client) {
        echo("<script> alert('Deleted');  location.href = 'clientlist.php';   </script>");
    }
}

if( $_GET['s_id'])
{
    $services_id = $_GET['s_id'];
    $delete_services =  mysqli_query($dbcon, "delete from services where id ='$services_id'");
    if ($delete_services) {
        echo("<script> alert('Deleted');  location.href = 'serviceslist.php';   </script>");
    }
}

if( $_GET['n_id'])
{
    $news_id = $_GET['n_id'];
    $delete_news =  mysqli_query($dbcon, "delete from news where id ='$news_id'");
    if ($delete_news) {
        echo("<script> alert('Deleted');  location.href = 'newslist.php';   </script>");
    }
}

