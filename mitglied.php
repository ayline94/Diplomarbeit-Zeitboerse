<?php include('header.php'); ?>

<?php include('api/mitglied/functions.php');

if(!isset($_GET['id']))
{
    header("location: ?id=".getId($_SESSION['email']));
}
?>

<div class="row">

    <div class="small-12">
        <h2>Mitglied Detailansicht</h2>
    </div>

</div>

<div class="row" id="showMitgliedDetail">

</div>


<div class="row">


    <div class="column small-12">
        <h2>Angebote</h2><br>


        <h2>Suchanfragen</h2>


    </div>

</div>


<?php include('footer.php'); ?>



