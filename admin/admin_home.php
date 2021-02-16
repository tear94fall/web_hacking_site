<!DOCTYPE html>
<html>
<head>
<style type="text/css">

	ul {
		list-style-type: none;
		background-color: #ccc;
		width: 25%;
		padding: 0;
		margin:  0;
		position: fixed;
		height: 100%;
		overflow: auto;
	}

	li a {
		text-decoration: none;
		display: block;
		color: #000;
		padding: 8px 15px 8px 15px;
		font-weight: bold;
	}

	li a.admin_menubar {
		background-color: tomato;
		color: #fff;
	}

    li a.site_home, a.admin_member, a.admin_freeboard {
		background-color: silver;
	}

	li a:hover:not(.admin_menubar) {
		background-color: #333;
		color: #fff;
	}

    #admin_banner {
        font-family: "Malgun Gothic", "돋움", dotum, "굴림", gulim, arial, helvetica, sans-serif;
        margin-left: 10px;
    }

</style>

<ul>
    <li><a class="admin_menubar">관리자 메뉴</a></li>
	<li><a class="admin_member" href="admin_member.php">계정 관리</a></li>
	<li><a class="admin_notice" href="admin_notice.php">공지사항 관리</a></li>
	<li><a class="admin_freeboard" href="admin_freeboard.php">자유 게시판 관리</a></li>
	<li><a class="admin_hackissue" href="admin_hackissue.php">해킹보안 이슈 관리</a></li>
    <li><a class="site_home" href="../index.php">홈으로 가기</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <h2 id="admin_banner">관리자 페이지 입니다.</h2>
  <h3 id="admin_banner">관리자 권한이 부여된 사용자만 이용이 가능합니다.</h3>
  <p id="admin_banner">계정 및 게시글 확인, 변경, 삭제 등이 가능합니다.</p>
  <p id="admin_banner">꼭 필요한 경우에만 사용 바랍니다.</p>

</div>

</body>
</html>