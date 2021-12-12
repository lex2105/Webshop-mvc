<div class="userProfile-background">
    <h1 class="userProfile-title">List of all users</h1>
    <table id="users">
        <thead>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Action</th>
        </thead>
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
                <td>
                    <a href="<?php echo BASE_URL . "/users/$user->id/delete"; ?>" class="action">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>