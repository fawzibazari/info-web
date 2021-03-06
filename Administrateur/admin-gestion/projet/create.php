<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    // $id = isset($_POST['idFormation']) && !empty($_POST['idFormation']) && $_POST['idFormation'] != 'auto' ? $_POST['idFormation'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
        $nomP = isset($_POST['nomP']) ? $_POST['nomP'] : '';
        $descriptionP = isset($_POST['descriptionP']) ? $_POST['descriptionP'] : '';
        $environnementP = isset($_POST['environnementP']) ? $_POST['environnementP'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare("INSERT INTO `projet` ( `nomP`, `descriptionP`, `environnementP`) VALUES (? , ?, ?)");
    $stmt->execute(array($nomP,$descriptionP, $environnementP));
    // Output message
    $msg = 'Created Successfully!';
    // var_dump($nomFormation,$description,$environnement);

}
?>
<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        
        <label for="name">projet</label>
        <input type="text" name="nomP" placeholder="John Doe" id="name">
        <label for="email">description</label>
        <input type="text" name="descriptionP" placeholder="johndoe@example.com" id="email">

        <label for="environnement">environnement</label>
        <input type="text" name="environnementP" placeholder="2025550143" id="environnement">>
        <input type="submit" name="Create" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>