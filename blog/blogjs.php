<?phpheader("Content-type:text/html;charset=utf-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>友人A--BLOG</title>
    <link rel="stylesheet" href="blog.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="footer.css">

    <script src="blog.js"></script>

</head>
<body>
<div class="u_bar">
    <div class="u_bar_body">
        <div class="u_bar_body_logo">
            <a href="#"><img src="images/yourenA.jpg" alt="友人A"></a>
        </div>
        <div class="u_bar_body_nav" >
            <ul>
                <li class="active"><a href="../index/index.html">首页</a></li>
                <li ><a href="../person/person.html">个人简历</a></li>
                <li ><a href="../sys/index.html">学习体系</a></li>
                <li ><a href="../demo/demo.html">Demo</a></li>

            </ul>
        </div>
    </div>
</div>

<div class="blog-logo">

</div>
<div class="blog">
    <div class="blog-left">
        <div class="right-img"></div>
        <div class="blog-left-list">
            <ul>
                <a href="blog.php"><li>HTML</li></a>
                <a href="blogcss.php"><li>CSS</li></a>
                <li class="active">JS</li>
            </ul>
        </div>

        <div class="blog-left-content">
            <!--连接html数据库-->
            <?php
            $conn1=@mysql_connect("localhost","root","") or die("数据库服务器连接错误".mysql_error());
            mysql_select_db("blog",$conn1) or die("数据库访问错误".mysql_error());
            mysql_query('SET NAMES UTF8');
            $page1=@$_GET['page1'];
            if ($page1==""){
                $page1=1;}
            if (is_numeric($page1)){
            $page_size1=5;     								//每页显示4条记录
            $query1="select count(*) as total from jsbloginfo order by id desc";
            $result1=mysql_query($query1);      					//查询符合条件的记录总条数
            $message_count1=@mysql_result($result1,0,"total");		//要显示的总记录数
            $page_count1=ceil($message_count1/$page_size1);	  	//根据记录总数除以每页显示的记录数求出所分的页数
            $offset1=($page1-1)*$page_size1;						//计算下一页从第几条数据开始循环
            $sql1=@mysql_query("select * from jsbloginfo order by id desc limit $offset1, $page_size1");
            $row1=@mysql_fetch_object($sql1);
            ?>

            <div class="blog-left-content-hide blog-left-content-active" >
                <ul class="blog-left-content-list">
                    <?php
                    do{
                        ?>
                        <li>
                            <h3><i class="fa fa-hand-o-right"></i> <a href="<?php echo $row1->link; ?>"><?php echo @$row1->title; ?></a></h3>
                            <div class="blog-left-content-list-date"><?php echo $row1->putdate; ?></div>
                            <div class="blog-left-content-list-body"><?php echo $row1->content;?></div>
                            <div class="read-more"><a href="<?php echo $row1->link; ?>">阅读全文 &raquo;</a></div>
                        </li>

                    <?php }while($row1=mysql_fetch_object($sql1));
                    }
                    ?>


                </ul>
                <table class="table"  width="550" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <!--  翻页条 -->
                        <td width="50%">&nbsp;&nbsp;页次：<?php echo $page1;?>/<?php echo $page_count1;?>页&nbsp;记录：<?php echo $message_count1;?> 条&nbsp; </td>
                        <td width="50%" align="right">
                            <?php
                            /*  如果当前页不是首页  */
                            if($page1!=1){
                                /*  显示“首页”超链接  */
                                echo  "<a style='color:black;' href='blogjs.php?page1=1'>首页</a>&nbsp;";
                                /*  显示“上一页”超链接  */
                                echo "<a style='color:black;'  href=blogjs.php?page1=".($page1-1).">上一页</a>&nbsp;";
                            }
                            /*  如果当前页不是尾页  */
                            if($page1<$page_count1){
                                /*  显示“下一页”超链接  */
                                echo "<a style='color:black;'  href=blogjs.php?page1=".($page1+1).">下一页</a>&nbsp;";
                                /*  显示“尾页”超链接  */
                                echo  "<a style='color:black;'  href=blogjs.php?page1=".$page_count1.">尾页</a>";
                            }
                            mysql_free_result($sql1);

                            ?>
                        </td></tr>
                </table>
            </div>
            <div class="person">

            </div>
        </div>

    </div>

    <div class="blog-right">
        <div class="blog-right-introduction">
            <div class="blog-right-introduction-title">
                <h3><i class="fa fa-male"></i> 简介</h3>
            </div>
            <div class="blog-right-introduction-body">
                <p>这是我平常在网络上收集的有关HTML，CSS，javascript的一些博客文章，帖子。以便以后查找。</p>
                <p>如果你有什么好的有关web前段的博文帖子愿意分享，可以在我的留言板留言或者用其他方式联系我</p>
            </div>
        </div>
        <div class="blog-right-information">
            <div class="yun"></div>
            <div class="blog-right-information-body">
                <p>
                    莫扎特曾经说过大胆地踏上旅途吧，我不知道路途的前方究竟有什么，但是，我们还是迈出了步伐，我们仍在旅途之中。
                </p>
            </div>
        </div>
    </div>
</div>
<div class="footer" >
    <div class="footer-content">
        <span class="footer-left"><img src="images/yourenA2.png" alt=""></span>
        <div class="footer-center">
            <p >本网站部分DEMO改编参考自网络，在此向原作者表示感谢</p>
            <p >站在巨人的肩膀上能够看得更远</p>
            <p>戴家儒</p>
        </div>
        <div class="footer-right">
            <p>Contact Me</p>
            <div class="icon">
                <div class="icon-content">
                    <div class="icon-img" style="background: url('../jibenfa/qrcode_1456280291803.png');background-size: 100%;"></div>
                    <a href="javascript:;"><img src="../jibenfa/qq.png" alt=""></a>
                </div>
                <div class="icon-content">
                    <div class="icon-img" style="background: url('../jibenfa/gen.png');background-size: 100%;"></div>
                    <a href="javascript:;"><img src="../jibenfa/wb.png" alt=""></a>
                </div>
                <div class="icon-content">
                    <div class="icon-img" style="background: url('../jibenfa/mmqrcode1456277113155.png');background-size: 100%;"></div>
                    <a href="javascript:;"><img src="../jibenfa/wx.png" alt=""></a>
                </div>
            </div>


        </div>
    </div>
</div>
<a href="javascript:;" class="btn" id="btn" title="回到顶部">
    <img src="images/turn-top.png" alt="">
    <span id="top-span">返回顶部</span>
</a>
</body>
</html>
