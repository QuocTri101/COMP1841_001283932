<section class="messages-box">
    <h3>Website Messages</h3>
    <ul class="messages-list">
        <?php foreach ($messages as $msg): ?>
            <li class="message-item">
                <p><?=htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8');?></p>
                <small>From <strong><?=htmlspecialchars($msg['name'], ENT_QUOTES, 'UTF-8');?></strong> on 
                    <?=htmlspecialchars(date("D d M Y", strtotime($msg['date'])), ENT_QUOTES, 'UTF-8');?></small>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
