<?php
require_once 'inc/header.php';

use Klimo\UsersModel;

?>
        <div class="content-wrapper" style="min-height: 855px;">
<h1>
    <?php
    echo "role: $roleName";
    ?>
    </h1>
    <?php
    if (in_array($roleName, ['ADMINISTRÁTOR', 'ZADAVATEL', 'REALIZÁTOR'])) {
        ?>
        <?php
        $user = UsersModel::getUsers();
        ?>
            <table class="table">
    <tbody>
        <?php
        foreach ($user as $users) {
            ?>

    <tr>
    <td><?php echo $users->email;?> </td>
    <td><?php echo $users->firstname;?> </td>
    <td> <?php echo $users->lastname; ?> </td>
    <td><?php echo $users->address; ?></td>
    <td><?php echo $users->city; ?></td>
  </tr>
            <?php
        }
        ?>
        </tbody>
            </table>
            <?php
    }
    ?>
</div>
    <?php
    require_once 'inc/footer.php';
    ?>