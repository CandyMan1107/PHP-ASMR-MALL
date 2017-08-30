<?php
  session_start();
?>
<meta charset="utf-8">
<?php
    if (!isset($_POST['id'])) {
        echo("
 		 		<script>
 		 			window.alert('아이디를 입력하세요.')
 		 			history.go(-1)
 		 		</script>
 		    ");
        exit;
    }

if (!isset($_POST['pass'])) {
    echo("
 		 		<script>
 		 			window.alert('비밀번호를 입력하세요.')
 		 			history.go(-1)
 		 		</script>
 			");
    exit;
}

require_once "../lib/cDBManager.php";

    try {
        $obj=new DBManager();
        $pdo=$obj->connect();

        if (isset($_POST['id']) && isset($_POST['pass'])) {
            $id=$_POST['id'];
            $pass=$_POST['pass'];

            $sql="select * from member where id=:id";

            $stt=$pdo->prepare($sql,[PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL]);

            $stt->execute(array(
                    ':id'=>$id
            ));

            $row=$stt->fetch(PDO::FETCH_ASSOC);

            if ($row['id']==$id && $row['pass']==$pass) {
                $_SESSION['id']=$id;
                $_SESSION['pass']=$pass;

                echo "<script>
                          location.replace('../index.php')
                      </script>";
            } else if ($row['id']!=$id) {
                echo "<script>
                           window.alert('등록되지 않은 아이디입니다.')
                           history.go(-1)
                      </script>";
            } else if ($row['pass']!=$pass) {
                echo "<script>
                           window.alert('비밀번호가 틀립니다.')
                           history.go(-1)
                      </script>";
            }
        }
    } catch (PDOException $e) {
        exit('DB ERROR : {$e->getMessage()}');
    }
?>