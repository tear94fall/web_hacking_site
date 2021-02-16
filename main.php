<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>New Document</title>
<link rel="stylesheet" href="css/layer_popup.css">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="js/layer_popup.js"></script>
</head>

<body>
    <button onClick="javascript:goDetail('테스트');">팝업</button>
    <div style="height:1000px;"> </div>

    <!-- 팝업뜰때 배경 -->
    <div id="mask"></div>

    <!--Popup Start -->
    <div id="layerbox" class="layerpop"
        style="width: 700px; height: 350px;">
        <article class="layerpop_area">
        <div class="title">레이어팝업 타이틀</div>
        <a href="javascript:popupClose();" class="layerpop_close" id="layerbox_close">X</a> <br>
        <div class="content">
        레이어 팝업 내용<br/>
        레이어 팝업 내용<br/>
        레이어 팝업 내용<br/>
        레이어 팝업 내용<br/>
        레이어 팝업 내용<br/>
        레이어 팝업 내용<br/>
        레이어 팝업 내용<br/>
        레이어 팝업 내용<br/>
    
        </div>
        </article>
    </div>
    <!--Popup End -->

</body>
</html>