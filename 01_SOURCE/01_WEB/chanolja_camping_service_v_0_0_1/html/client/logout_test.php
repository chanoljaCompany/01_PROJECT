<?php
//세션 파일 생성 여부 확인
if(!session_id()) {
    session_start();
    echo "
session_start >>>
    ";
}
print_r($_SESSION);
//변수 등록
// $_SESSION['userId'] = '';

// echo "
// aa > ".$_SESSION['userId']." <br>
// ";
//변수 등록 여부 확인
if(!isset($_SESSION['userId'])) {
    $_SESSION['userId'] = 'data1';
    echo '새로운 변수 생성';
} else {
    $_SESSION['userId'] = 'data2';
    echo '기존 변수 데이터 변경';
}
echo '<br/>'.$_SESSION['userId'];
unset($_SESSION['userId']);
// session_destroy();
?>
