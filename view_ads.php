<article>
    <h2>Annonserna</h2>
    <p>Här kommer data från databasen med pdo</p>

    <!--Kolla ifall template['users'] har innehåll-->
    <?php if (!empty($template['users'])) : ?>
        <div class="users" id="userList">
            <?php foreach ($template['users'] as $user) : ?>
                <p><?= $user['username'] ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</article>