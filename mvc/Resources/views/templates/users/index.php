<table>
    <thead>
        <th>User ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Firstname</th>
        <th>Lastname</th>
    </thead>
</table>
<?php foreach ($users as $user) : ?>
    <tr>
        <td>
            <p><?php echo $user->id ?></p>
        </td>
        <td>
            <p><?php echo $user->username ?></p>
        </td>
        <td>
            <p><?php echo $user->email ?></p>
        </td>
        <td>
            <p><?php echo $user->firstname ?></p>
        </td>
        <td>
            <p><?php echo $user->lastname ?></p>
        </td>
        <a href="<?php echo BASE_URL . "/users/$user->id/delete"; ?>">Delete</a>
    </tr>
<?php endforeach; ?>