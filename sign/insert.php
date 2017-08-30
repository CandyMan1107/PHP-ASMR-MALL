<meta charset="utf-8">
<?php
	require_once "../lib/cDBManager.php";

	try {
		$obj=new DBManager();
		$pdo=$obj->connect();

		$sql="select * from member where id=:id";

		$stt=$pdo->prepare($sql, [PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL]);
		// prepare의 반환값은 PDO Statement 객체이다.

		$stt->execute(array(':id'=>$_POST['id']));
		// 결과는 boolean값(True or False)으로 나온다. 실행 되고 안되고

		$result=$stt->rowCount();

		if ($result) {
			echo "<script>
				window.alert('해당 아이디가 존재합니다.')
				history.go(-1)
			</script>";
		// 2개 전으로 가겠다. : 회원가입 창으로 돌아가겠다.
		    exit;
	    } else {

    		$sql="insert into member(id, pass) values(:id, :pass)";
	    	// $sql.="values(:id, :pass)";

		    $stt=$pdo->prepare($sql, [PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL]);
	    	// prepare의 반환값은 PDO Statement 객체이다.
		    // 새로 만들어서 대입한다. 그러니까 저 위에 아이랑 다른 아이

		    $result=$stt->execute(
			    array(
				    ':id'=>$_POST['id'],
				    ':pass'=>$_POST['pass']
                    )
    			);

		        if ($result) {
			    echo "<script>
                        window.alert('이제 로그인이 가능합니다!')
				        location.href='../index.php'
			          </script>";
		         }
        }
        $pdo=NULL;
	} catch (PDOException $e) {
		exit();
	}
 ?>
