<table style="font-size: 16px; margin-top: 20px;" border="1px">
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Дата</th>
    </tr>
   <?php foreach ($feedbackData as $item) { ?>
       <tr>
           <th><?= $item['ID']; ?></th>
           <th><?= $item['name']; ?></th>
           <th><?= $item['phone']; ?></th>
           <th><?= $item['review_date']; ?></th>
       </tr>
   <?php } ?>
</table>
