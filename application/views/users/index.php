<h2>User List</h2>
<a href="<?= site_url('users/add')?>">新增</a>
<a href="<?= site_url('users/edit')?>">修改</a>
<a href="<?= site_url('users/delete')?>">刪除</a>
<hr>

<?
  foreach ($users as $user) {
    echo "id:".$user->id;
    echo " name:".$user->name;
    echo " tel:".$user->tel;
    echo "<br/>";
  }
?>